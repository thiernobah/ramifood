<div class="users view">
    <h2><?php echo __('User'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Username'); ?></dt>
        <dd>
            <?php echo h($user['User']['username']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Email'); ?></dt>
        <dd>
            <?php echo h($user['User']['email']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Password'); ?></dt>
        <dd>
            <?php echo h($user['User']['password']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Firstname'); ?></dt>
        <dd>
            <?php echo h($user['User']['firstname']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Lastname'); ?></dt>
        <dd>
            <?php echo h($user['User']['lastname']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($user['User']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($user['User']['modified']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Birthday'); ?></dt>
        <dd>
            <?php echo h($user['User']['birthday']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Online'); ?></dt>
        <dd>
            <?php echo h($user['User']['online']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Role'); ?></dt>
        <dd>
            <?php echo h($user['User']['role']); ?>
            &nbsp;
        </dd>
    </dl>
    <a  href="#message" data-toggle="modal" role="button" class="btn"><i class="icon icon-envelope"></i> Message</a>



    <div id="message" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-body">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Modal header</h3>
            </div>

            <div class="modal-body">
                <?php
                echo $this->Form->create('Message', array(
                    'url' => array('controller' => 'messages', 'action' => 'add')
                ));
                ?>
                <fieldset>

                    <?php echo $this->Form->input('message', array('class' => 'span5')); ?>
                    <?php echo $this->Form->input('to', array('type' => 'hidden', 'default' => $user['User']['id'])); ?>
                    <?php echo $this->Form->input('from', array('type' => 'hidden', 'default' => $this->Session->read('Auth.User.id')));
                    ?>
                    <?php echo $this->Form->submit('Envoyer le message', array('class' => 'btn')); ?>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>


</div>
