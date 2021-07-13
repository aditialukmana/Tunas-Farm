var urlPrivilegeSettings = $("#tablePrivilegeSettings").data("url");
var tablePrivilegeSettings = null;
$(document).ready(function () {
  tablePrivilegeSettings = $("#tablePrivilegeSettings").DataTable({
    ajax: urlPrivilegeSettings,
    columns: [
      { data: "roles", title: "Roles" },
      {
        data: (items) => {
          return (
            '<a href="javascript:void(0);" class="btn btn-default mb-2 edit-privilege" title="Edit" data-id="' +
            items.id +
            '" data-toggle="modal" data-target="#modal_update_privilege"><span class="sr-only">Edit</span> <i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="btn btn-default mb-2 delete-privilege" title="Delete" data-id="' +
            items.id +
            '"><span class="sr-only">Delete</span> <i class="fa fa-trash-o text-danger"></i></a>'
          );
        },
        title: "Actions ",
      },
    ],
    order: [[1, "desc"]],
  });
});
