<?php
include('database_functions.php');
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = getDatabaseConnection();

// LOGIN USER
if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        if (empty($username)) {
                array_push($errors, "Username is required");
        }
        if (empty($password)) {
                array_push($errors, "Password is required");
        }
        
        if (count($errors) == 0) {
                //$password = md5($password);
                $query = 'SELECT * FROM users WHERE login="' . $username . '" AND password="' . $password . '"';
                $results = mysqli_query($db, $query);
                if (mysqli_num_rows($results) == 1) {
                        $_SESSION['username'] = $username;
                        $sid = getSessionId($username);
                        if ($sid) {
                                $_SESSION['sid'] = $sid;
                        }
                        else {
                                array_push($errors, "Something went wrong! Please try after some time");
                        }
                        if (isset($_GET['crn'])) {
                                header('location: ../index.php?crn=' . $_GET['crn']);
                        }else {
                                header('location: ../index.php');
                        }
                }else {
                        array_push($errors, "Wrong username/password combination");
                }
        }
}
?>
