var urlSeedling = $("#tableSeedling").data("url");
var tableSeedling = null;
$(document).ready(function () {
  tableSeedling = $("#tableSeedling").DataTable({
    ajax: urlSeedling,
    columns: [
      { data: "code", title: "Code" },
      { data: "sprouting", title: "Sprouting" },
      { data: "seedling", title: "Seedling" },
      { data: "tanggal", title: "Tanggal" },
      { data: "sisa", title: "Sisa" },
      { data: "reject", title: "Reject" },
      {
        data: "status",
        title: "Status",
        render: function (data, type, row) {
          if (row["status"] === "active") {
            return '<p class="btn btn-primary">' + row["status"] + "</p>";
          } else if (row["status"] === "inactive") {
            return '<p class="btn btn-secondary">' + row["status"] + "</p>";
          }
        },
      },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-seedling" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-seedling" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
    order: [[1, "asc"]],
  });

  // Tambah data Seedling
  $("#add_seed").click(function () {
    var formData = $("#create_Seedling_form").serialize();
    $.ajax({
      url: urlSeedling,
      type: "POST",
      data: formData,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        tableSeedling.ajax.reload();
        $("#modal_create").modal("hide");
        $("#create_Seedling_form")[0].reset();
      },
    });
  });

  // Edit data Seedling
  $(document).on("click", ".edit-seedling", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlSeedling + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").attr("value", data.data.id);
        $("#sprouting_edit option[value='" + data.data.sprouting + "']").attr(
          "selected",
          "selected"
        );
        $("#seedling_edit").attr("value", data.data.seedling);
        $("#sisa_edit").attr("value", data.data.sisa);
        $("#reject_edit").attr("value", data.data.reject);
        $("#status_edit option[value='" + data.data.status + "']").attr(
          "selected",
          "selected"
        );
      },
    });
  });

  $("#edit_seed").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_Seedling_form").serialize();
    $.ajax({
      url: urlSeedling + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_Seedling_form")[0].reset();
        tableSeedling.ajax.reload();
      },
    });
  });

  // Delete data Seedling
  $(document).on("click", ".delete-seedling", function (e) {
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
          url: urlSeedling + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableSeedling.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });

  $.ajax({
    url: "http://localhost:8080/api/sprouting/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        $("#sprouting").append(
          "<option value='" +
            data.data[i].code +
            "'>" +
            data.data[i].code +
            "</option>"
        );
        $("#sprouting_edit").append(
          "<option value='" +
            data.data[i].code +
            "'>" +
            data.data[i].code +
            "</option>"
        );
      }
    },
  });

  $("#sprouting").change(function () {
    var sprouting = $("#sprouting").val();
    $.ajax({
      url: "http://localhost:8080/api/sprouting/",
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (data.data[i].code == sprouting) {
            $("#id_tanaman").attr("value", data.data[i].id_tanaman);
          }
        }
        var id_tanaman = $("#id_tanaman").val();
        $.ajax({
          url: "http://localhost:8080/api/planttypes/" + id_tanaman,
          type: "GET",
          async: true,
          dataType: "json",
          success: function (data) {
            var codeSeed = $("#code").val() + "-" + data.name;
            $("#code").attr("value", codeSeed);
          },
        });
      },
    });
  });
});
