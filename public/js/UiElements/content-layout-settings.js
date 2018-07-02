
$(document).ready(function () {

    $('form button').attr('type', 'button');
    var json = JSON.parse($('#hidden_data').val());
    var f=$('#add_custome_page');
	if(json){
			$.each(json, function (k, v) {
				if (f.find('input[name=' + k + ']').attr('type') == 'checkbox') {
                    f.find('input[name=' + k + ']').attr('checked', true);
				}else if(f.find('[name=' + k + ']').is('select')){
                    f.find('select[name=' + k + ']').val(v);
				}else{
                    f.find('input[name=' + k + ']').val(v);
				}
			});
		}
    $('#right-settings-main-box-bty').on('input','input',function () {
        evens($(this));
    });
    
    $('#right-settings-main-box-bty').on('change', 'select', function () {
            evens($(this));
    });

    $('#right-settings-main-box-bty').on('click', 'input[type="radio"]', function () {
        evens($(this));
    });
    $('#right-settings-main-box-bty').on('click','input[type="checkbox"]', function () {
        evens($(this));
    });

    $('#right-settings-main-box-bty').on('keyup','textarea' ,function () {
        evens($(this));
    });
    $('#right-settings-main-box-bty').on('click', '.item', function () {
        evens($(this));
    });


    $('#settings_savebtn, [data-settingaction="save"]').on('click', function () {
        var data = $('form').serialize();
        data += '&itemname=' + $('#itemname').val();
        var url = $('#add_custome_page').attr('action');
        $.ajax({
            type: "post",
            datatype: "json",
            url: url + '/save',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $("#token").val()
            },
            success: function (data) {
                if (!data.error) {
                    if(data.url.length != 0) {
                        window.location.replace(data.url);
                    } else if(data.html.length) {
                        $('#widget_container').html(data.html)
                    }
                }
            }
        });
    });

    $('#save-us').on('click', function () {
        $("#save-as-variation").modal();
    });

    $('.save-as-submit').on('click', function () {
        var new_name = $('#new_name').val();

        if(new_name.length > 0){
            var data = $('form#add_custome_page').serialize();
            data += '&itemname=' + new_name + '&save_us=' + true;
            var url = $('#add_custome_page').attr('action');
            $.ajax({
                type: "post",
                datatype: "json",
                url: url + '/save',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $("#token").val()
                },
                success: function (data) {
                    if (!data.error) {
                        if(data.url.length != 0) {
                            window.location.replace(data.url);
                        } else if(data.html.length) {
                            $('#widget_container').html(data.html)
                        }
                    }
                }
            });
        }else{
            alert("enter name !!!");
        }
    });
	
		
	function tinymceeditor(){
			var gettynimc = $('[data-bbfutarget][data-type="tinymceeditor"]').data('type');
				if(gettynimc){
				tinymce.init({
				  selector: '[data-bbfutarget][data-type="tinymceeditor"]',
				  inline: true,
				  plugins: [
					'advlist autolink lists link image charmap print preview anchor',
					'searchreplace visualblocks code fullscreen',
					'insertdatetime media table contextmenu paste'
				  ],
				  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
				});
			}
		}
	
    function evens(input) {

        var data = $('form#add_custome_page').serialize();
        data += '&bb_page=' + $("#page_id").val();
        var url = $('#add_custome_page').attr('action');
        $.ajax({
            type: "post",
            datatype: "json",
            url: url,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $("#token").val()
            },
            success: function (data) {
                if (!data.error) {
                    $('#widget_container').html(data.html);
                    $('#output-content').html(data.request);
					$('.fullheight').addClass('editplaceholders');
					tinymceeditor()
                }
            }
        });
    }

    function load_variation(data) {
        var url = $('#add_custome_page').attr('action');
        $.ajax({
            type: "post",
            datatype: "json",
            url: url,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $("#token").val()
            },
            success: function (data) {
                if (!data.error) {
                    $('#widget_container').html(data.html);
                    $('#output-content').html(data.request);
                    $('.fullheight').addClass('editplaceholders');
                    tinymceeditor()
                }
            }
        });
    }
  
      $('[data-settingaction="setting"]').click(function(){
         var  $this = $(this)
          if($this.hasClass('active')){
              $this.removeClass('active')
              $('[data-settinglive="settings"]').addClass('hide')
          }else{
            $this.addClass('active')
            $('[data-settinglive="settings"]').removeClass('hide')
          }
      });
    $('button[data-settingaction=console]').on('click',function () {
        $( "#output-content" ).slideToggle('slow');
    });
	function consoleS(data) {
        $.ajax({
            type: "post",
            datatype: "json",
            url: '/admin/uploads/gears/page-sections/console',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $("#token").val()
            },
            success: function (data) {
                    $('#output-content').html(data);
            }
        });
    }
	$('#right-settings-main-box-bty').on('click','[data-bbfutarget]' ,  function(){
		var target = $(this).data('bbfutarget');
		var targettype = $(this).data('types');
		var data =  $(this).data()
		
		if(targettype == 'tinymceeditor'){
			//
		}else{
			if($('.BBbuttons[data-key="'+target+'"]').length > 0){
				
				$('.BBbuttons[data-key="'+target+'"]').click();
			}else{
				 $('#magic-body').empty();
					$.ajax({
						type: "post",
						datatype: "json",
						url: '/modality/settings-live',
						data: data,
						headers: {
							'X-CSRF-TOKEN': $("input[name='_token']").val()
						},
						success: function (data) {
							if (!data.error) {
								$('#magic-settings .modal-title').html("Select " + data['action']);
								$('#magic-body').html(data.html);
								$('#magic-settings').modal();
							}
						}
					});
			}
		}
	});
	tinymceeditor();

	$('.fullheight').addClass('editplaceholders');

	$('body').on('change', '#copy_data', function () {
        if($(this).val() != '' && $(this).val() != undefined){
            load_variation({"variation_id" : $(this).val(),"copy_data":true});
        }
    });

    $('#placeholders-render-list-main-box-bty').on('click','.action-placeholder',  function(e){
        if (e.target !== this)
            return;

        $('.settings-bottom .content .left .pl-item').removeClass('hover-cl');
        $(this).closest('.pl-item').addClass('hover-cl');

        var key = $(this).data('key');
        var type = $(this).data('type');
        if(type != undefined){
            var data = $('#right-settings-main-box-bty').find('form#add_custome_page').serialize();
            data += '&key=' + key + '&type=' + type + '&bb_slug=' + $("#layout_slug").val() + '&bb_variation=' + $("#layout_variation").val()+ '&bb_page=' + $("#page_id").val();

            $('#right-settings-main-box-bty').html('');
            $("#loader-img").removeClass('hide');
            var url = $('#options-url').val();
            $.ajax({
                type: "post",
                datatype: "json",
                url: url,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $("input[name=_token]").val()
                },
                success: function (data) {
                    if (!data.error) {
                        $("#loader-img").addClass('hide');
                        $('#right-settings-main-box-bty').html(data.html);
                        if(type == 'f'){
                            $('#right-settings-main-box-bty #main-box-title').html('Functions');
                        }else{
                            $('#right-settings-main-box-bty #main-box-title').html('Styles');
                        }
                        $('.fullheight').addClass('editplaceholders');
                        tinymceeditor()
                    }
                }
            });
        }
    });
});
