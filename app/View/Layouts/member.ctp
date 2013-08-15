<?php $description = __d('socialfood_dev', 'Repas chez l\'habitants, Recettes de cuisine, Chat'); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?> 
        <title>
            <?php echo $description ?>:
            <?php echo $title_for_layout; ?>
        </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <?php echo $this->Html->meta('icon'); ?>
        <?php echo $this->fetch('meta'); ?>
        <?php echo $this->fetch('css'); ?>
        <?php echo $this->fetch('script'); ?>

        <!-- Bootstrap core CSS -->
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <?php echo $this->Html->css('modernize'); ?>
        <?php echo $this->Html->css('bootstrap-glyphicons'); ?>

        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.min.js"></script>
        <?php echo $this->Html->script('bootstrap.min'); ?>

        <style>
            body{
                margin-top: 0px;
            }
            .logo{
                margin-top:-10px !important; 
            }
            .navbar-inverse{
    background: #313131 !important;
    height: 40px;
    position: absolute;
    margin-bottom:60px !important; 
  }
  .logo img{
    margin-top: 5px;
  }

  .member-container{
    margin-top: 60px;
  }
        </style>
    </head>
<style type="text/css">

</style>
    <body>
        <div id="fb-root"></div>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="/"><?php echo $this->Html->image('logo_rf1.png', array('width' => 150, 'height' => 30)); ?></a>
                <div class="nav-collapse collapse">

                    <ul class="nav navbar-nav">
                         <li><a href="">Mes annonces</a></li>
                         <li><a href=""><span class="glyphicon glyphicon-facetime-video"></span>  Mes vidéos</a></li>
                         <li><a href=""><span class="glyphicon glyphicon-camera"></span>  Mes photos</a></li>
                         <li><a href=""><span class="glyphicon glyphicon-envelope"></span></a></li>
                         <li><a href=""><span class="glyphicon glyphicon-globe"></span></a></li>
                    </ul>

                    <div class="navbar-form form-inline pull-right">
                                <a href=""><span class="glyphicon glyphicon-cog"></span></a>
                    </div>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </body>
</html>
