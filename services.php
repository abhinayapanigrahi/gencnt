<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Genuine Connect : Services</title>
<?php include("include/header_include.php"); 
				
				include("process/authenticationMgt.php");
				include("process/servicesMgt.php");
				
				$objAuth = new authenticationProcessor();
				if(!$objAuth->isLogedIn()){
					header("Location: bridges/userLogin/func_logOut.php");
				}
		?>
</head>

<body>
<div class="Container">
	<div class="header">
		<?php include("include/header.php"); ?>
	</div>
	<div class="middle services">
		<div class="left formInter">
			<iframe name="submitForm" id="submitForm"></iframe>
			<ul>
				<li class="active">
					<div class="blockHead" id="searchServices">Wanted Service</div>
				</li>
				<?php
				if(isset($_REQUEST['open']) && $_REQUEST['open'] == 'ps'){
					?>
						<li class="active">
					<?php
				}else{
					?>
						<li>					
					<?php
				}
				?>
					<div class="blockHead" id="postService">Post Service</div>			
				</li>
				<?php
				if(isset($_COOKIE['designation']) && $_COOKIE['designation'] == 1){
				?>
				<li>
					<div class="blockHead" id="addservice">Add Service</div>
								
				</li>
				<?php
				}
				?>
			</ul>
			<div class="blockDetail searchServices active">
							<div class="formWraper">
							<fieldset>
							<h2><label for="searchSevices">Search Service</label></h2>
							<div class="wantedServices">
								<form name="servicesSearch" id="servicesSearch" action="bridges/services/func_searchServices.php" method="post" target="submitForm" >
								<div class="formRow">
									<input type="text" name="searchSevices" id="searchSevices" autocomplete="off" />
								</div>
								<div class="formRow btnContainer">
									<input type="hidden" name="isSearched" id="isSearched" value="1" />
									<input type="submit" name="searchBtn" id="searchBtn" value="SEARCH" />
								</div>
								<div class="searchResults" id="searchResults">
									<div class="higheredList message"></div>
									<div class="searchedList">
										<h2>Searched List</h2>
										<div id="serviceSearchResult">

										</div>
										<div class="clearall"></div>
									</div>
								</div>
								</form>
							</div>
							</fieldset>
							</div>
							<div class="hidden"><textarea cols="0" rows="0" id="searchServiceData"></textarea>
							<script id="tmpl_serviceSearchResult" type="text/x-jquery-tmpl">
							{{if searchServices.length > 0}}
								<table cellpadding="0" cellspacing="0" name="searchTable" id="searchTable" class="clearall searchTable">
									<tr>
										<th class="sName">Name</th>
										<th class="sPrice">Price</th>
										<th class="sRatings">Ratings</th>
										<th class="servedNum">Served</th>
										<th class="sAction"><span class="screen-reader-only">Action</span></th>												
									</tr>
									{{each(key,val) searchServices }}
										{{if key%2 == 0}}
											<tr class="evn">
										{{else}}
											<tr class="odd">										
										{{/if}}
										
										<td class="sName">{{= val.service_name}}
											<div class="tooltip">
												{{= val.service_desc}},
												{{= val.servicetime}},
												{{= val.serviceunit}}
												<span class="close"></span>
											</div>
										</td>
										<td class="sPrice">{{= val.price}}</td>
										<td class="sRatings">
										<div class="ratings">
											<span class="rateBg" style="width:{{if (val.ratings == null ) }}0{{else}}{{= val.ratings}}{{/if}}%;"></span><img src="images/ratings.png" class="rateThisService" width="100" height="19" border="0" />
										</div>
										</td>
										<td class="servedNum">{{= val.served}}</td>
										<td class="sAction"><a href="bridges/services/getServiceProviderDetails.php?psid={{= val.ps_id}}">Hire <span class="screen-reader-only">Name</span></a></td>												
									</tr>
									{{/each}}				
								</table>
								{{else}}
								<div class="noData">No Data available for your Search</div>
								{{/if}}
							</script>
							<script id="tmpl_hireTemplate" type="text/x-jquery-tmpl">
								<div class="overlay">
									<div id="overlayContent">
										<h2 class="overlayTitle">Please Confirm if you get a Deal</h2>
										<div class="contactDetail">
											<p class="phone_number"><span>Name : </span>{{= fullname}}</p>
											<p class="phone_number"><span>Phone : </span>{{= phone}}</p>
											<p class="email"><span>Email : </span>{{= email}}</p>										
										</div>
										<div class="buttonContaciner formRow">
											<form name="confirmHire" id="confirmHire" method="post" action="bridges/services/func_manageHireService.php" target="submitForm" >
												<input type="hidden" name="hdn_psid" id="hdn_psid" value="{{= ps_id}}" />
												<input type="hidden" name="isSubmit" id="isSubmit" value="1" />
												<input type="button" name="cancelDeal" id="cancelDeal" value="Cancel" title="Cancel deal" class="btn customBtn" />
												<button name="confirmDeal" id="confirmDeal"  value="canceled" title="confirm deal" class="btn customBtn">Confirm</button>											
											</form>
										</div>
									</div>
									<a href="#close" title="close overlay" id="close">X</a>
								</div>
								<div class="overlayCurtain"></div>
							</script>
							</div>
					</div>
					<div class="blockDetail postService">
							<div class="formWraper">
							<div class="formRow message"></div>
							<fieldset>
							<h2>Post a Service Here</h2>
							<form name="postService" id="postService" method="post" action="bridges/services/func_managePostServiceList.php" target="submitForm" >
								<div class="postSevviceWraper">
									<div class="leftCol">
									<h4>List of Services</h4>
									<div class="serviceList">

									</div>
									</div>
									<div class="rightCol">

									</div>
								</div>
								<div class="clearall buttonContainer">
									<input type="button" name="addServicetoList" id="addServicetoList" value="Add to Post List" title="Add selected services to List" />
									
									<input type="submit" name="sbmtPostService" id="sbmtPostService" value="Post Service" />																		
									
									<input type="button" name="canccelAction" id="canccelAction" value="Cancel" title="Cancel Post Service" />									
								</div>								
							</form>
							</fieldset>
							</div>
							<?php
							$objervices = new servicesProcessor();
							$arrPostedServices = $objervices->getUserPostedServices("",$arrDBTaskManagement);
							?>
							<div class="hidden">
							<script id="tmpl_nonPostedServicesList" type="text/x-jquery-tmpl">
							{{if postedServices}}
								<ul>
									{{each($key3, val3) postedServices}}
										{{if val3.service_id == null}}
									<li>
										<div class="chkBoxContnr">
											<input type="checkbox" name="servicesList" id="servicesList{{= val3.serviceID}}" value="{{= val3.serviceID}}" />
										</div>
										<div class="Services">
											<label  id="labelID{{= val3.serviceID}}" for="servicesList{{= val3.serviceID}}">{{= val3.service_name}}</label>
											<span class="hidden" id="serviceDetails{{= val3.serviceID}}">{{= val3.service_desc}}</span>
										</div>
									</li>
									{{/if}}
								{{/each}}	
								</ul>
								{{else}}
									<p class="noData">No Services yet</p>
								{{/if}}
							</script>
							<script id="tmpl_postedServicesList" type="text/x-jquery-tmpl">
							<div class="sserviceLocationWraper">
								
							</div>
							{{if postedServices}}
								<table name="postServiceList" id="postServiceList" class="postServiceList" cellpadding="0" cellspacing="0">
									<tr>
										<th class="tdservice">Service</th>
										<th class="tdprice">Price(Rs)</th>
										<th class="tdsunit">Service Unit</th>
										<th class="tdtime">Time</th>
										<th class="tdcoment">Comments</th>
										<th><span class="screen-reader-only">Action</span></th>
									</tr>
									{{each($key2, val2) postedServices}}
										{{if val2.service_id}}
									<tr>
										<td class="tdservice">
										<input type="checkbox" name="psID[]" value="{{= val2.ps_id}}" class="hidden" checked="checked" />
										<input type="checkbox" name="sID[]" value="{{= val2.serviceID}}" checked="checked" />
										{{= val2.service_name}}<span class="hidden serviceDetails">{{= val2.service_desc}}</span></td>
										<td class="tdprice">
											<label class="screen-reader-only" for="servicePrice{{= val2.serviceID}}">Enter Sevice Price</label>
											<input type="text" name="servicePrice[]" id="servicePrice{{= val2.serviceID}}" maxlength="10" value="{{= val2.price}}" /></td>
										<td class="tdsunit">
											<label class="screen-reader-only" for="serviceUnit{{= val2.serviceID}}">Enter Sevice Unit per Price</label>
											<input type="text" name="serviceUnit[]" id="serviceUnit{{= val2.serviceID}}" maxlength="100" value="{{= val2.serviceunit}}" /></td>
										<td class="tdtime">
											<label class="screen-reader-only" for="serviceTime{{= val2.serviceID}}">Enter Time taken for Service</label>
											<input type="text" name="serviceTime[]" id="serviceTime{{= val2.serviceID}}" maxlength="50" value="{{= val2.servicetime}}" />
										</td>
										<td class="tdcoment">
											<label class="screen-reader-only" for="serviceComment{{= val2.serviceID}}">Enter Service Comment</label>
											<input type="text" name="serviceComment[]" id="serviceComment{{= val2.serviceID}}" maxlength="250" value="{{= val2.comments}}" />
										</td>
										<td><div class="activity">
										{{if val2.service_status == 1}}
										<a href="#disable" class="disbaleService enable" btnVal = "{{= val2.ps_id}}" title="disable {{= val2.service_name}}"></a>
										{{else}}
										<a href="#enable" class="disbaleService disable" btnVal = "{{= val2.ps_id}}" title="enable {{= val2.service_name}}"></a>										
										{{/if}}
										</div></td>																																																
									</tr>
									{{/if}}
									{{/each}}											
								</table>
								{{else}}
								<p class="noData">You have not posted any Services yet</p>
								{{/if}}
							</script>
							<script id="tmpl_addNewServicesList" type="text/x-jquery-tmpl">
							{{if postedServices}}
									{{each($key2, val2) postedServices}}
									<tr>
										<td class="tdservice">
										<input type="checkbox" name="psID[]" value="{{= val2.ps_id}}" class="hidden" />
										<input type="checkbox" name="sID[]" value="{{= val2.serviceID}}" checked="checked" />
										{{= val2.service_name}}<span class="hidden serviceDetails">{{= val2.service_desc}}</span></td>
										<td class="tdprice">
											<label class="screen-reader-only" for="servicePrice{{= val2.serviceID}}">Enter Sevice Price</label>
											<input type="text" name="servicePrice[]" id="servicePrice{{= val2.serviceID}}" maxlength="10" value="{{= val2.price}}" /></td>
										<td class="tdsunit">
											<label class="screen-reader-only" for="serviceUnit{{= val2.serviceID}}">Enter Sevice Unit per Price</label>
											<input type="text" name="serviceUnit[]" id="serviceUnit{{= val2.serviceID}}" maxlength="100" value="{{= val2.serviceunit}}" /></td>
										<td class="tdtime">
											<label class="screen-reader-only" for="serviceTime{{= val2.serviceID}}">Enter Time taken for Service</label>
											<input type="text" name="serviceTime[]" id="serviceTime{{= val2.serviceID}}" maxlength="50" value="{{= val2.servicetime}}" />
										</td>
										<td class="tdcoment">
											<label class="screen-reader-only" for="serviceComment{{= val2.serviceID}}">Enter Service Comment</label>
											<input type="text" name="serviceComment[]" id="serviceComment{{= val2.serviceID}}" maxlength="250" value="{{= val2.comments}}" />
										</td>
										<td></td>																																																										
									</tr>
									{{/each}}											
								{{/if}}
							</script>
							<textarea cols="0" rows="0" id="postedServiceData"><?php echo json_encode($arrPostedServices); ?></textarea></div>
					</div>
					<div class="blockDetail addservice">
							<div class="formWraper">
							<div class="formRow message"></div>
							<fieldset>
							<h2>Add/Edit Service</h2>
							<form name="addService" id="addService" method="post" action="bridges/services/func_addEditService.php" target="submitForm" >
								<div class="hzBlock">
									<div class="formRow"><label for="addService">service</label></div>
									<div class="formRow"><input type="text" name="addService" id="addService" maxlength="200"></div>
								</div>
								<div class="hzBlock">								
								<div class="formRow"><label for="addServiceDesc">service Description</label></div>
								<div class="formRow"><input type="text" name="addServiceDesc" id="addServiceDesc" maxlength="200"></div>
								</div>
								<div class="hzBlock">
								<div class="formRow">&nbsp;</div>
								<div class="formRow">
									<input type="hidden" name="formsubmit" id="formsubmit" value="1">
									<input type="hidden" name="editServiceID" id="editServiceID" value="">									
									<input type="submit" name="sbmtAddService" id="sbmtAddService" value="ADD SERVICE" />
									<a href="#" class="cancelEdit">cancel</a>
								</div>								
								</div>								
								<div class="formRow"></div>
							</form>
							</fieldset>
							</div>
							<div class="serviceListWrapper">

							</div>

								<?php

									$obj_services  = new servicesProcessor();
									$resServicesList = $obj_services->getAllServices("",$arrDBTaskManagement);
									$tempArr = array();
									while($objServicesList = mysql_fetch_object($resServicesList)){
										array_push($tempArr, $objServicesList);
									}
									$jsonServices = json_encode($tempArr);
								?>
								<div id="servicesList" class="hidden">
									<?php echo $jsonServices; ?>
								</div>
					</div><!-- blockDetail ENDS -->
		</div>
	</div>
									<script id="tmpl_servicesList" type="text/x-jquery-tmpl">
								  {{if services.length}}
									<table class="tblServices" name="tblServices" id="tblServices">
										<thead>
											<tr>
												<th class="serial">#</th>
												<th class="servicName">Service</th>
												<th class="servicDesc">Service Description</th>
												<th class="servicEdit"></th>											
											</tr>										
										</thead>								  
										<tbody>
									  {{each($key, $val) services}}
											<tr>
												<td class="cols">{{= $key+1 }}</td>
												<td class="cols">{{= $val.service_name }}</td>
												<td class="cols">{{= $val.service_desc}}</td>
												<td class="cols"><a href="{{= $val.service_id}}" class="edit">EDIT</a><div class="rowData hidden">{{= JSON.stringify($val)}}</div></td>											
											</tr>
									  {{/each}}
										</tbody>
									</table>
								  {{/if}}
								</script>
								<script id="tmpl_servicesDealConfirmMsg" type="text/x-jquery-tmpl">
									<div class="confirmMsg">
									<ul>
										<li>Please share Your reference Number with the service Provider if work completes</li>
										<li>Please give Ratingsa for Service </li>
									</ul>
									<div class="btnContainer">
										<a href="#ok" name="okBtn" id="okBtn" value="OK" class="customBtn">OK<a/>
									</div>
									</div>
								</script>
								<div class="hidden">
									<script>
										var countryJSON = <?php require_once("bridges/countries/func_getAllCountries.php"); ?>
										alert("hi kkk");
									</script>
								</div>

	<div class="footer">
			<?php include("include/footer.php"); ?>
	</div>
</div>
</body>
</html>
