<div class="left formInter">
			<iframe name="submitForm" id="submitForm"></iframe>
			<ul>
			<?php 
			$tmp="";
			if($_GET['msg'] == 'reg_error'){
				$tmp = 'regn';
			}else{
				$tmp = 'login';
			}			
			//echo $tmp;
			?>
				<li class="<?php echo ($tmp == 'login')?"active":""; ?>">
					<div class="blockHead" id="userLoginDiv">User Login</div>
				</li>
				<li class="<?php echo ($tmp == 'regn')?"active":""; ?>">
					<div class="blockHead" id="userRegistrtionDiv">New User</div>
				</li>
			</ul>
			<div class="blockDetail userLoginDiv active">
					<div class="formWraper">
					<fieldset>
					<h3>Login here</h3>
					<form name="loginUser" id="loginUser" action="bridges/userLogin/func_userLogin.php" method="post" >
						<div class="formRow"><label for="genUserName">User Name</label></div>
						<div class="formRow"><input type="text" name="genUserName" id="genUserName" maxlength="200"></div>
						<div class="formRow"><label for="genUserPass">Password</label></div>
						<div class="formRow"><input type="password" name="genUserPass" id="genUserPass" maxlength="200"></div>
						<div class="formRow"></div>								
						<div class="formRow">
							<a href="#forgot" id="forgotPass">Forgot Password</a> 
							<input type="hidden" name="formsubmit" id="formsubmit" value="1">									
							<input type="submit" name="genUserLogin" id="genUserLogin" value="Login" />
						</div>
						<div class="formRow"></div>
					</form>
					</fieldset>
					</div>
			</div>
			<div class="blockDetail userRegistrtionDiv" id="userRegistration">
					<div class="formWraper">
					<fieldset>
					<h3>Register Here</h3><label id="lblmsg" class="<?php echo ($tmp == 'regn')?"errormessage":"hidden"; ?>"><span>Please insert proper values</span></label>
					<form name="loginUser" id="loginUser" method="post" action="bridges/userLogin/func_new_registration.php" onsubmit="return regform_validation(this);" targe="submitForm" >
						<div class="formRow"><label for="genUserName">User Name</label></div>
						<div class="formRow"><input type="text" name="genUserName" id="genUserName" maxlength="200"></div>
					<div class="formRow userNameTips">NOTE : symbols : # / \ = > < ! & ( ) @ $</div>
						<div class="formRow"><label for="genUserPass">Password</label></div>
						<div class="formRow"><input type="password" name="genUserPass" id="genUserPass" maxlength="200"></div>
						<div class="formRow"><label for="genUserConfPass">Confirm Password</label></div>
						<div class="formRow"><input type="password" name="genUserConfPass" id="genUserConfPass" maxlength="200"></div>
						<div class="formRow"><label for="genUserPhone">Phone</label></div>
						<div class="formRow"><input type="text" name="genUserPhone" id="genUserPhone" maxlength="16"></div>
						<div class="formRow"><label for="genUserEmail">Email</label></div>
						<div class="formRow"><input type="text" name="genUserEmail" id="genUserEmail" maxlength="100"></div>
						<div class="formRow"></div>								
						<div class="formRow">
							<input type="hidden" name="formsubmit" id="formsubmit1" value="1">
							<input type="hidden" id="hdn_successSubmit" name="hdn_successSubmit" value="" />
							<input type="submit" name="genUserLogin" id="genUserLogin" value="Submit"/>
						</div>
						<div class="formRow"></div>
					</form>
					</fieldset>
					</div>
			</div>
					
		</div>
		<div class="right">
			<p class="font3"><span class="apost">"</span>Every body can be a Service Provider or Every body can be a Service User<span class="apost">"</span></p>
		</div>