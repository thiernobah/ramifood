<div class="profiles">

</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<?php echo $this->Html->script('bootstrap-fileupload.min'); ?>
<?php echo $this->Html->css('bootstrap-fileupload.min'); ?>

<script type="text/javascript">
   var upload = function() {
            fileInput = document.querySelector('#file');
            fileInput.onchange = function() {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/ramifood/ajax/upload');
                xhr.upload.onprogress = function(e) {
                    /*progress.value = e.loaded;
                    progress.max = e.total;*/
                    $('.fileupload-preview').empty().append('Loading ...')
                };

                xhr.onload = function() {
                    alert('Upload terminé !');
                };

                var form = new FormData();
                form.append('file', fileInput.files[0]);

                xhr.send(form);
            };

            return false;
   }
       
   
</script>
<div class="profiles form desc">

    <form action="/" method="post" onsubmit="return upload();">

    <div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
        <div>
            <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                <input id="file" name="avatar" type="file" /></span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
            <input type="submit" value="envoyer" class="btn">
        </div>
    </div>
    </form>


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
