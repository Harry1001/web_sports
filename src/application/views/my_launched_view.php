<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/head_import');?>
    <script src="<?php echo base_url();?>assets/js/my_launched_activity.js"></script>
</head>
<body>
<?php $this->load->view('common/navbar');?>
<div class="container">
    <section class="nav-side">
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <li role="presentation"><a href="<?php echo base_url('activity')?>">所有活动</a></li>
            <li class="active" role="presentation"><a href="<?php echo base_url('activity/launched')?>">我发起的</a></li>
            <li role="presentation"><a href="<?php echo base_url('activity/joined')?>">我参与的</a></li>
            <li role="presentation"><a href="<?php echo base_url('activity/create')?>">发起活动</a></li>
        </ul>
    </section>
    <section class="container content-container">
        <div style="margin-bottom: 20px;">
            <div class="dropdown" style="display: inline-block">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    全部
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="getAll(1)">全部 </a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="active(1)">活跃中</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="expired(1)">已过期</a></li>
                </ul>
            </div>

        </div>

        <div class="container">
            <table class="table table-striped table-hover">
                <tr>
                    <th>活动名称</th>
                    <th>活动时间</th>
                    <th>活动地点</th>
                    <th>活动介绍</th>
                    <th>操作</th>
                </tr>
            </table>
        </div>

    </section>
</div>
</body>
</html>
