<?php  

	require_once("objectManagers/countryManager.php");	
	require_once("objectManagers/stateManager.php");
	require_once("process/countryMgt.php");
	require_once("process/stateMgt.php");

?>
<iframe name="submitForm" id="submitForm"></iframe>
<div class="stateMgtWraper">
	<div class="stateMgt">
		<h2>State Manager</h2>
		<div class="message">
			<?php
			if(isset($_GET['msg']) && $_GET['msg'] !=""){
			?>
			<span>
				<?php echo "State ".(($_GET['msg'] == 'u')?"updated":"added")." successfuly"; ?>
			</span>
			<?php
			}
			?>		
		</div>
			<form id="formAddState" name="formAddState" action="bridges/states/func_addEditStates.php" method="post" onsubmit="return formStateValidate(this);">
				<div class="formRow">
					<label for="selectCountry">Country List</label>
				</div>
				<div class="formRow">
					<select id="selectCountry" name="selectcountry" onchange="">		
					<option value="">Select Country</option>	
					<?php  
										
					$objCountryProc = new countriesProcessor();
					$arrayCountryList = array();
					$resCountryList = $objCountryProc->getAllCountries($arrDBTaskManagement);
					while($objCountryList = mysql_fetch_object($resCountryList)){
					array_push($arrayCountryList,array("country_id"=>$objCountryList->country_id,"country"=>$objCountryList->country));
					?>			
						<option value="<?php echo $objCountryList->country_id; ?>"><?php echo $objCountryList->country; ?></option>
					<?php 	
					}
					?>
					</select>
					</div>		
				<div class="formRow">
					<label for="selectCountry">State List</label>
				</div>			
				<div class="formRow">
					<select id="selectState" name="selectState" onchange="">		
					<option value="" data-state="">Add New State / Select to Update</option>	
					</select>
					</div>
					<div class="formRow">
						<label for="txtCountry">State name : </label>
					</div>
					<div class="formRow">					
						<input type="text" name="stateName" id="stateName" placeholder="State Name" />
					</div>
					<div class="formRow">
						<input type="hidden" id="formsubmit" name="formsubmit" value="1"/>
						<input type="submit" id="btnAddNewCountry" value="Add or Edit Country"/>
					</div>
	</form>
	</div>
	<?php
		$objState = new statesProcessor();
		$arrDBTaskManagement["getArr"] = 1;
		$arrayState = $objState->getAllStates($arrDBTaskManagement);
		
		
		$arrStateCountryJSON = array("countryList"=>$arrayCountryList,"stateList"=>$arrayState);
	?>
	<div class="hidden"><script>
		var stateListJSON = <?php echo json_encode($arrStateCountryJSON); ?>;
		console.log(stateListJSON);
		
	</script></div>
</div>