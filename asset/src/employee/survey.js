// $(document).ready(function() {
//     $("#search").on("keyup", function() {
//         get();
//     });

//     $("#employee_survey_form").submit(function(e) {
//         e.preventDefault();
//         var survey_name = $("#survey_name").val();

//         $.ajax({
//             type: "POST",
//             url: CONFIG.BASE_URL + "employee/add_survey/" + CONFIG.employee_id,
//             dataType: "json",
//             data: {
//                 survey_name: survey_name,
//             },
//             success: function(result) {
//                 alertify.logPosition("bottom right");
//                 alertify.success("Successfully added!");
//             },
//         });
//     });

//     get();

//     function get() {
//         var search = $("#search").val();

//         $.ajax({
//             type: "POST",
//             url: CONFIG.BASE_URL + "/employee/get_survey/" + CONFIG.employee_id,
//             dataType: "json",
//             data: {
//                 survey_name: survey_name,
//                 survey_status: survey_status,
//             },
//             success: function(result) {
//                 loadData(result.list);
//                 $("#pagination").html(result.pagination);
//                 setPaginationClicks();
//                 addEventListeners();
//             },
//         });
//     }

function loadData(list) {
    if (list.length > 0) {
        list.forEach(function(obj) {
            console.log(obj);

            obj.survey_name = obj.survey_name;
            obj.survey_status = obj.survey_status;
        });

        $("#survey_table").loadTemplate($("#survey_template"), list);
    } else {
        $("#survey_table").html(
            '<tr><td class="text-center" colspan="4">No records found.</td></tr>'
        );
    }
}

function setPaginationClicks() {
    $(".pagination input[submit]").on("click", function(e) {
        e.preventDefault();
        get($(this).attr("data-ci-pagination-page"));
    });
}

//     function addEventListeners() {
//         $(".btn-delete").on("click", function(e) {
//             e.preventDefault();
//             var parent = $(this);

//             swal({
//                     title: "Remove Survey?",
//                     text: "Are you sure you want to delete this Survey? " +
//                         parent.attr("data-ref") +
//                         "?",
//                     type: "warning",
//                     showCancelButton: true,
//                     confirmButtonColor: "#DD6B55",
//                     confirmButtonText: "Yes",
//                     closeOnConfirm: true,
//                 },
//                 function() {
//                     $.ajax({
//                         type: "POST",
//                         url: CONFIG.BASE_URL +
//                             "employee/delete_travel_history/" +
//                             parent.attr("id"),
//                         dataType: "json",
//                         success: function(result) {
//                             alertify.logPosition("bottom right");
//                             if (result.success) {
//                                 alertify.success("Successfully deleted!");
//                                 get();
//                             }
//                         },
//                     });
//                 }
//             );
//         });
//     }
// });