<div class="span9">
    <?php debug($recipes); ?>
    <?php foreach ($recipes as $recipe): ?>
    
    <h1>
        <?php echo $this->Html->link($recipe['Recipe']['title'], 
            array('controller' => 'recipes', 'action' => 'view',
                $this->Slug->slug($recipe['Recipe']['id'], $recipe['Recipe']['title']))) ?>
    </h1>
    <p>
        <?php echo $this->Text->truncate($recipe['Recipe']['recipe'], 200, array()); ?>
    </p>
    <blockquote>
        <small>
            <?php echo $this->Time->timeAgoInWords($recipe['Recipe']['created']) ;?>
                par <?php echo $this->Html->link($recipe[0]['username'], array('controller' => 'users','action' => 'view', $recipe[0]['username'])); ?>
        </small>
        
    </blockquote>
    
    
    <?php endforeach; ?>
</div>


