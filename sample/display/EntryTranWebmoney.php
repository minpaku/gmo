<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja-JP" xml:lang="ja-JP">
<head>
	<meta http-equiv="Content-Style-Type" content="text/css; charset=UTF-8" />	
	<link rel="stylesheet" href="style/pgcommon.css" charset="UTF-8" />
	<title>[Entry]-PGマルチペイメントサービス－モジュールタイプ呼び出しサンプル</title>
</head>
<body>

<div id="header">
	<h1>WebMoney取引登録/モジュールタイプ(PHP) 呼び出しサンプル</h1>
	<a href="index.html">インデックスに戻る</a>
</div>

<div id="main">
	<?php
		 if( !isset ($_POST['submit']) ){//初期表示
	?>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
		<table>
			<tr>
				<th scope="row">オーダーID(OrderID)</th>
				<td><input name="OrderID" type="text" maxlength="27" size="27" tabindex="1" /></td>
			</tr>
			<tr>
				<th scope="row">利用金額(Amount)</th>
				<td><input name="Amount" type="text" maxlength="8" size="10" tabindex="3" class="num" /></td>
			</tr>
			<tr>
				<th scope="row">税送料(Tax)</th>
				<td><input name="Tax" type="text" maxlength="7" size="10" tabindex="4" class="num" /></td>
			</tr>
			</tbody>
		</table>
		<input name="submit" type="submit" value="実行" tabindex="5" />
	</form>
	<?php 
		}else{//送信結果の表示です
	?>
		<table>
			<caption>実行結果</caption>
			<tfoot>
				<tr>
					<td colspan="2">
						<a href="ExecTranWebmoney.php?AccessID=<?php echo urlencode( $output->getAccessId() ) . '&AccessPass=' . urlencode( $output->getAccessPass()) .'&OrderID=' . $_POST['OrderID'] ?>" tabindex="30">
						引き続き決済実行(ExecTranWebmoney)を行う</a>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<tr>
					<th scope="row">オーダID(OrderID)</th>
					<td><?php echo $output->getOrderId() ?></td>
				</tr>			
				<tr>
					<th scope="row">取引ID(AccessID)</th>
					<td><?php echo $output->getAccessId() ?></td>
				</tr>
				<tr>
					<th scope="row">取引PASS(AccessPass)</th>
					<td><?php echo $output->getAccessPass() ?></td>
				</tr>
			</tbody>
		</table>
	<?php
		}//if( !isset ($_POST['submit']) )
	?>
</div>

<div id="footer">
	<em>Copyright (c) 2010 GMO Payment Gateway,Inc. All Rights Reserved.</em>
</div>

</body>
</html>