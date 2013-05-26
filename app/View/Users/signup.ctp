<style>
    .bs-docs-social {
        border-color:#DDDDDD;
        border-style:solid;
        border-width:1px;
        padding:15px 0;
        margin-top: 30px;
        padding-bottom: 0;
         -webkit-border-radius: 10px;
   -moz-border-radius: 10px;
   border-radius: 10px;
    }
</style>
<div class="container">
    <div class="bs-docs-social">
        <div class="users form">
            <?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
            <fieldset>
                <div class="control-group">
                     <div class="controls">
                <h4>Rejoignez Ramifood et partager</h4>
                     </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputRegion"><?php echo __('Nom d\'utilisateur'); ?></label>
                    <div class="controls">
                        <?php echo $this->Form->input('username', array('label' => false, 'class' => 'span4')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputRegion"><?php echo __('Adresse email'); ?></label>
                    <div class="controls">
                        <?php echo $this->Form->input('email', array('label' => false, 'class' => 'span4')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputRegion"><?php echo __('Mot de passe'); ?></label>
                    <div class="controls">
                        <?php echo $this->Form->input('password', array('label' => false, 'class' => 'span4')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputRegion"><?php echo __('Prénom'); ?></label>
                    <div class="controls">
                        <?php echo $this->Form->input('firstname', array('label' => false, 'class' => 'span4')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputRegion"><?php echo __('Nom'); ?></label>
                    <div class="controls">
                        <?php echo $this->Form->input('lastname', array('label' => false, 'class' => 'span4')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputRegion"><?php echo __('Date de naissance'); ?></label>
                    <div class="controls">
                        <?php echo $this->Form->input('birthday', array('type' => 'text', 'label' => false, 'class' => 'span4')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputRegion"><?php echo __('J\'accepte les conditions d\'utilisations'); ?></label>
                    <div class="controls">
                        <?php echo $this->Form->input('accepted', array('label' => false)); ?>
                    </div>
                </div>

                <?php echo $this->Form->input('role', array('type' => 'hidden', 'default' => 'author')); ?>

                <div class="control-group">
                    <div class="controls">

                        <?php echo $this->Form->submit('Créer mon compte', array('class' => 'btn btn-info span4')); ?>
                    </div>
                </div>
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
        <div class="social_login">
            
        </div>
    </div>
</div>
