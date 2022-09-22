function firstAndEndDateOfWeekBasedOnNumOfWeekAndNumOfMonth($month, $weekNum, $year)
{
    $firstDayOfMonth = '1-' . $month . '-' . $year;

    $week = weekOfYear($firstDayOfMonth); //week num for first week of month

    $weekNumOfYear = $week + $weekNum - 1;

    $firstDay = date('l', '1-1-' . $year);

    $daysOfWeek = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    //echo $firstDay.array_search($firstDay,$daysOfWeek);
    $shift = 7 - array_search($firstDay, $daysOfWeek) + 1;

    $dayOfYear = ($weekNumOfYear - 2) * 7;

    $firstDayOfWeek = date('Y-m-d', strtotime("1-1-" . $year . " + " . $dayOfYear   . " days"));
    echo "1-1-" . $year . " + " . $dayOfYear   . " days";
    $endDayOfWeek = date('Y-m-d', strtotime($firstDayOfWeek . ' + 6 days'));
    print_r(array($firstDayOfWeek, $endDayOfWeek));
    return array($firstDayOfWeek, $endDayOfWeek);
}
