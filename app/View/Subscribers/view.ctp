<div class="subscribers view">
<h2><?php  echo __('Subscriber'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Announces'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subscriber['Announces']['title'], array('controller' => 'announces', 'action' => 'view', $subscriber['Announces']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subscriber['Users']['id'], array('controller' => 'users', 'action' => 'view', $subscriber['Users']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subscriber'), array('action' => 'edit', $subscriber['Subscriber']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Subscriber'), array('action' => 'delete', $subscriber['Subscriber']['id']), null, __('Are you sure you want to delete # %s?', $subscriber['Subscriber']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Subscribers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subscriber'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Announces'), array('controller' => 'announces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Announces'), array('controller' => 'announces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
