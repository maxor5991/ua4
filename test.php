<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$periodo = mysqli_real_escape_string($mysqli, $_POST['periodo']);
    $llamadas = mysqli_real_escape_string($mysqli, $_POST['llamadas']);
    $mensajes = mysqli_real_escape_string($mysqli, $_POST['mensajes']);
    $id_cliente = mysqli_real_escape_string($mysqli, $_POST['id_cliente']);


    if(empty($periodo) || empty($llamadas) || empty($mensajes) || empty($id_cliente)) {
				
		if(empty($periodo)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($llamadas)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($mensajes)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if(empty($id_cliente)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		 $result = mysqli_query($mysqli, "INSERT INTO clientes(periodo,llamadas,mensajes,id_cliente) VALUES('$periodo','$llamadas','$mensajes', '$id_cliente')");

		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
