var urlActuatorGrowInstallations = $("#tableActuatorGrowInstallations").data("url");
$(document).ready(function () {
  var tableActuatorGrowInstallations = $("#tableActuatorGrowInstallations").DataTable({
    ajax: urlActuatorGrowInstallations,
    columns: [
      { data: "site", title: "Site" },
      { data: "floor", title: "Floor" },
      { data: "device", title: "Devices" },
      { data: "growinstallation", title: "Grow Installations" },
      { data: "watertemperature", title: "Water" },
      { data: "tds", title: "TDS" },
      { data: "ph", title: "PH" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-actsite" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-actsite" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Actions",
      },
    ],
  });

  $("#add_act_sites").click(function () {
    var dataJson = $("#create_ActuatorSites_form").serialize();
    $.ajax({
      url: urlActuatorGrowInstallations,
      type: "POST",
      data: dataJson,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        tableActuatorGrowInstallations.ajax.reload();
        $("#modal_create").modal("hide");
        $("#create_ActuatorSites_form")[0].reset();
      },
    });
  });

  $(document).on("click", ".edit-actsite", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlActuatorGrowInstallations + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").attr("value", data.id);
        $("#site_edit option[value='" + data.site + "']").attr(
          "selected",
          "selected"
        );
        var site_edit = data.site;
        $.ajax({
          url: "http://localhost/tunasdash/api/sites/",
          type: "get",
          async: true,
          dataType: "json",
          success: function (data) {
            for (var i = 0; i <= data.data.length; i++) {
              if (data.data[i].name == site_edit) {
                for (var j = 1; j <= data.data[i].floor; j++) {
                  $("#floor_edit").append(
                    "<option value='" + j + "'>" + j + "</option>"
                  );
                }
              }
            }
          },
        });
        $.ajax({
          url: "http://localhost/tunasdash/api/devices/",
          type: "get",
          async: true,
          dataType: "json",
          success: function (data) {
            for (var i = 0; i <= data.data.length; i++) {
              if (data.data[i].site == site_edit) {
                $("#device_edit").append(
                  "<option value='" +
                    data.data[i].code +
                    "'>" +
                    data.data[i].code +
                    "</option>"
                );
              }
            }
          },
        });
        $("#device_edit option[value='" + data.device + "']").attr(
          "selected",
          "selected"
        );
        $("#ac_start_edit").attr("value", data.ac_start_time);
        $("#ac_end_edit").attr("value", data.ac_end_time);
        $("#light_start_edit").attr("value", data.light_start_time);
        $("#light_end_edit").attr("value", data.light_end_time);
      },
    });
  });

  $("#edit_act_sites").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_ActuatorSites_form").serialize();
    $.ajax({
      url: urlActuatorGrowInstallations + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_ActuatorSites_form")[0].reset();
        tableActuatorGrowInstallations.ajax.reload();
      },
    });
  });

  $(document).on("click", ".delete-actsite", function (e) {
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
          url: urlActuatorGrowInstallations + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableActuatorGrowInstallations.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });
  // Tampil data Sites
  $.ajax({
    url: "http://localhost/tunasdash/api/sites/",
    type: "get",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        $("#site").append(
          "<option value='" +
            data.data[i].name +
            "'>" +
            data.data[i].name +
            "</option>"
        );
        $("#site_edit").append(
          "<option value='" +
            data.data[i].name +
            "'>" +
            data.data[i].name +
            "</option>"
        );
      }
    },
  });

  $("#site").change(function () {
    var site = $("#site option:selected").val();
    $.ajax({
      url: "http://localhost/tunasdash/api/sites/",
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i <= data.data.length; i++) {
          if (data.data[i].name == site) {
            for (var j = 1; j <= data.data[i].floor; j++) {
              $("#floor").append(
                "<option value='" + j + "'>" + j + "</option>"
              );
            }
          }
        }
      },
    });
    $.ajax({
      url: "http://localhost/tunasdash/api/devices/",
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i <= data.data.length; i++) {
          if (data.data[i].site == site) {
            $("#device").append(
              "<option value='" +
                data.data[i].code +
                "'>" +
                data.data[i].code +
                "</option>"
            );
          }
        }
      },
    });
  });
});
