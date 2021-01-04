<?php
    function getParameter($par) {
        if(isset($_GET[$par]))
            return $_GET[$par];
        else if($par == 'species' || $par == 'size')
            return "none";
        else
            return "";
    }
    
    $name = getParameter('name');
    $species = getParameter('species');
    $color = getParameter("color"); 
    $min_weight = getParameter("min-weight");
    $max_weight = getParameter("max-weight");
    $min_age = getParameter("min-age");
    $max_age = getParameter("max-age");
    $size = getParameter("size");
?>