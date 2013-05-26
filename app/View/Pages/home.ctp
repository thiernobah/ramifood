<?php echo $this->Html->script('raphael-min'); ?>
<?php echo $this->Html->script('map-fr'); ?>
<style>
    #map{
        width: 570px;
        height: 410px;
    }
    .header{
        /*background: #ccc;*/
        padding: 10px;
        border-bottom-width:1px;
        border-bottom-color:#DDDDDD;
        border-bottom-style:solid;
    }
    
    /*.form_container{
       line-height: 0px;
    }*/

    .bs-docs-social {
        background-color:#F5F5F5;
        border-bottom-color:#DDDDDD;
        border-bottom-style:solid;
        border-bottom-width:1px;
        border-top-color:#FFFFFF;
        border-top-style:solid;
        border-top-width:1px;
        padding:15px 0;
        text-align:center;
        margin-bottom: 30px;
        padding-bottom: 0;
    }
</style>
<div class="row header">

    <div class="span8">
        <div id="myCarousel" class="carousel slide span8">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item">
                    <img src="http://lorempixel.com/900/500/food/1/">
                </div>
                <div class="item">
                    <img src="http://lorempixel.com/900/500/food/2/">
                </div>
                <div class="item">
                    <img src="http://lorempixel.com/900/400/food/3/">
                </div>
            </div>
        </div>
    </div>
    <div class="span4">
        <div id="map">
        </div>
    </div>

</div>
<div class="bs-docs-social">
    <div class="form_container"> 
    <form class="form-inline">
        <input style="height:35px;" type="text" class="span5" placeholder="Votre ville ou code postal">
        <button style="height:40px;" type="submit" class="btn btn-danger"><i class="icon icon-white icon-search"></i> 
            RECHERCHER</button>
    </form>
    </div>
</div>

<div class="container">
   <div class="row-fluid">
            <ul class="thumbnails">
              <li class="span3">
                <div class="thumbnail">
                  <img src="http://lorempixel.com/200/150/food/9/" alt="">
                  <div class="caption">
                    <p>ultricies vehicula ut id elit</p>
                    <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                  </div>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="http://lorempixel.com/200/150/food/8/" alt="">
                  <div class="caption">
                    <p>nibh ultricies vehicula ut id elit.</p>
                    <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                  </div>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="http://lorempixel.com/200/150/food/7/" alt="">
                  <div class="caption">
                    <p>nibh ultricies vehicula ut id elit.</p>
                    <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                  </div>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="http://lorempixel.com/200/150/food/6/" alt="">
                  <div class="caption">
                    
                    <p>ultricies vehicula ut id elit.</p>
                    <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
</div>