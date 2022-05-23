$(document).ready(function () {
  //coursetab edit
  $(".js-edit-coursetab").on("click", function () {
    var button = $(this);
    var actionID = button.attr("data-action-id");

    $("#E" + actionID).html('<i class="fa fa-spinner fa-spin"></i>');

    $.ajax({
      url: "functions/ajax-functions/fetch-coursetab.php",
      method: "POST",
      data: { courseTabId: actionID },
      dataType: "json",
      success: function (data) {
        if (data == "error") {
          alert("Bad Request!, Something went wrong try again!");
          location.reload();
        } else {
          $("#coursetab-edit-id").val(data.course_tab_id);
          $("#coursetab-edit-name").val(data.course_tab_name);
          $("#coursetab-edit-status").val(data.status);
          $("#courseTabEditModal").modal("show");
          $("#E" + actionID).html('<i class="fa fa-edit"></i>');
        }
      },
    });
  });

  //coursetab delete
  $(".js-delete-coursetab").on("click", function () {
    var button = $(this);
    var actionID = button.attr("data-action-id");

    $("#D" + actionID).html('<i class="pl-3 fa fa-spinner fa-spin"></i>');

    $.ajax({
      url: "functions/ajax-functions/fetch-coursetab.php",
      method: "POST",
      data: { courseTabId: actionID },
      dataType: "json",
      success: function (data) {
        if (data == "error") {
          alert("Bad Request!, Something went wrong try again!");
          location.reload();
        } else {
          $("#coursetab-delete-id").val(data.course_tab_id);
          $("#coursetab-delete-name").val(data.course_tab_name);
          $("#coursetab-delete-status").val(data.status);
          $("#courseTabDeleteModal").modal("show");
          $("#D" + actionID).html('<i class="pl-3 fa fa-trash"></i>');
        }
      },
    });
  });

  //course list delete action
  $(".course-list-delete").on("click", function () {
    var button = $(this);
    var actionID = button.attr("data-action-id");

    $("#D" + actionID).html('<i class="pl-3 fa fa-spinner fa-spin"></i>');

    $.ajax({
      url: "functions/ajax-functions/fetch-course.php",
      method: "POST",
      data: { courseId: actionID },
      dataType: "json",
      success: function (data) {
        if (data == "error") {
          alert("Bad Request!, Something went wrong try again!");
          location.reload();
        } else {
          $("#course-delete-id").val(data.course_id);
          $("#course-delete-name").val(data.course_name);
          $("#courseDeleteModal").modal("show");
          $("#D" + actionID).html('<i class="pl-3 fa fa-trash"></i>');
        }
      },
    });
  });

  //student edit action
  $(".student-js-edit").on("click", function () {
    var button = $(this);
    var actionID = button.attr("data-action-id");

    $("#E" + actionID).html('<i class="pl-3 fa fa-spinner fa-spin"></i>');

    $.ajax({
      url: "functions/ajax-functions/fetch-student.php",
      method: "POST",
      data: { studentId: actionID },
      dataType: "json",
      success: function (data) {
        if (data == "error") {
          alert("Bad Request!, Something went wrong try again!");
          location.reload();
        } else {
          $("#student-edit-id").val(data.student_id);
          $("#student-edit-name").val(data.student_name);
          $("#student-edit-email").val(data.student_email);
          $("#studentEditModal").modal("show");
          $("#E" + actionID).html('<i class="fa fa-edit"></i>');
        }
      },
    });
  });

  //student delete action
  $(".student-js-delete").on("click", function () {
    var button = $(this);
    var actionID = button.attr("data-action-id");

    $("#D" + actionID).html('<i class="pl-3 fa fa-spinner fa-spin"></i>');

    $.ajax({
      url: "functions/ajax-functions/fetch-student.php",
      method: "POST",
      data: { studentId: actionID },
      dataType: "json",
      success: function (data) {
        if (data == "error") {
          alert("Bad Request!, Something went wrong try again!");
          location.reload();
        } else {
          $("#student-delete-id").val(data.student_id);
          $("#student-delete-name").val(data.student_name);
          $("#student-delete-email").val(data.student_email);
          $("#studentDeleteModal").modal("show");
          $("#D" + actionID).html('<i class="pl-3 fa fa-trash"></i>');
        }
      },
    });
  });

  //Ann delete action
  $(".ann-js-delete").on("click", function () {
    var button = $(this);
    var actionID = button.attr("data-action-id");

    $("#D" + actionID).html('<i class="pl-3 fa fa-spinner fa-spin"></i>');

    $.ajax({
      url: "functions/ajax-functions/fetch-announcements.php",
      method: "POST",
      data: { AnnId: actionID },
      dataType: "json",
      success: function (data) {
        if (data == "error") {
          alert("Bad Request!, Something went wrong try again!");
          location.reload();
        } else {
          $("#ann-delete-id").val(data.ann_id);
          $("#ann-delete-title").val(data.ann_title);
          $("#AnnDeleteModal").modal("show");
          $("#D" + actionID).html('<i class="pl-3 fa fa-trash"></i>');
        }
      },
    });
  });

  //Offer edit action
  $(".offer-js-edit").on("click", function () {
    var button = $(this);
    var actionID = button.attr("data-action-id");

    $("#E" + actionID).html('<i class="fa fa-spinner fa-spin"></i>');

    $.ajax({
      url: "functions/ajax-functions/fetch-offers.php",
      method: "POST",
      data: { OffId: actionID },
      dataType: "json",
      success: function (data) {
        if (data == "error") {
          alert("Bad Request!, Something went wrong try again!");
          location.reload();
        } else {
          $("#offerEditId").val(data.offer_id);
          $("#offerEditName").val(data.offer_name);
          $("#offerEditAt").val(data.offer_at);
          $("#offerStatus").val(data.status);
          $("#editOfferModal").modal("show");
          $("#E" + actionID).html('<i class="fa fa-edit"></i>');
        }
      },
    });
  });

  //Offer delete action
  $(".offer-js-delete").on("click", function () {
    var button = $(this);
    var actionID = button.attr("data-action-id");

    $("#D" + actionID).html('<i class="pl-3 fa fa-spinner fa-spin"></i>');

    $.ajax({
      url: "functions/ajax-functions/fetch-offers.php",
      method: "POST",
      data: { OffId: actionID },
      dataType: "json",
      success: function (data) {
        if (data == "error") {
          alert("Bad Request!, Something went wrong try again!");
          location.reload();
        } else {
          $("#offerDeleteId").val(data.offer_id);
          $("#offerDeleteName").val(data.offer_name);
          $("#offerDeleteAt").val(data.offer_at);
          $("#deleteOfferModal").modal("show");
          $("#D" + actionID).html('<i class="pl-3 fa fa-trash"></i>');
        }
      },
    });
  });

  //Course Video edit action
  $(".video-js-edit").on("click", function () {
    var button = $(this);
    var actionID = button.attr("data-action-id");

    $("#E" + actionID).html('<i class="fa fa-spinner fa-spin"></i>');

    $.ajax({
      url: "functions/ajax-functions/fetch-course-video.php",
      method: "POST",
      data: { VidId: actionID },
      dataType: "json",
      success: function (data) {
        if (data == "error") {
          alert("Bad Request!, Something went wrong try again!");
          location.reload();
        } else {
          $("#videoEditId").val(data.video_uid);
          $("#editVideoTitle").val(data.video_title);
          $("#editVideoId").val(data.video_id);
          $("#editvideoStatus").val(data.status);
          $("#courseVideoEditModal").modal("show");
          $('#previewVideoOnModal').attr("href","https://drive.google.com/uc?id="+data.video_id+"&export=view");
          $("#E" + actionID).html('<i class="fa fa-edit"></i> Edit');
        }
      },
    });
  });

  //Course Video delete action
  $(".video-js-delete").on("click", function () {
    var button = $(this);
    var actionID = button.attr("data-action-id");

    $("#D" + actionID).html('<i class="fa fa-spinner fa-spin"></i>');

    $.ajax({
      url: "functions/ajax-functions/fetch-course-video.php",
      method: "POST",
      data: { VidId: actionID },
      dataType: "json",
      success: function (data) {
        if (data == "error") {
          alert("Bad Request!, Something went wrong try again!");
          location.reload();
        } else {
          $("#videoDeleteId").val(data.video_uid);
          $("#DeleteVideoTitle").val(data.video_title);
          $("#DeleteVideoId").val(data.video_id);
          $("#courseVideoDeleteModal").modal("show");
          $("#D" + actionID).html('<i class="fa fa-trash"></i> Delete');
        }
      },
    });
  });

  //Course Video Add action
  $(".video-js-add").on("click", function () {
    var button = $(this);
    var CourseTabId = button.attr("data-action-id");
    var courseId = button.attr("id");

    $("#" + courseId).html('<i class="fa fa-spinner fa-spin"></i> Loading...');

    $("#videoaddCTId").val(CourseTabId);
    $("#videoaddCId").val(courseId);
    $("#courseVideoaddModal").modal("show");
    $("#" + courseId).html('<i class="fa fa-plus"></i> Add New Video');
    
  });

});

//get Courses List By Courses Tab
function getCourseListOnCourseTab(tabid)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("getCoursesByTab").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "functions/ajax-functions/fetch-courses-input.php?TabId="+tabid, true);
  xhttp.send();
}

//Add Preview Link
function AddPreviewLink(previewId)
{
   $('#previewVideo').attr("href","https://drive.google.com/uc?id="+previewId+"&export=view");
   $('#previewVideoOnModalOnAdd').attr("href","https://drive.google.com/uc?id="+previewId+"&export=view");
   $('#previewVideoOnModalOnAddTwo').attr("href","https://drive.google.com/uc?id="+previewId+"&export=view");
}
