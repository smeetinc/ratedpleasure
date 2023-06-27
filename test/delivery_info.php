<?php
include "header.php";
?>
<main>

<?php 
						if(!isset($_SESSION['username'])){
							echo "<a class='nav-link' href='users_area/user_login.php'>Sign in</a>";
						}else{
							echo "
							<a class='nav-link' href='users_area/logout.php'>Logout</a>
						";
						}
                        ?>
</main>
<?php
include "footer.php";
?>