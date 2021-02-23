<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>サンプルテンプレート</title>
    <meta name="description" content="サンプルテンプレート">
    <meta name="keywords" content="レストラン,フレンチ,原宿">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/common.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<style type="text/css" media="screen">
	.profBox{
		border:1px solid #ededed;
		padding:25px;
		width:94%;
		max-width:680px;
		margin-left:auto;
		margin-right:auto;
		margin-top:50px;
		margin-bottom:50px;
		box-sizing: border-box;
	}
	
	.profBox h1{
		background:#f2f2f2;
		padding:15px;
		margin-bottom:20px;
		margin-top:0px;
		font-size:1.1em;
	}
	
	.profBox dl dt{
		border-bottom:1px solid #ededed;
		padding-bottom:10px;
		margin-bottom:15px;
		font-weight:bold;
	}
	
	.profBox dl dd{
		margin-bottom:25px;	
		margin-left:0px;
	}
	
	.inputText{
		width:100%;
		padding:10px!important;
		font-size:1.1em;
		box-sizing: border-box;
	}
	
	.select_form {
		width: 100%;
		text-align: center;
	}
	
	.select_form select {
		font-size:1.1em;
		width: 100%;
		padding-right: 1em;
		cursor: pointer;
		border: none;
		background:#fff;
		box-shadow: none;
		-webkit-appearance: none;
		appearance: none;
	}
	
	.select_form.select_form_inner {
		position: relative;
		border: 1px solid #c0c0c0;
		border-radius: 2px;
		background: #ffffff;
	}
	.select_form.select_form_inner:before {
		content: "";
		display:block;
		position: absolute;
		top: 0.8em;
		right: 0.9em;
		width:10px;
		height:10px;
		border-left: 1px solid #c0c0c0;
		border-bottom: 1px solid #c0c0c0;
		pointer-events: none;
		transform: rotate(-45deg);
		margin-top:-3px;
	}
	.select_form.select_form_inner select {
		padding: 8px 38px 8px 8px;
		color: #c0c0c0;
	}
	
	.textboxdata{
		border: 1px solid #c0c0c0;
		width:100%;
		height:150px;
		padding:15px;
		font-size:1.1em;
		box-sizing: border-box;
	}
	
	.btnStyle1{
		background:#000;
		color:#fff;
		width:250px;
		display:block;
		margin-left:auto;
		margin-right:auto;
		font-size:1em;
		padding:15px;
		border:none;
		border-radius: 5px;
	}
	.erroebox{
		color:#d91313;
		padding-top:10px;
	}
	.delatearea{
		position: absolute;
		left: -9999px;
	}
	.mgb10px{
		margin-bottom:10px;
	}
	</style>
