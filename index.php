<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wdl";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE currentlogin SET islogin='0'";
    if (mysqli_query($conn, $sql)) {
    }
    $civilsql = "UPDATE currentlogincivil SET islogin='0'";
    if (mysqli_query($conn, $civilsql)) {
    }

    mysqli_close($conn);
?>
<html lang="en">
<head>
    <title>E-challan System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="js/index.js"></script>
</head>
<body style="margin-top: 55px">
    <center>
        <h1 style="font-weight: 900;"><b><i><font color="whitesmoke">eChallan</font></i></b></h1>
        <div class="container mb-5 mt-5">
            <div class="card-deck" style="width:800px">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded mr-5 ">
                    <div class="card-body text-center" style="height:500px">
                        <img class="card-img-top mb-5" src="img/rto.png" alt="Card image" style="width:80%">
                        <h2>
                            <button type="button" class="btn btn-primary  pr-4 pl-4 mt-5" data-toggle="modal" data-target="#modal1">R.T.O</button>
                        </h2>
                        <div class="modal fade -lg" role="dialog" id="modal1">
                            <div class="modal-dialog">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h2 class="text-center">R.T.O Login</h2>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body pb-5">
                                        <div class="login-form shadow-lg">
                                            <form onsubmit="return validateRTO()" action="php/rtodashboard.php" method="POST">
                                                <div class="avatar">
                                                    <img src="img/rto.png" alt="Avatar">
                                                </div>
                                                <div class="md-form">
                                                    <input type="text" id="rtoUsername" name="rtoUsername" class="form-control" required>
                                                    <label for="Username">Username</label>
                                                </div>
                                                <div class="md-form">
                                                    <input type="password" id="rtoPassword" name="rtoPassword" class="form-control" required>
                                                    <label for="Password">Password</label>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    <div class="modal-footer pt-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-lg p-3 mb-5 bg-white rounded ml-5">
                    <div class="card-body text-center" style="height:500px">
                        <img class="card-img-bottom mb-5" src="img/user.png" alt="Card image" style="width:80%">
                        <h2>
                            <button type="button" class="btn btn-primary pr-4 pl-4 mt-5" data-toggle="modal" data-target="#modal2">Civilian</button>
                        </h2>
                        <div class="modal fade -lg" role="dialog" id="modal2">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="text-center">Civilian Login</h2>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body pb-5">
                                        <div class="login-form shadow-lg">
                                            <form onsubmit="return validateCivilian()" action="php/civiliandashboard.php" method="POST">
                                                <div class="avatar">
                                                    <img src="img/user.png" alt="Avatar">
                                                </div>
                                                <div class="md-form">
                                                    <input type="text" id="civilianUsername" name="civilianUsername"class="form-control" required>
                                                    <label for="Username">Username</label>
                                                </div>
                                                <div class="md-form">
                                                    <input type="password" id="civilianPassword" name="civilianPassword" class="form-control" required>
                                                    <label for="Password">Password</label>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer pt-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
<div align="left">
    <div align="left"> 
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdSDXeWl9ciwcu5EcakJatwLrA1huSziGq-wk53-XBY_Nh9GA/viewform?c=0&w=1"><font color="white" style="font-weight: 900;"><b>Survey Link</b></font></a>
    </div>
</div>
</body>
</html>