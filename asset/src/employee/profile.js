$(document).ready(function() {

    getProfile();
    progressBar();
    
    $("#change_password_form").submit(function(e) {
        e.preventDefault();

        if ($("#employee_password").val() != $("#confirm_password").val()) {
            alertify.logPosition("bottom right");
            alertify.error("Password does not match!");
            return;
        }

        $.ajax({
            type: 'POST',
            url: CONFIG.BASE_URL + "employee/change_password/" + CONFIG.employee_id,
            dataType: 'json',
            data: $('#change_password_form').serialize(),
            success: function(result){
                alertify.logPosition("bottom right");
    
                if(result.success){
                    alertify.success("You have successfully changed your password!");
                    $("#change_password_modal").modal("hide");
                }
                else{
                    alertify.error(result.error);
                }
            }
        });
    });

    $("#change-password").on("click", function() {
        $("#change_password_modal").modal("show");
    });

    document.querySelectorAll('.edit_button')
    .forEach(elem => {
        elem.addEventListener('click', (e) => {
            const src = elem.getAttribute('src');
            $('#files_picture_modal').modal('show');
            previewFilesPic.src = src;
            
        });
     
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#profile_picture_preview").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#picture").change(function() {
        readURL(this);
    });

    $("#upload_resume").on("click", function(){
        $("#upload_resume_modal").modal("show");
    });


    
});




const employeeId = window.location.pathname.split('/').pop();
const imgToChange = document.getElementById('change_picture');
const cvToChange = document.getElementById('cv_upload');
const profilePic = document.getElementById('profile_pic');
const previewProfile = document.getElementById('profile_picture_preview');

const previewFilesPic = document.getElementById('files_picture_preview');

const previewCV = document.getElementById('cv_preview');
const previewPassport = document.getElementById('passport_preview');
const previewNbi = document.getElementById('nbi_preview');
const previewRtpcr = document.getElementById('rtpcr_preview');
const previewTin = document.getElementById('tin_preview');
const previewSss = document.getElementById('sss_preview');
const previewPagibig = document.getElementById('pagibig_preview');
const previewPhil = document.getElementById('phil_preview');
const previewSignature = document.getElementById('signature_preview');
const previewBpi = document.getElementById('bpi_preview');
const previewMedical = document.getElementById('medical_preview');

const cvPic = document.getElementById('employee_img_cv');
const passportPic = document.getElementById('employee_img_passport');
const nbiPic = document.getElementById('employee_img_nbi');
const rtpcrPic = document.getElementById('employee_img_swab');
const tinPic = document.getElementById('employee_img_tin');
const sssPic = document.getElementById('employee_img_sss'); 
const pagibigPic = document.getElementById('employee_img_pagibig');
const philPic = document.getElementById('employee_img_philhealth');
const signaturePic = document.getElementById('employee_img_signature');
const bpiPic = document.getElementById('employee_img_bpi');
const medicalPic = document.getElementById('employee_img_medical');


const employeePersonalData = [
    'employee_first_name',
    'employee_middle_name',
    'employee_last_name',
    'employee_birthdate',
    'employee_gender',
    'employee_civil_status',
    'employee_blood_type',
    'employee_start_date',
    'employee_religion',
    'employee_weight',
    'employee_height',
    'employee_birthplace',
    'employee_city_address',
    'employee_provincial_address',
    'employee_emergency_contact_name',
    'employee_emergency_relationship',
    'employee_emergency_contact_number',
    'employee_emergency_email',
    'employee_father_first_name',
    'employee_father_last_name',
    'employee_father_middle_name',
    'employee_mother_first_name',
    'employee_mother_maiden_middle_name',
    'employee_mother_maiden_last_name',
    'employee_spouse_name',
    'employee_spouse_first_name',
    'employee_spouse_last_name',
    'employee_spouse_middle_name',
    'employee_spouse_birthdate',
    'employee_spouse_birthplace',
    'employee_spouse_occupation',
    'employee_spouse_office_number',
    'employee_sss_number',
    'employee_pagibig_number',
    'employee_phealth_number',
    'employee_tin_number',
    'employee_umid_number',
    'employee_bpi_number',
    'employee_passport_copy',
    'employee_certificate',
];

