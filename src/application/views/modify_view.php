<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/head_import');?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/modify.css">
</head>
<body>
<?php $this->load->view('common/navbar');?>
<div class="container">
    <?php
    if (isset($message_display)) {
        echo "<div class='message'>";
        echo $message_display;
        echo "</div>";
    }
    ?>

    <div id="main">
        <div id="login">
            <h2>修改密码</h2>
            <?php echo form_open('user/modify'); ?>
            <?php
            echo "<div class='error_msg'>";
            if (isset($error_message)) {
                echo $error_message;
            }
            echo validation_errors();
            echo "</div>";
            ?>
            <label>原密码 :</label>
            <input type="password" name="old_pass" id="username" value="<?php echo set_value('username')?>" placeholder="**********"/><br /><br />
            <label>新密码 :</label>
            <input type="password" name="new_pass" id="password" placeholder="**********"/><br/><br />
            <input type="submit" value=" Submit " name="submit"/><br />
            <?php echo form_close(); ?>
        </div>
    </div>

</div>
</body>
</html>
