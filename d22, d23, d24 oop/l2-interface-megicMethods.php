<?php  
    // Interfaces

    interface school {
        public function mySchool ();
        public function myClass ();
    }

    interface student {
        public function studentName ();
        public function studentRoll ();
    }

    class studentInfo implements school, student {
        protected $schoolName = "ABC School";
        protected $className = "Class 10";
        protected $studentName = "Kamal Khan";
        protected $studentRoll = 101;
        public function mySchool ()
        {
            return "I am a student of ".$this->schoolName;
        }

        public function myClass ()
        {
            return "I am a student of ".$this->className;
        }

        public function studentName ()
        {
            return "My name is ".$this->studentName;
        }

        public function studentRoll ()
        {
            return "My roll is ".$this->studentRoll;
        }
    }

    $studentInfoObj = new studentInfo;
    echo $studentInfoObj->mySchool()."<br>";
    echo $studentInfoObj->myClass()."<br>";
    echo $studentInfoObj->studentName()."<br>";
    echo $studentInfoObj->studentRoll()."<br>";

    // Overrides
    class studentInfo2 extends studentInfo {
        protected $schoolName = "XYZ School";
        protected $className = "Class 9";
        protected $studentName = "Kuddus Boyati";
        protected $studentRoll = 102;
    }

    // Magic methods

    class studentInfo3 {
        public $studentName = "Kamal Khan";
        protected $studentRoll = 101;
        private $studentAge = 18;

        public $properties = [];
        
        public function __get ($property) 
        {
            if (property_exists($this, $property)) {
                return $this->$property;
            }elseif(array_key_exists($property, $this->properties)) {
                return $this->properties[$property];
            }else{
                return "Property does not exist";
            }
        }

        public function __set ($property, $value) 
        {
            if(array_key_exists($property, $this->properties)) {
                $this->properties[$property] = $value;
            }else{
                array_push($this->properties, $property);
                $this->properties[$property] = $value;
            }
        }

        public function __isset ($property) 
        {
            return isset($this->$property);
        }

        public function __unset ($property) 
        {
            if (isset($this->$property)) {
                unset($this->$property);
            }else if(array_key_exists($property, $this->properties)) {
                unset($this->properties[$property]);
            }else{
                return "Property does not exist";
            }
        }

        public function __call ($method, $args) 
        {
            if (method_exists($this, $method)) {
                return $this->$method($args);
            }else{
                return "Method does not exist";
            }
        }

        public static function __callStatic ($method, $args) 
        {
            return "Method name is ".$method." and arguments are ".implode(", ", $args);
        }

        public function __toString () 
        {
            return "Student roll is ".$this->studentRoll;
        }

        public function __invoke ($data) 
        {
            return "Invoked with ".$data;
        }
    }

    $studentInfoObj3 = new studentInfo3;
    // $studentInfoObj3->studentCity = "Dhaka";
    // echo $studentInfoObj3->studentCity."<br>";

    // __isset
    echo isset($studentInfoObj3->studentName)."<br>";
    echo isset($studentInfoObj3->studentCity)."<br>";

    // __unset
    unset($studentInfoObj3->studentName);

    // __call
    echo $studentInfoObj3->studentAge()."<br>";

    // __callStatic
    echo studentInfo3::studentCity("Dhaka", "Chittagong", "Rajshahi")."<br>";

    // __toString
    echo $studentInfoObj3."<br>";

    // __invoke
    echo $studentInfoObj3("Hello World")."<br>";



?>