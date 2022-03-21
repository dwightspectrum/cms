$(document).ready(function() {
    var CHILDREN = [];

    jQuery(".datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd",
    });

    $("#add-child").click(function(e) {
        e.preventDefault();

        var child_name = $("#child_name").val();
        var child_birthdate = $("#child_birthdate").val();

        if (
            child_name == null ||
            child_name == "" ||
            child_birthdate == null ||
            child_birthdate == ""
        ) {
            alertify.logPosition("bottom right");
            alertify.error("Please fill in the necessary fields!");
        } else {
            var child_data = {
                child_name: child_name,
                child_birthdate: child_birthdate,
            };

            CHILDREN.push(child_data);

            $("#child_name").val("");
            $("#child_birthdate").val("");
        }

        display_children();
    });

    function display_children() {
        if (CHILDREN.length > 0) {
            var data = [];

            for (var i = 0; i < CHILDREN.length; i++) {
                var obj = CHILDREN[i];
                obj.index = i;
                obj.action =
                    '<a class="btn btn-danger btn-sm delete-child" id="' +
                    i +
                    '"><i class="fa fa-trash"></i></a>';
                data.push(obj);
            }

            $("#child_table").loadTemplate($("#child-data-template"), data);

            $(".delete-child").on("click", function(e) {
                e.preventDefault();

                var index = $(this).attr("id");
                remove_child(index);
            });
        } else {
            $("#child_table").html(
                '<tr><td align="center" colspan="3">No records found.</td></tr>'
            );
        }
    }

    function remove_child(index) {
        CHILDREN.splice(index, 1);
        display_children();
    }

    $("#employee_form").submit(function(e) {
        e.preventDefault();

        var data = new FormData(this);
        data.append("children", JSON.stringify(CHILDREN));
        data.append("picture", $("#picture")[0].files[0]);
        data.append("passport_copy", $("#passport_copy")[0].files[0]);
        data.append("employee_certificate", $("#employee_certificate")[0].files[0]);

        $.ajax({
            type: "POST",
            url: CONFIG.BASE_URL + "employee/add_employee_details",
            dataType: "json",
            enctype: "multipart/form-data",
            processData: false,
            contentType: false,
            cache: false,
            data: data,
            success: function(result) {
                alertify.logPosition("bottom right");
                alertify.success("Successfully submitted!");

                setTimeout(function() {
                    window.location.href = CONFIG.BASE_URL + "employee/view";
                }, 1000);
            },
        });
    });
});
