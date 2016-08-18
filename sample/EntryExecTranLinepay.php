<?php
require_once( './config.php');

if( isset( $_POST['submit'] ) ){
	require_once( ROOT.'com/gmo_pg/client/input/EntryTranLinepayInput.php');
	require_once( ROOT.'com/gmo_pg/client/input/ExecTranLinepayInput.php');
	require_once( ROOT.'com/gmo_pg/client/input/EntryExecTranLinepayInput.php');
	require_once( ROOT.'com/gmo_pg/client/tran/EntryExecTranLinepay.php');
	
	//入力パラメータクラスをインスタンス化します
	$input = new EntryExecTranLinepayInput();/* @var $input EntryExecTranLinepayInput */
		$input->setShopID($_POST['ShopID']);
		$input->setShopPass($_POST['ShopPass']);
		$input->setOrderID($_POST['OrderID']);
		$input->setJobCd($_POST['JobCd']);
		$input->setAmount($_POST['Amount']);
		$input->setTax($_POST['Tax']);
		$input->setAccessID($_POST['AccessID']);
		$input->setAccessPass($_POST['AccessPass']);
		$input->setSiteID($_POST['SiteID']);
		$input->setSitePass($_POST['SitePass']);
		$input->setMemberID($_POST['MemberID']);
		$input->setMemberName( mb_convert_encoding( $_POST['MemberName'] , 'SJIS' , PGCARD_SAMPLE_ENCODING ) );
		$input->setCreateMember($_POST['CreateMember']);
		$input->setClientField1( mb_convert_encoding( $_POST['ClientField1'] , 'SJIS' , PGCARD_SAMPLE_ENCODING ) );
		$input->setClientField2( mb_convert_encoding( $_POST['ClientField2'] , 'SJIS' , PGCARD_SAMPLE_ENCODING ) );
		$input->setClientField3( mb_convert_encoding( $_POST['ClientField3'] , 'SJIS' , PGCARD_SAMPLE_ENCODING ) );
		$input->setClientFieldFlag($_POST['ClientFieldFlag']);
		$input->setRetURL($_POST['RetURL']);
		$input->setErrorRcvURL($_POST['ErrorRcvURL']);
		$input->setProductImageUrl($_POST['ProductImageUrl']);
		$input->setMid($_POST['Mid']);
		$input->setDeliveryPlacePhone($_POST['DeliveryPlacePhone']);
		$input->setLangCode($_POST['LangCode']);
		$input->setProductName( mb_convert_encoding( $_POST['ProductName'] , 'SJIS' , PGCARD_SAMPLE_ENCODING ) );
		$input->setPackageName($_POST['PackageName']);

	
	//API通信クラスをインスタンス化します
	$exe = new EntryExecTranLinepay();/* @var $exec EntryExecTranLinepay */
	
	//パラメータオブジェクトを引数に、実行メソッドを呼びます。
	//正常に終了した場合、結果オブジェクトが返るはずです。
	$output = $exe->exec( $input );/* @var $output EntryExecTranLinepayOutput */

	//実行後、その結果を確認します。
	
	if( $exe->isExceptionOccured() ){//取引の処理そのものがうまくいかない（通信エラー等）場合、例外が発生します。

		//サンプルでは、例外メッセージを表示して終了します。
		require_once( PGCARD_SAMPLE_BASE . '/display/Exception.php');
		exit();
		
	}else{
		
		//例外が発生していない場合、出力パラメータオブジェクトが戻ります。
		
		if( $output->isErrorOccurred() ){//出力パラメータにエラーコードが含まれていないか、チェックしています。
			
			//サンプルでは、エラーが発生していた場合、エラー画面を表示して終了します。
			require_once( PGCARD_SAMPLE_BASE . '/display/EntryExecError.php');
			exit();
		}

		//例外発生せず、エラーの戻りもなく、3Dセキュアフラグもオフであるので、実行結果を表示します。
	}
	
}

//EntryExecTranLinepay入力・結果画面
require_once( PGCARD_SAMPLE_BASE . '/display/EntryExecTranLinepay.php' );