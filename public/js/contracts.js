$(document).ready(function () {
    var urlContracts = $("#tableContracts").data("url");
    $.ajax({
      url: urlContracts,
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        var i = 1;
        var tableContracts = $("#tableContracts").DataTable({
          data: data,
          columns: [
            { data: null, title: "No", width: "10%" },
            { data: "company", title: "Company" },
            { data: "startperiod", title: "Start Period" },
            { data: "endperiod", title: "End Period" },
            { data: "partnershipobjective", title: "Partnership Objective" },
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
        tableContracts
          .on("order.dt search.dt", function () {
            tableContracts
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