<?php
    namespace Core;

    class Request {

        function __construct()
        {
           $this->init();
        }
        public function __get($key) {
            return $this->$key;
        }
        public function init() {
            foreach($_REQUEST as $key=>$value) {
                $this->$key = $value;
            }
        }

    }