$(document).ready(function () {
    if (action == 'add') {
        var adduserlanguage = $("#addlanguage");

        var validator = adduserlanguage.validate({
            rules: {
                name: { required: true },
            },
            messages: {
                name: { required: "This field is required" },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: base_url,
                    type: "POST",
                    data: $(form).serialize(),
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire(
                                {
                                    icon: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 3000
                                }
                            );
                            window.location.href = data.redirect;
                        } else {
                            Swal.fire(
                                'Warning',
                                data.message,
                                'warning'
                            );
                        }

                    }
                });
                return false;
            },

        });
    }
    if (action == 'list') {
        var dataTable = $('#languageslist').DataTable({
            "processing": true,
            "serverSide": true,
            "columns": [
                {
                    data: "0", name: "tbl_languages.id", "orderable": false, "searchble": false
                },
                {
                    data: "1", name: "tbl_languages.name"
                }
                ,
                {
                    data: "2", name: "tbl_languages.status",
                    "render": function (data) {
                        if (data == 1) {

                            return `<span class="badge btn-success">Active</span>`;
                        } else {
                            return `<span class="badge btn-danger">Inactive</span>`;
                        }
                    }
                },
                {
                    data: "3", name: "action"
                }

            ],

            "ajax": {
                "url": base_url,
                "type": "POST",
                "data": { [tokenname]: get_csrf_hash }
            },
        });

        $(document).on("click", ".deletelanguage", function (e) {
            e.preventDefault();
            var languageid = $(this).data("id"),

                hitURL = delete_url
            Swal.fire({
                title: 'Do you want to delete this language?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                if (result.isConfirmed) {
                    jQuery.ajax({
                        type: "POST",
                        dataType: "json",
                        url: hitURL,
                        data: { language_id: languageid, [tokenname]: get_csrf_hash }
                    }).done(function (data) {
                        if (data.status == true) {
                            Swal.fire(
                                {
                                    icon: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 500
                                }
                            );
                            dataTable.draw();
                        } else {
                            Swal.fire(
                                'Warning',
                                data.message,
                                'warning'
                            );
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        });
        $(document).on("click", ".searchList", function () {
        });
    }
});
