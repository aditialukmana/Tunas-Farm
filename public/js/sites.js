var urlSites = $("#tableSites").data("url");
var url = "http://localhost:8080/public/image_site/";
// Tampil data Sites
$(document).ready(function () {
  var tableSites = $("#tableSites").DataTable({
    ajax: urlSites,
    columns: [
      { data: "secode", title: "Code" },
      { data: "sename", title: "Name" },
      { data: "coname", title: "Company" },
      { data: "setype", title: "Type" },
      { data: "sesubtype", title: "Subtype" },
      { data: "sekota", title: "Kota" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 detail-site" title="Details" data-id="' +
            items.seid +
            '" data-toggle="modal" data-target="#detailModal"><span class="sr-only">Details</span> <i class="fa fa-info"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 edit-site" title="Edit" data-id="' +
            items.seid +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-site" title="Delete" data-id="' +
            items.seid +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
  });

  // Tambah data Sites
  $("#add_site").click(function () {
    var formData = new FormData($("#create_Site_form")[0]);
    $.ajax({
      url: urlSites,
      type: "POST",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifAddSuccess();
        tableSites.ajax.reload();
        $("#modal_create").modal("hide");
        $("#create_Site_form")[0].reset();
      },
    });
  });

  // Edit data Site
  $(document).on("click", ".edit-site", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlSites + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").attr("value", data.data.id);
        $("#name_edit").attr("value", data.data.name);
        $("#company_edit option[value='" + data.data.company + "']").attr(
          "selected",
          "selected"
        );
        $("#site_edit option[value='" + data.data.site + "']").attr(
          "selected",
          "selected"
        );
        $(
          "#building_area_edit option[value='" + data.data.building_area + "']"
        ).attr("selected", "selected");
        $("#address_edit").text(data.data.address);
        $("#jalan_edit").attr("value", data.data.jalan);
        $("#kota_edit").attr("value", data.data.kota);
        $("#provinsi_edit").attr("value", data.data.provinsi);
        $("#lat_edit").attr("value", data.data.latitude);
        $("#long_edit").attr("value", data.data.longtitude);
        $(
          "#building_status_edit option[value='" +
            data.data.building_status +
            "']"
        ).attr("selected", "selected");
        if (data.data.building_status == "rent") {
          $("#rent_period_edit").prop("hidden", false);
          $("#rent_cost_edit").prop("hidden", false);
        } else {
          $("#rent_period_edit").prop("hidden", true);
          $("#rent_cost_edit").prop("hidden", true);
        }
        $("#rent_period_edit").attr("value", data.data.rent_period);
        $("#rent_cost_edit").attr("value", data.data.rent_cost);
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

  // Delete data Site
  $(document).on("click", ".delete-site", function (e) {
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
          url: urlSites + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableSites.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });

  // Tampil data Company
  $.ajax({
    url: "http://localhost:8080/api/companies/",
    type: "get",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i < data.data.length; i++) {
        $("#company").append(
          "<option value='" +
            data.data[i].coid +
            "'>" +
            data.data[i].coname +
            "</option>"
        );
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

  $(document).on("click", ".detail-site", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlSites + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#detailSite").html(
          "<p> Code : " +
            data.data.code +
            "</p>" +
            "<p> Name : " +
            data.data.name +
            "</p>" +
            "<p> Type : " +
            data.data.type +
            "</p>" +
            "<p> Subtype : " +
            data.data.subtype +
            "</p>" +
            "<p> Floor : " +
            data.data.floor +
            "</p>" +
            "<p> Building Area : " +
            data.data.building_area +
            "</p>" +
            "<p> Photo :  <img src='" +
            url +
            data.data.photo +
            "' alt='" +
            data.data.photo +
            "' width='128' height='128' class='img-thumbnail'>  </p>" +
            "<p> Address : " +
            data.data.address +
            "</p>" +
            "<p> Jalan : " +
            data.data.jalan +
            "</p>" +
            "<p> Kota : " +
            data.data.kota +
            "</p>" +
            "<p> Provinsi : " +
            data.data.provinsi +
            "</p>" +
            "<p> Building Status : " +
            data.data.building_status +
            "</p>" +
            "<p> Rent Period : " +
            data.data.rent_period +
            "</p>" +
            "<p> Rent Cost : " +
            data.data.rent_cost +
            "</p>"
        );
      },
    });
  });
});

$(document).ready(function () {
  $("#subtype").change(function () {
    if ($("#subtype").val() == "shophouse") {
      $("#floorr").prop("hidden", false);
    } else {
      $("#floorr").prop("hidden", true);
    }
  });
  $("#subtype_edit").change(function () {
    if ($("#subtype_edit").val() == "shophouse") {
      $("#floorr_edit").prop("hidden", false);
    } else {
      $("#floorr_edit").prop("hidden", true);
    }
  });
  $("#company").change(function () {
    var com = $("#company option:selected").val();
    $.ajax({
      url: "http://localhost:8080/api/companies/" + com,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        console.log(data.data.name);
        $("#code").attr("value", data.data.name);
      },
    });
  });
  $("#building_status").change(function () {
    if ($("#building_status").val() == "rent") {
      $("#period").prop("hidden", false);
      $("#cost").prop("hidden", false);
    } else {
      $("rent_period").val("");
      $("rent_cost").val("");
      $("#period").prop("hidden", true);
      $("#cost").prop("hidden", true);
    }
  });
});
