#!/usr/bin/env bash
# Script to download asset file from tag release using GitHub API v3.
# See: http://stackoverflow.com/a/35688093/55075    
CWD="$(cd -P -- "$(dirname -- "$0")" && pwd -P)"
# Check dependencies.
set -e
type curl grep sed tr >&2
xargs=$(which gxargs || which xargs)
# Validate settings.
[ -f ~/.secrets ] && source ~/.secrets
[ "$GITHUB_API_TOKEN" ] || { echo "Error: Please define GITHUB_API_TOKEN variable." >&2; exit 1; }
[ $# -ne 3 ] && { echo "Usage: $0 [owner] [repo] [tag]"; exit 1; }
[ "$TRACE" ] && set -x
read owner repo tag <<<$@
# Define variables.
GH_API="https://api.github.com"
GH_REPO="$GH_API/repos/$owner/$repo"
GH_TAGS="$GH_REPO/releases/tags/$tag"
AUTH="Authorization: token $GITHUB_API_TOKEN"
WGET_ARGS="--content-disposition --auth-no-challenge --no-cookie"
CURL_ARGS="-LJO#"
# Validate token.
curl -o /dev/null -sH "$AUTH" $GH_REPO || { echo "Error: Invalid repo, token or network issue!";  exit 1; }
# Read asset tags.
response=$(curl -sH "$AUTH" $GH_TAGS)
GH_ASSET=$(echo "$response" | jq -r '.zipball_url')
echo "Downloading asset..." >&2
curl -o $owner'_'$repo'-'$tag.zip $CURL_ARGS -H "$AUTH" "$GH_ASSET"
unzip -q $owner'_'$repo'-'$tag.zip
rm  $owner'_'$repo'-'$tag.zip
for f in *;do
    if [[ -d $f ]]; then
        mv $f $owner'_'$repo'-'$tag
    fi
done
mkdir src
cd $owner'_'$repo'-'$tag
# if your composer.json don't contain a line with version, uncomment the next line
#sed -i "/description*/a     \"version\": \"$tag\"," composer.json
mv * ../src/
cd ..
rm -rf $owner'_'$repo'-'$tag
cp src/composer.json .
# if you use MacOs comment the next 2 lines
sed -i "s/\"\"/\"src\/\"/g" composer.json
sed -i "s/registration\.php/src\/registration\.php/g" composer.json
# if you use MacOs uncomment the next 3 lines
#sed -i.bak "s/\"\"/\"src\/\"/g" composer.json
#sed -i.bak "s/registration\.php/src\/registration\.php/g" composer.json
#rm composer.json.bak
zip -qr $owner'_'$repo'-'$tag.zip src composer.json
rm -rf src composer.json
