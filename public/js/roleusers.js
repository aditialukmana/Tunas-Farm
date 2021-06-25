var urlRoleUsers = $("#tableRoleUsers").data("url");
var tableRoleUsers = null;
$(document).ready(function () {
  tableRoleUsers = $("#tableRoleUsers").DataTable({
    ajax: urlRoleUsers,
    columns: [
      { data: "group_id", title: "Role ID" },
      { data: "user_id", title: "User ID" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-roleuser" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-roleuser" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
  });

  $("#add_role_user").click(function () {
    var formData = new FormData($("#create_RoleUser_form")[0]);
    $.ajax({
      url: urlRoleUsers,
      type: "POST",
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        $("#modal_create").modal("hide");
        $("#create_RoleUser_form")[0].reset();
        tableRoleUsers.ajax.reload();
      },
    });
  });

  $(document).on("click", ".edit-roleuser", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlRoleUsers + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").val(data.id);
        $("#role_edit option[value='" + data.group_id + "']").attr(
          "selected",
          "selected"
        );
        $("#user_edit option[value='" + data.user_id + "']").attr(
          "selected",
          "selected"
        );
      },
    });
  });

  $("#edit_role_user").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_RoleUser_form").serialize();
    $.ajax({
      url: urlRoleUsers + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_RoleUser_form")[0].reset();
        tableRoleUsers.ajax.reload();
      },
    });
  });

  $(document).on("click", ".delete-roleuser", function (e) {
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
          url: urlRoleUsers + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableRoleUsers.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });

  $.ajax({
    url: "http://localhost:8080/api/authgroups/",
    type: "get",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        $("#role").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].name +
            "</option>"
        );
        $("#role_edit").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].name +
            "</option>"
        );
      }
    },
  });

  $.ajax({
    url: "http://localhost:8080/api/users/",
    type: "get",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        $("#user").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].username +
            "</option>"
        );
        $("#user_edit").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].username +
            "</option>"
        );
      }
    },
  });
});
