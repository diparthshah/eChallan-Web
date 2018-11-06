<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wdl";
    $civilianUsername = $_POST["civilianUsername"];
    $civilianName = "";
    $challanid = "";
    $officerid = "";
    $challandatetime = "";
    $rulesbroken = "";
    $fineamount = "";
    $officerinfo = "";
     
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE currentlogincivil SET islogin='1' WHERE civilid = '$civilianUsername' ";
    if (mysqli_query($conn, $sql)) {
    }
    
    $civilNameQuery = "SELECT fname,lname FROM civilian WHERE aadharid = '$civilianUsername' ";
    $civilNameResult = mysqli_query($conn, $civilNameQuery);
    $civilNameRow = mysqli_fetch_row($civilNameResult);

    if($civilNameRow[0]!='') {
        $civilianName = "Welcome ".$civilNameRow[0]." ".$civilNameRow[1];
        $vehiclenumber = "";

        $vehicleQuery = "SELECT vehiclenum FROM civilian WHERE aadharid = '$civilianUsername' LIMIT 1 ";
        $vehicleResult = mysqli_query($conn, $vehicleQuery);
        while($vehicleRow = mysqli_fetch_assoc($vehicleResult)) {
            $vehiclenumber = $vehicleRow["vehiclenum"];
        }
    
        $challanQuery = "SELECT challanid, officerid, challandatetime, rulesbroken, fineamount FROM challan WHERE vehiclenumber = '$vehiclenumber' AND paystatus = '0' LIMIT 1";
        $challanResult = mysqli_query($conn, $challanQuery);
        $challanRow = mysqli_fetch_row($challanResult);
        $challanid = $challanRow[0];
        $officerid = $challanRow[1];
        $challandatetime = $challanRow[2];
        $rulesbroken = $challanRow[3];
        $fineamount = $challanRow[4];
    
        $officerQuery = "SELECT officername, officerdesg, policestn FROM officer WHERE officerid = '$officerid' ";
        $officerResult = mysqli_query($conn, $officerQuery);
        $officerRow = mysqli_fetch_row($officerResult);
        $officername = $officerRow[0];
        $officerdesg = $officerRow[1];
        $policestn = $officerRow[2];
        $officerinfo = "ID: ".$officerid."\n"."Name: ".$officername."\n"."Desg: ".$officerdesg."\n"."Station: ".$policestn;
    
        $historyQuery = "SELECT challanid, officerid, challandatetime, fineamount, paystatus FROM challan WHERE vehiclenumber = '$vehiclenumber' ";
        $historyResult = mysqli_query($conn, $historyQuery);        
    }
    else {
        echo '<script> alert("Username does not exits, Try with Valid Username"); </script>';
        return;
    }
    
    mysqli_close($conn);
?>
<html lang="en">

<head>
    <title>Civilian Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <script src="../js/civilian.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/civil.css">
</head>

<body onload="setupTextBoxes()">
<div align="right">
    <div align="top"> 
        <a href="../index.php"><font color="#4285f4" style="font-weight: 900;"><b>Click To Logout</b></font></a>
    </div>
</div>
    <center>
        <br>
        <h1 style="font-weight: 900;"><b><i><font color="#4285f4">eChallan</font></i></b></h1>
        <h4 align="center"><font color="#4285f4"><b><?php echo $civilianName; ?></b></font></h4>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                    aria-selected="true"><b>Pending Challan</b></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history"
                    aria-selected="false"><b>Your History</b></a>
            </li>
        </ul>
        <div class="tab-content pt-2 pl-1" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <center>
                    <form method="GET" action="paychallan.php">
                        <label for="Id"><font color="#4285f4"><b>Challan ID</b></font></label>
                        <input type="text" id="challanID" name="challanID" class="form-control" style="width:15%;" value="<?php echo $challanid; ?>">
                        <label for="date"><font color="#4285f4"><b>Date Time</b></font></label>
                        <input type="text" id="challanDateTime" class="form-control" style="width:15%;" value="<?php echo $challandatetime ?>">
                        <label for="rules broken"><font color="#4285f4"><b>Rules Broken</b></font></label>
                        <textarea  id="rulesBroken" class="form-control" style="width:15%; height:10%; font-size:90%;"> <?php echo $rulesbroken; ?></textarea>
                        <label for="amount"><font color="#4285f4"><b>Fine Amount</b></font></label>
                        <input type="text" id="fineAmount" class="form-control" style="width:15%;" value="<?php echo $fineamount; ?>">
                        <label for="Officer id"><font color="#4285f4"><b>Officer Info</b></font></label>
                        <textarea id="officerInfo" class="form-control" style="width:15%; height:10%; font-size:90%;"><?php echo $officerinfo; ?></textarea>
                        <div class="pt-4">
                            <button type="submit" id="markaspaidbtn" class="btn btn-primary" style="width:15%;">Mark as paid</button>
                        </div>
                    </form>
                </center>
            </div>
            <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
                <div class="table-responsive text-nowrap shadow-lg ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Challan ID</th>
                                <th scope="col">Officer ID</th>
                                <th scope="col">Date Time</th>
                                <th scope="col">Fine amount</th>
                                <th scope="col">Pay Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($historyRow = mysqli_fetch_assoc($historyResult)):; ?>
                                <tr>
                                    <td><?php echo $historyRow["challanid"]; ?></td>
                                    <td><?php echo $historyRow["officerid"]; ?></td>
                                    <td><?php echo $historyRow["challandatetime"]; ?></td>
                                    <td><?php echo $historyRow["fineamount"]; ?></td>
                                    <td><?php echo $historyRow["paystatus"]; ?></td>
                                </tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </center>
</body>
</html>