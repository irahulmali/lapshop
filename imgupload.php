<?php
   if(isset($_FILES['image']) && !empty($_FILES['image']['name']) && ($_FILES['image']['size'] > 0) ){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];

      $file_name=strtolower($_FILES['image']['name']);
      
      if(!preg_match('/(jpeg|jpg|png)$/', $file_name)){
         $errors[]="<div class='alert alert-danger'>Choose a product image file.</div>";
      }
      
      if($file_size > 2097152){
         $errors[]="<div class='alert alert-danger'>File size must be excately 2 MB.</div>";
      }
      
        $temp = explode(".", $_FILES["image"]["name"]);      
        $img = round(microtime(true)) . '.' . end($temp);
        
      if(empty($errors)==true){
         move_uploaded_file($file_tmp, "./images/products/" . $img);
         $sid = $_SESSION['id'];
          
          $seller = $_SESSION['name'];

            $query = "INSERT INTO products(sid, brand, model, description, price, quantity, processor, os, display, ram, hdd, dimensions, battery, warranty, graphics, webcam, connectivity, weight, img, seller) VALUES ($sid, '$brand', '$model', '$description', $price, $quantity, '$processor', '$os', '$display', '$ram', '$hdd', '$dimensions', '$battery', '$warranty', '$graphics', '$webcam', '$connectivity', '$weight', '$img','$seller')";

            if(mysqli_query($conn, $query)){
                //echo "<div class='alert alert-success'>Product added.</div>";
                echo "<script>alert('Product was added.');</script>";
                echo "<script>location.replace('./add.php');</script>";
                //header('Location: ./add.php');
            }else{
                echo "<div class='alert alert-danger'>Product not added.</div>";
            }
      }else{
        //print_r($errors);
        echo "<div class='alert alert-danger'>Error uploading product image.</div>";
      }
   }else{
    echo "<div class='alert alert-danger'>No image file found.</div>";
   }
?>