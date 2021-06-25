var urlHarvesting = $("#tableHarvesting").data("url");
var tableHarvesting = null;
$(document).ready(function () {
  tableHarvesting = $("#tableHarvesting").DataTable({
    ajax: urlHarvesting,
    columns: [
      { data: "code", title: "Code" },
      { data: "transplanting", title: "Transplanting" },
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
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-harvesting" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-harvesting" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
    order: [[1, "asc"]],
  });
  // Tambah data harvesting
  $("#add_harvest").click(function () {
    var sisa_trans = $("#jumlah_trans").val() - $("#terproses").val();
    var formData = $("#create_Harvesting_form").serialize();
    var id = $("#id_trans").val();
    $.ajax({
      url: urlHarvesting,
      type: "POST",
      data: formData,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        tableHarvesting.ajax.reload();
        $("#modal_create").modal("hide");
        $("#create_Harvesting_form")[0].reset();
      },
    });
    $.ajax({
      url: "http://localhost:8080/api/transplanting/" + id,
      type: "PUT",
      data: { sisa: sisa_trans },
      dataType: "json",
      success: function (data) {},
    });
  });

  $.ajax({
    url: "http://localhost:8080/api/transplanting/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        $("#transplanting").append(
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
        $("#transplanting_edit").append(
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

  // Edit data harvesting
  $(document).on("click", ".edit-harvesting", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlHarvesting + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").attr("value", data.data.id);
        $(
          "#transplanting_edit option[value='" + data.data.transplanting + "']"
        ).attr("selected", "selected");
        $("#terproses_edit").attr("value", data.data.terproses);
        $("#sisa_edit").attr("value", data.data.sisa);
        $("#status_edit option[value='" + data.data.status + "']").attr(
          "selected",
          "selected"
        );
      },
    });
    $.ajax({
      url: "http://localhost:8080/api/transplanting/",
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (data.data[i].code == $("#transplanting_edit").val()) {
            $("#id_trans").attr("value", data.data[i].id);
            $("#jumlah_trans").attr("value", data.data[i].terproses);
          }
        }
      },
    });
  });

  $("#edit_harvest").click(function () {
    var sisa_trans = $("#jumlah_trans").val() - $("#terproses_edit").val();
    var id = $("#id_trans").val();
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_Harvesting_form").serialize();
    $.ajax({
      url: urlHarvesting + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_Harvesting_form")[0].reset();
        tableHarvesting.ajax.reload();
      },
    });
    $.ajax({
      url: "http://localhost:8080/api/transplanting/" + id,
      type: "PUT",
      data: { sisa: sisa_trans },
      dataType: "json",
      success: function (data) {},
    });
  });

  // Delete data transplanting
  $(document).on("click", ".delete-harvesting", function (e) {
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
          url: urlHarvesting + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableHarvesting.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });

  $("#transplanting").change(function () {
    $.ajax({
      url: "http://localhost:8080/api/transplanting/",
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (data.data[i].code == $("#transplanting").val()) {
            $("#id_trans").attr("value", data.data[i].id);
            $("#jumlah_trans").attr("value", data.data[i].terproses);
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
            var codeTrans = $("#code").val() + "-" + data.name;
            $("#code").attr("value", codeTrans);
          },
        });
      },
    });
  });
});
