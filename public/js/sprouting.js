var urlSprouting = $("#tableSprouting").data("url");
var tableSprouting = null;
console.log(urlSprouting);
$(document).ready(function () {
  tableSprouting = $("#tableSprouting").DataTable({
    ajax: urlSprouting,
    columns: [
      { data: "code", title: "Code" },
      { data: "tipe_tanaman", title: "Tipe Tanaman" },
      { data: "benih", title: "Benih" },
      { data: "tanggal", title: "Tanggal" },
      {
        data: "status",
        title: "Status",
        render: function (data, type, row) {
          if (row["status"] === "active") {
            return (
              '<button type="button" class="btn btn-primary status" data-status="' +
              row["status"] +
              '" data-id="' +
              row["id"] +
              '">' +
              row["status"] +
              "</button>"
            );
          } else if (row["status"] === "inactive") {
            return (
              '<button type="button" class="btn btn-secondary status" data-status="' +
              row["status"] +
              '" data-id="' +
              row["id"] +
              '">' +
              row["status"] +
              "</button>"
            );
          }
        },
      },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-sprouting" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-sprouting" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
    order: [[1, "asc"]],
  });

  // Tambah data Sprouting
  $("#add_sprout").click(function () {
    var formData = $("#create_Sprouting_form").serialize();
    $.ajax({
      url: urlSprouting,
      type: "POST",
      data: formData,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        tableSprouting.ajax.reload();
        $("#modal_create").modal("hide");
        $("#create_Sprouting_form")[0].reset();
      },
    });
  });

  $(document).on("click", ".status", function (e) {
    e.preventDefault();
    var id_status = $(this).data("id");
    var statuss = $(this).data("status");
    if (statuss == "active") {
      var dataStatus = "status" + "=" + "inactive";
    } else if (statuss == "inactive") {
      var dataStatus = "status" + "=" + "active";
    }
    $.ajax({
      url: urlSprouting + "/" + id_status,
      type: "PUT",
      data: dataStatus,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifStatusSuccess();
        tableSprouting.ajax.reload();
      },
    });
  });

  // Edit data Site
  $(document).on("click", ".edit-sprouting", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlSprouting + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        console.log(data.benih);
        $("#edit_id").attr("value", data.data.id);
        $("#tanaman_edit option[value='" + data.data.tipe_tanaman + "']").attr(
          "selected",
          "selected"
        );
        $("#benih_edit").attr("value", data.data.benih);
        $("#status_edit option[value='" + data.data.status + "']").attr(
          "selected",
          "selected"
        );
      },
    });
  });

  $("#edit_sprout").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_Sprouting_form").serialize();
    $.ajax({
      url: urlSprouting + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_Sprouting_form")[0].reset();
        tableSprouting.ajax.reload();
      },
    });
  });

  // Delete data Sprouting
  $(document).on("click", ".delete-sprouting", function (e) {
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
          url: urlSprouting + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableSprouting.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });

  $.ajax({
    url: "http://localhost/tunasdash/api/planttypes/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        $("#tanaman").append(
          "<option value='" +
            data.data[i].name +
            "'>" +
            data.data[i].name +
            "</option>"
        );
        $("#tanaman_edit").append(
          "<option value='" +
            data.data[i].name +
            "'>" +
            data.data[i].name +
            "</option>"
        );
      }
    },
  });

  $("#tanaman").change(function () {
    var tanaman = $("#tanaman").val();
    var kodeSprout = $("#code").val() + "-" + tanaman;
    $("#code").attr("value", kodeSprout);
    $.ajax({
      url: "http://localhost/tunasdash/api/planttypes/",
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (data.data[i].name == tanaman) {
            $("#id_tanaman").attr("value", data.data[i].id);
          }
        }
      },
    });
  });
});
