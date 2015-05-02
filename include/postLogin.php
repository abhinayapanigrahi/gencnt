<?php
require_once("process/authenticationMgt.php");
$auth=new authenticationProcessor();

if($auth->isNewRegistration()){
?>
<div class="dashBlocks requestPendings">
	<h4 class="message"><span>Congrats you registered successfully.</span></h4>		
</div>
<?php
}else{
?>
<h2>Your Dash Board</h2>
<iframe name="submitForm" id="submitForm"></iframe>
<div class="message"></div>
<div class="leftBlock">
	<div class="searchBox">
		<div class="searchCriterias">
			
		</div>
		<div class="searchList">
		
		</div>
	</div>
	<div class="searchResult"></div>
</div>
<div class="leftBlock">
	<div class="dashBlocks hiredServices">
		<h3>Manage Served Jobs</h3>	
	</div>
	<div class="dashBlocks serviceFeedback">
		<h3>All Service Feedbacks</h3>		
	</div>
	<div class="dashBlocks requestPendings">
		<h3>Pending Request For Service</h3>
	</div>
	<div class="dashBlocks ratings">
		<h3>Give rating to Services</h3>	
	</div>
</div>
<div class="hidden">
<?php
}
require_once("bridges/services/func_getAllServiceStausList.php");
?>
<script>
	var countryJSON = <?php require_once("bridges/countries/func_getAllCountries.php"); ?>;
	var servicesJSON = <?php require_once("bridges/services/func_getAllService.php"); ?>;
</script>
</div>
<script id="tmpl_serviceFeedbackStaut" type="text/x-jquery-tmpl">
{{if serviceStatusList.length > 0}}
	<ul>
		{{each($key,$val) serviceStatusList}}
			{{if $val.deal_comment == ""}}
				<li>
					<div class="cnt">{{= $key+1 }}</div>
					<div class="srvsName">{{= $val.service_name }}</div>
					<div class="srvsDt">{{= $val.requstedOn }}</div>
					<div class="givRating"><a href="#rating" lnkData="{{= $val.deal_id}}" title="rate this service" class="comentThisService">Give Feedback</a></div>									
				</li>
			{{/if}}
		{{/each}}	
	</ul>
{{/if}}
</script>
<script id="tmpl_serviceRatingStaut" type="text/x-jquery-tmpl">
{{if serviceStatusList.length > 0}}
	<ul>
		{{each($key,$val) serviceStatusList}}
			{{if $val.avgRating == 0}}
				<li>
					<div class="cnt">{{= $key+1 }}</div>
					<div class="srvsName">{{= $val.service_name }}</div>
					<div class="srvsName">{{= $val.avgRating }}</div>					
					<div class="srvsDt">{{= $val.requstedOn }}</div>
					<div class="givRating"><span class="rateBg"></span><a href="#rating" lnkData="{{= $val.deal_id}}|{{= $val.ps_id}}" title="rate this service" class="rateThisService"><img src="images/ratings.png" width="100" height="19" border="0" /></a></div>				
				</li>
			{{/if}}
		{{/each}}	
	</ul>
{{/if}}
</script>
<script id="tmpl_serviceRequestList" type="text/x-jquery-tmpl">
{{if serviceRequestList.length > 0}}
	<ul>
		{{each($key,$val) serviceRequestList}}
			{{if $val.deal_status == 0}}
				<li>
					<div class="cnt">{{= $key+1 }}</div>
					<div class="srvsName">{{= $val.service_name }}</div>
					<div class="requestBy">{{= $val.fullname }}</div>					
					<div class="srvsDt">{{= $val.requstedOn }}</div>
				</li>
			{{/if}}
		{{/each}}	
	</ul>
{{/if}}
</script>
<script id="tmpl_serviceRatngOverlay" type="text/x-jquery-tmpl">
<div class="overlay" style="{{= ovrlaystyle }}">
	<div id="overlayContent">
		<div id="raingOvelay">
			<h2 class="overlayTitle">Give Your Feedback</h2>
			<form name="frm_ratingSubmit" id="frm_ratingSubmit" action="bridges/services/func_addServiceFeedback.php" method="post" target="submitForm">
				<table border="0" cellspacing="0" cellpadding="0" class="tbl_rating" id="tbl_rating">
				  <tr>
					<td>Skill</td>
					<td>&nbsp;</td>
					<td>
						<label><input type="radio" name="rate_skill" value="-2" id="rate_skill_1" /> - -1</label>
						<label><input type="radio" name="rate_skill" value="-1" id="rate_skill_2" /> -1</label>
						<label><input type="radio" name="rate_skill" value="0" id="rate_skill_3" />0</label>
						<label><input type="radio" name="rate_skill" value="1" id="rate_skill_4" /> +1</label>
						<label><input type="radio" name="rate_skill" value="2" id="rate_skill_5" /> + +1 	</label>
					</td>
				  </tr>
				  <tr>
					<td>Behavior</td>
					<td>&nbsp;</td>
					<td>
						<label><input type="radio" name="rate_behve" value="-2" id="rate_behve_1" /> - -1</label>
						<label><input type="radio" name="rate_behve" value="-1" id="rate_behve_2" /> -1</label>
						<label><input type="radio" name="rate_behve" value="0" id="rate_behve_3" />0</label>
						<label><input type="radio" name="rate_behve" value="1" id="rate_behve_4" /> +1</label>
						<label><input type="radio" name="rate_behve" value="2" id="rate_behve_5" /> + +1 	</label>
					</td>
				  </tr>
				  <tr>
					<td>Overall Work</td>
					<td></td>
					<td>
						<label><input type="radio" name="rate_overall" value="-2" id="rate_overall_1" /> - -1</label>
						<label><input type="radio" name="rate_overall" value="-1" id="rate_overall_2" /> -1</label>
						<label><input type="radio" name="rate_overall" value="0" id="rate_overall_3" />0</label>
						<label><input type="radio" name="rate_overall" value="1" id="rate_overall_4" /> +1</label>
						<label><input type="radio" name="rate_overall" value="2" id="rate_overall_5" /> + +1 	</label>
					</td>
				  </tr>
				  <tr>
					<td><label for="rate_comment">Comment</label></td>
					<td>&nbsp;</td>
					<td><textarea name="rate_comment" id="rate_comment" cols="35" rows="5" ></textarea></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<input type="hidden" name="formsubmit" id="formsubmit" value="1" />
						<input type="hidden" name="psID" id="psID" value="{{= psID }}">
						<input type="hidden" name="dealID" id="dealID" value="{{= dealID }}">
						<input type="submit" name="ratingSubmit" id="ratingSubmit" class="customBtn" value="SUBMIT RATING" />
					</td>
				  </tr>
				</table>
			</form>
			<a href="#close" title="close overlay" id="close">X</a>
		</div>
	</div>
