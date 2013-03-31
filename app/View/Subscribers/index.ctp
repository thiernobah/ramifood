<div class="subscribers index">
	<h2><?php echo __('Subscribers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('message'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('announces_id'); ?></th>
			<th><?php echo $this->Paginator->sort('users_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($subscribers as $subscriber): ?>
	<tr>
		<td><?php echo h($subscriber['Subscriber']['id']); ?>&nbsp;</td>
		<td><?php echo h($subscriber['Subscriber']['message']); ?>&nbsp;</td>
		<td><?php echo h($subscriber['Subscriber']['created']); ?>&nbsp;</td>
		<td><?php echo h($subscriber['Subscriber']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($subscriber['Announces']['title'], array('controller' => 'announces', 'action' => 'view', $subscriber['Announces']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($subscriber['Users']['id'], array('controller' => 'users', 'action' => 'view', $subscriber['Users']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $subscriber['Subscriber']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subscriber['Subscriber']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subscriber['Subscriber']['id']), null, __('Are you sure you want to delete # %s?', $subscriber['Subscriber']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Subscriber'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Announces'), array('controller' => 'announces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Announces'), array('controller' => 'announces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
