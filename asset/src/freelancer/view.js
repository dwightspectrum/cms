const freelancer_first_name = document.querySelector('#freelancer_edit_form input[name="freelancer_first_name"]');
const freelancer_middle_name = document.querySelector('#freelancer_edit_form input[name="freelancer_middle_name"]');
const freelancer_last_name = document.querySelector('#freelancer_edit_form input[name="freelancer_last_name"]');
const freelancer_contact = document.querySelector('#freelancer_edit_form input[name="freelancer_contact"]');
const freelancer_email = document.querySelector('#freelancer_edit_form input[name="freelancer_email"]');
const freelancer_birthdate = document.querySelector('#freelancer_edit_form input[name="freelancer_birthdate"]');
const freelancer_civil_status = document.querySelector('#freelancer_edit_form select[name="freelancer_civil_status"]');
const freelancer_barangay_street = document.querySelector('#freelancer_edit_form input[name="freelancer_barangay_street"]');
const freelancer_city = document.querySelector('#freelancer_edit_form input[name="freelancer_city"]');
const freelancer_province = document.querySelector('#freelancer_edit_form input[name="freelancer_province"]');
const freelancer_zip_code = document.querySelector('#freelancer_edit_form input[name="freelancer_zip_code"]');
const freelancer_position = document.querySelector('#freelancer_edit_form input[name="freelancer_position"]');
const freelancer_emergency_contact_name = document.querySelector('#freelancer_edit_form input[name="freelancer_emergency_contact_name"]');
const freelancer_emergency_relationship = document.querySelector('#freelancer_edit_form input[name="freelancer_emergency_relationship"]');
// const freelancer_emergency_email = document.querySelector('#freelancer_edit_form input[name="freelancer_emergency_email"]');
const freelancer_emergency_contact_num = document.querySelector('#freelancer_edit_form input[name="freelancer_emergency_contact_num"]');
const freelancer_BPI = document.querySelector('#freelancer_edit_form input[name="freelancer_BPI"]');
const freelancer_TIN = document.querySelector('#freelancer_edit_form input[name="freelancer_TIN"]');
const freelancer_SSS = document.querySelector('#freelancer_edit_form input[name="freelancer_SSS"]');
const freelancer_PAG_IBIG = document.querySelector('#freelancer_edit_form input[name="freelancer_PAG_IBIG"]');
const freelancer_PHILHEALTH = document.querySelector('#freelancer_edit_form input[name="freelancer_PHILHEALTH"]');
const freelancer_handbook = document.querySelector('#freelancer_edit_form input[name="freelancer_handbook"]');
const freelancer_employment_contract = document.querySelector('#freelancer_edit_form input[name="freelancer_employment_contract"]');
const freelancer_id_badges = document.querySelector('#freelancer_edit_form input[name="freelancer_id_badges"]');

const editForm = document.getElementById('freelancer_edit_form');

const editPreviewProfile = document.getElementById('edit_preview_profile');

const searchInput = document.getElementById('search');

let cur_page = 1;

getLists();

searchInput.addEventListener('keyup', (e) => {
  getLists();
});

jQuery('.datepicker-autoclose').datepicker({
  autoclose: true,
  todayHighlight: true,
  format: 'yyyy-mm-dd'
});

document.getElementById('create_freelancer_form').addEventListener('submit', async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const res = await fetch(`${CONFIG.BASE_URL}/freelancer/add_details`, {
                  method: 'POST',
                  body: formData
              });
  const data = await res.json();
  console.log(data);
  if (data.success) {
    getLists();
    clearFormInput('#create_freelancer_form');
    alertify.logPosition("bottom right");
    alertify.success("Successfully added!");
    $('#add_form_modal').modal('hide');
  }
});

document.getElementById('create-freelancer-form').addEventListener('submit', async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const res = await fetch(`${CONFIG.BASE_URL}freelancer/create`, {
                  method: 'POST',
                  body: formData
              });
  const data = await res.json();
  console.log(data);
  if (data.success) {
    // getLists();
    alertify.logPosition("bottom right");
    alertify.success("Successfully added!");
    $('#add_currency_modal').modal('hide');
  }
});

editForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const action = editForm.getAttribute('action');
  const res = await fetch(action, {method: 'POST', body: formData});
  const data = await res.json();
  if(data.success) {
    getLists();
    alertify.logPosition("bottom right");
    alertify.success("Successfully updated!");
    $('#edit_form_modal').modal('hide');
  }
});

document.getElementById('freelancer_profile_edit').addEventListener('change', async (event) => {
  const file = event.target.files[0];
  const reader = new FileReader();
  reader.onload = (e) => editPreviewProfile.setAttribute('src', e.target.result);
  reader.readAsDataURL(file);
});

