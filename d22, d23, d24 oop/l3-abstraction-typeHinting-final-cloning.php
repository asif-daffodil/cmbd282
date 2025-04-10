<?php  
    // abstraction
    // Namespace
    namespace school1;
    abstract class school {
        public static string $schoolName = "ABC School";
        abstract public function mySchool (): string;
        abstract public function myClass (): mixed;
    }

    class student extends school {
        public function mySchool () : string
        {
            return "I am a student of ABC School";
        }

        public function myClass () : string
        {
            return "I am a student of Class 10";
        }
    }

    final class studentInfo extends student {
        public function studentName () : string
        {
            return "My name is Kamal Khan";
        }

        public function studentRoll () : int
        {
            return 101;
        }
    }

    $studentInfoObj = new studentInfo;

    // Cloning
    $studentInfoObj2 = clone $studentInfoObj;

    // Comparing Objects
    if ($studentInfoObj === $studentInfoObj2) {
        echo "Both objects are same";
    } else {
        echo "Both objects are different";
    }

?>