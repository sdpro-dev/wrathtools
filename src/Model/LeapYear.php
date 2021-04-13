<?php
/*
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 *
 */
namespace Model;

/**
 * Class LeapYear
 * @package Model
 */
class LeapYear
{
    /**
     * @param null $year
     * @return bool
     */
    public function isLeapYear($year = null): bool {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
    }
}