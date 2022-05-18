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
$id=isset($_GET['id']) ? $_GET['id'] :die("Error: ID not found");

 

include"config/database.php";

 

try
{
    $query="SELECT Id, Name, Email, Phone, Title, Created_date, Modified_date From contacts where id=? LIMIT 0,1";
    $stmnt=$con->prepare($query);
    $stmnt->bindParam(1,$id);
    $stmnt->execute();

 

    $row=$stmnt->fetch(PDO::FETCH_ASSOC);

    $Name=$row["Name"];
    $Email=$row["Email"];
    $Phone=$row["Phone"];
    $Title=$row["Title"];
    $Createddate=$row["Created_date"];
    $Modifieddate=$row["Modified_date"];
        
}
catch(PDOException $e) 
{
    die("ERROR :".$e->getMessage());
}

 

?>
<table class="table table-hoover table-resonsive table-bordered">
    <tr>
        <td>Name</td>
        <td><?php echo $Name; ?></td>        
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $Email; ?></td>        
    </tr>
    <tr>
        <td>Phone</td>
        <td><?php echo $Phone; ?></td>        
    </tr>
    <tr>
        <td>Title</td>
        <td><?php echo $Title; ?></td>        
    </tr>
    <tr>
        <td>Created Date</td>
        <td><?php echo $Createddate; ?></td>        
    </tr>
    <tr>
        <td>Modified Date</td>
        <td><?php echo $Modifieddate; ?></td>        
    </tr>
</table>
</div>
</body>
</html>