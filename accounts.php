<?php
    session_start();
    $conn = new mysqli('localhost','root','','accounts');
    if($conn->connect_error){
        die('<h1 style="text-align:center;">Eroare la conectare</h1> <h2 style="text-align:center;">Verifica&#355i dac&#259 baza de date a fost importat&#259 corect!</h2><h3 style="text-align:center;">'.$conn->connect_error.'</h3');
    }
    $errors = array();
    $errfirstName = "";
    $errlastName = "";
    $erremail = "";
    $errpassword = "";
    $errpasswordRepeat = "";
    $errmultipleemail = "";
    
    $firstName = "";
    $lastName = "";
    $email = "";
    if(isset($_POST['register'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];


        // validare
        if(empty($firstName)){
            $errfirstName = "Introduce&#355i numele dumneavoastr&#259";
            $errors['firstName'] = "firstname";
        }
        if(empty($lastName)){
            $errlastName = "Introduce&#355i prenumele dumneavoastr&#259";
            $errors['lastName'] = "lastname";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $erremail = "Introduce&#355i o adresa de e-mail valid&#259";
            $errors['email'] = "email";
        }
        if(empty($email)){
            $erremail = "Introduce&#355i e-mailul dumneavoastr&#259";
            $errors['email'] = "email";
        }
        if(empty($password)){
            $errpassword = "Introduce&#355i o parol&#259!";
            $errors['password'] = "password";
        }
        if($password!=$passwordRepeat){
            $errpasswordRepeat = "Parolele nu corespund";
            $errors['password'] = "password";
        }
        $emailQuery = "SELECT *FROM users WHERE email=? LIMIT 1";
        $statement = $conn->prepare($emailQuery);
        $statement->bind_param('s',$email);
        $statement->execute();
        $rezultat = $statement->get_result();
        $nruser = $rezultat->num_rows;
        $statement->close();
        if($nruser >0){
            $errors['email'] = "Aceast&#259 adres&#259 de e-mail apar&#355ine unui cont existent";
            $errmultipleemail= "Aceast&#259 adres&#259 de e-mail apar&#355ine unui cont existent";
        }

        if(count($errors) == 0){
            $passwordEncrypt = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (firstName,lastName,email,password)
                VALUES (?,?,?,?)";
            $statement = $conn->prepare($sql);
            $statement->bind_param('ssss',$firstName,$lastName,$email,$passwordEncrypt);
            if($statement->execute()){
                $user_id= $conn->insert_id;
                $_SESSION['id'] = $user_id;
                $_SESSION['firstName'] = $firstName;
                $_SESSION['lastName'] = $lastName;
                $_SESSION['email'] = $email;
                $_SESSION['signupmsg']="Succes";
                header("refresh:5; url=main.php");
            }else{
                $errors['databaseError'] = "Database error: Nu am reusit sa va inregistram!";
            }
        }
    }
    //login
    $errors = array();
    $erremail="";
    $errpassword="";
    $errmessage="";
    $email = "";
    $password = "";
    if($conn->connect_error){
        die('Eroare la conectare. Incerca&#355i mai t&#266rziu');
    }
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Introduce&#355i o adres&#259 de e-mail valid&#259!";
            $erremail="Introduce&#355i o adres&#259 de e-mail valid&#259";
        }
        if(empty($email)){
            $errors['email'] = "Introduceti e-mailul dumneavoastr&#259";
            $erremail="Introduce&#355i e-mailul dumneavoastr&#259";
        }
        if(empty($password)){
            $errors['password'] = "Introduceti o parol&#259";
            $errpassword="Introduce&#355i o parol&#259";
        }
        if(count($errors)==0){
            $sql = "SELECT * FROM users WHERE email=? LIMIT 1";
            $statement = $conn->prepare($sql);
            $statement->bind_param('s',$email);
            $statement->execute();
            $rezultat = $statement->get_result();
            $user = $rezultat->fetch_assoc();

            if(password_verify($password,$user['password'])){ 
                $_SESSION['id'] = $user['id']; 
                $_SESSION['firstName']= $user['firstName'];
                $_SESSION['lastName'] = $user['lastName'];
                $_SESSION['email']= $user['email'];
                $_SESSION['loginmsg']="Logged in";
                header("refresh:5; url=main.php");
            }else{
                $errors['login_fail'] = "E-mail/parol&#259 gre&#351ite";
                $errmessage="E-mail/parol&#259 gre&#351ite";

            }
        }
    }
    //logout
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['firstName']);
        unset($_SESSION['lastName']);
        unset($_SESSION['email']);
        header('location:login.php?status=loggedout');
        exit();    
    }
?>