const freelanceId = window.location.pathname.split('/').pop();  
const freelancer_handbook = document.querySelector('#freelancer_edit_form input[name="freelancer_handbook"]');
const freelancer_employment_contract = document.querySelector('#freelancer_edit_form input[name="freelancer_employment_contract"]');
const freelancer_id_badges = document.querySelector('#freelancer_edit_form input[name="freelancer_id_badges"]');

const imgToChange = document.getElementById('change_picture');
const modalpicToChange = document.getElementById('change_picture');

const profilePic = document.getElementById('profile_pic');
const previewProfile = document.getElementById('profile_picture_preview');

const cvPic = document.getElementById('freelancer_CV');
const passportPic = document.getElementById('freelancer_PASSPORT');
const nbiPic = document.getElementById('freelancer_NBI_POLICE');
const rtpcrPic = document.getElementById('freelancer_RT_PCR');
const tinPic = document.getElementById('freelancer_img_TIN');
const sssPic = document.getElementById('freelancer_img_SSS'); 
const pagibigPic = document.getElementById('freelancer_img_PAG_IBIG');
const philPic = document.getElementById('freelancer_img_PHILHEALTH');
const signaturePic = document.getElementById('freelancer_SIGNATURES');
const bpiPic = document.getElementById('freelancer_img_BPI');
const medicalPic = document.getElementById('freelancer_medical');

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

const freelancerPersonalData = [
    'freelancer_first_name',
    'freelancer_last_name',
    'freelancer_middle_name',
    'freelancer_birthdate',
    'freelancer_position',
    'freelancer_civil_status',
    'freelancer_city',
    'freelancer_province',
    'freelancer_site_deployment',
    'freelancer_emergency_contact_name',
    'freelancer_emergency_relationship',
    'freelancer_emergency_contact_num',
    'freelancer_emergency_email',
    'freelancer_handbook',
    'freelancer_employment_contract',
    'freelancer_id_badges',
    'freelancer_contact',
    'freelancer_email',
    'freelancer_barangay_street',
    'freelancer_zip_code',

];

const freelancerImagesData = [
    'freelancer_CV',
    'freelancer_PASSPORT',
    'freelancer_img_TIN',
    'freelancer_img_SSS',
    'freelancer_img_PAG_IBIG',
    'freelancer_img_PHILHEALTH',
    'freelancer_SIGNATURES',
    'freelancer_img_BPI',
    'freelancer_medical',
    'freelancer_NBI_POLICE',
    'freelancer_RT_PCR',
];

const freelancerRequirementsData = [
    'freelancer_BPI',
    'freelancer_TIN',
    'freelancer_SSS',
    'freelancer_PAG_IBIG',
    'freelancer_PHILHEALTH',
];

// getPic();

getProfile();

progressBar();

jQuery('.datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd'
});

