<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Job.class.php");
include_once("models/Template.class.php");
include_once("views/Member.view.php");
include_once("views/Form.view.php");

class MemberController {
  private $member;
  private $job;

  function __construct(){
    $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->job = new Job(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->member->open();
    $this->job->open();
    $this->member->getMembersJoin();
    
    $this->job->getJobs();
    
    $data = array(
      'members' => array(),
      'jobs' => array()
    );

    while($row = $this->member->getResult()){
      array_push($data['members'], $row);
    }
    while($row = $this->job->getResult()){
      array_push($data['jobs'], $row);
    }

    $this->member->close();
    $this->job->close();

    $view = new MemberView();
    $view->render($data);
  }

  public function form($id = "") {

    $data = array(
      'members' => array(),
      'jobs' => array()
    );

    $this->job->open();
    $this->job->getJobs();

    while($row = $this->job->getResult()){
      array_push($data['jobs'], $row);
    }

    $this->job->close();
    
    if(!empty($id)){
      $this->member->open();

      $this->member->getMemberById($id);
      $data['members'] = $this->member->getResult();

      $this->member->close();
    }

    $view = new FormView();
    $view->render($data);
  }
  
  function add($data){
    $this->member->open();
    $this->member->addMember($data);
    $this->member->close();
    
    header("location:index.php");
  }

  function edit($id, $data){
    $this->member->open();
    $this->member->updateMember($id, $data);
    $this->member->close();

    header("location:index.php");
  }

  function delete($id){
    $this->member->open();
    $this->member->deleteMember($id);
    $this->member->close();

    header("location:index.php");
  }

}