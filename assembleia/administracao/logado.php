<?php


// if(!isset($_SESSION)) {
//     session_start();
// }


$home = "/cursoPHP/revisao/assembleia/";
if (!isset($_SESSION['isLogado']) || !$_SESSION['isLogado']) {
    header("location: $home");
}