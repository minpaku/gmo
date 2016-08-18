<?php
require_once( './config.php');

if( isset( $_POST['submit'] ) ){
	require_once( ROOT.'com/gmo_pg/client/input/SearchBookingInfoInput.php');
	require_once( ROOT.'com/gmo_pg/client/tran/SearchBookingInfo.php');

	//入力パラメータクラスをインスタンス化します
	$input = new SearchBookingInfoInput();/* @var $input SearchBookingInfoInput */

	//各種パラメータを設定しています。
	//実際には、処理区分や利用金額、オーダーIDといったパラメータをカード所有者が直接入力することは無く、
	//購買内容を元に加盟店様システムで生成した値が設定されるものと思います。
	$input->setShopId( $_POST['ShopID'] );
	$input->setShopPass( $_POST['ShopPass'] );
	$input->setAccessId( $_POST['AccessID']);
	$input->setAccessPass( $_POST['AccessPass']);


	//API通信クラスをインスタンス化します
	$exe = new SearchBookingInfo();/* @var $exec SearchBookingInfo */

	//パラメータオブジェクトを引数に、実行メソッドを呼び、結果を受け取ります。
	$output = $exe->exec( $input );/* @var $output SearchBookingInfoOutput */

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

//EntryTran入力・結果画面
require_once( PGCARD_SAMPLE_BASE . '/display/SearchBookingInfo.php' );