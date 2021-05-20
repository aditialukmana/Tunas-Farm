$(document).ready(function () {
  var urlCompanies = $("#tableCompanies").data("url");
  $.ajax({
    url: urlCompanies,
    type: "get",
    async: true,
    dataType: "json",
    success: function (data) {
      var i = 1;
      var tableCompanies = $("#tableCompanies").DataTable({
        data: data,
        columns: [
          { data: null, title: "No", width: "10%" },
          { data: "name", title: "Name" },
          { data: "phone", title: "Phone" },
          { data: "email", title: "Email" },
          {
            data: (items) => {
              return (
                '<a href="javascript:void(0);" class="btn btn-primary mb-2 detail-company" title="Details" data-id="' +
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
      tableCompanies
        .on("order.dt search.dt", function () {
          tableCompanies
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

function tambahCompany() {
  $(document).ready(function () {
    $("#create_Companies_form").on("submit", function () {
      var dataJson = {
        [csrfName]: csrfHash,
        prefix_code: $("#name").val(),
        name: $("#name").val(),
        addres: $("#address").val(),
        phone: $("#phone").val(),
        email: $("#email").val(),
      };

      $.ajax({
        url: "http://localhost/tunasfarm/api/companies",
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
  $(document).on("click", ".detail-company", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      url: "http://localhost/tunasfarm/api/companies/" + id,
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        $("#detailCompany").html(
          "<p> Prefix Code : " +
            data.prefix_code +
            "</p>" +
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
            "</p>"
        );
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
          url: "http://localhost/tunasfarm/api/customers/" + del_id,
          type: "DELETE",
          data: { id: del_id },
          async: true,
          dataType: "json",
          success: function (response) {},
        });
        Swal.fire("Terhapus!", "User telah dihapus.", "success");
        window.location.reload();
      }
    });
  });
});
