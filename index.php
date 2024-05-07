<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
        }

        .form-container form {
            width: 30%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            padding: 20px;
            border-radius: 5px;
        }

        /* Existing styles for form and input fields */

        body {
            font-family: Arial, sans-serif;
            background-image: url('bg3.gif');
            background-size: 100%;
            background-repeat: repeat-y;
            background-attachment: fixed;
            height: 100%;
            width: 100%;
        }

        h2 {
            font-family: Arial, sans-serif;
            margin-bottom: 40px;
        }

        header {
            height: 130px;
            background-color: rgb(118, 171, 174);
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        form {
            margin: 35px;
            margin-top: 40px;
            width: 50%;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            padding: 20px;
            border-radius: 5px;
            background-color: rgb(227, 254, 247);
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .myButton {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
        }

        .myButton:hover {
            background-color: #45a049;
        }

        .opt {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: larger;
            margin: 100px;
            display: inline;
            font-weight: 700;

        }

        a {
            text-decoration: none;
        }
    </style>
    <header>
        <h1 style="text-align: center; padding-top: 35px; font-family:cursive; color: white">Address Book</h1>
    </header>
</head>

<body>
    <div class="opt">
        <ul>
            <li> <button onclick="window.location.href='add.html'" ; class="myButton">Save Address</button></li><br>
            <li><button onclick="window.location.href='edit.html'" ; class="myButton">Edit Address</button></li><br>
            <li><button onclick="window.location.href='remove.html'" ; class="myButton">Delete Address</button></li>
        </ul>
    </div>

    <h2 style="text-align: center; padding-top: 40px;">Saved Addresses</h2>
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "newdb"; // Replace with your database name

    $conn = new mysqli($servername, $username, $password, $dbname, 3307);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetching data from the database
    $sql = "SELECT * FROM record";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Age</th><th>Phone</th><th>Address</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["address"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>

</html>