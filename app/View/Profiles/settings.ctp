<div class="profiles">
    <?php debug($profile); ?>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<?php echo $this->Html->script('bootstrap-fileupload.min'); ?>
<?php echo $this->Html->css('bootstrap-fileupload.min'); ?>

<script>

    
</script>



<div class="profiles form desc">

    <?php echo $this->Form->create('Profile', array('type' => 'file',
        'url' => array('controller' => 'profiles', 'action' => 'avatar'))); ?>

    <div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="fileupload-new thumbnail" style="width: 200px; height: 200px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
        <div>
            <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                <span class="fileupload-exists">Change</span>
                <?php echo $this->Form->file('avatar'); ?>
            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
            <?php echo $this->Form->submit('envoyer', array('class' => 'fileupload-exists')); ?>
        </div>
    </div>


    <?php echo $this->Form->end(); ?>


    <hr>
    <?php
    echo $this->Form->create('Profile', array(
        'url' => array('controller' => 'profiles', 'action' => 'add')
    ));
    ?>
    <fieldset>
        <legend><?php echo __('Add Profile'); ?></legend>
        <?php echo $this->Form->input('description', array('type' => 'textarea', 'default' => $profile['Profile']['description'])); ?>
        <?php echo $this->Form->input('address', array('default' => $profile['Profile']['address'])); ?>
        <?php echo $this->Form->input('zip', array('default' => $profile['Profile']['zip'])); ?>
        <?php echo $this->Form->input('city', array('default' => $profile['Profile']['city'])); ?>
        <?php echo $this->Form->submit('Modifier'); ?>
    </fieldset>


    <?php echo $this->Form->end(); ?>

    <hr>
    <div class="users">

        <?php
        echo $this->Form->create('User', array(
            'url' => array('controller' => 'users', 'action' => 'set_username')
        ));
        ?>


        <?php echo $this->Form->input('username', array('label' => 'Nom d\'utilisateur', 'default' => $user['User']['username'])); ?>
        <?php echo $this->Form->input('firstname', array('label' => 'Prénom', 'default' => $user['User']['firstname'])); ?>
        <?php echo $this->Form->input('lastname', array('label' => 'Nom', 'default' => $user['User']['lastname'])); ?>

        <?php echo $this->Form->submit('Modifier'); ?>

        <?php echo $this->Form->end(); ?>

        <hr>

        <?php
        echo $this->Form->create('User', array(
            'url' => array('controller' => 'users', 'action' => 'set_password')
        ));
        ?>


        <?php echo $this->Form->input('oldpassword', array('type' => 'password', 'label' => 'Ancien mot de passe')); ?>
        <?php echo $this->Form->input('password', array('label' => 'Nouveau mot de passe')); ?>
        <?php echo $this->Form->submit('Modifier'); ?>

        <?php echo $this->Form->end(); ?>
    </div>
</div>
