<?php

namespace Rule\Number;

use Akh\Typograf\Rule\Number\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                "+79269999999",
                "+7&thinsp;926&thinsp;999&ndash;99&ndash;99",
            ],
            [
                "10\n+79269999999",
                "10\n+7&thinsp;926&thinsp;999&ndash;99&ndash;99",
            ],
            [
                "мой номер +79269999999",
                "мой номер +7&thinsp;926&thinsp;999&ndash;99&ndash;99",
            ],
            [
                "<a href='tel:+79269999999'>+79269999999</a>",
                "<a href='tel:+79269999999'>+7&thinsp;926&thinsp;999&ndash;99&ndash;99</a>",
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new Phone())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
