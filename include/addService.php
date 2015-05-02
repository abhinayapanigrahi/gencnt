<div class="left formInter">
			<iframe name="submitForm" id="submitForm"></iframe>
			<ul>
				<li class="active">
					<div class="blockHead">User Login</div>
					<div class="blockDetail">
							<div class="formWraper">
							<fieldset>
							<h3>Login here</h3>
							<form name="loginUser" id="loginUser" action="bridges/userLogin/func_userLogin.php" method="post" target="#submitForm" >
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
				</li>
				<li>
					<div class="blockHead">New User</div>
					<div class="blockDetail">
							<div class="formWraper">
							<fieldset>
							<h3>Register Here</h3>
							<form name="loginUser" id="loginUser" method="post" target="#submitForm" >
								<div class="formRow"><label for="genUserName">User Name</label></div>
								<div class="formRow"><input type="text" name="genUserName" id="genUserName" maxlength="200"></div>
								<div class="formRow"><label for="genUserPass">Password</label></div>
								<div class="formRow"><input type="text" name="genUserPass" id="genUserPass" maxlength="200"></div>
								<div class="formRow"><label for="genUserConfPass">Confirm Password</label></div>
								<div class="formRow"><input type="text" name="genUserConfPass" id="genUserConfPass" maxlength="200"></div>
								<div class="formRow"><label for="genUserPhone">Phone</label></div>
								<div class="formRow"><input type="text" name="genUserPhone" id="genUserPhone" maxlength="200"></div>
								<div class="formRow"><label for="genUserEmail">Email</label></div>
								<div class="formRow"><input type="text" name="genUserEmail" id="genUserEmail" maxlength="200"></div>
								<div class="formRow"></div>								
								<div class="formRow">
									<input type="submit" name="genUserLogin" id="genUserLogin" value="Submit" />
								</div>
								<div class="formRow"></div>
							</form>
							</fieldset>
							</div>
					</div>			
				</li>
			</ul>
		</div>
		<div class="right">
			<p class="font3"><span class="apost">"</span>Every body Can be a service provider or Every body can be a service user<span class="apost">"</span></p>
		</div>