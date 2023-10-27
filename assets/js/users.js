jQuery(document).ready(function () {
    $('#userlist').DataTable({
        "processing": true,
        "serverSide": true,
        "columns": [
            {
                data: "userId", name: "tbl_users.userId", "orderable": false, "searchble": false
            },
            {
                data: "name", name: "tbl_users.name"
            }
            ,
            {
                data: "email", name: "tbl_users.email"
            },
            {
                data: "mobile", name: "tbl_users.mobile"
            },
            {
                data: "role", name: "tbl_roles.role"
            },
            {
                data: "createdDtm", name: "tbl_users.createdDtm"
            },
            {
                data: "status", name: "tbl_users.status"
            },
            {
                data: "action", name: "action"
            }
        ],
        "ajax": {
            "url": base_url,
            "type": "POST",
            "data": { [tokenname]: get_csrf_hash }
        },
    });
});