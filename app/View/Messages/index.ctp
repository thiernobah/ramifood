<div class="span9">
<?php foreach ($messages as $message): ?>
            
     <?php //debug($message); ?>
    
    <?php echo ($message['Message']['status'] == 0) ? '<i class="icon icon-eye-open"></i>' :null; ?>
                <?php echo $username = $this->Users->getUsername($message['Message']['from']); ?>
		<span><?php echo $this->Users->getAvatar($message['Message']['from']); ?>&nbsp;</span>
                <h4><a href="/users/<?php echo $username; ?>/" title="<?php echo __('Voir le profil de ').$username; ?> "><?php echo $username; ?></a></h4>
                
                <p><?php echo $this->Text->truncate($message['Message']['message'], 100); ?>&nbsp;</p>
                <td><?php echo $this->Time->timeAgoInWords($message['Message']['created']); ?>&nbsp;</td>
                <blockquote>
                    <small>
                        <?php echo $this->Form->postLink(__('Voir'), array('controller' => 'messages', 'action' => 'view', $message['Message']['id'] ))?>
                    </small>
                </blockquote>
                <div class="response-form" id="response-<?php echo $message['Message']['id']; ?>">
                    <?php echo $this->Form->create('Message', array(
                        'id' => 'message-'.$message['Message']['id']
                    )); ?>
                    
                    <?php echo $this->Form->input('message', array('type'=>'textarea', 'id' => 'mess-'.$message['Message']['id'])); ?>
                    <?php echo $this->Form->input('from', array('type' => 'hidden', 'default' => (int)$this->Session->read('Auth.User.id'), 'id' =>'from-'.$message['Message']['id'])); ?>
                    <?php echo $this->Form->input('to', array('type' => 'hidden', 'default' => $message['Message']['from'], 'id' => 'to-'.$message['Message']['id'])); ?>
                    <?php echo $this->Form->input('reply', array('type' => 'hidden', 'default' => $message['Message']['id'], 'id' => 'reply-'.$message['Message']['id'])); ?>
                    
                    <?php echo $this->Form->submit('Repondre au message', array('class' => 'btn')); ?>
                    
                    <?php echo $this->Form->end(); ?>
                    
                </div>
                
<?php endforeach; ?>
</div>
<script>
$(function(){
    $('.response-form').hide();
    
    $('.response').click(function(){
           id = $(this).attr('id');
           
          $('#response-'+id).toggle(500);
          
          message = $('#mess-'+id).val();
          from = $('#from-'+id).val();
          to = $('#to-'+id).val();
          reply = $('#reply-'+id)
          
          url = '/ajax/message_reply/'
          
          $('#message-'+id).submit(function(){
              
              $.post(url, {message:message,from:from,to:to,reply:reply}, function(data){
                  
                  if(data.status === 'ok'){
                      
                  }
                  
              }, 'json');
              
              return false;
          });
          
          return false;
    });
    
});

</script>
	