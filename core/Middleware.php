<?php

    namespace Core;

    abstract class Middleware {

        abstract static function handler(): bool;

    }