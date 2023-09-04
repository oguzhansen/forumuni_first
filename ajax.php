<?php

include "core.php";
include "widget.php";

$option = $_GET["option"];

switch($option)
{
    case "arama":

        search();

    break;
}

?>