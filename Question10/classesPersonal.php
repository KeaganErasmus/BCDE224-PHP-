<?php

    Class Student{
        private $name;
        private $lastName;
        public $code;

        public function studentClass($newName, $newLastName, $newCode){
            $name = $newName;
            $lastName = $newLastName;
            $code = $newCode;

            if ($code === "BCDE224"){
                echo "PHP server side scripting";
            }
            else{
                echo "What is this class";
            }

            return  $name . $lastName . $code;
        }
    }

    $student = new Student();
    $student->studentClass("keagan", "Erasmus", "BCDE224");

?>