</head>
<body>
	
	<div class="profBox" id="formarea">
		
		<h1>メールフォーム</h1>
		
		<dl>
			<dt>メールアドレス※</dt>
			<dd>
				<div>
					<input type="text" name="mailarea"  placeholder="info@startout.work" class="inputText mailarea" />
					<!--入力を確認する際は、下記に入力内容が表示されます-->
					<div class="mailareaConfirmation"></div>
					<!--ミスがあった際は、下記にエラーが表示されます-->
					<div class="missmailbox"></div>
				</div>
			</dd>
		</dl>
		<dl>
			<dt>お名前※</dt>
			<dd>
				<div>
					<input type="text" name="namedata"  placeholder="例) 佐々木 太郎" class="inputText namearea" />
					<div class="namedataConfirmation"></div>
					<div class="missnamebox"></div>
				</div>
			</dd>
		</dl>
		<dl>
			<dt>備考</dt>
			<dd>
				<div>
					<textarea name="textboxdata" class="textboxdata textboxarea"></textarea>
					<div class="textboxdataConfirmation"></div>
				</div>
			</dd>
		</dl>
		
		<!--入力時にはこちらのボタンが表示されます。-->
		<div class="makesurebox">
			<button class="btnStyle1 submitarea">確認</button>
		</div>	
		
		<!--確認時にはこちらのボタンが表示されます。最初はクラスdelateareaで非表示に。-->
		<div class="delatearea backandsendbox">
			<button class="btnStyle1 backBtnArea mgb10px">戻る</button>
			<button class="btnStyle1 sendBtnArea">送信</button>
		</div>
		
	</div>
	

	<script>
		
		//ミスのチェックをするための変数です。
		//true = ミスがある false = ミスがない
		//入力内容確認画面に変更時、どっちもfalseだったら変更する。
		//letはvarのような変数を定義する記述ですが、varより呼び出せる場所が限られます。
		let mailmiss = "true";
		let namemiss = "true";
		
		//フォームで入力した内容を入れておく箱です。
		let mailarea = "";
		let namearea = "";
		let textboxarea = "";
		
		//確認ボタンを押した時の処理です。
		$(".submitarea").click(function(){
			
			//エラーメッセージを一旦削除
			$(".missmailbox").text("");
			$(".missnamebox").text("");
			
			//エラーの確認変数を一旦trueにリセット
			mailmiss = "true";
			namemiss = "true";
			
			//それぞれの入力内容を変数に格納。
			mailarea = $("input[name='mailarea']").val();
			namearea = $("input[name='namedata']").val();
			textboxarea = $("textarea[name='textboxdata']").val();
			
			//入力内容にエラーがないかを確認するバリデーションチェックです。
			if(!mailarea){
				//もし、mailareaに何も入っていなかったら、下記のメッセージがmissmailboxに入ります。
				$(".missmailbox").text("メールアドレスが入力されていません。");	
			}else if(mailarea.match(/.+@.+\..+/)==null){
				//もし、mailareaに入力された内容がメールアドレスじゃなければ、下記のメッセージ。
				//「/.+@.+\..+/」は正規表現と言われ、これでメールアドレスの形を確認しています。
				$(".missmailbox").text("メールアドレスの形式が間違っています。");
			}else{
				//もし、特にミスがなければ、falseになります。
				//確認項目がすべてfalseの場合にのみ、メールが送信されます。
				mailmiss = "false";
			};
			
			if(!namearea){
				//もし、namedataに何も入っていなかったら、下記のメッセージがnamemissに入ります。
				$(".missnamebox").text("お名前が入力されていません。");	
			}else{
				//もし、特にミスがなければ、falseになります。
				//確認項目がすべてfalseの場合にのみ、メールが送信されます。
				namemiss = "false";
			};
			
			//名前にもメールにもエラーがない場合、確認画面に変化させます。
			if(mailmiss == "false" && namemiss == "false"){
				
				//各内容確認エリアに入力内容を挿入。
				$(".mailareaConfirmation").text(mailarea);
				$(".namedataConfirmation").text(namearea);
				$(".textboxdataConfirmation").text(textboxarea);	
				
				//フォーム類と確認ボタンを一旦削除。
				//deleteareaは要素を消すためのCSS。
				//CSSの内容は直接CSSを確認してください。
				$(".mailarea").addClass("delatearea");
				$(".namearea").addClass("delatearea");
				$(".textboxdata").addClass("delatearea");
				$(".makesurebox").addClass("delatearea");
				
				//戻る&送信ボタンを表示。
				$(".backandsendbox").removeClass("delatearea");
				
			};
			
		});
		
		//戻るボタンをクリックした時の処理です。
		$(".backBtnArea").click(function(){
			
			//各内容確認エリアの入力内容を一旦削除。
			$(".mailareaConfirmation").text("");
			$(".namedataConfirmation").text("");
			$(".textboxdataConfirmation").text("");
			
			//クラスdelateareaを解除してフォーム類を表示。
			$(".mailarea").removeClass("delatearea");
			$(".namearea").removeClass("delatearea");
			$(".textboxdata").removeClass("delatearea");
			$(".makesurebox").removeClass("delatearea");
			
			//戻る&送信ボタンを消す。
			$(".backandsendbox").addClass("delatearea");
			
		});
		
		
		//送信ボタンをクリックした時の処理です。
		$(".sendBtnArea").click(function(){
			
			//ajaxを使ってPHPにデータを送信します。
			//メールはPHPなどのバックエンド側の言語でしか送れません。
			//よって、jsからPHPにデータを渡す必要があります。
			//下記はデータをPHPに投げる時の1セットだと思ってください。
			$.ajax({
				type: 'POST',
				dataType:'json',
				//こちらでデータをmail.phpに投げます。
				url:'functions/mail.php',
				data:{
					//入力データを送信します。
					//ひとまず、左右どちらも入力内容が入った変数名で統一してください。
					mailarea:mailarea,
					namearea:namearea,
					textboxarea:textboxarea,
				},
				success:function(data) {
					//成功したらPHPから返された値がdataから取得できます。
					//今回は、送信完了メッセージが入っています。
					//詳しくはPHPファイルを確認してみてください。
					//alertで送信完了メッセージを出します。
					alert(data)
					//フォームのトップページにリダイレクトします。
					location.href = "./";
				},
				error:function(XMLHttpRequest, textStatus, errorThrown) {
					//何かエラーが起きたらalertでエラーを表示させます。
					alert(errorThrown);
				}
			});
			
		});
		
	</script>
	
	
	
	
	
</body>
</html>