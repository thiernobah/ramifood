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
    .bs-example{
    	 margin: auto;
    width: 600px;
    margin-top: 35px;
    }
    

    
</style>

<div class="users form bs-example">

            <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form')); ?>
          
             

            <fieldset>
                <div class="form-group">
                     
                        <a href="<?php echo $this->Html->url(array('action' => 'facebook')); ?>" class="fb-connect">Se connecter avec facebook</a></div>
                

                <p style="text-align: center">Ou</p>
              
                <div class="form-group">
                    <label for="inputRegion"><?php echo __('Nom d\'utilisateur'); ?></label>
                    
                        <?php echo $this->Form->input('username', array('label' => false, 'div' => false,'class' => 'form-control ')); ?>
                    
                </div>

               
                <div class="form-group">
                    <label for="inputRegion"><?php echo __('Mot de passe'); ?></label>
                   
                        <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control')); ?>
                
                </div>

                <div class="form-group">
                       <a href="">Mot de passe oublié ?</a>
                </div>
            
                <div class="form-group">
                    
                       <?php echo $this->Form->submit('Se connecter', array('class' => 'btn btn-danger col-lg-12', 'div' => false)); ?>
                   
                </div>
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>  
      
    
</div>
