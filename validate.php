<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "password");   
    if (!$con) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    //set the default client character set 
    mysqli_set_charset($con, 'utf-8');

    mysqli_select_db($con, "Rent_a_House");
    $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $num = $_GET["num"];
    if ($num == 1) {
        $act_password = mysqli_query($con, "SELECT Owner_id,password FROM Owner_info WHERE Contact_no_1='" . $contact_no . "'");    
    } else {
        $act_password = mysqli_query($con, "SELECT Tenant_id,password FROM Tenant_info WHERE Contact_no='" . $contact_no . "'");    
    }
    if (mysqli_num_rows($act_password) < 1) {
        echo 'Wrong contact number!';
    } else {
        $row = mysqli_fetch_row($act_password);
        mysqli_free_result($act_password);
        if (strcmp($password, $row[1]) == 0) {
            if ($num == 1) {
                $_SESSION["Owner_id"] = $row[0];
            } else {
                $_SESSION["Tenant_id"] = $row[0];
            }
            echo "Login successful!";
        } else {
            echo "Wrong password!";
        }
    }
    mysqli_close($con);     