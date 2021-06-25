var urlTransplanting = $("#tableTransplanting").data("url");
var tableTransplanting = null;
$(document).ready(function () {
  tableTransplanting = $("#tableTransplanting").DataTable({
    ajax: urlTransplanting,
    columns: [
      { data: "code", title: "Code" },
      { data: "grooming", title: "Grooming" },
      { data: "tower_level", title: "Tower & Level" },
      { data: "tanggal", title: "Tanggal" },
      { data: "terproses", title: "terproses" },
      { data: "sisa", title: "sisa" },
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
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-transplanting" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-transplanting" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
    order: [[1, "asc"]],
  });
  // Tambah data Transplanting
  $("#add_trans").click(function () {
    var sisa_groom = $("#jumlah_groom").val() - $("#terproses").val();
    var formData = $("#create_Transplanting_form").serialize();
    var id = $("#id_groom").val();
    $.ajax({
      url: urlTransplanting,
      type: "POST",
      data: formData,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        tableTransplanting.ajax.reload();
        $("#modal_create").modal("hide");
        $("#create_Transplanting_form")[0].reset();
      },
    });
    $.ajax({
      url: "http://localhost:8080/api/grooming/" + id,
      type: "PUT",
      data: { sisa: sisa_groom },
      dataType: "json",
      success: function (data) {},
    });
  });

  $.ajax({
    url: "http://localhost:8080/api/grooming/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        $("#grooming").append(
          "<option value='" +
            data.data[i].code +
            "'>" +
            data.data[i].code +
            "</option>"
        );
        $("#tower_level").append(
          "<option value='" +
            data.data[i].tower_level +
            "'>" +
            data.data[i].tower_level +
            "</option>"
        );
        $("#grooming_edit").append(
          "<option value='" +
            data.data[i].code +
            "'>" +
            data.data[i].code +
            "</option>"
        );
        $("#tower_level_edit").append(
          "<option value='" +
            data.data[i].tower_level +
            "'>" +
            data.data[i].tower_level +
            "</option>"
        );
      }
    },
  });

  // Edit data Transplanting
  $(document).on("click", ".edit-transplanting", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlTransplanting + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").attr("value", data.data.id);
        $("#grooming_edit option[value='" + data.data.grooming + "']").attr(
          "selected",
          "selected"
        );
        $("#tower_level_edit option[value='" + data.data.tower_level + "']").attr(
          "selected",
          "selected"
        );
        $("#terproses_edit").attr("value", data.data.terproses);
        $("#sisa_edit").attr("value", data.data.sisa);
        $("#status_edit option[value='" + data.data.status + "']").attr(
          "selected",
          "selected"
        );
      },
    });
    $.ajax({
      url: "http://localhost:8080/api/grooming/",
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (data.data[i].code == $("#grooming_edit").val()) {
            $("#id_groom").attr("value", data.data[i].id);
            $("#jumlah_groom").attr("value", data.data[i].terproses);
          }
        }
      },
    });
  });

  $("#edit_trans").click(function () {
    var sisa_groom = $("#jumlah_groom").val() - $("#terproses_edit").val();
    var id = $("#id_groom").val();
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_Transplanting_form").serialize();
    $.ajax({
      url: urlTransplanting + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_Transplanting_form")[0].reset();
        tableTransplanting.ajax.reload();
      },
    });
    $.ajax({
      url: "http://localhost:8080/api/grooming/" + id,
      type: "PUT",
      data: { sisa: sisa_groom },
      dataType: "json",
      success: function (data) {},
    });
  });

  // Delete data Grooming
  $(document).on("click", ".delete-transplanting", function (e) {
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
          url: urlTransplanting + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableTransplanting.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });

  $("#grooming").change(function () {
    $.ajax({
      url: "http://localhost:8080/api/grooming/",
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (data.data[i].code == $("#grooming").val()) {
            $("#id_groom").attr("value", data.data[i].id);
            $("#jumlah_groom").attr("value", data.data[i].terproses);
            $("#id_tanaman").attr("value", data.data[i].id_tanaman);
            $("#tower_level option[value='" + data.building_area + "']").attr(
              "selected",
              "selected"
            );
          }
        }
        var id_tanaman = $("#id_tanaman").val();
        $.ajax({
          url: "http://localhost:8080/api/planttypes/" + id_tanaman,
          type: "GET",
          async: true,
          dataType: "json",
          success: function (data) {
            var codeTrans = $("#code").val() + "-" + data.name;
            $("#code").attr("value", codeTrans);
          },
        });
      },
    });
  });
});
