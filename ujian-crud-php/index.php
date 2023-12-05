<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM note ORDER BY id DESC");
?>

<html>
<head>
    <title>Homepage</title>
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
        }

        th, td {
            padding: 10px;
        }

        a {
            color: white;
            background-color: green;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        table, th, td {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Localhost Personal Notes <i>v0.0.1</i> </h1> 
    <br>
    <br>
    <br>
    <a href="add.php">Tambahkan Note</a><br/><br/>
        <br>
        <br>

    <table width='80%'>

        <tr>
            <th>Your Notes</th>
        </tr>

        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['title'] . "</td>";
            echo "<td>" . $user_data['texts'] . "</td>";
            echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>
</html>