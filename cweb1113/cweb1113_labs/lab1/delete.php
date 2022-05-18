<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>delete.php</h1>
	<?php

	$CustomerID=isset($_GET['CustomerID']) ? $_GET['CustomerID'] :die("Record ID not found");
	echo $CustomerID;
	//echo $CustomerID;

	// include database connection
    include"config/database.php";

    // delete query
    $query="DELETE FROM customers WHERE CustomerID=?";
    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$CustomerID);

    if($stmt->execute())
    {
    	header("Location: index.php?action=deleted");
	}
	else
	{
		die("Unable to delete record.");
	}
	?>
</body>
</html>