<?php
function getDatabaseConnection() {
        include('config/database.php');
        // connect to the database
        $db = new mysqli($db_config['hostname'], $db_config['username'], $db_config['password'], $db_config['database']);
        // Check connection
        if ($db->connect_error) {
            echo '<div class="alert alert-danger"><strong>Something went wrong!</strong> Please try after some time or contact server-admin. </div>';
            die();
        }
        return $db;
}

function getUserData($crn) {
        $db = getDatabaseConnection();
        $sql ='SELECT * FROM students WHERE collegeRollNumber=' . $crn;
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
        }else {
                return;
        }
        return $row;
}

function getSessionId($username) {
        $sid = sha1(rand());
        $db = getDatabaseConnection();
        $sql ='UPDATE users SET sid="' . $sid . '" WHERE login="' . $username . '"';
        $result = $db->query($sql);
        if ($result) {
                return $sid;
        }
        else {
                return;
        }
}

function checkSessionId($username, $sid) {
        $db = getDatabaseConnection();
        $sql ='SELECT sid FROM users WHERE login="' . $username . '"';
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
                // Get session id from database
                $db_sid = $result->fetch_assoc()['sid'];
                if ($sid == $db_sid) {
                        return True;
                }else {
                        return False;
                }
        }else {
                return False;
        }
}
?>
