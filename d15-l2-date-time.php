<?php  
    date_default_timezone_set("Asia/Dhaka");
    echo date("d/m/y D")."<br>";
    echo date("d/M/Y l h:i:s a")."<br>";
    echo date("d/F/Y l H:i:s A")."<br>";

    // mktime(hour, minute, second, month, day, year)
    $myBirhtday = mktime(0,0,0,9,10,2025);
    echo date("d/F/Y l", $myBirhtday)."<br>";

    // strtotime()
    $nextSunday = strtotime("next sunday");
    echo date("d/F/Y l", $nextSunday)."<br>";

    $nextMyDay = strtotime("+3 years +4 months +5 days");
    echo date("d/F/Y l", $nextMyDay)."<br>";

    // print next 7 friday
    $startDay = strtotime("next friday");
    $endDay = strtotime("+6 weeks", $startDay);
    while($startDay <= $endDay){
        echo date("d/F/Y l", $startDay)."<br>";
        $startDay = strtotime("+1 week", $startDay);
    }

    // date diff
    $date1 = date_create("1987-09-10");
    $date2 = date_create(datetime: date("Y-m-d", strtotime("now")));
    $diff = date_diff($date1, $date2);
    // dif in year month day
    echo $diff->format("%Y years %M months %D days")."<br>";

