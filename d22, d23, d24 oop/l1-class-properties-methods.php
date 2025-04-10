<?php  
    class studentsInfo {
        public $studentName = "Kamal Khan";
        // public const gender = "Male";
        protected const gender = "Male";
        private $isMarrid = false;
        public static $studentRoll = 101;

        public function studentAge () 
        {
            return $this->studentName ." age is 18 and his marital status is ". $this->isMarrid;
        }

        public function __construct() 
        {
            echo "Ami Constructor function.. ha ha ha.. <br>";
        }

        public function __destruct() 
        {
            echo "<br>Ami Destructor function.. ha ha ha..";
        }

        public static function studentRoll () 
        {
            return "Student Roll is 101";
        }
    }

    $studentObj = new studentsInfo;
    $studentObj->studentName = "Kuddus Boyati";
    echo $studentObj->studentName."<br>";
    echo $studentObj->studentAge()."<br>";
    // echo $studentObj::gender."<br>";
    // echo $studentObj->isMarrid."<br>";
    echo studentsInfo::$studentRoll."<br>";
    echo studentsInfo::studentRoll()."<br>";

    // Inheritance
    class studentDetails extends studentsInfo {
        public function studentDetailsAll ()
        {
            // echo $this->isMarrid;
            return "Student name is ".$this->studentName.", students gender is ".$this::gender." and student roll is ".$this::$studentRoll;
        }
    }

    $studentDetailsObj = new studentDetails;
    echo $studentDetailsObj->studentDetailsAll();
?>