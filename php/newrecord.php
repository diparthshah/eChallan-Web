<html>
<head>
    <title>R.T.O Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
</head>
<body>
    <center>
        <br>
        <h1 style="font-weight: 900;"><b><i><font color="#4285f4">eChallan</font></i></b></h1><br><br>
        <?php
            $aadharid = $_POST["aadharid"];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $pincode = $_POST["pincode"];
            $streetnum = $_POST["streetnum"];
            $licensenum = $_POST["licensenum"];
            $vehiclenum = $_POST["vehiclenum"];
            $vehicletype = $_POST["vehicletype"];
            $vehiclemodel = $_POST["vehiclemodel"];
            $phonenum = $_POST["phonenum"];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "wdl";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "INSERT INTO civilian VALUES('$aadharid', '$fname', '$lname', '$pincode', '$streetnum', '$licensenum', '$vehiclenum', '$vehicletype', '$vehiclemodel', '$phonenum');";
            if (mysqli_query($conn, $sql)) {
            }
            $loginsql = "INSERT INTO currentlogincivil VALUES('$aadharid', '0')";
            if (mysqli_query($conn, $loginsql)) {
            }
            mysqli_close($conn);
        ?>
        <h3 style="font-weight: 700;"><b><font color="#4285f4">Record Added Successfully</font></b></h3><br>
    </center>
</body>
</html>