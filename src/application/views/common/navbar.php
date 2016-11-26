<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Let's Move ! </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url('home');?>">首页</a></li>
                <li><a href="<?php echo base_url('statistic/sport');?>">身体数据</a></li>
                <li><a href="<?php echo base_url('activity');?>">健身活动</a></li>
                <li><a href="<?php echo base_url('fans');?>">粉丝好友</a></li>
                <?php
                if (isset($_SESSION['user_type'])&&$_SESSION['user_type']==1){
                    echo '<li><a href="';
                    echo base_url('reports');
                    echo '">活动审核</a></li>';
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['username'])){
                    echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">';
                    echo $_SESSION['username'] ;
                    echo '<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="';
                    echo base_url('user/modify');
                    echo '">修改资料</a></li>
                        <li class="divider"></li>
                        <li><a href="';
                    echo base_url('auth/logout');
                    echo '">退出登录</a></li>
                    </ul>
                </li>';
                }
                else{
                    echo "<li><a href='auth/login'>登录/注册</a></li>";
                }
                ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>