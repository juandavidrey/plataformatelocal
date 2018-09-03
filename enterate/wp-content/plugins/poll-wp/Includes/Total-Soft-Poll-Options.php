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
	$table_name4 = $wpdb->prefix . "totalsoft_poll_dbt";
	$table_name5 = $wpdb->prefix . "totalsoft_poll_stpoll";
	$table_name8 = $wpdb->prefix . "totalsoft_poll_stpoll_1";
	$table_name9 = $wpdb->prefix . "totalsoft_poll_impoll";
	$table_name10 = $wpdb->prefix . "totalsoft_poll_impoll_1";
	$table_name11 = $wpdb->prefix . "totalsoft_poll_stwibu";
	$table_name12 = $wpdb->prefix . "totalsoft_poll_stwibu_1";
	$table_name13 = $wpdb->prefix . "totalsoft_poll_imwibu";
	$table_name14 = $wpdb->prefix . "totalsoft_poll_imwibu_1";
	$table_name16 = $wpdb->prefix . "totalsoft_poll_iminqu";
	$table_name17 = $wpdb->prefix . "totalsoft_poll_iminqu_1";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_', 'TS_Poll_Nonce' ))
		{
			$TotalSoft_Poll_TTitle = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_TTitle'])));
			$TotalSoft_Poll_TType = sanitize_text_field($_POST['TotalSoft_Poll_TType']);

			// Standart Poll
			$TotalSoft_Poll_1_MW = sanitize_text_field($_POST['TotalSoft_Poll_1_MW']); $TotalSoft_Poll_1_BW = sanitize_text_field($_POST['TotalSoft_Poll_1_BW']); $TotalSoft_Poll_1_BR = sanitize_text_field($_POST['TotalSoft_Poll_1_BR']); $TotalSoft_Poll_1_BoxSh = sanitize_text_field($_POST['TotalSoft_Poll_1_BoxSh']); $TotalSoft_Poll_1_Q_FS = sanitize_text_field($_POST['TotalSoft_Poll_1_Q_FS']); $TotalSoft_Poll_1_Q_FF = sanitize_text_field($_POST['TotalSoft_Poll_1_Q_FF']); $TotalSoft_Poll_1_LAQ_H = sanitize_text_field($_POST['TotalSoft_Poll_1_LAQ_H']); $TotalSoft_Poll_1_A_FS = sanitize_text_field($_POST['TotalSoft_Poll_1_A_FS']); $TotalSoft_Poll_1_A_CTF = sanitize_text_field($_POST['TotalSoft_Poll_1_A_CTF']); $TotalSoft_Poll_1_CH_S = sanitize_text_field($_POST['TotalSoft_Poll_1_CH_S']); $TotalSoft_Poll_1_LAA_H = sanitize_text_field($_POST['TotalSoft_Poll_1_LAA_H']); $TotalSoft_Poll_1_VB_BW = sanitize_text_field($_POST['TotalSoft_Poll_1_VB_BW']); $TotalSoft_Poll_1_VB_BR = sanitize_text_field($_POST['TotalSoft_Poll_1_VB_BR']); $TotalSoft_Poll_1_VB_FS = sanitize_text_field($_POST['TotalSoft_Poll_1_VB_FS']); $TotalSoft_Poll_1_VB_FF = sanitize_text_field($_POST['TotalSoft_Poll_1_VB_FF']); $TotalSoft_Poll_1_VB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_1_VB_Text']))); $TotalSoft_Poll_1_VB_IS = sanitize_text_field($_POST['TotalSoft_Poll_1_VB_IS']); $TotalSoft_Poll_1_RB_BW = sanitize_text_field($_POST['TotalSoft_Poll_1_RB_BW']); $TotalSoft_Poll_1_RB_BR = sanitize_text_field($_POST['TotalSoft_Poll_1_RB_BR']); $TotalSoft_Poll_1_RB_FS = sanitize_text_field($_POST['TotalSoft_Poll_1_RB_FS']); $TotalSoft_Poll_1_RB_FF = sanitize_text_field($_POST['TotalSoft_Poll_1_RB_FF']); $TotalSoft_Poll_1_RB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_1_RB_Text'])));
			$TotalSoft_Poll_1_RB_IS = sanitize_text_field($_POST['TotalSoft_Poll_1_RB_IS']); $TotalSoft_Poll_1_P_BW = sanitize_text_field($_POST['TotalSoft_Poll_1_P_BW']); $TotalSoft_Poll_1_P_LAQ_H = sanitize_text_field($_POST['TotalSoft_Poll_1_P_LAQ_H']); $TotalSoft_Poll_1_P_LAA_H = sanitize_text_field($_POST['TotalSoft_Poll_1_P_LAA_H']); $TotalSoft_Poll_1_P_BB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_1_P_BB_Text'])));
			if($TotalSoft_Poll_1_A_CTF=='on'){ $TotalSoft_Poll_1_A_CTF='true'; }else{ $TotalSoft_Poll_1_A_CTF='false'; }

			//Image/Video Poll
			$TotalSoft_Poll_2_MW = sanitize_text_field($_POST['TotalSoft_Poll_2_MW']); $TotalSoft_Poll_2_BW = sanitize_text_field($_POST['TotalSoft_Poll_2_BW']); $TotalSoft_Poll_2_BR = sanitize_text_field($_POST['TotalSoft_Poll_2_BR']); $TotalSoft_Poll_2_BoxSh = sanitize_text_field($_POST['TotalSoft_Poll_2_BoxSh']); $TotalSoft_Poll_2_Q_FS = sanitize_text_field($_POST['TotalSoft_Poll_2_Q_FS']); $TotalSoft_Poll_2_Q_FF = sanitize_text_field($_POST['TotalSoft_Poll_2_Q_FF']); $TotalSoft_Poll_2_LAQ_H = sanitize_text_field($_POST['TotalSoft_Poll_2_LAQ_H']); $TotalSoft_Poll_2_A_CC = sanitize_text_field($_POST['TotalSoft_Poll_2_A_CC']); $TotalSoft_Poll_2_A_FS = sanitize_text_field($_POST['TotalSoft_Poll_2_A_FS']); $TotalSoft_Poll_2_CH_S = sanitize_text_field($_POST['TotalSoft_Poll_2_CH_S']); $TotalSoft_Poll_2_LAA_H = sanitize_text_field($_POST['TotalSoft_Poll_2_LAA_H']); $TotalSoft_Poll_2_VB_BW = sanitize_text_field($_POST['TotalSoft_Poll_2_VB_BW']); $TotalSoft_Poll_2_Play_IS = sanitize_text_field($_POST['TotalSoft_Poll_2_Play_IS']);
			$TotalSoft_Poll_2_VB_BR = sanitize_text_field($_POST['TotalSoft_Poll_2_VB_BR']); $TotalSoft_Poll_2_VB_FS = sanitize_text_field($_POST['TotalSoft_Poll_2_VB_FS']); $TotalSoft_Poll_2_VB_FF = sanitize_text_field($_POST['TotalSoft_Poll_2_VB_FF']); $TotalSoft_Poll_2_VB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_2_VB_Text']))); $TotalSoft_Poll_2_VB_IS = sanitize_text_field($_POST['TotalSoft_Poll_2_VB_IS']); $TotalSoft_Poll_2_RB_BW = sanitize_text_field($_POST['TotalSoft_Poll_2_RB_BW']); $TotalSoft_Poll_2_RB_BR = sanitize_text_field($_POST['TotalSoft_Poll_2_RB_BR']); $TotalSoft_Poll_2_RB_FS = sanitize_text_field($_POST['TotalSoft_Poll_2_RB_FS']); $TotalSoft_Poll_2_RB_FF = sanitize_text_field($_POST['TotalSoft_Poll_2_RB_FF']); $TotalSoft_Poll_2_RB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_2_RB_Text']))); $TotalSoft_Poll_2_RB_IS = sanitize_text_field($_POST['TotalSoft_Poll_2_RB_IS']); $TotalSoft_Poll_2_P_BB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_2_P_BB_Text'])));
			$TotalSoft_Poll_2_A_IHT = sanitize_text_field($_POST['TotalSoft_Poll_2_A_IHT']);
			if($TotalSoft_Poll_2_A_IHT == 'fixed')
			{
				$TotalSoft_Poll_2_A_IH = sanitize_text_field($_POST['TotalSoft_Poll_2_A_IH']);
			}
			else
			{
				$TotalSoft_Poll_2_A_IH = sanitize_text_field($_POST['TotalSoft_Poll_2_A_IHR']);
			}

			//Standart Without Button
			$TotalSoft_Poll_3_MW = sanitize_text_field($_POST['TotalSoft_Poll_3_MW']); $TotalSoft_Poll_3_BW = sanitize_text_field($_POST['TotalSoft_Poll_3_BW']); $TotalSoft_Poll_3_BR = sanitize_text_field($_POST['TotalSoft_Poll_3_BR']); $TotalSoft_Poll_3_BoxSh = sanitize_text_field($_POST['TotalSoft_Poll_3_BoxSh']); $TotalSoft_Poll_3_Q_FS = sanitize_text_field($_POST['TotalSoft_Poll_3_Q_FS']); $TotalSoft_Poll_3_Q_FF = sanitize_text_field($_POST['TotalSoft_Poll_3_Q_FF']); $TotalSoft_Poll_3_LAQ_H = sanitize_text_field($_POST['TotalSoft_Poll_3_LAQ_H']); $TotalSoft_Poll_3_A_FS = sanitize_text_field($_POST['TotalSoft_Poll_3_A_FS']); $TotalSoft_Poll_3_A_BW = sanitize_text_field($_POST['TotalSoft_Poll_3_A_BW']); $TotalSoft_Poll_3_A_BR = sanitize_text_field($_POST['TotalSoft_Poll_3_A_BR']); $TotalSoft_Poll_3_CH_S = sanitize_text_field($_POST['TotalSoft_Poll_3_CH_S']); $TotalSoft_Poll_3_LAA_H = sanitize_text_field($_POST['TotalSoft_Poll_3_LAA_H']);
			$TotalSoft_Poll_3_TV_FS = sanitize_text_field($_POST['TotalSoft_Poll_3_TV_FS']); $TotalSoft_Poll_3_TV_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_3_TV_Text']))); $TotalSoft_Poll_3_RB_BW = sanitize_text_field($_POST['TotalSoft_Poll_3_RB_BW']); $TotalSoft_Poll_3_RB_BR = sanitize_text_field($_POST['TotalSoft_Poll_3_RB_BR']); $TotalSoft_Poll_3_RB_FS = sanitize_text_field($_POST['TotalSoft_Poll_3_RB_FS']); $TotalSoft_Poll_3_RB_FF = sanitize_text_field($_POST['TotalSoft_Poll_3_RB_FF']); $TotalSoft_Poll_3_RB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_3_RB_Text']))); $TotalSoft_Poll_3_RB_IS = sanitize_text_field($_POST['TotalSoft_Poll_3_RB_IS']); $TotalSoft_Poll_3_BB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_3_BB_Text'])));

			//Image/Video Without Button
			$TotalSoft_Poll_4_MW = sanitize_text_field($_POST['TotalSoft_Poll_4_MW']); $TotalSoft_Poll_4_BW = sanitize_text_field($_POST['TotalSoft_Poll_4_BW']); $TotalSoft_Poll_4_BR = sanitize_text_field($_POST['TotalSoft_Poll_4_BR']); $TotalSoft_Poll_4_Q_FS = sanitize_text_field($_POST['TotalSoft_Poll_4_Q_FS']); $TotalSoft_Poll_4_Q_FF = sanitize_text_field($_POST['TotalSoft_Poll_4_Q_FF']); $TotalSoft_Poll_4_LAQ_H = sanitize_text_field($_POST['TotalSoft_Poll_4_LAQ_H']); $TotalSoft_Poll_4_A_FS = sanitize_text_field($_POST['TotalSoft_Poll_4_A_FS']); $TotalSoft_Poll_4_A_BW = sanitize_text_field($_POST['TotalSoft_Poll_4_A_BW']); $TotalSoft_Poll_4_A_BR = sanitize_text_field($_POST['TotalSoft_Poll_4_A_BR']); $TotalSoft_Poll_4_A_FF = sanitize_text_field($_POST['TotalSoft_Poll_4_A_FF']); $TotalSoft_Poll_4_I_Ra = sanitize_text_field($_POST['TotalSoft_Poll_4_I_Ra']); $TotalSoft_Poll_4_I_IS = sanitize_text_field($_POST['TotalSoft_Poll_4_I_IS']); $TotalSoft_Poll_4_Pop_BW = sanitize_text_field($_POST['TotalSoft_Poll_4_Pop_BW']); $TotalSoft_Poll_4_LAA_H = sanitize_text_field($_POST['TotalSoft_Poll_4_LAA_H']);
			$TotalSoft_Poll_4_TV_FS = sanitize_text_field($_POST['TotalSoft_Poll_4_TV_FS']); $TotalSoft_Poll_4_TV_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_4_TV_Text']))); $TotalSoft_Poll_4_RB_BW = sanitize_text_field($_POST['TotalSoft_Poll_4_RB_BW']); $TotalSoft_Poll_4_RB_BR = sanitize_text_field($_POST['TotalSoft_Poll_4_RB_BR']); $TotalSoft_Poll_4_RB_FS = sanitize_text_field($_POST['TotalSoft_Poll_4_RB_FS']); $TotalSoft_Poll_4_RB_FF = sanitize_text_field($_POST['TotalSoft_Poll_4_RB_FF']); $TotalSoft_Poll_4_RB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_4_RB_Text']))); $TotalSoft_Poll_4_RB_IS = sanitize_text_field($_POST['TotalSoft_Poll_4_RB_IS']); $TotalSoft_Poll_4_BB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_4_BB_Text'])));

			//Image/Video in Question
			$TotalSoft_Poll_5_MW = sanitize_text_field($_POST['TotalSoft_Poll_5_MW']); $TotalSoft_Poll_5_BW = sanitize_text_field($_POST['TotalSoft_Poll_5_BW']); $TotalSoft_Poll_5_BR = sanitize_text_field($_POST['TotalSoft_Poll_5_BR']); $TotalSoft_Poll_5_BoxSh = sanitize_text_field($_POST['TotalSoft_Poll_5_BoxSh']); $TotalSoft_Poll_5_Q_FS = sanitize_text_field($_POST['TotalSoft_Poll_5_Q_FS']); $TotalSoft_Poll_5_Q_FF = sanitize_text_field($_POST['TotalSoft_Poll_5_Q_FF']); $TotalSoft_Poll_5_I_Ra = sanitize_text_field($_POST['TotalSoft_Poll_5_I_Ra']); $TotalSoft_Poll_5_LAQ_H = sanitize_text_field($_POST['TotalSoft_Poll_5_LAQ_H']); $TotalSoft_Poll_5_A_FS = sanitize_text_field($_POST['TotalSoft_Poll_5_A_FS']); $TotalSoft_Poll_5_A_BW = sanitize_text_field($_POST['TotalSoft_Poll_5_A_BW']); $TotalSoft_Poll_5_A_BR = sanitize_text_field($_POST['TotalSoft_Poll_5_A_BR']); $TotalSoft_Poll_5_CH_S = sanitize_text_field($_POST['TotalSoft_Poll_5_CH_S']); $TotalSoft_Poll_5_LAA_H = sanitize_text_field($_POST['TotalSoft_Poll_5_LAA_H']); $TotalSoft_Poll_5_TV_FS = sanitize_text_field($_POST['TotalSoft_Poll_5_TV_FS']); $TotalSoft_Poll_5_VB_BW = sanitize_text_field($_POST['TotalSoft_Poll_5_VB_BW']); $TotalSoft_Poll_5_VB_BR = sanitize_text_field($_POST['TotalSoft_Poll_5_VB_BR']); $TotalSoft_Poll_5_VB_FS = sanitize_text_field($_POST['TotalSoft_Poll_5_VB_FS']); $TotalSoft_Poll_5_VB_FF = sanitize_text_field($_POST['TotalSoft_Poll_5_VB_FF']);
			$TotalSoft_Poll_5_VB_IS = sanitize_text_field($_POST['TotalSoft_Poll_5_VB_IS']); $TotalSoft_Poll_5_RB_BW = sanitize_text_field($_POST['TotalSoft_Poll_5_RB_BW']); $TotalSoft_Poll_5_RB_BR = sanitize_text_field($_POST['TotalSoft_Poll_5_RB_BR']); $TotalSoft_Poll_5_RB_FS = sanitize_text_field($_POST['TotalSoft_Poll_5_RB_FS']); $TotalSoft_Poll_5_RB_FF = sanitize_text_field($_POST['TotalSoft_Poll_5_RB_FF']); $TotalSoft_Poll_5_RB_IS = sanitize_text_field($_POST['TotalSoft_Poll_5_RB_IS']); $TotalSoft_Poll_5_TV_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_5_TV_Text']))); $TotalSoft_Poll_5_BB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_5_BB_Text']))); $TotalSoft_Poll_5_RB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_5_RB_Text']))); $TotalSoft_Poll_5_VB_Text = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoft_Poll_5_VB_Text'])));

			if(isset($_POST['Total_Soft_Poll_TUpdate']))
			{
				$Total_SoftPoll_TUpdateID = sanitize_text_field($_POST['Total_SoftPoll_TUpdateID']);

				$wpdb->query($wpdb->prepare("UPDATE $table_name4 set TotalSoft_Poll_TTitle=%s, TotalSoft_Poll_TType=%s WHERE id=%d", $TotalSoft_Poll_TTitle, $TotalSoft_Poll_TType, $Total_SoftPoll_TUpdateID));

				if($TotalSoft_Poll_TType == 'Standart Poll')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name5 set TotalSoft_Poll_TTitle = %s, TotalSoft_Poll_TType = %s, TotalSoft_Poll_1_MW = %s, TotalSoft_Poll_1_BW = %s, TotalSoft_Poll_1_BR = %s, TotalSoft_Poll_1_BoxSh = %s, TotalSoft_Poll_1_Q_FS = %s, TotalSoft_Poll_1_Q_FF = %s, TotalSoft_Poll_1_LAQ_H = %s, TotalSoft_Poll_1_A_FS = %s, TotalSoft_Poll_1_A_CTF = %s, TotalSoft_Poll_1_CH_S = %s, TotalSoft_Poll_1_LAA_H = %s, TotalSoft_Poll_1_VB_BW = %s, TotalSoft_Poll_1_VB_BR = %s, TotalSoft_Poll_1_VB_FS = %s, TotalSoft_Poll_1_VB_FF = %s, TotalSoft_Poll_1_VB_Text = %s, TotalSoft_Poll_1_VB_IS = %s, TotalSoft_Poll_1_RB_BW = %s, TotalSoft_Poll_1_RB_BR = %s, TotalSoft_Poll_1_RB_FS = %s, TotalSoft_Poll_1_RB_FF = %s, TotalSoft_Poll_1_RB_Text = %s WHERE TotalSoft_Poll_TID=%s", $TotalSoft_Poll_TTitle, $TotalSoft_Poll_TType, $TotalSoft_Poll_1_MW, $TotalSoft_Poll_1_BW, $TotalSoft_Poll_1_BR, $TotalSoft_Poll_1_BoxSh, $TotalSoft_Poll_1_Q_FS, $TotalSoft_Poll_1_Q_FF, $TotalSoft_Poll_1_LAQ_H, $TotalSoft_Poll_1_A_FS, $TotalSoft_Poll_1_A_CTF, $TotalSoft_Poll_1_CH_S, $TotalSoft_Poll_1_LAA_H, $TotalSoft_Poll_1_VB_BW, $TotalSoft_Poll_1_VB_BR, $TotalSoft_Poll_1_VB_FS, $TotalSoft_Poll_1_VB_FF, $TotalSoft_Poll_1_VB_Text, $TotalSoft_Poll_1_VB_IS, $TotalSoft_Poll_1_RB_BW, $TotalSoft_Poll_1_RB_BR, $TotalSoft_Poll_1_RB_FS, $TotalSoft_Poll_1_RB_FF, $TotalSoft_Poll_1_RB_Text, $Total_SoftPoll_TUpdateID));
					$wpdb->query($wpdb->prepare("UPDATE $table_name8 set TotalSoft_Poll_TTitle = %s, TotalSoft_Poll_TType = %s, TotalSoft_Poll_1_RB_IS = %s, TotalSoft_Poll_1_P_BW = %s, TotalSoft_Poll_1_P_LAQ_H = %s, TotalSoft_Poll_1_P_LAA_H = %s, TotalSoft_Poll_1_P_BB_Text = %s WHERE TotalSoft_Poll_TID=%s", $TotalSoft_Poll_TTitle, $TotalSoft_Poll_TType, $TotalSoft_Poll_1_RB_IS, $TotalSoft_Poll_1_P_BW, $TotalSoft_Poll_1_P_LAQ_H, $TotalSoft_Poll_1_P_LAA_H, $TotalSoft_Poll_1_P_BB_Text, $Total_SoftPoll_TUpdateID));
				}
				else if($TotalSoft_Poll_TType == 'Image Poll' || $TotalSoft_Poll_TType == 'Video Poll')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name9 set TotalSoft_Poll_TTitle = %s, TotalSoft_Poll_TType = %s, TotalSoft_Poll_2_MW = %s, TotalSoft_Poll_2_BW = %s, TotalSoft_Poll_2_BR = %s, TotalSoft_Poll_2_BoxSh = %s, TotalSoft_Poll_2_Q_FS = %s, TotalSoft_Poll_2_Q_FF = %s, TotalSoft_Poll_2_LAQ_H = %s, TotalSoft_Poll_2_A_CC = %s, TotalSoft_Poll_2_A_IH = %s, TotalSoft_Poll_2_A_FS = %s, TotalSoft_Poll_2_CH_S = %s, TotalSoft_Poll_2_LAA_H = %s, TotalSoft_Poll_2_VB_BW = %s, TotalSoft_Poll_2_Play_IS = %s WHERE TotalSoft_Poll_TID=%s", $TotalSoft_Poll_TTitle, $TotalSoft_Poll_TType, $TotalSoft_Poll_2_MW, $TotalSoft_Poll_2_BW, $TotalSoft_Poll_2_BR, $TotalSoft_Poll_2_BoxSh, $TotalSoft_Poll_2_Q_FS, $TotalSoft_Poll_2_Q_FF, $TotalSoft_Poll_2_LAQ_H, $TotalSoft_Poll_2_A_CC, $TotalSoft_Poll_2_A_IH, $TotalSoft_Poll_2_A_FS, $TotalSoft_Poll_2_CH_S, $TotalSoft_Poll_2_LAA_H, $TotalSoft_Poll_2_VB_BW, $TotalSoft_Poll_2_Play_IS, $Total_SoftPoll_TUpdateID));
					$wpdb->query($wpdb->prepare("UPDATE $table_name10 set TotalSoft_Poll_TTitle = %s, TotalSoft_Poll_TType = %s, TotalSoft_Poll_2_VB_BR = %s, TotalSoft_Poll_2_VB_FS = %s, TotalSoft_Poll_2_VB_FF = %s, TotalSoft_Poll_2_VB_Text = %s, TotalSoft_Poll_2_VB_IS = %s, TotalSoft_Poll_2_RB_BW = %s, TotalSoft_Poll_2_RB_BR = %s, TotalSoft_Poll_2_RB_FS = %s, TotalSoft_Poll_2_RB_FF = %s, TotalSoft_Poll_2_RB_Text = %s, TotalSoft_Poll_2_RB_IS = %s, TotalSoft_Poll_2_P_BB_Text = %s WHERE TotalSoft_Poll_TID=%s", $TotalSoft_Poll_TTitle, $TotalSoft_Poll_TType, $TotalSoft_Poll_2_VB_BR, $TotalSoft_Poll_2_VB_FS, $TotalSoft_Poll_2_VB_FF, $TotalSoft_Poll_2_VB_Text, $TotalSoft_Poll_2_VB_IS, $TotalSoft_Poll_2_RB_BW, $TotalSoft_Poll_2_RB_BR, $TotalSoft_Poll_2_RB_FS, $TotalSoft_Poll_2_RB_FF, $TotalSoft_Poll_2_RB_Text, $TotalSoft_Poll_2_RB_IS, $TotalSoft_Poll_2_P_BB_Text, $Total_SoftPoll_TUpdateID));
				}
				else if($TotalSoft_Poll_TType == 'Standart Without Button')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name11 set TotalSoft_Poll_TTitle = %s, TotalSoft_Poll_TType = %s, TotalSoft_Poll_3_MW = %s, TotalSoft_Poll_3_BW = %s, TotalSoft_Poll_3_BR = %s, TotalSoft_Poll_3_BoxSh = %s, TotalSoft_Poll_3_Q_FS = %s, TotalSoft_Poll_3_Q_FF = %s, TotalSoft_Poll_3_LAQ_H = %s, TotalSoft_Poll_3_A_FS = %s, TotalSoft_Poll_3_A_BW = %s, TotalSoft_Poll_3_A_BR = %s, TotalSoft_Poll_3_CH_S = %s, TotalSoft_Poll_3_LAA_H = %s WHERE TotalSoft_Poll_TID=%s", $TotalSoft_Poll_TTitle, $TotalSoft_Poll_TType, $TotalSoft_Poll_3_MW, $TotalSoft_Poll_3_BW, $TotalSoft_Poll_3_BR, $TotalSoft_Poll_3_BoxSh, $TotalSoft_Poll_3_Q_FS, $TotalSoft_Poll_3_Q_FF, $TotalSoft_Poll_3_LAQ_H, $TotalSoft_Poll_3_A_FS, $TotalSoft_Poll_3_A_BW, $TotalSoft_Poll_3_A_BR, $TotalSoft_Poll_3_CH_S, $TotalSoft_Poll_3_LAA_H, $Total_SoftPoll_TUpdateID));
					$wpdb->query($wpdb->prepare("UPDATE $table_name12 set TotalSoft_Poll_TTitle = %s, TotalSoft_Poll_TType = %s, TotalSoft_Poll_3_TV_FS = %s, TotalSoft_Poll_3_TV_Text = %s, TotalSoft_Poll_3_RB_BW = %s, TotalSoft_Poll_3_RB_BR = %s, TotalSoft_Poll_3_RB_FS = %s, TotalSoft_Poll_3_RB_FF = %s, TotalSoft_Poll_3_RB_Text = %s, TotalSoft_Poll_3_RB_IS = %s, TotalSoft_Poll_3_BB_Text = %s WHERE TotalSoft_Poll_TID=%s", $TotalSoft_Poll_TTitle, $TotalSoft_Poll_TType, $TotalSoft_Poll_3_TV_FS, $TotalSoft_Poll_3_TV_Text, $TotalSoft_Poll_3_RB_BW, $TotalSoft_Poll_3_RB_BR, $TotalSoft_Poll_3_RB_FS, $TotalSoft_Poll_3_RB_FF, $TotalSoft_Poll_3_RB_Text, $TotalSoft_Poll_3_RB_IS, $TotalSoft_Poll_3_BB_Text, $Total_SoftPoll_TUpdateID));
				}
				else if($TotalSoft_Poll_TType == 'Image Without Button' || $TotalSoft_Poll_TType == 'Video Without Button')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name13 set TotalSoft_Poll_TTitle = %s, TotalSoft_Poll_TType = %s, TotalSoft_Poll_4_MW = %s, TotalSoft_Poll_4_BW = %s, TotalSoft_Poll_4_BR = %s, TotalSoft_Poll_4_Q_FS = %s, TotalSoft_Poll_4_Q_FF = %s, TotalSoft_Poll_4_LAQ_H = %s, TotalSoft_Poll_4_A_FS = %s, TotalSoft_Poll_4_A_BW = %s, TotalSoft_Poll_4_A_BR = %s, TotalSoft_Poll_4_A_FF = %s, TotalSoft_Poll_4_I_Ra = %s, TotalSoft_Poll_4_I_IS = %s, TotalSoft_Poll_4_Pop_BW = %s, TotalSoft_Poll_4_LAA_H = %s WHERE TotalSoft_Poll_TID=%s", $TotalSoft_Poll_TTitle, $TotalSoft_Poll_TType, $TotalSoft_Poll_4_MW, $TotalSoft_Poll_4_BW, $TotalSoft_Poll_4_BR, $TotalSoft_Poll_4_Q_FS, $TotalSoft_Poll_4_Q_FF, $TotalSoft_Poll_4_LAQ_H, $TotalSoft_Poll_4_A_FS, $TotalSoft_Poll_4_A_BW, $TotalSoft_Poll_4_A_BR, $TotalSoft_Poll_4_A_FF, $TotalSoft_Poll_4_I_Ra, $TotalSoft_Poll_4_I_IS, $TotalSoft_Poll_4_Pop_BW, $TotalSoft_Poll_4_LAA_H, $Total_SoftPoll_TUpdateID));
					$wpdb->query($wpdb->prepare("UPDATE $table_name14 set TotalSoft_Poll_TTitle = %s, TotalSoft_Poll_TType = %s, TotalSoft_Poll_4_TV_FS = %s, TotalSoft_Poll_4_TV_Text = %s, TotalSoft_Poll_4_RB_BW = %s, TotalSoft_Poll_4_RB_BR = %s, TotalSoft_Poll_4_RB_FS = %s, TotalSoft_Poll_4_RB_FF = %s, TotalSoft_Poll_4_RB_Text = %s, TotalSoft_Poll_4_RB_IS = %s, TotalSoft_Poll_4_BB_Text = %s WHERE TotalSoft_Poll_TID=%s", $TotalSoft_Poll_TTitle, $TotalSoft_Poll_TType, $TotalSoft_Poll_4_TV_FS, $TotalSoft_Poll_4_TV_Text, $TotalSoft_Poll_4_RB_BW, $TotalSoft_Poll_4_RB_BR, $TotalSoft_Poll_4_RB_FS, $TotalSoft_Poll_4_RB_FF, $TotalSoft_Poll_4_RB_Text, $TotalSoft_Poll_4_RB_IS, $TotalSoft_Poll_4_BB_Text, $Total_SoftPoll_TUpdateID));
				}
				else if($TotalSoft_Poll_TType == 'Image in Question' || $TotalSoft_Poll_TType == 'Video in Question')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name16 set TotalSoft_Poll_TTitle = %s, TotalSoft_Poll_TType = %s, TotalSoft_Poll_5_MW = %s, TotalSoft_Poll_5_BW = %s, TotalSoft_Poll_5_BR = %s, TotalSoft_Poll_5_BoxSh = %s, TotalSoft_Poll_5_Q_FS = %s, TotalSoft_Poll_5_Q_FF = %s, TotalSoft_Poll_5_I_Ra = %s, TotalSoft_Poll_5_LAQ_H = %s, TotalSoft_Poll_5_A_FS = %s, TotalSoft_Poll_5_A_BW = %s, TotalSoft_Poll_5_A_BR = %s, TotalSoft_Poll_5_CH_S = %s, TotalSoft_Poll_5_LAA_H = %s, TotalSoft_Poll_5_TV_FS = %s, TotalSoft_Poll_5_VB_BW = %s, TotalSoft_Poll_5_VB_BR = %s, TotalSoft_Poll_5_VB_FS = %s, TotalSoft_Poll_5_VB_FF = %s WHERE TotalSoft_Poll_TID=%s", $TotalSoft_Poll_TTitle, $TotalSoft_Poll_TType, $TotalSoft_Poll_5_MW, $TotalSoft_Poll_5_BW, $TotalSoft_Poll_5_BR, $TotalSoft_Poll_5_BoxSh, $TotalSoft_Poll_5_Q_FS, $TotalSoft_Poll_5_Q_FF, $TotalSoft_Poll_5_I_Ra, $TotalSoft_Poll_5_LAQ_H, $TotalSoft_Poll_5_A_FS, $TotalSoft_Poll_5_A_BW, $TotalSoft_Poll_5_A_BR, $TotalSoft_Poll_5_CH_S, $TotalSoft_Poll_5_LAA_H, $TotalSoft_Poll_5_TV_FS, $TotalSoft_Poll_5_VB_BW, $TotalSoft_Poll_5_VB_BR, $TotalSoft_Poll_5_VB_FS, $TotalSoft_Poll_5_VB_FF, $Total_SoftPoll_TUpdateID));
					$wpdb->query($wpdb->prepare("UPDATE $table_name17 set TotalSoft_Poll_TTitle = %s, TotalSoft_Poll_TType = %s, TotalSoft_Poll_5_VB_IS = %s, TotalSoft_Poll_5_RB_BW = %s, TotalSoft_Poll_5_RB_BR = %s, TotalSoft_Poll_5_RB_FS = %s, TotalSoft_Poll_5_RB_FF = %s, TotalSoft_Poll_5_RB_IS = %s, TotalSoft_Poll_5_TV_Text = %s, TotalSoft_Poll_5_BB_Text = %s, TotalSoft_Poll_5_RB_Text = %s, TotalSoft_Poll_5_VB_Text = %s WHERE TotalSoft_Poll_TID=%s", $TotalSoft_Poll_TTitle, $TotalSoft_Poll_TType, $TotalSoft_Poll_5_VB_IS, $TotalSoft_Poll_5_RB_BW, $TotalSoft_Poll_5_RB_BR, $TotalSoft_Poll_5_RB_FS, $TotalSoft_Poll_5_RB_FF, $TotalSoft_Poll_5_RB_IS, $TotalSoft_Poll_5_TV_Text, $TotalSoft_Poll_5_BB_Text, $TotalSoft_Poll_5_RB_Text, $TotalSoft_Poll_5_VB_Text, $Total_SoftPoll_TUpdateID));
				}
			}
		}
		else
		{
			wp_die('Security check fail'); 
		}
	}

	$TotalSoftFontCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d order by id", 0));
	$TotalSoftPollThemes=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d order by id", 0));
