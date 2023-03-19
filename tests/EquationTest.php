<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EquationTest extends TestCase
{
    public function testSolve1(): void
    {
        $this->assertEmpty(
            Equation::solve(1, 0, 1)
        );
    }
    public function testSolve2(): void
    {
        $this->assertEquals(
            [1, -1], Equation::solve(1, 0, -1)
        );
    }

    public function testSolve3(): void
    {
        $this->assertEquals(
            [-1, -1], Equation::solve(1, 2, 1)
        );
    }

   /* public function testSolve4(): void
    {
        $this->assertEquals(
            [-0.1002, -0.1002], Equation::solve(0.1, 2.004, 10.04)
        );
    }*/

    public function testSolve5(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Equation::solve(0.00001, 0, 0);
    }
}