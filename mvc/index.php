<?php
include "controllers/StudentCTL.php";

$routing = $_GET["page"];
switch ($routing){
    case "student_list":{
        $ctr = new StudentCTL();
        $ctr->getStudents();
        break;
    }
    case "addstudent":{
        $ctr = new StudentCTL();
        $ctr->addstudent();
        break;
    }
    case "postStudent":{
        $ctr = new StudentCTL();
        $ctr->postStudent();
        break;
    }
    case "editstudent":{
        $ctr = new StudentCTL();
        $ctr->editstudent();
        break;
    }
    case "updatestudent":{
        $ctr = new StudentCTL();
        $ctr->updatestudent();
        break;
    }
    case "deletestudent":{
        $ctr = new StudentCTL();
        $ctr->deletestudent();
        break;
    }
    default: {
        die("404 Not Found");
    }
}