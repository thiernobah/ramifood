<?php $description = __d('socialfood_dev', 'Repas chez l\'habitants, Recettes de cuisine, Chat'); ?>
<!DOCTYPE html>
<html>
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
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        
        <?php echo $this->Html->css('bootstrap-responsive.min'); ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="/ramifod/js/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

        <div class="container">
            
            <!-- Example row of columns -->
            <div class="row">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>

                <footer>
                    <p>&copy; Company 2013</p>
                </footer><!-- Le javascript
                  ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->

                <?php echo $this->Html->script('bootstrap.min'); ?>

                <!-- Load JS here for greater good =============================-->
                <!--[if lt IE 8]>
                  <script src="js/icon-font-ie7.js"></script>
                  <script src="js/icon-font-ie7-24.js"></script>
                <![endif]-->
                <?php $path = __DIR__ . '../Element/navs/admin-menu.ctp' ?>
                <script>
                    $(function() {
                        $('.dropdown-toggle').dropdown();

                        setInterval(function() {
                            $('#mess').load('<?php echo 'http://' . $_SERVER['SERVER_NAME'] . $this->here; ?> #mess');

                        }, 30000)
                    });
                </script>
                <div id="fb-root"></div>
                <?php echo $this->Html->script('facebook'); ?>
              

<?php echo $this->Html->script('bootstrap-fileupload.min'); ?>
            </div> <!-- /container -->



    </body>
</html>

