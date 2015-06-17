<?php
include 'constans.php';
$msg='';
if(!empty($_POST['email']) && isset($_POST['email']) &&  !empty($_POST['password']) &&  isset($_POST['password']) ) {
    $email=mysql_real_escape_string($_POST['email']);
    $password=mysql_real_escape_string($_POST['password']);
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
    if(preg_match($regex, $email)) {
        $password=md5($password);
        $activation=md5($email.time());
        $count=mysqli_query($connection,"SELECT uid FROM usertbl WHERE email='$email'");
        if(mysqli_num_rows($count) < 1) {
            mysqli_query($connection,"INSERT INTO usertbl(email,password) VALUES('$email','$password')");
            include 'smtp/Send_Mail.php';
            $to=$email;
            $subject="Подтверждение электронной почты";
            $body='Здравствуйте! <br/> <br/> Мы должны убедиться в том, что вы человек. Пожалуйста, подтвердите адрес вашей электронной почты, и можете начать использовать ваш аккаунт на сайте. <br/> <br/> <a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';
            Send_Mail($to,$subject,$body);
            $msg= "Регистрация выполнена успешно, пожалуйста, проверьте электронную почту.";
        }
        else
        {
            $msg= 'Данный адрес электронный почты уже занят, пожалуйста, введите другой. ';
        }
    }
    else {
        $msg = 'Адрес, введенный вами, неверен. Пожалуйста, попробуйте еще раз.';
    }
}
