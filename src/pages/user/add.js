import { Spinner } from "mixins/Spinner.js";
import { Toast } from "mixins/Toast.js";

const tableSpinner = new Spinner(document.getElementById('table-block'));
const userForm = document.getElementById('user_form');
const employedTypePanel = $('#employed-type-panel');

$('.datepicker').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd'
});

document.getElementById('role_id').addEventListener('change', (e) => {
    let val = e.currentTarget.value;

    if (val == 3 || val == 4 || val == 5 || val == 6) {
        employedTypePanel.show();
    }
    else {
        employedTypePanel.hide();
    }
});

userForm.addEventListener('submit', (e) => {
    e.preventDefault();
    tableSpinner.start();
    const data = new FormData(e.target);

    $.ajax({
        type: 'POST',
        url: `${CONFIG.BASE_URL}api/user/add_details`,
        dataType: 'json',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: data,
        success: function (result) {
            if (!result.success) {
                Toast.error("Error!");
                tableSpinner.stop();
                return;
            }

            Toast.success("Successfully added!");
            userForm.reset();
            $('.fileinput').fileinput('clear');
            $('.datepicker').datepicker('setDate', null);
            tableSpinner.stop();
        }
    });
});
