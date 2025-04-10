<?php

// Complete Assignment No 1,2,7



// Question No 1 Start 
class question1
{
    public function displaymsg()
    {
        echo 'Bangladeshi is a Non Democratic Country !';
    }
}
$message1 = new question1();
$message1->displaymsg();

// Question No 1 End


echo "<br>";
echo "<br>";


// Question No 2 Start 
class Introduction
{
    public function question2($name)
    {
        echo "Good Evening My Honorable Teacher & Classmate, I'm $name";
    }
}

$message2 = new Introduction();
$message2->question2("Imran");

// Question No 2 End


echo "<br>";
echo "<br>";


// Question No 7 Start 

$currentDate = '12-08-2004';

$currentDateTime = DateTime::createFromFormat('d-m-Y', $currentDate);

if ($currentDateTime) {
    $formattedDate = $currentDateTime->format('Y-m-d');
    echo $formattedDate;
}
// Question No 7 End 