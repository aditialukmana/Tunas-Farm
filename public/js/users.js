$(document).ready(function () { 
    $.ajax({
      url: $("#tableUsers").data("url"),
      type: "get",
      async: true,
      dataType: "json",
      success: function (data) {
        var i = 1;
        var tableUsers = $("#tableUsers").DataTable({
          data: data,
          columns: [
            { data: null, title: "No", width: "10%" },
            { data: "name", title: "Name" },
            {
              data: "status",
              title: "Status",
              render: function (data, type, row) {
                if (row["status"] === "active") {
                  return (
                    '<button class="btn btn-outline-primary btn-block">' +
                    row["status"] +
                    "</button>"
                  );
                } else if (row["status"] === "inactive") {
                  return (
                    '<button class="btn btn-outline-warning btn-block">' +
                    row["status"] +
                    "</button>"
                  );
                } else if (row["status"] === "") {
                  return '<button class="btn btn-outline-danger btn-block"> Status Kosong</button>';
                }
              },
            },
            { data: "role", title: "Role" },
            {
              data: (items) => {
                return (
                  '<a href="javascript:void(0);" class="btn btn-primary mb-2 detail-user" title="Details" data-id="' +
                  items.id +
                  '" data-toggle="modal" data-target="#detailModal"><span class="sr-only">Details</span> <i class="fa fa-info"></i></a> <a href="javascript:void(0);" class="btn btn-success mb-2 edit-user" title="Edit" data-id="' +
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
  
  $(document).ready(function () {
    $(document).on("click", ".detail-user", function (e) {
      e.preventDefault();
      console.log(123);
      var id = $(this).data("id");
      $.ajax({
        url: "http://localhost/tunasdash/api/users/" + id,
        type: "get",
        async: true,
        dataType: "json",
        success: function (data) {
          $("#detailUser").html(
            "<p> Nama : " +
              data.name +
              "</p>" +
              "<p> Username : " +
              data.username +
              "</p>" +
              "<p> Email : " +
              data.email +
              "</p>" +
              "<p> Status : " +
              data.status +
              "</p>" +
              "<p> Role : " +
              data.role +
              "</p>"
          );
        },
      });
    });
  });
  
  function tambahUser() {
    $(document).ready(function () {
      $("#create_User_form").on("submit", function () {
        var dataJson = {
          [csrfName]: csrfHash,
          username: $("#username").val(),
          name: $("#name").val(),
          password: $("#password").val(),
          email: $("#email").val(),
          status: $("#status").val(),
          role: $("#role").val(),
        };
  
        $.ajax({
          url: "http://localhost/tunasdash/api/users",
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
      $(document).on("click", ".edit-user", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $("#update_User_form").attr(
          "action",
          "http://localhost/tunasdash/api/users/update/" + id
        );
        $.ajax({
          url: "http://localhost/tunasdash/api/users/" + id,
          type: "get",
          async: true,
          dataType: "json",
          success: function (data) {
            $("#username_edit").attr("value", data.username);
            $("#name_edit").attr("value", data.name);
            $("#password_edit").attr("value", data.password);
            $("#email_edit").attr("value", data.email);
            $("#status_edit").attr("value", data.status);
            $("#role_edit").attr("value", data.role);
          },
        });
      });
    });


  
  function updateUser() {
    $(document).ready(function () {
      var dataJson = {
        [csrfName]: csrfHash,
        username: $("#username_edit").val(),
        name: $("#name_edit").val(),
        password: $("#password_edit").val(),
        email: $("#email_edit").val(),
        status: $("#status_edit").val(),
        role: $("#role_edit").val(),
      };
      $("a").click(function () {
        var edit_id = $(this).data("id");
        $("#update_User_form").click("#butUpdate", function () {
          var settings = {
            url: "http://localhost/tunasdash/api/users/update/" + edit_id,
            method: "POST",
            data: dataJson,
            dataType: "json"
          };
  
          $.ajax(settings).done(function (response) {
            console.log(response);
          });
        });
      });
    });
  }
  
  $(document).ready(function () {
    $(document).on("click", ".delete-user", function (e) {
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
            url: "http://localhost/tunasdash/api/users/" + del_id,
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
  