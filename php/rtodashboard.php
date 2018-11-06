<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wdl";
    $rtoUserName = $_POST["rtoUsername"];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE currentlogin SET islogin='1' WHERE rtoid = '$rtoUserName' ";
    if (mysqli_query($conn, $sql)) {
    }

    $rtoNameQuery = "SELECT officername FROM officer WHERE officerid = '$rtoUserName' ";
    $rtoNameResult = mysqli_query($conn, $rtoNameQuery);
    $rtoNameRow = mysqli_fetch_row($rtoNameResult);
    $rtoName = "Welcome Mr.".$rtoNameRow[0];

    $historyQuery = "SELECT challanid, vehiclenumber, challandatetime, fineamount from challan WHERE officerid = '$rtoUserName' ";
    $historyResult = mysqli_query($conn, $historyQuery);

    mysqli_close($conn);
?>
<html>
<head>
    <title>R.T.O Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 height=device-height">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/rto.css">
    <script src="../js/rto.js"></script>
</head>
<body>
<div align="right">
    <div align="top"> 
        <a href="../index.php"><font color="#4285f4" style="font-weight: 900;"><b>Click To Logout</b></font></a>
    </div>
</div>
    <center>
        <br>
        <h1 style="font-weight: 900;"><b><i><font color="#4285f4">eChallan</font></i></b></h1>
        <h4 align="center"><font color="#4285f4"><b><?php echo $rtoName; ?></b></font></h4>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                    aria-selected="true"><b>Create new Challan</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-add" role="tab" aria-controls="pills-add" aria-selected="false"><b>Add new Record</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history"
                    aria-selected="false"><b>Check History</b></a>
            </li>
        </ul>
        <div class="tab-content pt-2 pl-1" id="pills-tabContent">
            <div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <center>
                    <div class="">
                        <form onsubmit="return createChallan()" action="generatechallan.php" method="POST">
                            <div class="md-form pb-1" style="width:18%">
                                <input type="text" id="VehicleNumber" name="vehicleNumber" class="form-control" required>
                                <label class="control-label" for="">Vehicle Number</label>
                            </div>
                            <fieldset>
                                <div class="pb-5">
                                    <font color="#4285f4">Date and Time</font>
                                    <br>
                                    <input type="datetime-local" id="time" required style="width: 18%" name="challanDateTime"/>
                                </div>

                            </fieldset>
                           <moitag class="rulesbrokenclass"> <b>Rules Broken</b></moitag>
                            <br>
                            <br>
                            <nigga> <input type="checkbox" id="1" name="rulesBroken[]">&nbsp; <font color="#4285f4"><b>Signal Violation</b></font> </nigga>
                            <br>
                            <nigga1> <input type="checkbox" id="2" name="rulesBroken[]">&nbsp; <font color="#4285f4"><b>No Driving documents</b></font></nigga1>
                            <br>
                            <nigga2><input type="checkbox" id="3" name="rulesBroken[]" >&nbsp; <font color="#4285f4"><b>Speed Limit Violation</b></font></nigga2>
                            <br>
                            <nigga3><input type="checkbox" id="4" name="rulesBroken[]">&nbsp; <font color="#4285f4"><b>Road Safety Violation</b></font></nigga3>
                            <br>
                            <div class="pt-5">
                                <button type="submit" class="btn btn-primary" style="width: 18%">Create</button>
                            </div>
                        </form>
                    </div>
                </center>
            </div>
            <div class="tab-pane fade" id="pills-add" role="tabpanel" aria-labelledby="pills-add-tab">
                <center>
                        <div class="">
                    <form onsubmit="return addRecord()" action="newrecord.php" method="POST">
                        <div class="row">
                            <div class="column">
                                <div class="md-form pb-1" style="width:50%">
                                    <input type="text" id="Aadhar" name="aadharid" class="form-control" required>
                                    <label for="Aadhar">Enter Aadhar ID</label>
                                </div>

                                <div class="md-form pb-1" style="width:50%">
                                    <input type="text" id="fname" name="fname" class="form-control" required>
                                    <label for="Username">Enter First Name</label>
                                </div>
                                <div class="md-form pb-1" style="width:50%">
                                    <input type="text" id="lname" name="lname" class="form-control" required>
                                    <label for="lname">Enter Last Name</label>
                                </div>
                                <div class="md-form pb-1" style="width:50%">
                                    <input type="text" id="Pin" name="pincode" class="form-control" required>
                                    <label for="Pin">Enter Pin Code</label>
                                </div>
                                <div class="md-form pb-1" style="width:50%">
                                    <input type="text" id="Street" name="streetnum" class="form-control" required>
                                    <label for="Street">Enter Street</label>
                                </div>
                            </div>
                            <div class=" pt-5">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary" >Add record</button>
                            </div>
                            <div class="column">
                                <div class="md-form pb-1" style="width:50%">
                                    <input type="text" id="License" name="licensenum" class="form-control" required>
                                    <label for="License">Enter License No.</label>
                                </div>
                                <div class="md-form " style="width:50%">
                                    <input type="text" id="Vehicle" name="vehiclenum" class="form-control" required>
                                    <label for="Vehicle">Enter Vehicle No.</label>
                                </div>
                                <select class="mdb select md-form" style="width:50%" name="vehicletype">
                                    <option value="" disabled selected>Select Vehicle Type</option>
                                    <option value="Two-wheelers">Two-wheelers</option>
                                    <option value="Three-wheelers">Three-wheelers</option>
                                    <option value="Four-wheelers">Four-wheelers</option>
                                    <option value="Heavy vehicles">Heavy vehicles</option>
                                </select>
                                <div class="md-form pb-1" style="width:50%">
                                    <input type="text" id="Model" name="vehiclemodel" class="form-control" required>
                                    <label for="Model">Enter Vehicle Model</label>
                                </div>
                                <div class="md-form pb-1" style="width:50%">
                                    <input type="text" id="Phone" name="phonenum" class="form-control" required>
                                    <label for="Phone">Enter Phone No.</label>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </center>
            </div>
            <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
                <div class="shadow-lg">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Challan ID</th>
                                <th scope="col">Vehicle Number</th>
                                <th scope="col">Date Time</th>
                                <th scope="col">Fine amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($historyRow = mysqli_fetch_assoc($historyResult)):; ?>
                                <tr>
                                    <td><?php echo $historyRow["challanid"]; ?></td>
                                    <td><?php echo $historyRow["vehiclenumber"]; ?></td>
                                    <td><?php echo $historyRow["challandatetime"]; ?></td>
                                    <td><?php echo $historyRow["fineamount"]; ?></td>
                                </tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </center>
    
</body>
</html>