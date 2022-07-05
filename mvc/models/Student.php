<?php

include "IModel.php";
include "helper/Connector.php";
class Student implements IModel
{
    protected $_table = "students";
    protected $_primaryKey = "id";

    public $id;
    public $studentName;
    public $dateOfBirth;
    public $address;
    public $email;
    public $phoneNumber;

    function all()
    {
        $conn = Connector::createInstance();
        $sql_txt = "select * from ".$this->_table;
        $result = $conn->query($sql_txt);
        $list = [];
        while ($row = $result->fetch_assoc()){
            $s = new Student();
            $s->id = $row["id"];
            $s->studentName = $row["studentName"];
            $s->dateOfBirth = $row["dateOfBirth"];
            $s->address = $row["address"];
            $s->email = $row["email"];
            $s->phoneNumber = $row["phoneNumber"];
            $list[] = $s;
        }
        return $list;
    }

    function update()
    {
        $conn = Connector::createInstance();
        $sql_txt = "update students set studentName= ? ,dateOfBirth = ?,address = ?,email = ?,phoneNumber = ? where id=".$_GET["id"];
        $update = $conn->createStatement($sql_txt);
        $name1 = $_POST["name1"];
        $date1 = $_POST["date1"];
        $address1 = $_POST["address1"];
        $email1 = $_POST["email1"];
        $phone1 = $_POST["phone1"];
        $update->bind_param("ssssi", $name1, $date1, $address1, $email1, $phone1);
        $update->execute();
        return $update;
    }

    function save()
    {
        $conn = Connector::createInstance();
        $sql_txt = "select * from students where id=".$_GET["id"];
        $result = $conn -> query($sql_txt);
        $student = null;
        if ($result -> num_rows>0){
            while ($row = $result->fetch_assoc()){
                $student = new self();
                $student->id = $row["id"];
                $student->studentName = $row["studentName"];
                $student->dateOfBirth = $row["dateOfBirth"];
                $student->address = $row["address"];
                $student->email = $row["email"];
                $student->phoneNumber = $row["phoneNumber"];
            }
        }
        if ($student == null){
            die("Student Not Found");
        }
        return $student;
    }

    function delete()
    {
        $conn = Connector::createInstance();
        $sql_txt = "delete from students where id=".$_GET["id"];
        $delete = $conn->query($sql_txt);
        return $delete;
    }

    function find($id)
    {
        // TODO: Implement find() method.
    }
}