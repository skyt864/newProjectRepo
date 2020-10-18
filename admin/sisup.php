<?php
include ('config.php');
$errors = array();
$message = '';
if(isset($_POST['submit'])){

  $username = isset($_POST['medium-input'])?$_POST['medium-input']:'';
  $price = isset($_POST['small-input'])?$_POST['small-input']:'';

  $category = isset($_POST['dropdown'])?$_POST['dropdown']:'';
  $tags = implode(",", $_POST['fashion']);
  $description = isset($_POST['textfield'])?$_POST['textfield']:'';
  $image = $_FILES['small-medium']['name'];
  $source = $_FILES['small-medium']['tmp_name'];

    if (move_uploaded_file($source, "productImage/".$image)) {
        
      $sql = "INSERT INTO products(`Name`,`Price`,`Image`,`Category`,`Tags`,`Description`)VALUES('$username', '$price' , '$image', '$category' , '$tags', '$description')";
        
    } else {
        echo "Image NOt Upload";
    }
// echo $sql;
  if ($conn->query($sql) === true) {
      header('location:products.php');
   "New record created successfully";
  } else {
    $errors[] = array('input'=>'form','msg'=>$conn->error);
   "Error: " . $sql . "<br>" . $conn->error;
  }
  
  
  $conn->close();


}
?>
   <?php if (sizeof($errors)>0): ?>
   <ul>
   <?php foreach ($errors as $error) : ?>
   <li><?php echo $error['msg']; ?></li>
   <?php endforeach; ?>
   </ul>
   <?php endif; ?>
 