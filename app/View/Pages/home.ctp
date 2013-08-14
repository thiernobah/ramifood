<?php echo $this->Html->script('raphael-min'); ?>
<?php echo $this->Html->script('map-fr'); ?>
<style>
    #map{
        width: 570px;
        height: 410px;
    }
    .search form{text-align: center;}
    .search form{
        background-color: #373A39;
        height: 50px;
        padding: 5px;
        text-align: center;
        width: 523px;
        margin-left: auto;
        margin-right: auto;
        margin-top: -300px;
        z-index: 522;
        position: relative;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
            /* Fallback for web browsers that don't support RGBa */
    background-color: rgb(0, 0, 0);
    /* RGBa with 0.6 opacity */
    background-color: rgba(0, 0, 0, 0.7);
    /* For IE 5.5 - 7*/
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    /* For IE 8*/
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";

    }
    #infobulle{
        margin-top: -20px;
        /*max-width: 200px;*/
        background-color: black;
        color: #fff;
        padding: 5px;
        display: none;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        white-space: nowrap;
         /* Fallback for web browsers that don't support RGBa */
    background-color: rgb(0, 0, 0);
    /* RGBa with 0.6 opacity */
    background-color: rgba(0, 0, 0, 0.6);
    /* For IE 5.5 - 7*/
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    /* For IE 8*/
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";

    }
    .search_input{
        font-size: 18px;
        padding: 10px;
    }
</style>
<script>
$('a').tooltip('show')
</script>

        
            <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="http://lorempixel.com/1900/600/food/1/" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-large btn-dange" href="#">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="http://lorempixel.com/1900/600/food/2/" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-large btn-primary" href="#">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="http://lorempixel.com/1900/600/food/3/" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-large btn-primary" href="#">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->

  

<div class="bs-old-docs">
    <div class="container search"> 
        <form class="form-inline">
            <input style="height:40px; width: 370px;" type="text" class="search_input" placeholder="Votre ville ou code postal">
            <button style="height:40px;margin-bottom:3px" type="submit" class="btn btn-danger">
                <span class="glyphicon glyphicon-search"></span>
                RECHERCHER</button>
        </form>
    </div>
</div>

<div class="container">
    
    <h2>Les dernières annonces deposées sur votre site</h2>
    <p>Vous n'êtes pas encore membre inscrivez vous et rejoignez la communauté ramifood et partagé votre passion de la cuisine</p>

    <div class="row">
        <div class="col-lg-3">
            <div>
                <img src="http://lorempixel.com/280/200/food/5/" alt="">
                <div class="caption">
                    <h5>Thumbnail label</h5>
                <span>
                    <span class="glyphicon glyphicon-map-marker"></span> Talence
                </span>
                <span>
                    <span class="glyphicon glyphicon-map-marker"></span> 5max
                </span>

                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div>
                <img src="http://lorempixel.com/280/200/food/6/" alt="">
                <div class="caption">
                    <h5>Thumbnail label</h5>
                    <p>...</p>

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <img src="http://lorempixel.com/280/200/food/7/" alt="">
                <div class="caption">
                    <h5>Thumbnail label</h5>
                    <p>...</p>

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <img src="http://lorempixel.com/280/200/food/8/" alt="">
                <div class="caption">
                    <h5>Thon à la mayonnaise</h5>
                    <p>...</p>

                </div>
            </div>
        </div>

    </div>
</div> 

