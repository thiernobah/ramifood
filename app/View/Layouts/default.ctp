<?php $description = __d('socialfood_dev', 'Social Food: Restauration, Recettes, Chat'); ?>
<!DOCTYPE html>
<html lang="en">
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
        <!-- css files -->
        <!-- end css -->

        <!-- js files -->

        <!-- end js -->

        <?php echo $this->fetch('meta'); ?>
        <?php echo $this->fetch('css'); ?>
        <?php echo $this->fetch('script'); ?>

        <!-- Le styles -->
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <?php echo $this->Html->css('bootstrap-responsive.min'); ?>
        
        
        <?php echo $this->Html->script('jquery-1.8.2.min'); ?>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
    </head>

    <body>

        <?php if ($this->Session->read('Auth.User.id')): ?>
            <?php echo $this->element('/navs/admin-menu'); ?>
        <?php endif; ?>
        <div class="container">

            <div class="row">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div> <!-- /container -->
        <footer>
            <p>&copy; Socialfood 2013</p>
        </footer>

        <!-- Le javascript
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

    </body>
</html>

