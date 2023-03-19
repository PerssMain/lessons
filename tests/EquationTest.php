<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EquationTest extends TestCase
{


    public function solveTest1(): void
    {
        $this->assertEmpty(
            Equation::solve(1, 0, 1)
        );
    }
}
