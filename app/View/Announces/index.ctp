<?php foreach ($announces as $announce): ?>

     <h1><?php echo $this->Html->link($announce['Announce']['title'], array('controller' => 'announces', 'action'=>'view',$this->Slug->slug($announce['Announce']['id'],$announce['Announce']['title'] ))); ?></h1>
     <?php echo $announce['Announce']['description']; ?>


<?php endforeach; ?>


<div class="announces index">
	<h2><?php echo __('Announces'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('place'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('recipes_id'); ?></th>
			<th><?php echo $this->Paginator->sort('recipe'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($announces as $announce): ?>
	<tr>
		<td><?php echo h($announce['Announce']['id']); ?>&nbsp;</td>
		<td><?php echo h($announce['Announce']['title']); ?>&nbsp;</td>
		<td><?php echo h($announce['Announce']['description']); ?>&nbsp;</td>
		<td><?php echo h($announce['Announce']['price']); ?>&nbsp;</td>
		<td><?php echo h($announce['Announce']['place']); ?>&nbsp;</td>
		<td><?php echo h($announce['Announce']['created']); ?>&nbsp;</td>
		<td><?php echo h($announce['Announce']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($announce['Recipes']['title'], array('controller' => 'recipes', 'action' => 'view', $announce['Recipes']['id'])); ?>
		</td>
		<td><?php echo h($announce['Announce']['recipe']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $announce['Announce']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $announce['Announce']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $announce['Announce']['id']), null, __('Are you sure you want to delete # %s?', $announce['Announce']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Announce'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
