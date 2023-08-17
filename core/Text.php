<?php
    namespace Core;
    class Text {
        
        static function h1(string $content) {
            return "<h1> {$content} </h1>";
        }
    }