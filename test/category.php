<?php
include "header.php";
?>
<main>
        <div class="container-fluid ms-1">
            <div class="row">
                
                <div class="bg-secondary p-0 d-block">
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
            </div>
        </div>
</main>
<?php
include "footer.php";
?>