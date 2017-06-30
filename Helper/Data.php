<?php

namespace Gonzalezuy\Article2\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const TRIANGLE = 'Triangle';
    const CIRCLE = 'Circle';
    const SQUARE = 'Square';
    public function getColors($shape=null)
    {

        switch($shape) {
            case self::TRIANGLE:
                $r = [
                    ['id'=>'black','value'=>'Black'],
                    ['id'=>'blue','value'=>'Blue'],
                    ['id'=>'brown','value'=>'Brown'],
                    ['id'=>'green','value'=>'Green'],
                ];
                break;
            case self::CIRCLE:
                $r = [
                    ['id'=>'blue','value'=>'Blue'],
                    ['id'=>'brown','value'=>'Brown'],
                    ['id'=>'orange','value'=>'Orange'],
                    ['id'=>'white','value'=>'White'],
                ];
                break;
            case self::SQUARE:
                $r = [
                    ['id'=>'black','value'=>'Black'],
                    ['id'=>'brown','value'=>'Brown'],
                    ['id'=>'orange','value'=>'Orange'],
                    ['id'=>'white','value'=>'White'],
                ];
                break;
            default:
                $r = [
                  ['id'=>'black','value'=>'Black'],
                    ['id'=>'blue','value'=>'Blue'],
                    ['id'=>'brown','value'=>'Brown'],
                    ['id'=>'green','value'=>'Green'],
                    ['id'=>'orange','value'=>'Orange'],
                    ['id'=>'red','value'=>'Red'],
                    ['id'=>'white','value'=>'White'],
                    ['id'=>'yellow','value'=>'Yellow'],
                ];
                break;
        }
        return $r;
    }
}