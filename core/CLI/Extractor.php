<?php
    namespace Core\CLI;

    class Extractor {

        private static function extract($command, $index) {
            return strtolower(explode(':', $command)[$index]);
        }
        public function extractCommandType($command) {
            return static::extract($command, 0);
        }
        public function extractFileType($command) {
            return static::extract($command, 1);
        }
        public function extractShortcut($command) {
            count($command) > 3 && str_replace('-', '', $command[3]);
        }

        public function getDirectory($type) {
            $dir = '';
            switch ($type) {
                case 'view':
                    $dir = 'ressources/views/';
                    break;
                case 'controller':
                    $dir = 'app/Controller/';
                    break;
                case 'model':
                    $dir = 'app/Model/';
                    break;
                case 'middleware':
                    $dir = 'app/Middleware/';
                    break;
                default:
                    break;
            }
            return $dir;
        }
        
        public function getExtension($type) {
            switch ($type) {
                case 'view': 
                    return '.view.php';
                default:
                    return '.php';
            }
        }
    }