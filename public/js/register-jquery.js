$(document).ready(function() {
  $(".phone").intlTelInput({
    separateDialCode: true,
    utilsScript: url + "assets/intl-tel-input/build/js/utils.js",
    customPlaceholder: function(
      selectedCountryPlaceholder,
      selectedCountryData
    ) {
      return "111-222-3333";
    }
  });
});

function validate_phonenumber(div, valid_true, valid_false) {
  
  // return false;
  var telInput = $(div),
    errorMsg = $(valid_false),
    validMsg = $(valid_true);
    telInput.intlTelInput({
    utilsScript: url + "assets/intl-tel-input/build/js/utils.js"
  });
  var countryData = telInput.intlTelInput("getSelectedCountryData");
  // console.log(countryData);
  var reset = check_val_phone(telInput, errorMsg, validMsg);
  // on blur: validate
  telInput.blur(phone_blur(telInput, errorMsg, validMsg));
  telInput.on("keyup change", reset);
}

function check_val_phone(telInput, errorMsg, validMsg) {
  telInput.removeClass("is-invalid");
  errorMsg.addClass("hide");
  validMsg.addClass("hide");
}

function phone_blur(telInput, errorMsg, validMsg) {
  check_val_phone(telInput, errorMsg, validMsg);
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      validMsg.removeClass("hide");
    } else {
      telInput.addClass("is-invalid");
      telInput.removeClass("valid");
      errorMsg.removeClass("hide");
      telInput.on('input', function(e) { 
        $(this).val($(this).val().replace(/[^0-9]/g, '')); 
      }); 
     // return false;
    }
  }
}

function hover_contact(div, isd_id, cst_id) {
  var countryData = $(div).intlTelInput("getSelectedCountryData");
  var code = countryData.dialCode;
  var country_code = countryData.iso2;
  $(isd_id).val(code);
  $(cst_id).val(country_code);
}
