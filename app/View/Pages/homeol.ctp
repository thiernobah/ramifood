<?php echo $this->Html->script('raphael-min'); ?>
<?php echo $this->Html->script('map-fr'); ?>
<style>
.home_header{
   position: absolute;
     
      min-width: 100%;
      height: 500px
}

.picture{
   margin-left : 0 !important;
}
#myCarousel{
   margin-left:0;
   min-width: 100%;
}
.map_container{
    margin-right :0 !important;
}
#map{
   margin-right :0 !important;
}
.home_header{
    background: #ccc;
}
</style>
<div class="home_header">


   <div id="myCarousel" class="carousel slide span11">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item">
       <img src="http://lorempixel.com/900/500/sports/1/Dummy-Text/">
    </div>
    <div class="item">
       <img src="http://lorempixel.com/900/500/sports/2/Dummy-Text/">
    </div>
    <div class="item">
        <img src="http://lorempixel.com/900/400/sports/3/Dummy-Text/">
    </div>
  </div>


</div>
<div class="span6 map_container"></div>
<div id="map"></div>
</div>

