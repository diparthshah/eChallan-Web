function createChallan() {
    var vnumber = document.getElementById("VehicleNumber").value;
    var test = document.getElementsByName("rulesBroken[]");
    var vnumberRegex = new RegExp("\\w{2}\\d{2}\\w{2}\\d{4}");
    var goAhead = true;

    if (!vnumberRegex.test(vnumber)) {
        alert("Invalid Vehicle Number");
        goAhead = false;
    }
    if (test[0].checked == false && test[1].checked == false && test[2].checked == false) {
        alert("Please Tick the respective rules broken by the person!");
        goAhead = false;
    }

    return goAhead;
}

function addRecord() {
    var AadharId = document.getElementById("Aadhar").value;
    var FirstName = document.getElementById("fname").value;
    var LastName = document.getElementById("lname").value;
    var PinCode = document.getElementById("Pin").value;
    var StreetNo = document.getElementById("Street").value;
    var LicenseNo = document.getElementById("License").value;
    var VehicleNo = document.getElementById("Vehicle").value;
    var ModelNo = document.getElementById("Model").value;
    var PhoneNo = document.getElementById("Phone").value;
    var AadharIdRegex = new RegExp("\\d{12}");
    var FirstNameRegex= new RegExp("\\w+");
    var LastNameRegex= new RegExp("\\w+");
    var PinCodeRegex = new RegExp("\\d{6}");
    var StreetNoRegex = new RegExp("\\d{2}");
    var LicenseNoRegex= new RegExp("\\d{6}");
    var VehicleNoRegex = new RegExp("\\w{2}\\d{2}\\w{2}\\d{4}");
    var ModelNoRegex= new RegExp("\\w+");
    var PhoneNoRegex= new RegExp("\\d{10}");
    var goAhead = true;
    var errorArr = new Array();

    if (!AadharIdRegex.test(AadharId)) {
        errorArr.push("\nInvalid Aadhar Id (make sure its exactly 12 digits)");
        goAhead = false;
    }
    if (!FirstNameRegex.test(FirstName)) {
        errorArr.push("\nEnter the correct first name");
        goAhead = false;
    }
    if (!LastNameRegex.test(LastName)) {
        errorArr.push("\nEnter the correct last name");
        goAhead = false;
    }    
    if (!PinCodeRegex.test(PinCode)) {
        errorArr.push("\nEnter the correct Pincode");
        goAhead = false;
    }    
    if (!StreetNoRegex.test(StreetNo)) {
        errorArr.push("\nEnter the correct Street Number");
        goAhead = false;
    } 
    if (!LicenseNoRegex.test(LicenseNo)) {
        errorArr.push("\nEnter the correct License Number");
        goAhead = false;
    } 
    if (!VehicleNoRegex.test(VehicleNo)) {
        errorArr.push("\nEnter the correct Vehicle Number");
        goAhead = false;
    }
    if (!ModelNoRegex.test(ModelNo)) {
        errorArr.push("\nEnter the correct Model Number");
        goAhead = false;
    }
    if (!PhoneNoRegex.test(PhoneNo)) {
        errorArr.push("\nEnter the correct Phone Number");
        goAhead = false;
    }

    if(!goAhead) {
        alert(errorArr);
    }

    return goAhead;
}