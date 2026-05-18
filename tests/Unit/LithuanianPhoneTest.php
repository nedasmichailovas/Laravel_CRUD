<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Rules\LithuanianPhone;

class LithuanianPhoneTest extends TestCase
{
    protected LithuanianPhone $rule;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rule = new LithuanianPhone();
    }

    #[Test]
    public function it_accepts_valid_lt_mobile_plus_format(): void
    {
        $this->assertTrue(
            $this->rule->passes('phone', '+37061234567')
        );
    }

    #[Test]
    public function it_accepts_valid_lt_mobile_8_format(): void
    {
        $this->assertTrue(
            $this->rule->passes('phone', '861234567')
        );
    }

    #[Test]
    public function it_rejects_too_short_number(): void
    {
        $this->assertFalse(
            $this->rule->passes('phone', '8612345')
        );
    }

    #[Test]
    public function it_rejects_foreign_number(): void
    {
        $this->assertFalse(
            $this->rule->passes('phone', '+44712345678')
        );
    }

    #[Test]
    public function it_rejects_empty_string(): void
    {
        $this->assertFalse(
            $this->rule->passes('phone', '')
        );
    }
}