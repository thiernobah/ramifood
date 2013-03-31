<div class="recipesLikes index">
	<h2><?php echo __('Recipes Likes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('recipes_id'); ?></th>
			<th><?php echo $this->Paginator->sort('users_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($recipesLikes as $recipesLike): ?>
	<tr>
		<td><?php echo h($recipesLike['RecipesLike']['id']); ?>&nbsp;</td>
		<td><?php echo h($recipesLike['RecipesLike']['created']); ?>&nbsp;</td>
		<td><?php echo h($recipesLike['RecipesLike']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recipesLike['Recipes']['title'], array('controller' => 'recipes', 'action' => 'view', $recipesLike['Recipes']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($recipesLike['Users']['id'], array('controller' => 'users', 'action' => 'view', $recipesLike['Users']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recipesLike['RecipesLike']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recipesLike['RecipesLike']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recipesLike['RecipesLike']['id']), null, __('Are you sure you want to delete # %s?', $recipesLike['RecipesLike']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Recipes Like'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
