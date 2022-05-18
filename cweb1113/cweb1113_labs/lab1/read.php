<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Read</title>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h2>READ DATA</h2>
    </div>
<?php
$id=isset($_GET['CustomerID']) ? $_GET['CustomerID'] :die("Error: ID not found");

 

include"config/database.php";

 

try
{
    $query="SELECT CustomerID, CustomerName, ContactName, Address, City, PostalCode, Country From customers where CustomerID=? LIMIT 0,1";
    $stmnt=$con->prepare($query);
    $stmnt->bindParam(1,$id);
    $stmnt->execute();

 

    $row=$stmnt->fetch(PDO::FETCH_ASSOC);

 

    /*echo"<pre>";
    print_r($row);
    echo"</pre>";*/

 

    $CustomerID=$row["CustomerID"];
    $CustomerName=$row["CustomerName"];
    $ContactName=$row["ContactName"];
    $Address=$row["Address"];
    $City=$row["City"];
    $PostalCode=$row["PostalCode"];
    $Country=$row["Country"];

}
catch(PDOException $e) 
{
    die("ERROR :".$e->getMessage());
}

 

?>
<table class="table table-hoover table-resonsive table-bordered">
    <tr>
        <td>CustomerID</td>
        <td><?php echo $CustomerID; ?></td>        
    </tr>
    <tr>
        <td>CustomerName</td>
        <td><?php echo $CustomerName; ?></td>        
    </tr>
    <tr>
        <td>ContactName</td>
        <td><?php echo $ContactName; ?></td>        
    </tr>
    <tr>
        <td>Address</td>
        <td><?php echo $Address; ?></td>        
    </tr>
    <tr>
        <td>City</td>
        <td><?php echo $City; ?></td>        
    </tr>
    <tr>
        <td>PostalCode</td>
        <td><?php echo $PostalCode; ?></td>        
    </tr>
    <tr>
        <td>Country</td>
        <td><?php echo $Country; ?></td>        
    </tr>
</table>
</div>
</body>
</html>