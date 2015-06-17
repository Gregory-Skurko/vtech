<html xmlns="http://www.w3.org/1999/html">
<body>
<link rel="stylesheet" href="css./style.css" type="text/css"/>
<div class="container mlogin">
    <div id="login">
        <h1>{$param}</h1>
        <form method="post">
            <p><label >User Name<br>
                <input class="input" name="username" size="20"
                    type="text" value=""></label></p>
            <p><label >Password<br>
                <input class="input" name="password" size="20"
                    type="password" value=""></label></p>
            <p class="submit"><input class="button" 
			name={$param}
			type="submit" 
			value={$param}>
			</p>
            <p class="regtext">
			{$message1}
			<a href={$link}>
			{$message2}
			</a>!</p>
        </form>
    </div>
</div>
<?php 
	include("footer.php"); 
?>
</body>
</html>