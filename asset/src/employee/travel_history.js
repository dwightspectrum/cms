$(document).ready(function() {
    jQuery(".datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd",
    });

    $("#search").on("keyup", function() {
        get();
    });

    get();

    function get(page = 1) {
        var search = $("#search").val();

        $.ajax({
            type: "POST",
            url: CONFIG.BASE_URL + "employee/get_travel_history/" + CONFIG.employee_id,
            dataType: "json",
            data: {
                page: page,
                search: search,
            },
            success: function(result) {
                loadData(result.list);
                $("#pagination").html(result.pagination);
                setPaginationClicks();
                addEventListeners();
            },
        });
    }

    function loadData(list) {
        if (list.length > 0) {
            list.forEach(function(obj) {
                obj.employee_travel_history_id = obj.employee_travel_history_id;
                obj.employee_travel_history_country =
                    obj.employee_travel_history_country;
                obj.employee_travel_history_date_enter =
                    obj.employee_travel_history_date_enter;
                obj.employee_travel_history_date_exit =
                    obj.employee_travel_history_date_exit;
            });

            $("#travel_history_table").loadTemplate(
                $("#travel-history-data-template"),
                list
            );
        } else {
            $("#travel_history_table").html(
                '<tr><td class="text-center" colspan="4">No records found.</td></tr>'
            );
        }
    }

    function setPaginationClicks() {
        $(".pagination a[href]").on("click", function(e) {
            e.preventDefault();
            get($(this).attr("data-ci-pagination-page"));
        });
    }

    function addEventListeners() {
        $(".btn-delete").on("click", function(e) {
            e.preventDefault();
            var parent = $(this);

            swal({
                    title: "Remove Travel History?",
                    text: "Are you sure you want to delete this travel history " +
                        parent.attr("data-ref") +
                        "?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    closeOnConfirm: true,
                },
                function() {
                    $.ajax({
                        type: "POST",
                        url: CONFIG.BASE_URL +
                            "employee/delete_travel_history/" +
                            parent.attr("id"),
                        dataType: "json",
                        success: function(result) {
                            alertify.logPosition("bottom right");
                            if (result.success) {
                                alertify.success("Successfully deleted!");
                                get();
                            }
                        },
                    });
                }
            );
        });
    }

    $("#travel-history-form").submit(function(e) {
        e.preventDefault();
        var country = $("#employee_travel_history_country").val();
        var date_enter = $("#employee_travel_history_date_enter").val();
        var date_exit = $("#employee_travel_history_date_exit").val();

        $.ajax({
            type: "POST",
            url: CONFIG.BASE_URL + "employee/add_travel_history/" + CONFIG.employee_id,
            dataType: "json",
            data: {
                country: country,
                date_enter: date_enter,
                date_exit: date_exit,
            },
            success: function(result) {
                alertify.logPosition("bottom right");
                alertify.success("Successfully added!");

                get();
            },
        });
    });
});