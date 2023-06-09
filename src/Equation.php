<?php declare(strict_types=1);

final class Equation
{
    const SCALE = 4;

    public function solve(float $a, float $b, float $c): array
    {
        if (is_nan($a) || is_nan($b) || is_nan($c)) {
            throw new InvalidArgumentException("arguments must not be NaN");
        }

        if (is_infinite($a) || is_infinite($b) || is_infinite($c)) {
            throw new InvalidArgumentException("arguments must not be infinite");
        }

        if (self::equalToZero($a)) {
            throw new InvalidArgumentException('"a" cannot be equal to 0');
        }

        if (self::equalToZero($b)) {
            if (self::lessThanZero($c)) {
                $x1 = sqrt(abs($c / $a));
                $x2 = -$x1;
            } elseif (self::equalToZero($c)) {
                $x1 = $x2 = 0;
            } else {
                return [];
            }
        } else {
            $d = $b * $b - 4 * $a * $c;
            if (self::greaterThanZero($d)) {
                $x1 = (-$b + sqrt($d)) / 2 * $a;
                $x2 = (-$b - sqrt($d)) / 2 * $a;
            } elseif (self::equalToZero($d)) {
                $x1 = $x2 = (-$b) / 2 * $a;
            } else {
                return [];
            }
        }

        return [$x1, $x2];
    }

    private function equalToZero(float $f): bool
    {
        return 0 === bccomp(number_format($f, 10), '0', self::SCALE);
    }

    private function greaterThanZero(float $f): bool
    {
        return 1 === bccomp(number_format($f, 10), '0', self::SCALE);
    }

    private function lessThanZero(float $f): bool
    {
        return -1 === bccomp(number_format($f, 10), '0', self::SCALE);
    }
}