<div class="span12">
    <h5>Votre inscription est presque terminée veuillez choisir un mot de passe et un nom d'utilisateur</h5>

    <?php echo $this->Form->create('Users', array('class' => 'form-horizontal')); ?>

    <div class="control-group">
        <label class="control-label" for="inputRegion"><?php echo __('Nom d\'utilisateur'); ?></label>
        <div class="controls">
            <?php echo $this->Form->input('username', array('label' => false, 'class' => 'span4')); ?>
        </div>
    </div>
    
    
    <div class="control-group">
         <div class="controls">
    <?php echo $this->Form->submit(__('Terminer et se connecter')) ;?>
        </div>
    </div>
    
    <?php echo $this->Form->end(); ?>
</div>
