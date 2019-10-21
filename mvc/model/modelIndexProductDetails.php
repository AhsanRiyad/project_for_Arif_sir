<?php 
$id = $_GET['productId'];


$sql = "SELECT `id`, `isbn`, `name`, `price`, `category`, `total`, `sold`, `description`, `image`, `date`, `rating`, `discount`, `status` FROM `product` where `id`='$id'";


$result = mysqli_query($conn, $sql);
mysqli_close($conn);
$row = mysqli_fetch_assoc($result);
$idHolder;
$i = 0;

?>