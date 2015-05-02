<?php  

	require_once("objectManagers/languageManager.php");	
	require_once("process/languageMgt.php");

?>
<iframe name="submitForm" id="submitForm"></iframe>
<div class="stateMgtWraper">
	<div class="stateMgt">
		<h2>Language Manager</h2>
		<div class="message">
			<?php
			if(isset($_GET['msg']) && $_GET['msg'] !=""){
			?>
			<span>
				<?php echo "Language ".(($_GET['msg'] == 'u')?"updated":"added")." successfuly"; ?>
			</span>
			<?php
			}
			?>		
		</div>
			<form id="formAddLnguage" name="formAddLnguage" action="bridges/languages/func_addEditLanguages.php" method="post" onsubmit="return formLanguageValidate(this);">
				<div class="formRow">
					<label for="selectCountry">Language List</label>
				</div>
				<div class="formRow">
					<select id="selectLanguage" name="selectLanguage" onchange="">		
					<option value="" data-state="">Add New Language / Select to Update</option>	
					<?php  
										
					$objLangProc = new languageProcessor();

					$resLangList = $objLangProc->getAllLanguages($arrDBTaskManagement);
					while($objLangList = mysql_fetch_object($resLangList)){
					?>			
						<option value="<?php echo $objLangList->lid; ?>"><?php echo $objLangList->language; ?></option>
					<?php 	
					}
					?>
					</select>
					</div>		
					<div class="formRow">
						<label for="txtlanguage">Language : </label>
					</div>
					<div class="formRow">					
						<input type="text" name="txtlanguage" id="txtlanguage" placeholder="Enter Language" />
					</div>
					<div class="formRow">
						<input type="hidden" id="formsubmit" name="formsubmit" value="1"/>
						<input type="submit" id="btnAddEditLanguage" value="Add or Edit Language"/>
					</div>
	</form>
	</div>
</div>