window.addEventListener("DOMContentLoaded", (event) => {
    // toaster intilisation
    toastr.options = {
      closeButton: false,
      debug: false,
      newestOnTop: false,
      progressBar: true,
      positionClass: "toast-top-right",
      preventDuplicates: false,
      showDuration: "500",
      hideDuration: "500",
      timeOut: "1500",
      showEasing: "swing",
      hideEasing: "linear",
      showMethod: "fadeIn",
      hideMethod: "fadeOut",
    };
  });  
jQuery(document).ready(function(){

    // add new filter
    jQuery(document).on('click','#addNewFilter',function(){
        const option_type = jQuery('#option_type').val();    
        const option_label = jQuery('#option_label').val();   
        const option_display = jQuery('#option_display').val();   
        const option_select = jQuery('#option_select').val(); 
        jQuery('input,select').css('border','#ced4da 1px solid');   
        if(jQuery.trim(option_type) != '' && jQuery.trim(option_label) != '' && jQuery.trim(option_display) !='' && jQuery.trim(option_select) != '')
        {
            jQuery.ajax({
                method: "POST",
                url: "/createNewFilteritem",
                data: {option_type:option_type,option_label:option_label,option_display:option_display,option_select:option_select
                },
                beforeSend: function(){
                  jQuery('.loader').addClass('__showloader');
                },
                success: function(response){
                  
                  if(response.status==1)
                  {
                    $html='';
                    response.filterData.map(function(v,i){
                      $html+= `<tr>
                      <td>
                        <label class="switch">
                            <input type="checkbox" data-fid="${ v.filter_id }" ${v.option_status == 1 ? 'checked':'' }>
                            <span class="slider round"></span>
                        </label>
                      </td>
                      <td>${ v.option_label }</td>
                      <td>${ v.option_type }</td>
                      <td>${ v.option_display }</td>
                      <td> 
                          <a href="#" class="wrap_delete" data-fid="${ v.filter_id }"><span class="delete">
                              <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.7751 2.00016H8.48346V1.5835C8.48346 0.894251 7.9227 0.333496 7.23346 0.333496H5.56679C4.87755 0.333496 4.31679 0.894251 4.31679 1.5835V2.00016H2.02513C1.45075 2.00016 0.983459 2.46745 0.983459 3.04183V4.50016C0.983459 4.73027 1.17002 4.91683 1.40013 4.91683H1.62783L1.98781 12.4763C2.01961 13.1439 2.56804 13.6668 3.23638 13.6668H9.56388C10.2322 13.6668 10.7807 13.1439 10.8124 12.4763L11.1724 4.91683H11.4001C11.6302 4.91683 11.8168 4.73027 11.8168 4.50016V3.04183C11.8168 2.46745 11.3495 2.00016 10.7751 2.00016ZM5.15013 1.5835C5.15013 1.35376 5.33705 1.16683 5.56679 1.16683H7.23346C7.4632 1.16683 7.65013 1.35376 7.65013 1.5835V2.00016H5.15013V1.5835ZM1.81679 3.04183C1.81679 2.92696 1.91026 2.8335 2.02513 2.8335H10.7751C10.89 2.8335 10.9835 2.92696 10.9835 3.04183V4.0835C10.855 4.0835 2.3489 4.0835 1.81679 4.0835V3.04183ZM9.98005 12.4366C9.96945 12.6592 9.78664 12.8335 9.56388 12.8335H3.23638C3.01359 12.8335 2.83078 12.6592 2.8202 12.4366L2.46211 4.91683H10.3381L9.98005 12.4366Z" fill="#1C2B4B"/>
                              </svg>
                          </span> </a>
                          <a href="#" class="wrap_edit" data-fid="${ v.filter_id }">
                              <span class="edit">
                                  <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M10.3608 7.46663C10.1545 7.46663 9.99412 7.64997 9.99412 7.8333V10.4C9.99412 10.8125 9.65037 11.1333 9.26079 11.1333H1.92745C1.51495 11.1333 1.19412 10.8125 1.19412 10.4V3.06663C1.19412 2.67705 1.51495 2.3333 1.92745 2.3333H4.49412C4.67745 2.3333 4.86079 2.17288 4.86079 1.96663C4.86079 1.7833 4.67745 1.59997 4.49412 1.59997H1.92745C1.10245 1.59997 0.460785 2.26455 0.460785 3.06663V10.4C0.460785 11.225 1.10245 11.8666 1.92745 11.8666H9.26079C10.0629 11.8666 10.7275 11.225 10.7275 10.4V7.8333C10.7275 7.64997 10.5441 7.46663 10.3608 7.46663ZM11.8504 1.11872L11.2087 0.477051C11.0025 0.247884 10.7275 0.133301 10.4295 0.133301C10.1545 0.133301 9.87954 0.247884 9.65037 0.477051L4.17329 5.95413C3.96704 6.16038 3.82954 6.41247 3.76079 6.71038L3.39412 8.61247C3.34828 8.7958 3.48579 8.9333 3.6462 8.9333C3.66912 8.9333 3.69204 8.9333 3.71495 8.9333L5.61704 8.56663C5.91495 8.49788 6.16704 8.36038 6.37329 8.15413L11.8504 2.67705C12.2858 2.24163 12.2858 1.53122 11.8504 1.11872ZM5.8462 7.62705C5.75454 7.74163 5.61704 7.81038 5.47954 7.8333L4.24204 8.08538L4.49412 6.84788C4.51704 6.71038 4.58578 6.57288 4.70037 6.48122L8.77954 2.37913L9.94829 3.54788L5.8462 7.62705ZM11.3462 2.14997L10.4525 3.04372L9.2837 1.87497L10.1775 0.981218C10.2691 0.889551 10.3837 0.866634 10.4295 0.866634C10.4983 0.866634 10.6129 0.889551 10.7045 0.981218L11.3462 1.62288C11.4379 1.71455 11.4608 1.82913 11.4608 1.89788C11.4608 1.94372 11.4379 2.0583 11.3462 2.14997Z" fill="#1C2B4B"/>
                                  </svg>
                              </span>
                          </a>
                          </td>
                    </tr>`
                    });
                    jQuery('#shopFilters').html($html);
                    toastr["success"](response.success_message, "Success");
                    jQuery("#filterCount").text(jQuery('#shopFilters tr').length);
                    jQuery('.loader').removeClass('__showloader');
                  }
                  else
                  {
                    toastr["error"](response.error_message, "Error");
                  }
                  $("#add_filter_option").modal("hide");
                  $('#add_more-options')[0].reset();
                }
                
              });
        }
        else
        {
            if(jQuery.trim(option_type) == '' && jQuery.trim(option_label) == '' && jQuery.trim(option_display) =='' && jQuery.trim(option_select) == '')
            {
                toastr["error"]("All fields are required.", "Error");
            }
            if(option_type == '')
            {
                toastr["error"]("Option type is required.", "Error");
                jQuery('#option_type').css('border','red 1px solid');   
            }
             if(option_label == '')
            {
                toastr["error"]("Option label is required.", "Error");
                jQuery('#option_label').css('border','red 1px solid'); 
            }
             if(option_display == '')
            {
                toastr["error"]("Option display is required.", "Error");
                jQuery('#option_display').css('border','red 1px solid'); 
            }
            if(option_select == '')
            {
                toastr["error"]("Option select is required.", "Error");
                jQuery('#option_select').css('border','red 1px solid'); 
            }
        }
        

    });

    // Delete filter
    jQuery(document).on('click','.wrap_delete',function(e){
      e.preventDefault();
      $el = jQuery(this);
      filterId = $el.data('fid');
      jQuery.ajax({
        method: "POST",
        url: "/deleteFilter",
        data: {fid:filterId},
        beforeSend: function(){
          jQuery('.loader').addClass('__showloader');
        },
        success: function(response){
          
          if(response.status==1)
          {
            
            toastr["success"](response.success_message, "Success");
            $el.parents('tr').remove();
            jQuery("#filterCount").text(jQuery('#shopFilters tr').length);
          }
          else
          {
            toastr["error"](response.error_message, "Error");
          }
          jQuery('.loader').removeClass('__showloader');
        }
        
      });

    });

    // change filter status
    jQuery(document).on('click','#shopFilters tr .switch input[type="checkbox"]',function(e){
      $el = jQuery(this);
      updateStatus = $el.prop('checked')===true?1:0;
      console.log(updateStatus);
      filterId = $el.data('fid');
      jQuery.ajax({
        method: "POST",
        url: "/updateFilterStatus",
        data: {fid:$el.data('fid'),status:updateStatus},
        beforeSend: function(){
          jQuery('.loader').addClass('__showloader');
        },
        success: function(response){
          if(response.status==1)
          {
            toastr["success"](response.success_message, "Success");
          }
          else
          {
            toastr["error"](response.error_message, "Error");
          }
          jQuery('.loader').removeClass('__showloader');
        }
        
      });
    });

    //Edit update poup filter 
    jQuery(document).on('click','.wrap_edit',function(e){
      e.preventDefault();
      $el = jQuery(this);
      filterId = $el.data('fid');
      jQuery.ajax({
        method: "POST",
        url: "/editFilter",
        data: {fid:filterId},
        beforeSend: function(){
          jQuery('.loader').addClass('__showloader');
        },
        success: function(response){
          
          if(response.status==1)
          {
             response.data.map(function(v){
              jQuery('.edit_more-options #filterId').val(v.filter_id)
              jQuery('.edit_more-options #option_label').val(v.option_label);
              jQuery('.edit_more-options #option_select').val(v.option_select);
              jQuery('.edit_more-options #option_display option[value="'+v.option_display+'"]').attr('selected', true);
              jQuery('.edit_more-options #option_type option[value="'+v.option_type+'"]').attr('selected', true);
              jQuery('#edit_filter_option').modal('show');
             });
          }
          else
          {
            toastr["error"](response.error_message, "Error");
          }
          jQuery('.loader').removeClass('__showloader');
        }
        
      });

    });

    // Update filter

    jQuery(document).on('click','.updatefilter',function(e){

      const filterId = jQuery('.edit_more-options #filterId').val();
      const option_type = jQuery('.edit_more-options #option_type').val();    
      const option_label = jQuery('.edit_more-options #option_label').val();   
      const option_display = jQuery('.edit_more-options #option_display').val();   
      const option_select = jQuery('.edit_more-options #option_select').val(); 
      jQuery('input,select').css('border','#ced4da 1px solid');   
      if(jQuery.trim(option_type) != '' && jQuery.trim(option_label) != '' && jQuery.trim(option_display) !='' && jQuery.trim(option_select) != '')
      {
          jQuery.ajax({
              method: "POST",
              url: "/updateFilterItem",
              data: {filterId:filterId,option_type:option_type,option_label:option_label,option_display:option_display,option_select:option_select
              },
              beforeSend: function(){
                jQuery('.loader').addClass('__showloader');
              },
              success: function(response){
                
                if(response.status==1)
                {
                  $html='';
                  response.filterData.map(function(v,i){
                    $html+= `<tr>
                    <td>
                      <label class="switch">
                          <input type="checkbox" data-fid="${ v.filter_id }" ${v.option_status == 1 ? 'checked':'' }>
                          <span class="slider round"></span>
                      </label>
                    </td>
                    <td>${ v.option_label }</td>
                    <td>${ v.option_type }</td>
                    <td>${ v.option_display }</td>
                    <td> 
                        <a href="#" class="wrap_delete" data-fid="${ v.filter_id }"><span class="delete">
                            <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.7751 2.00016H8.48346V1.5835C8.48346 0.894251 7.9227 0.333496 7.23346 0.333496H5.56679C4.87755 0.333496 4.31679 0.894251 4.31679 1.5835V2.00016H2.02513C1.45075 2.00016 0.983459 2.46745 0.983459 3.04183V4.50016C0.983459 4.73027 1.17002 4.91683 1.40013 4.91683H1.62783L1.98781 12.4763C2.01961 13.1439 2.56804 13.6668 3.23638 13.6668H9.56388C10.2322 13.6668 10.7807 13.1439 10.8124 12.4763L11.1724 4.91683H11.4001C11.6302 4.91683 11.8168 4.73027 11.8168 4.50016V3.04183C11.8168 2.46745 11.3495 2.00016 10.7751 2.00016ZM5.15013 1.5835C5.15013 1.35376 5.33705 1.16683 5.56679 1.16683H7.23346C7.4632 1.16683 7.65013 1.35376 7.65013 1.5835V2.00016H5.15013V1.5835ZM1.81679 3.04183C1.81679 2.92696 1.91026 2.8335 2.02513 2.8335H10.7751C10.89 2.8335 10.9835 2.92696 10.9835 3.04183V4.0835C10.855 4.0835 2.3489 4.0835 1.81679 4.0835V3.04183ZM9.98005 12.4366C9.96945 12.6592 9.78664 12.8335 9.56388 12.8335H3.23638C3.01359 12.8335 2.83078 12.6592 2.8202 12.4366L2.46211 4.91683H10.3381L9.98005 12.4366Z" fill="#1C2B4B"/>
                            </svg>
                        </span> </a>
                        <a href="#" class="wrap_edit" data-fid="${ v.filter_id }">
                            <span class="edit">
                                <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3608 7.46663C10.1545 7.46663 9.99412 7.64997 9.99412 7.8333V10.4C9.99412 10.8125 9.65037 11.1333 9.26079 11.1333H1.92745C1.51495 11.1333 1.19412 10.8125 1.19412 10.4V3.06663C1.19412 2.67705 1.51495 2.3333 1.92745 2.3333H4.49412C4.67745 2.3333 4.86079 2.17288 4.86079 1.96663C4.86079 1.7833 4.67745 1.59997 4.49412 1.59997H1.92745C1.10245 1.59997 0.460785 2.26455 0.460785 3.06663V10.4C0.460785 11.225 1.10245 11.8666 1.92745 11.8666H9.26079C10.0629 11.8666 10.7275 11.225 10.7275 10.4V7.8333C10.7275 7.64997 10.5441 7.46663 10.3608 7.46663ZM11.8504 1.11872L11.2087 0.477051C11.0025 0.247884 10.7275 0.133301 10.4295 0.133301C10.1545 0.133301 9.87954 0.247884 9.65037 0.477051L4.17329 5.95413C3.96704 6.16038 3.82954 6.41247 3.76079 6.71038L3.39412 8.61247C3.34828 8.7958 3.48579 8.9333 3.6462 8.9333C3.66912 8.9333 3.69204 8.9333 3.71495 8.9333L5.61704 8.56663C5.91495 8.49788 6.16704 8.36038 6.37329 8.15413L11.8504 2.67705C12.2858 2.24163 12.2858 1.53122 11.8504 1.11872ZM5.8462 7.62705C5.75454 7.74163 5.61704 7.81038 5.47954 7.8333L4.24204 8.08538L4.49412 6.84788C4.51704 6.71038 4.58578 6.57288 4.70037 6.48122L8.77954 2.37913L9.94829 3.54788L5.8462 7.62705ZM11.3462 2.14997L10.4525 3.04372L9.2837 1.87497L10.1775 0.981218C10.2691 0.889551 10.3837 0.866634 10.4295 0.866634C10.4983 0.866634 10.6129 0.889551 10.7045 0.981218L11.3462 1.62288C11.4379 1.71455 11.4608 1.82913 11.4608 1.89788C11.4608 1.94372 11.4379 2.0583 11.3462 2.14997Z" fill="#1C2B4B"/>
                                </svg>
                            </span>
                        </a>
                        </td>
                  </tr>`
                  });
                  
                  jQuery('#shopFilters').html($html);
                  jQuery("#filterCount").text(jQuery('#shopFilters tr').length);
                  toastr["success"](response.success_message, "Success");
                  jQuery('.loader').removeClass('__showloader');
                }
                else
                {
                  toastr["error"](response.error_message, "Error");
                }
                jQuery("#edit_filter_option").modal("hide");
                jQuery('.edit_more-options')[0].reset();
              }
              
            });
      }
      else
      {
          if(jQuery.trim(option_type) == '' && jQuery.trim(option_label) == '' && jQuery.trim(option_display) =='' && jQuery.trim(option_select) == '')
          {
              toastr["error"]("All fields are required.", "Error");
          }
          if(option_type == '')
          {
              toastr["error"]("Option type is required.", "Error");
              jQuery('.edit_more-options #option_type').css('border','red 1px solid');   
          }
           if(option_label == '')
          {
              toastr["error"]("Option label is required.", "Error");
              jQuery('.edit_more-options #option_label').css('border','red 1px solid'); 
          }
           if(option_display == '')
          {
              toastr["error"]("Option display is required.", "Error");
              jQuery('.edit_more-options #option_display').css('border','red 1px solid'); 
          }
          if(option_select == '')
          {
              toastr["error"]("Option select is required.", "Error");
              jQuery('.edit_more-options #option_select').css('border','red 1px solid'); 
          }
      }
    });


});// end ready function