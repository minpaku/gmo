<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja-JP" xml:lang="ja-JP">
<head>
	<meta http-equiv="Content-Style-Type" content="text/css; charset=UTF-8" />	
	<link rel="stylesheet" href="style/pgcommon.css" charset="UTF-8" />

	<title>[EntryExec]-PGマルチペイメントサービス－モジュールタイプ呼び出しサンプル</title>
</head>
<body>

<div id="header">
	<h1>取引登録・決済実行/モジュールタイプ(PHP) 呼び出しサンプル</h1>
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
					<th scope="row">オーダーID(OrderID)</th>
					<td><input name="OrderID" type="text" maxlength="27" size="27" tabindex="11" /></td>
				</tr>
				<tr>
					<th scope="row">処理区分(JobCd)</th>
					<td>
						<select name="JobCd" tabindex="12">
							<option value="AUTH">AUTH:仮売上</option>
							<option value="CHECK">CHECK:有効性チェック</option>
							<option value="CAPTURE">CAPTURE:即時売上</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row">商品コード(ItemCode)</th>
					<td><input name="ItemCode" type="text" maxlength="7" size="10" tabindex="13" /></td>
				</tr>
				<tr>
					<th scope="row">利用金額(Amount)</th>
					<td><input name="Amount" type="text" maxlength="8" size="10" tabindex="14" class="num" /></td>
				</tr>
				<tr>
					<th scope="row">税送料(Tax)</th>
					<td><input name="Tax" type="text" maxlength="7" size="10" tabindex="15" class="num" /></td>
				</tr>
				<tr>
					<th scope="row">3D利用(TdFlag)</th>
					<td>
						<label for="isSecure">
							<input name="TdFlag" type="radio" value="1" id="isSecure" tabindex="16" />利用する
						</label>
						<label for="isNotSecure">
							<input name="TdFlag" type="radio" value="0" id="isNotSecure" checked="checked" tabindex="17" />利用しない
						</label>
					</td>
				</tr>
				<tr>
					<th scope="row">3D認証画面店舗名(TdTenantName)</th>
					<td><input name="TdTenantName" type="text" tabindex="18" /></td>
				</tr>
				<tr>
					<th scope="row">加盟店自由項目１(ClientField1)</th>
					<td><input name="ClientField1" type="text" maxlength="100" tabindex="19" /> </td>
				</tr>
				<tr>
					<th scope="row">加盟店自由項目２(ClientField2)</th>
					<td><input name="ClientField2" type="text" maxlength="100" tabindex="20" /> </td>
				</tr>
				<tr>
					<th scope="row">加盟店自由項目３(ClientField3)</th>
					<td><input name="ClientField3" type="text" maxlength="100" tabindex="21" /> </td>
				</tr>
				<tr>
					<th scope="row">利用明細に記載される文言(DisplayInfo)</th>
					<td><input name="DisplayInfo" type="text" maxlength="100" tabindex="22" /> </td>
				</tr>
			</tbody>
		</table>
		<table>
			<tbody>
				<tr>
					<th scope="row">支払方法(PayMethod)</th>
					<td>
						<select name="PayMethod" tabindex="22">
							<option value="1">1:一括</option>
							<option value="2">2:分割</option>
							<option value="3">3:ボーナス一括</option>
							<option value="4">4:ボーナス分割</option>
							<option value="5">5:リボ</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row">支払回数(PayTimes)</th>
					<td><input name="PayTimes" type="text" maxlength="3" class="num" size="5" tabindex="23" /></td>
				</tr>
			</tbody>
		</table>
		
		<table>
			<caption>カード番号入力型決済の場合、この欄を入力</caption>		
			<tbody>
			<tr>
				<th scope="row">カード番号(CardNo)</th>
				<td><input name="CardNo" type="text" maxlength="16" size="20" tabindex="24"/></td>
			</tr>
			<tr>
				<th scope="row">カード有効期限YYMM(Expire)</th>
				<td><input name="Expire" type="text" maxlength="4" size="5" tabindex="25" /></td>
			</tr>
			<tr>
				<th scope="row">セキュリティコード(SecurityCode)</th>
				<td><input name="SecurityCode" type="text" maxlength="4" size="5" tabindex="26" /></td>
			</tr>
			</tbody>
		</table>
		
		<table>
			<caption>会員ID型決済の場合、この欄を入力</caption>
			<tbody>
				<tr>
					<th scope="row">会員ID(MemberID)</th>
					<td><input name="MemberID" type="text" maxlength="60" size="30" tabindex="27" /></td>
				</tr>
				<tr>
					<th scope="row">登録カード連番(CardSeq)</th>
					<td><input name="CardSeq" type="text" maxlength="1" class="num" size="5" tabindex="28" /></td>
				</tr>
			</tbody>
		</table>
		<input name="submit" type="submit" value="実行"  tabindex="29" />
	</form>
	<?php 
		}else{//送信結果の表示です
	?>
		<table>
			<caption>実行結果</caption>
			<tfoot>
				 <tr>
				 	<td colspan="2"><a href="TradedCard.php?<?php echo 'OrderID=' . $output->getOrderId() . '&MemberID=' . $memberId ; ?>" tabindex="25">今使ったカードを登録</a></td>
				 </tr>
			</tfoot>
			<tbody>
				<tr>
					<th scope="row">取引ID(AccessID)</th>
					<td><?php echo $output->getAccessId() ?></td>
				</tr>
				<tr>
					<th scope="row">取引PASS(AccessPass)</th>
					<td><?php echo $output->getAccessPass() ?></td>
				</tr>			
				<tr>
					<th scope="row">オーダーID(OrderID)</th>
					<td><?php echo $output->getOrderId() ?></td>
				</tr>
				<tr>
					<th scope="row">仕向先カード会社(Forward)</th>
					<td><?php echo $output->getForward() ?></td>
				</tr>
				<tr>
					<th scope="row">支払方法(Method)</th>
					<td><?php echo $output->getMethod() ?></td>
				</tr>
				<tr>
					<th scope="row">支払回数(PayTimes)</th>
					<td><?php echo $output->getPayTimes() ?></td>
				</tr>
				<tr>
					<th scope="row">承認番号(Approve)</th>
					<td><?php echo $output->getApprovalNo() ?></td>
				</tr>
				<tr>
					<th scope="row">トランザクションID(TranID)</th>
					<td><?php echo $output->getTranId() ?></td>
				</tr>
				<tr>
					<th scope="row">決済日付(TranDate)</th>
					<td><?php echo $output->getTranDate() ?></td>
				</tr>
				<tr>
					<th scope="row">チェック文字列(CheckString)</th>
					<td><?php echo $output->getCheckString() ?></td>
				</tr>
				<tr>
					<th scope="row">加盟店自由項目１(ClientField1)</th>
					<td><?php echo htmlspecialchars( mb_convert_encoding( $output->getClientField1() , PGCARD_SAMPLE_ENCODING , 'SJIS') ) ?></td>
				</tr>
				<tr>
					<th scope="row">加盟店自由項目２(ClientField2)</th>
					<td><?php echo htmlspecialchars( mb_convert_encoding( $output->getClientField2() , PGCARD_SAMPLE_ENCODING , 'SJIS') ) ?></td>
				</tr>
				<tr>
					<th scope="row">加盟店自由項目３(ClientField3)</th>
					<td><?php echo htmlspecialchars( mb_convert_encoding( $output->getClientField3() , PGCARD_SAMPLE_ENCODING , 'SJIS') ) ?></td>
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