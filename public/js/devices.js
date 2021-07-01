var urlDevices = $("#tableDevices").data("url");
$(document).ready(function () {
  var tableDevices = $("#tableDevices").DataTable({
    ajax: urlDevices,
    columns: [
      { data: "decode", title: "Code" },
      { data: "sename", title: "Site" },
      { data: "grcode", title: "Grow Installation" },
      {
        data: "destatus",
        title: "Status",
        render: function (data, type, row) {
          if (row["destatus"] === "active") {
            return '<p class="btn btn-primary">' + row["destatus"] + "</p>";
          } else if (row["destatus"] === "inactive") {
            return '<p class="btn btn-secondary">' + row["destatus"] + "</p>";
          }
        },
      },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-device" title="Edit" data-id="' +
            items.deid +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-device" title="Delete" data-id="' +
            items.deid +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
  });

$("#site").change(function () {
    var site = $("#site").find(":selected").text();
    var code = $("#code").val();
    $("#code").attr("value", code+"-"+site);
  });

  $("#site_edit").change(function () {
    var site_edit = $("#site_edit").find(":selected").text();
    var code_edit = $("#code_edit").val();
    $("#code_edit").attr("value", code_edit+"-"+site_edit);
  });

  $("#add_device").click(function () {
    var dataJson = $("#create_Devices_form").serialize();
    console.log(dataJson);
    $.ajax({
      url: urlDevices,
      type: "POST",
      data: dataJson,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        $("#modal_create_device").modal("hide");
        $("#create_Devices_form")[0].reset();
        tableDevices.ajax.reload();
      },
    });
  });

  $.ajax({
    url: "http://localhost/tunasdash/api/sites/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      var i = 0;
      for (i; i <= data.data.length; i++) {
        $("#site").append(
          "<option value='" +
            data.data[i].seid +
            "'>" +
            data.data[i].sename +
            "</option>"
        );
        $("#site_edit").append(
          "<option value='" +
            data.data[i].seid +
            "'>" +
            data.data[i].sename +
            "</option>"
        );
      }
    },
  });

  $.ajax({
    url: "http://localhost/tunasdash/api/growinstallations/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      var i = 0;
      for (i; i <= data.data.length; i++) {
        $("#grow_installation").append(
          "<option value='" +
            data.data[i].grid +
            "'>" +
            data.data[i].grcode +
            "</option>"
        );
        $("#grow_installation_edit").append(
          "<option value='" +
            data.data[i].grid +
            "'>" +
            data.data[i].grcode +
            "</option>"
        );
      }
    },
  });

  // Edit data Device
  $(document).on("click", ".edit-device", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlDevices + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").attr("value", data.data.id); 
        $("#site_edit option[value='" + data.data.site + "']").attr(
          "selected",
          "selected"
        );
        $("#grow_installation_edit option[value='" + data.data.grow_installation + "']").attr(
          "selected",
          "selected"
        );
        $("#status_edit option[value='" + data.data.status + "']").attr(
          "selected",
          "selected"
        );
      },
    });
  });

  $("#edit_device").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_Devices_form").serialize();
    $.ajax({
      url: urlDevices + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_Devices_form")[0].reset();
        tableDevices.ajax.reload();
      },
    });
  });

  // Delete data Device
  $(document).on("click", ".delete-device", function (e) {
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
          url: urlDevices + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableDevices.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });
});
