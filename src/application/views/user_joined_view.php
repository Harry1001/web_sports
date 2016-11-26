<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/head_import');?>
    <script src="<?php echo base_url('assets/js/user_joined.js')?>"></script>
</head>
<body>
<?php $this->load->view('common/navbar');?>
<div class="container">
    <p id="hide-user-id" hidden><?php echo $user_id?></p>
    <div>
        <h2><?php echo $username?>参加的活动</h2>
        <div id="btn-fan" style="position: relative; float: right; top: -30px;"></div>
    </div>
    <?php
    if (count($join)>0){
        echo '<table class="table table-striped table-hover">
        <tr>
            <th>活动名称</th>
            <th>活动时间</th>
            <th>活动地点</th>
            <th>活动介绍</th>
        </tr>';
        foreach ($join as $item){
            echo '<tr onclick="location.href=';
            echo "'../activity/".$item['id']."'";
            echo '">';
            echo "<td>".$item['title']."</td>";
            echo "<td>".$item['time']."</td>";
            echo "<td>".$item['position']."</td>";
            echo "<td>".$item['introduction']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "<div>对不起，ta没有参见任何活动</div>";
    }
    ?>

</div>
</body>
</html>
