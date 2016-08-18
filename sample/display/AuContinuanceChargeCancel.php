<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja-JP" xml:lang="ja-JP">
<head>
	<meta http-equiv="Content-Style-Type" content="text/css; charset=UTF-8" />
	<link rel="stylesheet" href="style/pgcommon.css" charset="UTF-8" />
	<title>[AuChargeCancelReturn]-PGマルチペイメントサービス－モジュールタイプ呼び出しサンプル</title>
</head>
<body>

<div id="header">
	<h1>auかんたん決済継続課金決済取消/モジュールタイプ(PHP) 呼び出しサンプル</h1>
	<a href="index.html">インデックスに戻る</a>
</div>

<div id="main">
	<?php
		 if( !isset ($_POST['submit']) ){//初期表示
	?>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
		<table>
			<tfoot>
				<tr>
					<td colspan="2"><input name="submit" type="submit" value="実行" tabindex="50" /></td>
				</tr>
			</tfoot>
			<tbody>
			<tr>
				<th scope="row">ショップID(ShopID)</th>
				<td><input name="ShopID" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">ショップパスワード(ShopPass)</th>
				<td><input name="ShopPass" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">取引ID(AccessID)</th>
				<td><input name="AccessID" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">取引パスワード(AccessPass)</th>
				<td><input name="AccessPass" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">オーダーID(OrderID)</th>
				<td><input name="OrderID" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">キャンセル金額(CancelAmount)</th>
				<td><input name="CancelAmount" type="text" size="10" tabindex="14" class="num" /></td>
			</tr>
			<tr>
				<th scope="row">キャンセル税送料(CancelTax)</th>
				<td><input name="CancelTax" type="text" size="10" tabindex="14" class="num" /></td>
			</tr>
			<tr>
				<th scope="row">課金月(ContinuanceMonth)</th>
				<td><input name="ContinuanceMonth" type="text" size="10" tabindex="14" class="num" /></td>
			</tr>
			</tbody>
		</table>
	</form>
	<?php
		}else{//送信結果の表示です
	?>
		<table>
			<caption>実行結果</caption>

			<tbody>
				<tr>
					<th scope="row">オーダーID(OrderID)</th>
					<td><?php echo $output->getOrderID() ?></td>
				</tr>
				<tr>
					<th scope="row">現状態(Status)</th>
					<td><?php echo $output->getStatus() ?></td>
				</tr>
				<tr>
					<th scope="row">利用金額－キャンセル金額(Amount)</th>
					<td><?php echo $output->getAmount() ?></td>
				</tr>
				<tr>
					<th scope="row">税送料－キャンセル税送料(Tax)</th>
					<td><?php echo $output->getTax() ?></td>
				</tr>
				<tr>
					<th scope="row">キャンセル金額(CancelAmount)</th>
					<td><?php echo $output->getCancelAmount() ?></td>
				</tr>
				<tr>
					<th scope="row">キャンセル税送料(CancelTax)</th>
					<td><?php echo $output->getCancelTax() ?></td>
				</tr>
				<tr>
					<th scope="row">課金月(ContinuanceMonth)</th>
					<td><?php echo $output->getContinuanceMonth() ?></td>
				</tr>
			</tbody>
		</table>
	<?php
		}//if( !isset ($_POST['submit']) )
	?>
</div>

<div id="footer">
	<em>Copyright (c) GMO Payment Gateway,Inc. All Rights Reserved.</em>
</div>

</body>
</html>