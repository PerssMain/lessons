<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EquationTest extends TestCase
{
    /**
     * 3 Написать тест, который проверяет, что для уравнения x^2+1 = 0 корней нет (возвращается пустой массив)
     */
    public function testSolve3(): void
    {
        $this->assertEmpty(
            Equation::solve(1, 0, 1)
        );
    }

    /**
     * 5 Написать тест, который проверяет, что для уравнения x^2-1 = 0 есть два корня кратности 1 (x1=1, x2=-1)
     */
    public function testSolve5(): void
    {
        $this->assertEquals(
            Equation::solve(1, 0, -1)
        );
    }

    /**
     * 7 Написать тест, который проверяет, что для уравнения x^2+2x+1 = 0 есть один корень кратности 2 (x1= x2 = -1).
     */
    public function testSolve7(): void
    {
        $this->assertEquals(
            [-1, -1],
            Equation::solve(1, 2, 1)
        );
    }

    /**
     * 9 Написать тест, который проверяет, что коэффициент a не может быть равен 0. В этом случае solve выбрасывает исключение.
     */
    public function testSolve9(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Equation::solve(0.00001, 0, 0);
    }


    /**
     * 7 Написать тест, который проверяет, что для уравнения x^2+2x+1 = 0 есть один корень кратности 2 (x1= x2 = -1).
     */
    public function testSolve7_2(): void
    {
        $this->assertEquals(
            [-1, -1],
            Equation::solve(1, 2, 0.999999999)
        );
    }

    /**
     * 13 Посмотреть какие еще значения могут принимать числа типа double,
     * кроме числовых и написать тест с их использованием на все коэффициенты. solve должен выбрасывать исключение.
     */
    public function testSolve13(): void
    {
        $list = [NULL, log(0), acos(8), '3', 'f'];

        foreach (Equation::permutations($list) as $permutation) {
            $this->expectException(InvalidArgumentException::class);
            Equation::solve($permutation[0], $permutation[1], $permutation[2]);
        }
    }
}