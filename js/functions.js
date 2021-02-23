
//articleid(変数)とarticleclick(配列)を比較して有無を判別
function arrayLoop(articleid,articleclick){
			for(var j = 0; 5 >= j; j++){
				var clickdata = articleclick[j];
				if(clickdata == articleid){
					flag = "クリック済み";
					clickend(flag);
				};
			};
		};
		
		//コンソールログに出力するだけ
		function clickend(flag){	
			console.log(flag);
		};