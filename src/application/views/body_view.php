
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/head_import');?>
    <script src="<?php echo base_url('assets/js/highcharts.js');?>"></script>
    <script src="<?php echo base_url('assets/js/statistic-body.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/statistic.css');?>">
</head>
<body>
<?php $this->load->view('common/navbar');?>
<div class="container">
    <section class="nav-side">
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <li role="presentation"><a href="<?php echo base_url('statistic/sport');?>">我的运动</a></li>
            <li class="active" role="presentation"><a href="<?php echo base_url('statistic/body');?>">身体管理</a></li>
            <li role="presentation"><a href="<?php echo base_url('statistic/sleep');?>">睡眠分析</a></li>
        </ul>
    </section>

    <section class="container content-container">
        <div>
            <h2>当前状态</h2>
            <div>
                <img src="<?php echo base_url('assets/image/man-balancing.png');?>" class="img-rounded" style="float: right;">
                <div>
                    <div style="display: inline-block">身高 <span class="number body-number"><?php echo $bodyNow['height'];?></span> cm</div>
                    <div style="display: inline-block; margin-left: 100px">体重 <span class="number body-number"><?php echo $bodyNow['weight'];?></span> kg</div>
                </div>
                <div class="prograss-bar">
                    <div id="hand-container"><span class="glyphicon glyphicon-hand-down" id="hand-down"></span></div>
                    <div>
                        <img src="<?php echo base_url('assets/image/man-thin.png')?>" class="body-shape-icon">
                        <div id="gradient"></div>
                        <img src="<?php echo base_url('assets/image/man-fat.png')?>" class="body-shape-icon">
                    </div>
                    <table style="width: 80%;margin-left: 10%;">
                        <tr>
                            <td>偏瘦</td>
                            <td>健康</td>
                            <td>超重</td>
                            <td>肥胖</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="chart-container">
            <h2>历史数据</h2>
            <div>
                <br>
                <div class="body-chart" id="weight-height-chart"></div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
