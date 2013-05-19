<div class="profiles">

</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<?php echo $this->Html->script('bootstrap-fileupload.min'); ?>
<?php echo $this->Html->css('bootstrap-fileupload.min'); ?>
<?php echo $this->Html->script('/js/holder/holder'); ?>


<div class="profiles form desc">

    <img src="holder.js/225x200" class="img-rounded">
    <?php
    echo $this->Form->create('Profile', array(
        'url' => array('controller' => 'profiles', 'action' => 'avatar'),
        'type' => 'file',
        'id' => 'uploading'
    ));
    ?>

    <?php echo $this->Form->input('avatar', array('label' => false,'type' => 'file', 'id' => 'avatar', 'style' => 'visibility:hidden;width: 40px;')); ?>
    <input type="button" value="Choisir une photo" class="btn" onclick="$('#avatar').click();"/>
    <input class="btn" type="submit" value="Envoyer"/>
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
<script type="text/javascript">
        /*  form = document.getElementById('uploading');
         progression = document.getElementById('advance');
         infos = document.getElementById('infos');
         
         inputfile = document.getElementById('avatar');
         fichier = inputfile.files;
         
         $("#advance").hide();
         
         form.onsubmit = function(event) {
         
         event.preventDefault();
         if (window.FormData) {
         fd = new FormData();
         } else {
         alert('Form data non supporté');
         }
         
         xhr = new XMLHttpRequest();
         xhr.open("POST", form.getAttribute("action"), true);
         
         
         xhr.onreadystatechange = function(event) {
         if (this.readyState === 4) {
         infos.innerHTML += event.target.responseText;
         }
         }
         
         xhr.upload.onprogress = function(event) {
         $("#advance").show();
         if (event.lengthComputable) {
         p = Math.round(event.loaded * 100 / event.total);
         infos.innerHTML += p.toString() + '%';
         progression.setAttribute("aria-valuenow", p);
         progression.value = p;
         }
         }
         
         xhr.onload = function(event) {
         //infos.innerHTML += '<p style="color:green;">Chargement terminé</p>';
         $('#advance').hide();
         $("#infos").empty();
         //document.location.reload();
         }
         
         xhr.onerror = function(event) {
         infos.innerHTML += '<p style="color:red;">Error</p>';
         }
         
         xhr.onabort = function(event) {
         infos.innerHTML += '<p style="color:orange;">Annulé</p>';
         }
         
         //infos.innerHTML += "envoi de " + fichier[0].name + "...<br/>";
         //fd.append(input);
         
         xhr.send(fd);
         return false;
         }*/
</script>