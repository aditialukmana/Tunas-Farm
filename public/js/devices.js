var urlDevices = $("#tableDevices").data("url");
$(document).ready(function () {
  var tableDevices = $("#tableDevices").DataTable({
    ajax: urlDevices,
    columns: [
      { data: "code", title: "Code" },
      { data: "site", title: "Site" },
      { data: "grow_installation", title: "Grow Installation" },
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
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-device" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-device" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
  });

  $("#site").change(function () {
    var site = $("#site").find(":selected").val();
    var code = $("#code").val();
    $("#code").attr("value", code+"-"+site);
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
    url: "http://localhost:8080/api/sites/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      var i = 0;
      for (i; i <= data.data.length; i++) {
        $("#site").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].name +
            "</option>"
        );
        $("#site_edit").append(
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
    url: "http://localhost:8080/api/growinstallations/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      var i = 0;
      for (i; i <= data.data.length; i++) {
        $("#grow_installation").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].code +
            "</option>"
        );
        $("#grow_installation_edit").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].code +
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
        $("#edit_id").attr("value", data.id); 
        $("#site_edit option[value='" + data.site + "']").attr(
          "selected",
          "selected"
        );
        $("#grow_installation_edit option[value='" + data.grow_installation + "']").attr(
          "selected",
          "selected"
        );
        $("#status_edit option[value='" + data.status + "']").attr(
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
