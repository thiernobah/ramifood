<div class="recipes view">

        <h1>
            <?php echo h($recipe['Recipe']['title']); ?>
            &nbsp;
        </h1>
        <p>
            <?php echo h($recipe['Recipe']['recipe']); ?>
            &nbsp;
        </p>
        
        <blockquote>
            <small>
            <?php echo $this->Time->timeAgoInWords($recipe['Recipe']['created']); ?>
            &nbsp; par <?php echo $this->Html->link($recipe['User']['username'], array('controller' => 'users', 'action' => 'view', $recipe['User']['username'])); ?>
           
            </small>
        </blockquote>
    
    <?php if($this->Users->voted( $recipe['Recipe']['id']) > 0): ?>
    <a href="#liker" role="button" class="" data-toggle="modal"><i class="icon icon-thumbs-up"></i> Vous <?php echo ($this->Users->voted($recipe['Recipe']['id']) > 0) ? 'et '.$this->Users->voted($recipe['Recipe']['id']).' autre(s) personne(s) aiment ça' : 'aimez' ; ?></a>
    <?php else: ?>
         <a href="#" class="btn like" id="<?php echo $recipe['Recipe']['id'] ?>" title="like"><span class="like_count_<?php echo $recipe['Recipe']['id'] ?>"><i class="icon icon-thumbs-up"></i> <?php echo $recipe['Recipe']['like']; ?></span></a>
    <?php endif; ?>
     <div id="liker" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Modal header</h3>
            </div>
            <div class="modal-body">
                <?php foreach ($liker as $like): ?>
                <div class="span2">
                    <?php echo $this->Users->getAvatar($like['RecipesLike']['users_id']); ?>
                </div>
               
                <div class="span2"><?php echo $this->Users->getUsername($like['RecipesLike']['users_id']); ?></div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
     </div>
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
<?php echo $this->Html->script('likes'); ?>



