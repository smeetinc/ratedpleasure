<?php
    if(isset($_GET['edit_account'])){
        $user_session_email = $_SESSION['email'];
        $select_query = "select * from `user_table` where user_email='$user_session_email'";
        $result_query = mysqli_query($conn, $select_query);
        $row_fetch = mysqli_fetch_assoc($result_query);
        $user_id = $row_fetch['user_id'];
        $username = $row_fetch['username'];
        $user_email = $row_fetch['user_email'];
        $user_image = $row_fetch['user_image'];
        $user_address = $row_fetch['user_address'];
        $user_state = $row_fetch['user_state'];
        $user_mobile = $row_fetch['user_mobile'];
        

        if(isset($_POST['user_update'])){
            $update_id = $user_id;
            $username = mysqli_real_escape_string($conn, $_POST['user_username']);
            $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
            $user_address = mysqli_real_escape_string($conn, $_POST['user_address']);
            $user_state = mysqli_real_escape_string($conn, $_POST['user_state']);
            $user_mobile = mysqli_real_escape_string($conn, $_POST['user_mobile']);
            $user_image = $_FILES['user_image']['name'];
            $user_image_tmp =$_FILES['user_image']['tmp_name'];
            move_uploaded_file($user_image_tmp, "./user_images/$user_image");

            //update query
            $update_data = "update `user_table` set username='$username', user_email='$user_email', user_image='$user_image', user_address='$user_address', user_state='$user_state', user_mobile='$user_mobile' where user_id=$update_id";
            $result_query_update = mysqli_query($conn, $update_data);
            if($result_query_update){
                echo "<script>alert('Data updated successfully')</script>";
                echo "<script>window.open('logout.php', '_self')</script>";
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome <?php echo $_SESSION['username']; ?></title>

    <!-- Bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- FontAwesome Link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- F<li class='nav-item'>
                        <a class='nav-link' href='logout.php'>Logout</a>
                    </li>onts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/main.css">

    <!---Swiperjs css -->
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">

    <style>
        sup {
            z-index: 1000;
            top: -0.2em;
        }
        .profile_img{
        width:50%;
        height: 50%;
        object-fit: contain;
    }
    .edit_img{
        width: 100px;
        height: 100px;
        object-fit: contain;
    }

    </style>


</head>
<body>
    <h3 class="text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username; ?>" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email; ?>" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image" required="required">
            <img src="./user_images/<?php echo $user_image; ?>" class="edit_img" alt="<?php echo $user_image; ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address; ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
                            
                            <select type="text" id="user_state" class="form-select w-50 m-auto" required="required" name="user_state">
                               
                            <option selected disabled value="<?php echo $user_state; ?>"><?php echo $user_state; ?></option>
    <option value="ABUJA FCT">ABUJA FCT</option>
    <option value="ABIA">ABIA</option>
    <option value="ADAMAWA">ADAMAWA</option>
    <option value="AKWA IBOM">AKWA IBOM</option>
    <option value="ANAMBRA">ANAMBRA</option>
    <option value="BAUCHI">BAUCHI</option>
    <option value="BAYELSA">BAYELSA</option>
    <option value="BENUE">BENUE</option>
    <option value="BORNO">BORNO</option>
    <option value="CROSS RIVER">CROSS RIVER</option>
    <option value="DELTA">DELTA</option>
    <option value="EBONYI">EBONYI</option>
    <option value="EDO">EDO</option>
    <option value="EKITI">EKITI</option>
    <option value="ENUGU">ENUGU</option>
    <option value="GOMBE">GOMBE</option>
    <option value="IMO">IMO</option>
    <option value="JIGAWA">JIGAWA</option>
    <option value="KADUNA">KADUNA</option>
    <option value="KANO">KANO</option>
    <option value="KATSINA">KATSINA</option>
    <option value="KEBBI">KEBBI</option>
    <option value="KOGI">KOGI</option>
    <option value="KWARA">KWARA</option>
    <option value="LAGOS">LAGOS</option>
    <option value="NASSARAWA">NASSARAWA</option>
    <option value="NIGER">NIGER</option>
    <option value="OGUN">OGUN</option>
    <option value="ONDO">ONDO</option>
    <option value="OSUN">OSUN</option>
    <option value="OYO">OYO</option>
    <option value="PLATEAU">PLATEAU</option>
    <option value="RIVERS">RIVERS</option>
    <option value="SOKOTO">SOKOTO</option>
    <option value="TARABA">TARABA</option>
    <option value="YOBE">YOBE</option>
    <option value="ZAMFARA">ZAMFARA</option>
                               
                            </select>
                        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile; ?>" name="user_mobile">
        </div>
        <input type="submit" value="Update Account" class="btn btn-danger py-2 px-3 border-0" name="user_update">
    </form>
</body>