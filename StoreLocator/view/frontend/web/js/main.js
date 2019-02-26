define([
    "jquery"
  ], 
  function($) {
    "use strict";
    
        var dataForm = $('#guri-store-locator-form');
        $(document).on('click','.filter-attribute',function() {
          if (dataForm.valid()){
          event.preventDefault();
              var param = dataForm.serialize();
                  $.ajax({
                      showLoader: true,
                      url: AjaxUrl,
                      data: param,
                      dataType: 'json',
                      type: "POST"
                  }).done(function (data) {
                        var dynamic_html = '';
                        $.each(data, function(index, element) {
                            dynamic_html += '<span name="leftLocation" data-mapid="gurilocator-map-canvas" data-amid="'+element.location_id+'">';
                            dynamic_html += '<div class="location_header">'+element.location_name+'</div><br>';
                            dynamic_html += 'City: '+element.location_city+' <br>';
                            dynamic_html += 'City: '+element.location_zip+' <br>';
                            dynamic_html += '<div class="today_schedule">';
                            dynamic_html += 'Work Time Today:<span> 08:00 - 16:00<div class="locator_arrow"></div></span>';
                            dynamic_html += '</div>';
                            dynamic_html += '<div class="all_schedule" id="schedule3">';
                            dynamic_html += '<div>Monday:<span>08:00 - 18:00</span></div>';
                            dynamic_html += '</div>';
                            dynamic_html += '</span>';
                        });
                      
                      if(data.length == 0)
                      {
                        $('#gurilocator_store_list').html('<span>No result found</span>');    
                      }
                      else {
                        $('#gurilocator_store_list').html(dynamic_html);
                      }
                      
                      return true;
                  });
              }
        });    

  });