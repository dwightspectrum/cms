
displayNotifications();
getFreelancerPic();
getEmployeePic();

function setPaginationClicks(){
	$('.pagination a[href]').on("click", function(e){
	  e.preventDefault();
	  get($(this).attr('data-ci-pagination-page'));
	});
}

$('#search').keyup(function(){
	get();
});

function displayNotifications(){
	$.ajax({
      	type: 'POST',
      	url: CONFIG.BASE_URL + 'freelancer/get_notification',
      	dataType: 'json',
      	success: function(result){
        	if(result.length > 0){
        		if(result.length > 6){
	                $("#nofication-data").css({"height": "500", "overflow-x": "hidden", "overflow-y": "scroll"});
	            }

              	$("#notification").text(result.length);
              	$("#notification").addClass("notif_animate");

              	setNotificationData(result);
            }else{
              	$("#notification").hide();
              	$("#notification").removeClass("notif_animate");

              	$("#nofication-data")
                .append('<div style="margin: 5px;"><i>No available notification.</i></div>');
                $('#mark_all_btn').hide();
            }
      	}
    }); 
}

function setNotificationData(result){
  	result.forEach(function(obj){
  		$("#nofication-data").append(`<a href="${CONFIG.BASE_URL}freelancer/mark_as_read/${obj.notification_id}/${obj.notification_type_id}" style="background: #ffffff;" class="notification-tooltip" title="Documents Updated:<br> ${obj.notification_details}" data-html="true">
            <div style="padding:5px;">${(obj.notification_category == 'employee')?(obj.employee_first_name):(obj.freelancer_first_name)} ${(obj.notification_category == "employee")?(obj.employee_last_name):(obj.freelancer_last_name)} <font style="color: #000!important;"><i>updated his requirements in</i> Hotwork CMS.</font></div>
            </a>`);
  	});

  	setNotificationTooltip();
}

function setNotificationTooltip(){
    $('.notification-tooltip')
      .tooltipster({
        debug: false,
        contentAsHTML: true,
        delay: 0,
        theme: 'tooltipster-punk',
        functionInit: function(instance, helper){

      }
    });
}

function JSONDecode(str){
	return JSON.parse('{"' + decodeURIComponent(str.replace(/&/g,"\",\"").replace(/=/g,"\":\"")) + '"}');
}

function isEmpty(str){
	return (!str || !str.trim() || str.length === 0)? true:false;
}

function isValidEmail(str){
	var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
	return reg.test(str);
}

function displayError(str){
	if(!isEmpty(str)){
		alertify.logPosition("bottom right");
		alertify.error(str);
	}
}

function isNumber(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
	 	return false;

	return true;
}

async function getFreelancerPic() {
    const res = await fetch(`${CONFIG.BASE_URL}freelancer/get_pic/${CONFIG.freelancer_id}`);
    const data = await res.json();
	// console.log(data);
	if (data) {
    document.getElementById('freelancer_profile_pic').setAttribute('src', `${CONFIG.BASE_URL}asset/freelancers/${data.freelancer_profile || 'no-profile.png'}`);
	}

}
async function getEmployeePic() {
    const res = await fetch(`${CONFIG.BASE_URL}employee/get_profile/${CONFIG.employee_id}`);
    const data = await res.json();
	// console.log(data);
	if (data) {
    document.getElementById('employee_profile_pic').setAttribute('src', `${CONFIG.BASE_URL}asset/employees/${data.employee_photo || 'no-profile.png'}`);
	}

}
