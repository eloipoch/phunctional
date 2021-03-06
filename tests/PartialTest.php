<?php

namespace Akamon\Phunctional\Tests;

use function Akamon\Phunctional\partial;
use PHPUnit_Framework_TestCase;

final class PartialTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_be_able_to_fix_arguments_to_a_function()
    {
        $add5 = partial($this->sum(), 5);

        $this->assertEquals(10, $add5(5));
        $this->assertEquals(50, $add5(10, 15, 20));
    }

    /** @test */
    public function it_should_return_a_lazy_function_if_no_arguments_are_present()
    {
        $sum = partial($this->sum());

        $this->assertEquals(7, $sum(2, 5));
    }

    private function sum()
    {
        return function (...$numbers) {
            return array_sum($numbers);
        };
    }
}
