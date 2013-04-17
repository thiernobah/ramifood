<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.min.js" type="text/javascript" charset="utf-8">
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<?php //echo $this->Html->css('autocomplete'); ?>
<div class="span9">



    <?php echo $this->Form->create('Message'); ?>

    <?php echo $this->Form->input('to'); ?>
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
