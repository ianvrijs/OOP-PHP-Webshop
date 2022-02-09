<?php
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"  ) {
  $username = $_POST["username"];
  $email = $_POST['email'];
  $password = $_POST['password'];
    if(strlen($password) <=8 ) {
        $error = urlencode("Password too short. Must be atleast 8 chars.");
        header("Location:index.php?module=login&page=register&error=".$error);
    }
            if(!preg_match("#[0-9]+#", $password) ) {
                $error = urlencode("Password must include at least one number!");
                header("Location:index.php?module=login&page=register&error=".$error);
                }
                if($error){
                    echo $error;
                    header("Location:index.php?module=login&page=register&error=".$error);
                    die;
                    } else {
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    }
        }
    $sql = "INSERT INTO accounts (username, email, password)
    VALUES ('$username', '$email', '$password')";


if (database::$oConnection->query($sql) === TRUE && empty($_POST['password2'])) {
        $msg = "Account aangemaakt, welkom " . $username . "!";
        header("Location:index.php?module=login&page=home&msg=".$msg);
        }
        else 
        {
            echo 'error';
            
        }

database::$oConnection->close();
?>