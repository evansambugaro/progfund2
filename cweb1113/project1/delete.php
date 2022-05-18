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

	$id=isset($_GET['id']) ? $_GET['id'] :die("Record ID not found");
	echo $id;
	//echo $id;

	// include database connection
    include"config/database.php";

    // delete query
    $query="DELETE FROM student WHERE id=?";
    $stmt=$con->prepare($query);
    $stmt->bindParam(1,$id);

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