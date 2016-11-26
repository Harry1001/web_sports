<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/head_import');?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/auth.css">
</head>
<body>
<?php
if (isset($message_display)) {
    echo "<div class='message'>";
    echo $message_display;
    echo "</div>";
}
?>
<div id="main">
    <div id="login">
        <h2>Login Form</h2>
        <hr/>
        <?php echo form_open('auth/login'); ?>
        <?php
        echo "<div class='error_msg'>";
        if (isset($error_message)) {
            echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
        ?>
        <label>UserName :</label>
        <input type="text" name="username" id="username" value="<?php echo set_value('username')?>" placeholder="username"/><br /><br />
        <label>Password :</label>
        <input type="password" name="password" id="password" placeholder="**********"/><br/><br />
        <input type="submit" value=" Login " name="submit"/><br />
        <?php echo form_close(); ?>
        <a href="<?php echo base_url(); ?>auth/register">To SignUp Click Here</a>
    </div>
</div>
</body>
</html>
