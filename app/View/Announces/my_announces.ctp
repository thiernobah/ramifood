<?php foreach ($announces as $announce): ?>
    <h1><?php echo $announce['Announce']['title']; ?></h1>
    <p><?php echo $announce['Announce']['description']; ?></p>
    <blockquote>
        <small><?php echo $this->Time->timeAgoInWords($announce['Announce']['created']); ?></small>
    </blockquote>

    <div class="span3">
        <?php foreach ($this->Announce->getSubscriber($announce['Announce']['id']) as $users_id): ?>
            <span class="span1"><?php echo $this->Users->getAvatar($users_id['Subscriber']['users_id']); ?></span>
            <span class="span2">
                <?php echo $this->Users->getUsername($users_id['Subscriber']['users_id']); ?>
            </span>
        <?php endforeach; ?>
    </div>


<?php endforeach; ?>



