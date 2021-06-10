<?php

namespace Akh\Typograf\Rule\Symbol;

use Akh\Typograf\Rule\AbstractRule;

class Copy extends AbstractRule
{
    public $name = 'Копирайт ©, торговая марка ™,®';

    public function handler($text)
    {
        $pattern = [
            '#\(r\)#iu',
            '#(copyright )?\((c|с)\)#iu',
            '#\(tm\)#iu',
        ];

        $replace = [
            '&reg;',
            '&copy;',
            '&trade;',
        ];

        return preg_replace($pattern, $replace, $text);
    }
}
