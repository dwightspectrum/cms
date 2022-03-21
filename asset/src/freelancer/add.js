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
    alertify.logPosition("bottom right");
    alertify.success("Successfully added!");
    $('#add_form_modal').modal('hide');
    setTimeout(() => window.location.href = `${CONFIG.BASE_URL}/freelancer/view`, 500);
});

Array.from(document.querySelectorAll('[name="freelancer_site_deployment"]')).forEach(element => {
    element.addEventListener('change', function (radio) {
        if (radio.target.value === 'others') {
            document.getElementById('add-site-deployment-others-panel').classList.remove('hide');
        } else {
            document.getElementById('add-site-deployment-others-panel').classList.add('hide');
        }
    });
});