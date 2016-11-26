<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/head_import');?>
    <script src="<?php echo base_url('assets/js/highcharts.js');?>"></script>
    <script src="<?php echo base_url('assets/js/statistics.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/statistic.css');?>">
</head>
<body>
<?php $this->load->view('common/navbar');?>
<div class="container">
    <section class="nav-side">
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <li class="active" role="presentation"><a href="<?php echo base_url('statistic/sport');?>">我的运动</a></li>
            <li role="presentation"><a href="<?php echo base_url('statistic/body');?>">身体管理</a></li>
            <li role="presentation"><a href="<?php echo base_url('statistic/sleep');?>">睡眠分析</a></li>
        </ul>
    </section>
    <section class="container content-container">
        <h2>你的运动总量</h2>
        <div>
            <div class="img-container">
                <img src="<?php echo base_url('assets/image/running.png');?>" class="img-rounded img-white" width="64px" height="64px" style="float: left;">
                <div style="margin-left: 80px">
                    <div>累计运动距离</div>
                    <div><span class="number"><?php echo $total['distance'];?></span> 公里</div>
                </div>
            </div>
            <div class="img-container">
                <img src="<?php echo base_url('assets/image/clock.png');?>" class="img-rounded img-white" width="64px" height="64px" style="float: left;">
                <div style="margin-left: 80px">
                    <div>累计运动时间</div>
                    <div><span class="number"><?php echo $total['duration'];?></span> 小时</div>
                </div>
            </div>
            <div class="img-container">
                <img src="<?php echo base_url('assets/image/running.png');?>" class="img-rounded img-white" width="64px" height="64px" style="float: left;">
                <div style="margin-left: 80px">
                    <div>累计燃烧热量</div>
                    <div><span class="number"><?php echo $total['calorie'];?></span> 卡路里</div>
                </div>
            </div>
        </div>

        <div class="chart-container">
            <h2>今日数据</h2>
            <table class="table">
                <tr>
                    <th>运动距离</th>
                    <th>运动时间</th>
                    <th>运动步数</th>
                    <th>燃烧热量</th>
                </tr>
                <tr>
                    <td><span class="number"><?php echo $today['distance']?></span> 公里</td>
                    <td><span class="number"><?php echo $today['duration']?></span> 小时</td>
                    <td><span class="number"><?php echo $today['step']?></span> 步</td>
                    <td><span class="number"><?php echo $today['calorie']?></span> 卡路里</td>
                </tr>
            </table>
        </div>

        <div class="chart-container">
            <h2>本周数据</h2>
            <table class="table">
                <tr>
                    <th>运动距离</th>
                    <th>运动时间</th>
                    <th>运动步数</th>
                    <th>燃烧热量</th>
                </tr>
                <tr>
                    <td><span class="number"><?php echo $week['distance']?></span> 公里</td>
                    <td><span class="number"><?php echo $week['duration']?></span> 小时</td>
                    <td><span class="number"><?php echo $week['step']?></span> 步</td>
                    <td><span class="number"><?php echo $week['calorie']?></span> 卡路里</td>
                </tr>
            </table>
            <h3>运动曲线图</h3>
            <div class="sport-chart" id="week-sport-chart">
            </div>
        </div>

        <div class="chart-container">
            <h2>本月数据</h2>
            <table class="table">
                <tr>
                    <th>运动距离</th>
                    <th>运动时间</th>
                    <th>运动步数</th>
                    <th>燃烧热量</th>
                </tr>
                <tr>
                    <td><span class="number"><?php echo $month['distance']?></span> 公里</td>
                    <td><span class="number"><?php echo $month['duration']?></span> 小时</td>
                    <td><span class="number"><?php echo $month['step']?></span> 步</td>
                    <td><span class="number"><?php echo $month['calorie']?></span> 卡路里</td>
                </tr>
            </table>
            <h3>运动曲线图</h3>
            <div class="sport-chart" id="month-sport-chart">
            </div>
        </div>

    </section>
</div>
</body>
</html>
