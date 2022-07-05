<?php

include "models/Student.php";

class StudentCTL
{
    public function getStudents()
    {
        $studentObj = new Student();
        $list = $studentObj->all();
        include_once "views/student_list.php";
    }

    public function addstudent()
    {
        include_once "views/addstudent.php";
    }

    public function postStudent()
        {
            $conn = Connector::createInstance();
            $sql_txt = "insert into students(studentName,dateOfBirth,address,email,phoneNumber) values(?,?,?,?,?);";
            $stt = $conn->createStatement($sql_txt);
            $name1 = $_POST["name1"];
            $date1 = $_POST["date1"];
            $address1 = $_POST["address1"];
            $email1 = $_POST["email1"];
            $phone1 = $_POST["phone1"];
            $stt->bind_param("sssss", $name1, $date1, $address1, $email1, $phone1);
            $stt->execute();

            header("Location: ?page=student_list");
        }

    public function editstudent(){
        $studentObj = new Student();
        $student = $studentObj->save();
        include_once "views/editstudent.php";
     }

    public function updatestudent(){
        $studentObj = new Student();
        $update = $studentObj->update();
        header("Location: ?page=student_list");
    }

    public function deletestudent(){
        $studentObj = new Student();
        $delete = $studentObj->delete();
        header("Location: ?page=student_list");
    }

    }