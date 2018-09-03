// Manager
function TotalSoftPoll_Reload()
{
	location.reload();
}
function Total_Soft_Poll_AMD2_But1(Poll_ID)
{
	jQuery('.Total_Soft_Poll_AMD2').hide(500);
	jQuery('.Total_Soft_Poll_AMMTable').hide(500);
	jQuery('.Total_Soft_Poll_AMOTable').hide(500);
	jQuery('.Total_Soft_Poll_Save').show(500);
	jQuery('.Total_Soft_Poll_Update').hide(500);

	jQuery('.Total_Soft_Poll_ID').html('[Total_Soft_Poll id="'+Poll_ID+'"]');
	jQuery('.Total_Soft_Poll_TID').html('&lt;?php echo do_shortcode(&#039;[Total_Soft_Poll id="'+Poll_ID+'"]&#039;);?&gt');
	TotalSoftPoll_Type_Ch();
	setTimeout(function(){
		jQuery('.Total_Soft_Poll_AMD3').show(500);
		jQuery('.Total_Soft_Poll_Add_MTable').show(500);
		jQuery('.Total_Soft_Poll_Add_ATable').show(500);
		jQuery('.Total_Soft_Poll_Add_Answer').show(500);
		jQuery('.Total_Soft_Poll_AnswersTable').show(500);
		jQuery('.Total_Soft_Poll_AMShortTable').show(500);
	},500)
}
function TotalSoftPoll_Type_Ch()
{
	var Total_Soft_Poll_Type = jQuery('#TotalSoftPoll_Theme_' + jQuery('#TotalSoftPoll_Theme').val()).attr('rel');
	if(Total_Soft_Poll_Type == 'Standart Poll')
	{
		jQuery('#TotalSoftPollQ_Video').hide(500);
		jQuery('#TotalSoftPollQ_Image').hide(500);
		jQuery('#TotalSoftPoll_Video').hide(500);
		jQuery('#TotalSoftPoll_Image').hide(500);
	}
	else if(Total_Soft_Poll_Type == 'Image Poll')
	{
		jQuery('#TotalSoftPollQ_Video').hide(500);
		jQuery('#TotalSoftPollQ_Image').hide(500);
		jQuery('#TotalSoftPoll_Video').hide(500);
		jQuery('#TotalSoftPoll_Image').show(500);
	}
	else if(Total_Soft_Poll_Type == 'Video Poll')
	{
		jQuery('#TotalSoftPollQ_Video').hide(500);
		jQuery('#TotalSoftPollQ_Image').hide(500);
		jQuery('#TotalSoftPoll_Video').show(500);
		jQuery('#TotalSoftPoll_Image').show(500);
	}
	else if(Total_Soft_Poll_Type == 'Standart Without Button')
	{
		jQuery('#TotalSoftPollQ_Video').hide(500);
		jQuery('#TotalSoftPollQ_Image').hide(500);
		jQuery('#TotalSoftPoll_Video').hide(500);
		jQuery('#TotalSoftPoll_Image').hide(500);
	}
	else if(Total_Soft_Poll_Type == 'Image Without Button')
	{
		jQuery('#TotalSoftPollQ_Video').hide(500);
		jQuery('#TotalSoftPollQ_Image').hide(500);
		jQuery('#TotalSoftPoll_Video').hide(500);
		jQuery('#TotalSoftPoll_Image').show(500);
	}
	else if(Total_Soft_Poll_Type == 'Video Without Button')
	{
		jQuery('#TotalSoftPollQ_Video').hide(500);
		jQuery('#TotalSoftPollQ_Image').hide(500);
		jQuery('#TotalSoftPoll_Video').show(500);
		jQuery('#TotalSoftPoll_Image').show(500);
	}
	else if(Total_Soft_Poll_Type == 'Image in Question')
	{
		jQuery('#TotalSoftPollQ_Video').hide(500);
		jQuery('#TotalSoftPollQ_Image').show(500);
		jQuery('#TotalSoftPoll_Video').hide(500);
		jQuery('#TotalSoftPoll_Image').hide(500);
	}
	else if(Total_Soft_Poll_Type == 'Video in Question')
	{
		jQuery('#TotalSoftPollQ_Video').show(500);
		jQuery('#TotalSoftPollQ_Image').show(500);
		jQuery('#TotalSoftPoll_Video').hide(500);
		jQuery('#TotalSoftPoll_Image').hide(500);
	}
}
function TSPDUFS_Cl(Field_Name)
{
	jQuery('#'+Field_Name).val('');
}
function TotalSoftPoll_Video_Clicked(Field_ID)
{
	var PollIntervId = setInterval(function(){
		var code = jQuery('#'+Field_ID+'_Video_1').val();

		if(code.indexOf('https://www.youtube.com/')>0)
		{
			if(code.indexOf('list')>0 || code.indexOf('index')>0)
			{
				if(code.indexOf('embed')>0)
				{
					var TotalSoftPollCodes1=code.split('[embed]');
					var TotalSoftPollCodes2=TotalSoftPollCodes1[1].split('[/embed]');
					var TotalSoftPollCodes3=TotalSoftPollCodes2[0].split('www.youtube.com/watch?v=');
					if(TotalSoftPollCodes3[1].length != 11) { TotalSoftPollCodes3[1] = TotalSoftPollCodes3[1].substr(0,11); }

					jQuery('#'+Field_ID+'_Video_2').val('https://www.youtube.com/embed/'+TotalSoftPollCodes3[1]);
					jQuery('#'+Field_ID+'_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollCodes3[1]+'/mqdefault.jpg');

					if(jQuery('#'+Field_ID+'_Video_2').val().length>0){ clearInterval(PollIntervId); jQuery('#'+Field_ID+'_Video_1').val(''); }
				}
				else
				{
					var TotalSoftPollCodes1 = code.split('<a href="https://www.youtube.com/');
					var TotalSoftPollCodes2 = TotalSoftPollCodes1[1].split("=");
					var TotalSoftPollCodeSrc = TotalSoftPollCodes2[1].split('&');

					jQuery('#'+Field_ID+'_Video_2').val('https://www.youtube.com/embed/'+TotalSoftPollCodeSrc[0]);
					jQuery('#'+Field_ID+'_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollCodeSrc[0]+'/mqdefault.jpg');
					if(jQuery('#'+Field_ID+'_Video_2').val().length>0){ clearInterval(PollIntervId); jQuery('#'+Field_ID+'_Video_1').val(''); }
				}
			}
			else if(code.indexOf('embed')>0)
			{
				var TotalSoftPollCodes1=code.split('[embed]');
				var TotalSoftPollCodes2=TotalSoftPollCodes1[1].split('[/embed]');
				if(TotalSoftPollCodes2[0].indexOf('watch?')>0)
				{
					var TotalSoftPollCodes3=TotalSoftPollCodes2[0].split('=');
					
					jQuery('#'+Field_ID+'_Video_2').val('https://www.youtube.com/embed/'+TotalSoftPollCodes3[1]);
					jQuery('#'+Field_ID+'_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollCodes3[1]+'/mqdefault.jpg');
					if(jQuery('#'+Field_ID+'_Video_2').val().length>0){ clearInterval(PollIntervId); jQuery('#'+Field_ID+'_Video_1').val(''); }
				}
				else
				{
					var TotalSoftPollCodeSrc=TotalSoftPollCodes2[0];
					var TotalSoftPollImsrc=TotalSoftPollCodeSrc.split('embed/');

					jQuery('#'+Field_ID+'_Video_2').val(TotalSoftPollCodeSrc);
					jQuery('#'+Field_ID+'_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollImsrc[1]+'/mqdefault.jpg');
					if(jQuery('#'+Field_ID+'_Video_2').val().length>0){ clearInterval(PollIntervId); jQuery('#'+Field_ID+'_Video_1').val(''); }
				}
			}
			else
			{
				var TotalSoftPollCodes1 = code.split('<a href="https://www.youtube.com/');
				var TotalSoftPollCodes2= TotalSoftPollCodes1[1].split('=');
				var TotalSoftPollCodeSrc = TotalSoftPollCodes2[1].split('">https://');

				jQuery('#'+Field_ID+'_Video_2').val('https://www.youtube.com/embed/'+TotalSoftPollCodeSrc[0]);
				jQuery('#'+Field_ID+'_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollCodeSrc[0]+'/mqdefault.jpg');
				if(jQuery('#'+Field_ID+'_Video_2').val().length>0){ clearInterval(PollIntervId); jQuery('#'+Field_ID+'_Video_1').val(''); }
			}
		}
		else if(code.indexOf('https://youtu.be/')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var TotalSoftPollCodes1=code.split('[embed]');
				var TotalSoftPollCodes2=TotalSoftPollCodes1[1].split('[/embed]');
				var TotalSoftPollCodes3=TotalSoftPollCodes2[0].split('youtu.be/');

				jQuery('#'+Field_ID+'_Video_2').val('https://www.youtube.com/embed/'+TotalSoftPollCodes3[1]);
				jQuery('#'+Field_ID+'_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollCodes3[1]+'/mqdefault.jpg');

				if(jQuery('#'+Field_ID+'_Video_2').val().length>0){ clearInterval(PollIntervId); jQuery('#'+Field_ID+'_Video_1').val(''); }
			}
			else
			{
				var TotalSoftPollCodes1 = code.split('<a href="https://youtu.be/');
				var TotalSoftPollCodeSrc = TotalSoftPollCodes1[1].split('">https://');

				jQuery('#'+Field_ID+'_Video_2').val('https://www.youtube.com/embed/'+TotalSoftPollCodeSrc[0]);
				jQuery('#'+Field_ID+'_Image_2').val('http://img.youtube.com/vi/'+TotalSoftPollCodeSrc[0]+'/mqdefault.jpg');

				if(jQuery('#'+Field_ID+'_Video_2').val().length>0){ clearInterval(PollIntervId); jQuery('#'+Field_ID+'_Video_1').val(''); }
			}
		}
		else if(code.indexOf('https://vimeo.com/')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var s1=code.split('[embed]https://vimeo.com/');
				var src=s1[1].split('[/embed]');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#'+Field_ID+'_Video_2').val('https://player.vimeo.com/video/'+src[0]);

				var ajaxurl = object.ajaxurl;
				var data = {
					action: 'TSoftPoll_Vimeo_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
					foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#'+Field_ID+'_Image_2').val(response);
					if(jQuery('#'+Field_ID+'_Video_2').val().length>0){ clearInterval(PollIntervId); jQuery('#'+Field_ID+'_Video_1').val(''); }
				});
			}
			else if(code.indexOf('player')>0)
			{
				var s1 = code.split('<a href="https://player.vimeo.com/video/');
				var src = s1[1].split('">https://');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#'+Field_ID+'_Video_2').val('https://player.vimeo.com/video/'+src[0]);
				
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'TSoftPoll_Vimeo_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#'+Field_ID+'_Image_2').val(response);
					if(jQuery('#'+Field_ID+'_Video_2').val().length>0){ clearInterval(PollIntervId); jQuery('#'+Field_ID+'_Video_1').val(''); }
				});
			}
			else
			{
				var s1 = code.split('<a href="https://vimeo.com/');
				var src = s1[1].split('">https://');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#'+Field_ID+'_Video_2').val('https://player.vimeo.com/video/'+src[0]);

				var ajaxurl = object.ajaxurl;
				var data = {
					action: 'TSoftPoll_Vimeo_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
					foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#'+Field_ID+'_Image_2').val(response);
					if(jQuery('#'+Field_ID+'_Video_2').val().length>0){ clearInterval(PollIntervId); jQuery('#'+Field_ID+'_Video_1').val(''); }
				});
			}
		}
	},100)
}
function TotalSoftPoll_Image_Clicked(Field_ID)
{
	var PollIntervId = setInterval(function(){
		var code = jQuery('#'+Field_ID+'_Image_1').val();
		if(code.indexOf('img')>0)
		{
			var s=code.split('src="');
			var src=s[1].split('"');
			jQuery('#'+Field_ID+'_Image_2').val(src[0]);
			if(jQuery('#'+Field_ID+'_Image_2').val().length>0){ jQuery('#'+Field_ID+'_Image_1').val(''); clearInterval(PollIntervId); }
		}
	},100)
}
function Total_Soft_Poll_Res_Ans()
{
	jQuery('.Total_Soft_Poll_Add_ATable').find('input[type=text]').val('');
	jQuery('#Total_Soft_Poll_UpdAns').hide(500);
	jQuery('#Total_Soft_Poll_SavAns').show(500);
}
function Total_Soft_Poll_Save_Ans()
{
	var TotalSoftPollHidNum=jQuery('#TotalSoftPollHidNum').val();
	var TotalSoftPoll_Answer=jQuery('#TotalSoftPoll_Answer').val();
	var TotalSoftPoll_Video_2=jQuery('#TotalSoftPoll_Video_2').val();
	var TotalSoftPoll_Image_2=jQuery('#TotalSoftPoll_Image_2').val();
	if(TotalSoftPoll_Answer == '' && TotalSoftPoll_Video_2 == '' && TotalSoftPoll_Image_2 == '')
	{
		alert('One of the fields must be filled for saving answer.');
	}
	else
	{
		if(TotalSoftPollHidNum%2==1)
		{
			jQuery('#TotalSoftPoll_AnswerUl').append('<li id="TotalSoftPollLi_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"><table class="Total_Soft_Poll_AnswersTable1 Total_Soft_Poll_AnswersTable3"><tr><td>'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'</td><td><input type="text" name="TotalSoftPoll_Ans_Col_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" id="TotalSoftPoll_Ans_Col_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" class="Total_Soft_Poll_Color" value="#000000"></td><td><input type="text" readonly value="'+TotalSoftPoll_Answer+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1" id="TotalSoftPoll_Ans_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"></td><td><img class="TotalSoftPollAnsImage" src="'+TotalSoftPoll_Image_2+'"><input type="text" value="'+TotalSoftPoll_Image_2+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Im" style="display:none;" id="TotalSoftPoll_Ans_Im_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_Im_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"><input type="text" value="'+TotalSoftPoll_Video_2+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Vd" style="display:none;" id="TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-file-text" onclick="TotalSoftPollAns_Copy('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil" onclick="TotalSoftPollAns_Edit('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-trash" onclick="TotalSoftPollAns_Del('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i><span class="Total_Soft_Poll_Del_Span"><i class="Total_Soft_Poll_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Poll_Del_Ans_Yes('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i><i class="Total_Soft_Poll_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_Poll_Del_Ans_No('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i></span></td></tr></table></li>');
		}
		else
		{
			jQuery('#TotalSoftPoll_AnswerUl').append('<li id="TotalSoftPollLi_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"><table class="Total_Soft_Poll_AnswersTable1 Total_Soft_Poll_AnswersTable2"><tr><td>'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'</td><td><input type="text" name="TotalSoftPoll_Ans_Col_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" id="TotalSoftPoll_Ans_Col_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" class="Total_Soft_Poll_Color" value="#000000"></td><td><input type="text" readonly value="'+TotalSoftPoll_Answer+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1" id="TotalSoftPoll_Ans_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"></td><td><img class="TotalSoftPollAnsImage" src="'+TotalSoftPoll_Image_2+'"><input type="text" value="'+TotalSoftPoll_Image_2+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Im" style="display:none;" id="TotalSoftPoll_Ans_Im_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_Im_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"><input type="text" value="'+TotalSoftPoll_Video_2+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Vd" style="display:none;" id="TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-file-text" onclick="TotalSoftPollAns_Copy('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil" onclick="TotalSoftPollAns_Edit('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-trash" onclick="TotalSoftPollAns_Del('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i><span class="Total_Soft_Poll_Del_Span"><i class="Total_Soft_Poll_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Poll_Del_Ans_Yes('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i><i class="Total_Soft_Poll_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_Poll_Del_Ans_No('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i></span></td></tr></table></li>');
		}
		jQuery('.Total_Soft_Poll_Color').wpColorPicker();
		Total_Soft_Poll_Res_Ans();
		jQuery('#TotalSoftPollHidNum').val(parseInt(parseInt(TotalSoftPollHidNum)+1));
	}
}
function TotalSoftPollAns_Copy(Poll_Num)
{
	var TotalSoftPoll_Answer =jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').val();
	var TotalSoftPoll_Image_2=jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').val();
	var TotalSoftPoll_Video_2=jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').val();
	var TotalSoftPollHidNum=jQuery('#TotalSoftPollHidNum').val();

	jQuery('#TotalSoftPollLi_'+Poll_Num).after('<li id="TotalSoftPollLi_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"><table class="Total_Soft_Poll_AnswersTable1 Total_Soft_Poll_AnswersTable2"><tr><td>'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'</td><td><input type="text" name="TotalSoftPoll_Ans_Col_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" id="TotalSoftPoll_Ans_Col_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" class="Total_Soft_Poll_Color" value="#000000"></td><td><input type="text" readonly value="'+TotalSoftPoll_Answer+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1" id="TotalSoftPoll_Ans_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"></td><td><img class="TotalSoftPollAnsImage" src="'+TotalSoftPoll_Image_2+'"><input type="text" value="'+TotalSoftPoll_Image_2+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Im" style="display:none;" id="TotalSoftPoll_Ans_Im_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_Im_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"><input type="text" value="'+TotalSoftPoll_Video_2+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Vd" style="display:none;" id="TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'" name="TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(TotalSoftPollHidNum)+1)+'"></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-file-text" onclick="TotalSoftPollAns_Copy('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil" onclick="TotalSoftPollAns_Edit('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-trash" onclick="TotalSoftPollAns_Del('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i><span class="Total_Soft_Poll_Del_Span"><i class="Total_Soft_Poll_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Poll_Del_Ans_Yes('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i><i class="Total_Soft_Poll_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_Poll_Del_Ans_No('+parseInt(parseInt(TotalSoftPollHidNum)+1)+')"></i></span></td></tr></table></li>').insertAfter('#TotalSoftPollLi_'+Poll_Num);

	jQuery('#TotalSoftPollHidNum').val(parseInt(parseInt(TotalSoftPollHidNum)+1));
	jQuery('.Total_Soft_Poll_Color').wpColorPicker();

	jQuery("#TotalSoftPoll_AnswerUl > li").each(function(){
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(1)').html(parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(2)').find('.Total_Soft_Poll_Color').attr('id','TotalSoftPoll_Ans_Col_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(2)').find('.Total_Soft_Poll_Color').attr('name','TotalSoftPoll_Ans_Col_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').attr('id','TotalSoftPoll_Ans_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').attr('name','TotalSoftPoll_Ans_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').attr('id','TotalSoftPoll_Ans_Im_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').attr('name','TotalSoftPoll_Ans_Im_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').attr('id','TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').attr('name','TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(jQuery(this).index())+1));

		if(jQuery(this).find('.Total_Soft_Poll_AnswersTable1').hasClass('Total_Soft_Poll_AnswersTable2'))
		{
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').removeClass("Total_Soft_Poll_AnswersTable2");
		}
		else if(jQuery(this).find('.Total_Soft_Poll_AnswersTable1').hasClass('Total_Soft_Poll_AnswersTable3'))
		{
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').removeClass("Total_Soft_Poll_AnswersTable3");
		}
		if(jQuery(this).index()%2==0)
		{
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').addClass("Total_Soft_Poll_AnswersTable3");
		}
		else
		{
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').addClass("Total_Soft_Poll_AnswersTable2");
		}
	});
}
function Total_Soft_Poll_Update_Ans()
{
	var Poll_Num=jQuery('#TotalSoftPollHidUpdate').val();
	var TotalSoftPollHidNum=jQuery('#TotalSoftPollHidNum').val();

	var TotalSoftPoll_Answer=jQuery('#TotalSoftPoll_Answer').val();
	var TotalSoftPoll_Video_2=jQuery('#TotalSoftPoll_Video_2').val();
	var TotalSoftPoll_Image_2=jQuery('#TotalSoftPoll_Image_2').val();

	if(TotalSoftPoll_Answer == '' && TotalSoftPoll_Video_2 == '' && TotalSoftPoll_Image_2 == '')
	{
		alert('One of the fields must be filled for saving answer.');
	}
	else
	{
		jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').val(TotalSoftPoll_Answer);
		jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').val(TotalSoftPoll_Image_2);
		jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').val(TotalSoftPoll_Video_2);
		jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPollAnsImage').attr('src',TotalSoftPoll_Image_2);

		jQuery('#Total_Soft_Poll_UpdAns').hide(500);
		jQuery('#Total_Soft_Poll_SavAns').show(500);

		Total_Soft_Poll_Res_Ans();
		jQuery('#TotalSoftPollHidNum').val(TotalSoftPollHidNum);
	}
}
function TotalSoftPoll_AnswerUlSort()
{
	jQuery('#TotalSoftPoll_AnswerUl').sortable({
		update: function() {
			jQuery("#TotalSoftPoll_AnswerUl > li").each(function(){
				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(1)').html(parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(2)').find('.Total_Soft_Poll_Color').attr('id','TotalSoftPoll_Ans_Col_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(2)').find('.Total_Soft_Poll_Color').attr('name','TotalSoftPoll_Ans_Col_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').attr('id','TotalSoftPoll_Ans_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').attr('name','TotalSoftPoll_Ans_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').attr('id','TotalSoftPoll_Ans_Im_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').attr('name','TotalSoftPoll_Ans_Im_'+parseInt(parseInt(jQuery(this).index())+1));

				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').attr('id','TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(jQuery(this).index())+1));
				jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').attr('name','TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(jQuery(this).index())+1));

				if(jQuery(this).find('.Total_Soft_Poll_AnswersTable1').hasClass('Total_Soft_Poll_AnswersTable2'))
				{
					jQuery(this).find('.Total_Soft_Poll_AnswersTable1').removeClass("Total_Soft_Poll_AnswersTable2");
				}
				else if(jQuery(this).find('.Total_Soft_Poll_AnswersTable1').hasClass('Total_Soft_Poll_AnswersTable3'))
				{
					jQuery(this).find('.Total_Soft_Poll_AnswersTable1').removeClass("Total_Soft_Poll_AnswersTable3");
				}
				if(jQuery(this).index()%2==0)
				{
					jQuery(this).find('.Total_Soft_Poll_AnswersTable1').addClass("Total_Soft_Poll_AnswersTable3");
				}
				else
				{
					jQuery(this).find('.Total_Soft_Poll_AnswersTable1').addClass("Total_Soft_Poll_AnswersTable2");
				}
			});
		}
	});
}
function TotalSoftPollAns_Edit(Poll_Num)
{
	var TotalSoftPoll_Answer =jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').val();
	var TotalSoftPoll_Image_2=jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').val();
	var TotalSoftPoll_Video_2=jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').val();

	jQuery('#TotalSoftPollHidUpdate').val(Poll_Num);
	jQuery('#Total_Soft_Poll_SavAns').hide(500);
	jQuery('#Total_Soft_Poll_UpdAns').show(500);

	jQuery('#TotalSoftPoll_Answer').val(TotalSoftPoll_Answer);
	jQuery('#TotalSoftPoll_Image_2').val(TotalSoftPoll_Image_2);
	jQuery('#TotalSoftPoll_Video_2').val(TotalSoftPoll_Video_2);
}
function Total_Soft_Poll_Del_Ans_Yes(Poll_Num)
{
	jQuery('#TotalSoftPollLi_'+Poll_Num).remove();
	jQuery('#TotalSoftPollHidNum').val(jQuery('#TotalSoftPollHidNum').val()-1);

	jQuery("#TotalSoftPoll_AnswerUl > li").each(function(){
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(1)').html(parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(2)').find('.Total_Soft_Poll_Color').attr('id','TotalSoftPoll_Ans_Col_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(2)').find('.Total_Soft_Poll_Color').attr('name','TotalSoftPoll_Ans_Col_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').attr('id','TotalSoftPoll_Ans_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(3)').find('.Total_Soft_Poll_Select').attr('name','TotalSoftPoll_Ans_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').attr('id','TotalSoftPoll_Ans_Im_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Im').attr('name','TotalSoftPoll_Ans_Im_'+parseInt(parseInt(jQuery(this).index())+1));

		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').attr('id','TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Total_Soft_Poll_AnswersTable1 td:nth-child(4)').find('.TotalSoftPoll_Ans_Vd').attr('name','TotalSoftPoll_Ans_Vd_'+parseInt(parseInt(jQuery(this).index())+1));

		if(jQuery(this).find('.Total_Soft_Poll_AnswersTable1').hasClass('Total_Soft_Poll_AnswersTable2'))
		{
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').removeClass("Total_Soft_Poll_AnswersTable2");
		}
		else if(jQuery(this).find('.Total_Soft_Poll_AnswersTable1').hasClass('Total_Soft_Poll_AnswersTable3'))
		{
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').removeClass("Total_Soft_Poll_AnswersTable3");
		}
		if(jQuery(this).index()%2==0)
		{
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').addClass("Total_Soft_Poll_AnswersTable3");
		}
		else
		{
			jQuery(this).find('.Total_Soft_Poll_AnswersTable1').addClass("Total_Soft_Poll_AnswersTable2");
		}
	});
}
function Total_Soft_Poll_Del_Ans_No(Poll_Num)
{
	jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_Del_Span').removeClass('Total_Soft_Poll_Del_Span1');
}
function TotalSoftPollAns_Del(Poll_Num)
{
	jQuery('#TotalSoftPollLi_'+Poll_Num).find('.Total_Soft_Poll_Del_Span').addClass('Total_Soft_Poll_Del_Span1');
}
function TotalSoftPoll_Edit(Poll_ID)
{
	jQuery('.Total_Soft_Poll_AMD2').hide(500);
	jQuery('.Total_Soft_Poll_AMMTable').hide(500);
	jQuery('.Total_Soft_Poll_AMOTable').hide(500);
	jQuery('.Total_Soft_Poll_Update').show(500);
	jQuery('.Total_Soft_Poll_Save').hide(500);
	jQuery('.Total_Soft_Poll_ID').html('[Total_Soft_Poll id="'+Poll_ID+'"]');
	jQuery('.Total_Soft_Poll_TID').html('&lt;?php echo do_shortcode(&#039;[Total_Soft_Poll id="'+Poll_ID+'"]&#039;);?&gt');
	jQuery('#Total_SoftPoll_Update').val(Poll_ID);
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'TotalSoftPoll_Edit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Poll_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();

		jQuery('#TotalSoftPoll_Question').val(b[0]);
		jQuery('#TotalSoftPoll_Theme').val(b[1]);
		jQuery('#TotalSoftPollHidNum').val(b[2]);
		TotalSoftPoll_Type_Ch();
	})
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'TotalSoftPoll_Edit_Q_M', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Poll_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();

		jQuery('#TotalSoftPollQ_Image_2').val(b[1]);
		jQuery('#TotalSoftPollQ_Video_2').val(b[2]);
		jQuery('#TotalSoft_Poll_Gen_Set').val(b[3]);
	})
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'TotalSoftPoll_Edit_Ans', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Poll_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var TSPoll_Ans=Array();
		var TSPoll_Ans_Im=Array();
		var TSPoll_Ans_Vd=Array();
		var TSPoll_Ans_Cl=Array();
		var a=response.split('stdClass Object');
		for(i=1;i<a.length;i++)
		{
			var c=a[i].split('=>');
			TSPoll_Ans[TSPoll_Ans.length]=c[3].split('[')[0].trim();
			TSPoll_Ans_Im[TSPoll_Ans_Im.length]=c[4].split('[')[0].trim();
			TSPoll_Ans_Vd[TSPoll_Ans_Vd.length]=c[5].split('[')[0].trim();
			TSPoll_Ans_Cl[TSPoll_Ans_Cl.length]=c[6].split('[')[0].trim();
		}
		for(i=1;i<=TSPoll_Ans.length;i++)
		{
			if(i%2==1)
			{
				jQuery('#TotalSoftPoll_AnswerUl').append('<li id="TotalSoftPollLi_'+i+'"><table class="Total_Soft_Poll_AnswersTable1 Total_Soft_Poll_AnswersTable3"><tr><td>'+i+'</td><td><input type="text" name="TotalSoftPoll_Ans_Col_'+i+'" id="TotalSoftPoll_Ans_Col_'+i+'" class="Total_Soft_Poll_Color" value="'+TSPoll_Ans_Cl[i-1]+'"></td><td><input type="text" readonly value="'+TSPoll_Ans[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1" id="TotalSoftPoll_Ans_'+i+'" name="TotalSoftPoll_Ans_'+i+'"></td><td><img class="TotalSoftPollAnsImage" src="'+TSPoll_Ans_Im[i-1]+'"><input type="text" value="'+TSPoll_Ans_Im[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Im" style="display:none;" id="TotalSoftPoll_Ans_Im_'+i+'" name="TotalSoftPoll_Ans_Im_'+i+'"><input type="text" value="'+TSPoll_Ans_Vd[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Vd" style="display:none;" id="TotalSoftPoll_Ans_Vd_'+i+'" name="TotalSoftPoll_Ans_Vd_'+i+'"></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-file-text" onclick="TotalSoftPollAns_Copy('+i+')"></i></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil" onclick="TotalSoftPollAns_Edit('+i+')"></i></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-trash" onclick="TotalSoftPollAns_Del('+i+')"></i><span class="Total_Soft_Poll_Del_Span"><i class="Total_Soft_Poll_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Poll_Del_Ans_Yes('+i+')"></i><i class="Total_Soft_Poll_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_Poll_Del_Ans_No('+i+')"></i></span></td></tr></table></li>');
			}
			else
			{
				jQuery('#TotalSoftPoll_AnswerUl').append('<li id="TotalSoftPollLi_'+i+'"><table class="Total_Soft_Poll_AnswersTable1 Total_Soft_Poll_AnswersTable2"><tr><td>'+i+'</td><td><input type="text" name="TotalSoftPoll_Ans_Col_'+i+'" id="TotalSoftPoll_Ans_Col_'+i+'" class="Total_Soft_Poll_Color" value="'+TSPoll_Ans_Cl[i-1]+'"></td><td><input type="text" readonly value="'+TSPoll_Ans[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1" id="TotalSoftPoll_Ans_'+i+'" name="TotalSoftPoll_Ans_'+i+'"></td><td><img class="TotalSoftPollAnsImage" src="'+TSPoll_Ans_Im[i-1]+'"><input type="text" value="'+TSPoll_Ans_Im[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Im" style="display:none;" id="TotalSoftPoll_Ans_Im_'+i+'" name="TotalSoftPoll_Ans_Im_'+i+'"><input type="text" value="'+TSPoll_Ans_Vd[i-1]+'" class="Total_Soft_Poll_Select Total_Soft_Poll_Select1 TotalSoftPoll_Ans_Vd" style="display:none;" id="TotalSoftPoll_Ans_Vd_'+i+'" name="TotalSoftPoll_Ans_Vd_'+i+'"></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-file-text" onclick="TotalSoftPollAns_Copy('+i+')"></i></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil" onclick="TotalSoftPollAns_Edit('+i+')"></i></td><td><i class="Total_SoftPoll_icon totalsoft totalsoft-trash" onclick="TotalSoftPollAns_Del('+i+')"></i><span class="Total_Soft_Poll_Del_Span"><i class="Total_Soft_Poll_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Poll_Del_Ans_Yes('+i+')"></i><i class="Total_Soft_Poll_Del_Span_No totalsoft totalsoft-times" onclick="Total_Soft_Poll_Del_Ans_No('+i+')"></i></span></td></tr></table></li>');
			}
			jQuery('.Total_Soft_Poll_Color').wpColorPicker();
		}
	})
	setTimeout(function(){
		jQuery('.Total_Soft_Poll_AMD3').show(500);
		jQuery('.Total_Soft_Poll_Add_MTable').show(500);
		jQuery('.Total_Soft_Poll_Add_ATable').show(500);
		jQuery('.Total_Soft_Poll_Add_Answer').show(500);
		jQuery('.Total_Soft_Poll_AnswersTable').show(500);
		jQuery('.Total_Soft_Poll_AMShortTable').show(500);
	},500)
}
function TotalSoftPoll_Del_Yes(Poll_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'TotalSoftPoll_Del', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Poll_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) { location.reload(); })
}
function TotalSoftPoll_Del_No(Poll_ID)
{
	jQuery('#Total_Soft_Poll_AMOTable_tr_'+Poll_ID).find('.Total_Soft_Poll_Del_Span').removeClass('Total_Soft_Poll_Del_Span1');
}
function TotalSoftPoll_Del(Poll_ID)
{
	jQuery('#Total_Soft_Poll_AMOTable_tr_'+Poll_ID).find('.Total_Soft_Poll_Del_Span').addClass('Total_Soft_Poll_Del_Span1');
}
function TotalSoftPoll_Clone(Poll_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'TotalSoftPoll_Clone', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Poll_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) { location.reload(); })
}
// Theme Menu
function TotalSoft_Poll_Out()
{
	jQuery('.TotalSoft_Poll_Range').each(function(){
		if(jQuery(this).hasClass('TotalSoft_Poll_Rangeper'))
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'%');
		}
		else if(jQuery(this).hasClass('TotalSoft_Poll_Rangepx'))
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'px');
		}
		else if(jQuery(this).hasClass('TotalSoft_Poll_RangeSec'))
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'s');
		}
		else
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val());
		}
	})
}
function TotalSoft_Poll_Theme_But1()
{
	alert('This is Our Free Version. For more adventures Click to buy Personal version.');
}
function TotalSoftPoll_Theme_Edit(Theme_ID)
{
	jQuery('.Total_Soft_Poll_AMD2').hide(500);
	jQuery('.Total_Soft_Poll_TMMTable').hide(500);
	jQuery('.Total_Soft_Poll_TMOTable').hide(500);
	jQuery('.Total_Soft_Poll_Update').show(500);
	jQuery('#Total_SoftPoll_TUpdateID').val(Theme_ID);

	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'TotalSoftPoll_Theme_Edit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Theme_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=4;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();

		jQuery('#TotalSoft_Poll_TTitle').val(b[0]);
		jQuery('#TotalSoft_Poll_TType').val(b[1]);

		if(b[1] == 'Standart Poll')
		{
			if(b[21]=='true'){ b[21]=true; }else{ b[21]=false; }
			if(b[24]=='true'){ b[24]=true; }else{ b[24]=false; }
			if(b[51]=='true'){ b[51]=true; }else{ b[51]=false; }
			if(b[7]=='false'){ jQuery('#TotalSoft_Poll_1_BoxSh_Type').val('none'); }else{ jQuery('#TotalSoft_Poll_1_BoxSh_Type').val(b[8]); }
			if(b[9] > 0 && b[9] < 50){ jQuery('#TotalSoft_Poll_1_BoxSh').val('Arial'); }else{ jQuery('#TotalSoft_Poll_1_BoxSh').val(b[9]); }
			// jQuery('#TotalSoft_Poll_1_BoxSh_Show').attr('checked',b[7]); 

			jQuery('#TotalSoft_Poll_1_MW').val(b[2]); jQuery('#TotalSoft_Poll_1_Pos').val(b[3]); jQuery('#TotalSoft_Poll_1_BW').val(b[4]); jQuery('#TotalSoft_Poll_1_BC').val(b[5]); jQuery('#TotalSoft_Poll_1_BR').val(b[6]); jQuery('#TotalSoft_Poll_1_BoxShC').val(b[10]); jQuery('#TotalSoft_Poll_1_Q_BgC').val(b[11]); jQuery('#TotalSoft_Poll_1_Q_C').val(b[12]); jQuery('#TotalSoft_Poll_1_Q_FS').val(b[13]); jQuery('#TotalSoft_Poll_1_Q_FF').val(b[14]); jQuery('#TotalSoft_Poll_1_Q_TA').val(b[15]); jQuery('#TotalSoft_Poll_1_LAQ_W').val(b[16]); jQuery('#TotalSoft_Poll_1_LAQ_H').val(b[17]); jQuery('#TotalSoft_Poll_1_LAQ_C').val(b[18]); jQuery('#TotalSoft_Poll_1_LAQ_S').val(b[19]); jQuery('#TotalSoft_Poll_1_A_FS').val(b[20]); jQuery('#TotalSoft_Poll_1_A_CTF').attr('checked',b[21]); jQuery('#TotalSoft_Poll_1_A_BgC').val(b[22]); jQuery('#TotalSoft_Poll_1_A_C').val(b[23]); jQuery('#TotalSoft_Poll_1_CH_CM').attr('checked',b[24]); jQuery('#TotalSoft_Poll_1_CH_S').val(b[25]); jQuery('#TotalSoft_Poll_1_CH_TBC').val(b[26]); jQuery('#TotalSoft_Poll_1_CH_CBC').val(b[27]); jQuery('#TotalSoft_Poll_1_CH_TAC').val(b[28]); jQuery('#TotalSoft_Poll_1_CH_CAC').val(b[29]); jQuery('#TotalSoft_Poll_1_A_HBgC').val(b[30]); jQuery('#TotalSoft_Poll_1_A_HC').val(b[31]); jQuery('#TotalSoft_Poll_1_LAA_W').val(b[32]); jQuery('#TotalSoft_Poll_1_LAA_H').val(b[33]); jQuery('#TotalSoft_Poll_1_LAA_C').val(b[34]); jQuery('#TotalSoft_Poll_1_LAA_S').val(b[35]); jQuery('#TotalSoft_Poll_1_VB_MBgC').val(b[36]); jQuery('#TotalSoft_Poll_1_VB_Pos').val(b[37]); jQuery('#TotalSoft_Poll_1_VB_BW').val(b[38]); jQuery('#TotalSoft_Poll_1_VB_BC').val(b[39]); jQuery('#TotalSoft_Poll_1_VB_BR').val(b[40]); jQuery('#TotalSoft_Poll_1_VB_BgC').val(b[41]); jQuery('#TotalSoft_Poll_1_VB_C').val(b[42]); jQuery('#TotalSoft_Poll_1_VB_FS').val(b[43]); jQuery('#TotalSoft_Poll_1_VB_FF').val(b[44]); jQuery('#TotalSoft_Poll_1_VB_Text').val(b[45]); jQuery('#TotalSoft_Poll_1_VB_IT').val(b[46]); jQuery('#TotalSoft_Poll_1_VB_IA').val(b[47]); jQuery('#TotalSoft_Poll_1_VB_IS').val(b[48]); jQuery('#TotalSoft_Poll_1_VB_HBgC').val(b[49]); jQuery('#TotalSoft_Poll_1_VB_HC').val(b[50]); jQuery('#TotalSoft_Poll_1_RB_Show').attr('checked',b[51]); jQuery('#TotalSoft_Poll_1_RB_Pos').val(b[52]); jQuery('#TotalSoft_Poll_1_RB_BW').val(b[53]); jQuery('#TotalSoft_Poll_1_RB_BC').val(b[54]); jQuery('#TotalSoft_Poll_1_RB_BR').val(b[55]); jQuery('#TotalSoft_Poll_1_RB_BgC').val(b[56]); jQuery('#TotalSoft_Poll_1_RB_C').val(b[57]); jQuery('#TotalSoft_Poll_1_RB_FS').val(b[58]); jQuery('#TotalSoft_Poll_1_RB_FF').val(b[59]); jQuery('#TotalSoft_Poll_1_RB_Text').val(b[60]); jQuery('#TotalSoft_Poll_1_RB_IT').val(b[61]); jQuery('#TotalSoft_Poll_1_RB_IA').val(b[62]);
		}
		else if(b[1] == 'Image Poll' || b[1] == 'Video Poll')
		{
			if(b[28]=='true'){ b[28]=true; }else{ b[28]=false; }
			if(b[36]=='true'){ b[36]=true; }else{ b[36]=false; }
			if(b[21] < 49){ jQuery('#TotalSoft_Poll_2_A_IHR').val(b[21]); jQuery('#TotalSoft_Poll_2_A_IHT').val('ratio'); jQuery('#TotalSoft_Poll_2_A_IH').val('160'); }
			else if(b[21] > 49){ jQuery('#TotalSoft_Poll_2_A_IH').val(b[21]); jQuery('#TotalSoft_Poll_2_A_IHT').val('fixed'); jQuery('#TotalSoft_Poll_2_A_IHR').val('2'); }
			if(b[7]=='false'){ jQuery('#TotalSoft_Poll_2_BoxSh_Type').val('none'); }else{ jQuery('#TotalSoft_Poll_2_BoxSh_Type').val(b[8]); }
			if(b[9] > 0 && b[9] < 50){ jQuery('#TotalSoft_Poll_2_BoxSh').val('Arial'); }else{ jQuery('#TotalSoft_Poll_2_BoxSh').val(b[9]); }
			// jQuery('#TotalSoft_Poll_2_BoxSh_Show').attr('checked',b[7]); jQuery('#TotalSoft_Poll_2_BoxSh_Type').attr('checked',b[8]); jQuery('#TotalSoft_Poll_2_BoxSh').val(b[9]);

			jQuery('#TotalSoft_Poll_2_MW').val(b[2]); jQuery('#TotalSoft_Poll_2_Pos').val(b[3]); jQuery('#TotalSoft_Poll_2_BW').val(b[4]); jQuery('#TotalSoft_Poll_2_BC').val(b[5]); jQuery('#TotalSoft_Poll_2_BR').val(b[6]); jQuery('#TotalSoft_Poll_2_BoxShC').val(b[10]); jQuery('#TotalSoft_Poll_2_Q_BgC').val(b[11]); jQuery('#TotalSoft_Poll_2_Q_C').val(b[12]); jQuery('#TotalSoft_Poll_2_Q_FS').val(b[13]); jQuery('#TotalSoft_Poll_2_Q_FF').val(b[14]); jQuery('#TotalSoft_Poll_2_Q_TA').val(b[15]); jQuery('#TotalSoft_Poll_2_LAQ_W').val(b[16]); jQuery('#TotalSoft_Poll_2_LAQ_H').val(b[17]); jQuery('#TotalSoft_Poll_2_LAQ_C').val(b[18]); jQuery('#TotalSoft_Poll_2_LAQ_S').val(b[19]); jQuery('#TotalSoft_Poll_2_A_CC').val(b[20]); jQuery('#TotalSoft_Poll_2_A_CA').val(b[22]); jQuery('#TotalSoft_Poll_2_A_FS').val(b[23]); jQuery('#TotalSoft_Poll_2_A_MBgC').val(b[24]); jQuery('#TotalSoft_Poll_2_A_BgC').val(b[25]); jQuery('#TotalSoft_Poll_2_A_C').val(b[26]); jQuery('#TotalSoft_Poll_2_A_Pos').val(b[27]); jQuery('#TotalSoft_Poll_2_CH_CM').attr('checked',b[28]); jQuery('#TotalSoft_Poll_2_CH_S').val(b[29]); jQuery('#TotalSoft_Poll_2_CH_TBC').val(b[30]); jQuery('#TotalSoft_Poll_2_CH_CBC').val(b[31]); jQuery('#TotalSoft_Poll_2_CH_TAC').val(b[32]); jQuery('#TotalSoft_Poll_2_CH_CAC').val(b[33]); jQuery('#TotalSoft_Poll_2_A_HBgC').val(b[34]); jQuery('#TotalSoft_Poll_2_A_HC').val(b[35]); jQuery('#TotalSoft_Poll_2_A_HSh_Show').attr('checked',b[36]); jQuery('#TotalSoft_Poll_2_A_HShC').val(b[37]); jQuery('#TotalSoft_Poll_2_LAA_W').val(b[38]); jQuery('#TotalSoft_Poll_2_LAA_H').val(b[39]); jQuery('#TotalSoft_Poll_2_LAA_C').val(b[40]); jQuery('#TotalSoft_Poll_2_LAA_S').val(b[41]); jQuery('#TotalSoft_Poll_2_P_A_OC').val(b[42]); jQuery('#TotalSoft_Poll_2_P_A_C').val(b[43]); jQuery('#TotalSoft_Poll_2_P_A_VT').val(b[44]); jQuery('#TotalSoft_Poll_2_P_A_VEff').val(b[45]); jQuery('#TotalSoft_Poll_2_VB_MBgC').val(b[46]); jQuery('#TotalSoft_Poll_2_VB_Pos').val(b[47]); jQuery('#TotalSoft_Poll_2_VB_BW').val(b[48]); jQuery('#TotalSoft_Poll_2_VB_BC').val(b[49]); jQuery('#TotalSoft_Poll_2_Play_IC').val(b[50]); jQuery('#TotalSoft_Poll_2_Play_IS').val(b[51]); jQuery('#TotalSoft_Poll_2_Play_IOvC').val(b[52]); jQuery('#TotalSoft_Poll_2_Play_IT').val(b[53]);
		}
		else if(b[1] == 'Standart Without Button')
		{
			if(b[28]=='true'){ b[28]=true; }else{ b[28]=false; }
			if(b[40].length!=7){ b[40] = b[40]+')'; }
			if(b[7]=='false'){ jQuery('#TotalSoft_Poll_3_BoxSh_Type').val('none'); }else{ jQuery('#TotalSoft_Poll_3_BoxSh_Type').val(b[8]); }
			if(b[9] > 0 && b[9] < 50){ jQuery('#TotalSoft_Poll_3_BoxSh').val('Arial'); }else{ jQuery('#TotalSoft_Poll_3_BoxSh').val(b[9]); }

			jQuery('#TotalSoft_Poll_3_MW').val(b[2]); jQuery('#TotalSoft_Poll_3_Pos').val(b[3]); jQuery('#TotalSoft_Poll_3_BW').val(b[4]); jQuery('#TotalSoft_Poll_3_BC').val(b[5]); jQuery('#TotalSoft_Poll_3_BR').val(b[6]); jQuery('#TotalSoft_Poll_3_BoxShC').val(b[10]); jQuery('#TotalSoft_Poll_3_Q_BgC').val(b[11]); jQuery('#TotalSoft_Poll_3_Q_C').val(b[12]); jQuery('#TotalSoft_Poll_3_Q_FS').val(b[13]); jQuery('#TotalSoft_Poll_3_Q_FF').val(b[14]); jQuery('#TotalSoft_Poll_3_Q_TA').val(b[15]); jQuery('#TotalSoft_Poll_3_LAQ_W').val(b[16]); jQuery('#TotalSoft_Poll_3_LAQ_H').val(b[17]); jQuery('#TotalSoft_Poll_3_LAQ_C').val(b[18]); jQuery('#TotalSoft_Poll_3_LAQ_S').val(b[19]); jQuery('#TotalSoft_Poll_3_A_CA').val(b[20]); jQuery('#TotalSoft_Poll_3_A_FS').val(b[21]); jQuery('#TotalSoft_Poll_3_A_MBgC').val(b[22]); jQuery('#TotalSoft_Poll_3_A_BgC').val(b[23]); jQuery('#TotalSoft_Poll_3_A_C').val(b[24]); jQuery('#TotalSoft_Poll_3_A_BW').val(b[25]); jQuery('#TotalSoft_Poll_3_A_BC').val(b[26]); jQuery('#TotalSoft_Poll_3_A_BR').val(b[27]); jQuery('#TotalSoft_Poll_3_CH_Sh').attr('checked',b[28]); jQuery('#TotalSoft_Poll_3_CH_S').val(b[29]); jQuery('#TotalSoft_Poll_3_CH_TBC').val(b[30]); jQuery('#TotalSoft_Poll_3_CH_CBC').val(b[31]); jQuery('#TotalSoft_Poll_3_CH_TAC').val(b[32]); jQuery('#TotalSoft_Poll_3_CH_CAC').val(b[33]); jQuery('#TotalSoft_Poll_3_A_HBgC').val(b[34]); jQuery('#TotalSoft_Poll_3_A_HC').val(b[35]); jQuery('#TotalSoft_Poll_3_LAA_W').val(b[36]); jQuery('#TotalSoft_Poll_3_LAA_H').val(b[37]); jQuery('#TotalSoft_Poll_3_LAA_C').val(b[38]); jQuery('#TotalSoft_Poll_3_LAA_S').val(b[39]); jQuery('#TotalSoft_Poll_3_RB_MBgC').val(b[40]);
		}
		else if(b[1] == 'Image Without Button' || b[1] == 'Video Without Button')
		{
			if(b[37]=='true'){ b[37]=true; }else{ b[37]=false; }
			if(b[46]=='true'){ b[46]=true; }else{ b[46]=false; }
			if(b[48].length!=7){ b[48] = b[48]+')'; }
			if(b[7]=='false'){ jQuery('#TotalSoft_Poll_4_BoxSh_Type').val('none'); }else{ jQuery('#TotalSoft_Poll_4_BoxSh_Type').val(b[8]); }
			// jQuery('#TotalSoft_Poll_4_BoxSh').val(b[9]);

			jQuery('#TotalSoft_Poll_4_MW').val(b[2]); jQuery('#TotalSoft_Poll_4_Pos').val(b[3]); jQuery('#TotalSoft_Poll_4_BW').val(b[4]); jQuery('#TotalSoft_Poll_4_BC').val(b[5]); jQuery('#TotalSoft_Poll_4_BR').val(b[6]); jQuery('#TotalSoft_Poll_4_BoxShC').val(b[10]); jQuery('#TotalSoft_Poll_4_Q_BgC').val(b[11]); jQuery('#TotalSoft_Poll_4_Q_C').val(b[12]); jQuery('#TotalSoft_Poll_4_Q_FS').val(b[13]); jQuery('#TotalSoft_Poll_4_Q_FF').val(b[14]); jQuery('#TotalSoft_Poll_4_Q_TA').val(b[15]); jQuery('#TotalSoft_Poll_4_LAQ_W').val(b[16]); jQuery('#TotalSoft_Poll_4_LAQ_H').val(b[17]); jQuery('#TotalSoft_Poll_4_LAQ_C').val(b[18]); jQuery('#TotalSoft_Poll_4_LAQ_S').val(b[19]); jQuery('#TotalSoft_Poll_4_A_CA').val(b[20]); jQuery('#TotalSoft_Poll_4_A_FS').val(b[21]); jQuery('#TotalSoft_Poll_4_A_MBgC').val(b[22]); jQuery('#TotalSoft_Poll_4_A_BgC').val(b[23]); jQuery('#TotalSoft_Poll_4_A_C').val(b[24]); jQuery('#TotalSoft_Poll_4_A_BW').val(b[25]); jQuery('#TotalSoft_Poll_4_A_BC').val(b[26]); jQuery('#TotalSoft_Poll_4_A_BR').val(b[27]); jQuery('#TotalSoft_Poll_4_A_FF').val(b[28]); jQuery('#TotalSoft_Poll_4_A_HBgC').val(b[29]); jQuery('#TotalSoft_Poll_4_A_HC').val(b[30]); jQuery('#TotalSoft_Poll_4_I_H').val(b[31]); jQuery('#TotalSoft_Poll_4_I_Ra').val(b[32]); jQuery('#TotalSoft_Poll_4_I_OC').val(b[33]); jQuery('#TotalSoft_Poll_4_I_IT').val(b[34]); jQuery('#TotalSoft_Poll_4_I_IC').val(b[35]); jQuery('#TotalSoft_Poll_4_I_IS').val(b[36]); jQuery('#TotalSoft_Poll_4_Pop_Show').attr('checked',b[37]); jQuery('#TotalSoft_Poll_4_Pop_IT').val(b[38]); jQuery('#TotalSoft_Poll_4_Pop_IC').val(b[39]); jQuery('#TotalSoft_Poll_4_Pop_BW').val(b[40]); jQuery('#TotalSoft_Poll_4_Pop_BC').val(b[41]); jQuery('#TotalSoft_Poll_4_LAA_W').val(b[42]); jQuery('#TotalSoft_Poll_4_LAA_H').val(b[43]); jQuery('#TotalSoft_Poll_4_LAA_C').val(b[44]); jQuery('#TotalSoft_Poll_4_LAA_S').val(b[45]); jQuery('#TotalSoft_Poll_4_TV_Show').attr('checked',b[46]); jQuery('#TotalSoft_Poll_4_TV_Pos').val(b[47]); jQuery('#TotalSoft_Poll_4_TV_C').val(b[48]);
		}
		else if(b[1] == 'Image in Question' || b[1] == 'Video in Question')
		{
			if(b[42]=='true'){ b[42]=true; }else{ b[42]=false; }
			if(b[48]=='true'){ b[48]=true; }else{ b[48]=false; }
			if(b[7]=='false'){ jQuery('#TotalSoft_Poll_5_BoxSh_Type').val('none'); }else{ jQuery('#TotalSoft_Poll_5_BoxSh_Type').val(b[8]); }
			if(b[9] > 0 && b[9] < 50){ jQuery('#TotalSoft_Poll_5_BoxSh').val('Arial'); }else{ jQuery('#TotalSoft_Poll_5_BoxSh').val(b[9]); }

			jQuery('#TotalSoft_Poll_5_MW').val(b[2]); jQuery('#TotalSoft_Poll_5_Pos').val(b[3]); jQuery('#TotalSoft_Poll_5_BW').val(b[4]); jQuery('#TotalSoft_Poll_5_BC').val(b[5]); jQuery('#TotalSoft_Poll_5_BR').val(b[6]); jQuery('#TotalSoft_Poll_5_BoxShC').val(b[10]); jQuery('#TotalSoft_Poll_5_Q_BgC').val(b[11]); jQuery('#TotalSoft_Poll_5_Q_C').val(b[12]); jQuery('#TotalSoft_Poll_5_Q_FS').val(b[13]); jQuery('#TotalSoft_Poll_5_Q_FF').val(b[14]); jQuery('#TotalSoft_Poll_5_Q_TA').val(b[15]); jQuery('#TotalSoft_Poll_5_I_H').val(b[16]); jQuery('#TotalSoft_Poll_5_I_Ra').val(b[17]); jQuery('#TotalSoft_Poll_5_V_W').val(b[18]); jQuery('#TotalSoft_Poll_5_LAQ_W').val(b[19]); jQuery('#TotalSoft_Poll_5_LAQ_H').val(b[20]); jQuery('#TotalSoft_Poll_5_LAQ_C').val(b[21]); jQuery('#TotalSoft_Poll_5_LAQ_S').val(b[22]); jQuery('#TotalSoft_Poll_5_A_CA').val(b[23]); jQuery('#TotalSoft_Poll_5_A_FS').val(b[24]); jQuery('#TotalSoft_Poll_5_A_MBgC').val(b[25]); jQuery('#TotalSoft_Poll_5_A_BgC').val(b[26]); jQuery('#TotalSoft_Poll_5_A_C').val(b[27]); jQuery('#TotalSoft_Poll_5_A_BW').val(b[28]); jQuery('#TotalSoft_Poll_5_A_BC').val(b[29]); jQuery('#TotalSoft_Poll_5_A_BR').val(b[30]); jQuery('#TotalSoft_Poll_5_CH_S').val(b[31]); jQuery('#TotalSoft_Poll_5_CH_TBC').val(b[32]); jQuery('#TotalSoft_Poll_5_CH_CBC').val(b[33]); jQuery('#TotalSoft_Poll_5_CH_TAC').val(b[34]); jQuery('#TotalSoft_Poll_5_CH_CAC').val(b[35]); jQuery('#TotalSoft_Poll_5_A_HBgC').val(b[36]); jQuery('#TotalSoft_Poll_5_A_HC').val(b[37]); jQuery('#TotalSoft_Poll_5_LAA_W').val(b[38]); jQuery('#TotalSoft_Poll_5_LAA_H').val(b[39]); jQuery('#TotalSoft_Poll_5_LAA_C').val(b[40]); jQuery('#TotalSoft_Poll_5_LAA_S').val(b[41]); jQuery('#TotalSoft_Poll_5_TV_Show').attr('checked',b[42]); jQuery('#TotalSoft_Poll_5_TV_Pos').val(b[43]); jQuery('#TotalSoft_Poll_5_TV_C').val(b[44]); jQuery('#TotalSoft_Poll_5_TV_FS').val(b[45]); jQuery('#TotalSoft_Poll_5_VT_IT').val(b[46]); jQuery('#TotalSoft_Poll_5_VT_IA').val(b[47]); jQuery('#TotalSoft_Poll_5_VB_Show').attr('checked',b[48]); jQuery('#TotalSoft_Poll_5_VB_Pos').val(b[49]); jQuery('#TotalSoft_Poll_5_VB_BW').val(b[50]); jQuery('#TotalSoft_Poll_5_VB_BC').val(b[51]); jQuery('#TotalSoft_Poll_5_VB_BR').val(b[52]); jQuery('#TotalSoft_Poll_5_VB_MBgC').val(b[53]); jQuery('#TotalSoft_Poll_5_VB_BgC').val(b[54]); jQuery('#TotalSoft_Poll_5_VB_C').val(b[55]); jQuery('#TotalSoft_Poll_5_VB_FS').val(b[56]); jQuery('#TotalSoft_Poll_5_VB_FF').val(b[57]);
		}
		jQuery('.Total_Soft_Poll_T_Color').alphaColorPicker();
		jQuery('.wp-picker-holder').addClass('alpha-picker-holder');
		TotalSoft_Poll_Out();
	})

	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'TotalSoftPoll_Theme_Edit1', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Theme_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=4;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();
		jQuery('#TotalSoft_Poll_TType').hide();
		if(b[1] == 'Standart Poll')
		{
			if(b[7]=='true'){ b[7]=true; }else{ b[7]=false; }
			if(b[35].length!=7){ b[35] = b[35]+')'; }

			jQuery('#TotalSoft_Poll_1_RB_IS').val(b[2]); jQuery('#TotalSoft_Poll_1_RB_HBgC').val(b[3]); jQuery('#TotalSoft_Poll_1_RB_HC').val(b[4]); jQuery('#TotalSoft_Poll_1_P_BW').val(b[5]); jQuery('#TotalSoft_Poll_1_P_BC').val(b[6]); jQuery('#TotalSoft_Poll_1_P_ShPop').attr('checked',b[7]); jQuery('#TotalSoft_Poll_1_P_ShEff').val(b[8]); jQuery('#TotalSoft_Poll_1_P_Q_BgC').val(b[9]); jQuery('#TotalSoft_Poll_1_P_Q_C').val(b[10]); jQuery('#TotalSoft_Poll_1_P_LAQ_W').val(b[11]); jQuery('#TotalSoft_Poll_1_P_LAQ_H').val(b[12]); jQuery('#TotalSoft_Poll_1_P_LAQ_C').val(b[13]); jQuery('#TotalSoft_Poll_1_P_LAQ_S').val(b[14]); jQuery('#TotalSoft_Poll_1_P_A_BgC').val(b[15]); jQuery('#TotalSoft_Poll_1_P_A_C').val(b[16]); jQuery('#TotalSoft_Poll_1_P_A_VT').val(b[17]); jQuery('#TotalSoft_Poll_1_P_A_VC').val(b[18]); jQuery('#TotalSoft_Poll_1_P_A_VEff').val(b[19]); jQuery('#TotalSoft_Poll_1_P_LAA_W').val(b[20]); jQuery('#TotalSoft_Poll_1_P_LAA_H').val(b[21]); jQuery('#TotalSoft_Poll_1_P_LAA_C').val(b[22]); jQuery('#TotalSoft_Poll_1_P_LAA_S').val(b[23]); jQuery('#TotalSoft_Poll_1_P_BB_Pos').val(b[24]); jQuery('#TotalSoft_Poll_1_P_BB_BC').val(b[25]); jQuery('#TotalSoft_Poll_1_P_BB_BgC').val(b[26]); jQuery('#TotalSoft_Poll_1_P_BB_C').val(b[27]); jQuery('#TotalSoft_Poll_1_P_BB_Text').val(b[28]); jQuery('#TotalSoft_Poll_1_P_BB_IT').val(b[29]); jQuery('#TotalSoft_Poll_1_P_BB_IA').val(b[30]); jQuery('#TotalSoft_Poll_1_P_BB_HBgC').val(b[31]); jQuery('#TotalSoft_Poll_1_P_BB_HC').val(b[32]); jQuery('#TotalSoft_Poll_1_P_BB_MBgC').val(b[33]); jQuery('#TotalSoft_Poll_1_P_A_MBgC').val(b[34]); jQuery('#TotalSoft_Poll_1_A_MBgC').val(b[35]);
			jQuery('.Total_Soft_Poll_TMSetTable_1').show(500);
		}
		else if(b[1] == 'Image Poll' || b[1] == 'Video Poll')
		{
			if(b[13]=='true'){ b[13]=true; }else{ b[13]=false; }
			if(b[37].length!=7){ b[37] = b[37]+')'; }
			if(b[1] == 'Image Poll') { jQuery('.Total_Soft_Poll_Video_Set').fadeOut(); } else { jQuery('.Total_Soft_Poll_Video_Set').fadeIn(); }

			jQuery('#TotalSoft_Poll_2_VB_BR').val(b[2]); jQuery('#TotalSoft_Poll_2_VB_BgC').val(b[3]); jQuery('#TotalSoft_Poll_2_VB_C').val(b[4]); jQuery('#TotalSoft_Poll_2_VB_FS').val(b[5]); jQuery('#TotalSoft_Poll_2_VB_FF').val(b[6]); jQuery('#TotalSoft_Poll_2_VB_Text').val(b[7]); jQuery('#TotalSoft_Poll_2_VB_IT').val(b[8]); jQuery('#TotalSoft_Poll_2_VB_IA').val(b[9]); jQuery('#TotalSoft_Poll_2_VB_IS').val(b[10]); jQuery('#TotalSoft_Poll_2_VB_HBgC').val(b[11]); jQuery('#TotalSoft_Poll_2_VB_HC').val(b[12]); jQuery('#TotalSoft_Poll_2_RB_Show').attr('checked',b[13]); jQuery('#TotalSoft_Poll_2_RB_Pos').val(b[14]); jQuery('#TotalSoft_Poll_2_RB_BW').val(b[15]); jQuery('#TotalSoft_Poll_2_RB_BC').val(b[16]); jQuery('#TotalSoft_Poll_2_RB_BR').val(b[17]); jQuery('#TotalSoft_Poll_2_RB_BgC').val(b[18]); jQuery('#TotalSoft_Poll_2_RB_C').val(b[19]); jQuery('#TotalSoft_Poll_2_RB_FS').val(b[20]); jQuery('#TotalSoft_Poll_2_RB_FF').val(b[21]); jQuery('#TotalSoft_Poll_2_RB_Text').val(b[22]); jQuery('#TotalSoft_Poll_2_RB_IT').val(b[23]); jQuery('#TotalSoft_Poll_2_RB_IA').val(b[24]); jQuery('#TotalSoft_Poll_2_RB_IS').val(b[25]); jQuery('#TotalSoft_Poll_2_RB_HBgC').val(b[26]); jQuery('#TotalSoft_Poll_2_RB_HC').val(b[27]); jQuery('#TotalSoft_Poll_2_P_BB_MBgC').val(b[28]); jQuery('#TotalSoft_Poll_2_P_BB_Pos').val(b[29]); jQuery('#TotalSoft_Poll_2_P_BB_BC').val(b[30]); jQuery('#TotalSoft_Poll_2_P_BB_BgC').val(b[31]); jQuery('#TotalSoft_Poll_2_P_BB_C').val(b[32]); jQuery('#TotalSoft_Poll_2_P_BB_Text').val(b[33]); jQuery('#TotalSoft_Poll_2_P_BB_IT').val(b[34]); jQuery('#TotalSoft_Poll_2_P_BB_IA').val(b[35]); jQuery('#TotalSoft_Poll_2_P_BB_HBgC').val(b[36]); jQuery('#TotalSoft_Poll_2_P_BB_HC').val(b[37]); 
			jQuery('.Total_Soft_Poll_TMSetTable_2').show(500);
		}
		else if(b[1] == 'Standart Without Button')
		{
			if(b[2]=='true'){ b[2]=true; }else{ b[2]=false; }
			if(b[8]=='true'){ b[8]=true; }else{ b[8]=false; }

			jQuery('#TotalSoft_Poll_3_TV_Show').attr('checked',b[2]); jQuery('#TotalSoft_Poll_3_TV_Pos').val(b[3]); jQuery('#TotalSoft_Poll_3_TV_C').val(b[4]); jQuery('#TotalSoft_Poll_3_TV_FS').val(b[5]); jQuery('#TotalSoft_Poll_3_TV_Text').val(b[6]); jQuery('#TotalSoft_Poll_3_VT_IT').val(b[7]); jQuery('#TotalSoft_Poll_3_RB_Show').attr('checked',b[8]); jQuery('#TotalSoft_Poll_3_RB_Pos').val(b[9]); jQuery('#TotalSoft_Poll_3_RB_BW').val(b[10]); jQuery('#TotalSoft_Poll_3_RB_BC').val(b[11]); jQuery('#TotalSoft_Poll_3_RB_BR').val(b[12]); jQuery('#TotalSoft_Poll_3_RB_BgC').val(b[13]); jQuery('#TotalSoft_Poll_3_RB_C').val(b[14]); jQuery('#TotalSoft_Poll_3_RB_FS').val(b[15]); jQuery('#TotalSoft_Poll_3_RB_FF').val(b[16]); jQuery('#TotalSoft_Poll_3_RB_Text').val(b[17]); jQuery('#TotalSoft_Poll_3_RB_IT').val(b[18]); jQuery('#TotalSoft_Poll_3_RB_IA').val(b[19]); jQuery('#TotalSoft_Poll_3_RB_IS').val(b[20]); jQuery('#TotalSoft_Poll_3_RB_HBgC').val(b[21]); jQuery('#TotalSoft_Poll_3_RB_HC').val(b[22]); jQuery('#TotalSoft_Poll_3_V_CA').val(b[23]); jQuery('#TotalSoft_Poll_3_V_MBgC').val(b[24]); jQuery('#TotalSoft_Poll_3_V_BgC').val(b[25]); jQuery('#TotalSoft_Poll_3_V_C').val(b[26]); jQuery('#TotalSoft_Poll_3_V_T').val(b[27]); jQuery('#TotalSoft_Poll_3_V_Eff').val(b[28]); jQuery('#TotalSoft_Poll_3_BB_MBgC').val(b[29]); jQuery('#TotalSoft_Poll_3_BB_Pos').val(b[30]); jQuery('#TotalSoft_Poll_3_BB_BC').val(b[31]); jQuery('#TotalSoft_Poll_3_BB_BgC').val(b[32]); jQuery('#TotalSoft_Poll_3_BB_C').val(b[33]); jQuery('#TotalSoft_Poll_3_BB_Text').val(b[34]); jQuery('#TotalSoft_Poll_3_BB_IT').val(b[35]); jQuery('#TotalSoft_Poll_3_BB_IA').val(b[36]); jQuery('#TotalSoft_Poll_3_BB_HBgC').val(b[37]); jQuery('#TotalSoft_Poll_3_BB_HC').val(b[38]); jQuery('#TotalSoft_Poll_3_VT_IA').val(b[39]); 
			jQuery('.Total_Soft_Poll_TMSetTable_3').show(500);
		}
		else if(b[1] == 'Image Without Button' || b[1] == 'Video Without Button')
		{
			if(b[1] == 'Image Without Button') { jQuery('.TSP1').fadeIn(); jQuery('.TSP2').fadeOut(); }
			else { jQuery('.TSP2').fadeIn(); jQuery('.TSP1').fadeOut(); }
			if(b[6]=='true'){ b[6]=true; }else{ b[6]=false; }
			if(b[37].length!=7){ b[37] = b[37]+')'; }

			jQuery('#TotalSoft_Poll_4_TV_FS').val(b[2]); jQuery('#TotalSoft_Poll_4_TV_Text').val(b[3]); jQuery('#TotalSoft_Poll_4_VT_IT').val(b[4]); jQuery('#TotalSoft_Poll_4_VT_IA').val(b[5]); jQuery('#TotalSoft_Poll_4_RB_Show').attr('checked',b[6]); jQuery('#TotalSoft_Poll_4_RB_Pos').val(b[7]); jQuery('#TotalSoft_Poll_4_RB_BW').val(b[8]); jQuery('#TotalSoft_Poll_4_RB_BC').val(b[9]); jQuery('#TotalSoft_Poll_4_RB_BR').val(b[10]); jQuery('#TotalSoft_Poll_4_RB_MBgC').val(b[11]); jQuery('#TotalSoft_Poll_4_RB_BgC').val(b[12]); jQuery('#TotalSoft_Poll_4_RB_C').val(b[13]); jQuery('#TotalSoft_Poll_4_RB_FS').val(b[14]); jQuery('#TotalSoft_Poll_4_RB_FF').val(b[15]); jQuery('#TotalSoft_Poll_4_RB_Text').val(b[16]); jQuery('#TotalSoft_Poll_4_RB_IT').val(b[17]); jQuery('#TotalSoft_Poll_4_RB_IA').val(b[18]); jQuery('#TotalSoft_Poll_4_RB_IS').val(b[19]); jQuery('#TotalSoft_Poll_4_RB_HBgC').val(b[20]); jQuery('#TotalSoft_Poll_4_RB_HC').val(b[21]); jQuery('#TotalSoft_Poll_4_V_CA').val(b[22]); jQuery('#TotalSoft_Poll_4_V_MBgC').val(b[23]); jQuery('#TotalSoft_Poll_4_V_BgC').val(b[24]); jQuery('#TotalSoft_Poll_4_V_C').val(b[25]); jQuery('#TotalSoft_Poll_4_V_T').val(b[26]); jQuery('#TotalSoft_Poll_4_V_Eff').val(b[27]); jQuery('#TotalSoft_Poll_4_BB_MBgC').val(b[28]); jQuery('#TotalSoft_Poll_4_BB_Pos').val(b[29]); jQuery('#TotalSoft_Poll_4_BB_BC').val(b[30]); jQuery('#TotalSoft_Poll_4_BB_BgC').val(b[31]); jQuery('#TotalSoft_Poll_4_BB_C').val(b[32]); jQuery('#TotalSoft_Poll_4_BB_Text').val(b[33]); jQuery('#TotalSoft_Poll_4_BB_IT').val(b[34]); jQuery('#TotalSoft_Poll_4_BB_IA').val(b[35]); jQuery('#TotalSoft_Poll_4_BB_HBgC').val(b[36]); jQuery('#TotalSoft_Poll_4_BB_HC').val(b[37]);
			jQuery('.Total_Soft_Poll_TMSetTable_4').show(500);
		}
		else if(b[1] == 'Image in Question' || b[1] == 'Video in Question')
		{
			if(b[1] == 'Image in Question') { jQuery('.TSPIIQ').fadeIn(); jQuery('.TSPVIQ').fadeOut(); }
			else { jQuery('.TSPVIQ').fadeIn(); jQuery('.TSPIIQ').fadeOut(); }
			if(b[7]=='true'){ b[7]=true; }else{ b[7]=false; }

			jQuery('#TotalSoft_Poll_5_VB_IT').val(b[2]); jQuery('#TotalSoft_Poll_5_VB_IA').val(b[3]); jQuery('#TotalSoft_Poll_5_VB_IS').val(b[4]); jQuery('#TotalSoft_Poll_5_VB_HBgC').val(b[5]); jQuery('#TotalSoft_Poll_5_VB_HC').val(b[6]); jQuery('#TotalSoft_Poll_5_RB_Show').attr('checked',b[7]); jQuery('#TotalSoft_Poll_5_RB_Pos').val(b[8]); jQuery('#TotalSoft_Poll_5_RB_BW').val(b[9]); jQuery('#TotalSoft_Poll_5_RB_BC').val(b[10]); jQuery('#TotalSoft_Poll_5_RB_BR').val(b[11]); jQuery('#TotalSoft_Poll_5_RB_BgC').val(b[12]); jQuery('#TotalSoft_Poll_5_RB_C').val(b[13]); jQuery('#TotalSoft_Poll_5_RB_FS').val(b[14]); jQuery('#TotalSoft_Poll_5_RB_FF').val(b[15]); jQuery('#TotalSoft_Poll_5_RB_IT').val(b[16]); jQuery('#TotalSoft_Poll_5_RB_IA').val(b[17]); jQuery('#TotalSoft_Poll_5_RB_IS').val(b[18]); jQuery('#TotalSoft_Poll_5_RB_HBgC').val(b[19]); jQuery('#TotalSoft_Poll_5_RB_HC').val(b[20]); jQuery('#TotalSoft_Poll_5_V_CA').val(b[21]); jQuery('#TotalSoft_Poll_5_V_MBgC').val(b[22]); jQuery('#TotalSoft_Poll_5_V_BgC').val(b[23]); jQuery('#TotalSoft_Poll_5_V_C').val(b[24]); jQuery('#TotalSoft_Poll_5_V_T').val(b[25]); jQuery('#TotalSoft_Poll_5_V_Eff').val(b[26]); jQuery('#TotalSoft_Poll_5_BB_MBgC').val(b[27]); jQuery('#TotalSoft_Poll_5_BB_Pos').val(b[28]); jQuery('#TotalSoft_Poll_5_BB_BC').val(b[29]); jQuery('#TotalSoft_Poll_5_BB_BgC').val(b[30]); jQuery('#TotalSoft_Poll_5_BB_C').val(b[31]); jQuery('#TotalSoft_Poll_5_BB_IT').val(b[32]); jQuery('#TotalSoft_Poll_5_BB_IA').val(b[33]); jQuery('#TotalSoft_Poll_5_BB_HBgC').val(b[34]); jQuery('#TotalSoft_Poll_5_BB_HC').val(b[35]); jQuery('#TotalSoft_Poll_5_TV_Text').val(b[36]); jQuery('#TotalSoft_Poll_5_BB_Text').val(b[37]); jQuery('#TotalSoft_Poll_5_RB_Text').val(b[38]); jQuery('#TotalSoft_Poll_5_VB_Text').val(b[39]);
			jQuery('.Total_Soft_Poll_TMSetTable_5').show(500);
		}
		jQuery('.Total_Soft_Poll_T_Color_1').alphaColorPicker();
		jQuery('.wp-picker-holder').addClass('alpha-picker-holder');
		TotalSoft_Poll_Out();
	})
	setTimeout(function(){
		jQuery('.Total_Soft_Poll_AMD3').show(500);
		jQuery('.Total_Soft_Poll_Add_MTable').show(500);
	},500)
}
function TotalSoftPoll_Theme_Clone(Theme_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'TotalSoftPoll_Theme_Clone', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Theme_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) { location.reload(); })
}
function TotalSoftPoll_Theme_Del_No(Theme_ID)
{
	jQuery('#Total_Soft_Poll_TMOTable_tr_'+Theme_ID).find('.Total_Soft_Poll_Del_Span').removeClass('Total_Soft_Poll_Del_Span1');
}
function TotalSoftPoll_Theme_Del(Theme_ID)
{
	jQuery('#Total_Soft_Poll_TMOTable_tr_'+Theme_ID).find('.Total_Soft_Poll_Del_Span').addClass('Total_Soft_Poll_Del_Span1');
}
// Settings Menu
function Total_Soft_Poll_SM_But1()
{
	jQuery('.Total_Soft_Poll_AMD2').hide(500);
	jQuery('.Total_Soft_Poll_SMMTable').hide(500);
	jQuery('.Total_Soft_Poll_SMOTable').hide(500);
	jQuery('.Total_Soft_Poll_Save_Set').show(500);
	jQuery('.Total_Soft_Poll_Update_Set').hide(500);

	setTimeout(function(){
		jQuery('.Total_Soft_Poll_AMD3').show(500);
		jQuery('.Total_Soft_Poll_TMSetTable').show(500);
		jQuery('.Total_Soft_Poll_T_Color').alphaColorPicker();
		jQuery('.wp-picker-holder').addClass('alpha-picker-holder');
		TotalSoft_Poll_Out();
	},500)
}
function TotalSoftPoll_Clone_Set(Set_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'TotalSoftPoll_Clone_Set', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Set_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) { location.reload(); })
}
function TotalSoftPoll_Edit_Set(Set_ID)
{
	jQuery('.Total_Soft_Poll_AMD2').hide(500);
	jQuery('.Total_Soft_Poll_SMMTable').hide(500);
	jQuery('.Total_Soft_Poll_SMOTable').hide(500);
	jQuery('.Total_Soft_Poll_Update_Set').show(500);
	jQuery('.Total_Soft_Poll_Save_Set').hide(500);
	jQuery('#Total_SoftPoll_Update_Set').val(Set_ID);

	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'TotalSoftPoll_Edit_Set', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Set_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();

		if(b[1]=='true'){ b[1]=true; }else{ b[1]=false; }
		if(b[10]=='true'){ b[10]=true; }else{ b[10]=false; }

		jQuery('#TotalSoft_Poll_SetTitle').val(b[0]);
		jQuery('#TotalSoft_Poll_Set_01').attr('checked',b[1]);
		jQuery('#TotalSoft_Poll_Set_02').val(b[2]);
		jQuery('#TotalSoft_Poll_Set_03').val(b[3]);
		jQuery('#TotalSoft_Poll_Set_04').val(b[4]);
		jQuery('#TotalSoft_Poll_Set_05').val(b[5]);
		jQuery('#TotalSoft_Poll_Set_06').val(b[6]);
		jQuery('#TotalSoft_Poll_Set_07').val(b[7]);
		jQuery('#TotalSoft_Poll_Set_08').val(b[8]);
		jQuery('#TotalSoft_Poll_Set_09').val(b[9]);
		jQuery('#TotalSoft_Poll_Set_10').attr('checked',b[10]);
		jQuery('#TotalSoft_Poll_Set_11').val(b[11]);

		jQuery('.Total_Soft_Poll_T_Color').alphaColorPicker();
		jQuery('.wp-picker-holder').addClass('alpha-picker-holder');
		TotalSoft_Poll_Out();
	})
	setTimeout(function(){
		jQuery('.Total_Soft_Poll_AMD3').show(500);
		jQuery('.Total_Soft_Poll_TMSetTable').show(500);
	},500)
}
function TotalSoftPoll_Del_Set(Set_ID)
{
	jQuery('#Total_Soft_Poll_SMOTable_tr_'+Set_ID).find('.Total_Soft_Poll_Del_Span').addClass('Total_Soft_Poll_Del_Span1');
}
function TotalSoftPoll_Del_Yes_Set(Set_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'TotalSoftPoll_Del_Set', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Set_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) { location.reload(); })
}
function TotalSoftPoll_Del_No_Set(Set_ID)
{
	jQuery('#Total_Soft_Poll_SMOTable_tr_'+Set_ID).find('.Total_Soft_Poll_Del_Span').removeClass('Total_Soft_Poll_Del_Span1');
}