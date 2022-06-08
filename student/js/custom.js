function checkUpdatePasswords(pw2)
{
    pw1 = document.getElementById('newPassword').value;
    document.getElementById('updateChangePassword').disabled = true;

    if(pw1 == pw2)
    {
        document.getElementById('updateChangePassword').disabled = false;
        document.getElementById('updateChangePasswordHint').innerHTML = "";
    }
    else
    {
        document.getElementById('updateChangePassword').disabled = true;
        document.getElementById('updateChangePasswordHint').innerHTML = "<div><small style='color:red'>Passwords mismatched</small></div>";
    }
}

$(document).ready(function () {
    //coursetab edit
    $(".js-get-subject-info").on("click", function () {
      var button = $(this);
      var subjectID = button.attr("data-subject-id");
      var subjectName = button.attr("data-subject-name");
  
      $("#" + subjectID).html('<i class="fa fa-spinner fa-spin"></i>');
  
      $.ajax({
        url: "functions/ajax-functions/fetch-subjectInfo.php",
        method: "POST",
        data: { subjectID: subjectID },
        dataType: "json",
        success: function (data) {
          if (data == "error") {
            alert("Bad Request!, Something went wrong try again!");
            location.reload();
          } else {
            $("#course-subject-topic-info").html(data.subject_desc);
            $("#AboutSubjectModalThis1").modal("show");
            $("#" + subjectID).html(subjectName+' <i style="font-size:13px" class="fa fa-info-circle"></i>');
          }
        },
      });
    });
});

function hideModal(id) {
    $("#" + id).modal("hide");
  }