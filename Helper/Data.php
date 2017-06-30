<?php

namespace Gonzalezuy\Article2\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    public function getColors($shape=null)
    {
        switch($shape) {
            case 'triangle':
                $r = [
                    ['id'=>'black','value'=>'Black'],
                    ['id'=>'blue','value'=>'Blue'],
                    ['id'=>'brown','value'=>'Brown'],
                    ['id'=>'green','value'=>'Green'],
                ];
                break;
            case 'circle':
                $r = [
                    ['id'=>'blue','value'=>'Blue'],
                    ['id'=>'brown','value'=>'Brown'],
                    ['id'=>'orange','value'=>'Orange'],
                    ['id'=>'white','value'=>'White'],
                ];
                break;
            case 'square':
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