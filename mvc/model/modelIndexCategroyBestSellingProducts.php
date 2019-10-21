<?php 

$sql = "SELECT `id`, `isbn`, `name`, `price`, `category`, `total`, `sold`, `description`, `image`, `date`, `rating`, `discount`, `status` FROM `product`";

$result = mysqli_query($conn, $sql);
mysqli_close($conn);
$idHolder;
$i = 0;
while($row = mysqli_fetch_assoc($result)){
  $idHolder[$i] = $row['id'];
  $i++;
}

?>