<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Job.controller.php");

$job = new JobController();

if (isset($_POST['add'])) {
    //memanggil add
    $job->add($_POST);
} else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    // $job->edit($id, $data);
} else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $job->delete($id);
} else{
    $job->index();
}
