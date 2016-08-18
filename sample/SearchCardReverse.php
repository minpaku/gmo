<?php
require_once( './config.php');

if( isset( $_POST['submit'] ) ){
	require_once( ROOT.'com/gmo_pg/client/input/SearchCardReverseInput.php');
	require_once( ROOT.'com/gmo_pg/client/tran/SearchCardReverse.php');
	
	//入力パラメータクラスをインスタンス化します
	$input = new SearchCardReverseInput();/* @var $input SearchCardReverseInput */
	
	//このサンプルでは、サイトID・パスワードはコンフィグファイルで
	//定数defineしています。
	$input->setSiteId( PGCARD_SITE_ID );
	$input->setSitePass( PGCARD_SITE_PASS );
	
	//カード番号は必須です
	$input->setCardNo( $_POST['CardNo'] );
	
	//API通信クラスをインスタンス化します
	$exe = new SearchCardReverse();/* @var $exec SearchCardReverse */
	
	//パラメータオブジェクトを引数に、実行メソッドを呼びます。
	//正常に終了した場合、結果オブジェクトが返るはずです。
	$output = $exe->exec( $input );/* @var $output SearchCardReverseOutput */

	//実行後、その結果を確認します。
	
	if( $exe->isExceptionOccured() ){//取引の処理そのものがうまくいかない（通信エラー等）場合、例外が発生します。

		//サンプルでは、例外メッセージを表示して終了します。
		require_once( PGCARD_SAMPLE_BASE . '/display/Exception.php');
		exit();
		
	}else{
		
		//例外が発生していない場合、出力パラメータオブジェクトが戻ります。
		
		if( $output->isErrorOccurred() ){//出力パラメータにエラーコードが含まれていないか、チェックしています。
			
			//サンプルでは、エラーが発生していた場合、エラー画面を表示して終了します。
			require_once( PGCARD_SAMPLE_BASE . '/display/Error.php');
			exit();
			
		}

		//例外発生せず、エラーの戻りもないので、正常とみなします。
		//このif文を抜けて、結果を表示します。
	}
	
}

//SearchCard入力・結果画面
require_once( PGCARD_SAMPLE_BASE . '/display/SearchCardReverse.php' );