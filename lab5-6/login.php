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
$smarty->assign('link', 'register.php');
$smarty->assign('param', 'login');
$smarty->assign('message1', 'No accaunt yet?');
$smarty->assign('message2', 'Register Here');

//** раскомментируйте следующую строку для отображения отладочной консоли
//$smarty->debugging = true;

$smarty->display('page.tpl');


if(isset($_SESSION["session_username"])){
    // вывод "Session is set"; // в целях проверки
    header("Location: reloadpage.php");
}
if(isset($_POST["login"]))
{
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $username=mysql_real_escape_string($_POST['username']);
        $password=mysql_real_escape_string($_POST['password']);
        $query =mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
        $numrows=mysql_num_rows($query);
        if($numrows!=0)
        {
            while($row=mysql_fetch_assoc($query))
            {
                $dbusername=$row['username'];
                $dbpassword=$row['password'];
            }
            if($username == $dbusername && $password == $dbpassword)
            {

                $_SESSION['session_username']=$username;

                header("Location: reloadpage.php");
            }
        }
        else
            echo "Invalid username or password!";
    }
    else
        $message = "All fields are required!";
}