document.getElementById('freelancer_profile_add').addEventListener('change', async (event) => {
  const file = event.target.files[0];
  const reader = new FileReader();
  reader.onload = (e) => document.getElementById('add_preview_profile').setAttribute('src', e.target.result);
  reader.readAsDataURL(file);
});

Array.from(document.querySelectorAll('#add_form_modal [name="freelancer_site_deployment"]')).forEach(element => {
    element.addEventListener('change', function(radio) {
        if (radio.target.value === 'others') {
            document.getElementById('add-site-deployment-others-panel').classList.remove('hide');
        } else {
            document.getElementById('add-site-deployment-others-panel').classList.add('hide');
        }
    });
});

Array.from(document.querySelectorAll('#edit_form_modal [name="freelancer_site_deployment"]')).forEach(element => {
    element.addEventListener('change', function (radio) {
        if (radio.target.value === 'others') {
            document.getElementById('edit-site-deployment-others-panel').classList.remove('hide');
        } else {
            document.getElementById('edit-site-deployment-others-panel').classList.add('hide');
        }
    });
});

async function getLists(page = 1) {
  const formData = new FormData();
  cur_page = page;
  formData.append('search', searchInput.value);
  formData.append('page', page);
  const fetchData = await fetch(`${CONFIG.BASE_URL}/freelancer/get`, {
                      method: 'POST',
                      body: formData
                    });
  const res = await fetchData.json();
  const dataMap = res.list.length ? res.list.map((item) => (
    `<tr>
      <td class="text-center">${item.freelancer_id}</td>
      <td>
        <img width="51" src="${CONFIG.BASE_URL}asset/freelancers/${item.freelancer_profile || 'no-profile.png'}">
      </td>
      <td>
        <span class="font-medium">${item.freelancer_fullname}</span><br>
        <span class="text-muted">
          ${item.freelancer_first_name}${item.freelancer_middle_name}${item.freelancer_last_name}
        </span>
      </td>
      <td>
        <span>${item.freelancer_email}</span><br>
        <span class="text-muted">${item.freelancer_contact}</span>
      </td>
      <td>
        <span>${item.freelancer_city}</span><br>
        <span>${item.freelancer_province}</span>
      </td>
      <td>
        <span>${getSiteDeployment(item)}</span>
      </td>
      <td>
        <span>${item.missingFields}</span>
      </td>
      <td style="display: flex; justify-content: flex-end;">
          <button title="Edit" style="display: flex;align-items: center;justify-content: center;" class="btn btn-info btn-outline btn-circle btn-lg m-r-5 btn-update" freelancer-id="${item.freelancer_id}"><i class="ti-pencil-alt"></i></button>
          <a title="Profile" href="${CONFIG.BASE_URL}freelancer/profile/${item.freelancer_id}" style="display: flex;align-items: center;justify-content: center;" class="btn btn-success btn-outline btn-circle btn-lg m-r-5 btn-view-profile">
            <i class="fa fa-user"></i>
          </a>
      </td>
    </tr>`
  )).join('') : `<tr><td class="text-center" colspan="5">No records found.</td></tr>`;
  document.getElementById('freelancer-table').innerHTML = dataMap;
  document.getElementById('pagination').innerHTML = res.pagination;
  setPaginationClicks();
  Array.from(document.getElementsByClassName('btn-update'))
    .forEach(elem => {
      elem.addEventListener('click', async (e) => {
        const freelancerId = elem.getAttribute('freelancer-id');
        const res = await fetch(`${CONFIG.BASE_URL}/freelancer/edit/${freelancerId}`);
        const data = await res.json();
        freelancer_first_name.value = data.freelancer_first_name;
        freelancer_middle_name.value = data.freelancer_middle_name;
        freelancer_last_name.value = data.freelancer_last_name;
        freelancer_contact.value = data.freelancer_contact;
        freelancer_email.value = data.freelancer_email;
        freelancer_birthdate.value = data.freelancer_birthdate;
        freelancer_civil_status.value = data.freelancer_civil_status;
        freelancer_barangay_street.value = data.freelancer_barangay_street;
        freelancer_city.value = data.freelancer_city;
        freelancer_province.value = data.freelancer_province;
          freelancer_zip_code.value = data.freelancer_zip_code;
          freelancer_position.value = data.freelancer_position;
        freelancer_emergency_contact_name.value = data.freelancer_emergency_contact_name;
        freelancer_emergency_relationship.value = data.freelancer_emergency_relationship;
        // freelancer_emergency_email.value = data.freelancer_emergency_email;
        freelancer_emergency_contact_num.value = data.freelancer_emergency_contact_num;
        freelancer_BPI.value = data.freelancer_BPI;
          freelancer_TIN.value = data.freelancer_TIN;
          freelancer_SSS.value = data.freelancer_SSS;
          freelancer_PAG_IBIG.value = data.freelancer_PAG_IBIG;
          freelancer_PHILHEALTH.value = data.freelancer_PHILHEALTH;
        editForm.setAttribute('action', `${CONFIG.BASE_URL}/freelancer/update/${freelancerId}`);
        editPreviewProfile.setAttribute('src', `${CONFIG.BASE_URL}/asset/freelancers/${data.freelancer_profile || 'no-profile.png'}`);
        editPreviewProfile.setAttribute('alt', `${data.freelancer_first_name} ${data.freelancer_last_name}`);

        // set site deployment
        const radio = document.querySelector(`#edit_form_modal input[name="freelancer_site_deployment"][value="${data.freelancer_site_deployment}"]`);
        document.querySelector('#edit_form_modal [name="freelancer_site_deployment_others"]').value = data.freelancer_site_deployment_others;

        if (radio) radio.checked = true;

        if (data.freelancer_site_deployment === 'others') {
            document.getElementById('edit-site-deployment-others-panel').classList.remove('hide');
        } else {
            document.getElementById('edit-site-deployment-others-panel').classList.add('hide');
        }

        // set checkboxes
        freelancer_handbook.checked = data.freelancer_handbook == 1 ? true : false ;
        freelancer_employment_contract.checked = data.freelancer_employment_contract == 1 ? true : false ;
        freelancer_id_badges.checked = data.freelancer_id_badges == 1 ? true : false ;

        $('#edit_form_modal').modal('show');
      });
    });
}

