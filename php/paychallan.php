<html>
<head>
    <title>Civilian Dashboard</title>
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
        <h1 style="font-weight: 900;"><b><i><font color="#4285f4">eChallan</font></i></b></h1><br>
<?php
    $challanid = $_GET["challanID"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wdl";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $paidQuery = "UPDATE challan SET paystatus = '1' WHERE challanid = '$challanid' ";
    if(mysqli_query($conn, $paidQuery)) {
    }
?>
<h3><font color="#4285f4"><b>Challan ID <?php echo $challanid; ?> Paid Successfully</b></font></h3><br>
<h4><font color="#4285f4"><b>Thank You For Using eChallan Portal</b></font></h4>
</center>
</body>
</html>