$(document).ready(function() {
    var JOBS = [];
    display_client_name();
    display_jobs();
    get();

    var category = document.getElementById('select_category').value;
    display_email(category);

    jQuery(".datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd",
    });

    $("#employee_job_location").change(function() {
        var opval = $(this).val();
        if (opval == "Local") {
            $("#local-modal").modal("show");
        }
        if (opval == "International") {
            $("#international-modal").modal("show");
        }
    });

    $("#save-local").click(function() {
        var a = $("#employee_job_address").val();
        var b = $("#employee_job_departure_date").val();
        var c = $("#employee_job_return_date").val();
        if (a == "" || a == null) {
            alertify.error("All fields are required");
            $("#local-modal").modal("show");
        } else if (b == "" || b == null) {
            alertify.error("All fields are required");
            $("#local-modal").modal("show");
        } else if (c == "" || c == null) {
            alertify.error("All fields are required");
            $("#local-modal").modal("show");
        } else {
            $("#local-modal").modal("hide");
        }
    });

    $("#save-international").click(function() {
        var a = $("#employee_job_country").val();
        var b = $("#employee_job_entry_date").val();
        var c = $("#employee_job_exit_date").val();
        if (a == "" || a == null) {
            alertify.error("All fields are required");
            $("#international-modal").modal("show");
        } else if (b == "" || b == null) {
            alertify.error("All fields are required");
            $("#international-modal").modal("show");
        } else if (c == "" || c == null) {
            alertify.error("All fields are required");
            $("#international-modal").modal("show");
        } else {
            $("#international-modal").modal("hide");
        }
    });

    $("#add-job-history").click(function() {
        var data = set_job();

        if (data) {
            JOBS.push(data);
            alertify.success("Successfully saved!");
           
            $.ajax({
                type: "POST",
                url: CONFIG.BASE_URL + "employee/update_job_history/" + CONFIG.employee_id,
                dataType: "json",
                data: {
                    job_history: JSON.stringify(JOBS),
                },
                success: function(result) {
                    JOBS = [];
                    display_jobs();
                    display_client_name();
                    console.log(result);
                },
            });
        }
    });

    function set_job() {
        var services = [];
        $("input:checkbox[name=service_scope]:checked").each(function() {
            var service = {
                service_scope_list_id: $(this).val(),
                service_scope_list_name: $(this).next().text(),
            };
            services.push(service);
        });

        if ($("#employee_job_history_client").val() == "") {
            alertify.logPosition("bottom right");
            alertify.error("Please input Customer/Client");
            return;
        }

        if ($("#employee_job_location").val() == "") {
            alertify.logPosition("bottom right");
            alertify.error("Please select Location");
            return;
        }

        if ($("#employee_job_history_scope").val() == "") {
            alertify.logPosition("bottom right");
            alertify.error("Please input Scope");
            return;
        }

        if ($("#employee_job_history_scope").val() == "") {
            alertify.logPosition("bottom right");
            alertify.error("Please input Scope");
            return;
        }

        if (services.length == 0) {
            alertify.logPosition("bottom right");
            alertify.error("Please add atleast one service.");
            return;
        }

        var data = {
            employee_job_history_client: $("#employee_job_history_client").val(),
            employee_job_location: $("#employee_job_location").val(),
            employee_job_address: $("#employee_job_address").val(),
            employee_job_departure_date: $("#employee_job_departure_date").val(),
            employee_job_return_date: $("#employee_job_return_date").val(),
            employee_job_country: $("#employee_job_country").val(),
            employee_job_entry_date: $("#employee_job_entry_date").val(),
            employee_job_exit_date: $("#employee_job_exit_date").val(),
            employee_job_history_scope: $("#employee_job_history_scope").val(),
            service_scope_list_id: $("#service_scope_list_id").val(),
            service_scope_name: services
                .map((a) => a.service_scope_list_name)
                .join(", "),
            service_scopes: services,
        };

        return data;
    }

    function display_jobs(page = 1) {
  
        $.ajax({
            type: "POST",
            url: CONFIG.BASE_URL + "employee/get_job_history/" + CONFIG.employee_id,
            dataType: "json",
            data: {
                page: page,
            },
            success: function(result) {
                if (result.list.length > 0) {
                    result.list.forEach(function(obj) {

                        obj.service_scope_list_id = obj.service_scope_list_id;
                        obj.client_id = obj.client_id;
                        obj.service_scope_name = "";
                        obj.service_scopes.forEach(function (svs){
                            obj.service_scope_name += svs.service_scope_list_name + ", ";
                        });

                        // obj.action = `<a href="#" title="Delete" class="btn btn-danger btn-sm m-r-5 remove-job"><i class="fa fa-trash"></i></a>`;
                    });

                    $("#job_history_table").loadTemplate($("#job-data-template"), result.list);
                
                    addEventListener();
                    $("#list_pagination").html(result.pagination);
                    setPaginationClicksforList();
                } else { 
                    $("#job_history_table").html(
                        '<tr><td class="text-center" colspan="10" >No records found.</td></tr>'
                    );
                }
            },
        });
    }

    function get(page = 1) {
        $.ajax({
            type: "POST",
            url: CONFIG.BASE_URL + "survey/get_survey/" + CONFIG.employee_id,
            dataType: "json",
            data: {
                page: page,
            },
            success: function(result) {
                console.log(result);
                if (result.list.length > 0) {
                    result.list.forEach(function(obj) {
                        //obj.employee_id = obj.employee_id;
                        obj.survey_id = obj.survey_id;
                        obj.client_id = obj.client_id;
                        obj.survey_email = obj.survey_email;
                        obj.survey_category = obj.survey_category;
                        obj.survey_status = obj.survey_status;

                        obj.action = `<a href="#" title="Delete" data-index="${obj.survey_id}" data-email="${obj.survey_email}" class="btn btn-danger btn-sm m-r-5 btn-delete"><i class="fa fa-trash"></i></a>
                                      <a href="#" title="Email" data-index="${obj.survey_id}" data-email="${obj.survey_email}" class="btn btn-primary btn-sm m-r-5 btn-email"><span class="fa fa-envelope"></span></a>
                                      <a href="${CONFIG.BASE_URL + "employee/evaluation_report/" + obj.survey_id}" title="Link" class="btn btn-primary btn-sm m-r-5"><span class="fa fa-envelope"></span></a>`;

                        if(obj.survey_category == 'Supervisor'){
                            obj.action += `<a href="#" title="Change to Member" data-category="${obj.survey_category}" data-index="${obj.survey_id}" class="btn btn-success btn-sm m-r-5 btn-supervisor"><i class="fa fa-user"></i></a>`;
                        }else{
                            obj.action += `<a href="#" title="Change to Supervisor" data-category="${obj.survey_category}" data-index="${obj.survey_id}" class="btn btn-warning btn-sm m-r-5 btn-member"><i class="fa fa-undo"></i></a>`;
                        }

                        obj.email_link = `<a href="#" title="Evaluation" data-index="${obj.survey_email_id}" class="btn btn-primary btn-sm m-r-5 btn-evaluate"><i class="fa fa-link"></i></a>`;
                    });
                    
                    $("#survey_table").loadTemplate($("#survey_template"), result.list);
                    setEventListeners();
                    
                    $("#paginations").html(result.pagination);
                    setPaginationClicks();
                } else { 
                    $("#survey_table").html(
                        '<tr><td class="text-center" colspan="3">No records found.</td></tr>'
                    );
                }
            },
        });
    }

    function setPaginationClicks() {
        const href = document.querySelectorAll('#paginations .pagination a[href]');
        Array.from(href).forEach(element => {
            element.addEventListener('click', (e) => {
                e.preventDefault();
                get(element.getAttribute('data-ci-pagination-page'));
            });
        });
      }
    function setPaginationClicksforList() {
        const href = document.querySelectorAll('#list_pagination .pagination a[href]');
        Array.from(href).forEach(element => {
            element.addEventListener('click', (e) => {
                e.preventDefault();
                display_jobs(element.getAttribute('data-ci-pagination-page'));
            });
        });
      }


    $("#employee_survey_form").submit(function(e) {
        e.preventDefault();

        var survey_email = $("#survey_email").val();
        var select_client = $("#select_client").val();
        var survey_email_id = document.getElementById('survey_email_id').value;

        if (select_client == "" || select_client == null) {
            alertify.error("Please select client name first");
        } else {
            $.ajax({
                type: "POST",
                url: CONFIG.BASE_URL + "survey/add_survey/" + CONFIG.employee_id,
                dataType: "json",
                data: {
                    survey_email: survey_email,
                    client_id: select_client,
                    survey_email_id: survey_email_id
                },
                success: function(result) {
                    console.log(result);
                    alertify.logPosition("bottom right");
                    alertify.success("Successfully added!");
                    get();
                },
            });
        }
    });

    function setEventListeners(){
        const deleleteClasses = document.querySelectorAll('.btn-delete');
        const emailClasses = document.querySelectorAll('.btn-email');
        const supervisorClasses = document.querySelectorAll('.btn-supervisor');
        const memberClasses = document.querySelectorAll('.btn-member');
        const surveyLinkClasses = document.querySelectorAll('.btn-evaluate');

        Array.from(surveyLinkClasses).forEach(element => {
            element.addEventListener('click', e => {
                e.preventDefault();
                let index = e.currentTarget.dataset.index;
                window.location.href = `${CONFIG.BASE_URL}employee/evaluation_report/${index}`;
            });
        });

        Array.from(deleleteClasses).forEach(element => {
            element.addEventListener('click', e => {
                e.preventDefault();
                

                let index = e.currentTarget.dataset.index;
                let email = e.currentTarget.dataset.email;
                
                swal({
                    title: "Remove Survey?",
                    text: `Are you sure you want to delete survey for ${email}?`,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    closeOnConfirm: true,
                },
                function() {
                    fetch(`${CONFIG.BASE_URL}survey/delete_survey/${index}`)
                    .then(response => response.json())
                    .then(result => {
                        alertify.logPosition("bottom right");
                        if (result.success) {
                            alertify.success("Successfully deleted!");
                            get();
                        }
                    });
                }
            );
            });
        });

        Array.from(supervisorClasses).forEach(element => {
            element.addEventListener('click', e => {
                e.preventDefault();

                let index = e.currentTarget.dataset.index;
                let category = e.currentTarget.dataset.category;
                
                swal({
                    title: "Set Status?",
                    text: `Are you sure you want to set status to member?`,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    closeOnConfirm: true,
                },
                function() {
                    fetch(`${CONFIG.BASE_URL}survey/change_category_status/${index}/Member`)
                    .then(response => response.json())
                    .then(result => {
                        alertify.logPosition("bottom right");
                        if (result.success) {
                            alertify.success("Status is now a member!");
                            get();
                        }
                    });
                }
            );
            });
        });

        Array.from(memberClasses).forEach(element => {
            element.addEventListener('click', e => {
                e.preventDefault();

                let index = e.currentTarget.dataset.index;
                let category = e.currentTarget.dataset.category;
                
                swal({
                    title: "Set Status?",
                    text: `Are you sure you want to set status to supervisor?`,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    closeOnConfirm: true,
                },function() {
                    fetch(`${CONFIG.BASE_URL}survey/change_category_status/${index}/Supervisor`)
                    .then(response => response.json())
                    .then(result => {
                        alertify.logPosition("bottom right");
                        if (result.success) {
                            alertify.success("Status is now a supervisor!");
                            get();
                        }
                    });
                }
            );
            });
        });

        Array.from(emailClasses).forEach(element => {
            element.addEventListener('click', e => {
                e.preventDefault();

                let index = e.currentTarget.dataset.index;
                let email = e.currentTarget.dataset.email;
                
                swal({
                    title: "Send Email?",
                    text: `Are you sure you want to send survey to ${email}?`,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    closeOnConfirm: true,
                },function() {
                    alertify.logPosition("bottom right");
                    alertify.success("Email has been successfully sent!");

                    fetch(`${CONFIG.BASE_URL}survey/send_survey_evaluation/${index}`)
                    .then(response => response.json())
                    .then(result => {
                        get();
                    });
                }
            );
            });
        });
    }
        
    function addEventListener(){
        $(".remove-job").on("click", function(e) {
            e.preventDefault();
            var parent = $(this);
    
            swal({
                    title: "Remove Job?",
                    text: "Are you sure you want to delete this job history?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    closeOnConfirm: true,
                },
                
                function() {
                    $.ajax({
                        type: "POST",
                        url: CONFIG.BASE_URL + "employee/delete_job_history/" + parent.attr("id"),
                        dataType: "json",
                        success: function(result) {
                            alertify.logPosition("bottom right");
                            if (result.success) {
                                alertify.success("Successfully deleted!");
                                display_jobs();
                                display_client_name();
                            }
                        },
                    });
                }
            );
        });
    }
    

    document.getElementById('select_category').addEventListener('change', function(){
        var category = document.getElementById('select_category').value;
        display_email(category);

        var email = document.getElementById('survey_email').value;
        get_email_id(email, category);
    });

    document.getElementById('survey_email').addEventListener('change', function(){
        var category = document.getElementById('select_category').value;
        var email = document.getElementById('survey_email').value;

        get_email_id(email, category);
    });

    function get_email_id(email, category){
        const formData = new FormData();
        formData.append('email', email);

        fetch(`${CONFIG.BASE_URL}survey/get_email_id/${category}`, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            console.log(result);
            document.getElementById('survey_email_id').value = (category==1)?(result.employee_id):(result.freelancer_id);
        });
    }

    function check_email(index){
        fetch(`${CONFIG.BASE_URL}survey/checkEmailIfExists/${index}`)
        .then(response => response.json())
        .then(result => {
            alertify.logPosition("bottom right");
            if (!result.isexists) {
                alertify.error("Email is not valid! Try a Hotwork registered email. ");

                return false;
            }else{
                return true;
            }
        });
    }

    function display_email(category){
        $.ajax({
            type: 'POST',
            url: `${CONFIG.BASE_URL}employee/get_category_email/${category}`,
            dataType: 'json',
            success: function(result) {
                if(category == 1){
                    $('#survey_email').loadTemplate($('#employee_email_category'), result);
                }else{
                    $('#survey_email').loadTemplate($('#freelancer_email_category'), result);
                }
            }
        });
    }
 

    function display_client_name() {
        $.ajax({
            type: 'POST',
            url: CONFIG.BASE_URL + "employee/get_employee_job_history/" + CONFIG.employee_id,
            dataType: 'json',
            success: function(result) {
                $('#select_client').loadTemplate($('#select_client_template'), result);
            }
        });
    }
});