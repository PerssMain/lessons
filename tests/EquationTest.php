<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EquationTest extends TestCase
{
    public function solveTest1(): void
    {
        //arrange
        $a = 1;
        $b = 0;
        $c = 1;

        //act
        $actual = Equation::solve($a, $b, $c);
        //assert

        $this->assertThat($actual, 0, "actual value is not equals to expected");
    }
}
