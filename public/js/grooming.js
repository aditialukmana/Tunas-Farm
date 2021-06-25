var urlGrooming = $("#tableGrooming").data("url");
var tableGrooming = null;
$(document).ready(function () {
  tableGrooming = $("#tableGrooming").DataTable({
    ajax: urlGrooming,
    columns: [
      { data: "grcode", title: "Code" },
      { data: "secode", title: "Seedling" },
      { data: "grtwrlvl", title: "Tower & Level" },
      { data: "grtanggal", title: "Tanggal" },
      { data: "grterproses", title: "terproses" },
      { data: "grsisa", title: "sisa" },
      {
        data: "grstatus",
        title: "Status",
      },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-grooming" title="Edit" data-id="' +
            items.grid +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-grooming" title="Delete" data-id="' +
            items.grid +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
    order: [[1, "asc"]],
  });
  // Tambah data Grooming
  $("#add_groom").click(function () {
    var sisa_seed = $("#jumlah_seed").val() - $("#terproses").val();
    var formData = $("#create_Grooming_form").serialize();
    var id = $("#id_seed").val();
    $.ajax({
      url: urlGrooming,
      type: "POST",
      data: formData,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        tableGrooming.ajax.reload();
        $("#modal_create").modal("hide");
        $("#create_Grooming_form")[0].reset();
      },
    });
    $.ajax({
      url: "http://localhost:8080/api/seedling/" + id,
      type: "PUT",
      data: { sisa: sisa_seed },
      dataType: "json",
      success: function (data) {},
    });
  });

  // Edit data Grooming
  $(document).on("click", ".edit-grooming", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlGrooming + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").attr("value", data.data.id);
        $("#seedling_edit option[value='" + data.data.seedling + "']").attr(
          "selected",
          "selected"
        );
        $(
          "#tower_level_edit option[value='" + data.data.tower_level + "']"
        ).attr("selected", "selected");
        $("#terproses_edit").attr("value", data.data.terproses);
        $("#sisa_edit").attr("value", data.data.sisa);
        $("#reject_edit").attr("value", data.data.reject);
        $("#status_edit option[value='" + data.data.status + "']").attr(
          "selected",
          "selected"
        );
      },
    });
    $.ajax({
      url: "http://localhost:8080/api/seedling/",
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (data.data[i].code == $("#seedling_edit").val()) {
            $("#id_seed").attr("value", data.data[i].id);
            $("#jumlah_seed").attr("value", data.data[i].seedling);
          }
        }
      },
    });
  });

  $("#edit_groom").click(function () {
    var sisa_seed = $("#jumlah_seed").val() - $("#terproses_edit").val();
    var id = $("#id_seed").val();
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_Grooming_form").serialize();
    $.ajax({
      url: urlGrooming + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_Grooming_form")[0].reset();
        tableGrooming.ajax.reload();
      },
    });
    $.ajax({
      url: "http://localhost:8080/api/seedling/" + id,
      type: "PUT",
      data: { sisa: sisa_seed },
      dataType: "json",
      success: function (data) {},
    });
  });

  // Delete data Grooming
  $(document).on("click", ".delete-grooming", function (e) {
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
          url: urlGrooming + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableGrooming.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });

  $.ajax({
    url: "http://localhost:8080/api/seedling/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        $("#seedling").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].code +
            "</option>"
        );
        $("#seedling_edit").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].code +
            "</option>"
        );
      }
    },
  });

  $("#seedling").change(function () {
    $.ajax({
      url: "http://localhost:8080/api/seedling/",
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (data.data[i].id == $("#seedling").val()) {
            $("#id_seed").attr("value", data.data[i].id);
            $("#jumlah_seed").attr("value", data.data[i].seedling);
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
            var codeGroom = $("#code").val() + "-" + data.data.name;
            $("#code").attr("value", codeGroom);
          },
        });
      },
    });
  });
});
