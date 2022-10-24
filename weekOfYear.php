<?php
//this function to calculate week of year for sepecified date
//this function for muslims for week starts from saturday
function weekOfYear($date)
{
    $year = date('y', strtotime($date));
    $firstDay = date('l', strtotime($year.'-01-01'));
    $daysOfWeek = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    $dayOfYear = date('z', strtotime($date)) ;
    $shift = 7 - (array_search($firstDay, $daysOfWeek) );
    $firstDayOfWeek="Monday";
    $holidayShift =  (array_search($firstDayOfWeek, $daysOfWeek) );
    $weekOfYear =  floor((($dayOfYear - $shift) / 7 + $holidayShift));
    return $weekOfYear;
}
