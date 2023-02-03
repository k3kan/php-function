<?php

namespace Tests;

use App\StringFunction;
use PHPUnit\Framework\TestCase;

class StringFunctionTest extends TestCase
{
    private StringFunction $obj;

    public function setUp(): void
    {
        $this->obj = new StringFunction();
    }

    public function testCamelCase()
    {
        $this->assertEmpty($this->obj->camelCase(""));
        $this->assertEquals("theStealthWarrior", $this->obj->camelCase("the-stealth-warrior"));
        $this->assertEquals("TheStealthWarrior", $this->obj->camelCase("The_Stealth_Warrior"));
    }

    public function testBalancedHooks()
    {
        $this->assertTrue($this->obj->isBalancedHooks('(())'));
        $this->assertTrue($this->obj->isBalancedHooks(''));
        $this->assertFalse($this->obj->isBalancedHooks(')('));
    }

    public function testRevRov()
    {
        $this->assertEquals("0365065073456944", $this->obj->revRot("563000655734469485", 4));
        $this->assertEmpty( $this->obj->revRot("", 8));
        $this->assertEmpty($this->obj->revRot("123456779", 0));
    }
}