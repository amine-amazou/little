<?php
    require __DIR__ . '/../core/App.php';
    use Core\App;
    App::init();
    
    //echo "<hr>";
    //var_dump($_SERVER['REQUEST_METHOD'] . '/' . join('/', array_slice(explode("/", $_SERVER['REQUEST_URI']), 2)));
    //var_dump(parse_url($_SERVER['REQUEST_URI']));
    //echo "<hr>";
    //$url = parse_url($_SERVER['REQUEST_URI'])['path'];
    //echo '/' . join('/', array_slice(explode("/", $url), 2));