?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
<form method="POST" oninput="TotalSoft_Poll_Out()">
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
			<i class="Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title="Click for Creating New Theme."></i>
			<input type="button" name="" value="New Theme (Pro)" class="Total_Soft_Poll_AMD2_But" onclick="TotalSoft_Poll_Theme_But1()">
		</div>
		<div class="Total_Soft_Poll_AMD3">
			<i class="Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title="Click for Calceling."></i>
			<input type="button" value="Cancel" class="Total_Soft_Poll_AMD2_But" onclick='TotalSoftPoll_Reload()'>
			<i class="Total_Soft_Poll_Update Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title="Click to Update Theme Options."></i>
			<input type="submit" name="Total_Soft_Poll_TUpdate" value="Update" class="Total_Soft_Poll_Update Total_Soft_Poll_AMD2_But">
			<input type="text" style="display:none" name="Total_SoftPoll_TUpdateID" id="Total_SoftPoll_TUpdateID">
		</div>
	</div>
	<table class="Total_Soft_Poll_TMMTable">
		<tr class="Total_Soft_Poll_TMMTableFR">
			<td>No</td>
			<td>Title</td>
			<td>Type</td>
			<td>Copy</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
	</table>
	<table class="Total_Soft_Poll_TMOTable">
		<?php for($i=0;$i<count($TotalSoftPollThemes);$i++){ ?>
			<tr id="Total_Soft_Poll_TMOTable_tr_<?php echo $TotalSoftPollThemes[$i]->id;?>">
				<td><?php echo $i+1;?></td>
				<td><?php echo $TotalSoftPollThemes[$i]->TotalSoft_Poll_TTitle;?></td>
				<td><?php echo $TotalSoftPollThemes[$i]->TotalSoft_Poll_TType;?></td>
				<td><i class="Total_SoftPoll_icon totalsoft totalsoft-file-text" onclick="TotalSoftPoll_Theme_Clone(<?php echo $TotalSoftPollThemes[$i]->id;?>)"></i></td>
				<td><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil" onclick="TotalSoftPoll_Theme_Edit(<?php echo $TotalSoftPollThemes[$i]->id;?>)"></i></td>
				<td>
					<i class="Total_SoftPoll_icon totalsoft totalsoft-trash" onclick="TotalSoftPoll_Theme_Del(<?php echo $TotalSoftPollThemes[$i]->id;?>)"></i>
					<span class="Total_Soft_Poll_Del_Span">
						<i class="Total_Soft_Poll_Del_Span_Yes totalsoft totalsoft-check" onclick="TotalSoft_Poll_Theme_But1()"></i>
						<i class="Total_Soft_Poll_Del_Span_No totalsoft totalsoft-times" onclick="TotalSoftPoll_Theme_Del_No(<?php echo $TotalSoftPollThemes[$i]->id;?>)"></i>
					</span>
				</td>
			</tr>
		<?php }?>
	</table>
	<table class="Total_Soft_Poll_Add_MTable" style="width: 99% !important;">
		<tr>
			<td>Theme Title</td>
			<td>Type</td>
		</tr>
		<tr>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" name="TotalSoft_Poll_TTitle" id="TotalSoft_Poll_TTitle" required placeholder=" *  Required">
			</td>
			<td>
				<select class="Total_Soft_Poll_Select" id="TotalSoft_Poll_TType" name="TotalSoft_Poll_TType">
					<option value="Standart Poll">           Standart Poll           </option>
					<option value="Image Poll">              Image Poll              </option>
					<option value="Video Poll">              Video Poll              </option>
					<option value="Standart Without Button"> Standart Without Button </option>
					<option value="Image Without Button">    Image Without Button    </option>
					<option value="Video Without Button">    Video Without Button    </option>
					<option value="Image in Question">       Image in Question       </option>
					<option value="Video in Question">       Video in Question       </option>
				</select>
			</td>
		</tr>
	</table>
	<table class="Total_Soft_Poll_TMSetTable Total_Soft_Poll_TMSetTables Total_Soft_Poll_TMSetTable_1">
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">General Options</td>
		</tr>
		<tr>
			<td>Max-Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Define the poll max width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="TotalSoft_Poll_1_MW" id="TotalSoft_Poll_1_MW" min="40" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_MW_Output" for="TotalSoft_Poll_1_MW"></output>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the poll: center, right, left."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_Pos">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Add a border and adjust its width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_BW" id="TotalSoft_Poll_1_BW" min="0" max="10" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_BW_Output" for="TotalSoft_Poll_1_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Pick up a color for the element border."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the radius for the border."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_BR" id="TotalSoft_Poll_1_BR" min="0" max="50" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_BR_Output" for="TotalSoft_Poll_1_BR"></output>
			</td>
			<td>Shadow Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the shadow type."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_BoxSh_Type">
					<option value="none">  None      </option>
					<option value="true">  Shadow 1  </option>
					<option value="false"> Shadow 2  </option>
					<option value="sh03">  Shadow 3  </option>
					<option value="sh04">  Shadow 4  </option>
					<option value="sh05">  Shadow 5  </option>
					<option value="sh06">  Shadow 6  </option>
					<option value="sh07">  Shadow 7  </option>
					<option value="sh08">  Shadow 8  </option>
					<option value="sh09">  Shadow 9  </option>
					<option value="sh10">  Shadow 10 </option>
					<option value="sh11">  Shadow 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Shadow Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_BoxShC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Question Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select a background color where can be seen the question."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_Q_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the color of the question text in poll."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_Q_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the text size on question."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_Q_FS" id="TotalSoft_Poll_1_Q_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_Q_FS_Output" for="TotalSoft_Poll_1_Q_FS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable font family for question. Poll plugin has a fonts base."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_1_Q_FF" id="TotalSoft_Poll_1_Q_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Text Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the text position for question."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_Q_TA">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Question</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside the poll between question and answer you may have lines or remove them."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_1_LAQ_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_LAQ_W_Output" for="TotalSoft_Poll_1_LAQ_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_LAQ_H" id="TotalSoft_Poll_1_LAQ_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_LAQ_H_Output" for="TotalSoft_Poll_1_LAQ_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the question and answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_LAQ_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time. Select 4 different types of line: solid, dotted, dashed, none."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_LAQ_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Answer Options</td>
		</tr>
		<tr>
			<td>Has Color <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the color of the answers text."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_1_A_CTF" name="TotalSoft_Poll_1_A_CTF">
					<label for="TotalSoft_Poll_1_A_CTF" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This option is for the answers. You can select font size. The size of the answer in responsive poll."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_A_FS" id="TotalSoft_Poll_1_A_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_A_FS_Output" for="TotalSoft_Poll_1_A_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Here you can select your favourite main background color for theme."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_A_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Use this option to change the color for background."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_A_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the font color of element answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_A_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font for the poll answers."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_1_BoxSh" id="TotalSoft_Poll_1_BoxSh">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Checkbox Options</td>
		</tr>
		<tr>
			<td>Check Many <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select an unlimited number of answers or no in one poll."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_1_CH_CM" name="">
					<label for="TotalSoft_Poll_1_CH_CM" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="The plugin allows to get most suitable check box that are most appropriate for your site. Select 4 different types for size."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_1_CH_S" id="TotalSoft_Poll_1_CH_S">
					<option value="small">    Small    </option>
					<option value="medium 1"> Medium 1 </option>
					<option value="medium 2"> Medium 2 </option>
					<option value="big">      Big      </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Type Before Checking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This field be used for selecting the values from a list of checkboxes before checking."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_CH_TBC">
					<option value="f10c"> Circle O       </option>
					<option value="f111"> Circle         </option>
					<option value="f096"> Square O       </option>
					<option value="f0c8"> Square         </option>
					<option value="f147"> Minus Square O </option>
					<option value="f146"> Minus Square   </option>
				</select>
			</td>
			<td>Color Before Checking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select color for checkbox before checking."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_CH_CBC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Type After Clicking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This field be used for selecting the values from a list of checkboxes after checking."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_CH_TAC">
					<option value="f00c"> Check          </option>
					<option value="f058"> Check Circle   </option>
					<option value="f05d"> Check Circle O </option>
					<option value="f14a"> Check Square   </option>
					<option value="f046"> Check Square O </option>
					<option value="f111"> Circle         </option>
					<option value="f192"> Dot Circle O   </option>
					<option value="f196"> Plus Square O  </option>
					<option value="f0fe"> Plus Square    </option>
				</select>
			</td>
			<td>Color After Clicking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select color for checkbox after checking."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_CH_CAC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Answer Hover Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Use this option to change the hover color for background."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_A_HBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the font hover color of element answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_A_HC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Answers</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside the poll between answers and buttons you may have lines or remove them."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_1_LAA_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_LAA_W_Output" for="TotalSoft_Poll_1_LAA_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_LAA_H" id="TotalSoft_Poll_1_LAA_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_LAA_H_Output" for="TotalSoft_Poll_1_LAA_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the answers and buttons."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_LAA_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time. Select 4 different types of line: solid, dotted, dashed, none."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_LAA_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Vote Button</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_VB_MBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_VB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the vote button's border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_VB_BW" id="TotalSoft_Poll_1_VB_BW" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_VB_BW_Output" for="TotalSoft_Poll_1_VB_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_VB_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for vote button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_VB_BR" id="TotalSoft_Poll_1_VB_BR" min="0" max="30" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_VB_BR_Output" for="TotalSoft_Poll_1_VB_BR"></output>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_VB_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_VB_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for the vote button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_VB_FS" id="TotalSoft_Poll_1_VB_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_VB_FS_Output" for="TotalSoft_Poll_1_VB_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family which will make your poll more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_1_VB_FF" id="TotalSoft_Poll_1_VB_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in vote button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_1_VB_Text" name="TotalSoft_Poll_1_VB_Text" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the vote button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_VB_IT">
					<option value="">     None           </option>
					<option value="f123"> Star Half O    </option>
					<option value="f0a1"> Bullhorn       </option>
					<option value="f0e5"> Comment O      </option>
					<option value="f06e"> Eye            </option>
					<option value="f0fb"> Fighter Jet    </option>
					<option value="f25a"> Hand Pointer O </option>
					<option value="f1d9"> Paper Plane O  </option>
					<option value="f124"> Location Arrow </option>
					<option value="f1d8"> Paper Plane    </option>
					<option value="f005"> Star           </option>
					<option value="f006"> Star O         </option>
				</select>
			</td>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment in the vote button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_VB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. The plugin allows to get most suitable icon that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_VB_IS" id="TotalSoft_Poll_1_VB_IS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_VB_IS_Output" for="TotalSoft_Poll_1_VB_IS"></output>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for vote button in the poll."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_VB_HBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_VB_HC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Results Button</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select whether to see the result button or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_1_RB_Show" name="">
					<label for="TotalSoft_Poll_1_RB_Show" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_RB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the result button's border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_RB_BW" id="TotalSoft_Poll_1_RB_BW" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_RB_BW_Output" for="TotalSoft_Poll_1_RB_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_RB_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for result button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_RB_BR" id="TotalSoft_Poll_1_RB_BR" min="0" max="30" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_RB_BR_Output" for="TotalSoft_Poll_1_RB_BR"></output>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_RB_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_RB_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for the result button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_RB_FS" id="TotalSoft_Poll_1_RB_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_RB_FS_Output" for="TotalSoft_Poll_1_RB_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family which will make your poll more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_1_RB_FF" id="TotalSoft_Poll_1_RB_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in result button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_1_RB_Text" name="TotalSoft_Poll_1_RB_Text" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the result button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_RB_IT">
					<option value="">     None              </option>
					<option value="f1fe"> Area Chart        </option>
					<option value="f0c9"> Bars              </option>
					<option value="f1e5"> Binoculars        </option>
					<option value="f080"> Bar Chart         </option>
					<option value="f084"> Key               </option>
					<option value="f05a"> Info Circle       </option>
					<option value="f201"> Line Chart        </option>
					<option value="f129"> Info              </option>
					<option value="f200"> Pie Chart         </option>
					<option value="f059"> Question Circle   </option>
					<option value="f128"> Question          </option>
					<option value="f29c"> Question Circle O </option>
					<option value="f012"> Signal            </option>
				</select>
			</td>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment in the result button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_RB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. The plugin allows to get most suitable icon that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_RB_IS" id="TotalSoft_Poll_1_RB_IS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_RB_IS_Output" for="TotalSoft_Poll_1_RB_IS"></output>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover background color for result button in the poll."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_RB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_RB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Popup</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">General Option</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the border width for popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_P_BW" id="TotalSoft_Poll_1_P_BW" min="0" max="10" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_P_BW_Output" for="TotalSoft_Poll_1_P_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the border color for popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_BC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Show in Popup <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the voting in popup or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_1_P_ShPop" name="">
					<label for="TotalSoft_Poll_1_P_ShPop" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Show Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the desired popup effect from the list. You can select effects from our 9 different beautifully designed sets. "></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_P_ShEff">
					<option value="FTTB"> From Top to Bottom  </option>
					<option value="FLTR"> From Left to Right  </option>
					<option value="FRTL"> From Right to Left  </option>
					<option value="FCTA"> From Center to Full </option>
					<option value="FTL">  Rotate Y            </option>
					<option value="FTR">  Rotate X            </option>
					<option value="FBL">  Rotate              </option>
					<option value="FBR">  Skew X              </option>
					<option value="FBTT"> Skew Y              </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Question Option</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select a background color where can be seen the question in popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_Q_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color of the question text in poll."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_Q_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Question</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside poll between question and answer you may have lines or remove them."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_1_P_LAQ_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_P_LAQ_W_Output" for="TotalSoft_Poll_1_P_LAQ_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_P_LAQ_H" id="TotalSoft_Poll_1_P_LAQ_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_P_LAQ_H_Output" for="TotalSoft_Poll_1_P_LAQ_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the question and answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_LAQ_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time. Select 4 different types of line: solid, dotted, dashed, none."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_P_LAQ_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Answer Option</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Here you can select your favourite main background color for the answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_A_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Use this option to change the background color for answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_A_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the font color of element answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_A_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Vote Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable type for showing your voting."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_P_A_VT">
					<option value="percent"> Percent     </option>
					<option value="count">   Votes Count </option>
					<option value="both">    Both        </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Vote Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the voting text."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_A_VC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Vote Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable type for showing your voting."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_P_A_VEff">
					<option value="0">  None      </option>
					<option value="1">  Effect 1  </option>
					<option value="2">  Effect 2  </option>
					<option value="3">  Effect 3  </option>
					<option value="4">  Effect 4  </option>
					<option value="5">  Effect 5  </option>
					<option value="6">  Effect 6  </option>
					<option value="7">  Effect 7  </option>
					<option value="8">  Effect 8  </option>
					<option value="9">  Effect 9  </option>
					<option value="10"> Effect 10 </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Answer</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside the poll between answers and buttons you may have lines or remove them."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_1_P_LAA_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_P_LAA_W_Output" for="TotalSoft_Poll_1_P_LAA_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_1_P_LAA_H" id="TotalSoft_Poll_1_P_LAA_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_1_P_LAA_H_Output" for="TotalSoft_Poll_1_P_LAA_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the answers and buttons."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_LAA_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time. Select 4 different types of line: solid, dotted, dashed, none."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_P_LAA_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Back Button</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_BB_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the back button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_P_BB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_BB_BC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_BB_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_BB_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in back button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_1_P_BB_Text" name="TotalSoft_Poll_1_P_BB_Text" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the back button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_P_BB_IT">
					<option value="">     None           </option>
					<option value="f00d"> Times          </option>
					<option value="f015"> Home           </option>
					<option value="f112"> Reply          </option>
					<option value="f021"> Refresh        </option>
					<option value="f100"> Angle Double   </option>
					<option value="f104"> Angle          </option>
					<option value="f0a8"> Arrow Circle   </option>
					<option value="f190"> Arrow Circle O </option>
					<option value="f0d9"> Caret          </option>
					<option value="f191"> Caret Square O </option>
					<option value="f137"> Chevron Circle </option>
					<option value="f053"> Chevron        </option>
					<option value="f0a5"> Hand O         </option>
					<option value="f177"> Long Arrow     </option>
				</select>
			</td>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment in the back button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_1_P_BB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover background color for back button in the poll."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_BB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_1_P_BB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
	</table>
	<table class="Total_Soft_Poll_TMSetTable Total_Soft_Poll_TMSetTables Total_Soft_Poll_TMSetTable_2">
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">General Options</td>
		</tr>
		<tr>
			<td>Max-Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Define the poll max width by percents."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="TotalSoft_Poll_2_MW" id="TotalSoft_Poll_2_MW" min="40" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_MW_Output" for="TotalSoft_Poll_2_MW"></output>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the poll: center, right or left."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_Pos">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Add a border and adjust its width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_BW" id="TotalSoft_Poll_2_BW" min="0" max="10" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_BW_Output" for="TotalSoft_Poll_2_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Pick up a color for the element border."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the radius for the border."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_BR" id="TotalSoft_Poll_2_BR" min="0" max="50" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_BR_Output" for="TotalSoft_Poll_2_BR"></output>
			</td>
			<td>Shadow Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the shadow type."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_BoxSh_Type">
					<option value="none">  None      </option>
					<option value="true">  Shadow 1  </option>
					<option value="false"> Shadow 2  </option>
					<option value="sh03">  Shadow 3  </option>
					<option value="sh04">  Shadow 4  </option>
					<option value="sh05">  Shadow 5  </option>
					<option value="sh06">  Shadow 6  </option>
					<option value="sh07">  Shadow 7  </option>
					<option value="sh08">  Shadow 8  </option>
					<option value="sh09">  Shadow 9  </option>
					<option value="sh10">  Shadow 10 </option>
					<option value="sh11">  Shadow 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Shadow Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_BoxShC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Question Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select a background color where can be seen the question."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_Q_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the color of the question text in poll."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_Q_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the text size on question."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_Q_FS" id="TotalSoft_Poll_2_Q_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_Q_FS_Output" for="TotalSoft_Poll_2_Q_FS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable font family for question. Poll plugin has a fonts base."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_2_Q_FF" id="TotalSoft_Poll_2_Q_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Text Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the text position for question."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_Q_TA">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Question</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside poll between question and photos you may have lines or remove them."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_2_LAQ_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_LAQ_W_Output" for="TotalSoft_Poll_2_LAQ_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_LAQ_H" id="TotalSoft_Poll_2_LAQ_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_LAQ_H_Output" for="TotalSoft_Poll_2_LAQ_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the question and photos."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_LAQ_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time. Select 4 different types of line: solid, dotted, dashed, none."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_LAQ_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Answer Options</td>
		</tr>
		<tr>
			<td>Column Count <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the count of column in one row. There is no limitation for images."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range" name="TotalSoft_Poll_2_A_CC" id="TotalSoft_Poll_2_A_CC" min="1" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_A_CC_Output" for="TotalSoft_Poll_2_A_CC"></output>
			</td>
			<td>Height Type <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the height to be fixed or by ratio.+"></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_2_A_IHT" id="TotalSoft_Poll_2_A_IHT">
					<option value="fixed"> Fixed </option>
					<option value="ratio"> Ratio </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Image Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the prefered height of the image and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_A_IH" id="TotalSoft_Poll_2_A_IH" min="50" max="800" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_A_IH_Output" for="TotalSoft_Poll_2_A_IH"></output>
			</td>
			<td>Image Ratio <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the ratio of the image and it is all responsive."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_2_A_IHR" id="TotalSoft_Poll_2_A_IHR">
					<option value="1"> 1x1  </option>
					<option value="2"> 16x9 </option>
					<option value="3"> 9x16 </option>
					<option value="4"> 3x4  </option>
					<option value="5"> 4x3  </option>
					<option value="6"> 3x2  </option>
					<option value="7"> 2x3  </option>
					<option value="8"> 8x5  </option>
					<option value="9"> 5x8  </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Colors from Main Menu <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify main menu color."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_A_CA">
					<option value="Nothing">    For Nothing    </option>
					<option value="Color">      For Color      </option>
					<option value="Background"> For Background </option>
				</select>
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This option is for the answers. You can select font size."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_A_FS" id="TotalSoft_Poll_2_A_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_A_FS_Output" for="TotalSoft_Poll_2_A_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Here you can select your favourite main background color for theme."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_A_MBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Use this option to change the color for background."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_A_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the font color of element answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_A_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 4 positions for the answer and checkbox."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_A_Pos">
					<option value="Position 1"> Before Image               </option>
					<option value="Position 2"> Before Image Only Checkbox </option>
					<option value="Position 3"> After Image                </option>
					<option value="Position 4"> After Image Only Checkbox  </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font for the poll answers."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_2_BoxSh" id="TotalSoft_Poll_2_BoxSh">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Checkbox Options</td>
		</tr>
		<tr>
			<td>Check Many <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose visitor will be able to choose one or more answers."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_2_CH_CM" name="">
					<label for="TotalSoft_Poll_2_CH_CM" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select 4 different types for size."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_2_CH_S" id="TotalSoft_Poll_2_CH_S">
					<option value="small">    Small    </option>
					<option value="medium 1"> Medium 1 </option>
					<option value="medium 2"> Medium 2 </option>
					<option value="big">      Big      </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Type Before Checking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This field be used for selecting the values from a list of checkboxes."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_CH_TBC">
					<option value="f10c"> Circle O       </option>
					<option value="f111"> Circle         </option>
					<option value="f096"> Square O       </option>
					<option value="f0c8"> Square         </option>
					<option value="f147"> Minus Square O </option>
					<option value="f146"> Minus Square   </option>
				</select>
			</td>
			<td>Color Before Checking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select color for selected checkbox."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_CH_CBC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Type After Clicking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This field be used for selecting the values from a list of checkboxes."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_CH_TAC">
					<option value="f00c"> Check          </option>
					<option value="f058"> Check Circle   </option>
					<option value="f05d"> Check Circle O </option>
					<option value="f14a"> Check Square   </option>
					<option value="f046"> Check Square O </option>
					<option value="f111"> Circle         </option>
					<option value="f192"> Dot Circle O   </option>
					<option value="f196"> Plus Square O  </option>
					<option value="f0fe"> Plus Square    </option>
				</select>
			</td>
			<td>Color After Clicking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select color for selected checkbox."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_CH_CAC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles Total_Soft_Poll_Video_Set">
			<td colspan="4">Play Icon Options</td>
		</tr>
		<tr class="Total_Soft_Poll_Video_Set">
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to open video."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_Play_IC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the size for the play icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_Play_IS" id="TotalSoft_Poll_2_Play_IS" min="8" max="150" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_Play_IS_Output" for="TotalSoft_Poll_2_Play_IS"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_Video_Set">
			<td>Overlay Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for overlay."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_Play_IOvC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select play icons from a variety of beautifully designed sets for the opening video."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_Play_IT">
					<option value="">     None          </option>
					<option value="f04b"> Play          </option>
					<option value="f16a"> Play 1        </option>
					<option value="f144"> Play Circle   </option>
					<option value="f01d"> Play Circle O </option>
					<option value="f03d"> Video Camera  </option>
					<option value="f26c"> Television    </option>
					<option value="f008"> Film          </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_Video_Set">
			<td colspan="4"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Answer Hover Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Use this option to change the hover color for background."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_A_HBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the font hover color of element answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_A_HC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Shadow <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the shadow or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_2_A_HSh_Show" name="">
					<label for="TotalSoft_Poll_2_A_HSh_Show" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Shadow Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select color which allows to show the shadow of the image."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_A_HShC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Answers</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside the poll between answer and vote button you may have lines or remove them."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_2_LAA_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_LAA_W_Output" for="TotalSoft_Poll_2_LAA_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_LAA_H" id="TotalSoft_Poll_2_LAA_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_LAA_H_Output" for="TotalSoft_Poll_2_LAA_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the answers and vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_LAA_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time. Select 4 different types of line: solid, dotted, dashed, none."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_LAA_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Vote Option</td>
		</tr>
		<tr>
			<td>Overlay Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select overlay background color for the image after voting."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_P_A_OC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select overlay color for the answers after voting."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_P_A_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Vote Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable type for showing your voting."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_P_A_VT">
					<option value="percent">    Percent             </option>
					<option value="percentlab"> Label + Percent     </option>
					<option value="count">      Votes Count         </option>
					<option value="countlab">   Label + Votes Count </option>
					<option value="both">       Both                </option>
					<option value="bothlab">    Label + Both        </option>
				</select>
			</td>
			<td>Vote Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable effect for showing your voting."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_P_A_VEff">
					<option value="0"> None     </option>
					<option value="1"> Effect 1 </option>
					<option value="2"> Effect 2 </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Vote Button</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_VB_MBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the vote button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_VB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the vote button's border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_VB_BW" id="TotalSoft_Poll_2_VB_BW" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_VB_BW_Output" for="TotalSoft_Poll_2_VB_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_VB_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for vote button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_VB_BR" id="TotalSoft_Poll_2_VB_BR" min="0" max="30" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_VB_BR_Output" for="TotalSoft_Poll_2_VB_BR"></output>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_VB_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_VB_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for the vote button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_VB_FS" id="TotalSoft_Poll_2_VB_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_VB_FS_Output" for="TotalSoft_Poll_2_VB_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family which will make your poll more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_2_VB_FF" id="TotalSoft_Poll_2_VB_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in vote button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_2_VB_Text" name="TotalSoft_Poll_2_VB_Text" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the vote button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_VB_IT">
					<option value="">     None           </option>
					<option value="f123"> Star Half O    </option>
					<option value="f0a1"> Bullhorn       </option>
					<option value="f0e5"> Comment O      </option>
					<option value="f06e"> Eye            </option>
					<option value="f0fb"> Fighter Jet    </option>
					<option value="f25a"> Hand Pointer O </option>
					<option value="f1d9"> Paper Plane O  </option>
					<option value="f124"> Location Arrow </option>
					<option value="f1d8"> Paper Plane    </option>
					<option value="f005"> Star           </option>
					<option value="f006"> Star O         </option>
				</select>
			</td>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for vote button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_VB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. The plugin allows to get most suitable icon that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_VB_IS" id="TotalSoft_Poll_2_VB_IS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_VB_IS_Output" for="TotalSoft_Poll_2_VB_IS"></output>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover background color for vote button in the poll."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_VB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_VB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Results Button</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select whether to see the result button or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_2_RB_Show" name="">
					<label for="TotalSoft_Poll_2_RB_Show" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the result button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_RB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the result button's border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_RB_BW" id="TotalSoft_Poll_2_RB_BW" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_RB_BW_Output" for="TotalSoft_Poll_2_RB_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_RB_BC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for result button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_RB_BR" id="TotalSoft_Poll_2_RB_BR" min="0" max="30" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_RB_BR_Output" for="TotalSoft_Poll_2_RB_BR"></output>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_RB_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_RB_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for the result button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_RB_FS" id="TotalSoft_Poll_2_RB_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_RB_FS_Output" for="TotalSoft_Poll_2_RB_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family which will make your poll more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_2_RB_FF" id="TotalSoft_Poll_2_RB_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in result button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_2_RB_Text" name="TotalSoft_Poll_2_RB_Text" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the result button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_RB_IT">
					<option value="">     None              </option>
					<option value="f1fe"> Area Chart        </option>
					<option value="f0c9"> Bars              </option>
					<option value="f1e5"> Binoculars        </option>
					<option value="f080"> Bar Chart         </option>
					<option value="f084"> Key               </option>
					<option value="f05a"> Info Circle       </option>
					<option value="f201"> Line Chart        </option>
					<option value="f129"> Info              </option>
					<option value="f200"> Pie Chart         </option>
					<option value="f059"> Question Circle   </option>
					<option value="f128"> Question          </option>
					<option value="f29c"> Question Circle O </option>
					<option value="f012"> Signal            </option>
				</select>
			</td>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for result button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_RB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. The plugin allows to get most suitable icon that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_2_RB_IS" id="TotalSoft_Poll_2_RB_IS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_2_RB_IS_Output" for="TotalSoft_Poll_2_RB_IS"></output>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover background color for result button in the poll."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_RB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_RB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Back Button</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_P_BB_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the back button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_P_BB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_P_BB_BC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_P_BB_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_P_BB_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in back button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_2_P_BB_Text" name="TotalSoft_Poll_2_P_BB_Text" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the back button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_P_BB_IT">
					<option value="">     None           </option>
					<option value="f00d"> Times          </option>
					<option value="f015"> Home           </option>
					<option value="f112"> Reply          </option>
					<option value="f021"> Refresh        </option>
					<option value="f100"> Angle Double   </option>
					<option value="f104"> Angle          </option>
					<option value="f0a8"> Arrow Circle   </option>
					<option value="f190"> Arrow Circle O </option>
					<option value="f0d9"> Caret          </option>
					<option value="f191"> Caret Square O </option>
					<option value="f137"> Chevron Circle </option>
					<option value="f053"> Chevron        </option>
					<option value="f0a5"> Hand O         </option>
					<option value="f177"> Long Arrow     </option>
				</select>
			</td>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for back button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_2_P_BB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover background color for back button in the Image poll type."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_P_BB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_2_P_BB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
	</table>
	<table class="Total_Soft_Poll_TMSetTable Total_Soft_Poll_TMSetTables Total_Soft_Poll_TMSetTable_3">
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">General Options</td>
		</tr>
		<tr>
			<td>Max-Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Define the max container width by percents."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="TotalSoft_Poll_3_MW" id="TotalSoft_Poll_3_MW" min="40" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_MW_Output" for="TotalSoft_Poll_3_MW"></output>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose where to place your theme relative to in page: center, right or left."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_Pos">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Add a border and adjust its width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_BW" id="TotalSoft_Poll_3_BW" min="0" max="10" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_BW_Output" for="TotalSoft_Poll_3_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the border color for the main container."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the border radius for the main container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_BR" id="TotalSoft_Poll_3_BR" min="0" max="50" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_BR_Output" for="TotalSoft_Poll_3_BR"></output>
			</td>
			<td>Shadow Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the shadow type."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_BoxSh_Type">
					<option value="none">  None      </option>
					<option value="true">  Shadow 1  </option>
					<option value="false"> Shadow 2  </option>
					<option value="sh03">  Shadow 3  </option>
					<option value="sh04">  Shadow 4  </option>
					<option value="sh05">  Shadow 5  </option>
					<option value="sh06">  Shadow 6  </option>
					<option value="sh07">  Shadow 7  </option>
					<option value="sh08">  Shadow 8  </option>
					<option value="sh09">  Shadow 9  </option>
					<option value="sh10">  Shadow 10 </option>
					<option value="sh11">  Shadow 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Shadow Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_BoxShC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Question Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select a background color where can be seen the question."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_Q_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the color of the question text in polling."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_Q_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the text size for question."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_Q_FS" id="TotalSoft_Poll_3_Q_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_Q_FS_Output" for="TotalSoft_Poll_3_Q_FS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable font family for question. Plugin has a fonts base."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_3_Q_FF" id="TotalSoft_Poll_3_Q_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Text Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the text position for question."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_Q_TA">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Question</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside poll between question and answers you may have line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_3_LAQ_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_LAQ_W_Output" for="TotalSoft_Poll_3_LAQ_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_LAQ_H" id="TotalSoft_Poll_3_LAQ_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_LAQ_H_Output" for="TotalSoft_Poll_3_LAQ_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the question and answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_LAQ_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time. Select 4 different types of line: solid, dotted, dashed, none."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_LAQ_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Answer Options</td>
		</tr>
		<tr>
			<td>Colors from Main Menu <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This function allows to choose from admin page of the selected color to use for answer color, background color or nothing."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_A_CA">
					<option value="Nothing">    For Nothing    </option>
					<option value="Color">      For Color      </option>
					<option value="Background"> For Background </option>
				</select>
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This option is for the answers. You can select font size."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_A_FS" id="TotalSoft_Poll_3_A_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_A_FS_Output" for="TotalSoft_Poll_3_A_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your favourite main background color for theme."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_A_MBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select Your favourite background color for answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_A_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select Your favourite text color for answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_A_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the border width for the answer container which is currently displayed."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_A_BW" id="TotalSoft_Poll_3_A_BW" min="0" max="8" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_A_BW_Output" for="TotalSoft_Poll_3_A_BW"></output>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the border color for the answer container."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_A_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Define the border radius of the overall answers container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_A_BR" id="TotalSoft_Poll_3_A_BR" min="0" max="10" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_A_BR_Output" for="TotalSoft_Poll_3_A_BR"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font for the poll answers."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_3_BoxSh" id="TotalSoft_Poll_3_BoxSh">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Checkbox Options</td>
		</tr>
		<tr>
			<td>Show Checkbox <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the checkboxes or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_3_CH_Sh" name="">
					<label for="TotalSoft_Poll_3_CH_Sh" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select 4 different types for size."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_3_CH_S" id="TotalSoft_Poll_3_CH_S">
					<option value="small">    Small    </option>
					<option value="medium 1"> Medium 1 </option>
					<option value="medium 2"> Medium 2 </option>
					<option value="big">      Big      </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Type Before Checking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This field be used for selecting the values from a list of checkboxes"></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_CH_TBC">
					<option value="f10c"> Circle O       </option>
					<option value="f111"> Circle         </option>
					<option value="f096"> Square O       </option>
					<option value="f0c8"> Square         </option>
					<option value="f147"> Minus Square O </option>
					<option value="f146"> Minus Square   </option>
				</select>
			</td>
			<td>Color Before Checking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select color for selected checkbox."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_CH_CBC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Type After Clicking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This field be used for selecting the values from a list of checkboxes"></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_CH_TAC">
					<option value="f00c"> Check          </option>
					<option value="f058"> Check Circle   </option>
					<option value="f05d"> Check Circle O </option>
					<option value="f14a"> Check Square   </option>
					<option value="f046"> Check Square O </option>
					<option value="f111"> Circle         </option>
					<option value="f192"> Dot Circle O   </option>
					<option value="f196"> Plus Square O  </option>
					<option value="f0fe"> Plus Square    </option>
				</select>
			</td>
			<td>Color After Clicking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select color for selected checkbox."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_CH_CAC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Answer Hover Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Use this option to change the hover background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_A_HBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the font hover color of element answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_A_HC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Answers</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside the poll after answers you may have lines or remove them."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_3_LAA_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_LAA_W_Output" for="TotalSoft_Poll_3_LAA_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_LAA_H" id="TotalSoft_Poll_3_LAA_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_LAA_H_Output" for="TotalSoft_Poll_3_LAA_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation after the answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_LAA_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time. Select 4 different types of line: solid, dotted, dashed, none."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_LAA_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Total Votes</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This function is for showing how many people voted in the poll."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_3_TV_Show" name="">
					<label for="TotalSoft_Poll_3_TV_Show" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the total votes text: right, left or center."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_TV_Pos">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_TV_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for the total votes."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_TV_FS" id="TotalSoft_Poll_3_TV_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_TV_FS_Output" for="TotalSoft_Poll_3_TV_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in total votes."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_3_TV_Text" name="TotalSoft_Poll_3_TV_Text" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the total votes."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_VT_IT">
					<option value="">     None              </option>
					<option value="f1fe"> Area Chart        </option>
					<option value="f0c9"> Bars              </option>
					<option value="f1e5"> Binoculars        </option>
					<option value="f080"> Bar Chart         </option>
					<option value="f084"> Key               </option>
					<option value="f05a"> Info Circle       </option>
					<option value="f201"> Line Chart        </option>
					<option value="f129"> Info              </option>
					<option value="f200"> Pie Chart         </option>
					<option value="f059"> Question Circle   </option>
					<option value="f128"> Question          </option>
					<option value="f29c"> Question Circle O </option>
					<option value="f012"> Signal            </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for the total votes (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_VT_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Results Button</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select whether to see the result button or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_3_RB_Show" name="">
					<label for="TotalSoft_Poll_3_RB_Show" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the result button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_RB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the result button's border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_RB_BW" id="TotalSoft_Poll_3_RB_BW" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_RB_BW_Output" for="TotalSoft_Poll_3_RB_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_RB_BC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for result button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_RB_BR" id="TotalSoft_Poll_3_RB_BR" min="0" max="30" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_RB_BR_Output" for="TotalSoft_Poll_3_RB_BR"></output>
			</td>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_RB_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_RB_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_RB_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for the result button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_RB_FS" id="TotalSoft_Poll_3_RB_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_RB_FS_Output" for="TotalSoft_Poll_3_RB_FS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family which will make your poll more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_3_RB_FF" id="TotalSoft_Poll_3_RB_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in result button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_3_RB_Text" name="TotalSoft_Poll_3_RB_Text" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the result button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_RB_IT">
					<option value="">     None              </option>
					<option value="f1fe"> Area Chart        </option>
					<option value="f0c9"> Bars              </option>
					<option value="f1e5"> Binoculars        </option>
					<option value="f080"> Bar Chart         </option>
					<option value="f084"> Key               </option>
					<option value="f05a"> Info Circle       </option>
					<option value="f201"> Line Chart        </option>
					<option value="f129"> Info              </option>
					<option value="f200"> Pie Chart         </option>
					<option value="f059"> Question Circle   </option>
					<option value="f128"> Question          </option>
					<option value="f29c"> Question Circle O </option>
					<option value="f012"> Signal            </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for result button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_RB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
			<td>Icon Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_3_RB_IS" id="TotalSoft_Poll_3_RB_IS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_3_RB_IS_Output" for="TotalSoft_Poll_3_RB_IS"></output>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for result's button in the opinions."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_RB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_RB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Vote Option</td>
		</tr>
		<tr>
			<td>Colors from Main Menu <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This function allows to choose from admin page of the selected color to use for answer color, background color or nothing."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_V_CA">
					<option value="Nothing">    For Nothing    </option>
					<option value="Color">      For Color      </option>
					<option value="Background"> For Background </option>
				</select>
			</td>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for the answers after voting."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_V_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select background color for the answers after voting."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_V_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select text color for the answers after voting."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_V_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Vote Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable type for showing your voting."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_V_T">
					<option value="percent">    Percent             </option>
					<option value="percentlab"> Label + Percent     </option>
					<option value="count">      Votes Count         </option>
					<option value="countlab">   Label + Votes Count </option>
					<option value="both">       Both                </option>
					<option value="bothlab">    Label + Both        </option>
				</select>
			</td>
			<td>Vote Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable effect for showing your voting."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_V_Eff">
					<option value="0"> None     </option>
					<option value="1"> Effect 1 </option>
					<option value="2"> Effect 2 </option>
					<option value="3"> Effect 3 </option>
					<option value="4"> Effect 4 </option>
					<option value="5"> Effect 5 </option>
					<option value="6"> Effect 6 </option>
					<option value="7"> Effect 7 </option>
					<option value="8"> Effect 8 </option>
					<option value="9"> Effect 9 </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Back Button</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_BB_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the back button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_BB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_BB_BC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_BB_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_BB_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in back button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_3_BB_Text" name="TotalSoft_Poll_3_BB_Text" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the back button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_BB_IT">
					<option value="">     None           </option>
					<option value="f00d"> Times          </option>
					<option value="f015"> Home           </option>
					<option value="f112"> Reply          </option>
					<option value="f021"> Refresh        </option>
					<option value="f100"> Angle Double   </option>
					<option value="f104"> Angle          </option>
					<option value="f0a8"> Arrow Circle   </option>
					<option value="f190"> Arrow Circle O </option>
					<option value="f0d9"> Caret          </option>
					<option value="f191"> Caret Square O </option>
					<option value="f137"> Chevron Circle </option>
					<option value="f053"> Chevron        </option>
					<option value="f0a5"> Hand O         </option>
					<option value="f177"> Long Arrow     </option>
				</select>
			</td>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for back button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_3_BB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for back button in the polling."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_BB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select hover color for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_3_BB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
	</table>
	<table class="Total_Soft_Poll_TMSetTable Total_Soft_Poll_TMSetTables Total_Soft_Poll_TMSetTable_4">
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">General Options</td>
		</tr>
		<tr>
			<td>Max-Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Define the max width for main container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="TotalSoft_Poll_4_MW" id="TotalSoft_Poll_4_MW" min="40" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_MW_Output" for="TotalSoft_Poll_4_MW"></output>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the poll builder: center, right or left."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_Pos">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Add a border and adjust its width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_BW" id="TotalSoft_Poll_4_BW" min="0" max="10" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_BW_Output" for="TotalSoft_Poll_4_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Pick up a color for the element border."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the radius for the border."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_BR" id="TotalSoft_Poll_4_BR" min="0" max="50" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_BR_Output" for="TotalSoft_Poll_4_BR"></output>
			</td>
			<td>Shadow Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the shadow type."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_BoxSh_Type">
					<option value="none">  None      </option>
					<option value="true">  Shadow 1  </option>
					<option value="false"> Shadow 2  </option>
					<option value="sh03">  Shadow 3  </option>
					<option value="sh04">  Shadow 4  </option>
					<option value="sh05">  Shadow 5  </option>
					<option value="sh06">  Shadow 6  </option>
					<option value="sh07">  Shadow 7  </option>
					<option value="sh08">  Shadow 8  </option>
					<option value="sh09">  Shadow 9  </option>
					<option value="sh10">  Shadow 10 </option>
					<option value="sh11">  Shadow 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Shadow Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_BoxShC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Question Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select a background color where can be seen the question."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_Q_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the color of the question text in poll builder."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_Q_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the text size for question."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_Q_FS" id="TotalSoft_Poll_4_Q_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_Q_FS_Output" for="TotalSoft_Poll_4_Q_FS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable font family for question. Plugin has a fonts base."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_4_Q_FF" id="TotalSoft_Poll_4_Q_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Text Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the text position for social question."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_Q_TA">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Question</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside poll between question and answers you may have lines or remove them."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_4_LAQ_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_LAQ_W_Output" for="TotalSoft_Poll_4_LAQ_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_LAQ_H" id="TotalSoft_Poll_4_LAQ_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_LAQ_H_Output" for="TotalSoft_Poll_4_LAQ_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the question and answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_LAQ_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time. Select 4 different types of line: solid, dotted, dashed, none."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_LAQ_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Answer Options</td>
		</tr>
		<tr>
			<td>Colors from Main Menu <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This function allows to choose from admin page of the selected color to use for answer color, background color or nothing."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_A_CA">
					<option value="Nothing">    For Nothing    </option>
					<option value="Color">      For Color      </option>
					<option value="Background"> For Background </option>
				</select>
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This option is for the answers. You can select font size."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_A_FS" id="TotalSoft_Poll_4_A_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_A_FS_Output" for="TotalSoft_Poll_4_A_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the main background color of the element where answers is placed."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_A_MBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Use this option to change the background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_A_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font color of element answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_A_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the width of the borders around the opinion container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_A_BW" id="TotalSoft_Poll_4_A_BW" min="0" max="8" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_A_BW_Output" for="TotalSoft_Poll_4_A_BW"></output>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the color of the borders around the opinion container."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_A_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set radius of the borders around answers container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_A_BR" id="TotalSoft_Poll_4_A_BR" min="0" max="10" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_A_BR_Output" for="TotalSoft_Poll_4_A_BR"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable font family for answers."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_4_A_FF" id="TotalSoft_Poll_4_A_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Answer Hover Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Use this option to determine the hover background color for answers field."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_A_HBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the font hover color of answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_A_HC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Image Options</td>
		</tr>
		<tr>
			<td>Height <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the prefered height of the image and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="" id="TotalSoft_Poll_4_I_H" min="20" max="200" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_I_H_Output" for="TotalSoft_Poll_4_I_H"></output>
			</td>
			<td>Ratio <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the prefered ratio of the image."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_4_I_Ra" id="TotalSoft_Poll_4_I_Ra">
					<option value="1"> 1x1  </option>
					<option value="2"> 16x9 </option>
					<option value="3"> 9x16 </option>
					<option value="4"> 3x4  </option>
					<option value="5"> 4x3  </option>
					<option value="6"> 3x2  </option>
					<option value="7"> 2x3  </option>
					<option value="8"> 8x5  </option>
					<option value="9"> 5x8  </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Image Hover Options</td>
		</tr>
		<tr>
			<td>Overlay Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the image."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_I_OC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select the icon type of different and beautifully designed sets."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_I_IT">
					<option value="">                  None          </option>
					<option class="TSP1" value="f030"> Camera        </option>
					<option class="TSP1" value="f083"> Camera Retro  </option>
					<option class="TSP1" value="f06e"> Eye           </option>
					<option class="TSP1" value="f08a"> Heart O       </option>
					<option class="TSP1" value="f03e"> Picture O     </option>
					<option class="TSP1" value="f002"> Search        </option>
					<option class="TSP2" value="f04b"> Play          </option>
					<option class="TSP2" value="f16a"> Play 1        </option>
					<option class="TSP2" value="f144"> Play Circle   </option>
					<option class="TSP2" value="f01d"> Play Circle O </option>
					<option class="TSP2" value="f03d"> Video Camera  </option>
					<option class="TSP2" value="f26c"> Television    </option>
					<option class="TSP2" value="f008"> Film          </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for image container hovering."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_I_IC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Icon Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_I_IS" id="TotalSoft_Poll_4_I_IS" min="8" max="72" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_I_IS_Output" for="TotalSoft_Poll_4_I_IS"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Popup Options</td>
		</tr>
		<tr>
			<td>Show Popup <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose whether to have possibility to open with popup or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_4_Pop_Show" name="">
					<label for="TotalSoft_Poll_4_Pop_Show" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Back Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the 5 types for close: None, Times, Home, Reply or Refresh."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_Pop_IT">
					<option value="">     None    </option>
					<option value="f00d"> Times   </option>
					<option value="f015"> Home    </option>
					<option value="f112"> Reply   </option>
					<option value="f021"> Refresh </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the icon in popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_Pop_IC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select a width for the border in popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_Pop_BW" id="TotalSoft_Poll_4_Pop_BW" min="0" max="10" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_Pop_BW_Output" for="TotalSoft_Poll_4_Pop_BW"></output>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the border in popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_Pop_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Answers</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside the poll after answers you may have lines or no."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_4_LAA_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_LAA_W_Output" for="TotalSoft_Poll_4_LAA_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_LAA_H" id="TotalSoft_Poll_4_LAA_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_LAA_H_Output" for="TotalSoft_Poll_4_LAA_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation after answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_LAA_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_LAA_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Total Votes</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This function is to show the plugin how many people voted or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_4_TV_Show" name="">
					<label for="TotalSoft_Poll_4_TV_Show" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the total votes text: right, left or center."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_TV_Pos">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_TV_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for the total votes."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_TV_FS" id="TotalSoft_Poll_4_TV_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_TV_FS_Output" for="TotalSoft_Poll_4_TV_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in total votes."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_4_TV_Text" name="TotalSoft_Poll_4_TV_Text" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the total votes."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_VT_IT">
					<option value="">     None              </option>
					<option value="f1fe"> Area Chart        </option>
					<option value="f0c9"> Bars              </option>
					<option value="f1e5"> Binoculars        </option>
					<option value="f080"> Bar Chart         </option>
					<option value="f084"> Key               </option>
					<option value="f05a"> Info Circle       </option>
					<option value="f201"> Line Chart        </option>
					<option value="f129"> Info              </option>
					<option value="f200"> Pie Chart         </option>
					<option value="f059"> Question Circle   </option>
					<option value="f128"> Question          </option>
					<option value="f29c"> Question Circle O </option>
					<option value="f012"> Signal            </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for votes (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_VT_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Results Button</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select whether to see the result button or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_4_RB_Show" name="">
					<label for="TotalSoft_Poll_4_RB_Show" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the result's button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_RB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the result's button border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_RB_BW" id="TotalSoft_Poll_4_RB_BW" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_RB_BW_Output" for="TotalSoft_Poll_4_RB_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_RB_BC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for result button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_RB_BR" id="TotalSoft_Poll_4_RB_BR" min="0" max="30" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_RB_BR_Output" for="TotalSoft_Poll_4_RB_BR"></output>
			</td>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_RB_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_RB_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_RB_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for the result button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_RB_FS" id="TotalSoft_Poll_4_RB_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_RB_FS_Output" for="TotalSoft_Poll_4_RB_FS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family which will make your poll more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_4_RB_FF" id="TotalSoft_Poll_4_RB_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in result button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_4_RB_Text" name="TotalSoft_Poll_4_RB_Text" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the result button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_RB_IT">
					<option value="">     None              </option>
					<option value="f1fe"> Area Chart        </option>
					<option value="f0c9"> Bars              </option>
					<option value="f1e5"> Binoculars        </option>
					<option value="f080"> Bar Chart         </option>
					<option value="f084"> Key               </option>
					<option value="f05a"> Info Circle       </option>
					<option value="f201"> Line Chart        </option>
					<option value="f129"> Info              </option>
					<option value="f200"> Pie Chart         </option>
					<option value="f059"> Question Circle   </option>
					<option value="f128"> Question          </option>
					<option value="f29c"> Question Circle O </option>
					<option value="f012"> Signal            </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for result button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_RB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
			<td>Icon Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_4_RB_IS" id="TotalSoft_Poll_4_RB_IS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_4_RB_IS_Output" for="TotalSoft_Poll_4_RB_IS"></output>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for result's button in the opinions."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_RB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_RB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Vote Option</td>
		</tr>
		<tr>
			<td>Colors from Main Menu <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This function allows to choose from admin page of the selected color to use for answer color, background color or nothing."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_V_CA">
					<option value="Nothing">    For Nothing    </option>
					<option value="Color">      For Color      </option>
					<option value="Background"> For Background </option>
				</select>
			</td>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for the answers after voting."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_V_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select background color for the answers after voting."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_V_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select text color for the answers after voting."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_V_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Vote Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable type for showing your voting."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_V_T">
					<option value="percent">    Percent             </option>
					<option value="percentlab"> Label + Percent     </option>
					<option value="count">      Votes Count         </option>
					<option value="countlab">   Label + Votes Count </option>
					<option value="both">       Both                </option>
					<option value="bothlab">    Label + Both        </option>
				</select>
			</td>
			<td>Vote Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable effect for showing your voting."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_V_Eff">
					<option value="0"> None     </option>
					<option value="1"> Effect 1 </option>
					<option value="2"> Effect 2 </option>
					<option value="3"> Effect 3 </option>
					<option value="4"> Effect 4 </option>
					<option value="5"> Effect 5 </option>
					<option value="6"> Effect 6 </option>
					<option value="7"> Effect 7 </option>
					<option value="8"> Effect 8 </option>
					<option value="9"> Effect 9 </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Back Button</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_BB_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the back button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_BB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_BB_BC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_BB_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_BB_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in back button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_4_BB_Text" name="TotalSoft_Poll_4_BB_Text" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the back button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_BB_IT">
					<option value="">     None           </option>
					<option value="f00d"> Times          </option>
					<option value="f015"> Home           </option>
					<option value="f112"> Reply          </option>
					<option value="f021"> Refresh        </option>
					<option value="f100"> Angle Double   </option>
					<option value="f104"> Angle          </option>
					<option value="f0a8"> Arrow Circle   </option>
					<option value="f190"> Arrow Circle O </option>
					<option value="f0d9"> Caret          </option>
					<option value="f191"> Caret Square O </option>
					<option value="f137"> Chevron Circle </option>
					<option value="f053"> Chevron        </option>
					<option value="f0a5"> Hand O         </option>
					<option value="f177"> Long Arrow     </option>
				</select>
			</td>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for back button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_4_BB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for back button in the polling."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_BB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select hover color for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_4_BB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
	</table>
	<table class="Total_Soft_Poll_TMSetTable Total_Soft_Poll_TMSetTables Total_Soft_Poll_TMSetTable_5">
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">General Options</td>
		</tr>
		<tr>
			<td>Max-Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Define the max width for main container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="TotalSoft_Poll_5_MW" id="TotalSoft_Poll_5_MW" min="40" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_MW_Output" for="TotalSoft_Poll_5_MW"></output>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the poll builder: center, right or left."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_Pos">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Add a border and adjust its width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_BW" id="TotalSoft_Poll_5_BW" min="0" max="10" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_BW_Output" for="TotalSoft_Poll_5_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set a color for the element border. "></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the radius for the border."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_BR" id="TotalSoft_Poll_5_BR" min="0" max="50" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_BR_Output" for="TotalSoft_Poll_5_BR"></output>
			</td>
			<td>Shadow Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the shadow type."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_BoxSh_Type">
					<option value="none">  None      </option>
					<option value="true">  Shadow 1  </option>
					<option value="false"> Shadow 2  </option>
					<option value="sh03">  Shadow 3  </option>
					<option value="sh04">  Shadow 4  </option>
					<option value="sh05">  Shadow 5  </option>
					<option value="sh06">  Shadow 6  </option>
					<option value="sh07">  Shadow 7  </option>
					<option value="sh08">  Shadow 8  </option>
					<option value="sh09">  Shadow 9  </option>
					<option value="sh10">  Shadow 10 </option>
					<option value="sh11">  Shadow 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Shadow Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_BoxShC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Question Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select a background color where can be seen the question."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_Q_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Adjust the color of the question text in poll builder."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_Q_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the text size on question by pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_Q_FS" id="TotalSoft_Poll_5_Q_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_Q_FS_Output" for="TotalSoft_Poll_5_Q_FS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable font family for question. Plugin has a fonts base."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_5_Q_FF" id="TotalSoft_Poll_5_Q_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Text Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the text position for social question."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_Q_TA">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles TSPIIQ">
			<td colspan="4">Image in Question</td>
		</tr>
		<tr class="TSPIIQ">
			<td>Height <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the prefered height for image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="" id="TotalSoft_Poll_5_I_H" min="20" max="500" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_I_H_Output" for="TotalSoft_Poll_5_I_H"></output>
			</td>
			<td>Ratio <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the prefered ratio of the image."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_5_I_Ra" id="TotalSoft_Poll_5_I_Ra">
					<option value="1"> 1x1  </option>
					<option value="2"> 16x9 </option>
					<option value="3"> 9x16 </option>
					<option value="4"> 3x4  </option>
					<option value="5"> 4x3  </option>
					<option value="6"> 3x2  </option>
					<option value="7"> 2x3  </option>
					<option value="8"> 8x5  </option>
					<option value="9"> 5x8  </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles TSPVIQ">
			<td colspan="4">Video in Question</td>
		</tr>
		<tr class="TSPVIQ">
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the prefered width for video."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_5_V_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_V_W_Output" for="TotalSoft_Poll_5_V_W"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Question</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside social poll between question and answers you may have lines or remove them."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_5_LAQ_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_LAQ_W_Output" for="TotalSoft_Poll_5_LAQ_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_LAQ_H" id="TotalSoft_Poll_5_LAQ_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_LAQ_H_Output" for="TotalSoft_Poll_5_LAQ_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation between the question and answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_LAQ_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time. Select 4 different types of line: solid, dotted, dashed, none."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_LAQ_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Answer Options</td>
		</tr>
		<tr>
			<td>Colors from Main Menu <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This function allows to choose from admin page of the selected color to use for answer color, background color or nothing."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_A_CA">
					<option value="Nothing">    For Nothing    </option>
					<option value="Color">      For Color      </option>
					<option value="Background"> For Background </option>
				</select>
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This option is for the answers. You can select font size."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_A_FS" id="TotalSoft_Poll_5_A_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_A_FS_Output" for="TotalSoft_Poll_5_A_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the main background color of the element where answers is placed."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_A_MBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Use this option to change the background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_A_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font color of element answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_A_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the width of the borders around the opinion container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_A_BW" id="TotalSoft_Poll_5_A_BW" min="0" max="8" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_A_BW_Output" for="TotalSoft_Poll_5_A_BW"></output>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color of the borders around the opinion container."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_A_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Set radius of the borders around answers container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_A_BR" id="TotalSoft_Poll_5_A_BR" min="0" max="10" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_A_BR_Output" for="TotalSoft_Poll_5_A_BR"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font for the poll answers."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_5_BoxSh" id="TotalSoft_Poll_5_BoxSh">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Checkbox Options</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="The poll builder plugin allows to get most suitable check box that are most appropriate for your site. Select 4 different types for size."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_5_CH_S" id="TotalSoft_Poll_5_CH_S">
					<option value="small">    Small    </option>
					<option value="medium 1"> Medium 1 </option>
					<option value="medium 2"> Medium 2 </option>
					<option value="big">      Big      </option>
				</select>
			</td>
			<td>Type Before Checking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This field be used for selecting the values from a list of checkboxes."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_CH_TBC">
					<option value="f10c"> Circle O       </option>
					<option value="f111"> Circle         </option>
					<option value="f096"> Square O       </option>
					<option value="f0c8"> Square         </option>
					<option value="f147"> Minus Square O </option>
					<option value="f146"> Minus Square   </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color Before Checking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select color for checkbox before checking."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_CH_CBC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Type After Clicking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This field be used for selecting the values from a list of checkboxes."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_CH_TAC">
					<option value="f00c"> Check          </option>
					<option value="f058"> Check Circle   </option>
					<option value="f05d"> Check Circle O </option>
					<option value="f14a"> Check Square   </option>
					<option value="f046"> Check Square O </option>
					<option value="f111"> Circle         </option>
					<option value="f192"> Dot Circle O   </option>
					<option value="f196"> Plus Square O  </option>
					<option value="f0fe"> Plus Square    </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color After Clicking <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select color for checkbox after checking."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_CH_CAC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Answer Hover Options</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Use this option to change the hover background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_A_HBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the font hover color for element answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_A_HC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Line After Answers</td>
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Inside the poll after answer you may have lines or remove them."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangeper" name="" id="TotalSoft_Poll_5_LAA_W" min="0" max="100" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_LAA_W_Output" for="TotalSoft_Poll_5_LAA_W"></output>
			</td>
			<td>Height <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose the height for separation line."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_LAA_H" id="TotalSoft_Poll_5_LAA_H" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_LAA_H_Output" for="TotalSoft_Poll_5_LAA_H"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation after answers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_LAA_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the line and you can change it at any time. Select 4 different types of line: solid, dotted, dashed, none."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_LAA_S">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dotted"> Dotted </option>
					<option value="dashed"> Dashed </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Total Votes</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show total votes or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_5_TV_Show" name="">
					<label for="TotalSoft_Poll_5_TV_Show" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the total votes text: right, left or center."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_TV_Pos">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_TV_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for the total votes."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_TV_FS" id="TotalSoft_Poll_5_TV_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_TV_FS_Output" for="TotalSoft_Poll_5_TV_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in total votes."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_5_TV_Text" name="TotalSoft_Poll_5_TV_Text" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the total votes."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_VT_IT">
					<option value="">     None              </option>
					<option value="f1fe"> Area Chart        </option>
					<option value="f0c9"> Bars              </option>
					<option value="f1e5"> Binoculars        </option>
					<option value="f080"> Bar Chart         </option>
					<option value="f084"> Key               </option>
					<option value="f05a"> Info Circle       </option>
					<option value="f201"> Line Chart        </option>
					<option value="f129"> Info              </option>
					<option value="f200"> Pie Chart         </option>
					<option value="f059"> Question Circle   </option>
					<option value="f128"> Question          </option>
					<option value="f29c"> Question Circle O </option>
					<option value="f012"> Signal            </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for total votes (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_VT_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Vote Button</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose whether to show voting button in the container or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_5_VB_Show" name="">
					<label for="TotalSoft_Poll_5_VB_Show" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_VB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the vote button's border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_VB_BW" id="TotalSoft_Poll_5_VB_BW" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_VB_BW_Output" for="TotalSoft_Poll_5_VB_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_VB_BC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for vote button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_VB_BR" id="TotalSoft_Poll_5_VB_BR" min="0" max="30" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_VB_BR_Output" for="TotalSoft_Poll_5_VB_BR"></output>
			</td>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_VB_MBgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_VB_BgC" class="Total_Soft_Poll_T_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_VB_C" class="Total_Soft_Poll_T_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for the vote button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_VB_FS" id="TotalSoft_Poll_5_VB_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_VB_FS_Output" for="TotalSoft_Poll_5_VB_FS"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family which will make your social poll more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_5_VB_FF" id="TotalSoft_Poll_5_VB_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in vote button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_5_VB_Text" name="TotalSoft_Poll_5_VB_Text" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the vote button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_VB_IT">
					<option value="">     None           </option>
					<option value="f123"> Star Half O    </option>
					<option value="f0a1"> Bullhorn       </option>
					<option value="f0e5"> Comment O      </option>
					<option value="f06e"> Eye            </option>
					<option value="f0fb"> Fighter Jet    </option>
					<option value="f25a"> Hand Pointer O </option>
					<option value="f1d9"> Paper Plane O  </option>
					<option value="f124"> Location Arrow </option>
					<option value="f1d8"> Paper Plane    </option>
					<option value="f005"> Star           </option>
					<option value="f006"> Star O         </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for vote button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_VB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
			<td>Icon Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. The plugin allows to get most suitable icon that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_VB_IS" id="TotalSoft_Poll_5_VB_IS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_VB_IS_Output" for="TotalSoft_Poll_5_VB_IS"></output>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for vote button in the poll."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_VB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for vote button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_VB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Results Button</td>
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select whether to see the result button or no."></i></td>
			<td>
				<div class="switch">
					<input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_Poll_5_RB_Show" name="">
					<label for="TotalSoft_Poll_5_RB_Show" data-on="Yes" data-off="No"></label>
				</div>
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the result button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_RB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the result button's border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_RB_BW" id="TotalSoft_Poll_5_RB_BW" min="0" max="5" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_RB_BW_Output" for="TotalSoft_Poll_5_RB_BW"></output>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_RB_BC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for result button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_RB_BR" id="TotalSoft_Poll_5_RB_BR" min="0" max="30" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_RB_BR_Output" for="TotalSoft_Poll_5_RB_BR"></output>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_RB_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_RB_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for the result button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_RB_FS" id="TotalSoft_Poll_5_RB_FS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_RB_FS_Output" for="TotalSoft_Poll_5_RB_FS"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family which will make your social poll more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="TotalSoft_Poll_5_RB_FF" id="TotalSoft_Poll_5_RB_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in result button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_5_RB_Text" name="TotalSoft_Poll_5_RB_Text" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the result button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_RB_IT">
					<option value="">     None              </option>
					<option value="f1fe"> Area Chart        </option>
					<option value="f0c9"> Bars              </option>
					<option value="f1e5"> Binoculars        </option>
					<option value="f080"> Bar Chart         </option>
					<option value="f084"> Key               </option>
					<option value="f05a"> Info Circle       </option>
					<option value="f201"> Line Chart        </option>
					<option value="f129"> Info              </option>
					<option value="f200"> Pie Chart         </option>
					<option value="f059"> Question Circle   </option>
					<option value="f128"> Question          </option>
					<option value="f29c"> Question Circle O </option>
					<option value="f012"> Signal            </option>
				</select>
			</td>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon alignment for result button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_RB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Icon Size <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. The plugin allows to get most suitable icon that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_Poll_Range TotalSoft_Poll_Rangepx" name="TotalSoft_Poll_5_RB_IS" id="TotalSoft_Poll_5_RB_IS" min="8" max="48" value="">
				<output class="TotalSoft_Poll_Out" name="" id="TotalSoft_Poll_5_RB_IS_Output" for="TotalSoft_Poll_5_RB_IS"></output>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover background color for result button in the opinions."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_RB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select font hover color for result button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_RB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Vote Option</td>
		</tr>
		<tr>
			<td>Colors from Main Menu <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="This function allows to choose from admin page of the selected color to use for answer color, background color or nothing."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_V_CA">
					<option value="Nothing">    For Nothing    </option>
					<option value="Color">      For Color      </option>
					<option value="Background"> For Background </option>
				</select>
			</td>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for the answers after voting."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_V_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select background color for the answers after voting."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_V_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select text color for the answers after voting."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_V_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Vote Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable type for showing your voting."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_V_T">
					<option value="percent">    Percent             </option>
					<option value="percentlab"> Label + Percent     </option>
					<option value="count">      Votes Count         </option>
					<option value="countlab">   Label + Votes Count </option>
					<option value="both">       Both                </option>
					<option value="bothlab">    Label + Both        </option>
				</select>
			</td>
			<td>Vote Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable effect for showing your voting."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_V_Eff">
					<option value="0"> None     </option>
					<option value="1"> Effect 1 </option>
					<option value="2"> Effect 2 </option>
					<option value="3"> Effect 3 </option>
					<option value="4"> Effect 4 </option>
					<option value="5"> Effect 5 </option>
					<option value="6"> Effect 6 </option>
					<option value="7"> Effect 7 </option>
					<option value="8"> Effect 8 </option>
					<option value="9"> Effect 9 </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Poll_TMTitles">
			<td colspan="4">Back Button</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the main background color which is designed for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_BB_MBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the back button: right, left or full."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_BB_Pos">
					<option value="left">  Left       </option>
					<option value="right"> Right      </option>
					<option value="full">  Full Width </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border color which is in the back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_BB_BC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_BB_BgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select the font color for the back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_BB_C" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Text <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in back button."></i></td>
			<td>
				<input type="text" class="Total_Soft_Poll_Select" id="TotalSoft_Poll_5_BB_Text" name="TotalSoft_Poll_5_BB_Text" value="">
			</td>
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the back button."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_BB_IT">
					<option value="">     None           </option>
					<option value="f00d"> Times          </option>
					<option value="f015"> Home           </option>
					<option value="f112"> Reply          </option>
					<option value="f021"> Refresh        </option>
					<option value="f100"> Angle Double   </option>
					<option value="f104"> Angle          </option>
					<option value="f0a8"> Arrow Circle   </option>
					<option value="f190"> Arrow Circle O </option>
					<option value="f0d9"> Caret          </option>
					<option value="f191"> Caret Square O </option>
					<option value="f137"> Chevron Circle </option>
					<option value="f053"> Chevron        </option>
					<option value="f0a5"> Hand O         </option>
					<option value="f177"> Long Arrow     </option>
				</select>
			</td>
			<td>Icon Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Choose icon to align for back button (left or right)."></i></td>
			<td>
				<select class="Total_Soft_Poll_Select" name="" id="TotalSoft_Poll_5_BB_IA">
					<option value="after">  After Text  </option>
					<option value="before"> Before Text </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for back button in the polling."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_BB_HBgC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Poll_Help1 totalsoft totalsoft-question-circle-o" title="Select hover color for back button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_Poll_5_BB_HC" class="Total_Soft_Poll_T_Color_1" value="">
			</td>
		</tr>
	</table>
</form>