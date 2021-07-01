// Tampil data Grow Installations
var urlGrow = $("#tableGrow").data("url");
console.log(urlGrow);
var tableGrow = null;
$(document).ready(function () {
  tableGrow = $("#tableGrow").DataTable({
    ajax: urlGrow,
    columns: [
      { data: "grcode", title: "Code" },
      { data: "cuname", title: "Customer" },
      { data: "coname", title: "Company" },
      { data: "grtype", title: "Type" },
      { data: "sename", title: "Site" },
      {
        data: "grstatus",
        title: "Status",
        render: function (data, type, row) {
          if (row["grstatus"] === "active") {
            return (
              '<p class="btn btn-primary">' +
              row["grstatus"] +
              "</p>"
            );
          } else if (row["grstatus"] === "inactive") {
            return (
              '<p class="btn btn-secondary">' +
              row["grstatus"] +
              "</p>"
            );
          }
        },
      },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 detail-grow" title="Details" data-id="' +
            items.grid +
            '" data-toggle="modal" data-target="#detailModal"><span class="sr-only">Details</span> <i class="fa fa-info"></i></a> <a href="javascript:voigrid0);" class="btn btn-default mb-2 edit-grow" title="Edit" data-id="' +
            items.grid +
            '" data-toggle="modal" data-target="#modal_update"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-grow" title="Delete" data-id="' +
            items.grid +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
  });

  $("#add_grow").click(function () {
    var dataJson = $("#create_Grow_form").serialize();
    $.ajax({
      url: urlGrow,
      type: "POST",
      data: dataJson,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        tableGrow.ajax.reload();
        $("#modal_create").modal("hide");
        $("#create_Grow_form")[0].reset();
      },
    });
  });

  $(document).on("click", ".edit-grow", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlGrow + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").attr("value", data.id);
        $("#customer_edit option[value='" + data.customer + "']").attr(
          "selected",
          "selected"
        );
        $("#company_edit option[value='" + data.company + "']").attr(
          "selected",
          "selected"
        );
        $("#type_edit option[value='" + data.type + "']").attr(
          "selected",
          "selected"
        );
        $("#lvl_count_edit").attr("value", data.level_count);
        $("#lvl_hole_edit").attr("value", data.level_hole);
        $("#site_edit option[value='" + data.site + "']").attr(
          "selected",
          "selected"
        );
        $("#floor_edit").attr("value", data.floor);
        $("#status_edit option[value='" + data.status + "']").attr(
          "selected",
          "selected"
        );

        if ($("#type_edit").val() == "tower" || $("#type_edit").val() == "home kit") {
          $("#grow_count_edit").prop("hidden", false);
          $("#grow_hole_edit").prop("hidden", false);
        } else {
          $("#grow_count_edit").prop("hidden", true);
          $("#grow_hole_edit").prop("hidden", true);
        }
        if ($("#type_edit").val() == "flat bed") {
          $("#grow_holes_edit").prop("hidden", false);
        } else {
          $("#grow_holes_edit").prop("hidden", true);
        }
        if ($("#type_edit").val() == "flat bed" || $("#type_edit").val() == "tower") {
          $("#grow_sites_edit").prop("hidden", false);
        } else {
          $("#grow_sites_edit").prop("hidden", true);
        }
      },
    });
  });

  $("#edit_site").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_Site_form").serialize();
    $.ajax({
      url: urlSites + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_Site_form")[0].reset();
        tableSites.ajax.reload();
      },
    });
  });

  $(document).on("click", ".delete-grow", function (e) {
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
          url: urlGrow + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableGrow.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });

  $(document).on("click", ".detail-grow", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlGrow + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#detailGrow").html(
          "<p> Code : " +
            data.code +
            "</p>" +
            "<p> Customer : " +
            data.customer +
            "</p>" +
            "<p> Company : " +
            data.company +
            "</p>" +
            "<p> Type : " +
            data.type +
            "</p>" +
            "<p> Level Count : " +
            data.level_count +
            "</p>" +
            "<p> Level Holes : " +
            data.level_hole +
            "</p>" +
            "<p> Holes : " +
            data.hole +
            "</p>" +
            "<p> Site : " +
            data.site +
            "</p>" +
            "<p> Floor : " +
            data.floor +
            "</p>" +
            "<p> Status : " +
            data.status +
            "</p>"
        );
      },
    });
  });
  $.ajax({
    url: "http://localhost/tunasdash/api/companies/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      var i = 0;
      for (i; i <= data.data.length; i++) {
        $("#company_edit").append(
          "<option value='" +
            data.data[i].coid +
            "'>" +
            data.data[i].coname +
            "</option>"
        );
      }
    },
  });

  $("#type").change(function () {
    var type = $("#type").find(":selected").val();
    var code = $("#code").val();
    $("#code").attr("value", code+"-"+type);
  });
});

// Tampil data Customer
$(document).ready(function () {
  $.ajax({
    url: "http://localhost/tunasdash/api/customers",
    type: "get",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        $("#customer").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].name +
            "</option>"
        );
        $("#customer_edit").append(
          "<option value='" +
            data.data[i].id +
            "'>" +
            data.data[i].name +
            "</option>"
        );
      }
    },
  });
});

// Tampil data Company
$(document).ready(function () {
  $("select").change(function () {
    var customer = $("#customer").find(":selected").val();
    $.ajax({
      url: "http://localhost/tunasdash/api/companies/",
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (customer == data.data[i].cuid) {
            $("#company").append(
              "<option value='" +
                data.data[i].coid +
                "'>" +
                data.data[i].coname +
                "</option>"
            );
          }
        }
      },
    });
  });
});

// Tampil data Sites
$(document).ready(function () {
  $("select").change(function () {
    var company = $("#company").find(":selected").val();
    $.ajax({
      url: "http://localhost/tunasdash/api/sites/",
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (company == data.data[i].coid) {
            $("#site").append(
              "<option value='" +
                data.data[i].seid +
                "'>" +
                data.data[i].sename +
                "</option>"
            );
          }
        }
      },
    });
  });
});

$(document).ready(function () {
  $("#type").change(function () {
    if ($("#type").val() == "tower" || $("#type").val() == "home kit") {
      $("#grow_count").prop("hidden", false);
      $("#grow_hole").prop("hidden", false);
    } else {
      $("#grow_count").prop("hidden", true);
      $("#grow_hole").prop("hidden", true);
    }
    if ($("#type").val() == "flat bed") {
      $("#grow_holes").prop("hidden", false);
    } else {
      $("#grow_holes").prop("hidden", true);
    }
    if ($("#type").val() == "flat bed" || $("#type").val() == "tower") {
      $("#grow_sites").prop("hidden", false);
    } else {
      $("#grow_sites").prop("hidden", true);
    }
  });
});

// Cek Shophouse
$(document).ready(function () {
  $("select").change(function () {
    var sites = $("#sites").find(":selected").val();
    $.ajax({
      url: "http://localhost/tunasdash/api/sites/",
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i < data.data.length; i++) {
          if (sites == data.data[i].name) {
            if (data.data[i].subtype == "shophouse") {
              $("#grow_floor").prop("hidden", false);
              $("#grow_floor_edit").prop("hidden", false);
            } else {
              $("#grow_floor").prop("hidden", true);
              $("#grow_floor_edit").prop("hidden", true);
            }
            
          }
        }
      },
    });
  });
});
