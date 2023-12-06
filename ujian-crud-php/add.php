<html>
<head>
    <title>Tambah Note</title>
    
    <style>
        body {
            font-family: sans-serif;
            background: linear-gradient(to bottom, #ffffff, #25a1fa);
        }

        table {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
            background: linear-gradient(to bottom,#ffffff, #bfd8ff);
            border-left: 6px solid #ddd;
			text-align: left;
            border-radius: 25px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        a {
            color: white;
            background-color: green;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        
    </style>
</head>
<body>
    <h1>Tambah Note</h1> <br><br><br>
	<a href="index.php">Kembali ke Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Title</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr> 
				<td>Note</td>
				<td><input type="text" style="width: 100%; height: 500px;" name="texts"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$title = $_POST['title'];
		$texts = $_POST['texts'];

		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO note(title,texts) VALUES('$title','$texts')");
		
		// Show message when user added
		echo "Note berhasil ditambahkan <a href='index.php'>kebali ke Home</a>";
	}
	?>
</body>
</html>
