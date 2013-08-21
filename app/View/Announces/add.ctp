
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<?php echo $this->Html->css('Aristo'); ?>
<?php echo $this->Html->script('ajax'); ?>
<style>
    .ui-autocomplete-loading {
        background: white url('/ramifood/img/blue_ajax.gif') right center no-repeat;
    }
    .form-group{
        width: 600px;
    }
    fieldset{
        width: 600px;
    }
    #AnnounceAddForm{
        width: 600px;
    }
    .an-form{
        /*box-shadow: 6px 0px 6px black inset;*/
        -moz-box-shadow: 0px 5px 4px #DDDDDD;
-webkit-box-shadow: 0px 5px 4px #DDDDDD;
box-shadow: 0px 5px 4px #DDDDDD;
    padding-left: 50px;
    }

    .form-left{
        background: #f2f2f2;
        padding: 5px;
    }
    .head-titleo-video
    {
        width: 380px;
        text-align: center;
        height: 50px;
    }
   /* .bs-docs-example{
       -moz-box-shadow: 10px 10px 5px #888;
-webkit-box-shadow: 10px 10px 5px #888;
box-shadow: 10px 10px 5px #888;
    }*/
</style>

<div class="container member-container">

  <div class="row">
   
    <div class="col-lg-4 form-left">
        <div class="head-titleo-video">
            <h3>La dernière vidéo</h3>
        </div>
        <iframe src="http://player.vimeo.com/video/70762275" width="380" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
    </div>
    <div class="col-lg-8 an-form">
        <?php echo $this->Form->create('Announce', array('class' => 'bs-docs-example form-horizontal')); ?>
        <fieldset>
 
           <div class="form-group">
            <legend><?php echo __('Déposer une annonce'); ?></legend>
           </div>

            <div class="form-group">
            <h3 class="label label-danger"> 1. <i class="icon-white icon-info-sign"></i> <?php echo __('Informations'); ?></h3>
            </div>

            <div class="form-group">
                <label for="inputTitre"><?php echo __('Titre'); ?></label>
                
                    <?php echo $this->Form->input('title', array('label' => false, 'div' => false ,'class' => 'form-control')); ?>
            
            </div>


            <div class="form-group">
                <label for="inputPrix"><?php echo __('Prix'); ?></label>
                
                    <?php echo $this->Form->input('price', array('label' => false, 'div' => false ,'class' => 'form-control')); ?>
              
            </div>
            
            <div class="form-group">
                <label class="control-label" for="inputPlace"><?php echo __('Nombre de personnes acceptés'); ?></label>
                
                    <?php echo $this->Form->input('place', array('label' => false, 'class' => 'form-control')); ?>
                
            </div>

            

            <div class="form-group">
                <label for="inputPhone"><?php echo __('Téléphone'); ?></label>
               
                    <?php echo $this->Form->input('phone', array('label' => false, 'class' => 'form-control')); ?>
                
            </div>

            <div class="form-group">
                <label for="inputday"><?php echo __('Date du repas'); ?></label>
                
                    <?php echo $this->Form->input('food_days', array('type' => 'text', 'label' => false, 'class' => 'form-control', 'id' => 'datepicker')); ?>
                
            </div>

            <div class="form-group">
            <label class="label label-danger"> 2. <i class="icon-white icon-map-marker"></i> <?php echo __('Localisation'); ?></label>
           </div>
            <div class="form-group">
                <label for="inputRegion"><?php echo __('Choisissez votre région'); ?></label>
               
                    <?php echo $this->Form->input('regions_id', array('id' => 'an_region', 'label' => false, 'class' => 'form-control')); ?>
               
            </div>

            <input type="hidden" value="" name="cities_id">
            
            <div id="dep_display" class="form-group">
                <label for="inputRegion"><?php echo __('Choisissez votre departement'); ?></label>
                
                    <?php echo $this->Form->input('departments_id', array('label' => false, 'type' => 'select', 'id' => 'an_department', 'class' => 'form-control')); ?>
                
            </div>
            
            <div class="ui-widget form-group" id="citie_display">
                <label for="inputRegion"><?php echo __('Code postale'); ?></label>
                
                    <?php echo $this->Form->input('cities', array('label' => false, 'id' => 'an_cities', 'class' => 'form-control')); ?>
           
            </div>

            <div class="form-group">
            <label class="label label-danger">3. <?php echo __('Plus de détail') ?></label>
            </div>

            <div class="form-group">
                <label class="control-label" for="inputRegion"><?php echo __('Description'); ?></label>
               
                    <?php
                    echo $this->Form->input('users_id', array('type' => 'hidden', 'default' => $this->Session->read('Auth.User.id')));
                    echo $this->Form->input('description', array('type' => 'textarea', 'label' => false, 'class' => 'form-control'));
                    ?>
          
            </div>

            <div class="form-group">
                
                    <?php echo $this->Form->input('delivery', array('label' => false, 'div' => false)); ?>
                    <label for="inputPrix"><?php echo __('Livraison'); ?> ?</label>
            </div>

            <div class="form-group">
                
                    <?php echo $this->Form->submit('Ajouter l\'annonce', array('class' => 'btn btn-danger col-lg-5')); ?>
               
            </div>
        </fieldset>
        <?php echo $this->Form->end(); ?>

    </div>
    

    </div>
</div>


