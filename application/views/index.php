<html>
<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 10:41 AM
 */

if (isset($this->session->userdata['logged_in'])) {
    $uid = $this->session->userdata['logged_in']['uid'];
    $utype = $this->session->userdata['logged_in']['utype'];
} else
    header('Location: login');
?>
<head>
    <title>Index page</title>
</head>
<body>
<?php
    echo 'Hello ' . $uid . '<br/>Your type: ' . $utype . '<br/>';
?>
    <a href="logout">Logout</a>
</body>
</html>