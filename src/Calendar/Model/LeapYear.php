<?php
namespace Calendar\Model;

use JetBrains\PhpStorm\Pure;

class LeapYear
{
    #[Pure] public function isLeapYear($year = null): bool {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
    }
}