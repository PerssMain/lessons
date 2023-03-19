<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EquationTest extends TestCase
{
    //тест, который проверяет, что для уравнения x^2+1 = 0 корней нет (возвращается пустой массив)
    public function testSolve1(): void
    {
        $this->assertEmpty(
            Equation::solve(1, 0, 1)
        );
    }

    //тест, который проверяет, что для уравнения x^2-1 = 0 есть два корня кратности 1 (x1=1, x2=-1)
    public function testSolve2(): void
    {
        $this->assertEquals(
            [1, -1], Equation::solve(1, 0, -1)
        );
    }

    //тест, который проверяет, что для уравнения x^2+2x+1 = 0 есть один корень кратности 2 (x1= x2 = -1).
    public function testSolve3(): void
    {
        $this->assertEquals(
            [-1, -1], Equation::solve(1, 2, 1)
        );
    }

    //тест, который проверяет, что коэффициент a не может быть равен 0. В этом случае solve выбрасывает исключение
    public function testSolve4(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Equation::solve(0.00001, 0, 0);
    }

    //11 задание
    public function testSolve5(): void
    {
        $this->assertEquals(
            [-0.10020000000000001, -0.10020000000000001], Equation::solve(0.1, 2.004, 10.04)
        );
    }
}