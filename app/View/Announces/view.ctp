<div class="span3">

</div>
<div class="span9">

    <h1><?php echo $announce['Announce']['title']; ?></h1>
    <p><?php echo $announce['Announce']['description']; ?></p>

    <?php echo h($announce['Announce']['price']); ?>
    <?php echo h($announce['Announce']['recipe']); ?>
    <?php echo h($announce['Announce']['place']); ?>

    <blockquote>
        <small><?php echo $this->Time->timeAgoInWords($announce['Announce']['created']); ?></small>
    </blockquote>

    <div class="participe">
        <?php if ($count > 0): ?>
        <strong>Inscrit pour ce repas</strong>
        <?php else: ?>
            <?php
            echo $this->Form->create('Subscriber', array(
                'url' => array('controller' => 'subscribers', 'action' => 'participate')
            ));
            ?>
            <?php echo $this->Form->input('message', array('type' => 'textarea')); ?>
            <?php echo $this->Form->input('users_id', array('type' => 'hidden', 'default' => (int) $this->Session->read('Auth.User.id'))); ?>
            <?php echo $this->Form->input('announces_id', array('type' => 'hidden', 'default' => (int) $announce['Announce']['id'])); ?>
            <?php echo $this->Form->submit('Particper', array('class' => 'btn')); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    <?php endif; ?>
</div>




