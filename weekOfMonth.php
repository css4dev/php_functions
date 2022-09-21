<?php
function weekOfMonth($date)
{
    $year = date('y', strtotime($date));
    return weekOfYear($date) - weekOfYear('1-' . $date . '-' . $year);
}
