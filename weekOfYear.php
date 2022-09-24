<?php
//this function to calculate week of year for sepecified date
//this function for muslims for week starts from saturday
function weekOfYear($date)
{
    $year = date('y', strtotime($date));
    $firstDay = date('l', strtotime('01-01-' . $year));
    $daysOfWeek = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    $dayOfYear = date('z', strtotime($date)) + 1;
    $shift = 7 - (array_search($firstDay, $daysOfWeek) + 1);
    $weekOfYear =  floor((($dayOfYear - $shift) / 7 + 2));
    return $weekOfYear;
}
