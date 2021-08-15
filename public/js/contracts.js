var urlContracts = $("#tableContracts").data("url");
let tableContracts = null;
$(document).ready(function () {
  tableContracts = $("#tableContracts").DataTable({
    ajax: urlContracts,
    columns: [
      { data: "coname", title: "Company" },
      { data: "sename", title: "Site" },
      { data: "constart", title: "Start Period" },
      { data: "conend", title: "End Period" },
      { data: "concom", title: "Commitment" },
      { data: "conpart", title: "Partnership" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-contract" title="Edit" data-id="' +
            items.conid +
            '" data-toggle="modal" data-target="#modal_edit"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-contract" title="Delete" data-id="' +
            items.conid +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
  });

  $(document).on("click", ".delete-contract", function (e) {
    e.preventDefault();
    var del_id = $(this).data("id");
    Swal.fire({
      title: "Apakah kamu yakin?",
      text: "Data yang telah terhapus tidak bisa dikembalikan!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, hapus!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: urlContracts + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableContracts.ajax.reload();
          },
          error: function (e) {
            console.log("error", e);
          },
        });
      }
    });
  });

  for (i = 1; i <= 100; i++) {
    $("#commitment").append(
      "<option value='" + i + "'>" + i + " Year" + "</option>"
    );
    $("#commitment_edit").append(
      "<option value='" + i + "'>" + i + " Year" + "</option>"
    );
  }

  $("#add_contract").click(function (e) {
    e.preventDefault();
    var formData = new FormData($("#create_Contract_form")[0]);
    $.ajax({
      url: urlContracts,
      type: "POST",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifAddSuccess();
        $("#modal_create").modal("hide");
        $("#create_Contract_form")[0].reset();
        tableContracts.ajax.reload();
      },
    });
  });

  // Edit data Site
  $(document).on("click", ".edit-contract", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlContracts + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").attr("value", data.data.id);
        $("#company_edit option[value='" + data.data.company + "']").attr(
          "selected",
          "selected"
        );
        $("#site_edit option[value='" + data.data.site + "']").attr(
          "selected",
          "selected"
        );
        $("#start_period_edit").attr("value", data.data.start_period);
        $("#end_period_edit").attr("value", data.data.end_period);
        $(
          "#commitment_edit option[value='" + data.data.commitment_edit + "']"
        ).attr("selected", "selected");
        $(
          "#partnership_edit option[value='" +
            data.data.partnership_objective +
            "']"
        ).attr("selected", "selected");
      },
    });
  });

  $("#edit_contract").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = $("#edit_Contract_form").serialize();
    $.ajax({
      url: urlContracts + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_edit").modal("hide");
        $("#edit_Contract_form")[0].reset();
        tableContracts.ajax.reload();
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

  $.ajax({
    url: "http://localhost/tunasdash/api/sites/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      var i = 0;
      for (i; i <= data.data.length; i++) {
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

  $("#company").change(function () {
    var com = $("#company option:selected").val();
    $.ajax({
      url: "http://localhost/tunasdash/api/sites/",
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        for (var i = 0; i <= data.data.length; i++) {
          if (com == data.data[i].coid) {
            console.log(data.data[i].coid);
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
