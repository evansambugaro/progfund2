<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Customers</title>
</head>
<body>
    <!-- container -->
<div class="container">
    <div class="page-header">
        <h1>Customer's Table</h1>
    </div>

   <?php
    if($_POST)
    {
        /*$Fname=$_POST['fname'];
        $Lname=$_POST['lname'];
        $Email=$_POST['email'];
        $Phone=$_POST['phone'];*/
        
        // include database connection
        include"config/database.php";
        try 
        {
            // insert query
            $query="INSERT INTO customers SET CustomerID =:customerid, CustomerName =:customername, ContactName=:cname, Address=:address, City=:city, PostalCode=:pcode, Country=:country";

            // prepare query for execution
            $stmt=$con->prepare($query);

           
            $customername=htmlspecialchars(strip_tags($_POST['customername']));
            $cname=htmlspecialchars(strip_tags($_POST['cname']));
            $address=htmlspecialchars(strip_tags($_POST['address']));
            $city=htmlspecialchars(strip_tags($_POST['city']));
            $pcode=htmlspecialchars(strip_tags($_POST['pcode']));
            $country=htmlspecialchars(strip_tags($_POST['country']));

            //bind the parameters
            $stmt->bindParam(':customerid',$customerid);
            $stmt->bindParam(':customername',$customername);
            $stmt->bindParam(':cname',$cname);
            $stmt->bindParam(':address',$address);
            $stmt->bindParam(':city',$city);
            $stmt->bindParam(':pcode',$pcode);
            $stmt->bindParam(':country',$country);

            //Execute the query
            

            if($stmt->execute())
            {
                    echo '<div class="alert alert-success" role="alert"> Record saved successfully. </div>';
            }
            else
            {
                    echo  '<div class="alert alert-warning" role="alert"> Warning record was NOT saved. </div>';
            }



        }
        catch(PDOException $e)
        {
            echo"Error".$e->getMessage();
        }

    }

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <table class="table table-hover table-responsive table-bordered">
            <tr>
                <td>Customer ID</td>
                <td><input type="text" name="customerid" class="form-control" disabled></td>
            </tr>
            <tr>
                <td>Customer Name</td>
                <td><input type="text" name="customername" class="form-control"></td>
            </tr>
            <tr>
                <td>Contact Name</td>
                <td><input type="text" name="cname" class="form-control"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" class="form-control"></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name="city" class="form-control"></td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td><input type="text" name="pcode" class="form-control"></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="text" name="country" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" value="save" class="btn btn-primary">
                <a href="index.php" class="btn btn-danger">Go Back</a>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>