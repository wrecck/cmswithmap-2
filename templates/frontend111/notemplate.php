<?php echo $header_block; ?>

      <div id="app-right-main">
        <div class="app-header">
          <div class="s-tab">
           
          </div>
          <div class="app-header-bot">
            <div class="app-opt clearfix">
              <div class="app-opt-left pull-left">

              </div><!-- app-opt-left -->
              <div class="app-opt-right pull-right">
              </div><!-- app-opt-right -->
            </div>
          </div><!-- app-header-bot -->
        </div><!-- app-header -->
        <div class="app-body header-offset">
           <div style="margin:auto; width:500px;margin-top:150px;"><h3>Sorry, this page is not available</h3></div>
		</div><!-- app-body -->
      </div><!-- app-right-main -->

<?php echo $footer_block;  ?>

<!-- modals -->
<div id="panel-settings" class="s-modal modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title"><span class="icon-m fa fa-rss"></span>New Panel</h5>
      </div>
      <div class="modal-body">
        <div class="row m-0">
          <div class="col-md-12">
            <div class="smc-inner">
              <form id="panel-settings-form" class="form-horizontal s-form">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-3 s-form-label">Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="panel_name" value="ABC-QLD Video">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 s-form-label">Size:</label>
                      <div class="col-sm-9">
                        <label class="radio-inline">
                          <input type="radio" name="panel_size" value="small"> S
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="panel_size" value="medium"> M
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="panel_size" value="large"> L
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="panel_size" value="xlarge"> XL
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 s-form-label">Refresh:</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <input type="text" class="form-control" name="panel_refresh" value="30">
                          <span class="input-group-addon">Seconds</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 s-form-label">Filter:</label>
                      <div class="col-sm-9">
                        <button data-toggle="modal" data-target="#filter-modal" type="button" class="btn btn-primary btn-sm">
                          <span class="fa fa-plus"></span> New Filter
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-3 s-form-label">Sort by:</label>
                      <div class="col-sm-9">
                        <div class="sort-value">
                        </div>
                        <button data-toggle="modal" data-target="#sort-modal" class="btn btn-primary btn-sm dropdown-toggle" type="button">
                          <span class="fa fa-plus"></span> New Sort Preferences
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-20">
                  <div class="col-md-12">
                    <div class="panel-list-group">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                          <span class="list-label list-col">
                            Category:
                          </span>
                          <span class="list-value list-col" id="category-value">
                            Business
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Provider:
                          </span>
                          <span class="list-value list-col" id="provider-value">
                            ABC
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Location:
                          </span>
                          <span class="list-value list-col" id="location-value">
                            World > Australia > Queensland
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Content Type:
                          </span>
                          <span class="list-value list-col" id="content-type-value">
                            Video
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Date:
                          </span>
                          <span class="list-value list-col" id="date-value">
                            Less that 24 hours old
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Curation Status:
                          </span>
                          <span class="list-value list-col" id="curation-status-value">
                            New
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Article ID
                          </span>
                          <span class="list-value list-col" id="article-id-value">
                            is more than 1
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Keyword
                          </span>
                          <span class="list-value list-col" id="keyword-value">
                            Anywhere: sample, keyword
                          </span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary pull-right" id="panel-settings-submit">Save</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="filter-modal" class="s-modal s-modal-sub modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header clearfix">
        <div class="ib pull-right right-txt form-button-top">
          <button type="button" data-dismiss="modal" class="btn btn-default btn-xs icom-m-sm reset-form">Cancel</button>
          <button type="button" id="add-panel" class="btn btn-primary btn-xs validate-submit" disabled="disabled"><span class="fa fa-plus icom-m-sm"></span>Add</button>
        </div>
        <h5 class="modal-title"><span class="icon-m fa fa-filter"></span>New Filter</h5>
      </div>
      <div class="modal-body">
        <div class="row m-0">
          <div class="col-md-12">
            <div class="smc-inner">
              <form action="raw-news-wire.php" id="filter-form" method="post" class="form-horizontal s-form" data-bv-message="This value is not valid"
              data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
              data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
              data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
              >
                <div class="row">
                  <div class="col-md-10 panel-append">
                    <div class="form-group">
                      <label class="s-form-label col-md-3">Filter:</label>
                      <div class="col-md-9">
                        <select id="panel-filter" class="form-control toggle-input select-default">
                          <option>Select Filter..</option>
                          <option data-toggle="#panel-filter-category" value="category">Category</option>
                          <option data-toggle="#panel-filter-date" value="date">Date</option>
                          <option data-toggle="#panel-filter-provider" value="provider">Provider</option>
                          <option data-toggle="#panel-filter-location" value="location">Location</option>
                          <option data-toggle="#panel-filter-content-type" value="content-type">Content Type</option>
                          <option data-toggle="#panel-filter-curation-status" value="curation-status">Curation Status</option>
                          <option data-toggle="#panel-filter-article-id" value="article-id">Article ID</option>
                          <option data-toggle="#panel-filter-keyword" value="keyword">Keyword</option>
                        </select>
                      </div>
                    </div>
                    <?php include_once('./includes/dropdown-add-panel.php'); ?>
                    <div class="form-group hidden-submit hidden">
                      <button type="submit" class="btn btn-primary btn-xs validate-submit btn-new-filter-submit"><span class="fa fa-plus icom-m-sm"></span>Add</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="sort-modal" class="s-modal s-modal-sub modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header clearfix">
        <div class="ib pull-right right-txt">
          <button type="button" data-dismiss="modal" class="btn btn-default btn-xs icom-m-sm reset-form">Cancel</button>
          <button type="button" class="btn btn-primary btn-xs sort-submit" disabled="disabled"><span class="fa fa-plus icom-m-sm"></span>Add Sort</button>
        </div>
        <h5 class="modal-title"><span class="icon-m fa fa-filter"></span>New Sort Preference</h5>
      </div>
      <div class="modal-body">
        <div class="row m-0">
          <div class="col-md-12">
            <div class="smc-inner">
              <form action="raw-news-wire.php" id="sort-form" method="post" class="form-horizontal s-form form-validate" data-bv-message="This value is not valid"
              data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
              data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
              data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
              >
                <div class="row">
                  <div class="col-md-10 panel-append">
                    <div class="form-group">
                      <label class="s-form-label col-md-3">Filter:</label>
                      <div class="col-md-9">
                        <select id="sort-choice" name="sort_choice" class="form-control change-val append-element" data-append=".sort-value">
                          <option value="">Select Filter..</option>
                          <option value="high_to_low">Highest to lowest</option>
                          <option value="low_to_high">Lowest to highest</option>
                          <option value="recent_to_old">Recent to oldest</option>
                          <option value="old_to_recent">Oldest to recent</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group hidden">
                      <button type="submit" class="btn btn-primary btn-xs pull-right sort-submit"><span class="fa fa-plus icom-m-sm"></span>Add</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="hidden">
  
