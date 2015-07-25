<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 5:43 PM
 */
?>


<html>
<body>
Hello, this is admin login page. <a href="<?= base_url() ?>">Back to home page</a> <br/><br/>
<form action="<?= base_url() ?>admin/doLogin" method="post">
    <input type="text" name="uname" placeholder="username"><br/>
    <input type="password" name="upass" placeholder="password"><br/><br/>
    <button type="submit">Submit</button>
</form>
</body>
</html>


