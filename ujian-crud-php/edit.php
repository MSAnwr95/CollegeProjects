<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$title=$_POST['title'];
	$texts=$_POST['texts'];

		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE note SET title='$title',texts='$texts' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM note WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$title = $user_data['title'];
	$texts = $user_data['texts'];
	
}
?>
<html>
<head>	
	<title>Edit <?php echo $title;?></title>
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
            border-left: 3px solid #ddd;
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
    <h1>Edit <?php echo $title;?></h1> <br><br><br>
	<a href="index.php">Kembali ke Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td><b>Title</b></td>
				<td><input type="text" name="title" value=<?php echo $title;?>></td>
			</tr>
			<tr> 
				<td><b>Note</b></td>
				<td><input type="text" name="texts" style="width: 100%; height: 500px;" value=<?php echo $texts;?>></td>
			</tr>

			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
