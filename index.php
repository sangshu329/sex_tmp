<?php
include_once ("./include/init.php");
$hide_val = $_GET['hid_input'];
$biaoshi = "index.php";
$clientip=get_clientip();
empty($clientip)?$clientip="Unknown":'';
empty($_COOKIE['cl_ip'])?$cookienum=1:$cookienum=$_COOKIE['cl_ip'];
// print_r($_COOKIE);
if(empty($hide_val)){
	$hide_val=1;
}
if ($hide_val == 2) {
	setcookie("cl_ip",$cookienum+1,time()+1200);
	$link_man = $_GET ['link_man'];
	if (! empty ( $link_man )) {
		$phone = $_GET ['phone'];
		if(!empty($phone)){
			if (! preg_match ( "/1[3458]{1}\d{9}$/", $phone )) {
				showmessage ( "请输入正确手机号！" );
			}
		}else{
			showmessage ( "请输入手机号！" );
		}
		$address = $_GET ['address'];
		if(empty($address)){
			showmessage("请输入地址");
		}
		$qq = $_GET ['qq'];
		if(!empty($qq)){
			
		}
		$content = $_GET ['content'];
		if(empty($content)){
			showmessage("请输入内容！");
		}
		$content = addslashes_deep ( $content );
		$row = array (
				// 'name' => $name,
				'link_man' => $link_man,
				'phone' => $phone,
				'address' => $address,
				// 'email' => $email,
				'qq' => $qq,
				'ip_address' => $clientip,
				'content' => $content,
				'addtime' => time () 
		);
		$id = $db->insert ( $db_prefix . "message", $row );
		if($cookienum>=3){
			setcookie("clt_ip",$clientip,time()+1200);
		}
		if(!empty($_COOKIE['clt_ip'])){
			showmessage("请勿提交多次！");
		}
		if ($id) {
			showmessage ( "留言成功,我们将尽快回复您的留言！", $biaoshi );
		} else {
			showmessage ( "留言失败，请按要求填写留言！", $biaoshi );
		}
	}else{
		showmessage("请输入姓名！",$biaoshi);
	}
} elseif ( $hide_val != 2 && $hide_val != 1) {
	showmessage ( "非法提交",$biaoshi);
}
?>
<!DOCTYPE html>
<html lang="UTF-8">
<head>
	<meta charset="UTF-8">
	<title>留言板</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<div class="whole pr">
		<div class="left_nav pa">
<?php
	$pic_val=$db->getOne("select pic from ".$db_prefix."works where id=10");
?>		
			<div class="left_npic"><img src="<?=$pic_val;?>" height="561" width="196" alt=""></div>
		</div>
		<div class="right_nav pa">
			<div class="r_toppic">
				<img src="images/right_nav_pic01.jpg" height="41" width="382" alt="">
			</div>
			<div class="r_form">
				<form name="myform" action="index.php" method="get" onSubmit="return chkForm();">
					<ul>
						<li>
							<div class="mess_lil">姓名</div>
							<div class="mess_liinput">
								<input type="text" name="link_man" placeholder="您的真实姓名，请使用中文 ">
							</div>
							<div class="messli_bt"><span style="color:red;">*</span> 必填</div>
						</li>
						<li>
							<div class="mess_lil">手机</div>
							<div class="mess_liinput">
								<input type="text" name="phone" placeholder="为了便于和您联系,请务必填写正确的手机号码">
							</div>
							<div class="messli_bt"><span style="color:red;">*</span> 必填</div>
						</li>
						<li>
							<div class="mess_lil">地址</div>
							<div class="mess_liinput">
								<input type="text" name="address" placeholder="地址是与您联系的重要方式,保证资料邮递">
							</div>
							<div class="messli_bt"><span style="color:red;">*</span> 必填</div>
						</li>
						<li>
							<div class="mess_lil">QQ</div>
							<div class="mess_liinput">
								<input type="text" name="qq" placeholder="请正确填写QQ,以便给您发送相关资料">
							</div>
						</li>
						<li>
							<div class="mess_lil">留言</div>
							<div class="mess_liinput">
								<textarea name="content" id="cont" cols="20" rows="3" onfocus="" placeholder="您有哪些疑问？请在这里填写。"></textarea>
							</div>
						</li>
						<input type="hidden" name="hid_input" value="2">
						<li class="sub">
							<input type="submit" value="" style="border:0px;background:url(images/right_nav_pic04.jpg) no-repeat;width: 128px;height: 57px;">
							<div class="mess_reset" >
								<input type="reset" value="" style="border:0px;background:url(images/right_nav_pic05.jpg) no-repeat;width: 128px;height: 57px;">
							</div>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
	<script src="js/link.js"></script>
	<script src="js/ie8_add.js"></script>
</body>
</html>