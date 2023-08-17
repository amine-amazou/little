<?php

    namespace Core;

    class Model {

        protected static $table;
        protected static $data;

        public function __construct()
        {
            is_null(static::$table) && static::$table = self::extractClassName() . 's';
        }

        static protected function extractClassName() {
            return array_reverse(explode('\\', strtolower(get_called_class())))[0];
        }
        static function all() {
            $table = static::$table;
            static::$data = DB::query("SELECT * FROM $table", self::extractClassName());
            return static::get();
        }

        static function find($id = 0) {
            $table = static::$table;
            static::$data = DB::query("SELECT * FROM $table WHERE id = $id");
            return static::class;
        }

        static function findByIdAndUpdate($id = 0, array $attributes = []) {

        }

        static function findByIdAndDelete($id = 0) {

        }

        static function findAndDelete(string $searching_attribute, string $searching_value) {

        }

        public function where() {

        }

        public function first() {

        }

        public function last() {

        }

        public function lastest() {

        }

        public function limit() {

        }

        protected function hasOne($class, $id) {
            $table = $class::extractClassName() . 's';
            return DB::query("SELECT * FROM $table WHERE id = $id");
        }

        protected static function get() {
            return static::$data;
        }

    }