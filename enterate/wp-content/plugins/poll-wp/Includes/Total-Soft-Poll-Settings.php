<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	require_once(dirname(__FILE__) . '/Total-Soft-Poll-Check.php');
	require_once(dirname(__FILE__) . '/Total-Soft-Pricing.php');
	global $wpdb;
	$table_name = $wpdb->prefix . "totalsoft_fonts";
	$table_name18 = $wpdb->prefix . "totalsoft_poll_setting";
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_', 'TS_Poll_Nonce' ))
		{
			$TotalSoft_Poll_SetTitle = sanitize_text_field($_POST['TotalSoft_Poll_SetTitle']);
			$TotalSoft_Poll_Set_01 = sanitize_text_field($_POST['TotalSoft_Poll_Set_01']);
			$TotalSoft_Poll_Set_02 = sanitize_text_field($_POST['TotalSoft_Poll_Set_02']);
			$TotalSoft_Poll_Set_03 = sanitize_text_field($_POST['TotalSoft_Poll_Set_03']);
			$TotalSoft_Poll_Set_04 = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_Set_04'])));
			$TotalSoft_Poll_Set_05 = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_Set_05'])));
			$TotalSoft_Poll_Set_05 = sanitize_text_field($_POST['TotalSoft_Poll_Set_05']);
			$TotalSoft_Poll_Set_06 = sanitize_text_field($_POST['TotalSoft_Poll_Set_06']);
			$TotalSoft_Poll_Set_07 = sanitize_text_field($_POST['TotalSoft_Poll_Set_07']);
			$TotalSoft_Poll_Set_08 = sanitize_text_field($_POST['TotalSoft_Poll_Set_08']);
			$TotalSoft_Poll_Set_09 = sanitize_text_field($_POST['TotalSoft_Poll_Set_09']);
			$TotalSoft_Poll_Set_10 = sanitize_text_field($_POST['TotalSoft_Poll_Set_10']);
			$TotalSoft_Poll_Set_11 = sanitize_text_field($_POST['TotalSoft_Poll_Set_11']);

			if($TotalSoft_Poll_Set_01=='on'){ $TotalSoft_Poll_Set_01='true'; }else{ $TotalSoft_Poll_Set_01='false'; }
			if($TotalSoft_Poll_Set_10=='on'){ $TotalSoft_Poll_Set_10='true'; }else{ $TotalSoft_Poll_Set_10='false'; }
			
			if(isset($_POST['Total_Soft_Poll_Save_Set']))
			{
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name18 (id, TotalSoft_Poll_SetTitle, TotalSoft_Poll_Set_01, TotalSoft_Poll_Set_02, TotalSoft_Poll_Set_03, TotalSoft_Poll_Set_04, TotalSoft_Poll_Set_05, TotalSoft_Poll_Set_06, TotalSoft_Poll_Set_07, TotalSoft_Poll_Set_08, TotalSoft_Poll_Set_09, TotalSoft_Poll_Set_10, TotalSoft_Poll_Set_11) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoft_Poll_SetTitle, $TotalSoft_Poll_Set_01, $TotalSoft_Poll_Set_02, $TotalSoft_Poll_Set_03, $TotalSoft_Poll_Set_04, $TotalSoft_Poll_Set_05, $TotalSoft_Poll_Set_06, $TotalSoft_Poll_Set_07, $TotalSoft_Poll_Set_08, $TotalSoft_Poll_Set_09, $TotalSoft_Poll_Set_10, $TotalSoft_Poll_Set_11));
			}
			else if(isset($_POST['Total_Soft_Poll_Update_Set']))
			{
				$Total_SoftPoll_Update_Set = sanitize_text_field($_POST['Total_SoftPoll_Update_Set']);

				$wpdb->query($wpdb->prepare("UPDATE $table_name18 set TotalSoft_Poll_SetTitle = %s, TotalSoft_Poll_Set_01 = %s, TotalSoft_Poll_Set_02 = %s, TotalSoft_Poll_Set_03 = %s, TotalSoft_Poll_Set_04 = %s, TotalSoft_Poll_Set_05 = %s, TotalSoft_Poll_Set_06 = %s, TotalSoft_Poll_Set_07 = %s, TotalSoft_Poll_Set_08 = %s, TotalSoft_Poll_Set_09 = %s, TotalSoft_Poll_Set_10 = %s, TotalSoft_Poll_Set_11 = %s WHERE id=%d", $TotalSoft_Poll_SetTitle, $TotalSoft_Poll_Set_01, $TotalSoft_Poll_Set_02, $TotalSoft_Poll_Set_03, $TotalSoft_Poll_Set_04, $TotalSoft_Poll_Set_05, $TotalSoft_Poll_Set_06, $TotalSoft_Poll_Set_07, $TotalSoft_Poll_Set_08, $TotalSoft_Poll_Set_09, $TotalSoft_Poll_Set_10, $TotalSoft_Poll_Set_11, $Total_SoftPoll_Update_Set));
			}
		}
		else
		{
			wp_die('Security check fail'); 
		}
	}

	$TotalSoftFontCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d order by id", 0));
	$TotalSoftPollSetCount = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name18 WHERE id>%d order by id",0));
