<?php 
include "header.php";
?>
<main>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/banner1.jpg" class="d-block w-100" alt="Hero image slide one">
      <div class="carousel-caption d-none d-md-block">
       <!-- <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
-->
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/banner2.jpg" class="d-block w-100" alt="Hero image slide two">
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/banner3.jpg" class="d-block w-100" alt="Hero image slide three">
      <div class="carousel-caption d-none d-md-block">
       
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 

    <!----Ends here -->
    <section class="fourth-section m-4">
        
        <div class="featured-product container-fluid ms-1">
            <div class="nav-products row">
                <div class="col-md-2 bg-secondary p-0  d-none d-md-block">
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item theme_color_bg text-light">
                            <a href="#" class="nav-link">
                                <h4>Categories</h4>
                            </a>
                        </li>

                        <?php 

                           getcategories();
                        ?>
                    </ul>
                </div>
                <div class="products-display col-md-10">
                  

                    <!--- Products --->

                    <div class="container">

                        <div class="row">
                        <h2 class="text-center">Best Sellers</h2>
                            <?php

                       get_trending_products();

                       get_unique_categories();


                    ?>


                        </div>
                        <div class="row">
                        <h2 class="text-center">New Arrivals</h2>
                        <?php

                       get_latest_products();
                       ?>
                        </div>
                        <div class="row">
                        <h2 class="text-center">Featured Products</h2>
                        <?php

                       getproducts();
                       ?>
                        </div>



                    </div>
                </div>
            </div>


        </div>

    </section>
  
    
    
   




</main>
<?php 
  require "footer.php";
  ?>