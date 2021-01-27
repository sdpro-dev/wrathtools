<?php
/**
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 */
namespace Wrath\Controller;

use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LeapYearController
 * @package Controller
 */
class LeapYearController
{
    public function index(Request $request): Response
    {
        if ($this->checkLeapYear($request->attributes->get('year'))) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('Nope, this is not a leap year.');
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