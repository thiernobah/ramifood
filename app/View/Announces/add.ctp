
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<?php echo $this->Html->css('Aristo'); ?>
<?php echo $this->Html->script('ajax'); ?>
<style>
    .ui-autocomplete-loading {
        background: white url('/ramifood/img/blue_ajax.gif') right center no-repeat;
    }
</style>

<div class="container">

    <div class="span6">
        <?php echo $this->Form->create('Announce', array('class' => 'bs-docs-example form-horizontal')); ?>
        <fieldset>

            <legend class="well"><?php echo __('Déposer une annonce'); ?></legend>

            <h5 class="label label-info"> 1. <i class="icon-white icon-info-sign"></i> <?php echo __('Informations'); ?></h5>

            <div class="control-group">
                <label class="control-label" for="inputTitre"><?php echo __('Titre'); ?></label>
                <div class="controls">
                    <?php echo $this->Form->input('title', array('label' => false, 'class' => 'span4')); ?>
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="inputPrix"><?php echo __('Prix'); ?></label>
                <div class="controls">
                    <?php echo $this->Form->input('price', array('label' => false, 'class' => 'span4')); ?>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="inputPlace"><?php echo __('Nombre de personnes acceptés'); ?></label>
                <div class="controls">
                    <?php echo $this->Form->input('place', array('label' => false, 'class' => 'span4')); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputPrix"><?php echo __('Livraison'); ?> ?</label>
                <div class="controls">
                    <?php echo $this->Form->input('delivery', array('label' => false)); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputPhone"><?php echo __('Téléphone'); ?></label>
                <div class="controls">
                    <?php echo $this->Form->input('phone', array('label' => false, 'class' => 'span4')); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputday"><?php echo __('Date du repas'); ?></label>
                <div class="controls">
                    <?php echo $this->Form->input('food_days', array('type' => 'text', 'label' => false, 'class' => 'span4', 'id' => 'datepicker')); ?>
                </div>
            </div>

            <h5 class="label label-info"> 2. <i class="icon-white icon-map-marker"></i> <?php echo __('Localisation'); ?></h5>
            <div class="control-group">
                <label class="control-label" for="inputRegion"><?php echo __('Choisissez votre région'); ?></label>
                <div class="controls">
                    <?php echo $this->Form->input('regions_id', array('id' => 'an_region', 'label' => false, 'class' => 'span4')); ?>
                </div>
            </div>

            <input type="hidden" value="" name="cities_id">
            
            <div id="dep_display" class="control-group">
                <label class="control-label" for="inputRegion"><?php echo __('Choisissez votre departement'); ?></label>
                <div class="controls">
                    <?php echo $this->Form->input('departments_id', array('label' => false, 'type' => 'select', 'id' => 'an_department', 'class' => 'span4')); ?>
                </div>
            </div>
            
            <div class="ui-widget control-group" id="citie_display">
                <label class="control-label" for="inputRegion"><?php echo __('Code postale'); ?></label>
                <div class="controls">
                    <?php echo $this->Form->input('cities', array('label' => false, 'id' => 'an_cities', 'class' => 'span4')); ?>
                </div>
            </div>

            <h5 class="label label-info">3. <?php echo __('Plus de détail') ?></h5>

            <div class="control-group">
                <label class="control-label" for="inputRegion"><?php echo __('Description'); ?></label>
                <div class="controls">
                    <?php
                    echo $this->Form->input('users_id', array('type' => 'hidden', 'default' => $this->Session->read('Auth.User.id')));
                    echo $this->Form->input('description', array('type' => 'textarea', 'label' => false, 'class' => 'span4'));
                    ?>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <?php echo $this->Form->submit('Ajouter l\'annonce', array('class' => 'btn btn-info span3')); ?>
                </div>
            </div>
        </fieldset>
        <?php echo $this->Form->end(); ?>

    </div>
    <div class="span3">

    </div>
</div>


