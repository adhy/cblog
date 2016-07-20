<div class="container" >
<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        <?php 
        		foreach($top as $rows){ 
        		foreach($one as $row):
        ?>
            <div <?=$rows['nomer']==$row['nomer'] ? ' class="item active"' : 'class="item"';?>>
                <div class="fill" ><img src="<?php echo $rows['gambar'];?>" style="width:100%;height:100%;" alt=""></div>
                <div class="carousel-caption">
                   <!--  <h2>Caption 1</h2> -->
                </div>
            </div>
            <?php 
            endforeach;
            } ?>
        </div>

        <!-- Controls -->
        <span class="left carousel-control">
        <a  href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
		</span>
		<span class="right carousel-control">
        <a href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
        </span>
    </header>
</div>
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Recent Views
                </h1>
            </div>
            <div id="recent">
            
            
<!--             <div class="col-md-4">
                <div  class="panel panel-default">
                   <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Bootstrap v3.2.0</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a class="btn btn-link" href="#">Read More <i class="fa fa-angle-right"></i></a>
                    </div> 
                </div>
            </div> -->
</div>
        </div>
        </div>