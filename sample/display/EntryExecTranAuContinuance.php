<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja-JP" xml:lang="ja-JP">
<head>
	<meta http-equiv="Content-Style-Type" content="text/css; charset=UTF-8" />
	<link rel="stylesheet" href="style/pgcommon.css" charset="UTF-8" />

	<title>[EntryExec]-PGマルチペイメントサービス－モジュールタイプ呼び出しサンプル</title>
</head>
<body>

<div id="header">
	<h1>auかんたん決済登録・決済実行/モジュールタイプ(PHP) 呼び出しサンプル</h1>
	<a href="index.html">インデックスに戻る</a>
</div>

<div id="main">
	<?php
		 if( !isset ($_POST['submit']) ){//初期表示です
	?>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
		<table>
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
				<th scope="row">オーダーID(OrderID)</th>
				<td><input name="OrderID" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">利用金額(Amount)</th>
				<td><input name="Amount" type="text" size="10" tabindex="11" class="num" /></td>
			</tr>
			<tr>
				<th scope="row">税送料(Tax)</th>
				<td><input name="Tax" type="text" size="10" tabindex="11" class="num" /></td>
			</tr>
			<tr>
				<th scope="row">初回課金利用金額(FirstAmount)</th>
				<td><input name="FirstAmount" type="text" size="10" tabindex="11" class="num" /></td>
			</tr>
			<tr>
				<th scope="row">初回課金税送料(FirstTax)</th>
				<td><input name="FirstTax" type="text" size="10" tabindex="11" class="num" /></td>
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
				<th scope="row">サイトID(SiteID)</th>
				<td><input name="SiteID" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">サイトパスワード(SitePass)</th>
				<td><input name="SitePass" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">会員ID(MemberID)</th>
				<td><input name="MemberID" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">会員名(MemberName)</th>
				<td><input name="MemberName" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">会員作成フラグ(CreateMember)</th>
				<td><input name="CreateMember" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">自由項目１(ClientField1)</th>
				<td><input name="ClientField1" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">自由項目２(ClientField2)</th>
				<td><input name="ClientField2" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">自由項目３(ClientField3)</th>
				<td><input name="ClientField3" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">摘要(Commodity)</th>
				<td><input name="Commodity" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">課金タイミング区分(AccountTimingKbn)</th>
				<td><input name="AccountTimingKbn" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">課金タイミング(AccountTiming)</th>
				<td><input name="AccountTiming" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">初回課金日(FirstAccountDate)</th>
				<td><input name="FirstAccountDate" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">決済結果戻しURL(RetURL)</th>
				<td><input name="RetURL" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">決済結果URL有効期限秒(PaymentTermSec)</th>
				<td><input name="PaymentTermSec" type="text" size="10" tabindex="11" class="num" /></td>
			</tr>
			<tr>
				<th scope="row">表示サービス名(ServiceName)</th>
				<td><input name="ServiceName" type="text" size="27" tabindex="11" /></td>
			</tr>
			<tr>
				<th scope="row">表示電話番号(ServiceTel)</th>
				<td><input name="ServiceTel" type="text" size="27" tabindex="11" /></td>
			</tr>
			</tbody>
		</table>
		<input name="submit" type="submit" value="実行"  tabindex="52" />
	</form>
	<?php
		}else{//送信結果の表示です
	?>
		<table>
			<caption>実行結果</caption>
			<tfoot>

			</tfoot>
			<tbody>
				<tr>
					<th scope="row">取引ID(AccessID)</th>
					<td><?php echo $output->getAccessID() ?></td>
				</tr>
				<tr>
					<th scope="row">取引パスワード(AccessPass)</th>
					<td><?php echo $output->getAccessPass() ?></td>
				</tr>
				<tr>
					<th scope="row">決済トークン(Token)</th>
					<td><?php echo $output->getToken() ?></td>
				</tr>
				<tr>
					<th scope="row">呼び出しURL(StartURL)</th>
					<td><?php echo $output->getStartURL() ?></td>
				</tr>
				<tr>
					<th scope="row">該当トークンの有効期限 YYYYMMDDHHMM(StartLimitDate)</th>
					<td><?php echo $output->getStartLimitDate() ?></td>
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