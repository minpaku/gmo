<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja-JP" xml:lang="ja-JP">
<head>
	<meta http-equiv="Content-Style-Type" content="text/css; charset=UTF-8" />	
	<link rel="stylesheet" href="style/pgcommon.css" charset="UTF-8" />
	<title>[DeleteAuOpenID]-PGマルチペイメントサービス－モジュールタイプ呼び出しサンプル</title>
</head>
<body>

<div id="header">
	<h1>auかんたん決済OpenID解除/モジュールタイプ(PHP) 呼び出しサンプル</h1>
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
					<th scope="row">サイトID(SiteID)</th>
					<td><?php echo $output->getSiteID() ?></td>
				</tr>
				<tr>
					<th scope="row">会員ID(MemberID)</th>
					<td><?php echo $output->getMemberID() ?></td>
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