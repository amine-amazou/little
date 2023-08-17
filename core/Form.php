<?php
    namespace Core;
    class Form {

        static function input (string $name, string $type = 'text', string $value = '', string $placeholder = '', bool $required = false) {
            $l_name = strtolower($name);
            return " {$name}:   <input
                                    type='{$type}' 
                                    value='{$value}' 
                                    name='{$l_name}'
                                    placeholder='{$placeholder}' 
                                    required='{$required}' 
                                    style='margin:3px'
                                > <br>";
        }
        static function submit(string $name='Submit') {
            return "<input
                        type='submit' 
                        value='{$name}'
                    > <br>";
        }

    }