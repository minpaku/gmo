<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja-JP" xml:lang="ja-JP">
<head>
	<meta http-equiv="Content-Style-Type" content="text/css; charset=UTF-8" />	
	<link rel="stylesheet" href="style/pgcommon.css" charset="UTF-8" />
	<title>[InquiryVirtualaccountTransfer]-PGマルチペイメントサービス−モジュールタイプ呼び出しサンプル</title>
</head>
<body>

<div id="header">
	<h1>銀行振込(バーチャル口座)専有口座入金履歴取得/モジュールタイプ(PHP) 呼び出しサンプル</h1>
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
				<td><input name="ShopPass" type="text" size="27" tabindex="12" /></td>
			</tr>
			<tr>
				<th scope="row">継続口座ID(ReserveID)</th>
				<td><input name="ReserveID" type="text" size="27" tabindex="13" /></td>
			</tr>
			<tr>
				<th scope="row">銀行コード(BankCode)</th>
				<td><input name="BankCode" type="text" size="27" tabindex="14" /></td>
			</tr>
			<tr>
				<th scope="row">支店コード(BranchCode)</th>
				<td><input name="BranchCode" type="text" size="27" tabindex="15" /></td>
			</tr>
			<tr>
				<th scope="row">科目(AccountType)</th>
				<td><input name="AccountType" type="text" size="27" tabindex="16" /></td>
			</tr>
			<tr>
				<th scope="row">口座番号(AccountNumber)</th>
				<td><input name="AccountNumber" type="text" size="27" tabindex="17" /></td>
			</tr>

			</tbody>
		</table>
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
					<th scope="row">CsvResponse(CsvResponse)</th>
					<td><pre><?php echo htmlspecialchars( mb_convert_encoding( $output->getCsvResponse() , PGCARD_SAMPLE_ENCODING , 'SJIS') ) ?></pre></td>
				</tr>

			</tbody>
		</table>
	<?php
		}//if( !isset ($_POST['submit']) )
	?>
</div>

<div id="footer">
	<em>Copyright (c) 2008 GMO Payment Gateway,Inc. All Rights Reserved.</em>
</div>

</body>
</html>