<?php
function weekOfMonth($date)
{
    $year = date('y', strtotime($date));
    $month = date('m', strtotime($date));

    return weekOfYear($date) - weekOfYear($year. '-'. $month . '-' . '01')+1;
}
