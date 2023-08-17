<?php
    namespace App\Model;

    use \Core\Model;

    class User extends Model {

        protected static $table = 'utilisateurs';
        public $id;

        public function role() {
            return $this->hasOne(Role::class, $this->id);
        }
        
    }
    