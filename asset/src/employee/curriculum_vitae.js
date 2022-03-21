$(document).ready(function(){
  $('.graduate').click(function(){
    if($(this).val() == 1){
      $('#graduate_year_div').show();
    }
    else{
      $('#graduate_year_div').hide();
    }
  });

  var PROFESSIONAL_EXP = CONFIG.professional_experience;
  var SKILLS = CONFIG.skills;
  var LANGUAGES = CONFIG.languages;
  var HOBBIES = CONFIG.hobbies;
  var REFERENCES = CONFIG.references;

  display_prof_exp();
  display_skills();
  display_languages();
  display_hobbies();
  display_references();

  //professional exp functions
  $('#add-prof-exp').click(function(e){
    e.preventDefault();

    if(validate('professional_exp_form')){
      PROFESSIONAL_EXP.push(set_prof_exp_data());
      reset_form('professional_exp_form');
      display_prof_exp();
    }
  });

  function set_prof_exp_data(){
    var data = {
      'company_name' : $('#company_name').val(),
      'company_address' : $('#company_address').val(),
      'employee_position' : $('#company_position').val(),
      'employee_year' : $('#company_year').val()
    };

    return data;
  }

  function display_prof_exp(){
    display(PROFESSIONAL_EXP, 'remove-prof-exp', 'profexp_table', 'prof-exp-data-template', display_prof_exp);
  }

  //skill functions
  $('#add-skill').click(function(e){
    e.preventDefault();

    if(validate('skill_form')){
      SKILLS.push(set_skill_data());
      reset_form('skill_form');
      display_skills();
    }
  });

  function set_skill_data(){
    var data = {
      'employee_skill_name' : $('#skill_name').val()
    };

    return data;
  }

  function display_skills(){
    display(SKILLS, 'remove-skill', 'skill_table', 'skill-data-template', display_skills);
  }

  //language functions
  $('#add-language').click(function(e){
    e.preventDefault();

    if(validate('language_form')){
      LANGUAGES.push(set_language_data());
      reset_form('language_form');
      display_languages();
    }
  });

  function set_language_data(){
    var data = {
      'employee_language_name' : $('#language').val()
    };

    return data;
  }

  function display_languages(){
    display(LANGUAGES, 'remove-language', 'language_table', 'language-data-template', display_languages);
  }

  //hobbies functions
  $('#add-hobby').click(function(e){
    e.preventDefault();

    if(validate('hobby_form')){
      HOBBIES.push(set_hobby_data());
      reset_form('hobby_form');
      display_hobbies();
    }
  });

  function set_hobby_data(){
    var data = {
      'employee_hobby_name' : $('#hobby').val()
    };

    return data;
  }

  function display_hobbies(){
    display(HOBBIES, 'remove-hobby', 'hobby_table', 'hobby-data-template', display_hobbies);
  }

  //reference functions
  $('#add-reference').click(function(e){
    e.preventDefault();

    if(validate('reference_form')){
      REFERENCES.push(set_reference_data());
      reset_form('reference_form');
      display_references();
    }
  });
  
  function set_reference_data(){
    var data = {
      'employee_reference_name' : $('#reference_name').val(),
      'employee_reference_company' : $('#reference_company').val(),
      'employee_reference_position' : $('#reference_position').val(),
      'employee_reference_contact_no' : $('#reference_contact').val()
    };

    return data;
  }

  function display_references(){
    display(REFERENCES, 'remove-reference', 'reference_table', 'reference-data-template', display_references);
  }

  //dynamic functions
  function remove_object(arr, index, callback){
    arr.splice(index, 1);
    callback();
  }

  function display(arr, remove_btn_class, table_id, template_id, callback){
    arr.forEach(function(obj, index){
      obj.action = '<a class="btn btn-danger btn-sm '+remove_btn_class+'" id="' + index + '"><span class="fa fa-trash"></span></a>';
    });

    if(arr.length){
      $('#'+table_id).loadTemplate($('#'+template_id), arr);

      $('.'+remove_btn_class).on('click', function(){
        var index = $(this).attr('id');
        remove_object(arr, index, callback);
      });
    }
    else{
      $('#'+table_id).html('<tr><td align="center" colspan="5">No records found.</td></tr>');
    }
  }

  function validate(formid){
    var valid = true; 
    $('#'+formid+' input').each(function(){
      var value = $(this).val();
      if(value == undefined || value == ''){
        alertify.logPosition("bottom right");
        alertify.error("Please input "+$(this).prev().html()+".");
        valid = false;
        return false;
      }
    });

    return valid;
  }

  function reset_form(formid){
    $('#'+formid+' input').each(function(){
      $(this).val('');
    });
  }

  //submit form
  $('#curriculum_vitae_form').submit(function(e){
    e.preventDefault();

    // if(!PROFESSIONAL_EXP.length){
    //   alertify.logPosition("bottom right");
    //   alertify.error("Please add Prossefional Experience.");
    //   return false;
    // }

    if(!SKILLS.length){
      alertify.logPosition("bottom right");
      alertify.error("Please add Skills.");
      return false;
    }

    // if(!LANGUAGES.length){
    //   alertify.logPosition("bottom right");
    //   alertify.error("Please add Languages.");
    //   return false;
    // }

    // if(!HOBBIES.length){
    //   alertify.logPosition("bottom right");
    //   alertify.error("Please add Hobbies/Interests.");
    //   return false;
    // }

    if(!REFERENCES.length){
      alertify.logPosition("bottom right");
      alertify.error("Please add References.");
      return false;
    }

    var data = new FormData(this);
    data.append('professional_exp', JSON.stringify(PROFESSIONAL_EXP));
    data.append('skills', JSON.stringify(SKILLS));
    data.append('languages', JSON.stringify(LANGUAGES));
    // data.append('hobbies', JSON.stringify(HOBBIES));
    data.append('references', JSON.stringify(REFERENCES));

    $.ajax({
      type: 'POST',
      url: CONFIG.BASE_URL + 'employee/update_curriculum_vitae/' + CONFIG.employee_id,
      dataType: 'json',
      processData: false,
      contentType: false,
      cache: false,
      data: data,
      success: function(result){
        alertify.logPosition("bottom right");
        alertify.success("Successfully submitted!");

        setTimeout(function () { 
          window.location.href = CONFIG.BASE_URL + 'employee/profile/' + CONFIG.employee_id;
        }, 500);

      }
    });
  });
});