<div class="announces form">
<?php echo $this->Form->create('Announce'); ?>
	<fieldset>
		<legend><?php echo __('Edit Announce'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('price');
		echo $this->Form->input('place');
		echo $this->Form->input('recipes_id');
		echo $this->Form->input('recipe');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Announce.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Announce.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Announces'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
