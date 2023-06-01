<?php

class FormView {
    public function render($data){
        
        $name = "";
        $email = "";
        $phone = "";
        $job_id = "";
        $dataJobs = null;
        $form_title = "Add";
        
        if(!empty($data['members'])){
            $val = $data['members'];

            $name = $val['name'];
            $email = $val['email'];
            $phone = $val['phone'];
            $job_id = $val['job_id'];

            foreach($data['jobs'] as $val){
                list($id, $job_title) = $val;
                $selected = ($id == $job_id) ? "selected" : "";
                $dataJobs .= "<option value='".$id."' ".$selected.">".$job_title."</option>";
            }

            $form_title = "Update";
        }
        else{
            foreach($data['jobs'] as $val){
                list($id, $job_title) = $val;
                $dataJobs .= "<option value='".$id."'>".$job_title."</option>";
            }
        }

        $tpl = new Template("views/templates/form.html");
        
        $tpl->replace("MEMBER_NAME", $name);
        $tpl->replace("MEMBER_EMAIL", $email);
        $tpl->replace("MEMBER_PHONE", $phone);
        $tpl->replace("OPTION_JOBS", $dataJobs);
        $tpl->replace("ADD_OR_UPDATE", $form_title);

        $tpl->write(); 
    }
}
?>
