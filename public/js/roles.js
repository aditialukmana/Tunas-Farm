var urlRoles = $("#tableRoles").data("url");
var tableRoles = null;
$(document).ready(function () {
  tableRoles = $("#tableRoles").DataTable({
    ajax: urlRoles,
    columns: [
      { data: "name", title: "Name" },
      { data: "description", title: "Description" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-role" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-role" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Actions",
      },
    ],
  });

  $("#add_role").click(function () {
    var formData = new FormData($("#create_Role_form")[0]);
    $.ajax({
      url: urlRoles,
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
        $("#create_Role_form")[0].reset();
        tableRoles.ajax.reload();
      },
    });
  });

  $(document).on("click", ".edit-role", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlRoles + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").val(data.id);
        $("#name_edit").val(data.name);
        $("#description_edit").text(data.description);
      },
    });
  });

  $("#edit_role").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_Role_form").serialize();
    $.ajax({
      url: urlRoles + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_Role_form")[0].reset();
        tableRoles.ajax.reload();
      },
    });
  });

  $(document).on("click", ".delete-role", function (e) {
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
          url: urlRoles + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableRoles.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });
});
