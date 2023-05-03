<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('db_connect.php');

if (isset($_POST['signup'])) {

  
  // Get the form data and sanitize it
  $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $re_password = filter_var($_POST['re-password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  // Validate the form data
  if (empty($name) || empty($username) || empty($email) || empty($password) || empty($re_password)) {
    // One or more fields are empty
    echo "<script> alert('Please fill all the input fields.')
                  window.location.href='../signup.php';
          </script>";
    exit();
  } elseif (!preg_match("/[a-zA-Z]/", $name)) {
    // Invalid Name
    echo "<script> alert('Only letters allowed.')
                  window.location.href='../signup.php';
          </script>";
    exit();
  }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Email is not valid
    echo "<script> alert('Email is invalid.')
                  window.location.href='../signup.php';
          </script>";
    exit();
  } elseif ($password !== $re_password) {
    // Passwords do not match
    echo "<script> alert('Password does not match.')
                  window.location.href='../signup.php';
          </script>";
    exit();
  } elseif (!preg_match("/[a-zA-Z]/", $password) || !preg_match("/\d/", $password)) {
    // Passwords do not meet the requirements
    echo "<script> alert('Password must contain at least one capital letter, one number, and more than 6 in length.')
                  window.location.href='../signup.php';
          </script>";
    exit();

  }else {
    // Check if the username or email already exists in the database
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM users WHERE username=? OR email=?";
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // SQL statement failed
      header("Location: ../signup.php?error=sqlerror");
      exit();
    } else {
      // Bind the parameters and execute the statement
      mysqli_stmt_bind_param($stmt, "ss", $username, $email);
      mysqli_stmt_execute($stmt);

      // Store the result and check if the username or email already exists
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result);
      if ($row > 0) {
        if ($row['username'] === $username) {
          // Username already exists
          echo "<script> alert('Username taken! Please try different username.')
                        window.location.href='../signup.php';
                </script>";
          exit();
        } elseif ($row['email'] === $email) {
          // Email already exists
          echo "<script> alert('Email already exist! Please try different email address.')
                        window.location.href='../signup.php';
                </script>";
          exit();
        }
      } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)";
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // SQL statement failed
          header("Location: ../signup.php?error=sqlerror");
          exit();
        } else {
          // Bind the parameters and execute the statement
          mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $hashed_password);
          mysqli_stmt_execute($stmt);

          // Redirect to the login page
          echo "<script> alert('Account created success!')
                        window.location.href='../login.php';
                </script>";
          exit();
        }
      }
    }
  }
} else {
  // Redirect to the signup page
  header("Location: ../signup.php");
  exit();
}

?>
