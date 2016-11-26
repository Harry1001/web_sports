<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/head_import');?>
    <script src="<?php echo base_url();?>assets/js/create_activity.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>
    <link href="//cdn.bootcss.com/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/moment.js/2.17.0/moment.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
    <style>
        #success_message, #fail_message{ display: none;}
    </style>
</head>
<body>
<?php $this->load->view('common/navbar');?>
<div class="container">
    <section class="nav-side">
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <li role="presentation"><a href="<?php echo base_url('activity')?>">所有活动</a></li>
            <li role="presentation"><a href="<?php echo base_url('activity/launched')?>">我发起的</a></li>
            <li role="presentation"><a href="<?php echo base_url('activity/joined')?>">我参与的</a></li>
            <li class="active" role="presentation"><a href="<?php echo base_url('activity/create')?>">发起活动</a></li>
        </ul>
    </section>
    <section class="container content-container">
        <form class="well form-horizontal" action="<?php echo base_url('activity/create')?>" method="post"  id="create_form">
            <fieldset>

                <!-- Form Name -->
                <legend>创建活动</legend>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">活动名称</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                            <input  name="title" placeholder="Activity Title" class="form-control"  type="text">
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label" >活动简介</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                            <input name="introduction" placeholder="Activity Introduction" class="form-control"  type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">活动时间 time</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group date" id="datetimePicker">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input  name="time" type="text" class="form-control" />
                            <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">活动地点</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                            <input name="location" placeholder="location" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <!-- Text area -->

                <div class="form-group">
                    <label class="col-md-4 control-label">活动描述</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" name="description" placeholder="Activity Description"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Success message -->
                <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> 活动创建成功！</div>
                <div class="alert alert-danger" role="alert" id="fail_message">Fail <i class="glyphicon glyphicon-warning-sign"></i> 活动创建失败！</div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>

            </fieldset>
        </form>
</div>
    </section>
</div>
</body>
</html>