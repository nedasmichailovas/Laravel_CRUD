<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Rules\LithuanianAsmensKodas;

class LithuanianAsmensKodasTest extends TestCase
{
    protected LithuanianAsmensKodas $rule;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rule = new LithuanianAsmensKodas();
    }

    #[Test]
    public function it_accepts_a_valid_personal_code(): void
    {
        $this->assertTrue(
            $this->rule->passes('asmens_kodas', '39001010022')
        );
    }

    #[Test]
    public function it_accepts_another_valid_personal_code(): void
    {
        $this->assertTrue(
            $this->rule->passes('asmens_kodas', '33309240064')
        );
    }

    #[Test]
    public function it_rejects_invalid_length_code(): void
    {
        $this->assertFalse(
            $this->rule->passes('asmens_kodas', '12345')
        );
    }

    #[Test]
    public function it_rejects_code_with_invalid_checksum(): void
    {
        $this->assertFalse(
            $this->rule->passes('asmens_kodas', '39001010029')
        );
    }

    #[Test]
    public function it_rejects_code_with_invalid_first_digit(): void
    {
        $this->assertFalse(
            $this->rule->passes('asmens_kodas', '79001010022')
        );
    }
}