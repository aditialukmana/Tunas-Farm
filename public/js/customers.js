var urlCustomers = $("#tableCustomers").data("url");
var tableCustomers = null;
$(document).ready(function () {
  tableCustomers = $("#tableCustomers").DataTable({
    ajax: urlCustomers,
    columns: [
      { data: "name", title: "Name" },
      { data: "phone", title: "Phone" },
      { data: "email", title: "Email" },
      { data: "investment", title: "Investment Character" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 detail-customer" title="Details" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#detailModal"><span class="sr-only">Details</span> <i class="fa fa-info"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 edit-customer" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_update_customer"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-customer" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Action",
      },
    ],
  });

  $("#add_customer").click(function () {
    var dataJson = $("#create_Customer_form").serialize();
    $.ajax({
      url: urlCustomers,
      type: "POST",
      data: dataJson,
      dataType: "json",
      success: function (data) {
        notifAddSuccess();
        $("#modal_create_customer").modal("hide");
        $("#create_Customer_form")[0].reset();
        tableCustomers.ajax.reload();
      },
    });
  });

  $(document).on("click", ".edit-customer", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlCustomers + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#edit_id").attr("value", data.data.id);
        $("#name_edit").attr("value", data.data.name);
        $("#address_edit").text(data.data.address);
        $("#phone_edit").attr("value", data.data.phone);
        $("#email_edit").attr("value", data.data.email);
        $("select option[value='" + data.data.investment + "']").attr(
          "selected",
          "selected"
        );
      },
    });
  });

  $("#edit_customer").click(function () {
    var edit_id = $("#edit_id").val();
    var dataJson = $("#update_Customer_form").serialize();
    $.ajax({
      url: urlCustomers + "/" + edit_id,
      type: "PUT",
      data: dataJson,
      dataType: "json",
      success: function (data) {
        notifUpdateSuccess();
        $("#modal_update_customer").modal("hide");
        $("#update_Customer_form")[0].reset();
        tableCustomers.ajax.reload();
      },
    });
  });

  $(document).on("click", ".delete-customer", function (e) {
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
          url: urlCustomers + "/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {
            notifDeleteSuccess();
            tableCustomers.ajax.reload();
          },
        });
      }
    });
  });

  $(document).on("click", ".detail-customer", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: urlCustomers + "/" + id,
      type: "GET",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#detailCustomer").html(
          "<p> Name : " +
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
            "</p>" +
            "<p> Investment Character : " +
            data.data.investment +
            "</p>"
        );
      },
    });
  });
});
