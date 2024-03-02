<?php

namespace App\Helpers;

use DateTime;

class Date
{

    /**
     * Format datetime
     *
     * @param $date
     * @return mixed|string
     */
    public static function format($date) {
        return $date instanceof DateTime ? $date->format('d.m.Y H:i:s') : $date;
    }

    /**
     * Display age in format:
     * '%y years, %m months and %d days old'
     * '%y years and %m months old'
     * '%m years and %d days old'
     *
     * @param \DateTime $born
     * @param \DateTime $reference
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public static function age(DateTime $born, DateTime $reference = null)
    {
        $reference = $reference ?: new DateTime;

        if ($born > $reference)
            throw new \InvalidArgumentException('Provided birthday cannot be in future compared to the reference date.');

        $diff = $reference->diff($born);

        $sep = 'и';

        // Not very readable, but all it does is joining age
        // parts using either ',' or 'and' appropriately
        $age = ($d = $diff->d) ? ' ' . $sep . ' ' . $d . ' ' . self::str_plural('day', $d) : '';
        $age = ($m = $diff->m) ? ($age ? ', ' : '  ') . $m . ' ' . self::str_plural('month', $m) . $age : $age;
        $age = ($y = $diff->y) ? $y . ' ' . self::str_plural('year', $y) . $age : $age;

        $age = trim($age);
        $f2 = substr($age, 0, 2);

        return in_array($f2, [$sep, ', ']) ? substr($age, 2) : $age;
    }

    /**
     * Pluralize
     * @param $t
     * @param $n
     * @return string
     */
    public static function str_plural($t, $n)
    {
        switch ($t) {
            case 'day':
                $t1 = 'ден';
                $t2 = 'денови';
                break;
            case 'month':
                $t1 = 'месец';
                $t2 = 'месеци';
                break;
            case 'year':
                $t1 = 'година';
                $t2 = 'години';
                break;
            default:
                $t1 = '';
                $t2 = '';
                break;
        }

        return $n > 1 ? $t2 : $t1;
    }
}
