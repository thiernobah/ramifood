<div class="recipesLikes form">
<?php echo $this->Form->create('RecipesLike'); ?>
	<fieldset>
		<legend><?php echo __('Edit Recipes Like'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('recipes_id');
		echo $this->Form->input('users_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RecipesLike.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RecipesLike.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes Likes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
