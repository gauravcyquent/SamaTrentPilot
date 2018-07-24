<?php
$date_string = "2016-01-01";
$date_int = strtotime($date_string);
$date_date = date($date_int);
$week_number = date('w', $date_date);












echo "Weeknumber: {$week_number}."; ?>