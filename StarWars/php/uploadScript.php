<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('db_connect.php');


// Check if the user is logged in
if(!isset($_SESSION["username"]) || $_SESSION["logged"] !== TRUE){
    header("location: ../login.php");
    exit;
}

// Check if the logout button was clicked
if (isset($_POST["logout"])) {
    // Unset all session variables
    session_unset();
  
    // Destroy the session
    session_destroy();
  
    // Redirect to the login page
    header("location: ../login.php");
    exit;
}

// Check if the form was submitted
if (isset($_POST['upload'])) {
   
    $file = $_FILES['profile'];
    $fileName = $_FILES['profile']['name'];
    $fileTmpName = $_FILES['profile']['tmp_name'];
    $fileSize = $_FILES['profile']['size'];
    $fileType = $_FILES['profile']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        $fileError = $_FILES['profile']['error'];
        if($fileError === 0){
            if($fileSize < 5000000){

                // Check if profile image already exists for user
                $user_id = $_SESSION['user_id'];

                $fileNameNew = "profile".$user_id. ".".$fileActualExt;
                $fileDestination = '../images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
               
                // Check if the user already has a profile image
                $checkQuery = "SELECT * FROM profiles WHERE user_id = ?";
                $stmt = $conn->prepare($checkQuery);
                $stmt->bind_param("s", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                // If the user already has a profile image, delete the old file
                if ($row) {
                    

                    // Update the profile image file
                    $updateQuery = "UPDATE profiles SET image = ? WHERE user_id = ?";
                    $stmt = $conn->prepare($updateQuery);
                    $stmt->bind_param("ss", $fileDestination, $user_id);
                    $stmt->execute();
                } else {
                    // Insert the new profile image
                    $status = 1;
                    $insertQuery = "INSERT INTO profiles (user_id, image, status) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($insertQuery);
                    $stmt->bind_param("ssi", $user_id, $fileDestination, $status);
                    $stmt->execute();
                }

                $stmt->close();
                echo "<script> alert('Picture upload successful!')
                    window.location.href='../login.php';
                </script>";
                exit;

            }else{
                echo "<script> alert('Your file size is too big!')
                    window.location.href='../login.php';
                </script>";
                exit; 
            }
        }else{
            echo "<script> alert('There was an error uploading your file!')
                    window.location.href='../login.php';
                </script>";
                exit;
           
        }
    }else{
        echo "<script> alert('Invalid file format. Only jpg, jpeg and png format allowed!')
                window.location.href='../login.php';
            </script>";
            exit;
        
    }
  
} else {
    echo "<script> alert('No file selected. Please select a file to upload.')
                window.location.href='../login.php';
            </script>";
            exit;
}


// Check if the logout button was clicked
if (isset($_POST["logout"])) {
  // Unset all session variables
  session_unset();

  // Destroy the session
  session_destroy();

  // Redirect to the login page
  header("location: ../login.php");
  exit;
}
?>
