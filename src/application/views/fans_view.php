<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/head_import');?>
</head>
<body>
<?php $this->load->view('common/navbar');?>
<div class="container">
    <section class="container">
        <h2>关注我的</h2>

            <?php
            if (count($follower) > 0){
                echo '<div class="row">';
                foreach ($follower as $item){
                    echo '<div class="col-xs-6 col-sm-4 col-md-6 col-lg-2"><a href="';
                    echo 'user/'.$item['id'];
                    echo '"><img class="img-rounded img-fans" width="48px" height="48px" src="';
                    echo base_url().'assets/image/avatar/1.jpg';
                    echo '">';
                    echo $item['username'];
                    echo '</a></div>';
                }
                echo '</div>';
            }
            else{
                echo "<div class='prompt'>对不起，没有用户关注您...</div>";
            }
            ?>

    </section>
    <section class="container">
        <h2 style="padding-top: 40px">我关注的</h2>

            <?php
            if (count($following) > 0){
                echo '<div class="row">';
                foreach ($following as $item){
                    echo '<div class="col-xs-6 col-sm-4 col-md-6 col-lg-2"><a href="';
                    echo 'user/'.$item['id'];
                    echo '"><img class="img-rounded img-fans" width="48px" height="48px" src="';
                    echo base_url().'assets/image/avatar/1.jpg';
                    echo '">';
                    echo $item['username'];
                    echo '</a></div>';
                }
                echo '</div>';
            }
            else{
                echo "<div class='prompt'>对不起，您没有关注任何人...</div>";
            }

            ?>
    </section>
</div>
</div>
</body>
</html>