</div>

<script type="text/javascript">
  $(document).ready(function(){

    //sort modal
    $('#sort-modal').on('show.bs.modal', function() {
      setTimeout(function(){
        $('#sort-form').bootstrapValidator({
          message: 'The value is not valid',
          excluded: [':disabled, :hidden, :not(:visible)'],
          fields: {
            sort_choice: {
              validators: {
                notEmpty: {
                  //message: 'testing lang po'
                }
              }
            }
          },
          submitButtons: '.sort-submit',
          submitHandler: function(validator, form, submitButton) {
            if(validator.isValid()){
              $(".sort-submit").removeProp('disabled');
            }
            else{
              $(".sort-submit").prop('disabled','disabled');
            }
          }
        }).bootstrapValidator('resetForm');
      },500);      
    });

    //append values***************
    $('.sort-submit').click(function(){
      var sort_value;
      $('.append-element').each(function(){
        sort_value = $(this).find('option:selected').text();
      });
      $('.sort-value').append('<div class="input-group input-add"><input type="text" class="form-control" value="'+sort_value+'"><span class="input-group-addon close-parent">x</span></div>');
      $(this).closest('.s-modal').modal('hide');
    });

    //change the button status
    $('.form-validate .form-control').on('keyup mouseup', function(){
      var parentForm = '#'+($(this).closest('form.form-validate').attr('id'));
      setTimeout(function(){
        var checkValid = $(parentForm).bootstrapValidator({excluded: [':disabled']}).data('bootstrapValidator').isValid();
        if(checkValid == false){
          $(".sort-submit").prop('disabled','disabled');
        }
        else{
          $(".sort-submit").removeProp('disabled');
        }
      },100);
    });
    //end of append values***************

    //filter modal
    $( ".date-picker" ).datepicker({
      dateFormat: "yy-mm-dd",
      onClose: function(dateText){
        $('#filter-form').data('bootstrapValidator').updateStatus('filter_date_datepicker', 'NOT_VALIDATED', null).validateField('filter_date_datepicker');
        var checkDate = $('#filter-form').data('bootstrapValidator').validateField('filter_date_datepicker').isValid();
        //alert(checkDate);
        if(checkDate == true){
          $(this).closest('.form-group').addClass('has-success').removeClass('has-error');
          $('.form-button-top .validate-submit').remove();
          var button = $('#filter-form .hidden-submit').html();
          $('.form-button-top').append(button);
        }
      }
    });

    $('input[name="filter_date_radio"]').click(function(){
      $('input[name="filter_date_radio"]').closest('.radio-input').find('input.radio-date').attr('disabled','disabled');
      $(this).closest('.radio-input').find('input.radio-date').removeAttr('disabled');
    });

    $(".btn-new-filter-submit").click(function(){
      //get the values
      var category_value = $(".panel-filter-active #filter-category option:selected").text();
      var category_sub_value = $(".panel-filter-active .filter-category-sub option:selected").text();

      var provider_value = $(".panel-filter-active #filter-provider option:selected").map(function() {
          var new_string = $(this).text();
          new_string = new_string.replace("Select","");
          if(new_string != ""){
            return new_string;
          }
      }).get().join(',');

      var location_value = $(".panel-filter-active #filter-location option:selected").text();

      var content_type_value = $(".panel-filter-active #filter-content-type option:selected").text();

      var curation_status_value = $(".panel-filter-active #filter-curation-status option:selected").text();

      var article_id_rule_value = $(".panel-filter-active #filter-article-id option:selected").text();
      var article_id_rule_more_value = $(".panel-filter-active .article-id-value").val();

      var keyword_value = $(".panel-filter-active #filter-keyword option:selected").text();
      var keyword_word_value = $(".panel-filter-active #filter-keyword-word").val();

      var date_value = $(".panel-filter-active #filter-date option:selected").text();
      var date_input_value = $('input[name="filter_date_radio"]:checked').closest('.radio-input').find('input.radio-date').val();

      //Filter category      
      if(category_value != ""){
        if(category_sub_value == ""){
          category_sub_value = " > All";
        }
        else{
          category_sub_value = " > "+category_sub_value;
        }
        $("#category-value").html(category_value+category_sub_value);
      }

      //Filter provider
      if(provider_value != ""){
        $("#provider-value").html(provider_value);
      }

      //Filter location
      if($("#filter-location").val() != ""){
        location_value = "World > " + location_value;
        $("#location-value").html(location_value);
      }

      //Filter content type
      if(content_type_value != ""){
        $("#content-type-value").html(content_type_value);
      }

      //Filter curation status
      if(curation_status_value != ""){
        $("#curation-status-value").html(curation_status_value);
      }

      //Filter article ID
      if(article_id_rule_more_value != ""){
        $("#article-id-value").html(article_id_rule_value+" "+article_id_rule_more_value);
      }

      //Filter keyword
      if(keyword_value != ""){
        $("#keyword-value").html(keyword_value+": "+keyword_word_value);
      }

      //Filter date
      if(date_value != ""){
        $("#date-value").html(date_value+" "+date_input_value);
      }

      //$('#filter-form').bootstrapValidator('validate');
      var checkValid = $('#filter-form').bootstrapValidator({excluded: [':disabled']}).data('bootstrapValidator').isValid();
      if(checkValid == true){
        $('#filter-modal').modal('hide');
      }
    });

    // $('.reset-form').click(function(){
    //   $('.select-default option:contains("Select")').prop('selected','selected');
    //   $('input[type="text"]').val('');
    //   $('.validate-submit').prop('disabled','disabled');
    // });

    $('.select-default option:contains("Select")').prop('selected','selected');
    $('.hidden-submit .validate-submit').prop('disabled','disabled');
    $('#filter-modal input[type="radio"]').prop('checked',false);

    $('.toggle-input').change(function(){
      var id = $(this).attr('id');
      var value = $(this).val();
      var child = $('#'+id+' option[value="'+value+'"]').attr('data-toggle');
      //adding and removing of classes when selected
      $('.panel-filter-add, .panel-filter-add-child').hide().addClass('panel-filter-inactive').removeClass('panel-filter-active');
      $(child).fadeIn().removeClass('panel-filter-inactive').addClass('panel-filter-active');
      //reset form
      $('.panel-filter-add .select-default option:contains("Select"), .panel-filter-add-child .select-default option:contains("Select")').prop('selected','selected');
      $('#filter-form').bootstrapValidator('resetForm');
      $('.hidden-submit .validate-submit').prop('disabled','disabled');
    });

    $('.toggle-input-l2').change(function(){
      var id = $(this).attr('id');
      var value = $(this).val();
      var child = $('#'+id+' option[value="'+value+'"]').attr('data-toggle');
      //$('.panel-append').append($(child).clone());
      $('.panel-filter-add-child').hide().addClass('panel-filter-inactive').removeClass('panel-filter-active');
      $(child).fadeIn().removeClass('panel-filter-inactive').addClass('panel-filter-active');;
      $('.hidden-submit .validate-submit').prop('disabled','disabled');
    });

    //initialize the form when the modal shows
    $('#filter-modal').on('show.bs.modal', function() {
      setTimeout(function(){
        $('.select-default option:contains("Select")').prop('selected','selected');
        $('.select-default-all option:contains("All")').prop('selected','selected');
        /*disable input when radio is not checked*/
        $('input[name="filter_date_radio"]').closest('.radio-input').find('input.radio-date').attr('disabled','disabled');
        $('input[type="radio"]').prop('checked',false);
        $('input[type="text"]').val('');
        $('.validate-submit').prop('disabled','disabled');
        $('.panel-filter-add, .panel-filter-add-child').hide().addClass('panel-filter-inactive').removeClass('panel-filter-active');
        $('#filter-form').bootstrapValidator({
          message: 'The value is not valid',
          excluded: [':disabled, :hidden, :not(:visible)'],
          fields:{
            category: {
              validators: {
                notEmpty: {
                  //message: 'test lang po'
                }
              }
            },
            filter_provider: {
              validators: {
                notEmpty: {
                  //message: 'test lang po'
                }
              }
            },
            filter_article_id: {
              validators: {
                notEmpty: {
                  //message: 'test lang po'
                }
              }
            },
            article_id_more: {
              validators: {
                notEmpty: {
                  //message: 'test lang po'
                },
                numeric: {
                  //message: 'test lang po'
                }
              }
            },
            filter_content_type: {
              validators: {
                notEmpty: {
                  //message: 'test lang po'
                }
              }
            },
            filter_curation_status: {
              validators: {
                notEmpty: {
                  //message: 'test lang po'
                }
              }
            },
            filter_keyword: {
              validators: {
                notEmpty: {
                  //message: 'test lang po'
                }
              }
            },
            filter_keyword_word: {
              validators: {
                notEmpty: {
                  //message: 'test lang po'
                }
              }
            },
            filter_location: {
              validators: {
                notEmpty: {
                  //message: 'test lang po'
                }
              }
            },
            filter_date:{
              validators: {
                notEmpty: {
                  //message: 'test lang po'
                }
              }
            },
            filter_date_radio: {
              validators: {
                notEmpty: {
                  message: 'Please select one'
                }
              }
            },
            filter_date_hours: {
              validators: {
                notEmpty: {
                  //message: 'date hours'
                },
                numeric: {
                  //message: 'test lang po'
                }
              }
            },
            filter_date_datepicker: {
              //threshold: 8,
              validators: {
                  notEmpty:{
                    // message: "date picker"
                  },
                  date: {
                      format: 'YYYY-MM-DD',
                      message: 'The value is not a valid date'
                  }
              }
            }

          },
          submitHandler: function(validator, form, submitButton) {
              // Use Ajax to submit form data
              $.post(form.attr('action'), form.serialize(), function(result) {
                  // ... process the result ...
              }, 'json');
          }

        });
      },500);
    });

    //change the button on top when validated
    $('.validate-it, .toggle-input, .validate-submit').on('keyup mouseup', function(){
      setTimeout(function(){
        $('.form-button-top .validate-submit').remove();
        var button = $('#filter-form .hidden-submit').html();
        $('.form-button-top').append(button);
      },100);
    });

    //bind the events of original submit on appended button
    $('.form-button-top').on('click','.validate-submit',function(){
      $('.hidden-submit .validate-submit').click();
      setTimeout(function(){
        $('.form-button-top .validate-submit').remove();
        var button = $('#filter-form .hidden-submit').html();
        $('.form-button-top').append(button);
      },100);
    });

    //new sort


  });
</script>