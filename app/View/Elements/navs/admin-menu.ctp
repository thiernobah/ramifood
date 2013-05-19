<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="<?php echo $this->Active->is_active('profiles'); ?>"><?php echo $this->Html->link(__('Profil'), array('controller' => 'profiles', 'action' => 'index')); ?></li>
                    <li class="<?php echo $this->Active->is_active('recipes'); ?>"><?php echo $this->Html->link(__('Mes recettes'), array('controller' => 'recipes', 'action' => 'my_recipes')); ?></li>
                    <li class="<?php echo $this->Active->is_active('announces'); ?>"><?php echo $this->Html->link(__('Mes annonces'), array('controller' => 'announces', 'action' => 'my_announces')); ?></li>
                    <li class="plop"><a href="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'index')); ?>"><div id="mess"><?php echo $this->Notif->message(); ?></div> <i class="icon icon-white icon-envelope"></i></a></li>
                </ul>
                <ul class="nav pull-right">

                    <li>
                        <a class="dropdown-toggle"  role="button" data-target="#" href="#">
                            <span class="fui-man-16"></span> <?php echo $this->Session->read('Auth.User.username'); ?>  <b class="icon icon-set"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link(__('Se déconnecter'), array('controller' => 'users', 'action' => 'logout'), array('style' => 'font-weight: bold;')); ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- END .navbar -->

