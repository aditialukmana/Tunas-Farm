$(document).ready(function () { 
    $.ajax({
      url: $("#tableRoles").data("url"),
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        var i = 1;
        var tableUsers = $("#tableRoles").DataTable({
          data: data,
          columns: [
            { data: null, title: "No", width: "10%" },
            { data: "code", title: "Role ID" },
            { data: "name", title: "Name" },
            {
              data: (items) => {
                return (
                  '<a href="javascript:void(0);" class="btn btn-primary mb-2 detail-user" title="Details" data-id="' +
                  items.id +
                  '" data-toggle="modal" data-target="#detailModal"><span class="sr-only">Details</span> <i class="fa fa-info"></i></a> <a href="javascript:void(0);" onclick="return editUser();" class="btn btn-success mb-2" title="Edit" data-id="' +
                  items.id +
                  '" data-toggle="modal" data-target="#modal_update"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></a> <a href="javascript:void(0);" class="btn btn-danger mb-2 delete-user" title="Delete" data-id="' +
                  items.id +
                  '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></a>'
                );
              },
              title: "Action",
            },
          ],
          order: [[1, "asc"]],
        });
        tableUsers
          .on("order.dt search.dt", function () {
            tableUsers
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



  function tambahRoles() {
    $(document).ready(function () {
      $("#create_Role_form").on("submit", function () {
        var dataJson = {
          [csrfName]: csrfHash,
          name: $("#role_name").val(),
          code: $("#role_id").val(),
        };
  
        $.ajax({
          url: "http://localhost/tunasfarm/api/roles",
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
  