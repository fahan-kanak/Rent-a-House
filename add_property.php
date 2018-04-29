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
    $floor_no = $_POST["floor_no"];
    $address_line = $_POST["address_line"];
    $area = $_POST["area"];
    $city = $_POST["city"];
    $post_code = $_POST["post_code"];
    $available_from = $_POST["available_from"];
    $size = $_POST["size"];
    $no_of_bedrooms = $_POST["no_of_bedrooms"];
    $no_of_bathrooms = $_POST["no_of_bathrooms"];
    $dining = $_POST["dining"];
    $drawing = $_POST["drawing"];
    $garage = $_POST["garage"];
    $no_of_balconies = $_POST["no_of_balconies"];
    $monthly_rent = $_POST["monthly_rent"];
    $deposit = $_POST["deposit"];
    $utility = $_POST["utility"];
    $contact_no_1 = $_POST["contact_no_1"];
    $contact_no_2 = $_POST["contact_no_2"];
    $contact_no_3 = $_POST["contact_no_3"];
    $available = $_POST["available"];
    if (strlen($contact_no_2) == 0) {
        if (strlen($contact_no_3) == 0) {
            mysqli_query($con, "INSERT into Property_info(Floor_no,Address_line,Area,City,Post_code,Available_from,Size,No_of_bedrooms,No_of_bathrooms,Dining,Drawing,Garage,No_of_balconies,Monthly_rent,Deposit,Utility,Contact_no_1) values(".$floor_no.",'".$address_line."','".$area."','".$city."',".$post_code.",'".$available_from."',".$size.",".$no_of_bedrooms.",".$no_of_bathrooms.",".$dining.",".$drawing.",".$garage.",".$no_of_balconies.",".$monthly_rent.",".$deposit.",".$utility.",'".$contact_no_1."');");    
        } else {
            mysqli_query($con, "INSERT into Property_info(Floor_no,Address_line,Area,City,Post_code,Available_from,Size,No_of_bedrooms,No_of_bathrooms,Dining,Drawing,Garage,No_of_balconies,Monthly_rent,Deposit,Utility,Contact_no_1,Contact_no_3) values(".$floor_no.",'".$address_line."','".$area."','".$city."',".$post_code.",'".$available_from."',".$size.",".$no_of_bedrooms.",".$no_of_bathrooms.",".$dining.",".$drawing.",".$garage.",".$no_of_balconies.",".$monthly_rent.",".$deposit.",".$utility.",'".$contact_no_1."','".$contact_no_3."');");    
        }                
    } else {
        if (strlen($contact_no_3) == 0) {
            mysqli_query($con, "INSERT into Property_info(Floor_no,Address_line,Area,City,Post_code,Available_from,Size,No_of_bedrooms,No_of_bathrooms,Dining,Drawing,Garage,No_of_balconies,Monthly_rent,Deposit,Utility,Contact_no_1,Contact_no_2) values(".$floor_no.",'".$address_line."','".$area."','".$city."',".$post_code.",'".$available_from."',".$size.",".$no_of_bedrooms.",".$no_of_bathrooms.",".$dining.",".$drawing.",".$garage.",".$no_of_balconies.",".$monthly_rent.",".$deposit.",".$utility.",'".$contact_no_1."','".$contact_no_2."');");    
        } else {
            mysqli_query($con, "INSERT into Property_info(Floor_no,Address_line,Area,City,Post_code,Available_from,Size,No_of_bedrooms,No_of_bathrooms,Dining,Drawing,Garage,No_of_balconies,Monthly_rent,Deposit,Utility,Contact_no_1,Contact_no_2,Contact_no_3) values(".$floor_no.",'".$address_line."','".$area."','".$city."',".$post_code.",'".$available_from."',".$size.",".$no_of_bedrooms.",".$no_of_bathrooms.",".$dining.",".$drawing.",".$garage.",".$no_of_balconies.",".$monthly_rent.",".$deposit.",".$utility.",'".$contact_no_1."','".$contact_no_2."','".$contact_no_3."');");    
        }
    }
    mysqli_query($con, "INSERT into Prop_owner_info(Owner_id) values(".$_SESSION["Owner_id"].");");
    mysqli_query($con, "INSERT into Available(Available) values(".$available.");");