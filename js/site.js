$(document).ready(function(){
    start_functions();
})

function start_functions(){
    
    $('#btnSignUpClean').on('click',function(){
        cleanSignUpForm();
    });

    $('btnSignUpClose').on('click',function(){
        cleanSignUpForm();
    });

    $('#btnSignUp').on('click',function(){
        signUpUser();
    });

    $('#btnUpload').on('click',function(){
        uploadImage();
    });

    $('#btnUploadClose').on('click',function(){
        cleanImageUpload();
    });
    //We have a login attempt
    $('#btnLogin').on('click', function(){
        makeLogin();
    });
}


function cleanSignUpFields(){
    $("#txtEmailSgnUp").val("");
    $("#txtNameSgnUp").val("");
    $("#txtUserSgnUp").val("");
    $("#txtPassword1SgnUp").val("");
    $("#txtPassword2SgnUp").val("");
}
function cleanSignUpForm(){
    cleanSignUpFields();
    $('#signUpError').html("");
    $('#signUpData').html("");
}
function validateEmail(email) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(email)) {
        return true;
    }else{
        return false;
    }
}


function signUpUser(){
    var user        = $("#txtUserSgnUp").val();
    var email       = $("#txtEmailSgnUp").val();
    var name        = $("#txtNameSgnUp").val();
    var password1   = $("#txtPassword1SgnUp").val();
    var password2   = $("#txtPassword2SgnUp").val();

  
    var errorMsg = '';

    if (email == ''){
        errorMsg += 'E-mail cannot be empty<br>';
    }

    if (!validateEmail(email)){
        errorMsg += 'Incorrect E-mail<br>';
    }

    if (name == ''){
        errorMsg += 'Name cannot be empty<br>';
    }

    if (password1 == '' || password2 == ''){
        errorMsg += 'Passwords cannot be empty<br>';
    }

    if(password1 != password2){
        errorMsg += 'Passwords do not match<br>';
    }
    
    if (errorMsg.length > 0){
        $('#signUpError').html(errorMsg);
        $("#signup-error").show();
 
    }
    else{

        $.post("controller/DBController.php",{user:user, password:password1, email:email, name:name}, function(data){
                
                alert (data);
                if (data == true) {
                        //Redirect and activate session stuff
                        $("#signUpData").html("User correctly added. You can now log in to the system.");
                   $("#signup-success").show();
                        location.href = "index.php";
                    } 
                    else if (data == false){
                        $('#signUpError').html("Username already exists");
                        $("#signup-error").show();
                    } else {
                        $('#errorLoginMsg').html('Unexpected Error. Please try again later');
                        $('#loginErrorModal').modal('show');
                    }
            });
    }
    
}

function cleanLoginFields(){
    $('#txtEmailLogIn').val("");
    $('#txtPasswordLogin').val("");
}

function makeLogin(){
        var user = $('#txtUserLogIn').val();
        var password = $('#txtPasswordLogin').val();
        var errorMsg = "";
        if (user == '' || password == '') {     	
            errorMsg += "Login data cannot be empty<br>";
        }


        if (errorMsg.length > 0){
            $('#errorLoginMsg').html(errorMsg);
            $('#loginErrorModal').modal('show');
            cleanLoginFields();
        }else {
            $.post("controller/DBController.php",{user:user, password:password}, function(data){
                
                if (data == true) {
                        //Redirect and activate session stuff
                        location.href = "userpage.php";
                    } 
                    else if (data == false){
                        $('#errorLoginMsg').html('Login failed. The username or password you entered is incorrect');
                        $('#loginErrorModal').modal('show');
                    } else {
                        $('#errorLoginMsg').html('Unexpected Error. Please try again later');
                        $('#loginErrorModal').modal('show');
                    }
            });
        }
}