// document.querySelectorAll('#requirements-wrapper span.attach_image')
//     .forEach(elem => {
//         elem.addEventListener('click', () => {
//             const src = elem.getAttribute('src');
//             if (src) {
//                 $('#files_picture_modal').modal('show');
//                 previewFilesPic.src = src;
//             }
//         });
//     });



    $("#change_password_form").submit(function(e) {
        e.preventDefault();

        if ($("#new_password").val() != $("#confirm_new_password").val()) {
            alertify.logPosition("bottom right");
            alertify.error("Password does not match!");
            return;
        }

        $.ajax({
            type: 'POST',
            url: CONFIG.BASE_URL + "freelancer/change_password/" + CONFIG.freelancer_id,
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

$('#change-picture').click(() => {  
    $('#profile_picture_modal').modal('show');
    previewProfile.setAttribute('src', profilePic.getAttribute('src'));
});
 
document.getElementById('freelancer_edit_form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const res = await fetch(`${CONFIG.BASE_URL}freelancer/update/${freelanceId}`, {method: 'POST', body: formData});
    const data = await res.json();
    if(data.success) {
      getProfile();
      alertify.logPosition("bottom right");
      alertify.success("Successfully updated!");
      $('#edit_form_modal').modal('hide');
    }
});


// 
// Array.from(document.querySelectorAll('#edit_form_modal [name="freelancer_site_deployment"]')).forEach(element => {
//     element.addEventListener('change', function (radio) {
//         if (radio.target.value === 'others') {
//             document.getElementById('edit-site-deployment-others-panel').classList.remove('hide');
//         } else {
//             document.getElementById('edit-site-deployment-others-panel').classList.add('hide');
//         }
//     });
// });

document.getElementById('btn-update').addEventListener('click', async () => {
    $('#edit_form_modal').modal('show');
    
    const res = await fetch(`${CONFIG.BASE_URL}freelancer/edit/${freelanceId}`);
    const data = await res.json();

    freelancerPersonalData.forEach(personal => {
        const elem = document.querySelector(`input[name=${personal}]`);
        if (elem) {
            if (personal === 'freelancer_site_deployment') {
                const siteDeployment = document.querySelector(`input[name=${personal}]`);
                siteDeployment.checked = siteDeployment.value === data[personal];
            } else {
                document.querySelector(`input[name=${personal}]`).value = data[personal] || '';
            }
        } 
    });

    freelancerRequirementsData.forEach(requirement => {
        const elem = document.querySelector(`#requirements span[requirement="${requirement}"]`);
        if (elem) document.querySelector(`input[name=${requirement}]`).value = data[requirement] || '';
    });

    // set site deployment
    // const radio = document.querySelector(`#edit_form_modal input[name="freelancer_site_deployment"][value="${data.freelancer_site_deployment}"]`);
    // document.querySelector('#edit_form_modal [name="freelancer_site_deployment_others"]').value = data.freelancer_site_deployment_others;

    // if (radio) radio.checked = true;

    // if (data.freelancer_site_deployment === 'others') {
    //     document.getElementById('edit-site-deployment-others-panel').classList.remove('hide');
    // } else {
    //     document.getElementById('edit-site-deployment-others-panel').classList.add('hide');
    // }

   
});

$("#delete-account-btn").on("click", function() {
    const [profileName] = document.getElementsByClassName('profile_fullname');
    swal({
        title: "Are you sure?",
        text: `Are you sure you want to delete <strong>${profileName.innerText}</strong> account?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: true,
        html: true
    },
    
        function() {
            $.ajax({
                url: CONFIG.BASE_URL + "freelancer/remove/" +  CONFIG.freelancer_id,
                type: 'DELETE',
                success: function(result) {
                    alertify.logPosition("bottom right");
                    alertify.success("Successfully deleted!");
                    setTimeout(function() {
                        window.location.href = CONFIG.BASE_URL + "freelancer";
                    }, 500);
                }
            });
        }
    );

});
// document.getElementById('delete-account-btn').addEventListener('click', () => {
//     const [profileName] = document.getElementsByClassName('profile_fullname');
//     swal(
//         {
//             title: "Are you sure?",
//             text: `Are you sure you want to delete <strong>${profileName.innerText}</strong> account?`,
//             type: "warning",
//             showCancelButton: true,
//             confirmButtonColor: "#DD6B55",
//             confirmButtonText: "Yes",
//             closeOnConfirm: true,
//             html: true
//         },
//         async () => {
//             const res = await fetch(`${CONFIG.BASE_URL}/freelancer/remove/${freelanceId}`);
//             const data = await res.json();
            
//             if (data.delete) {
//                 alertify.logPosition("bottom right");
//                 alertify.success(`${profileName.innerText}'s account successfully deleted!`);
//                 setTimeout(() => window.location.href = `${CONFIG.BASE_URL}/freelancer`, 700);
//             }
//         }
//     );
// });



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


document.getElementById('upload_profile').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append('freelancer_profile', imgToChange.files[0]);
    const res = await fetch(`${CONFIG.BASE_URL}freelancer/change_profile/${freelanceId}`, {
                    method: 'POST',
                    body: formData,
                });
    const data = await res.json();
    if (data.freelancer_role == 6 || data.success) {
        profilePic.setAttribute('src', data.filepath);
        document.getElementById('freelancer_profile_pic').setAttribute('src', data.filepath);
        alertify.logPosition("bottom right");
        alertify.success("Successfully updated!");
        // location.reload();
        setTimeout(() => {
            $('#profile_picture_modal').modal('hide');
        }, 500);
    }
});

imgToChange.addEventListener('change', (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = (e) => {
        previewProfile.setAttribute('src', e.target.result);
    } 
    reader.readAsDataURL(file);
});

modalpicToChange.addEventListener('change', (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = (e) => {
        previewCV.setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(file);
});



async function getProfile() {

    const res = await fetch(`${CONFIG.BASE_URL}freelancer/get_profile/${freelanceId}`);
    const data = await res.json();
  
    
    document.getElementById('profile_pic').setAttribute('src', `${CONFIG.BASE_URL}asset/freelancers/${data.freelancer_profile || 'no-profile.png'}`);
    document.getElementById('profile_fullname_2')
        .innerHTML = `${data.freelancer_last_name}, ${data.freelancer_first_name} ${data.freelancer_middle_name || '---'}`;
    document.getElementById('profile_street')
        .innerHTML = `${data.freelancer_barangay_street}`;
    document.getElementById('profile_email')
        .innerHTML = `${data.freelancer_email}`;
    document.getElementById('profile_mobile')
        .innerHTML = `${data.freelancer_contact}`;
    document.getElementById('profile_emergency_num')
        .innerHTML = `${data.freelancer_emergency_contact_num}`;

    freelancerPersonalData.forEach(personal => {
        const elem = document.querySelector(`#personal p[personal-name="${personal}"]`);
        if (elem) elem.innerText = data[personal] || '---';
    });    

    freelancerRequirementsData.forEach(requirement => {
        const elem = document.querySelector(`#requirements span[requirement="${requirement}"]`);
        if (elem) elem.innerText = data[requirement] || '---';
        
    });
    
    document.querySelectorAll('#requirements-wrapper span.attach_image ')
        .forEach(elem => {
            const elemId = elem.getAttribute('id');
            const _src = data[elemId] && `${CONFIG.BASE_URL}asset/freelancers/requirements/${data[elemId]}`;
            if (_src) 
            document.querySelector('#' + elemId).setAttribute('src', _src);
            document
                .querySelector('#' + elemId)
                .innerHTML = `<strong>${data[elemId] || '<span class="text-danger" >No image found.</span>'}</strong>`
                
        });

    document.querySelectorAll('.view_button')
    .forEach(elem => {
        elem.addEventListener('click', (e) => {
            const elemId = elem.getAttribute('id');
            const _src = data[elemId] && `${CONFIG.BASE_URL}asset/freelancers/requirements/${data[elemId]}`;
            if (_src) 
             document.querySelector('#' + elemId).setAttribute('src', _src); 
                $('#files_picture_modal').modal('show');
                previewFilesPic.src = _src;  
            
        });  
    });

    document.querySelectorAll('.download_btn') 
    .forEach(elem => {
        elem.addEventListener('click', (e) => {
            const elemId = elem.getAttribute('id');
            const _src = data[elemId] && `${CONFIG.BASE_URL}asset/freelancers/requirements/${data[elemId]}`;
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
            const _src = data[elemId] && `${CONFIG.BASE_URL}asset/freelancers/requirements/${data[elemId]}`;
            const link = document.createElement("a");
            if (_src) {
            document.querySelector('#' + elemId).setAttribute('src', _src); 
                link.href = _src;
                link.target = '_blank';
                link.click();
            } 
        });  
    });
  


    document.getElementById('profile_handbook').innerHTML = `${(data.freelancer_handbook == 1) ? '<span class="text-success">YES</span>' : '<span class="text-danger">NO</span>'}`;
    document.getElementById('profile_employment_contract').innerHTML = `${(data.freelancer_employment_contract == 1) ? '<span class="text-success">YES</span>' : '<span class="text-danger">NO</span>'}`;
    document.getElementById('profile_id_badges').innerHTML = `${(data.freelancer_id_badges == 1) ? '<span class="text-success">YES</span>' : '<span class="text-danger">NO</span>'}`;

    let siteDeployment = data.freelancer_site_deployment || '---';

    if (data.freelancer_site_deployment === 'others') {
        siteDeployment += ` (${data.freelancer_site_deployment_others})`;
    }

    // set checkboxes
    freelancer_handbook.checked = data.freelancer_handbook == 1 ? true : false;
    freelancer_employment_contract.checked = data.freelancer_employment_contract == 1 ? true : false;
    freelancer_id_badges.checked = data.freelancer_id_badges == 1 ? true : false;

    document.getElementById('profile_site_deployment').innerHTML = siteDeployment.charAt(0).toUpperCase() + siteDeployment.slice(1);
    
    return data;
}


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

document.getElementById('freelancer_form').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData();
    const payloads = [];
    for (const [key, value] of Object.entries(form_files)) {
        payloads.push(value);
    }
    formData.append('form_files', JSON.stringify(payloads));

    const res = await fetch(
        `${CONFIG.BASE_URL}freelancer/add_requirements/${freelanceId}`, {
            method: 'POST', 
            body: formData,
            
    });
    const data = await res.json();
    progressBar();
    //$('#requirements-wrapper').load(document.URL +  ' #requirements-wrapper');
    if(data.success) {
      getProfile();
      displayNotifications();
      alertify.logPosition("bottom right");
      alertify.success("Successfully updated!");
      
      $('#add_form_modal').modal('hide');
    }
});



async function progressBar() {
    
    const profile = await getProfile();
    let count = 0;
    
    freelancerImagesData.forEach(data => {
        if (profile[data] !== null && profile[data] !== "") {
            count += 1;
        }
        
    });
    const progressBarEl = document.getElementById("myBar");
    const progressText = document.querySelector('#myBar .text-progress');
    const percent = Math.round( (count / freelancerImagesData.length) * 100 );

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
                    url: CONFIG.BASE_URL + "freelancer/delete_tin/" +  CONFIG.freelancer_id,
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
                    url: CONFIG.BASE_URL + "freelancer/delete_sss/" +  CONFIG.freelancer_id,
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
                    url: CONFIG.BASE_URL + "freelancer/delete_pagibig/" +  CONFIG.freelancer_id,
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
                    url: CONFIG.BASE_URL + "freelancer/delete_philhealth/" +  CONFIG.freelancer_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#phil-picture').load(document.URL +  ' #phil-picture');
                        $('.disable_philhealth').load(document.URL + ' .disable_philhealth');
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
                    url: CONFIG.BASE_URL + "freelancer/delete_bpi/" +  CONFIG.freelancer_id,
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
                    url: CONFIG.BASE_URL + "freelancer/delete_cv/" +  CONFIG.freelancer_id,
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
                    url: CONFIG.BASE_URL + "freelancer/delete_passport/" +  CONFIG.freelancer_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#passport-picture').load(document.URL +  ' #passport-picture');
                        $('.disable_passport').load(document.URL + ' .disable_passport');
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
                    url: CONFIG.BASE_URL + "freelancer/delete_medical/" +  CONFIG.freelancer_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#medical-picture').load(document.URL +  ' #medical-picture');
                        $('.disable_medical').load(document.URL + ' .disable_medical');
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
                    url: CONFIG.BASE_URL + "freelancer/delete_nbi/" +  CONFIG.freelancer_id,
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
                    url: CONFIG.BASE_URL + "freelancer/delete_swab/" +  CONFIG.freelancer_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#rtpcr-picture').load(document.URL +  ' #rtpcr-picture');
                        $('.disable_rtpcr').load(document.URL + ' .disable_rtpcr');
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
                    url: CONFIG.BASE_URL + "freelancer/delete_signature/" +  CONFIG.freelancer_id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#signature-picture').load(document.URL +  ' #signature-picture');
                        $('.disable_signature').load(document.URL + ' .disable_signature');
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
