<?php
require_once( './config.php');

if( isset( $_POST['submit'] ) ){
	require_once( ROOT.'com/gmo_pg/client/input/RegisterRecurringCreditInput.php');
	require_once( ROOT.'com/gmo_pg/client/tran/RegisterRecurringCredit.php');
	
	//入力パラメータクラスをインスタンス化します
	$input = new RegisterRecurringCreditInput();/* @var $input RegisterRecurringCreditInput */
	
	//このサンプルでは、ショップID・パスワードはコンフィグファイルで
	//定数defineしています。
	$input->setShopId(PGCARD_SHOP_ID);
	$input->setShopPass(PGCARD_SHOP_PASS);
	
	//各種パラメータを設定しています。
	//実際には、利用金額、オーダーIDといったパラメータをお客様が直接入力することは無く、
	//購買内容を元に加盟店様システムで生成した値が設定されるものと思います。
	$input->setShopID($_POST['ShopID']);
	$input->setShopPass($_POST['ShopPass']);
	$input->setRecurringID($_POST['RecurringID']);
	$input->setAmount($_POST['Amount']);
	$input->setTax($_POST['Tax']);
	$input->setRegistType($_POST['RegistType']);
	$input->setSiteID($_POST['SiteID']);
	$input->setSitePass($_POST['SitePass']);
	$input->setMemberID($_POST['MemberID']);
	$input->setCardNo($_POST['CardNo']);
	$input->setExpire($_POST['Expire']);
	$input->setSrcOrderID($_POST['SrcOrderID']);
	$input->setChargeDay($_POST['ChargeDay']);
	$input->setChargeMonth($_POST['ChargeMonth']);
	$input->setChargeStartDate($_POST['ChargeStartDate']);
	$input->setChargeStopDate($_POST['ChargeStopDate']);
	$input->setClientField1( mb_convert_encoding( $_POST['ClientField1'] , 'SJIS' , PGCARD_SAMPLE_ENCODING ) );
	$input->setClientField2( mb_convert_encoding( $_POST['ClientField2'] , 'SJIS' , PGCARD_SAMPLE_ENCODING ) );
	$input->setClientField3( mb_convert_encoding( $_POST['ClientField3'] , 'SJIS' , PGCARD_SAMPLE_ENCODING ) );

	
	//API通信クラスをインスタンス化します
	$exe = new RegisterRecurringCredit();/* @var $exec RegisterRecurringCredit */
	
	//パラメータオブジェクトを引数に、実行メソッドを呼び、結果を受け取ります。
	$output = $exe->exec( $input );/* @var $output RegisterRecurringCreditOutput */

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

//RegisterRecurringCredit入力・結果画面
require_once( PGCARD_SAMPLE_BASE . '/display/RegisterRecurringCredit.php' );