<?php foreach($announces as $announce): ?>
<h1><?php echo $announce['Announce']['title']; ?></h1>
<p><?php echo $announce['Announce']['description']; ?></p>
<blockquote>
    <small><?php echo $this->Time->timeAgoInWords($announce['Announce']['created']); ?></small>
</blockquote>
<?php endforeach; ?>

