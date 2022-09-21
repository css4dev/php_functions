function firstAndEndDateOfWeek($date)
{
    $day = date('l', strtotime($date));

    $daysOfWeek = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    $dayOfWeek = array_search($day, $daysOfWeek) + 1;
    $firstDayOfWeek = date('Y-m-d', strtotime($date . ' - ' . $dayOfWeek . ' days'));
    $endDayOfWeek = date('Y-m-d', strtotime($firstDayOfWeek . ' + 6 days'));
    //print_r(array($firstDayOfWeek,$endDayOfWeek));
    return array($firstDayOfWeek, $endDayOfWeek);
}
