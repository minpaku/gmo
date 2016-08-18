<?php
require_once( './config.php');

if( isset($_POST['submit'])) {
	//リダイレクト用パラメータをインスタンス化して、パラメータを設定します
	require_once( ROOT.'com/gmo_pg/client/input/McpStartInput.php');
	require_once( ROOT.'com/gmo_pg/client/common/RedirectUtil.php');
	$redirectInput = new McpStartInput();
	$redirectInput->setAccessID( $_POST['AccessID']);
	$redirectInput->setToken( $_POST['Token']);


	//リダイレクトページ表示クラスをインスタンス化して実行します。
	$redirectShow = new RedirectUtil();
	print ($redirectShow->mcpStart( MCP_START_RIDIRECT_HTML , $redirectInput ) );
	exit();
}

//McpStart入力・結果画面
require_once( PGCARD_SAMPLE_BASE . '/display/McpStart.php' );
