<div class="commmentsPhotos form">
<?php echo $this->Form->create('CommmentsPhoto'); ?>
	<fieldset>
		<legend><?php echo __('Add Commments Photo'); ?></legend>
	<?php
		echo $this->Form->input('photos_id');
		echo $this->Form->input('comment');
		echo $this->Form->input('level');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Commments Photos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photos'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
	</ul>
</div>
