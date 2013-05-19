<div class="commmentsPhotos form">
<?php echo $this->Form->create('CommmentsPhoto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Commments Photo'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CommmentsPhoto.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CommmentsPhoto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Commments Photos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photos'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
	</ul>
</div>
