<div class="container">

<div class="col-lg-4">

</div>

<div class="col-lg-8">

   
<?php foreach ($announces as $announce): ?>
  
  <div class="col-lg-6">
    <h4><?php echo $announce['Announce']['title']; ?></h4>
    <p><?php echo $announce['Announce']['description']; ?></p>
    <blockquote>
        <small><?php echo $this->Time->timeAgoInWords($announce['Announce']['created']); ?></small>
    </blockquote>

   
        <!--<?php foreach ($this->Announce->getSubscriber($announce['Announce']['id']) as $users_id): ?>
            <span class="col-lg-1"><?php echo $this->Users->getAvatar($users_id['Subscriber']['users_id']); ?></span>
            <span class="col-lg-2">
                <?php echo $this->Users->getUsername($users_id['Subscriber']['users_id']); ?>
                <?php if ($users_id['Subscriber']['status'] == 0): ?>
                    <a href="#" class="confirmed" id="<?php echo $users_id['Subscriber']['users_id'] . '-' . $announce['Announce']['id'] ?>"><span class="confirmed_status_<?php echo $users_id['Subscriber']['users_id']; ?>">Confirmer</span></a>
                <?php else: ?>
                    <i class="icon icon-adjust"></i>
                        
               <?php endif; ?>
            </span>

        <?php endforeach; ?>-->
    


   </div>
<?php endforeach; ?>
</div>
</div>
<?php echo $this->Html->script('likes'); ?>
