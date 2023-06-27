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
    <?php 

        $username = $_SESSION['username'];
        $get_users = "select * from `user_table` where username='$username'";
        $result = mysqli_query($conn, $get_users);
        $row_fetch = mysqli_fetch_assoc($result);
        $user_email = $row_fetch['user_email'];
        

    ?>

<h3 class="text-success">All Orders</h3>
<div class="table-responsive">
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>S/N</ht>
            <th>Order ID</th>
            <th>Amount Due</ht>
            <th>Total Products</ht>
            <th>Invoice number</ht>
            <th>Date</ht>
            <th>Complete/Incomplete</ht>
            
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
           $get_order_details ="select * from `user_orders` where user_email='$user_email'";
           $result_orders = mysqli_query($conn, $get_order_details);
           $number=1;
           while($row_orders = mysqli_fetch_assoc($result_orders)){
            $order_id = $row_orders['order_id'];
            $amount_due = $row_orders['amount_due'];
            $total_products = $row_orders['total_products'];
            $invoice_number = $row_orders['invoice_number'];
            $order_date = $row_orders['order_date'];
            $order_status = $row_orders['order_status'];
            if($order_status == 'pending'){
                $order_status = 'Incomplete';
            }else{
                $order_status = 'Complete';
            }
            $order_date = $row_orders['order_date'];
            

            echo "<tr>
            <td>$number</td>
            <td>$order_id</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>
            
            
            </tr>";
            $number++;
           } 

        ?>
        
    </tbody>
</table>
</div>
        </body>
        </html>
