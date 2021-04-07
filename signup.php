<?php 
error_reporting(0);
require 'accounts.php'; 
if (isset($_SESSION['id']) && !isset($_SESSION['signupmsg'])){
    header('location:main.php');
    exit();
}
if($_SESSION['signupmsg']){
    echo ("<div class='alert animate'><div id='myBar'></div><span class='closebtn' onclick="."location.href='main.php';".">&times;</span> Salut <b>".$_SESSION['firstName']."</b>! Te-ai &#238nregistrat cu succes! Te vom redirec&#355iona la pagina principal&#259 <span id='txt'></span></div></div>");
    unset($_SESSION['loginmsg']);
}
?>
<html>
    <head>
        <link rel="icon" href="..\EWD\Imagini\favicon.png" type="image/png">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\signuppage.css">
        <link rel="stylesheet" type="text/css" href="..\EWD\CSS\contact_alerts.css">
        <script src="..\EWD\JavaScript\countdown.js"></script>
        <script src="..\EWD\JavaScript\loadingline.js"></script>
    </head>
    <body onload="move();timedText();">
        <div class="window">
            <div class="imagesection">
                <img src="..\EWD\Imagini\signup.gif" style="max-width:100%;">
            </div>
            <div class="suinfo">
                <h2 style="text-align:center;margin-top:30px;margin-bottom:40px;">&#206nregistrare</h2>
                <div class="sutext">
                    <form action="..\EWD\signup.php" method="post">
                        <label for="firstName">Nume</label>
                        <input type="text" placeholder="Introduce&#355i numele dumneavoastr&#259" name="firstName" value="<?php echo $firstName; ?>">
                        <p class="errortext"><?php echo $errfirstName; ?></p>
                        <label for="lastName"><b>Prenume</b></label></br>
                        <input type="text" placeholder="Introduce&#355i prenumele dumneavostr&#259" name="lastName" value="<?php echo $lastName; ?>">
                        <p class="errortext"><?php echo $errlastName; ?></p>
                        <label for="email"><b>E-mail</b></label></br>
                        <input type="text" placeholder="Introduce&#355i adresa dumneavoastr&#259 de e-mail" name="email" value="<?php echo $email; ?>">
                        <p class="errortext"><?php echo $erremail; echo $errmultipleemail; ?></p>
                        <label for="password"><b>Parol&#259</b></label>
                        <input type="password" placeholder="Introduce&#355i o parol&#259" name="password">
                        <p class="errortext"><?php echo $errpassword; ?></p>
                        <label for="passwordRepeat"><b>Reintroduce&#355i parola</b></label>
                        <input type="password" placeholder="Reintroduce&#355i parola de mai sus" name="passwordRepeat">
                        <p class="errortext"><?php echo $errpasswordRepeat; ?><a href="..\EWD\login.php" style="font-size:13px;float:right;">Ai deja cont?</a></p>
                        <button type="submit" class="buttonsubmit animate" name="register" style="width:50%;margin-left:25%;">&#206nregistrare</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

