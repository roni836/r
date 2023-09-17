<?php
            
      $connect = mysqli_connect('localhost','root','','store') or die("Db Fail to Connect");
              
                $name = $_POST['name'];
                $title = $_POST['title'];
                $brand = $_POST['brand'];
                $qty = $_POST['qty'];
                $description = $_POST['description'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $discount_price = $_POST['discount_price'];
            
            $query = "INSERT INTO product(name,title,brand,qty,description,category,price,discount_price) value('$name','$title','$brand','$qty','$description','$category','$price','$discount_price')";

            $run = mysqli_query($connect,$query);

            if($run){
                echo"<script>alert('Product Added Successfully')</script>";
                echo"<script>window.open('index.php','_self')</script>";
            }
            else{
                echo"<script>alert('Fail to Add')</script>";
            }
            ?>