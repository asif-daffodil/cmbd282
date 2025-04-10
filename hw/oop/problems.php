<?php  
    // question 4
    class sortsinteger
    {
        public function sortFunc (array $arr): array
        {
            sort($arr);
            return $arr;
        }
    }

    $sortsintegerObject = new sortsinteger;
    // echo "<pre>";
    print_r($sortsintegerObject->sortFunc([11, -2, 4, 35, 0, 8, -9]));
    // echo "</pre>";

    class MyCalculator {
        private $num1;
        private $num2;

        public function __construct($num1, $num2)
        {
            $this->num1 = $num1;
            $this->num2 = $num2;
        }

        public function add(): int
        {
            return $this->num1 + $this->num2;
        }

        public function subtract(): int
        {
            return $this->num1 - $this->num2;
        }

        public function multiply(): int
        {
            return $this->num1 * $this->num2;
        }

        public function divide(): float
        {
            return $this->num1 / $this->num2;
        }
    }

    $mycalc = new MyCalculator( 12, 6);
    echo $mycalc->add()."\n";
    echo $mycalc->subtract()."\n";
    echo $mycalc->multiply()."\n";
    echo $mycalc->divide()."\n";
?>