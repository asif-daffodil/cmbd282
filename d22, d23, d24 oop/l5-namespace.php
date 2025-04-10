<?php  
    require_once "./l3-abstraction-typeHinting-final-cloning.php";
    use school1\school as school1;

    require_once "./l4-staticBindings-references-.serialization-Traits.php";
    use school2\school as school2;

    // Functions that work with classes
    function mySchool (school1 $school) {
        return $school->mySchool();
    }

    // Exceptions
    class myException extends Exception {
        public function errorMessage () {
            $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile().': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
            return $errorMsg;
        }
    }

    $myExceptionObj = new myException;
    echo $myExceptionObj->errorMessage();
?>  