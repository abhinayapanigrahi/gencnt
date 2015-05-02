<iframe name="submitForm" id="submitForm"></iframe>
<div class="countryMgtWraper">
	<div class="countryMgt">
		<h2>Country Manager</h2>
		<div class="message"></div>
			<form id="formAddCountry" name="formAddCountry" action="bridges/countries/func_addEditCountries.php" method="post" target="submitForm">
				<div class="formRow">
					<label for="selectCountry">Country List</label>
				</div>			
				<div class="formRow">
					<select id="selectCountry" name="selectcountry" onchange="">		
					<option value="">Add New Country / Select to Update</option>	
					<?php  
					
					require_once("objectManagers/countryManager.php");
					require_once("process/countryMgt.php");
					
					$objCountryProc = new countriesProcessor();
					
					$resCountryList = $objCountryProc->getAllCountries($arrDBTaskManagement);
					$tempArr = array();
					while($objCountryList = mysql_fetch_object($resCountryList)){
					?>			
						<option value="<?php echo $objCountryList->country_id; ?>" value2="<?php echo $objCountryList->country_shortname; ?>"><?php echo $objCountryList->country; ?></option>
					<?php 	
					}
					?>
					</select>
					</div>		
					<div class="formRow">
						<label for="txtCountry">Country name : </label>
					</div>
					<div class="formRow">					
						<input type="text" name="addCountry" id="txtCountry" placeholder="Country name" />
					</div>
					<div class="formRow">
						<label for="txtCountryShortName">Country short name : </label>
					</div>
					<div class="formRow">	
						<input type="text" name="addCountryShortName" id="txtCountryShortName" placeholder="Country Short name"/>
					</div>
					<div class="formRow">
						<input type="hidden" id="formsubmit" name="formsubmit" value="1"/>
						<input type="submit" id="btnAddNewCountry" value="Add or Edit Country"/>
					</div>
	</form>
	</div>
</div>