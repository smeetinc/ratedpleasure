<?php 
//require "../private/autoload.php";
//include "functions/common_functions.php";

include "header.php";
?>
<main>
    <section class="fourth-section">
        <h2 class="text-center">Search Results</h2>
        <div class="container-fluid ms-1">
            <div class="nav-products row">
                <div class="col-md-2 bg-secondary p-0 d-none d-md-block">
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
                            <?php

                       search_product();

                       get_unique_categories();


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