function getSiteDeployment({ freelancer_site_deployment, freelancer_site_deployment_others }) {
    let siteDeployment = freelancer_site_deployment || '-';

    if (freelancer_site_deployment === 'others') {
        siteDeployment += ` (${freelancer_site_deployment_others})`;
    }

    return siteDeployment.charAt(0).toUpperCase() + siteDeployment.slice(1);
}

function setPaginationClicks() {
  const href = document.querySelectorAll('.pagination a[href]');
  Array.from(href).forEach(element => {
      element.addEventListener('click', (e) => {
          e.preventDefault();
          getLists(element.getAttribute('data-ci-pagination-page'));
      });
  });
}

function clearFormInput(formId) {
  document.querySelector(`${formId} input[name="freelancer_first_name"]`).value = '';
  document.querySelector(`${formId} input[name="freelancer_middle_name"]`).value = '';
  document.querySelector(`${formId} input[name="freelancer_last_name"]`).value = '';
  document.querySelector(`${formId} input[name="freelancer_contact"]`).value = '';
  document.querySelector(`${formId} input[name="freelancer_email"]`).value = '';
  document.querySelector(`${formId} input[name="freelancer_birthdate"]`).value = '';
  document.querySelector(`${formId} select[name="freelancer_civil_status"]`).value = 'Single';
  document.querySelector(`${formId} input[name="freelancer_barangay_street"]`).value = '';
  document.querySelector(`${formId} input[name="freelancer_city"]`).value = '';
  document.querySelector(`${formId} input[name="freelancer_province"]`).value = '';
    document.querySelector(`${formId} input[name="freelancer_zip_code"]`).value = '';
    document.querySelector(`${formId} input[name="freelancer_position"]`).value = '';
  document.querySelector(`${formId} input[name="freelancer_emergency_contact_name"]`).value = '';
  document.querySelector(`${formId} input[name="freelancer_emergency_relationship"]`).value = '';
//   document.querySelector(`${formId} input[name="freelancer_emergency_email"]`).value = '';
  document.querySelector(`${formId} input[name="freelancer_emergency_contact_num"]`).value = '';
  document.querySelector(`${formId} input[name="freelancer_BPI"]`).value = '';
    document.querySelector(`${formId} input[name="freelancer_TIN"]`).value = '';
    document.querySelector(`${formId} input[name="freelancer_SSS"]`).value = '';
    document.querySelector(`${formId} input[name="freelancer_PAG_IBIG"]`).value = '';
    document.querySelector(`${formId} input[name="freelancer_PHILHEALTH"]`).value = '';
}

document.getElementById('export-csv-button').addEventListener('click', () => {
  document.getElementById('csv_iframe').src = `${CONFIG.BASE_URL}freelancer/export_data?page=${cur_page}&search=${searchInput.value}`;
});