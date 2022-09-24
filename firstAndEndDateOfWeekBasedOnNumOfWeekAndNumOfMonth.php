<?php
function firstAndEndDateOfWeek($month, $weekNum, $year)
{

    $firstDayOfMonth = '01-' . $month . '-' . $year;

    $week = weekOfYear($firstDayOfMonth); //week num for first week of month
    $weekNumOfYear = $week + $weekNum - 1;
    $firstDay = date('l', strtotime('1-1-' . $year));
    $daysOfWeek = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    $shift = 7 - (array_search($firstDay, $daysOfWeek) + 1);
    $dayOfYear = ($weekNumOfYear - 2) * 7 + $shift;
    $firstDayOfWeek1 = date('Y-m-d', strtotime("1-1-" . $year . " + " . $dayOfYear   . " days"));
    if (date('m', strtotime($firstDayOfWeek1)) != $month) {
        $firstDayOfWeek = date('Y-m-d', strtotime("1-" . $month . "-" . $year));
    } else {
        $firstDayOfWeek = $firstDayOfWeek1;
    }
    $lastDayOfMonthInt = new DateTime($firstDayOfWeek);
    $lastDayOfMonth = $lastDayOfMonthInt->format('t');
    $endDayOfWeek1 = date('Y-m-d', strtotime($firstDayOfWeek . ' + 6 days'));
    if (date('m', strtotime($endDayOfWeek1)) != $month) {
        $endDayOfWeek = date('Y-m-d', strtotime($lastDayOfMonth . "-" . $month . "-" . $year));
    } else {
        $endDayOfWeek = $endDayOfWeek1;
    }
    return array($firstDayOfWeek, $endDayOfWeek);
}
