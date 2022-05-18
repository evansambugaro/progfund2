<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <div class="container">
        <h2>Basic Table</h2>
        <div>
            <a href="create.php" class="btn btn-primary">Create New</a>
            
            <?php

            $action=isset($_GET['action']) ? $_GET['action'] :"";
            if($action =="deleted")
            {
                echo"<div class='alert alert-success'> Record was deleted successfully</div>";
            }

            ?>
        </div>
        <table class="table">
            <head>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Contact Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Country</th>
                </tr>
            </head>
            <tbody>
                <?php
                // include database connection
                include"config/database.php";

                // select all data
                $query ="SELECT CustomerID,CustomerName,ContactName,Address,City,PostalCode,Country From customers ORDER by CustomerID DESC";
                
                $stmt=$con->prepare($query);
                $stmt->execute();
            
                while ($row=$stmt->fetch(PDO :: FETCH_ASSOC))
                {
                    extract($row);

                echo"<tr>";
                echo"<td>{$CustomerID}</td>";
                echo"<td>{$CustomerName}</td>";
                echo"<td>{$ContactName}</td>";
                echo"<td>{$Address}</td>";
                echo"<td>{$City}</td>";
                echo"<td>{$PostalCode}</td>";
                echo"<td>{$Country}</td>";
                echo"<td>";
                echo"<a href='read.php?CustomerID={$CustomerID}' class='btn btn-primary btn-sm'>Read</a>";
                echo"<button type='button' class='btn btn-warning btn-sm'>Edit</button>";
                echo"<a href ='#' onclick='delete_user({$CustomerID});' class='btn btn-danger btn-sm'> Delete </a>";
                echo"</td>";
                echo"</tr>";

                }

                ?>
            </tbody>
           
        </table>

 

    </div>
<script>
function delete_user(id) 

{
    var answer =confirm("Are you sure you want to delete?")
    if (answer)
    {
        window.location="delete.php?CustomerID="+id;
    }
}


</script>
 

</body>
</html>