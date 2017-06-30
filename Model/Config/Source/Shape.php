<?php

namespace Gonzalezuy\Article2\Model\Config\Source;

class Shape implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' =>  -1, 'label' => 'Select one shape'],
            ['value' => 'Square', 'label' => 'Square'],
            ['value'=> 'Triangle', 'label'=>'Triangle'],
            ['value'=> 'Circle', 'label' => 'Circle']
        ];
    }
}