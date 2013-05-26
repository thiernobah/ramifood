<?php $description = __d('socialfood_dev', 'Repas chez l\'habitants, Recettes de cuisine, Chat'); ?>
<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta charset="utf-8">
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

        <?php echo $this->Html->css('bootstrap.min'); ?>
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
            }
        </style>

        <?php //echo $this->Html->css('bootstrap-responsive.min'); ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="/ramifod/js/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="fb-root"></div>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="brand" href="#">Project name</a>-->
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                            Logged in as <a href="#" class="navbar-link">Username</a>
                        </p>
                        <ul class="nav">
                            <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'signup' )); ?>" class="btn btn-danger">Devenir membre</a>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="">

            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>


            <footer>
                <p>&copy; Company 2013</p>
            </footer><!-- Le javascript
              ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->

            <?php echo $this->Html->script('bootstrap.min'); ?>
            <?php echo $this->Html->script('bootstrap-fileupload.min'); ?>
        </div> <!-- /container -->



    </body>
</html>

