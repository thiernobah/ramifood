<?php debug($recipes); ?>

<?php foreach ($recipes as $recipe): ?>

    <?php echo $this->Html->link($recipe['Recipe']['title'],array('controller' => 'recipes', 'action' => 'view',$recipe['Recipe']['id'].'-'.$recipe['Recipe']['title'])); ?>

<?php endforeach; ?>

