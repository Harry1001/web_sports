<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/head_import');?>
    <script src="<?php echo base_url('assets/js/highcharts.js');?>"></script>
    <script src="<?php echo base_url('assets/js/statistic-sleep.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/statistic.css');?>">
</head>
<body>
<?php $this->load->view('common/navbar');?>
<div class="container">
    <section class="nav-side">
        <ul class="nav nav-pills nav-stacked" role="tablist">
            <li role="presentation"><a href="<?php echo base_url('statistic/sport');?>">我的运动</a></li>
            <li role="presentation"><a href="<?php echo base_url('statistic/body');?>">身体管理</a></li>
            <li class="active" role="presentation"><a href="<?php echo base_url('statistic/sleep');?>">睡眠分析</a></li>
        </ul>
    </section>

    <section class="container content-container">
        <div>
            <h2>睡眠状况</h2>
            <form action="#">
                <input type="date" class="form-control" style="width: 25%;margin-bottom: 30px">
            </form>
            <table class=" table table-striped" id="sleep-table">
                <tr>
                    <th rowspan="2" id="sleep-efficiency">
                        <div class="circle">
                            <div>睡眠效率</div>
                            <div><?php echo $efficiency?>%</div>
                        </div>
                    </th>
                    <th>睡眠开始</th>
                    <th>睡眠结束</th>
                    <th>睡眠总时长</th>
                    <th>有效睡眠</th>
                </tr>
                <tr>
                    <td><?php echo $start?></td>
                    <td><?php echo $end?></td>
                    <td><?php echo $total?></td>
                    <td><?php echo $realSleep?></td>
                </tr>
            </table>
            <div class="body-chart" id="sleep-chart"></div>
        </div>
    </section>

</div>
</body>
</html>