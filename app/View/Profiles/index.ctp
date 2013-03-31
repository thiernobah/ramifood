<?php $ext = pathinfo($profile['Profile']['avatar'], PATHINFO_EXTENSION); ?>

<?php str_replace('.' . $ext, '_200.' . $ext, $profile['Profile']['avatar']); ?>
<div class="span3">
    <?php echo $this->Html->image('/img/avatars/' . str_replace('.' . $ext, '_200.' . $ext, $profile['Profile']['avatar'])); ?>
</div>

<div class="span7">
    <h1><?php echo $user['User']['username']; ?></h1>
    <p><?php echo $profile['Profile']['description']; ?></p>
</div>