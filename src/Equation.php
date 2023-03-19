<?php
declare(strict_types=1);

final class Equation
{
    public static function isEquals($a, $b)
    {
        return abs($a - $b) < 0.0001;
    }

    public static function solve(float $a, float $b, float $c)
    {
        if (self::isEquals($a, 0)) {
            throw new InvalidArgumentException("Корней нет");
        }

        self::validate([$a, $b, $c]);

        $discriminant = $b * $b - 4 * $a * $c;

        if (self::isEquals($discriminant, 0)) {
            return [-$b / (2 * $a), -$b / (2 * $a)];
        } else {
            if ($discriminant >= 0) {
                return [(-$b + sqrt($discriminant)) / (2 * $a), (-$b - sqrt($discriminant)) / (2 * $a)];
            } else {
                return [];
            }
        }
    }

    public static function validate($arr)
    {
        foreach ($arr as $value) {
            if (is_infinite($value)) {
                throw new InvalidArgumentException("Указано бесконечное число");
            }
            if (is_nan($value)) {
                throw new InvalidArgumentException("Указано неопределенное число");
            }
        }
    }

    public static function permutations(array $elements)
    {
        if (count($elements) <= 1) {
            yield $elements;
        } else {
            foreach (permutations(array_slice($elements, 1)) as $permutation) {
                foreach (range(0, count($elements) - 1) as $i) {
                    yield array_merge(
                        array_slice($permutation, 0, $i),
                        [$elements[0]],
                        array_slice($permutation, $i)
                    );
                }
            }
        }
    }
}