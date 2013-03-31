<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
                <?php echo $this->Form->submit('Se connecter', array('class' => 'btn')); ?>
	</fieldset>
<?php echo $this->Form->end(); ?>
      
    <div class="">
        Se connecter avec facebook
        <a href="#" class="fbconnect">facebook connect</a>
    </div>    
      
    
</div>
