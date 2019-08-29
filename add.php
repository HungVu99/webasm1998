<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Add</title>
</head>

<body>
    <div class="content">
        <h1 font-style: >Add New Product </h1>
        <?php 
        require("connect.php");   
        if(isset($_POST["submit"]))
            {
                $name = $_POST["proname"];
                $price = $_POST["price"];
                $descrip = $_POST["descrip"];
                $hinhanh=$_FILES['hinhanh']['name'];
                $hinhanh_tmp=$_FILEs['hinhanh']['tmp_name'];
                move_uploaded_file($hinhanh_tmp,'./uploads/'.$hinhanh);

                if ($name == ""||$price == ""|| $descrip == "") 
                    {
                        echo "Information should not be blank!!";
                    }
                else
                    {
                        $sql = "select * from product where proname ='$name'";
                        $query = pg_query($conn, $sql);
                        if(pg_num_rows($query)>0)
                        {
                            echo "Product is already available!!";
                        }
                        else
                        {
                            $sql = "INSERT INTO product(proname, price, descrip,hinhanh) VALUES ('$name','$price','$descrip','$hinhanh')";
                            pg_query($conn,$sql);
                            echo  "Sign Up successful!!";
                        }
                    }
            }
             ?>
        <form action="add.php" method="POST" enctype="multipart/form-data">
            <input type="text" width="300" height="100" name="proname" placeholder="Name"> <br>
            <input type="text" width="300" height="100" name="price" placeholder="Price"> <br>
            <input type="text" width="300" height="100" name="descrip" placeholder="Description"> <br>
            <input type="file" name="hinhanh" placeholder="image" border = "1px">
            <button type="submit" value="Add" name="submit">Add</button>
        </form>
        
        <button><a href="managing.php">Back</a></button>
    </div>
</body>

</html>