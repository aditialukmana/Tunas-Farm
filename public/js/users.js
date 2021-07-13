var urlUsers = $("#tableUsers").data("url");
var tableUsers = null;
$(document).ready(function () {
  tableUsers = $("#tableUsers").DataTable({
    ajax: urlUsers,
    columns: [
      { data: "username", title: "Username" },
      { data: "fullname", title: "Fullname" },
      { data: "email", title: "Email" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-password" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#edit_password"><span class="sr-only">Edit</span> <i class="fa fa-lock"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 edit-user" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-user" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Actions",
      },
    ],
  });

  $("#add_user").click(function () {
    var formData = $("#create_User_form").serialize();

    console.log(formData);
    $.ajax({
      url: urlUsers,
      type: "POST",
      data: formData,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        $("#modal_create").modal("hide");
        $("#create_User_form")[0].reset();
        tableUsers.ajax.reload();
      },
    });
  });

  $(document).on("click", ".edit-password", function (e) {
    e.preventDefault();
    var pass_id = $(this).data("id");
    $.ajax({
      url: urlUsers + "/" + pass_id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id_pass").val(data.data.id);
      },
    });
  });

  $("#edit_pass").click(function () {
    var edit_id_pass = $("#edit_id_pass").val();
    var dataPass = {
      password_hash: $("#confirm_password_edit").val(),
    };
    if ($("#confirm_password_edit").val() != $("#password_edit").val()) {
      notifPasswordNotMatch();
    } else {
      $.ajax({
        url: urlUsers + "/" + edit_id_pass,
        type: "PUT",
        data: dataPass,
        dataType: "json",
        success: function (data) {
          notifPasswordSuccess();
          $("#edit_password").modal("hide");
          $("#edit_Password_form")[0].reset();
          tableUsers.ajax.reload();
        },
      });
    };
  });

  $(document).on("click", ".edit-user", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlUsers + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").val(data.data.id);
        $("#email_edit").val(data.data.email);
        $("#username_edit").val(data.data.username);
        $("#fullname_edit").val(data.data.fullname);
      },
    });
  });

  $("#edit_user").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_User_form").serialize();
    $.ajax({
      url: urlUsers + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_User_form")[0].reset();
        tableUsers.ajax.reload();
      },
    });
  });

  $(document).on("click", ".delete-user", function (e) {
    e.preventDefault();
    var del_id = $(this).data("id");
    Swal.fire({
      title: "Apakah kamu yakin?",
      text: "Data yang telah terhapus tidak bisa dikembalikan!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, hapus!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: urlUsers + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableUsers.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });

  $.ajax({
    url: "http://localhost/tunasdash/api/customers",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        $("#customer").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].name +
            "</option>"
        );
      }
    },
  });
});
