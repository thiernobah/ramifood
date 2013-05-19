<div class="subscribers form">
<?php echo $this->Form->create('Subscriber'); ?>
	<fieldset>
		<legend><?php echo __('Add Subscriber'); ?></legend>
	<?php
		echo $this->Form->input('message');
		echo $this->Form->input('announces_id');
		echo $this->Form->input('users_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Subscribers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Announces'), array('controller' => 'announces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Announces'), array('controller' => 'announces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