const employeeImagesData = [
    'employee_img_cv',
    'employee_img_medical',
    'employee_img_tin',
    'employee_img_sss',
    'employee_img_pagibig',
    'employee_img_philhealth',
    'employee_img_bpi',
    'employee_img_swab',
    'employee_img_nbi',
    'employee_img_signature',
    'employee_img_passport',
];

const employeeRequirementsData = [
    'employee_bpi_number',
    'employee_tin_number',
    'employee_sss_number',
    'employee_pagibig_number',
    'employee_phealth_number',
];

const employeeCvUpload = [
    'employee_cv_upload',
];


jQuery('.datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd'
});

document.getElementById('btn-update-files').addEventListener('click', async (e) => {
    $('#add_form_modal').modal('show');
    previewCV.setAttribute('src', cvPic.getAttribute('src'));
    previewPassport.setAttribute('src', passportPic.getAttribute('src'));
    previewNbi.setAttribute('src', nbiPic.getAttribute('src'));
    previewRtpcr.setAttribute('src', rtpcrPic.getAttribute('src'));
    previewTin.setAttribute('src', tinPic.getAttribute('src'));
    previewSss.setAttribute('src', sssPic.getAttribute('src'));
    previewPagibig.setAttribute('src', pagibigPic.getAttribute('src'));
    previewPhil.setAttribute('src', philPic.getAttribute('src'));
    previewSignature.setAttribute('src', signaturePic.getAttribute('src'));
    previewBpi.setAttribute('src', bpiPic.getAttribute('src'));
    previewMedical.setAttribute('src', medicalPic.getAttribute('src'));

});


document.querySelectorAll('.edit_btn')
        .forEach(elem => {
        elem.addEventListener('click', (e) => {
            const src = elem.getAttribute('src');
            $('#files_picture_modal').modal('show');
            previewFilesPic.src = src;
        });
});

$('#change-picture').click(() => { 
    $('#profile_picture_modal').modal('show');
    previewProfile.setAttribute('src', profilePic.getAttribute('src'));
});


document.getElementById('upload_profile').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append('employee_photo', imgToChange.files[0]);
    const res = await fetch(`${CONFIG.BASE_URL}employee/change_profile/${employeeId}`, {
                    method: 'POST',
                    body: formData,
                });
    const data = await res.json();
  
    if (data.employee_role == 1 || data.success) {
        profilePic.setAttribute('src', data.filepath);
        document.getElementById('employee_profile_pic').setAttribute('src', data.filepath);
    }
    else if (data.employee_role == 2 || data.success) {
        profilePic.setAttribute('src', data.filepath);
        document.getElementById('employee_profile_pic').setAttribute('src', data.filepath);
    }
    else if (data.employee_role == 3 || data.success) {
        profilePic.setAttribute('src', data.filepath);
        document.getElementById('employee_profile_pic').setAttribute('src', data.filepath);
    }
    else if (data.employee_role == 4 || data.success) {
        profilePic.setAttribute('src', data.filepath);
        document.getElementById('employee_profile_pic').setAttribute('src', data.filepath);
    }
    else if (data.employee_role == 5 || data.success) {
        profilePic.setAttribute('src', data.filepath);
        document.getElementById('employee_profile_pic').setAttribute('src', data.filepath);
    }

    alertify.logPosition("bottom right");
    alertify.success("Successfully Updated!");
    setTimeout(() => {
        $('#profile_picture_modal').modal('hide');
    }, 500);
});


