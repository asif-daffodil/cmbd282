<?php  
    // Namespace
    namespace school2;
    // Traits
    trait schoolTrait {
        public function mySchool ()
        {
            return "I am a student of ABC School";
        }

        public function myClass ()
        {
            return "I am a student of Class 10";
        }
    }
    // Late Static Bindings
    class school {
        public static string $schoolName = "ABC School";
        public static function mySchool (): string
        {
            return "I am a student of ABC School";
        }

        public static function myClass (): string
        {
            return "I am a student of Class 10";
        }
    }

    echo school::mySchool()."<br>";
    echo school::$schoolName."<br>";

    // Objects and references
    class student {
        use schoolTrait;
        public string $studentName = "Kamal Khan";
        protected int $studentRoll = 101;
        private int $studentAge = 18;
    }

    $studentObj = new student;
    $studentObj2 = $studentObj;

    $studentObj2->studentName = "Kuddus Boyati";
    echo $studentObj->studentName."<br>";

    // Serialization
    $studentObj3 = serialize($studentObj);
    echo $studentObj3."<br>";

    $studentObj4 = unserialize($studentObj3);

    // use schoolTrait
    class studentInfo {
        use schoolTrait;
        public function studentName ()
        {
            return "My name is Kamal Khan";
        }

        public function studentRoll ()
        {
            return 101;
        }
    }
?>