<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/head_import');?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/activity.css">
    <style>
        svg rect{
            fill: #99ceff;
        }
    </style>
    <script src="<?php echo base_url();?>assets/js/activity_detail.js"></script>
</head>
<body>
<?php $this->load->view('common/navbar');?>
<div class="container">
    <section class="nav-side">
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <li role="presentation"><a href="<?php echo base_url('activity')?>">所有活动</a></li>
            <li role="presentation"><a href="<?php echo base_url('activity/launched')?>">我发起的</a></li>
            <li role="presentation"><a href="<?php echo base_url('activity/joined')?>">我参与的</a></li>
            <li role="presentation"><a href="<?php echo base_url('activity/create')?>">发起活动</a></li>
        </ul>
    </section>
    <section class="container content-container">
        <h1><?php echo $title;?></h1>
        <div style="padding: 10px 20px;">
            <div style="min-height: 100px;font-size: 1.5em;">
                <?php echo $content;?>
            </div>
            <div>
                <div style="display: inline-block"><img width="40px" height="40px" src="<?php echo base_url();?>assets/image/hourglass.png">时间: <span class="number"><?php echo $time;?></span></div>
                <div style="display: inline-block; margin-left: 20%;"><img width="40px" height="40px" src="<?php echo base_url();?>assets/image/location.png">地点: <span class="number"><?php echo $position?></span></div>
            </div>
        </div>
        <div style="margin-top: 20px">
            <button type="button" class="btn btn-success" style="margin-right: 30px" onclick="join()">我要加入</button>
            <button type="button" class="btn btn-warning" onclick="report()">我要举报</button>
        </div>
        <div style="margin-top: 40px">
            <h2>发起者</h2>
            <?php
            echo "<div>";
            echo "<img width='32px' height='32px' src='".base_url()."assets/image/avatar/1.jpg'>";
            echo "<a class='user-ref' href='".base_url()."user/".$launcher_id."'>".$username."</a>";
            echo "</div>";
            ?>
            <h2>活动成员</h2>
            <?php
            foreach ($join as $item){
                echo "<div>";
                echo "<img width='32px' height='32px' src='".base_url()."assets/image/avatar/1.jpg'>";
                echo "<a class='user-ref' href='".base_url()."user/".$item['id']."'>".$item['username']."</a>";
                echo "</div>";
            }
            ?>
        </div>
    </section>
</div>
<div id="hide-id" hidden><?php echo $id?></div>
</body>
</html>
