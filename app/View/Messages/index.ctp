  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <style>
  .ui-autocomplete-loading {
    background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat;
  }
  /*input[type="text"]{
      background-color: #ddd !important;
  }*/
  </style>
  
   <script>
  $(function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
    $( "#messages" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "/ramifood/ajax/autocomplete", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 1 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push(ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  });
  </script>
  
  
<div class="span9">

<!--<div class="ui-widget">
  <label for="birds">Birds: </label>
  <input id="birds" size="50" />
</div>-->

    <?php echo $this->Form->create('Message', array(
        'url' => array('action' => 'add')
)
             
); ?>

     <div class="examples">
       <?php echo $this->Form->input('to', array('type' => 'text','id' => 'messages')); ?>
     </div>
    <?php echo $this->Form->input('message'); ?>

    <?php echo $this->Form->submit('Envoyer le message', array('class' => 'btn')); ?>

    <?php echo $this->Form->end(); ?>
    <?php foreach ($messages as $message): ?>

        <?php echo ($message['Message']['status'] == 0) ? '<i class="icon icon-eye-open"></i>' : null; ?>
        <?php echo $username = $this->Users->getUsername($message['Message']['from']); ?>
        <span><?php echo $this->Users->getAvatar($message['Message']['from']); ?>&nbsp;</span>
        <h4></h4>

        <p><?php echo $this->Text->truncate($message['Message']['message'], 100); ?>&nbsp;</p>
        <td><?php echo $this->Time->timeAgoInWords($message['Message']['created']); ?>&nbsp;</td>
        <blockquote>
            <small>
                <?php echo $this->Form->postLink(__('Voir'), array('controller' => 'messages', 'action' => 'view', $message['Message']['id'])) ?>
            </small>
        </blockquote>
        <div class="response-form" id="response-<?php echo $message['Message']['id']; ?>">
            <?php
            echo $this->Form->create('Message', array(
                'id' => 'message-' . $message['Message']['id']
            ));
            ?>

            <?php echo $this->Form->input('message', array('type' => 'textarea', 'id' => 'mess-' . $message['Message']['id'])); ?>
            <?php echo $this->Form->input('from', array('type' => 'hidden', 'default' => (int) $this->Session->read('Auth.User.id'), 'id' => 'from-' . $message['Message']['id'])); ?>
            <?php echo $this->Form->input('to', array('type' => 'hidden', 'default' => $message['Message']['from'], 'id' => 'to-' . $message['Message']['id'])); ?>
            <?php echo $this->Form->input('reply', array('type' => 'hidden', 'default' => $message['Message']['id'], 'id' => 'reply-' . $message['Message']['id'])); ?>

            <?php echo $this->Form->submit('Repondre au message', array('class' => 'btn')); ?>

            <?php echo $this->Form->end(); ?>

        </div>

    <?php endforeach; ?>
</div>
<script>
    $(function() {

    $('.response-form').hide();

        $('.response').click(function() {
            id = $(this).attr('id');

            $('#response-' + id).toggle(500);

            message = $('#mess-' + id).val();
            from = $('#from-' + id).val();
            to = $('#to-' + id).val();
            reply = $('#reply-' + id)

            url = '/ajax/message_reply/'

            $('#message-' + id).submit(function() {

                $.post(url, {message: message, from: from, to: to, reply: reply}, function(data) {

                    if (data.status === 'ok') {

                    }

                }, 'json');

                return false;
            });

            return false;
        });

    });

</script>
