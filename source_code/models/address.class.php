<?php

class Address extends DB
{
    function getAddresses()
    {
        $query = "SELECT * FROM addresses";
        return $this->execute($query);
    }

    function addAddress($data)
    {
        $member_id = $data['member_id'];
        $address = $data['address'];
        $city = $data['city'];
        $postal_code = $data['postal_code'];

        $query = "INSERT INTO addresses (member_id, address, city, postal_code) VALUES ('$member_id', '$address', '$city', '$postal_code')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function updateAddress($id, $data)
    {
        $member_id = $data['member_id'];
        $address = $data['address'];
        $city = $data['city'];
        $postal_code = $data['postal_code'];

        $query = "UPDATE addresses SET member_id = '$member_id', address = '$address', city = '$city', postal_code = '$postal_code' WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function deleteAddress($id)
    {
        $query = "DELETE FROM addresses WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function getAddressById($id)
    {
        $query = "SELECT * FROM addresses WHERE id = '$id'";
        return $this->execute($query);
    }
}