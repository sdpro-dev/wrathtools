<?php
/**
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 */
namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LeapYearController
 * @package Controller
 */
class LeapYearController
{
    /**
     * @param Request $request
     *
     * @return Response
     */
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
    private function checkLeapYear(string $year): Bool
    {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
    }
}