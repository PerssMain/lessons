<?php declare(strict_types=1);

require_once(__ROOT__.'/src/Equation.php');

use PHPUnit\Framework\TestCase;

final class EquationTest extends TestCase
{

    //task 3
    public function testSolve1(): void
    {
        $this->assertEmpty(
            Equation::solve(1, 0, 1)
        );
    }

    //task 5
    public function testSolve2(): void
    {
        $this->assertEquals(
            [1, -1], Equation::solve(1, 0, -1)
        );
    }

    //task 7
    public function testSolve3(): void
    {
        $this->assertEquals(
            [-1, -1], Equation::solve(1, 2, 1)
        );
    }

    //task 9
    public function testSolve4(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Equation::solve(0.00001, 0, 0);
    }

    //task 11
    public function testSolve5(): void
    {
        $this->assertEquals(
            [-0.10020000000000001, -0.10020000000000001], Equation::solve(0.1, 2.004, 10.04)
        );
    }
}