<?php
$connect = mysqli_connect('localhost','root','','store') or die("Db Fail to Connect");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }
        
        
        .mb-3{
        flex-direction: column;
        display: flex;
        flex: 1;
        }

        .form-container {
            width: 30%;
            padding: 10px;
            background-color: #f1c40f;
            border: 1px solid #ccc;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction:column;
        }

        .table-container {
            width: 70%;
            padding: 20px;
            background-color: #8c7ae6;
            border: 1px solid #ccc;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            color:white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ff7f50;
        }
        .search{
            font-size:20px;
        }
        .btn{
        background-color: #047bf3;
        color: white;
        padding:5px 10px;
        border: 0;
        outline: 0;
        font-size: 20px;
        }
        #clear{
        background-color: rgb(255, 0, 0);
        }
        #go{
        background-color: #4cd137;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Add Product</h2>
            <form action="insert.php" method="POST">
               <div class="mb-3">
               <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" class="control" required><br><br>
               </div>
                <div class="mb-3">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="control"required><br><br>
                </div>
                <div class="mb-3">
                <label for="brand">Brand:</label>
                <input type="text" id="brand" name="brand"class="control" required><br><br>
                </div>
                <div class="mb-3">
                <label for="qty">Quantity:</label>
                <input type="text" id="qty" name="qty" class="control"required><br><br>
                </div>
                <div class="mb-3">
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" class="control" required><br><br>
                </div>
                <div class="mb-3">
                <label for="category">category:</label>
                <input type="text" id="category" name="category" class="control"required><br><br>
                </div>
                <div class="mb-3">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" class="control"required><br><br>
                </div>
                <div class="mb-3">
                <label for="discount_price">Discount Price:</label>
                </div>
                <input type="text" id="discount_price" name="discount_price" class="control"required><br><br>
                
                <input type="submit"name="send" value="Submit" class="btn">
                <input type="reset" value="Clear" id ="clear" class="btn">
            </form>
        </div>
             

        <div class="table-container">
            <h2>Available Product List</h2>
            <form action="index.php" method="get" class="search">
                <input type="search" name="search" placeholder="Find by ID or title" class="search">
                <input type="submit" value="GO" name="find" id="go" class="btn">
            </form>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Title</th>
                    <th>Brand</th>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

                <?php
                $query = "SELECT * FROM product";


                if(isset($_GET['find'])){
                    $search = $_GET['search'];
                    $run = mysqli_query($connect,"SELECT * FROM product where p_id='$search' or title LIKE '%$search%' or name LIKE '%$search%'");
                }
                else{
                    $run = mysqli_query($connect,$query);
                }

                
                while($row = mysqli_fetch_array($run)){
                ?>
                <tr>
                <td><?= $row['p_id'];?></td>
                <td><?= $row['name'];?></td>
                <td><?= $row['title'];?></td>
                <td><?= $row['brand'];?></td>
                <td><?= $row['qty'];?></td>
                <td><?= $row['description'];?></td>
                <td><?= $row['category'];?></td>
                <td>Rs.<?= $row['discount_price'];?><br><del>Rs.<?=$row['price'];?></del></td>
                <td>
                    <a href="delete.php?id=<?=$row['p_id'];?>" class="delete" style="color:Red; text-decoration:none;font-weight:Bolder;font-size:22px">  X</a>
                </td>
                    </tr>
              <?php  }?>
            </table>
        </div>

    </div>
</body>
</html>
