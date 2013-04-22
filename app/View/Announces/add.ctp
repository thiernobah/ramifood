<?php echo $this->Html->script('/js/dropzone/dropzone.min'); ?>
<?php echo $this->Html->css('/css/dropzone/dropzone'); ?>

<form action="/ramifood/ajax/upload" class="dropzone"></form> 
<div class="announces form">
<?php echo $this->Form->create('Announce'); ?>
	<fieldset>
		<legend><?php echo __('Add Announce'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('price');
		echo $this->Form->input('place');
                echo $this->Form->input('zip');
		echo $this->Form->input('recipe');
                echo $this->Form->input('users_id', array('type' => 'hidden','default' => $this->Session->read('Auth.User.id')))
	?>
                <?php echo $this->Form->submit('Ajouter l\'annonce', array('class' => 'btn')); ?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>