async function getProfile() {

    const res = await fetch(`${CONFIG.BASE_URL}employee/get_profile/${employeeId}`);
    const data = await res.json();
    document.getElementById('employee_profile_pic').setAttribute('src', `${CONFIG.BASE_URL}asset/employees/${data.employee_photo || 'no-profile.png'}`);
    document.getElementById('profile_pic').setAttribute('src', `${CONFIG.BASE_URL}asset/employees/${data.employee_photo || 'no-profile.png'}`);
    employeePersonalData.forEach(personal => {
        const elem = document.querySelector(`#personal p[personal-name="${personal}"]`);
        if (elem) elem.innerText = data[personal] || '---';
    });

    employeeRequirementsData.forEach(requirement => {
        const elem = document.querySelector(`#requirements span[personal-name="${requirement}"]`);
        if (elem) elem.innerText = data[requirement] || '---';
    });

    employeeImagesData.forEach(requirement => {
        const elem = document.querySelector(`#requirements strong[personal-name="${requirement}"]`);
        if (elem) elem.innerText = data[requirement] || '---';
    });

    employeeCvUpload.forEach(requirement => {
        const elem = document.querySelector(`#vitae td[personal-name="${requirement}"]`);
        if (elem) elem.innerText = data[requirement] || '---';
    });

    document.querySelectorAll('#requirements-wrapper span.attach_image')

        .forEach(elem => {
            const elemId = elem.getAttribute('id');
            const _src = data[elemId] && `${CONFIG.BASE_URL}asset/employees/requirements/${data[elemId]}`;
            if (_src) document.querySelector('#' + elemId).setAttribute('src', _src);
            document
                .querySelector('#' + elemId)
                .innerHTML = `<strong>${data[elemId] || '<span class="text-danger">No image found.</span>'}</strong>`
        });

    document.querySelectorAll('.edit_button')
    .forEach(elem => {
        elem.addEventListener('click', (e) => {
            const elemId = elem.getAttribute('id');
            const _src = data[elemId] && `${CONFIG.BASE_URL}asset/employees/requirements/${data[elemId]}`;
            if (_src) document.querySelector('#' + elemId).setAttribute('src', _src); 
                $('#files_picture_modal').modal('show');
                previewFilesPic.src = _src;  
        }); 
    });
    
    document.querySelectorAll('.download_btn')
    .forEach(elem => {
        elem.addEventListener('click', (e) => {
            const elemId = elem.getAttribute('id');
            const _src = data[elemId] && `${CONFIG.BASE_URL}asset/employees/requirements/${data[elemId]}`;
            const filename = data[elemId];
            const link = document.createElement("a");
            if (_src) {
            document.querySelector('#' + elemId).setAttribute('src', _src); 
                link.href = _src;
                link.download = filename;
                link.click();
            }
        }); 
    });

    document.querySelectorAll('.link_img') 
    .forEach(elem => {
        elem.addEventListener('click', (e) => {
            const elemId = elem.getAttribute('id');
            const _src = data[elemId] && `${CONFIG.BASE_URL}asset/employees/requirements/${data[elemId]}`;
            const link = document.createElement("a");
            if (_src) {
            document.querySelector('#' + elemId).setAttribute('src', _src); 
                link.href = _src;
                link.target = '_blank';
                link.click();
            }
        });  
    });


    return data;
}

cvToChange.addEventListener('change', (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = (e) => {
        previewProfile.setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(file);
});

imgToChange.addEventListener('change', (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = (e) => {
        previewProfile.setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(file);
});


const imageInputFiles = document.querySelectorAll('.image-upload input[type=file]');
const imagesPreview = document.getElementsByClassName('image-preview');

const form_files = {};

imageInputFiles.forEach((inputFile, index) => {

    inputFile.addEventListener('change', (e) => {
        const name = e.target.getAttribute('name');
        const [file] = e.target.files;            
        const imgSrc = URL.createObjectURL(file);
        imagesPreview[index].src = imgSrc;
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = (e) => {
            const { result } = e.target;
            form_files[name] = {
                name: file.name,
                value: result.split(',')[1],
                key: name,
            };
        }
    });

});

document.getElementById('employee_upload_cv').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append('employee_cv_upload', cvToChange.files[0]);
    const res = await fetch(`${CONFIG.BASE_URL}/employee/add_cv/${employeeId}`, {
                    method: 'POST',
                    body: formData,
                });
    const data = await res.json();
    if (data.success) {
        getProfile();
        profilePic.setAttribute('src', data.filepath);
        alertify.logPosition("bottom right");
        alertify.success("Successfully Updated!");
        setTimeout(() => {
            $('#upload_resume_modal').modal('hide');
        }, 500);
    }
});

