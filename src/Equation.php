<?php declare(strict_types=1);

final class Equation
{
    public static function solve(float $a, float $b, float $c)
    {
        if (self::isEquals($a, 0)) {
            throw new InvalidArgumentException("Корней нет");
        }

        self::validate([$a, $b, $c]);

        $discriminant = $b * $b - 4 * $a * $c;

        if (self::isEquals($discriminant, 0)) {
            return [-$b / (2 * $a), -$b / (2 * $a)];
        } else if ($discriminant >= 0) {
            return [(-$b + sqrt($discriminant)) / (2 * $a), (-$b - sqrt($discriminant)) / (2 * $a)];
        } else {
            throw new InvalidArgumentException("решения нет");
        }
    }

    public static function isEquals($a, $b)
    {
        return abs($a - $b) < 0.0001;
    }

    private static function validate($arr)
    {
        foreach ($arr as &$value) {
            if (is_infinite($value)) {
                throw new InvalidArgumentException("Указано бесконечное число");
            }
            if (is_nan($value)) {
                throw new InvalidArgumentException("Указано неопределенное число");
            }
        }
    }
}