?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
<form method="POST" enctype="multipart/form-data">
	<?php wp_nonce_field( 'edit-menu_', 'TS_Poll_Nonce' );?>
	<div class="Total_Soft_Poll_AMD">
		<a href="http://total-soft.pe.hu/poll/" target="_blank" title="Click to Buy">
			<div class="Full_Version"><i class="totalsoft totalsoft-cart-arrow-down"></i> Get The Full Version</div>
		</a>
		<div class="Full_Version_Span">
			This is the free version of the plugin.
		</div>
		<div class="Support_Span">
			<a href="https://wordpress.org/support/plugin/poll-wp/" target="_blank" title="Click Here to Ask">
				<i class="totalsoft totalsoft-comments-o"></i><span style="margin-left:5px;">If you have any questions click here to ask it to our support.</span>
			</a>
		</div>
		<div class="Total_Soft_Poll_AMD1"></div>
		<div class="Total_Soft_Poll_AMD2">
			<i class="Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title=""></i>
			<input type="button" name="" value="New Settings" class="Total_Soft_Poll_AMD2_But" onclick="Total_Soft_Poll_SM_But1()">
		</div>
		<div class="Total_Soft_Poll_AMD3">
			<i class="Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title=""></i>
			<input type="button" value="Cancel" class="Total_Soft_Poll_AMD2_But" onclick='TotalSoftPoll_Reload()'>
			<i class="Total_Soft_Poll_Save_Set Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title=""></i>
			<input type="submit" name="Total_Soft_Poll_Save_Set" value="Save" class="Total_Soft_Poll_Save_Set Total_Soft_Poll_AMD2_But">
			<i class="Total_Soft_Poll_Update_Set Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title=""></i>
			<input type="submit" name="Total_Soft_Poll_Update_Set" value="Update" class="Total_Soft_Poll_Update_Set Total_Soft_Poll_AMD2_But">
			<input type="text" style="display:none" name="Total_SoftPoll_Update_Set" id="Total_SoftPoll_Update_Set">
		</div>
	</div>
	<table class="Total_Soft_Poll_SMMTable">
		<tr class="Total_Soft_Poll_SMMTableFR">
			<td>No</td>
			<td>Setting Title</td>
			<td>Show Results</td>
			<td>Copy</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
	</table>
	<table class="Total_Soft_Poll_SMOTable">
		<?php for($i=0;$i<count($TotalSoftPollSetCount);$i++){ ?>
			<tr id="Total_Soft_Poll_SMOTable_tr_<?php echo $TotalSoftPollSetCount[$i]->id;?>">
				<td><?php echo $i+1;?></td>
				<td><?php echo $TotalSoftPollSetCount[$i]->TotalSoft_Poll_SetTitle;?></td>
				<td><?php if($TotalSoftPollSetCount[$i]->TotalSoft_Poll_Set_01 == 'true'){ echo 'Yes';}else{ echo 'No';}?></td>
				<td><i class="Total_SoftPoll_icon totalsoft totalsoft-file-text" onclick="TotalSoftPoll_Clone_Set(<?php echo $TotalSoftPollSetCount[$i]->id;?>)"></i></td>
				<td><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil" onclick="TotalSoftPoll_Edit_Set(<?php echo $TotalSoftPollSetCount[$i]->id;?>)"></i></td>
				<td>
					<i class="Total_SoftPoll_icon totalsoft totalsoft-trash" onclick="TotalSoftPoll_Del_Set(<?php echo $TotalSoftPollSetCount[$i]->id;?>)"></i>
					<span class="Total_Soft_Poll_Del_Span">
						<i class="Total_Soft_Poll_Del_Span_Yes totalsoft totalsoft-check" onclick="TotalSoftPoll_Del_Yes_Set(<?php echo $TotalSoftPollSetCount[$i]->id;?>)"></i>
						<i class="Total_Soft_Poll_Del_Span_No totalsoft totalsoft-times" onclick="TotalSoftPoll_Del_No_Set(<?php echo $TotalSoftPollSetCount[$i]->id;?>)"></i>
					</span>
				</td>
			</tr>
		<?php }?>
	</table>
	<table class="Total_Soft_Poll_TMSetTable">
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">All Parameters are optional, not required to set.</td>
		</tr>
		<tr>
			<td>Setting Title</td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" name="TotalSoft_Poll_SetTitle" id="TotalSoft_Poll_SetTitle" required placeholder="* Required">
			</td>
			<td>Show Results After Voting</td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_Set_01" name="TotalSoft_Poll_Set_01" checked>
					<label for="TotalSoft_Poll_Set_01" data-on="Yes" data-off="No"></label>
				</div>
			</td>
		</tr>
		<tr>
			<td>Start Date</td>
			<td>
				<input type="date" class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_02" id="TotalSoft_Poll_Set_02" placeholder="yyyy-mm-dd">
			</td>
			<td>End Date</td>
			<td>
				<input type="date" class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_03" id="TotalSoft_Poll_Set_03" placeholder="yyyy-mm-dd">
			</td>
		</tr>
		<tr>
			<td>Upcoming Poll Text</td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_04" id="TotalSoft_Poll_Set_04">
			</td>
			<td>Text For no Result After Voting</td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_05" id="TotalSoft_Poll_Set_05">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Upcoming Poll Text Settings</td>
		</tr>
		<tr>
			<td>Overlay Color</td>
			<td>
				<input type="text" name="TotalSoft_Poll_Set_06" id="TotalSoft_Poll_Set_06" class="Total_Soft_Poll_T_Color" value="rgba(209,209,209,0.79)">
			</td>
			<td>Color</td>
			<td>
				<input type="text" name="TotalSoft_Poll_Set_07" id="TotalSoft_Poll_Set_07" class="Total_Soft_Poll_T_Color" value="#000000">
			</td>
		</tr>
		<tr>
			<td>Font Size</td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_Set_08" id="TotalSoft_Poll_Set_08" min="8" max="72" value="32">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_Set_08_Output" for="TotalSoft_Poll_Set_08"></output>
			</td>
			<td>Font Family</td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_09" id="TotalSoft_Poll_Set_09">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<?php if($Font_Family->Font=='Gabriola') { ?>
							<option value='<?php echo $Font_Family->Font;?>' selected="select"><?php echo $Font_Family->Font;?></option>
						<?php }else{ ?>
							<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php } endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Vote Settings</td>
		</tr>
		<tr>
			<td>Vote Once</td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_Set_10" name="TotalSoft_Poll_Set_10" checked>
					<label for="TotalSoft_Poll_Set_10" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>One Time Voting Function</td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_Set_11" id="TotalSoft_Poll_Set_11">
					<option value='phpcookie' selected="select"> PHP Cookie </option>
					<option value='ipaddress'>                   IP Address </option>
				</select>
			</td>
		</tr>
	</table>
</form>