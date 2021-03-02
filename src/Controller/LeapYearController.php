<?php
/*
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 *
 */
namespace Controller;

use Model\LeapYear;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LeapYearController
 * @package Controller
 */
class LeapYearController
{
    public function index($year): Response
    {
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            return new Response('Yep sure is!');
        }

        return new Response('Nope it isn\'t!');
    }
}