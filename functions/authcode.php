<?php

session_start();
include("../config/dbConn.php");
include("./myFunctions.php");

if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    //check email exists
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        redirect('../register.php', 'Email already exists');
    } else {
        if ($password == $cpassword) {
            //insert user data
            $insert_query = "INSERT INTO users (name,phone,email,password) VALUES ('$name','$phone','$email','$password')";
            $insert_query_run = mysqli_query($conn, $insert_query);

            if ($insert_query_run) {
                redirect('../login.php', 'Registered successfully');
            } else {
                redirect('../register.php', 'Uh-oh! Something went wrong');
            }
        } else {
            redirect('../register.php', 'Passwords do not match.');
        }
    }
} else if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $userEmail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $userEmail
        ];

        $_SESSION['role_as'] = $role_as;

        if ($role_as == 1) {
            redirect('../admin/index.php', 'Welcome to Dashboard!');
        } else {
            redirect('../index.php', 'Logged In Successfully!');
        }
    } else {
        redirect('../login.php', 'Invalid Credentials');
    }
}
