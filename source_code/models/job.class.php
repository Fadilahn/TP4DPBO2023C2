<?php

class Job extends DB
{
    function getJobs()
    {
        $query = "SELECT * FROM job";
        return $this->execute($query);
    }

    function addJob($data)
    {
        $job_title = $data['job_title'];
        $salary = $data['salary'];

        $query = "INSERT INTO job (job_title, salary) VALUES ('$job_title', '$salary')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function updateJob($id, $data)
    {
        $job_title = $data['job_title'];
        $salary = $data['salary'];

        $query = "UPDATE job SET job_title = '$job_title', salary = '$salary' WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function deleteJob($id)
    {
        $query = "DELETE FROM job WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function getJobById($id)
    {
        $query = "SELECT * FROM job WHERE id = '$id'";
        return $this->execute($query);
    }
}