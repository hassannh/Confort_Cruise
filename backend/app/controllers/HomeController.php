<?php

class HomeController
{

    public function index($page)
    {
        echo '<pre>';
        var_dump("uysgiggqioug");
        echo '</pre>';
        exit;
        include('app/views/' . $page . '.php');
    }


}

?>