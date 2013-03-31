<div class="announces form">
<?php echo $this->Form->create('Announce'); ?>
	<fieldset>
		<legend><?php echo __('Add Announce'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('price');
		echo $this->Form->input('place');
                echo $this->Form->input('zip');
		echo $this->Form->input('recipe');
                echo $this->Form->input('users_id', array('type' => 'hidden','default' => $this->Session->read('Auth.User.id')))
	?>
                <?php echo $this->Form->submit('Ajouter l\'annonce', array('class' => 'btn')); ?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Announces'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
