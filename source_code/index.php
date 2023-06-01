<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();

if (!empty($_GET['id'])) {
    //memanggil delete
    $member->delete($_GET['id']);
} else{
    $member->index();
}
