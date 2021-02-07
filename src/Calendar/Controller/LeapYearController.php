<?php
/**
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 */
namespace Calendar\Controller;

use Calendar\Model\LeapYear;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LeapYearController
 * @package Controller
 */
class LeapYearController
{
    public function index(Request $request, $year): Response
    {
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            return new Response('Yep sure is!');
        }

        return new Response('Nope it isnt!');
    }

    /**
     * Check given year (ex: 2009) to get back in is a Leap Year
     * @param string $year
     *
     * @return bool
     */
    #[Pure] private function checkLeapYear(string $year): Bool
    {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
    }
}