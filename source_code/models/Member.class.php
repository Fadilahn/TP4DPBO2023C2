<?php

class Member extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMembersJoin()
    {
        $query = "SELECT * FROM members JOIN job ON members.job_id=job.id ORDER BY members.id";
        return $this->execute($query);
    }

    function addMember($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $job_id = $data['job'];

        $query = "INSERT INTO members (name, email, phone, job_id) VALUES ('$name', '$email', '$phone', '$job_id')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function updateMember($id, $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $job_id = $data['job_id'];

        $query = "UPDATE members SET name = '$name', email = '$email', phone = '$phone', job_id = '$job_id' WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function deleteMember($id)
    {
        $query = "DELETE FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT * FROM members WHERE id = '$id'";
        return $this->execute($query);
    }
}
