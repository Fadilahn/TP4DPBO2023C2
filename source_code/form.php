<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();

if (isset($_POST['add'])) {
    //memanggil add
    $member->add($_POST);
} else if (!empty($_GET['id'])) {
    //memanggil add
    $member->form($_GET['id']);
} else{
    $member->form();
}
