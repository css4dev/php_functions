<?php 
function firstAndEndDateOfWeek($month, $weekNum, $year)
{

   
    $firstDayOfMonth =$year. '-'. $month.'-01';

    $week = weekOfYear($firstDayOfMonth); 
  
    //week num for first week of month
    $weekNumOfYear = $week + $weekNum - 1;
    
    $firstDay = date('l', strtotime($year.'-01-01'));
    $daysOfWeek = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    $shift = 7 - (array_search($firstDay, $daysOfWeek) );
        $firstDayOfWeek="Monday";
    $holidayShift =  (array_search($firstDayOfWeek, $daysOfWeek) );
    $dayOfYear = ($weekNumOfYear -$holidayShift) * 7 + $shift ;
    $firstDayOfWeek1 = date('Y-m-d', strtotime($year."-01-01" . " + " . $dayOfYear    . " days"));
   
        $firstDayOfWeek = $firstDayOfWeek1;
    
    $lastDayOfMonthInt = new DateTime($firstDayOfWeek);
    $lastDayOfMonth = $lastDayOfMonthInt->format('t');
    $endDayOfWeek1 = date('Y-m-d', strtotime($firstDayOfWeek . ' + 6 days'));
  
        $endDayOfWeek = $endDayOfWeek1;
        $allArray=array();
        for( $i=0;$i<5;$i++){
                $endDayOfWeek1 = date('Y-m-d', strtotime($firstDayOfWeek . ' + ' .$i .'days'));

   array_push($allArray,$endDayOfWeek1);
        }
    return $allArray;
}
