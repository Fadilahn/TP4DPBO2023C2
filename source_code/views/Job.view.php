<?php

class JobView {
    public function render($data){
        $no = 1;
        $dataJobs = null;

        $form_title = "Add";
        $name_update = "";
        $salary_update = "";

        foreach($data['jobs'] as $val){
            list($id, $name, $salary) = $val;
            $dataJobs .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $salary . "</td>
                <td>
                    <a href='edit_member.php?id=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='delete_member.php?id=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        $tpl = new Template("views/templates/job.html");

        if(!empty($data['job_update'])){
            $form_title = "Update";
            $name_update = $data['job_update']['name'];
            $salary_update = $data['job_update']['salary'];
        }

        $tpl->replace("ADD_OR_UPDATE", $form_title);
        $tpl->replace("JOB_NAME_UPDATE", $name_update);
        $tpl->replace("JOB_SALARY_UPDATE", $salary_update);

        $tpl->replace("DATA_JOBS", $dataJobs);
        $tpl->write(); 
    }
}
?>
