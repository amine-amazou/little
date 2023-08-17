<?php
    namespace Core\CLI;

    class Formater {

        public function reformatName($name, $file_type) {
            $lower_name = strtolower($name);
            switch ($file_type) {
                case 'model':
                    if(strrev($lower_name)[0] == 's') {
                        $name = substr($name, 0, -1);
                    }
                    return ucfirst($name);
                default: 
                    return $name;
            }
        }

        public function colorToGreen() {
            return "\033[32m";
        }

        public function colorToWhite() {
            return "\033[37m";
        }
        
    }