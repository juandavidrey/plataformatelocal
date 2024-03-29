<?php
	//Admin Menu
	add_action( 'wp_ajax_TSoftPoll_Vimeo_Video_Image', 'TSoftPoll_Vimeo_Video_Image_Callback' );
	add_action( 'wp_ajax_nopriv_TSoftPoll_Vimeo_Video_Image', 'TSoftPoll_Vimeo_Video_Image_Callback' );

	function TSoftPoll_Vimeo_Video_Image_Callback()
	{
		$GET_Video_Video_Src = sanitize_text_field($_POST['foobar']);

		$TSoft_Poll_Image_Src=explode('video/',$GET_Video_Video_Src);
		$TSoft_Poll_Image_Src_Real=unserialize(file_get_contents("http://vimeo.com/api/v2/video/$TSoft_Poll_Image_Src[1].php"));
		$TSoft_Poll_Image_Src_Real=$TSoft_Poll_Image_Src_Real[0]['thumbnail_large'];

		echo $TSoft_Poll_Image_Src_Real;
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_Clone', 'TotalSoftPoll_Clone_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Clone', 'TotalSoftPoll_Clone_Callback' );

	function TotalSoftPoll_Clone_Callback()
	{
		$Poll_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1 = $wpdb->prefix . "totalsoft_poll_manager";
		$table_name2 = $wpdb->prefix . "totalsoft_poll_answers";
		$table_name3 = $wpdb->prefix . "totalsoft_poll_id";
		$table_name6 = $wpdb->prefix . "totalsoft_poll_results";
		$table_name15 = $wpdb->prefix . "totalsoft_poll_quest_im";

		$Total_Soft_Poll_Manager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id=%s order by id", $Poll_ID));
		$Total_Soft_Poll_Manager1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name15 WHERE Question_ID=%s order by id", $Poll_ID));
		$Total_Soft_Poll_Manager2 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE Question_ID=%s order by id", $Poll_ID));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, TotalSoftPoll_Question, TotalSoftPoll_Theme, TotalSoftPoll_Ans_C) VALUES (%d, %s, %s, %s)", '', $Total_Soft_Poll_Manager[0]->TotalSoftPoll_Question, $Total_Soft_Poll_Manager[0]->TotalSoftPoll_Theme, $Total_Soft_Poll_Manager[0]->TotalSoftPoll_Ans_C));

		$Total_Soft_Poll_New_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id > %d order by id desc limit 1", 0));
		
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Poll_ID) VALUES (%d, %d)", '', $Total_Soft_Poll_New_ID[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name15 (id, Question_ID, TotalSoftPoll_Q_Im, TotalSoftPoll_Q_Vd, TotalSoftPoll_Q_01, TotalSoftPoll_Q_02, TotalSoftPoll_Q_03, TotalSoftPoll_Q_04, TotalSoftPoll_Q_05) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Total_Soft_Poll_New_ID[0]->id, $Total_Soft_Poll_Manager1[0]->TotalSoftPoll_Q_Im, $Total_Soft_Poll_Manager1[0]->TotalSoftPoll_Q_Vd, $Total_Soft_Poll_Manager1[0]->TotalSoftPoll_Q_01, $Total_Soft_Poll_Manager1[0]->TotalSoftPoll_Q_02, $Total_Soft_Poll_Manager1[0]->TotalSoftPoll_Q_03, $Total_Soft_Poll_Manager1[0]->TotalSoftPoll_Q_04, $Total_Soft_Poll_Manager1[0]->TotalSoftPoll_Q_05));

		for($i = 0; $i < $Total_Soft_Poll_Manager[0]->TotalSoftPoll_Ans_C; $i++)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Question_ID, TotalSoftPoll_Ans, TotalSoftPoll_Ans_Im, TotalSoftPoll_Ans_Vd, TotalSoftPoll_Ans_Cl, TotalSoftPoll_Ans_01, TotalSoftPoll_Ans_02, TotalSoftPoll_Ans_03, TotalSoftPoll_Ans_04, TotalSoftPoll_Ans_05) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Total_Soft_Poll_New_ID[0]->id, $Total_Soft_Poll_Manager2[$i]->TotalSoftPoll_Ans, $Total_Soft_Poll_Manager2[$i]->TotalSoftPoll_Ans_Im, $Total_Soft_Poll_Manager2[$i]->TotalSoftPoll_Ans_Vd, $Total_Soft_Poll_Manager2[$i]->TotalSoftPoll_Ans_Cl, '', '', '', '', ''));

			$Total_Soft_Poll_Ans_ID=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name2 WHERE Question_ID=%s order by id desc limit 1", $Total_Soft_Poll_New_ID[0]->id));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Poll_ID, Poll_A_ID, Poll_A_Votes) VALUES (%d, %s, %s, %s)", '', $Total_Soft_Poll_New_ID[0]->id, $Total_Soft_Poll_Ans_ID, 0));
		}
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_Del', 'TotalSoftPoll_Del_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Del', 'TotalSoftPoll_Del_Callback' );

	function TotalSoftPoll_Del_Callback()
	{
		$Poll_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1 = $wpdb->prefix . "totalsoft_poll_manager";
		$table_name2 = $wpdb->prefix . "totalsoft_poll_answers";
		$table_name6 = $wpdb->prefix . "totalsoft_poll_results";
		$table_name15 = $wpdb->prefix . "totalsoft_poll_quest_im";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name1 WHERE id=%d", $Poll_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE Question_ID=%s", $Poll_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name6 WHERE Poll_ID=%s", $Poll_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name15 WHERE Question_ID=%s", $Poll_ID));
		die();
	}
	
	add_action( 'wp_ajax_TotalSoftPoll_Edit', 'TotalSoftPoll_Edit_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Edit', 'TotalSoftPoll_Edit_Callback' );

	function TotalSoftPoll_Edit_Callback()
	{
		$Poll_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1 = $wpdb->prefix . "totalsoft_poll_manager";
		$table_name2 = $wpdb->prefix . "totalsoft_poll_answers";

		$Total_Soft_Poll_Manager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id=%s", $Poll_ID));
		print_r($Total_Soft_Poll_Manager);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_Edit_Q_M', 'TotalSoftPoll_Edit_Q_M_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Edit_Q_M', 'TotalSoftPoll_Edit_Q_M_Callback' );

	function TotalSoftPoll_Edit_Q_M_Callback()
	{
		$Poll_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name15 = $wpdb->prefix . "totalsoft_poll_quest_im";

		$Total_Soft_Poll_Manager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name15 WHERE Question_ID=%s order by id", $Poll_ID));

		print_r($Total_Soft_Poll_Manager);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_Edit_Ans', 'TotalSoftPoll_Edit_Ans_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Edit_Ans', 'TotalSoftPoll_Edit_Ans_Callback' );

	function TotalSoftPoll_Edit_Ans_Callback()
	{
		$Poll_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1 = $wpdb->prefix . "totalsoft_poll_manager";
		$table_name2 = $wpdb->prefix . "totalsoft_poll_answers";

		$TotalSoftPoll_Edit_Answers=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE Question_ID=%s order by id", $Poll_ID));

		for($i = 0; $i < count($TotalSoftPoll_Edit_Answers); $i++)
		{
			$TotalSoftPoll_Edit_Answers[$i]->TotalSoftPoll_Ans = html_entity_decode($TotalSoftPoll_Edit_Answers[$i]->TotalSoftPoll_Ans);
		}
		print_r($TotalSoftPoll_Edit_Answers);
		die();
	}
	// Theme menu
	add_action( 'wp_ajax_TotalSoftPoll_Theme_Clone', 'TotalSoftPoll_Theme_Clone_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Theme_Clone', 'TotalSoftPoll_Theme_Clone_Callback' );

	function TotalSoftPoll_Theme_Clone_Callback()
	{
		$Theme_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4 = $wpdb->prefix . "totalsoft_poll_dbt";
		$table_name5 = $wpdb->prefix . "totalsoft_poll_stpoll";
		$table_name8 = $wpdb->prefix . "totalsoft_poll_stpoll_1";
		$table_name9  = $wpdb->prefix . "totalsoft_poll_impoll";
		$table_name10 = $wpdb->prefix . "totalsoft_poll_impoll_1";
		$table_name11 = $wpdb->prefix . "totalsoft_poll_stwibu";
		$table_name12 = $wpdb->prefix . "totalsoft_poll_stwibu_1";
		$table_name13 = $wpdb->prefix . "totalsoft_poll_imwibu";
		$table_name14 = $wpdb->prefix . "totalsoft_poll_imwibu_1";
		$table_name16 = $wpdb->prefix . "totalsoft_poll_iminqu";
		$table_name17 = $wpdb->prefix . "totalsoft_poll_iminqu_1";

		$TotalSoft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d", $Theme_ID));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType) VALUES (%d, %s, %s)", '', $TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TTitle, $TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType));
		$TotalSoftPoll1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d order by id desc limit 1", 0));

		if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Standart Poll')
		{
			$Total_Soft_Poll_Theme1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
			$Total_Soft_Poll_Theme2 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_1_MW, TotalSoft_Poll_1_Pos, TotalSoft_Poll_1_BW, TotalSoft_Poll_1_BC, TotalSoft_Poll_1_BR, TotalSoft_Poll_1_BoxSh_Show, TotalSoft_Poll_1_BoxSh_Type, TotalSoft_Poll_1_BoxSh, TotalSoft_Poll_1_BoxShC, TotalSoft_Poll_1_Q_BgC, TotalSoft_Poll_1_Q_C, TotalSoft_Poll_1_Q_FS, TotalSoft_Poll_1_Q_FF, TotalSoft_Poll_1_Q_TA, TotalSoft_Poll_1_LAQ_W, TotalSoft_Poll_1_LAQ_H, TotalSoft_Poll_1_LAQ_C, TotalSoft_Poll_1_LAQ_S, TotalSoft_Poll_1_A_FS, TotalSoft_Poll_1_A_CTF, TotalSoft_Poll_1_A_BgC, TotalSoft_Poll_1_A_C, TotalSoft_Poll_1_CH_CM, TotalSoft_Poll_1_CH_S, TotalSoft_Poll_1_CH_TBC, TotalSoft_Poll_1_CH_CBC, TotalSoft_Poll_1_CH_TAC, TotalSoft_Poll_1_CH_CAC, TotalSoft_Poll_1_A_HBgC, TotalSoft_Poll_1_A_HC, TotalSoft_Poll_1_LAA_W, TotalSoft_Poll_1_LAA_H, TotalSoft_Poll_1_LAA_C, TotalSoft_Poll_1_LAA_S, TotalSoft_Poll_1_VB_MBgC, TotalSoft_Poll_1_VB_Pos, TotalSoft_Poll_1_VB_BW, TotalSoft_Poll_1_VB_BC, TotalSoft_Poll_1_VB_BR, TotalSoft_Poll_1_VB_BgC, TotalSoft_Poll_1_VB_C, TotalSoft_Poll_1_VB_FS, TotalSoft_Poll_1_VB_FF, TotalSoft_Poll_1_VB_Text, TotalSoft_Poll_1_VB_IT, TotalSoft_Poll_1_VB_IA, TotalSoft_Poll_1_VB_IS, TotalSoft_Poll_1_VB_HBgC, TotalSoft_Poll_1_VB_HC, TotalSoft_Poll_1_RB_Show, TotalSoft_Poll_1_RB_Pos, TotalSoft_Poll_1_RB_BW, TotalSoft_Poll_1_RB_BC, TotalSoft_Poll_1_RB_BR, TotalSoft_Poll_1_RB_BgC, TotalSoft_Poll_1_RB_C, TotalSoft_Poll_1_RB_FS, TotalSoft_Poll_1_RB_FF, TotalSoft_Poll_1_RB_Text, TotalSoft_Poll_1_RB_IT, TotalSoft_Poll_1_RB_IA) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_TTitle, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_TType, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_MW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_BR, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_BoxSh_Show, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_BoxSh_Type, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_BoxSh, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_BoxShC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_Q_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_Q_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_Q_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_Q_FF, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_Q_TA, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_LAQ_W, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_LAQ_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_LAQ_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_LAQ_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_A_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_A_CTF, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_A_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_A_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_CH_CM, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_CH_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_CH_TBC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_CH_CBC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_CH_TAC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_CH_CAC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_A_HBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_A_HC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_LAA_W, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_LAA_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_LAA_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_LAA_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_MBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_BR, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_FF, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_Text, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_IT, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_IA, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_IS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_HBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_VB_HC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_Show, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_BR, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_FF, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_Text, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_IT, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_1_RB_IA));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_1_RB_IS, TotalSoft_Poll_1_RB_HBgC, TotalSoft_Poll_1_RB_HC, TotalSoft_Poll_1_P_BW, TotalSoft_Poll_1_P_BC, TotalSoft_Poll_1_P_ShPop, TotalSoft_Poll_1_P_ShEff, TotalSoft_Poll_1_P_Q_BgC, TotalSoft_Poll_1_P_Q_C, TotalSoft_Poll_1_P_LAQ_W, TotalSoft_Poll_1_P_LAQ_H, TotalSoft_Poll_1_P_LAQ_C, TotalSoft_Poll_1_P_LAQ_S, TotalSoft_Poll_1_P_A_BgC, TotalSoft_Poll_1_P_A_C, TotalSoft_Poll_1_P_A_VT, TotalSoft_Poll_1_P_A_VC, TotalSoft_Poll_1_P_A_VEff, TotalSoft_Poll_1_P_LAA_W, TotalSoft_Poll_1_P_LAA_H, TotalSoft_Poll_1_P_LAA_C, TotalSoft_Poll_1_P_LAA_S, TotalSoft_Poll_1_P_BB_Pos, TotalSoft_Poll_1_P_BB_BC, TotalSoft_Poll_1_P_BB_BgC, TotalSoft_Poll_1_P_BB_C, TotalSoft_Poll_1_P_BB_Text, TotalSoft_Poll_1_P_BB_IT, TotalSoft_Poll_1_P_BB_IA, TotalSoft_Poll_1_P_BB_HBgC, TotalSoft_Poll_1_P_BB_HC, TotalSoft_Poll_1_P_BB_MBgC, TotalSoft_Poll_1_P_A_MBgC, TotalSoft_Poll_1_A_MBgC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_TTitle, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_TType, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_RB_IS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_RB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_RB_HC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BW, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_ShPop, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_ShEff, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_Q_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_Q_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_LAQ_W, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_LAQ_H, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_LAQ_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_LAQ_S, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_A_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_A_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_A_VT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_A_VC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_A_VEff, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_LAA_W, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_LAA_H, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_LAA_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_LAA_S, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BB_Pos, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BB_BC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BB_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BB_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BB_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BB_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BB_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BB_HC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_BB_MBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_P_A_MBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_1_A_MBgC));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Image Poll' || $TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Video Poll')
		{
			$Total_Soft_Poll_Theme1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
			$Total_Soft_Poll_Theme2 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name9 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_2_MW, TotalSoft_Poll_2_Pos, TotalSoft_Poll_2_BW, TotalSoft_Poll_2_BC, TotalSoft_Poll_2_BR, TotalSoft_Poll_2_BoxSh_Show, TotalSoft_Poll_2_BoxSh_Type, TotalSoft_Poll_2_BoxSh, TotalSoft_Poll_2_BoxShC, TotalSoft_Poll_2_Q_BgC, TotalSoft_Poll_2_Q_C, TotalSoft_Poll_2_Q_FS, TotalSoft_Poll_2_Q_FF, TotalSoft_Poll_2_Q_TA, TotalSoft_Poll_2_LAQ_W, TotalSoft_Poll_2_LAQ_H, TotalSoft_Poll_2_LAQ_C, TotalSoft_Poll_2_LAQ_S, TotalSoft_Poll_2_A_CC, TotalSoft_Poll_2_A_IH, TotalSoft_Poll_2_A_CA, TotalSoft_Poll_2_A_FS, TotalSoft_Poll_2_A_MBgC, TotalSoft_Poll_2_A_BgC, TotalSoft_Poll_2_A_C, TotalSoft_Poll_2_A_Pos, TotalSoft_Poll_2_CH_CM, TotalSoft_Poll_2_CH_S, TotalSoft_Poll_2_CH_TBC, TotalSoft_Poll_2_CH_CBC, TotalSoft_Poll_2_CH_TAC, TotalSoft_Poll_2_CH_CAC, TotalSoft_Poll_2_A_HBgC, TotalSoft_Poll_2_A_HC, TotalSoft_Poll_2_A_HSh_Show, TotalSoft_Poll_2_A_HShC, TotalSoft_Poll_2_LAA_W, TotalSoft_Poll_2_LAA_H, TotalSoft_Poll_2_LAA_C, TotalSoft_Poll_2_LAA_S, TotalSoft_Poll_2_P_A_OC, TotalSoft_Poll_2_P_A_C, TotalSoft_Poll_2_P_A_VT, TotalSoft_Poll_2_P_A_VEff, TotalSoft_Poll_2_VB_MBgC, TotalSoft_Poll_2_VB_Pos, TotalSoft_Poll_2_VB_BW, TotalSoft_Poll_2_VB_BC, TotalSoft_Poll_2_Play_IC, TotalSoft_Poll_2_Play_IS, TotalSoft_Poll_2_Play_IOvC, TotalSoft_Poll_2_Play_IT) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_TTitle, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_TType, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_MW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_BR, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_BoxSh_Show, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_BoxSh_Type, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_BoxSh, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_BoxShC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_Q_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_Q_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_Q_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_Q_FF, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_Q_TA, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_LAQ_W, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_LAQ_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_LAQ_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_LAQ_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_CC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_IH, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_CA, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_MBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_CH_CM, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_CH_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_CH_TBC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_CH_CBC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_CH_TAC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_CH_CAC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_HBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_HC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_HSh_Show, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_A_HShC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_LAA_W, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_LAA_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_LAA_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_LAA_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_P_A_OC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_P_A_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_P_A_VT, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_P_A_VEff, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_VB_MBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_VB_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_VB_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_VB_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_Play_IC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_Play_IS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_Play_IOvC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_2_Play_IT));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name10 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_2_VB_BR, TotalSoft_Poll_2_VB_BgC, TotalSoft_Poll_2_VB_C, TotalSoft_Poll_2_VB_FS, TotalSoft_Poll_2_VB_FF, TotalSoft_Poll_2_VB_Text, TotalSoft_Poll_2_VB_IT, TotalSoft_Poll_2_VB_IA, TotalSoft_Poll_2_VB_IS, TotalSoft_Poll_2_VB_HBgC, TotalSoft_Poll_2_VB_HC, TotalSoft_Poll_2_RB_Show, TotalSoft_Poll_2_RB_Pos, TotalSoft_Poll_2_RB_BW, TotalSoft_Poll_2_RB_BC, TotalSoft_Poll_2_RB_BR, TotalSoft_Poll_2_RB_BgC, TotalSoft_Poll_2_RB_C, TotalSoft_Poll_2_RB_FS, TotalSoft_Poll_2_RB_FF, TotalSoft_Poll_2_RB_Text, TotalSoft_Poll_2_RB_IT, TotalSoft_Poll_2_RB_IA, TotalSoft_Poll_2_RB_IS, TotalSoft_Poll_2_RB_HBgC, TotalSoft_Poll_2_RB_HC, TotalSoft_Poll_2_P_BB_MBgC, TotalSoft_Poll_2_P_BB_Pos, TotalSoft_Poll_2_P_BB_BC, TotalSoft_Poll_2_P_BB_BgC, TotalSoft_Poll_2_P_BB_C, TotalSoft_Poll_2_P_BB_Text, TotalSoft_Poll_2_P_BB_IT, TotalSoft_Poll_2_P_BB_IA, TotalSoft_Poll_2_P_BB_HBgC, TotalSoft_Poll_2_P_BB_HC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_TTitle, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_TType, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_VB_BR, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_VB_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_VB_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_VB_FS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_VB_FF, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_VB_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_VB_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_VB_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_VB_IS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_VB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_VB_HC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_Show, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_Pos, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_BW, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_BC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_BR, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_FS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_FF, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_IS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_RB_HC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_P_BB_MBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_P_BB_Pos, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_P_BB_BC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_P_BB_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_P_BB_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_P_BB_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_P_BB_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_P_BB_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_P_BB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_2_P_BB_HC));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Standart Without Button')
		{
			$Total_Soft_Poll_Theme1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
			$Total_Soft_Poll_Theme2 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name12 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name11 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_3_MW, TotalSoft_Poll_3_Pos, TotalSoft_Poll_3_BW, TotalSoft_Poll_3_BC, TotalSoft_Poll_3_BR, TotalSoft_Poll_3_BoxSh_Show, TotalSoft_Poll_3_BoxSh_Type, TotalSoft_Poll_3_BoxSh, TotalSoft_Poll_3_BoxShC, TotalSoft_Poll_3_Q_BgC, TotalSoft_Poll_3_Q_C, TotalSoft_Poll_3_Q_FS, TotalSoft_Poll_3_Q_FF, TotalSoft_Poll_3_Q_TA, TotalSoft_Poll_3_LAQ_W, TotalSoft_Poll_3_LAQ_H, TotalSoft_Poll_3_LAQ_C, TotalSoft_Poll_3_LAQ_S, TotalSoft_Poll_3_A_CA, TotalSoft_Poll_3_A_FS, TotalSoft_Poll_3_A_MBgC, TotalSoft_Poll_3_A_BgC, TotalSoft_Poll_3_A_C, TotalSoft_Poll_3_A_BW, TotalSoft_Poll_3_A_BC, TotalSoft_Poll_3_A_BR, TotalSoft_Poll_3_CH_Sh, TotalSoft_Poll_3_CH_S, TotalSoft_Poll_3_CH_TBC, TotalSoft_Poll_3_CH_CBC, TotalSoft_Poll_3_CH_TAC, TotalSoft_Poll_3_CH_CAC, TotalSoft_Poll_3_A_HBgC, TotalSoft_Poll_3_A_HC, TotalSoft_Poll_3_LAA_W, TotalSoft_Poll_3_LAA_H, TotalSoft_Poll_3_LAA_C, TotalSoft_Poll_3_LAA_S, TotalSoft_Poll_3_RB_MBgC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_TTitle, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_TType, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_MW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_BR, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_BoxSh_Show, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_BoxSh_Type, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_BoxSh, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_BoxShC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_Q_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_Q_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_Q_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_Q_FF, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_Q_TA, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_LAQ_W, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_LAQ_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_LAQ_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_LAQ_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_A_CA, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_A_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_A_MBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_A_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_A_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_A_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_A_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_A_BR, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_CH_Sh, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_CH_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_CH_TBC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_CH_CBC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_CH_TAC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_CH_CAC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_A_HBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_A_HC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_LAA_W, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_LAA_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_LAA_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_LAA_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_3_RB_MBgC));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name12 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_3_TV_Show, TotalSoft_Poll_3_TV_Pos, TotalSoft_Poll_3_TV_C, TotalSoft_Poll_3_TV_FS, TotalSoft_Poll_3_TV_Text, TotalSoft_Poll_3_VT_IT, TotalSoft_Poll_3_RB_Show, TotalSoft_Poll_3_RB_Pos, TotalSoft_Poll_3_RB_BW, TotalSoft_Poll_3_RB_BC, TotalSoft_Poll_3_RB_BR, TotalSoft_Poll_3_RB_BgC, TotalSoft_Poll_3_RB_C, TotalSoft_Poll_3_RB_FS, TotalSoft_Poll_3_RB_FF, TotalSoft_Poll_3_RB_Text, TotalSoft_Poll_3_RB_IT, TotalSoft_Poll_3_RB_IA, TotalSoft_Poll_3_RB_IS, TotalSoft_Poll_3_RB_HBgC, TotalSoft_Poll_3_RB_HC, TotalSoft_Poll_3_V_CA, TotalSoft_Poll_3_V_MBgC, TotalSoft_Poll_3_V_BgC, TotalSoft_Poll_3_V_C, TotalSoft_Poll_3_V_T, TotalSoft_Poll_3_V_Eff, TotalSoft_Poll_3_BB_MBgC, TotalSoft_Poll_3_BB_Pos, TotalSoft_Poll_3_BB_BC, TotalSoft_Poll_3_BB_BgC, TotalSoft_Poll_3_BB_C, TotalSoft_Poll_3_BB_Text, TotalSoft_Poll_3_BB_IT, TotalSoft_Poll_3_BB_IA, TotalSoft_Poll_3_BB_HBgC, TotalSoft_Poll_3_BB_HC, TotalSoft_Poll_3_VT_IA) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_TTitle, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_TType, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_TV_Show, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_TV_Pos, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_TV_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_TV_FS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_TV_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_VT_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_Show, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_Pos, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_BW, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_BC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_BR, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_FS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_FF, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_IS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_RB_HC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_V_CA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_V_MBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_V_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_V_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_V_T, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_V_Eff, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_BB_MBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_BB_Pos, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_BB_BC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_BB_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_BB_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_BB_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_BB_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_BB_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_BB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_BB_HC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_3_VT_IA));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Image Without Button' || $TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Video Without Button')
		{
			$Total_Soft_Poll_Theme1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name13 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
			$Total_Soft_Poll_Theme2 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name14 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name13 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_4_MW, TotalSoft_Poll_4_Pos, TotalSoft_Poll_4_BW, TotalSoft_Poll_4_BC, TotalSoft_Poll_4_BR, TotalSoft_Poll_4_BoxSh_Show, TotalSoft_Poll_4_BoxSh_Type, TotalSoft_Poll_4_BoxSh, TotalSoft_Poll_4_BoxShC, TotalSoft_Poll_4_Q_BgC, TotalSoft_Poll_4_Q_C, TotalSoft_Poll_4_Q_FS, TotalSoft_Poll_4_Q_FF, TotalSoft_Poll_4_Q_TA, TotalSoft_Poll_4_LAQ_W, TotalSoft_Poll_4_LAQ_H, TotalSoft_Poll_4_LAQ_C, TotalSoft_Poll_4_LAQ_S, TotalSoft_Poll_4_A_CA, TotalSoft_Poll_4_A_FS, TotalSoft_Poll_4_A_MBgC, TotalSoft_Poll_4_A_BgC, TotalSoft_Poll_4_A_C, TotalSoft_Poll_4_A_BW, TotalSoft_Poll_4_A_BC, TotalSoft_Poll_4_A_BR, TotalSoft_Poll_4_A_FF, TotalSoft_Poll_4_A_HBgC, TotalSoft_Poll_4_A_HC, TotalSoft_Poll_4_I_H, TotalSoft_Poll_4_I_Ra, TotalSoft_Poll_4_I_OC, TotalSoft_Poll_4_I_IT, TotalSoft_Poll_4_I_IC, TotalSoft_Poll_4_I_IS, TotalSoft_Poll_4_Pop_Show, TotalSoft_Poll_4_Pop_IT, TotalSoft_Poll_4_Pop_IC, TotalSoft_Poll_4_Pop_BW, TotalSoft_Poll_4_Pop_BC, TotalSoft_Poll_4_LAA_W, TotalSoft_Poll_4_LAA_H, TotalSoft_Poll_4_LAA_C, TotalSoft_Poll_4_LAA_S, TotalSoft_Poll_4_TV_Show, TotalSoft_Poll_4_TV_Pos, TotalSoft_Poll_4_TV_C) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_TTitle, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_TType, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_MW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_BR, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_BoxSh_Show, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_BoxSh_Type, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_BoxSh, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_BoxShC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_Q_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_Q_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_Q_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_Q_FF, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_Q_TA, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_LAQ_W, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_LAQ_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_LAQ_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_LAQ_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_A_CA, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_A_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_A_MBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_A_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_A_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_A_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_A_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_A_BR, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_A_FF, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_A_HBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_A_HC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_I_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_I_Ra, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_I_OC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_I_IT, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_I_IC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_I_IS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_Pop_Show, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_Pop_IT, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_Pop_IC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_Pop_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_Pop_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_LAA_W, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_LAA_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_LAA_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_LAA_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_TV_Show, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_TV_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_4_TV_C));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name14 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_4_TV_FS, TotalSoft_Poll_4_TV_Text, TotalSoft_Poll_4_VT_IT, TotalSoft_Poll_4_VT_IA, TotalSoft_Poll_4_RB_Show, TotalSoft_Poll_4_RB_Pos, TotalSoft_Poll_4_RB_BW, TotalSoft_Poll_4_RB_BC, TotalSoft_Poll_4_RB_BR, TotalSoft_Poll_4_RB_MBgC, TotalSoft_Poll_4_RB_BgC, TotalSoft_Poll_4_RB_C, TotalSoft_Poll_4_RB_FS, TotalSoft_Poll_4_RB_FF, TotalSoft_Poll_4_RB_Text, TotalSoft_Poll_4_RB_IT, TotalSoft_Poll_4_RB_IA, TotalSoft_Poll_4_RB_IS, TotalSoft_Poll_4_RB_HBgC, TotalSoft_Poll_4_RB_HC, TotalSoft_Poll_4_V_CA, TotalSoft_Poll_4_V_MBgC, TotalSoft_Poll_4_V_BgC, TotalSoft_Poll_4_V_C, TotalSoft_Poll_4_V_T, TotalSoft_Poll_4_V_Eff, TotalSoft_Poll_4_BB_MBgC, TotalSoft_Poll_4_BB_Pos, TotalSoft_Poll_4_BB_BC, TotalSoft_Poll_4_BB_BgC, TotalSoft_Poll_4_BB_C, TotalSoft_Poll_4_BB_Text, TotalSoft_Poll_4_BB_IT, TotalSoft_Poll_4_BB_IA, TotalSoft_Poll_4_BB_HBgC, TotalSoft_Poll_4_BB_HC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_TTitle, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_TType, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_TV_FS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_TV_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_VT_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_VT_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_Show, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_Pos, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_BW, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_BC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_BR, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_MBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_FS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_FF, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_IS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_RB_HC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_V_CA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_V_MBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_V_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_V_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_V_T, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_V_Eff, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_BB_MBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_BB_Pos, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_BB_BC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_BB_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_BB_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_BB_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_BB_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_BB_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_BB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_4_BB_HC));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Image in Question' || $TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Video in Question')
		{
			$Total_Soft_Poll_Theme1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name16 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
			$Total_Soft_Poll_Theme2 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name17 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name16 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_5_MW, TotalSoft_Poll_5_Pos, TotalSoft_Poll_5_BW, TotalSoft_Poll_5_BC, TotalSoft_Poll_5_BR, TotalSoft_Poll_5_BoxSh_Show, TotalSoft_Poll_5_BoxSh_Type, TotalSoft_Poll_5_BoxSh, TotalSoft_Poll_5_BoxShC, TotalSoft_Poll_5_Q_BgC, TotalSoft_Poll_5_Q_C, TotalSoft_Poll_5_Q_FS, TotalSoft_Poll_5_Q_FF, TotalSoft_Poll_5_Q_TA, TotalSoft_Poll_5_I_H, TotalSoft_Poll_5_I_Ra, TotalSoft_Poll_5_V_W, TotalSoft_Poll_5_LAQ_W, TotalSoft_Poll_5_LAQ_H, TotalSoft_Poll_5_LAQ_C, TotalSoft_Poll_5_LAQ_S, TotalSoft_Poll_5_A_CA, TotalSoft_Poll_5_A_FS, TotalSoft_Poll_5_A_MBgC, TotalSoft_Poll_5_A_BgC, TotalSoft_Poll_5_A_C, TotalSoft_Poll_5_A_BW, TotalSoft_Poll_5_A_BC, TotalSoft_Poll_5_A_BR, TotalSoft_Poll_5_CH_S, TotalSoft_Poll_5_CH_TBC, TotalSoft_Poll_5_CH_CBC, TotalSoft_Poll_5_CH_TAC, TotalSoft_Poll_5_CH_CAC, TotalSoft_Poll_5_A_HBgC, TotalSoft_Poll_5_A_HC, TotalSoft_Poll_5_LAA_W, TotalSoft_Poll_5_LAA_H, TotalSoft_Poll_5_LAA_C, TotalSoft_Poll_5_LAA_S, TotalSoft_Poll_5_TV_Show, TotalSoft_Poll_5_TV_Pos, TotalSoft_Poll_5_TV_C, TotalSoft_Poll_5_TV_FS, TotalSoft_Poll_5_VT_IT, TotalSoft_Poll_5_VT_IA, TotalSoft_Poll_5_VB_Show, TotalSoft_Poll_5_VB_Pos, TotalSoft_Poll_5_VB_BW, TotalSoft_Poll_5_VB_BC, TotalSoft_Poll_5_VB_BR, TotalSoft_Poll_5_VB_MBgC, TotalSoft_Poll_5_VB_BgC, TotalSoft_Poll_5_VB_C, TotalSoft_Poll_5_VB_FS, TotalSoft_Poll_5_VB_FF) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_TTitle, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_TType, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_MW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_BR, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_BoxSh_Show, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_BoxSh_Type, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_BoxSh, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_BoxShC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_Q_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_Q_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_Q_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_Q_FF, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_Q_TA, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_I_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_I_Ra, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_V_W, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_LAQ_W, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_LAQ_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_LAQ_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_LAQ_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_A_CA, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_A_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_A_MBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_A_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_A_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_A_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_A_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_A_BR, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_CH_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_CH_TBC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_CH_CBC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_CH_TAC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_CH_CAC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_A_HBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_A_HC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_LAA_W, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_LAA_H, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_LAA_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_LAA_S, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_TV_Show, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_TV_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_TV_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_TV_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VT_IT, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VT_IA, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VB_Show, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VB_Pos, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VB_BW, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VB_BC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VB_BR, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VB_MBgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VB_BgC, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VB_C, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VB_FS, $Total_Soft_Poll_Theme1[0]->TotalSoft_Poll_5_VB_FF));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name17 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_5_VB_IT, TotalSoft_Poll_5_VB_IA, TotalSoft_Poll_5_VB_IS, TotalSoft_Poll_5_VB_HBgC, TotalSoft_Poll_5_VB_HC, TotalSoft_Poll_5_RB_Show, TotalSoft_Poll_5_RB_Pos, TotalSoft_Poll_5_RB_BW, TotalSoft_Poll_5_RB_BC, TotalSoft_Poll_5_RB_BR, TotalSoft_Poll_5_RB_BgC, TotalSoft_Poll_5_RB_C, TotalSoft_Poll_5_RB_FS, TotalSoft_Poll_5_RB_FF, TotalSoft_Poll_5_RB_IT, TotalSoft_Poll_5_RB_IA, TotalSoft_Poll_5_RB_IS, TotalSoft_Poll_5_RB_HBgC, TotalSoft_Poll_5_RB_HC, TotalSoft_Poll_5_V_CA, TotalSoft_Poll_5_V_MBgC, TotalSoft_Poll_5_V_BgC, TotalSoft_Poll_5_V_C, TotalSoft_Poll_5_V_T, TotalSoft_Poll_5_V_Eff, TotalSoft_Poll_5_BB_MBgC, TotalSoft_Poll_5_BB_Pos, TotalSoft_Poll_5_BB_BC, TotalSoft_Poll_5_BB_BgC, TotalSoft_Poll_5_BB_C, TotalSoft_Poll_5_BB_IT, TotalSoft_Poll_5_BB_IA, TotalSoft_Poll_5_BB_HBgC, TotalSoft_Poll_5_BB_HC, TotalSoft_Poll_5_TV_Text, TotalSoft_Poll_5_BB_Text, TotalSoft_Poll_5_RB_Text, TotalSoft_Poll_5_VB_Text) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_TTitle, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_TType, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_VB_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_VB_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_VB_IS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_VB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_VB_HC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_Show, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_Pos, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_BW, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_BC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_BR, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_FS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_FF, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_IS, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_HC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_V_CA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_V_MBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_V_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_V_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_V_T, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_V_Eff, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_BB_MBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_BB_Pos, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_BB_BC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_BB_BgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_BB_C, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_BB_IT, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_BB_IA, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_BB_HBgC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_BB_HC, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_TV_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_BB_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_RB_Text, $Total_Soft_Poll_Theme2[0]->TotalSoft_Poll_5_VB_Text));
		}

		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_Theme_Edit', 'TotalSoftPoll_Theme_Edit_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Theme_Edit', 'TotalSoftPoll_Theme_Edit_Callback' );

	function TotalSoftPoll_Theme_Edit_Callback()
	{
		$Theme_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4 = $wpdb->prefix . "totalsoft_poll_dbt";
		$table_name5 = $wpdb->prefix . "totalsoft_poll_stpoll";
		$table_name9  = $wpdb->prefix . "totalsoft_poll_impoll";
		$table_name11 = $wpdb->prefix . "totalsoft_poll_stwibu";
		$table_name13 = $wpdb->prefix . "totalsoft_poll_imwibu";
		$table_name16 = $wpdb->prefix . "totalsoft_poll_iminqu";

		$TotalSoft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d", $Theme_ID));

		if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Standart Poll')
		{
			$Total_Soft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Image Poll' || $TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Video Poll')
		{
			$Total_Soft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Standart Without Button')
		{
			$Total_Soft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Image Without Button' || $TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Video Without Button')
		{
			$Total_Soft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name13 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Image in Question' || $TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Video in Question')
		{
			$Total_Soft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name16 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
		}
		print_r($Total_Soft_Poll_Theme);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_Theme_Edit1', 'TotalSoftPoll_Theme_Edit1_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Theme_Edit1', 'TotalSoftPoll_Theme_Edit1_Callback' );

	function TotalSoftPoll_Theme_Edit1_Callback()
	{
		$Theme_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4  = $wpdb->prefix . "totalsoft_poll_dbt";
		$table_name8  = $wpdb->prefix . "totalsoft_poll_stpoll_1";
		$table_name10 = $wpdb->prefix . "totalsoft_poll_impoll_1";
		$table_name12 = $wpdb->prefix . "totalsoft_poll_stwibu_1";
		$table_name14 = $wpdb->prefix . "totalsoft_poll_imwibu_1";
		$table_name17 = $wpdb->prefix . "totalsoft_poll_iminqu_1";

		$TotalSoft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d", $Theme_ID));

		if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Standart Poll')
		{
			$Total_Soft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Image Poll' || $TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Video Poll')
		{
			$Total_Soft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Standart Without Button')
		{
			$Total_Soft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name12 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Image Without Button' || $TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Video Without Button')
		{
			$Total_Soft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name14 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
		}
		else if($TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Image in Question' || $TotalSoft_Poll_Theme[0]->TotalSoft_Poll_TType=='Video in Question')
		{
			$Total_Soft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name17 WHERE TotalSoft_Poll_TID=%s", $Theme_ID));
		}
		print_r($Total_Soft_Poll_Theme);
		die();
	}
	// Voting
	add_action( 'wp_ajax_TotalSoftPoll_1_Vote', 'TotalSoftPoll_1_Vote_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_1_Vote', 'TotalSoftPoll_1_Vote_Callback' );

	function TotalSoftPoll_1_Vote_Callback()
	{
		$Total_Soft_Poll_1_Ans_ID = sanitize_text_field($_POST['foobar']);

		global $wpdb;
		$table_name1 = $wpdb->prefix . "totalsoft_poll_manager";
		$table_name4 = $wpdb->prefix . "totalsoft_poll_dbt";
		$table_name6 = $wpdb->prefix . "totalsoft_poll_results";
		$table_name7 = $wpdb->prefix . "totalsoft_poll_inform";

		$Voted_Poll_Pars_Split=explode('^*^', $Total_Soft_Poll_1_Ans_ID);

		$Total_Soft_Poll_Question_ID=$wpdb->get_var($wpdb->prepare("SELECT Poll_ID FROM $table_name6 WHERE Poll_A_ID=%d", $Voted_Poll_Pars_Split[0]));
		
		$Total_Soft_Poll_Man = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id = %d order by id", $Total_Soft_Poll_Question_ID));
		$Total_Soft_Poll_Themes = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d order by id", $Total_Soft_Poll_Man[0]->TotalSoftPoll_Theme));
		
		if( $Total_Soft_Poll_Themes[0]->TotalSoft_Poll_TType == 'Standart Poll' )
		{
			$TotalSoft_Poll_Cookie_Type = 'Standart';
		}
		else if( $Total_Soft_Poll_Themes[0]->TotalSoft_Poll_TType == 'Image Poll' || $Total_Soft_Poll_Themes[0]->TotalSoft_Poll_TType == 'Video Poll' )
		{
			$TotalSoft_Poll_Cookie_Type = 'Image/Video';
		}
		else if( $Total_Soft_Poll_Themes[0]->TotalSoft_Poll_TType == 'Standart Without Button' )
		{
			$TotalSoft_Poll_Cookie_Type = 'StandartWB';
		}
		else if( $Total_Soft_Poll_Themes[0]->TotalSoft_Poll_TType == 'Image Without Button' || $Total_Soft_Poll_Themes[0]->TotalSoft_Poll_TType == 'Video Without Button' )
		{
			$TotalSoft_Poll_Cookie_Type = 'ImageWB/VideoWB';
		}
		else if( $Total_Soft_Poll_Themes[0]->TotalSoft_Poll_TType == 'Image in Question' || $Total_Soft_Poll_Themes[0]->TotalSoft_Poll_TType == 'Video in Question' )
		{
			$TotalSoft_Poll_Cookie_Type = 'ImageIQ/VideoIQ';
		}

		setcookie("TotalSoft_Poll_Cookie_" . $Total_Soft_Poll_Question_ID, $TotalSoft_Poll_Cookie_Type, time() + (86400 * 365), "/"); // 86400 = 1 day

		for($i=0;$i<count($Voted_Poll_Pars_Split);$i++)
		{
			$Total_Soft_Poll_Ans_Votes=$wpdb->get_var($wpdb->prepare("SELECT Poll_A_Votes FROM $table_name6 WHERE Poll_A_ID=%d", $Voted_Poll_Pars_Split[$i]));
			$Total_Soft_Poll_Ans_Votes++;

			$wpdb->query($wpdb->prepare("UPDATE $table_name6 set Poll_A_Votes=%s WHERE Poll_A_ID=%s",$Total_Soft_Poll_Ans_Votes, $Voted_Poll_Pars_Split[$i]));
		}
		
		if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			$Total_Soft_IP_Address = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) {
			$Total_Soft_IP_Address = getenv( 'HTTP_X_FORWARDED_FOR' );
		} elseif ( getenv( 'HTTP_X_FORWARDED' ) ) {
			$Total_Soft_IP_Address = getenv( 'HTTP_X_FORWARDED' );
		} elseif ( getenv( 'HTTP_FORWARDED_FOR' ) ) {
			$Total_Soft_IP_Address = getenv( 'HTTP_FORWARDED_FOR' );
		} elseif ( getenv( 'HTTP_FORWARDED' ) ) {
			$Total_Soft_IP_Address = getenv( 'HTTP_FORWARDED' );
		} elseif ( getenv( 'REMOTE_ADDR' ) ) {
			$Total_Soft_IP_Address = getenv( 'REMOTE_ADDR' );
		} else {
			$Total_Soft_IP_Address = 'UNKNOWN';
		}

		$Total_Soft_IP_Address_Info = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$Total_Soft_IP_Address));
		if(empty($Total_Soft_IP_Address_Info['geoplugin_countryCode']))
		{
			$Total_Soft_IP_Address_Info['geoplugin_city']='Unknown';
			$Total_Soft_IP_Address_Info['geoplugin_region']='Unknown';
			$Total_Soft_IP_Address_Info['geoplugin_countryName']='Unknown';
			$Total_Soft_IP_Address_Info['geoplugin_countryCode']='UN';
		}

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Poll_ID, IPAddress, City, Region, CountryCode, CountryName, CountryFlag, Data) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Total_Soft_Poll_Question_ID, $Total_Soft_IP_Address, $Total_Soft_IP_Address_Info['geoplugin_city'], $Total_Soft_IP_Address_Info['geoplugin_region'], $Total_Soft_IP_Address_Info['geoplugin_countryCode'], $Total_Soft_IP_Address_Info['geoplugin_countryName'], $Total_Soft_IP_Address_Info['geoplugin_countryCode'], date("Y.m.d h:i:sa")));

		$Total_Soft_Poll_Results=$wpdb->get_results($wpdb->prepare("SELECT Poll_A_Votes FROM $table_name6 WHERE Poll_ID=%s order by id", $Total_Soft_Poll_Question_ID));
		print_r($Total_Soft_Poll_Results);
		die();
	}
	// Results
	add_action( 'wp_ajax_TotalSoftPoll_1_Results', 'TotalSoftPoll_1_Results_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_1_Results', 'TotalSoftPoll_1_Results_Callback' );

	function TotalSoftPoll_1_Results_Callback()
	{
		$Total_Soft_Poll_1_Quest_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name6 = $wpdb->prefix . "totalsoft_poll_results";
		
		$Total_Soft_Poll_Results=$wpdb->get_results($wpdb->prepare("SELECT Poll_A_Votes FROM $table_name6 WHERE Poll_ID=%s order by id", $Total_Soft_Poll_1_Quest_ID));
		print_r($Total_Soft_Poll_Results);
		die();
	}
	// Settings
	add_action( 'wp_ajax_TotalSoftPoll_Clone_Set', 'TotalSoftPoll_Clone_Set_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Clone_Set', 'TotalSoftPoll_Clone_Set_Callback' );

	function TotalSoftPoll_Clone_Set_Callback()
	{
		$Set_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name18 = $wpdb->prefix . "totalsoft_poll_setting";

		$TotalSoftPollSetManager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name18 WHERE id=%d",$Set_ID));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name18 (id, TotalSoft_Poll_SetTitle, TotalSoft_Poll_Set_01, TotalSoft_Poll_Set_02, TotalSoft_Poll_Set_03, TotalSoft_Poll_Set_04, TotalSoft_Poll_Set_05, TotalSoft_Poll_Set_06, TotalSoft_Poll_Set_07, TotalSoft_Poll_Set_08, TotalSoft_Poll_Set_09, TotalSoft_Poll_Set_10, TotalSoft_Poll_Set_11) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPollSetManager[0]->TotalSoft_Poll_SetTitle, $TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_01, $TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_02, $TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_03, $TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_04, $TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_05, $TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_06, $TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_07, $TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_08, $TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_09, $TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_10, $TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_11));
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_Edit_Set', 'TotalSoftPoll_Edit_Set_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Edit_Set', 'TotalSoftPoll_Edit_Set_Callback' );

	function TotalSoftPoll_Edit_Set_Callback()
	{
		$Set_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name18 = $wpdb->prefix . "totalsoft_poll_setting";

		$TotalSoftPollSetManager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name18 WHERE id=%d",$Set_ID));

		$TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_04 = html_entity_decode($TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_04);
		$TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_05 = html_entity_decode($TotalSoftPollSetManager[0]->TotalSoft_Poll_Set_05);
		print_r($TotalSoftPollSetManager);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_Del_Set', 'TotalSoftPoll_Del_Set_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Del_Set', 'TotalSoftPoll_Del_Set_Callback' );

	function TotalSoftPoll_Del_Set_Callback()
	{
		$Set_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name18 = $wpdb->prefix . "totalsoft_poll_setting";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name18 WHERE id=%d", $Set_ID));
		die();
	}

	add_action( 'wp_ajax_TS_PTable_New_MTable_DisMiss_Poll', 'TS_PTable_New_MTable_DisMiss_Callback_Poll' );
	add_action( 'wp_ajax_nopriv_TS_PTable_New_MTable_DisMiss_Poll', 'TS_PTable_New_MTable_DisMiss_Callback_Pol0l' );

	function TS_PTable_New_MTable_DisMiss_Callback_Poll()
	{
		$val = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_namenp  = $wpdb->prefix . "totalsoft_new_plugin";

		$wpdb->query($wpdb->prepare("UPDATE $table_namenp set Dismiss = %s WHERE New_Plugin_Name = %s AND Our_Plugin_Name = %s", '1', 'Pricing Table', 'Poll'));
		die();
	}

	add_action( 'wp_ajax_TS_Poll_Question_DisMiss', 'TS_Poll_Question_DisMiss_Callback' );
	add_action( 'wp_ajax_nopriv_TS_Poll_Question_DisMiss', 'TS_Poll_Question_DisMiss_Callback' );

	function TS_Poll_Question_DisMiss_Callback()
	{
		$val = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_namenp  = $wpdb->prefix . "totalsoft_new_plugin";

		$wpdb->query($wpdb->prepare("UPDATE $table_namenp set Dismiss = %s WHERE New_Plugin_Name = %s AND Our_Plugin_Name = %s", '1', 'Poll Question', 'Poll'));
		die();
	}
?>