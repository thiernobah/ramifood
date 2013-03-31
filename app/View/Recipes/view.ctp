<div class="recipes view">
    <h2><?php echo __('Recipe'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($recipe['Recipe']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Title'); ?></dt>
        <dd>
            <?php echo h($recipe['Recipe']['title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Recipe'); ?></dt>
        <dd>
            <?php echo h($recipe['Recipe']['recipe']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($recipe['Recipe']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($recipe['Recipe']['modified']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Users'); ?></dt>
        <dd>
            <?php echo $this->Html->link($recipe['User']['username'], array('controller' => 'users', 'action' => 'view', $recipe['User']['id'])); ?>
            &nbsp;
        </dd>
    </dl>
    
    <?php if($this->Users->voted( $recipe['Recipe']['id']) > 0): ?>
    <a href="#">Vous aimez</a>
    <?php else: ?>
         <a href="#" class="btn like" id="<?php echo $recipe['Recipe']['id'] ?>" title="like"><span class="like_count"><?php echo $recipe['Recipe']['like']; ?></span></a>
    <?php endif; ?>
    <a href="#" id="liker" data-toggle="tooltip"  title="voir les personnes qui aiment cette recette"><i class="icon icon-eye-open"></i></a>
    
    
    
    
    <?php foreach ($commments as $commment): ?>
    
    <h4><?php echo $commment[0]['username']; ?></h4>
    <p><?php echo $commment['Comment']['comment']; ?></p>
    <small><?php echo $this->Time->timeAgoInWords($commment['Comment']['created']); ?></small>
    
    <?php endforeach; ?>

    <?php if ($this->Session->read('Auth.User.id')): ?>

        <?php echo $this->Form->create('Comment', array(
            'url' => array('controller' => 'comments', 'action' => 'add'),
            'label' => 'Commentaire'
          )); ?>
    
        <fieldset>
            <!--<legend><?php echo __('Add Comment'); ?></legend>-->
            <?php
            echo $this->Form->input('comment');
            echo $this->Form->input('recipes_id', array('type' => 'hidden', 'default' => $recipe['Recipe']['id']));
            echo $this->Form->input('users_id', array('type' => 'hidden', 'default' => $this->Session->read('Auth.User.id')));
            
            ?>
            
            <?php echo $this->Form->submit('Ajouter le commentaire', array('class' => 'btn')); ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>   


    <?php else: ?>

    <?php endif; ?>

</div>


<script>
  $(function(){
      
      $('#liker').tooltip({
          placement:'top'
      })
       
       $('.like').click(function(){
           id = $(this).attr('id');
           
           url = '/ajax/like/'
           
           $.post(url, {id:id},function(data){
               
               if(data.like){
                   
                   $('.like_count').fadeOut();
                   $('.like_count').empty().append(data.like);
                   $('.like_count').fadeIn(500)
               }
               
           }, 'json');
           return false;
       })
       
  });


</script>
