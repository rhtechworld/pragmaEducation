$(document).ready(function() {

    var proceedButton = false;

    //name validation
    $('#nameError').hide();
    $('input#RegisterName').on('blur', function() 
    {
        if( $(this).val() == ''  || $(this).val() == "null")
        {
            $('#nameError').show();
            proceedButton = false;
            $('#proceedRegisterButton').attr('disabled','disabled');
        }
        else
        {
            $('#nameError').hide();
            proceedButton = true;
            $('#proceedRegisterButton').removeAttr('disabled');
        }
    })

    //Email Validation
    $('#emailError').hide();
    $('#emailErrorValid').hide();
    $('input#Registerusername').on('blur', function() 
    {
        if( $(this).val() == ''  || $(this).val() == "null")
        {
            $('#emailError').show();
            proceedButton = false;
            $('#proceedRegisterButton').attr('disabled','disabled');
        }
        else
        {
            var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            var inputEmailValue = $('#Registerusername').val();
            if(testEmail.test(inputEmailValue))
            {
                $('#emailError').hide();
                $('#emailErrorValid').hide();
                proceedButton = true;
                $('#proceedRegisterButton').removeAttr('disabled');
            }
            else
            {
                $('#emailError').hide();
                $('#emailErrorValid').show();
                proceedButton = false;
                $('#proceedRegisterButton').attr('disabled','disabled');
            }
        }
    })

    //Confirm email validation
    $('#confirmemailErrorRequired').hide();
    $('#confirmemailError').hide();
    $('input#RegisterusernameTwo').on('blur', function() 
    {
        if( $(this).val() == ''  || $(this).val() == "null")
        {
            $('#confirmemailErrorRequired').show();
            proceedButton = false;
            $('#proceedRegisterButton').attr('disabled','disabled');
        }
        else
        {
            var inputEmailValueOne = $('#Registerusername').val();
            var inputEmailValueTwo = $('#RegisterusernameTwo').val();
            if(inputEmailValueOne == inputEmailValueTwo)
            {
                $('#confirmemailErrorRequired').hide();
                $('#confirmemailError').hide();
                proceedButton = true;
                $('#proceedRegisterButton').removeAttr('disabled');
            }
            else
            {
                $('#confirmemailError').show();
                $('#confirmemailErrorRequired').hide();
                proceedButton = false;
                $('#proceedRegisterButton').attr('disabled','disabled');
            }
        }
    })

    //mobile number validation
    $('#mobileError').hide();
    $('#mobileValidError').hide();
    $('input#Registernumber').on('blur', function() 
    {
        if( $(this).val() == ''  || $(this).val() == "null")
        {
            $('#mobileError').show();
            proceedButton = false;
            $('#proceedRegisterButton').attr('disabled','disabled');
        }
        else
        {
            var mobilefilter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
            var inputmobile = $('#Registernumber').val();
            if (mobilefilter.test(inputmobile)) 
            {
                if(inputmobile.length==10)
                {
                    $('#mobileError').hide();
                    $('#mobileValidError').hide();
                    proceedButton = true;
                    $('#proceedRegisterButton').removeAttr('disabled');
                }
                else
                {
                    $('#mobileError').hide();
                    $('#mobileValidError').show();
                    proceedButton = false;
                    $('#proceedRegisterButton').attr('disabled','disabled');
                }
            }
            else
            {
                $('#mobileError').hide();
                $('#mobileValidError').show();
                proceedButton = false;
                $('#proceedRegisterButton').attr('disabled','disabled');
            }
        }
    })


    //Confirm mobile validation
    $('#confirmmobileErrorRequired').hide();
    $('#confirmmobileError').hide();
    $('input#RegisternumberTwo').on('blur', function() 
    {
        if( $(this).val() == ''  || $(this).val() == "null")
        {
            $('#confirmmobileErrorRequired').show();
            proceedButton = false;
            $('#proceedRegisterButton').attr('disabled','disabled');
        }
        else
        {
            var inputMobileValueOne = $('#Registernumber').val();
            var inputMobileValueTwo = $('#RegisternumberTwo').val();
            if(inputMobileValueOne == inputMobileValueTwo)
            {
                $('#confirmmobileErrorRequired').hide();
                $('#confirmmobileError').hide();
                proceedButton = true;
                $('#proceedRegisterButton').removeAttr('disabled');
            }
            else
            {
                $('#confirmmobileError').show();
                $('#confirmmobileErrorRequired').hide();
                proceedButton = false;
                $('#proceedRegisterButton').attr('disabled','disabled');
            }
        }
    })


    //password validation
    $('#passwordError').hide();
    $('#validpasswordError').hide();
    $('input#Registerpassword').on('blur', function() 
    {
        if( $(this).val() == ''  || $(this).val() == "null")
        {
            $('#passwordError').show();
            proceedButton = false;
            $('#proceedRegisterButton').attr('disabled','disabled');
        }
        else
        {
            var inputpassword = $('#Registerpassword').val();
            if(inputpassword.length >= 8)
            {
                $('#passwordError').hide();
                $('#validpasswordError').hide();
                proceedButton = true;
                $('#proceedRegisterButton').removeAttr('disabled');
            }
            else
            {
                $('#passwordError').hide();
                $('#validpasswordError').show();
                proceedButton = false;
                $('#proceedRegisterButton').attr('disabled','disabled');
            }
        }
    })


    //Confirm password validation
    $('#confirmpasswordErrorRequired').hide();
    $('#confirmpasswordError').hide();
    $('input#RegisterpasswordTwo').on('blur', function() 
    {
        if( $(this).val() == ''  || $(this).val() == "null")
        {
            $('#confirmpasswordErrorRequired').show();
            proceedButton = false;
            $('#proceedRegisterButton').attr('disabled','disabled');
        }
        else
        {
            var inputPasswordValueOne = $('#Registerpassword').val();
            var inputPasswordValueTwo = $('#RegisterpasswordTwo').val();
            if(inputPasswordValueOne == inputPasswordValueTwo)
            {
                $('#confirmpasswordErrorRequired').hide();
                $('#confirmpasswordError').hide();
                proceedButton = true;
                $('#proceedRegisterButton').removeAttr('disabled');
            }
            else
            {
                $('#confirmpasswordErrorRequired').hide();
                $('#confirmpasswordError').show();
                proceedButton = false;
                $('#proceedRegisterButton').attr('disabled','disabled');
            }
        }
    })

});