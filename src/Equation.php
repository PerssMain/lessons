<?php declare(strict_types=1);

final class Equation
{
    const SCALE = 4;

    public static function solve(float $a, float $b, float $c): array
    {
        if (is_nan($a) || is_nan($b) || is_nan($c)) {
            throw new InvalidArgumentException("arguments must not be NaN");
        }

        if (is_finite($a) || is_finite($b) || is_finite($c)) {
            throw new InvalidArgumentException("arguments must not be infinite");
        }

        if (abs($a) <= PHP_FLOAT_EPSILON) {
            throw new InvalidArgumentException("a = 0, it is not a square equation");
        }

        $D = $b * $b - 4 * $a * $c;

        if ($D < -PHP_FLOAT_EPSILON) {
            return [];
        } else if (abs($D) <= PHP_FLOAT_EPSILON) {
            $result = -$b / (2 * $a);
            return [$result, $result];
        } else {
            $result1 = (-$b + sqrt($D)) / (2 * $a);
            $result2 = (-$b - sqrt($D)) / (2 * $a);

            return [$result1, $result2];
        }
    }
}