document.getElementById('employee_form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData();
    const payloads = [];
    for (const [key, value] of Object.entries(form_files)) {
        payloads.push(value);
    }
    formData.append('form_files', JSON.stringify(payloads));

    const res = await fetch(
        `${CONFIG.BASE_URL}employee/add_requirements/${employeeId}`, {
            method: 'POST', 
            body: formData,
            
    });
    const data = await res.json();
    progressBar();
    
    if(data.success) {
      displayNotifications();
      //$('#requirements').load(document.URL +  ' #requirements');
      getProfile();
      alertify.logPosition("bottom right");
      alertify.success("Successfully updated!");
      $('#add_form_modal').modal('hide');
      
    }
});

async function progressBar() {
    const profile = await getProfile();
    let count = 0;
    
    employeeImagesData.forEach(data => {
        if (profile[data] !== null && profile[data] !== "") {
            count += 1;
        }
    });

    const progressBarEl = document.getElementById("myBar");
    const progressText = document.querySelector('#myBar .text-progress');
    const percent = Math.round( (count / employeeImagesData.length) * 100 );

    progressBarEl.style.width = percent + '%';
    document.querySelector('#myBar .text-progress-percent').innerHTML = percent + '%';
    progressText.innerText = 'Done';
    if (percent <= 40) {
        progressBarEl.style.background = '#cd1d1d';
    } 
    else if (percent > 40 && percent <= 99) {
        progressBarEl.style.background = '#ffa500';
    } 
    else {
        progressBarEl.style.background = '#18cb72';
    }  

    $("#delete_tin").on("click", function() {

        swal({
            title: "Remove File?",
            text: "Are you sure you want to delete this file?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true,
        },
        
            function() {
                $.ajax({
                    url: CONFIG.BASE_URL + "employee/delete_tin/" +  CONFIG.employee_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#tin-picture').load(document.URL +  ' #tin-picture');
                        $('.disable_tin').load(document.URL + ' .disable_tin');
                        getProfile();
                        progressBar();
                        alertify.logPosition("bottom right");
                        alertify.success("Successfully deleted!");
                    }
                });
            }
        );

    });

    $("#delete_sss").on("click", function() {

        swal({
            title: "Remove File?",
            text: "Are you sure you want to delete this file?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true,
        },
        
            function() {
                $.ajax({
                    url: CONFIG.BASE_URL + "employee/delete_sss/" +  CONFIG.employee_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#sss-picture').load(document.URL +  ' #sss-picture');
                        $('.disable_sss').load(document.URL + ' .disable_sss');
                        getProfile();
                        progressBar();
                        alertify.logPosition("bottom right");
                        alertify.success("Successfully deleted!");
                    }
                });
            }
        );

    });

    $("#delete_pagibig").on("click", function() {

        swal({
            title: "Remove File?",
            text: "Are you sure you want to delete this file?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true,
        },
        
            function() {
                $.ajax({
                    url: CONFIG.BASE_URL + "employee/delete_pagibig/" +  CONFIG.employee_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#pagibig-picture').load(document.URL +  ' #pagibig-picture');
                        $('.disable_pagibig').load(document.URL + ' .disable_pagibig');
                        getProfile();
                        progressBar();
                        alertify.logPosition("bottom right");
                        alertify.success("Successfully deleted!");
                    }
                });
            }
        );

    });

    $("#delete_philhealth").on("click", function() {

        swal({
            title: "Remove File?",
            text: "Are you sure you want to delete this file?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true,
        },
        
            function() {
                $.ajax({
                    url: CONFIG.BASE_URL + "employee/delete_philhealth/" +  CONFIG.employee_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#phil-picture').load(document.URL +  ' #phil-picture');
                        $('.disable_phil').load(document.URL + ' .disable_phil');
                        getProfile();
                        progressBar();
                        alertify.logPosition("bottom right");
                        alertify.success("Successfully deleted!");
                    }
                });
            }
        );

    });

    $("#delete_bpi").on("click", function() {

        swal({
            title: "Remove File?",
            text: "Are you sure you want to delete this file?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true,
        },
        
            function() {
                $.ajax({
                    url: CONFIG.BASE_URL + "employee/delete_bpi/" +  CONFIG.employee_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#bpi-picture').load(document.URL +  ' #bpi-picture');
                        $('.disable_bpi').load(document.URL + ' .disable_bpi');
                        getProfile();
                        progressBar();
                        alertify.logPosition("bottom right");
                        alertify.success("Successfully deleted!");
                    }
                });
            }
        );

    });

    $("#delete_cv").on("click", function() {

        swal({
            title: "Remove File?",
            text: "Are you sure you want to delete this file?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true,
        },
        
            function() {
                $.ajax({
                    url: CONFIG.BASE_URL + "employee/delete_cv/" +  CONFIG.employee_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#cv-picture').load(document.URL +  ' #cv-picture');
                        $('.disable_cv').load(document.URL + ' .disable_cv');
                        getProfile();
                        progressBar();
                        alertify.logPosition("bottom right");
                        alertify.success("Successfully deleted!");
                    }
                });
            }
        );

    });

    $("#delete_passport").on("click", function() {

        swal({
            title: "Remove File?",
            text: "Are you sure you want to delete this file?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true,
        },
        
            function() {
                $.ajax({
                    url: CONFIG.BASE_URL + "employee/delete_passport/" +  CONFIG.employee_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#pass-picture').load(document.URL +  ' #pass-picture');
                        $('.disable_pass').load(document.URL + ' .disable_pass');
                        getProfile();
                        progressBar();
                        alertify.logPosition("bottom right");
                        alertify.success("Successfully deleted!");
                    }
                });
            }
        );

    });

    $("#delete_medical").on("click", function() {

        swal({
            title: "Remove File?",
            text: "Are you sure you want to delete this file?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true,
        },
        
            function() {
                $.ajax({
                    url: CONFIG.BASE_URL + "employee/delete_medical/" +  CONFIG.employee_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#medical-picture').load(document.URL +  ' #medical-picture');
                        $('.disable_med').load(document.URL + ' .disable_med');
                        getProfile();
                        progressBar();
                        alertify.logPosition("bottom right");
                        alertify.success("Successfully deleted!");
                    }
                });
            }
        );

    });

    $("#delete_nbi").on("click", function() {

        swal({
            title: "Remove File?",
            text: "Are you sure you want to delete this file?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true,
        },
        
            function() {
                $.ajax({
                    url: CONFIG.BASE_URL + "employee/delete_nbi/" +  CONFIG.employee_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#nbi-picture').load(document.URL +  ' #nbi-picture');
                        $('.disable_nbi').load(document.URL + ' .disable_nbi');
                        getProfile();
                        progressBar();
                        alertify.logPosition("bottom right");
                        alertify.success("Successfully deleted!");
                    }
                });
            }
        );

    });

    $("#delete_swab").on("click", function() {

        swal({
            title: "Remove File?",
            text: "Are you sure you want to delete this file?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true,
        },
        
            function() {
                $.ajax({
                    url: CONFIG.BASE_URL + "employee/delete_swab/" +  CONFIG.employee_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#rtpcr-picture').load(document.URL +  ' #rtpcr-picture');
                        $('.disable_swab').load(document.URL + ' .disable_swab');
                        getProfile();
                        progressBar();
                        alertify.logPosition("bottom right");
                        alertify.success("Successfully deleted!");
                    }
                });
            }
        );

    });

    $("#delete_signature").on("click", function() {

        swal({
            title: "Remove File?",
            text: "Are you sure you want to delete this file?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true,
        },
        
            function() {
                $.ajax({
                    url: CONFIG.BASE_URL + "employee/delete_signature/" +  CONFIG.employee_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#signature-picture').load(document.URL +  ' #signature-picture');
                        $('.disable_sig').load(document.URL + ' .disable_sig');
                        getProfile();
                        progressBar();
                        alertify.logPosition("bottom right");
                        alertify.success("Successfully deleted!");
                    }
                });
            }
        );

    });
}