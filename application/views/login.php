<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 10:21 AM
 */
?>

<html>

<?php
if (isset($this->session->userdata['logged_in']))
    header('Location: user_authentication/login');
?>
<head>
    <title>Login</title>
</head>
<body>
<?php
if (isset($logout_msg)) {
    echo '<div class="message">' . $logout_msg . '</div>';
}
?>
<div id="main">
    <div id="login">
        <h2>Login Form</h2>
        <hr/>
        <?php
        echo form_open('user_authentication/login', 'im_hidden_input', 'hahaha nobody see me');

        echo '<div class="err_msg">';
        if (isset($err_msg)) echo $err_msg;
        echo validation_errors();
        echo '</div><br/>';
        echo form_label('Username: ');
        $data = array(
            'type' => 'text',
            'name' => 'uid',
            'id' => 'uid',
            'placeholder' => 'username'
        );
        echo form_input($data) . '<br/>';
        echo form_label('Password: ');
        $data = array(
            'type' => 'password',
            'name' => 'pwd',
            'id' => 'password',
            'placeholder' => 'password'
        );
        echo form_input($data) . '<br/>';
        $data = array(
            'type' => 'submit',
            'name' => 'submit',
            'value' => 'Submit'
        );
        echo form_input($data) . '<br/>';
        echo form_close();
        ?>

    </div>
</div>
</body>
</html>
