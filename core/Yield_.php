<?php
    namespace Core;
    class Yield_ {
        
        public $content;

        function __construct()
        {
            return $this;
        }
        public function init() {
            $this->content = '';
            return $this;
        }
        public function fillContent($content) {
            $this->content = $content;
        }
    }