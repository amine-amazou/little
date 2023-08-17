<?php
    namespace Core;

use Error;

    class Layout {
        protected static $master_page;
        protected static $yield_name;
        protected static $itextends;

        private function extract_path(string $view_name) {
            return '../ressources/views/' . implode('/', explode('.', $view_name)) . '.view.php';
        }

        public function set_master(string $master_page) {
            self::$master_page = $master_page;
            
        }

        public function set_yield(string $yield_name) {
            self::$yield_name = $yield_name;
        }
        
        public function it_extends() {
            return !is_null(self::$master_page) && !is_null(self::$yield_name);
        }

        public function load($view_name, $variables) {
            ob_start();
            extract($variables);
            require $this->extract_path($view_name);
            $content = ob_get_clean();
            if(Layout::it_extends()) {
                Yields::get(self::$yield_name)->fillContent($content);
                require $this->extract_path(self::$master_page);
                die();
            } else {
                echo $content;
            }
        }
        public function getMaster() {
            return self::$master_page;
        }
        public function getYield() {
            return self::$yield_name;
        }
    }