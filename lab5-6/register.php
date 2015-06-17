<?php
session_start();
include 'connection.php';
include 'header.php';

require_once('libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->template_dir = '/web/www.example.com/guestbook/templates/';
$smarty->compile_dir = '/web/www.example.com/guestbook/templates_c/';
$smarty->config_dir = '/web/www.example.com/guestbook/configs/';
$smarty->cache_dir = '/web/www.example.com/guestbook/cache/';
$smarty->assign('link', 'login.php');
$smarty->assign('param', 'register');
$smarty->assign('message1', 'Already have an account?');
$smarty->assign('message2', 'Login Here');
$smarty->display('page.tpl');

if(isset($_POST["register"]))
{
    if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']))
    {
        $username=mysql_real_escape_string($_POST['username']);
        $password=mysql_real_escape_string($_POST['password']);
        $query=mysql_query("SELECT * FROM usertbl WHERE username='".$username."'");
        $numrows=mysql_num_rows($query);
        if($numrows==0)
        {
            $sql="INSERT INTO usertbl
            (full_name, email, username,password)
	        VALUES('$full_name','$email', '$username', '$password')";
            $result=mysql_query($sql);
            if($result)
                $message = "Account Successfully Created";
            else
                $message = "Failed to insert data information!";
        }
        else
            $message = "That username already exists! Please try another one!";
    }
    else
        $message = "All fields are required!";
}
if (!empty($message))
    echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";



