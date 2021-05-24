$(document).ready(function () {
    var urlCustomers = $("#tableCustomers").data("url");
    $.ajax({
      url: urlCustomers,
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        var i = 1;
        var tableCustomers = $("#tableCustomers").DataTable({
          data: data,
          columns: [
            { data: null, title: "No", width: "10%" },
            { data: "name", title: "Name" },
            { data: "phone", title: "Phone" },
            { data: "email", title: "Email" },
            { data: "company", title: "Company" },
            {
              data: (items) => {
                return (
                  '<a href="javascript:void(0);" class="btn btn-primary mb-2 detail-customer" title="Details" data-id="' +
                  items.id +
                  '" data-toggle="modal" data-target="#detailModal"><span class="sr-only">Details</span> <i class="fa fa-info"></i></a> <a href="javascript:void(0);" class="btn btn-success mb-2" title="Edit" data-id="' +
                  items.id +
                  '" data-toggle="modal" data-target="#modal_update"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></a> <a href="javascript:void(0);" class="btn btn-danger mb-2 delete-customer" title="Delete" data-id="' +
                  items.id +
                  '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></a>'
                );
              },
              title: "Action",
            },
          ],
          order: [[1, "asc"]],
        });
        tableCustomers
          .on("order.dt search.dt", function () {
            tableCustomers
              .column(0, { search: "applied", order: "applied" })
              .nodes()
              .each(function (cell, i) {
                cell.innerHTML = i + 1;
              });
          })
          .draw();
      },
    });
  });


  function tambahCustomer() {
    $(document).ready(function () {
      $("#create_Customer_form").on("submit", function () {
        var dataJson = {
          [csrfName]: csrfHash,
          name: $("#name").val(),
          addres: $("#address").val(),
          phone: $("#phone").val(),
          company: $("#email").val(),
          status: $("#company").val(),
          investment: $("#investment").val(),
        };
  
        $.ajax({
          url: "http://localhost/tunasdash/api/customers",
          type: "post",
          data: dataJson,
          dataType: "json",
          success: function (data) {
            console.log(data);
          },
        });
      });
    });
  }
  



    $(document).ready(function () {
      $(document).on("click", ".detail-customer", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
          url: "http://localhost/tunasdash/api/customers/" + id,
          type: "get",
          async: true,
          dataType: "json",
          success: function (data) {
            $("#detailCustomer").html(
              "<p> Nama : " +
                data.name +
                "</p>" +
                "<p> Address : " +
                data.address +
                "</p>" +
                "<p> Phone : " +
                data.phone +
                "</p>" +
                "<p> Email : " +
                data.email +
                "</p>" +
                "<p> Company : " +
                data.company +
                "</p>" +
                "<p> Investment : " +
                data.investment +
                "</p>"
            );
            console.log(data);
          },
        });
      });
    });



    $(document).ready(function () {
      $(document).on("click", ".delete-customer", function (e) {
        e.preventDefault();
        var del_id = $(this).data("id");
        Swal.fire({
          title: "Apakah kamu yakin?",
          text: "User yang telah terhapus tidak bisa dikembalikan!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, hapus!",
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "http://localhost/tunasdash/api/customers/" + del_id,
              type: "DELETE",
              data: { id: del_id },
              async: true,
              dataType: "json",
              success: function (response) {
              },
            });
            Swal.fire("Terhapus!", "User telah dihapus.", "success");
            window.location.reload();
          }
        });
      });
    });
    