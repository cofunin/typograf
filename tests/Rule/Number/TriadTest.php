<?php

namespace Akh\Typograf\Tests\Rule\Number;

use Akh\Typograf\Rule\Number\Triad;
use PHPUnit\Framework\TestCase;

class TriadTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                "1000\n10000",
                "1000\n10&thinsp;000",
            ],
            [
                "<p>10000</p>",
                "<p>10&thinsp;000</p>",
            ],
            [
                "+79269999999",
                "+79269999999",
            ],
            [
                "ИНН: 123123123123",
                "ИНН: 123&thinsp;123&thinsp;123&thinsp;123",
            ],
            [
                "123456789123456",
                "123&thinsp;456&thinsp;789&thinsp;123&thinsp;456",
            ],
            [
                "1000",
                "1000",
            ],
            [
                "10000",
                "10&thinsp;000",
            ],
            [
                "10 000-10 000",
                "10 000-10 000",
            ],
            [
                "10\n000",
                "10\n000",
            ],
            [
                "10\t000",
                "10\t000",
            ],
            [
                "Цена товара 10990 рублей",
                "Цена товара 10&thinsp;990 рублей",
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new Triad())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
