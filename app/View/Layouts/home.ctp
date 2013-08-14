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
        </style>
    </head>

    <body>
        <div id="fb-root"></div>
        <div class="navbar navbar-fixed-top">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="/"><?php //echo $this->Html->image('logo_rf1.png', array('width' => 180, 'height' => 40)); ?></a>
                <div class="nav-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo $this->Html->url(array('controller' => 'recipes', 'action' => 'index')) ?>"><?php echo __('Recettes') ?></a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'photos', 'action' => 'index')); ?>"><?php echo __('Photos') ?></a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'contact', 'action' => 'index')) ?>"><?php echo __('Contact') ?></a></li>
                    </ul>

                    <div class="navbar-form form-inline pull-right">
                                <a href="#">Se connecter</a>
                        <a href="#" class="btn btn-info">Devenir membre</a>
                    </div>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </body>
</html>
