/*
    Modified on 09-10-2018 17:02
    on skillbox@diparth
    Jetbrains.WebStorm 2018
*/
function validateRTO() {

    var username = document.getElementById("rtoUsername").value;
    var password = document.getElementById("rtoPassword").value;
    var usernameRegex = new RegExp("\\b\\d{6}\\b");
    var passwordRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
    var goAhead = true;

    if(!usernameRegex.test(username)) {
        alert("Invalid Username(Make sure it matches your 6 digit Officer ID)");
        goAhead = false;
    }
    if(!passwordRegex.test(password)) {
        alert("Invalid Password");
        goAhead = false;
    }
    
    return goAhead;
}

function validateCivilian() {

    var username = document.getElementById("civilianUsername").value;
    var password = document.getElementById("civilianPassword").value;
    var usernameRegex = new RegExp("\\d{12}");
    var passwordRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
    var proceedAhead = true;

    if(!usernameRegex.test(username)) {
        alert("Invalid Username(Make sure it matches your 12 digit aadhar Number)");
        proceedAhead = false;
    }

    if(!passwordRegex.test(password)) {
        alert("Invalid Password");
        proceedAhead = false;
    }

    return proceedAhead;
}