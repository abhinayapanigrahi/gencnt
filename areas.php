<iframe name="submitForm" id="submitForm"></iframe>

<div class="cityMgtWraper">

	<div class="cityMgt">
		<h2>City Manager</h2>
		<div class="message hidden"></div>
		<form id="formAddCity" name="formAddCity" action="bridges/city/func_addEditCities.php" method="post" target1="submitForm">
				<div class="formRow">
					<label for="selectCountry">Country List</label>
				</div>	
				<div class="formRow">			
					<select id="selectCountry" name="selectCountry" >		
					<option  value="" value2="" >--Select Country-- </option>	
					<?php  
					
					require_once("objectManagers/countryManager.php");
					require_once("process/countryMgt.php");
					
					$objCountryProc = new countriesProcessor();
					
					$resCountryList = $objCountryProc->getAllCountries($arrDBTaskManagement);
					$tempArr = array();
					$i=1;
					while($objCountryList = mysql_fetch_object($resCountryList)){
					?>			
					<option value="<?php echo $objCountryList->country_id; ?>" value2="<?php echo $objCountryList->country_shortname; ?>"><?php echo $objCountryList->country; ?></option>
					<?php 	
					$i++;
					}
					?>
					</select>			
				</div>
				<div class="formRow">
					<label for="selectState">State List</label>
				</div>	
				<div class="formRow">			
					<select id="selectState" name="selectState" >		
					<option  value="" value2="" >--Select State-- </option>	
					<?php  
					
					
					?>
					</select>			
				</div>
				<div class="formRow">
					<label for="selectCity">City List</label>
				</div>	
				<div class="formRow">			
					<select id="selectCity" name="selectCity" >		
					<option  value="" value2="" >--Select City-- </option>	
					<?php  
					
					
					?>
					</select>			
				</div>			
				<div  class="formRow">		
					<label for="txtStateName">City name : </label>
					<input type="text" name="txtCityName" id="txtCityName" placeholder="City name"/>
				</div>
				<div  class="formRow">
					<input type="hidden" id="formsubmit" name="formsubmit" value="1"/>
					<input type="submit" id="btnAddNewCity" value="Add or Edit City"/>
				</div>
		
		
			</form>
		</div>
	
</div>


