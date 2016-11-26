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
    <script src="<?php echo base_url();?>assets/js/all_activity.js"></script>
</head>
<body>
<?php $this->load->view('common/navbar');?>
<div class="container">
    <section class="nav-side">
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <li class="active" role="presentation"><a href="<?php echo base_url('activity')?>">所有活动</a></li>
            <li role="presentation"><a href="<?php echo base_url('activity/launched')?>">我发起的</a></li>
            <li role="presentation"><a href="<?php echo base_url('activity/joined')?>">我参与的</a></li>
            <li role="presentation"><a href="<?php echo base_url('activity/create')?>">发起活动</a></li>
        </ul>
    </section>
    <section class="container content-container">
        <div class="loader loader--style6" title="loading...">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;margin: 50px 30%" xml:space="preserve">
    <rect x="0" y="13" width="4" height="5" fill="#333">
        <animate attributeName="height" attributeType="XML"
                 values="5;21;5"
                 begin="0s" dur="0.6s" repeatCount="indefinite" />
        <animate attributeName="y" attributeType="XML"
                 values="13; 5; 13"
                 begin="0s" dur="0.6s" repeatCount="indefinite" />
    </rect>
                <rect x="10" y="13" width="4" height="5" fill="#333">
                    <animate attributeName="height" attributeType="XML"
                             values="5;21;5"
                             begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML"
                             values="13; 5; 13"
                             begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                </rect>
                <rect x="20" y="13" width="4" height="5" fill="#333">
                    <animate attributeName="height" attributeType="XML"
                             values="5;21;5"
                             begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML"
                             values="13; 5; 13"
                             begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                </rect>
  </svg>
        </div>

    </section>
</div>

</body>
</html>
