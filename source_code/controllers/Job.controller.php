<?php
include_once("conf.php");
include_once("models/Job.class.php");
include_once("models/Template.class.php");
include_once("views/Job.view.php");

class JobController {
  private $job;

  function __construct(){
    $this->job = new Job(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index($id = "") {
    $this->job->open();
    
    $data = array(
        'jobs' => array(),
        'job_update'
    );

    $this->job->getJobs();
    while($row = $this->job->getResult()){
        array_push($data['jobs'], $row);
    }

    if(!empty($id)){
        $this->job->getJobById($id);
        $data['job_update'] = $this->job->getResult();
    }
    
    $this->job->close();

    $view = new JobView();
    $view->render($data);
  }
  
  function add($data){
    $this->job->open();
    $this->job->addJob($data);
    $this->job->close();
    
    header("location:job.php");
  }

  function edit($id, $data){
    $this->job->open();
    $this->job->updateJob($id, $data);
    $this->job->close();

    header("location:job.php");
  }

  function delete($id){
    $this->job->open();
    $this->job->deleteJob($id);
    $this->job->close();

    header("location:job.php");
  }

}