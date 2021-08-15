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

  $("#terproses").change(function () {
    var terproses = $("#terproses").val();
    $("#sisa").attr("value", terproses);
  });

  // Tambah data Transplanting
  $("#add_trans").click(function () {
    var sisa_groom = $("#jumlah_groom").val() - $("#terproses").val();
    if (sisa_groom < 0) {
      notifSisaMinus();
    } else {
      if (sisa_groom == 0) {
        var statuss = "inactive";
      } else {
        var statuss = "active";
      }
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
        url: "http://localhost/tunasdash/api/grooming/" + id,
        type: "PUT",
        data: { sisa: sisa_groom, status: statuss },
        dataType: "json",
        success: function (data) {},
      });
    }
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
      url: urlTransplanting + "/" + id_status,
      type: "PUT",
      data: dataStatus,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifStatusSuccess();
        tableTransplanting.ajax.reload();
      },
    });
  });

  $.ajax({
    url: "http://localhost/tunasdash/api/grooming/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        if (data.data[i].grstatus == "active") {
          $("#grooming").append(
            "<option value='" +
              data.data[i].grcode +
              "'>" +
              data.data[i].grcode +
              "</option>"
          );

          $("#grooming_edit").append(
            "<option value='" +
              data.data[i].grcode +
              "'>" +
              data.data[i].grcode +
              "</option>"
          );
        }

        $("#tower_level").append(
          "<option value='" +
            data.data[i].grtwrlvl +
            "'>" +
            data.data[i].grtwrlvl +
            "</option>"
        );
        $("#tower_level_edit").append(
          "<option value='" +
            data.data[i].grtwrlvl +
            "'>" +
            data.data[i].grtwrlvl +
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
        $(
          "#tower_level_edit option[value='" + data.data.tower_level + "']"
        ).attr("selected", "selected");
        $("#terproses_edit").attr("value", data.data.terproses);
        $("#sisa_edit").attr("value", data.data.sisa);
        $("#tanggal_edit").val(data.data.tanggal);
      },
    });
    $.ajax({
      url: "http://localhost/tunasdash/api/grooming/",
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (data.data[i].grcode == $("#grooming_edit").val()) {
            $("#id_groom").attr("value", data.data[i].grid);
            $("#jumlah_groom").attr("value", data.data[i].grterproses);
          }
        }
      },
    });
  });

  $("#edit_trans").click(function () {
    var sisa_groom = $("#jumlah_groom").val() - $("#terproses_edit").val();
    if (sisa_groom == 0) {
      var statuss = "inactive";
    } else {
      var statuss = "active";
    }
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
      url: "http://localhost/tunasdash/api/grooming/" + id,
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
      url: "http://localhost/tunasdash/api/grooming/",
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (data.data[i].grcode == $("#grooming").val()) {
            $("#id_groom").attr("value", data.data[i].grid);
            $("#jumlah_groom").attr("value", data.data[i].grterproses);
            $("#id_tanaman").attr("value", data.data[i].grtanaman);
            $(
              "#tower_level option[value='" + data.data[i].grtwrlvl + "']"
            ).attr("selected", "selected");
            $("#terproses").attr("value", data.data[i].grsisa);
            $("#sisa").attr("value", data.data[i].grsisa);
          }
        }
        var id_tanaman = $("#id_tanaman").val();
        $.ajax({
          url: "http://localhost/tunasdash/api/planttypes/" + id_tanaman,
          type: "GET",
          async: true,
          dataType: "json",
          success: function (data) {
            var codeTrans = $("#code").val() + "-" + data.data.name;
            $("#code").attr("value", codeTrans);
          },
        });
      },
    });
  });
});
