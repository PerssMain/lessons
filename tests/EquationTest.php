<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EquationTest extends TestCase
{
    // Написать тест, который проверяет, что для уравнения x^2+1 = 0 корней нет (возвращается пустой массив)
    public function solveTest1(): void
    {
        //arrange
        $a = 1;
        $b = 0;
        $c = 1;

        //act
        $actual = Equation::solve($a, $b, $c);

        //assert
        $this->assertThat($actual,is_blank($actual), "roots of equation");
    }
}
