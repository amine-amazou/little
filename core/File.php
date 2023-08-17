<?php
    namespace Core;

    class File {

        public function create(string $file_name, string $path='storage/', string $extension = '.txt') {
            fopen(__DIR__ . '/../' . $path . $file_name . $extension, "w", true);
        }

        public function fill(string $file_name, string $path='storage/', string $extension = '.txt', $content) {
            file_put_contents(__DIR__ . '/../' . $path . $file_name . $extension, $content);
        }
        
        public function read(string $file_name, string $path='storage/', string $extension = '.txt') {
            return file_get_contents(__DIR__ . '/../' . $path . $file_name . $extension, true);
        }
    }