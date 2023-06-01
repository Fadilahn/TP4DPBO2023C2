<?php

class MemberView {
    public function render($data){
        $no = 1;
        $dataMembers = null;
        $dataJobs = null;

        foreach($data['members'] as $val){
            list($id, $name, $email, $phone, $job_id) = $val;
            $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $val['job_title'] . "</td>
                <td>
                    <a href='form.php?id=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='index.php?id=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        foreach($data['jobs'] as $val){
            list($id, $job_title) = $val;
            $dataJobs .= "<option value='".$id."'>".$job_title."</option>";
        }

        $tpl = new Template("views/templates/index.html");

        $tpl->replace("OPTION_JOBS", $dataJobs);
        $tpl->replace("DATA_MEMBERS", $dataMembers);
        $tpl->write(); 
    }
}
?>
