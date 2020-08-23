
				<div style="height:32px; display:block;"></div>
				<!--正中央-->
				<form method="post" >
					<p class="t botli">管理員登入區</p>
					<p class="cent">帳號 ： <input name="acc" id="acc" type="text"></p>
					<p class="cent">密碼 ： <input name="pw" id="pw" type="password"></p>
					<p class="cent"><button type="button" onclick="login()">送出</button><input type="reset" value="清除"></p>
				</form>

				<script>

					function login(){
						let acc = $("#acc").val();
						let pw = $("#pw").val();
						$.post("api/login.php",{acc,pw},function(res){
							if(res == "1"){
								location.href="admin.php";
							}else{
								alert("帳號或密碼輸入錯誤")
							}
						})
					}
				</script>
		

				