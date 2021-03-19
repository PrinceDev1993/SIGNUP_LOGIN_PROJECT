<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
  $return;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }  else {
    $result = false;
  }
  return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
   $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";

   //let us start with our prepared statement to make it more secure from strange code input by the user;
   $stmt = mysqli_stmt_init($conn);
   //checkout for any mistake from the sql statement
   if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtFailed");
    exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $username, $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);
   // Now check if there is result from the statement
   if ($row = mysqli_fetch_assoc($resultData)) {
       return $row;
   } else {
       $result = false;
       return $result;
   }

   mysqli_stmt_close($stmt);
   
}


function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUE (?, ?, ?, ?);";
 
    //let us start with our prepared statement to make it more secure from strange code input by the user;
    $stmt = mysqli_stmt_init($conn);
    //checkout for any mistake from the sql statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../signup.php?error=stmtFailed");
     exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
 
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();
 }


 //LOGIN SECTION
function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd) {
    //Let us search for the existence of the username of the user.
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    //Get the hashed password already in the db
    $pwdhashed = $uidExists['usersPwd'];

    // Check whether the user pwd($pwd) matches with the userPwd in the db($hashedPwd).
    $checkPwd = password_verify($pwd, $pwdhashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=incorrectpwd");
        exit();
    } else if ($checkPwd === true) {
        //let us start a session
        session_start();

        //Create a superglobal variable called $_SESSION and get the usersId from the db
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}