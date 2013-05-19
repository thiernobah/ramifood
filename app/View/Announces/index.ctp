<?php foreach ($announces as $announce): ?>
     <h1><?php echo $this->Html->link($announce['Announce']['title'], array('controller' => 'announces', 'action'=>'view',$this->Slug->slug($announce['Announce']['id'],$announce['Announce']['title'] ))); ?></h1>
     <?php echo $announce['Announce']['description']; ?>
     <blockquote>
         <small>
             <?php echo $this->Announce->getSubscriberCount($announce['Announce']['id']) ?> participant(s)
         </small>
     </blockquote>
       <?php echo $this->Time->timeAgoInWords($announce['Announce']['created']); ?> 
<?php endforeach; ?>


