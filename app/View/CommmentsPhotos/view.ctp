<div class="commmentsPhotos view">
<h2><?php  echo __('Commments Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($commmentsPhoto['CommmentsPhoto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($commmentsPhoto['Photos']['id'], array('controller' => 'photos', 'action' => 'view', $commmentsPhoto['Photos']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($commmentsPhoto['CommmentsPhoto']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($commmentsPhoto['CommmentsPhoto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($commmentsPhoto['CommmentsPhoto']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Level'); ?></dt>
		<dd>
			<?php echo h($commmentsPhoto['CommmentsPhoto']['level']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Commments Photo'), array('action' => 'edit', $commmentsPhoto['CommmentsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Commments Photo'), array('action' => 'delete', $commmentsPhoto['CommmentsPhoto']['id']), null, __('Are you sure you want to delete # %s?', $commmentsPhoto['CommmentsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Commments Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Commments Photo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photos'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
	</ul>
</div>
