import ky from "ky";
import Swal from 'sweetalert2';
import { setPagination } from "mixins/Pagination.js";
import { Spinner } from "mixins/Spinner.js";
import { onClickClassesListener } from 'mixins/EventListener.js';
import { Toast } from "mixins/Toast.js";
import { renderSelect2 } from "mixins/Select2.js";

// Spinner
const spinner = new Spinner(document.getElementById('users'));
const emergencyContactSpinner = new Spinner(document.getElementById('emergency_contacts'));
const userDetailsSpinner = new Spinner(document.getElementById('user-details-block'));
// Filters
const companyFilterElement = document.getElementById('company_id');
const roleFilterElement = document.getElementById('role_id');
const arrangeFilterElement = document.getElementById('arrange_by');
const sortFilterElement = document.getElementById('sort_by');
const searchInput = document.getElementById('search');
// Table
const userTable = document.getElementById('user-table');
const userPagination = document.getElementById('pagination');
// Buttons & elements
const emergencyContactForm = document.getElementById('emergency_contact_form');
const addEmergencyContactPanel = document.getElementById('add-emergency-contact-panel');
const updateEmergencyContactPanel = document.getElementById('update-emergency-contact-panel');
const getEmergencyButtonClasses = () => document.getElementsByClassName('emergency-contact-btn');
const getDeleteUserButtonClasses = () => document.getElementsByClassName('delete-user');
const getLockUserButtonClasses = () => document.getElementsByClassName('lock-user-btn');
const getUnlockUserButtonClasses = () => document.getElementsByClassName('unlock-user-btn');
const getUserPopupButtonClasses = () => document.getElementsByClassName('user-popup');
// Modals
const emergencyContactModal = $('#emergency_contact_modal');
const userDetailsModal = $('#user_details_detail');
// API
const userApi = ky.create({ prefixUrl: `${CONFIG.BASE_URL}api/user/` });
const getUsers = (data) => userApi.post(`get`, { body: data }).json();
const getUser = (user_id) => userApi.get(`get_user/${user_id}`).json();
const lockUser = (user_id) => userApi.get(`lock/${user_id}`).json();
const unlockUser = (user_id) => userApi.get(`unlock/${user_id}`).json();
const deleteUser = (user_id) => userApi.get(`delete/${user_id}`).json();
const addUserEmergencyContact = (user_id, data) => userApi.post(`addEmergencyContact/${user_id}`, { body: data }).json();
const updateUserEmergencyContact = (user_id, data) => userApi.post(`updateEmergencyContact/${user_id}`, { body: data }).json();
const getUserEmergencyContacts = (user_id, data) => userApi.post(`getEmergencyContacts/${user_id}`, { body: data }).json();
const deleteUserEmergencyContact = (uec_id) => userApi.get(`deleteEmergencyContact/${uec_id}`).json();
const getUserEmergencyContact = (uec_id) => userApi.get(`getEmergencyContact/${uec_id}`).json();

let CURPAGE = 1;
let SELECTED_ID = 0;
let ECCURPAGE = 1;
let EDIT_EC = 0;

const getUserTableRows = (result) => {
    const list = result.list;
    if (!list.length) return '<tr><td align="center" colspan="8">No records found.</td></tr>';

    return list.reduce((prev, row) => {
        let userActions =  `<div class="btn-group">
                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-cog fa-spin m-r-5"></i> <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#" class="user-popup m-r-5" title="View" id="${row.user_id}"><span class="fa fa-search"></span>&nbsp; View</a></li>
                                    ${(!(result.read_only == 1 && CONFIG.company_id != row.company_id))?
                                        `<li><a href="${CONFIG.BASE_URL}admin/user/edit/${row.user_id}"><span class="fa fa-pencil"></span>&nbsp; Edit</a></li>
                                         <li><a href="" data-identifier="${row.user_id}" title="Delete" data-name="${row.user_firstname + ' ' + row.user_lastname}" class="delete-user m-r-5"><i class="fa fa-trash"></i>&nbsp; Delete</a></li>
                                         <li class="divider"></li>
                                        ${(row.user_status == 'locked')?
                                            `<li><a href="" data-identifier="${row.user_id}" title="Lock" data-name="${row.user_firstname + ' ' + row.user_lastname}" class="delete-user unlock-user-btn"><span class="fa fa-lock"></span> Unlock</a></li>`:
                                            `<li><a href="" data-identifier="${row.user_id}" title="Unlock" data-name="${row.user_firstname + ' ' + row.user_lastname}" class="delete-user lock-user-btn"><span class="fa fa-unlock"></span> Lock</a></li>`
                                        }
                                        `
                                        : ''
                                    }
                                    <li class="divider"></li>
                                    <li><a href="" data-identifier="${row.user_id}" title="Emergency Contacts" data-name="${row.user_firstname + ' ' + row.user_lastname}" class="emergency-contact-btn"><i class="fa fa-users"></i>&nbsp; Emergency Contacts</a></li>
                                </ul>
                            </div>`

        return `${prev}
                    <tr>
                        <td class="font-medium" align="center">${row.user_identification}</td>
                        <td align="center"><img src='${row.user_photo}' width="70"></td>
                        <td>
                          <span class="font-medium">${row.user_lastname}</span>
                          <br/><span class="text-muted">${row.user_firstname}</span>
                        </td>
                        <td>
                          <span class="font-medium">${row.user_contact_number}</span>
                          <br/><span class="text-muted">${row.user_email_address}</span>
                        </td>
                        <td>${row.user_current_address}</td>
                        <td>
                          <span class="font-medium">${row.company_name}</span>
                          <br/><span class="text-muted">${row.role_name}</span>
                        </td>
                        <td align="center">${userActions}</td>
                    </tr>`;
    }, '');
}

