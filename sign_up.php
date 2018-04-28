<?php
    $con = mysqli_connect("localhost", "root", "password");
    if (!$con) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    //set the default client character set 
    mysqli_set_charset($con, 'utf-8');

    mysqli_select_db($con, "Rent_a_House");
    $num = $_GET["num"];
    if ($num == 1) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $contact_no_1 = $_POST["contact_no_1"];
        $contact_no_2 = $_POST["contact_no_2"];
        $contact_no_3 = $_POST["contact_no_3"];
        $password = $_POST["password"];        
        if (strlen($contact_no_2) == 0) {
            if (strlen($contact_no_3) == 0) {
                mysqli_query($con, "INSERT into Owner_info(First_name,Last_name,Contact_no_1,Password) values('".$first_name."','".$last_name."','".$contact_no_1."','".$password."');");    
            } else {
                mysqli_query($con, "INSERT into Owner_info(First_name,Last_name,Contact_no_1,Contact_no_3,Password) values('".$first_name."','".$last_name."','".$contact_no_1."','".$contact_no_3."','".$password."');");    
            }                
        } else {
            if (strlen($contact_no_3) == 0) {
                mysqli_query($con, "INSERT into Owner_info(First_name,Last_name,Contact_no_1,Contact_no_2,Password) values('".$first_name."','".$last_name."','".$contact_no_1."','".$contact_no_2."','".$password."');");    
            } else {
                mysqli_query($con, "INSERT into Owner_info(First_name,Last_name,Contact_no_1,Contact_no_2,Contact_no_3,Password) values('".$first_name."','".$last_name."','".$contact_no_1."','".$contact_no_2."','".$contact_no_3."','".$password."');");    
            }
        }
    } else {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $contact_no = $_POST["contact_no"];        
        $password = $_POST["password"];        
        mysqli_query($con, "INSERT into Tenant_info(First_name,Last_name,Contact_no,Password) values('".$first_name."','".$last_name."','".$contact_no."','".$password."');");    
    }