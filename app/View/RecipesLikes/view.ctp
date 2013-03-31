<div class="recipesLikes view">
<h2><?php  echo __('Recipes Like'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recipesLike['RecipesLike']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($recipesLike['RecipesLike']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($recipesLike['RecipesLike']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recipes'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipesLike['Recipes']['title'], array('controller' => 'recipes', 'action' => 'view', $recipesLike['Recipes']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipesLike['Users']['id'], array('controller' => 'users', 'action' => 'view', $recipesLike['Users']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipes Like'), array('action' => 'edit', $recipesLike['RecipesLike']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recipes Like'), array('action' => 'delete', $recipesLike['RecipesLike']['id']), null, __('Are you sure you want to delete # %s?', $recipesLike['RecipesLike']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes Likes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes Like'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