const get = async (page = 1) => {
    spinner.start();
    CURPAGE = page;

    const formData = new FormData();
    formData.set('page', page);
    formData.set('search', searchInput.value || '');
    formData.set('arrange_by', arrangeFilterElement.value || '');
    formData.set('sort_by', sortFilterElement.value || '');
    formData.set('company_id', companyFilterElement && companyFilterElement.value || 0);
    formData.set('role_id', roleFilterElement.value || 0);

    const result = await getUsers(formData);
    userTable.innerHTML = getUserTableRows(result);
    userPagination.innerHTML = result.pagination;
    setPagination('#pagination', get);
    initFormButtons();

    spinner.stop();
}

function initFormButtons() {
    onClickClassesListener(getUserPopupButtonClasses(), (e) => {
        var id = e.currentTarget.id;
        view_details(id);
    });

    onClickClassesListener(getDeleteUserButtonClasses(), (e) => {
        e.preventDefault();
        const user_id = e.currentTarget.dataset.identifier;
        const user_name = e.currentTarget.dataset.name;

        Swal.fire({
            title: 'Are you sure?',
            html: `Are you sure you want to delete ${user_name}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: "Yes",
            allowOutsideClick: true,
            reverseButtons: true
        }).then(async (result) => {
            if (result.value) {
                await deleteUser(user_id);
                Toast.success("Successfully deleted.");
                get(CURPAGE);
            }
        });
    });

    onClickClassesListener(getLockUserButtonClasses(), (e) => {
        e.preventDefault();
        const user_id = e.currentTarget.dataset.identifier;
        const user_name = e.currentTarget.dataset.name;

        Swal.fire({
            title: 'Are you sure?',
            html: `Are you sure you want to lock ${user_name}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: "Yes",
            allowOutsideClick: true,
            reverseButtons: true
        }).then(async (result) => {
            if (result.value) {
                await lockUser(user_id);
                Toast.success("Successfully locked!");
                get(CURPAGE);
            }
        });
    });

    onClickClassesListener(getUnlockUserButtonClasses(), (e) => {
        e.preventDefault();
        const user_id = e.currentTarget.dataset.identifier;
        const user_name = e.currentTarget.dataset.name;

        Swal.fire({
            title: 'Are you sure?',
            html: `Are you sure you want to unlock ${user_name}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: "Yes",
            allowOutsideClick: true,
            reverseButtons: true
        }).then(async (result) => {
            if (result.value) {
                await unlockUser(user_id);
                Toast.success("Successfully unlocked!");
                get(CURPAGE);
            }
        });
    });

    onClickClassesListener(getEmergencyButtonClasses(), function (e) {
        e.preventDefault();
        SELECTED_ID = e.currentTarget.dataset.identifier;
        document.getElementById('show-username').innerHTML = e.currentTarget.dataset.name;
        emergencyContactModal.modal('show');
        displayEmergencyContacts();
    });
};

function formatUserDetailsTemplate(user) {
    return `<div class="row user_details">
        <div class="col-xs-2">
            <img src="${user.user_profile}" alt="varun" class="img-circle img-responsive" width="100">
        </div>
        <div class="col-xs-10">
            <h3 class="m-b-0">${user.user_fullname}</h3>
            <span class="line"></span>
            <h5><span class="mdi mdi-account-card-details"></span> <span><b>${user.user_identification}</b></span></h5>
            <h5><span class="mdi mdi-email-outline"></span> <span>${user.user_email_address}</span></h5>
            <h5><span class="mdi mdi-phone"></span> <span>${user.user_contact_number}</span></h5>
        </div>
    </div>
    <div class="card card-outline-danger">
        <div class="card-block document-details">
            <div class="row">
                <div class="col-md-6">
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left bg-success"> <span class="mdi mdi-home"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Employed By</a> </div>
                                <div class="desc">${user.company_name}</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-primary"> <span class="mdi mdi-account-plus"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Employed Type</a> </div>
                                <div class="desc">${user.user_employed_type}</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-warning"> <span class="mdi mdi-gender-male"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Gender</a> </div>
                                <div class="desc">${user.user_gender}</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-inverse"> <span class="mdi mdi-home-map-marker"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Current Address</a> </div>
                                <div class="desc">${user.user_current_address}</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-danger"> <span class="mdi mdi-shield-outline"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">SSS Number</a> </div>
                                <div class="desc">${user.user_sss_number}</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-danger"> <span class="mdi mdi-adjust"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Blood Type</a> </div>
                                <div class="desc">${user.user_blood_type}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left bg-info"> <span class="mdi mdi-account-plus"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Role</a> </div>
                                <div class="desc">${user.role_name}</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-danger"> <span class="mdi mdi-cake-layered"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Birthdate</a> </div>
                                <div class="desc">${user.user_birthdate}</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-warning"> <span class="mdi mdi-cake-layered"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Birthplace</a> </div>
                                <div class="desc">${user.user_birthplace}</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-primary"> <span class="fa fa-flag"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Nationality</a> </div>
                                <div class="desc">${user.user_nationality}</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-success"> <span class="mdi mdi-home-variant"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Permanent Address</a> </div>
                                <div class="desc">${user.user_permanent_address}</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-danger"> <span class="mdi mdi-calendar-clock"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Date of Entry <span class="text-muted">(Work Start Date)</span></a> </div>
                                <div class="desc">${user.user_start_date}</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-danger"> <span class="mdi mdi-tshirt-crew"></span> </div>
                            <div class="sl-right">
                                <div><a href="#">Clothe Size</a> </div>
                                <div class="desc">${user.user_clothe_size}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
}

async function view_details(id) {
    userDetailsModal.modal('show');
    userDetailsSpinner.start();
    const result = await getUser(id);

    result.user_fullname = `${result.user_firstname} ${result.user_middlename} ${result.user_lastname}`;
    result.user_profile = `${CONFIG.BASE_URL}storage/users/${result.user_photo}`;
    result.user_clothe_size = result.user_clothe_size.replace(/\r?\n/g, '<br />');
    document.getElementById('document_details_preview').innerHTML = formatUserDetailsTemplate(result);
    userDetailsSpinner.stop();
};

document.getElementById('emergency_contact_form').addEventListener('submit', function (e) {
    e.preventDefault();

    if (SELECTED_ID == 0) {
        return;
    }

    const form = new FormData(e.target);

    if (EDIT_EC == 0) {
        addEmergencyContact(form, SELECTED_ID);
    } else {
        updateEmergencyContact(form, EDIT_EC);
        document.getElementById('add-emergency-contact-panel').style.display = 'block';
        document.getElementById('update-emergency-contact-panel').style.display = 'none';
    }

    e.target.reset();
});

async function addEmergencyContact(form, id) {
    const result = await addUserEmergencyContact(id, form);

    if (result.success) {
        Toast.success('Successfully added.');
        displayEmergencyContacts();
    }
}

async function updateEmergencyContact(form, id) {
    const result = await updateUserEmergencyContact(id, form);

    if (result.success) {
        EDIT_EC = 0;
        Toast.success('Successfully updated.');
        displayEmergencyContacts();
    }
}

function displayEmergencyContacts(page = 1) {
    emergencyContactSpinner.start();
    ECCURPAGE = page;
    getEmergencyContacts(page, SELECTED_ID);
    emergencyContactSpinner.stop();
}

async function getEmergencyContacts(page, user_id) {
    let rows = '<tr><td class="text-center" colspan="7">No records found.</td></tr>';
    let form = new FormData();
    form.set('page', page);

    const result = await getUserEmergencyContacts(user_id, form);
    const readonly = (Number(CONFIG.company_id) == Number(result.user_company_id) || Number(CONFIG.role) == 1) ? false : true;

    document.getElementById('emergency_contact_form').style.display = (readonly) ? 'none' : 'block';

    if (result.list.length) {
        rows = result.list.reduce((prev, row) => {
            let actions = '<td></td>';

            if (!readonly) {
                actions = `<td align="center">
                                <a class='btn btn-warning btn-sm edit-emergency-contact' data-identifier='${row.uec_id}'><i class="fa fa-pencil"></i></a>
                                <a class='btn btn-danger btn-sm m-r-5 delete-emergency-contact'> <span class='fa fa-trash'></span></a>
                                <a class='btn btn-danger btn-sm confirm-delete-emergency-contact m-t-5' id='${row.uec_id}' style='display:none;'>CONFIRM</a>
                            </td>`;
            }

            return `${prev}
                    <tr>
                        <td>${row.uec_firstname}</td>
                        <td>${row.uec_middlename}</td>
                        <td>${row.uec_lastname}</td>
                        <td>${row.uec_relationship}</td>
                        <td align="center">${row.uec_telephone_number}</td>
                        <td align="center">${row.uec_mobile_number}</td>
                        ${actions}
                    </tr>`;
        }, '');
    }

    document.getElementById('emergency_contacts_table').innerHTML = rows;
    document.getElementById('emergency_contacts_pagination').innerHTML = result.pagination;
    setPagination('#emergency_contacts_pagination', displayEmergencyContacts);
    initEmergencyContactEvents();
}

function initEmergencyContactEvents() {
    const deleteECClassNames = document.getElementsByClassName("delete-emergency-contact");
    const confirmDeleteECClassNames = document.getElementsByClassName("confirm-delete-emergency-contact");
    const editECClassNames = document.getElementsByClassName("edit-emergency-contact");

    onClickClassesListener(deleteECClassNames, function (e) {
        e.preventDefault();
        $(this).next().toggle();
    });

    onClickClassesListener(confirmDeleteECClassNames, async function (e) {
        e.preventDefault();
        const result = await deleteUserEmergencyContact(e.currentTarget.id);

        if (!result.success) {
            Toast.error("Error!");
            return;
        }

        Toast.success("Successfully deleted!");
        displayEmergencyContacts(ECCURPAGE);
    });

    onClickClassesListener(editECClassNames, function (e) {
        e.preventDefault();
        EDIT_EC = e.currentTarget.dataset.identifier;
        setEmergencyContact(EDIT_EC);
        addEmergencyContactPanel.style.display = 'none';
        updateEmergencyContactPanel.style.display = 'block';
    });
}

async function setEmergencyContact(uec_id) {
    emergencyContactSpinner.start();
    const result = await getUserEmergencyContact(uec_id);

    emergencyContactForm.querySelector('[name="uec_firstname"]').value = result.uec_firstname;
    emergencyContactForm.querySelector('[name="uec_middlename"]').value = result.uec_middlename;
    emergencyContactForm.querySelector('[name="uec_lastname"]').value = result.uec_lastname;
    emergencyContactForm.querySelector('[name="uec_relationship"]').value = result.uec_relationship;
    emergencyContactForm.querySelector('[name="uec_telephone_number"]').value = result.uec_telephone_number;
    emergencyContactForm.querySelector('[name="uec_mobile_number"]').value = result.uec_mobile_number;
    emergencyContactSpinner.stop();
}

document.getElementById('cancel-update-btn').addEventListener('click', function (e) {
    e.preventDefault();
    EDIT_EC = 0;
    addEmergencyContactPanel.style.display = 'block';
    updateEmergencyContactPanel.style.display = 'none';
    emergencyContactForm.reset();
});


get();
// Listeners
searchInput.addEventListener('keyup', () => get());
/*roleFilterElement.addEventListener('change', () => get());
if (companyFilterElement) companyFilterElement.addEventListener('change', () => get());*/

renderSelect2('company_id');
renderSelect2('role_id');
renderSelect2('arrange_by');
renderSelect2('sort_by');

// company filter
$('#company_id').on('change', function() {
    get();
});

// role filter
$('#role_id').on('change', function(){
    get();
});

// arrange by filter
$('#arrange_by').on('change', function(){
    get();
});

// sort by filter
$('#sort_by').on('change', function(){
    get();
});