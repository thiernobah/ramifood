<style>
    .form-horizontal{ 
        margin-left: auto;
         margin-right: auto;
          position: relative;
          width: 400px;
    }
    .users{
        margin-top: 32px;
        
    }
    .form-group{
        width: 400px;
    }
    fieldset{
       width:  400px;
    }
</style>
<div class="container">
    
        <div class="users form bs-example">

            <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form')); ?>

            <fieldset>
                <div class="form-group">
                     
                        <a href="" class="fb-connect">Se connecter avec facebook</a></div>
                

                <p style="text-align: center">ou</p>
              
                <div class="form-group">
                    <label for="inputRegion"><?php echo __('Nom d\'utilisateur'); ?></label>
                    
                        <?php echo $this->Form->input('username', array('label' => false, 'div' => false,'class' => 'form-control ')); ?>
                    
                </div>

                 <div class="form-group">
                    <label for="inputRegion"><?php echo __('Nom'); ?></label>
                   
                        <?php echo $this->Form->input('lastname', array('label' => false, 'class' => 'form-control')); ?>
                </div>

                 <div class="form-group">
                    <label for="inputRegion"><?php echo __('Prénom'); ?></label>
                    
                        <?php echo $this->Form->input('firstname', array('label' => false, 'class' => 'form-control')); ?>
                    
                </div>

                <div class="form-group">
                    <label for="inputRegion"><?php echo __('Adresse email'); ?></label>
                        <?php echo $this->Form->input('email', array('label' => false, 'class' => 'form-control')); ?>
                </div>

                <div class="form-group">
                    <label for="inputRegion"><?php echo __('Mot de passe'); ?></label>
                   
                        <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control')); ?>
                
                </div>

               

                <!--<div class="form-group">
                    <label class="control-label" for="inputRegion"><?php echo __('Date de naissance'); ?></label>
                    
                        <?php echo $this->Form->input('birthday', array('type' => 'text', 'label' => false, 'class' => 'form-control')); ?>
                    
                </div>-->

                <div class="form-group">
                    <!--<label for="inputRegion"><?php echo __('J\'accepte les conditions d\'utilisations'); ?></label>-->
                    
                        <?php echo $this->Form->input('accepted', array('label' => false)); ?>
                        <?php echo __('J\'accepte les conditions d\'utilisations'); ?>
                   
                </div>

                <?php echo $this->Form->input('role', array('type' => 'hidden', 'default' => 'author')); ?>

                <div class="form-group">
                    
                       <?php echo $this->Form->submit('Créer mon compte', array('class' => 'btn btn-danger col-lg-12', 'div' => false)); ?>
                   
                </div>
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
        <div class="social_login">
            
        </div>
    
</div>
