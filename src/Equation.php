<?php declare(strict_types=1);

final class Equation
{
    public static function solve(float $a, float $b, float $c): array
    {
        if (is_nan($a) || is_nan($b) || is_nan($c)) {
            throw new InvalidArgumentException("arguments must not be NaN");
        }

        if (is_infinite($a) || is_infinite($b) || is_infinite($c)) {
            throw new InvalidArgumentException("arguments must not be infinite");
        }

        if (abs($a) <= PHP_FLOAT_EPSILON) {
            throw new InvalidArgumentException("a = 0, it is not a square equation");
        }

        $D = $b * $b - 4 * $a * $c;

        if ($D < -PHP_FLOAT_EPSILON) {
            return [];
        } else if (abs($D) <= PHP_FLOAT_EPSILON) {
            $res = -$b / (2 * $a);
            return [$res, $res];
        } else {
            $res1 = (-$b + sqrt(D)) / (2 * $a);
            $res2 = (-$b - sqrt(D)) / (2 * $a);

            return [$res1, $res2];
        }
    }

    function is_blank($value) {
        return empty($value) && !is_numeric($value);
    }
}
