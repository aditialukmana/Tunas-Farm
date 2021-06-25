var urlCompanies = $("#tableCompanies").data("url");
$(document).ready(function () {
  var tableCompanies = $("#tableCompanies").DataTable({
    ajax: urlCompanies,
    columns: [
      { data: "coname", title: "Name" },
      { data: "cuname", title: "Customer" },
      { data: "cophone", title: "Phone" },
      { data: "coemail", title: "Email" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 detail-company" title="Details" data-id="' +
            items.coid +
            '" data-toggle="modal" data-target="#detailModal"><span class="sr-only">Details</span> <i class="fa fa-info"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 edit-company" title="Edit" data-id="' +
            items.coid +
            '" data-toggle="modal" data-target="#modal_update_company"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-company" title="Delete" data-id="' +
            items.coid +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
  });

  $("#test").click(function() {
    notifAddSuccess();
  });

  $("#add_company").click(function () {
    var dataJson = $("#create_Company_form").serialize();
    $.ajax({
      url: urlCompanies,
      type: "POST",
      data: dataJson,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        $("#modal_create").modal("hide");
        $("#create_Company_form")[0].reset();
        tableCompanies.ajax.reload();
      },
    });
  });

  $(document).on("click", ".edit-company", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlCompanies + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").attr("value", data.data.id);
        $("#name_edit").attr("value", data.data.name);
        $("#address_edit").text(data.data.address);
        $("select option[value='" + data.data.customer + "']").attr(
          "selected",
          "selected"
        );
        $("#phone_edit").attr("value", data.data.phone);
        $("#email_edit").attr("value", data.data.email);
      },
    });
  });

  $("#edit_company").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = $("#update_Company_form").serialize();
    $.ajax({
      url: urlCompanies + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_update_company").modal("hide");
        $("#update_Company_form")[0].reset();
        tableCompanies.ajax.reload();
      },
    });
  });

  $(document).ready(function () {
    $(document).on("click", ".delete-company", function (e) {
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
            url: urlCompanies + "/" + del_id,
            type: "delete",
            async: true,
            dataType: "json",
            success: function (response) {
              notifDeleteSuccess();
              tableCompanies.ajax.reload();
            },
          });
        }
      });
    });
  });
});

$(document).ready(function () {
  $(document).on("click", ".detail-company", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlCompanies + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#detailCompany").html(
          "<p> Prefix Code : " +
            data.data.prefix_code +
            "</p>" +
            "<p> Nama : " +
            data.data.name +
            "</p>" +
            "<p> Address : " +
            data.data.address +
            "</p>" +
            "<p> Phone : " +
            data.data.phone +
            "</p>" +
            "<p> Email : " +
            data.data.email +
            "</p>"
        );
      },
    });
  });
});

$(document).ready(function () {
  $.ajax({
    url: "http://localhost:8080/api/customers/",
    type: "GET",
    async: true,
    dataType: "json",
    success: function (data) {
      for (var i = 0; i <= data.data.length; i++) {
        $("#customer").append(
          "<option value='" + data.data[i].id + "'>" + data.data[i].name + "</option>"
        );
        $("#customer_edit").append(
          "<option value='" + data.data[i].id + "'>" + data.data[i].name + "</option>"
        );
      }
    },
  });
});