</div>
<div class="overlayCurtain"></div>	
</script>
<script id="tmpl_serviceCommentOverlay" type="text/x-jquery-tmpl">
<div class="overlay" style="{{= ovrlaystyle }}">
	<div id="overlayContent">
		<div id="raingOvelay">
			<h2 class="overlayTitle">Give Your Feedback</h2>
			<form name="frm_ratingSubmit" id="frm_ratingSubmit" action="bridges/services/func_addServiceFeedback.php?commentOnly=true" method="post" target="submitForm">
				<table border="0" cellspacing="0" cellpadding="0" class="tbl_rating" id="tbl_rating">
				  <tr>
					<td><label for="rate_comment">Comment</label></td>
					<td>&nbsp;</td>
					<td><textarea name="rate_comment" id="rate_comment" cols="35" rows="5" ></textarea></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<input type="hidden" name="formsubmit" id="formsubmit" value="1" />
						<input type="hidden" name="dealID" id="dealID" value="{{= dealID }}">
						<input type="submit" name="ratingSubmit" id="ratingSubmit" class="customBtn" value="SUBMIT FEEDBACK" />
					</td>
				  </tr>
				</table>
			</form>
			<a href="#close" title="close overlay" id="close">X</a>
		</div>
	</div>
</div>
<div class="overlayCurtain"></div>	
</script>
<script id="tmpl_searchCriteria" type="text/x-jquery-tmpl">
	<h3>Search</h3>
	<form name="searchService" id="searchService" action="" method="post" target="submitForm">
	<div class="frow">
		<label for="">Select Country</label>
		<select name="srchCountry" id="srchCountry" class="countryList">
			<option value="">Select Country</option>
		</select>
	</div>
	<div class="frow">
		<label>Select State</label>
		<select name="srchState" id="srchState" class="stateList">
			<option value="">Select State</option>
		</select>
	</div>
	<div class="frow">
		<label>Select City</label>
		<select name="srchCity" id="srchCity" class="cityList">
			<option value="">Select City</option>
		</select>
	</div>
	<div class="frow">
		<label>Area</label>
		<input type="text" name="srchState" id="srchState" maxlength="50" />
	</div>	
	<div class="frow">
		<label>Select Service</label>
		<select name="selService" id="selService" class="serviceList">
			<option value="">Select Service</option>
		</select>
	</div>	
	<div class="frow">
		<input type="submit" name="btnSearchService" id="btnSearchService" value="Serch" />
	</div>	
	</form>

</script>