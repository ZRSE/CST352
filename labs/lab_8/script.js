$("document").ready(function() {

  $("#user").change(function() {


    $.ajax({

      type: "GET",
      url: "checkUsername.php",
      dataType: "json",
      data: {
        "username": $("#user").val()
      },
      success: function(data, status) {
        if (data == false) {
          $("#ue").html(" - Username available");
          $("#ue").attr("class", "success");
        } else {
          $("#ue").html(" - Username already taken");
          $("#ue").attr("class", "error");

        }

      },
      complete: function(data, status) {}

    });

  });

  $("#state").change(function() {


    $.ajax({

      type: "GET",
      url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
      dataType: "json",
      data: {
        "state": $("#state").val()
      },
      success: function(data, status) {

        $("#county").html("");
        for (var i = 0; i < data.length; i++) {
          $("#county").append("<option>" + data[i].county + "</option>");

        }
      },
      complete: function(data, status) { //optional, used for debugging purposes
      }

    });
  });



  $("#zipCode").change(function() {


    $.ajax({

      type: "GET",
      url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
      dataType: "json",
      data: {
        "zip": $("#zipCode").val()
      },
      success: function(data, status) {

        $("#city").html('');
        $("#lat").html('');
        $("#lon").html('');

        $("#unknownZip").html("");

        if (data.zip == null) {

          $("#unknownZip").html("You have to input a valid ZIP!");


        } else {

          $("#city").html(data.city);
          $("#lat").html(data.latitude);
          $("#lon").html(data.longitude);

        }
      },
      complete: function(data, status) { //optional, used for debugging purposes
      }

    }); //ajax

  }); //zip event





}); //document.ready



function validateForm() {
  var validationConfirmation = true;
  var username = $("#user").val();
  var password = $("#password").val();
  var pass2 = $("#passType").val();
  if (username.length < 5) {
    $("#userError").html("username must be at least 5 characters");
    validationConfirmation = false;

  };
  if (password.length < 3) {
    $("#passwordError").html("Password must have a minimum of 3 characters");
    validationConfirmation = false;
  }

  if (password != pass2) {
    $("#retypedError").html("Password and retyped password must be the same");
    validationConfirmation = false;

  }


  return validationConfirmation;

}