	<div id="seite3" style="display:none;">
		<div class="widget-header header-color-blue">
			<div class="row">
				<div class="col-sm-6">
					<h4 class="bigger lighter">
						<i class="glyphicon glyphicon-align-justify"></i>&nbsp;
						CampaignId
					</h4>
				</div>
				<div class="col-sm-4">
				</div>
			</div>
		</div>
		<div class="widget-body ">
			<table width="100%">
				<tr>
					<td width="30%" style="vertical-align:top;">
						<a href="#" ng-click="getCampaign()">Alle CampaignId zeigen</a>
						<!--<button id="arrow" style="display:none;">^</button>-->
						<p id="loadsearchcmpgn"></p>
						<div id = "cmpgnsearch" style="display:none;">
							<div class="col-lg-6">
								<label>Suchen: <input ng-model="searchText" class="form-control" placeholder="CampaignId"></label>
							</div><br>
							<table id="searchTextResults" class="table table-striped table-hover">
							  <tr>
									<th>CampaignId</th>
							 	</tr>
							  <tr ng-repeat="campaign in campaigns | filter:searchText">
							    <td><p><a class="click" href="#" ng-click="getInfoCmpgnId(campaign.CampaignId)">{{campaign.CampaignId}}</a></p></td>
							  </tr>
							</table>
						</div>
					</td>
					<td width="30%" style="vertical-align:top;">
						<p id="cmpgndat"></p>
						<p id="cmpgn_satz"></p>

						<div id = "cmpgninfo" style="display:block;">
							<table border="1" class="table table-striped table-hover">
							<tr>
								<th width="125px" id="center">Ueberblick</th>
							</tr>
							<tr>
								<td><p id="cmpgn_userid">UserId</p></td>
							</tr>
							<tr>
								<td><p id="cmpgn_stateid">StateId</p></td>
							</tr>
							<tr>
								<td><p id="cmpgn_osid">OsId</p></td>
							</tr>
							<tr>
								<td ><p id="cmpgn_browserid">BrowserId</p></td>
							</tr>
							</table>
							<script type="text/javascript">
								function compile(element){
								 var el = angular.element(element);
								  $scope = el.scope();
								    $injector = el.injector();
								    $injector.invoke(function($compile){
								       $compile(el)($scope)
								    })
								}
							</script>
						</div>
					</td>
					<td width="30%" style="vertical-align:top;">
						<p id="ueberdat"></p>
						<p id="ueber_satz"></p>

						<div id = "ueberinfo" style="display:block;">
							<table border="1" class="table table-striped table-hover">
								<tr>
									<th width="125px" id="center"><span id="uebertitle">ueberId</span></th>
									<th width="100px" id="center" >Impressions</th>
								</tr>
								<tbody id="cmpgnuserid_tab" >
									<tr ng-repeat="campaignuserid in campaignuserids ">
										<td id="center"><p><a href="#" id="cmpgninfouid_a" ng-click="getCampaignFromUid(campaignuserid.UserId,campaignuserid.CampaignId)">{{campaignuserid.UserId}}</a></p></td>
										<td id="center"><p>{{campaignuserid.Sum}}</p></td>
									</tr>
								</tbody>
								<tbody id="cmpgnstateid_tab">
									<tr ng-repeat="campaignstateid in campaignstateids ">
										<td id="center"><p>{{campaignstateid.StateId}}</p></td>
										<td id="center"><p>{{campaignstateid.Sum}}</p></td>
									</tr>
								</tbody>
								<tbody id="cmpgnosid_tab" >
									<tr ng-repeat="campaignosid in campaignosids ">
										<td id="center"><p>{{campaignosid.OsId}}</p></td>
										<td id="center"><p>{{campaignosid.Sum}}</p></td>
									</tr>
								</tbody>
								<tbody id="cmpgnbrowserid_tab">
									<tr ng-repeat="campaignbrowserid in campaignbrowserids ">
										<td id="center"><p>{{campaignbrowserid.BrowserId}}</p></td>
										<td id="center"><p>{{campaignbrowserid.Sum}}</p></td>
									</tr>
								</tbody>
								<table border="1" width="100%" id="cmpginfouid_tab" class="table table-striped table-hover" style="display:none;">
										<tr>
											<th id="center">CampaignId</th>
											<th id="center">UserId</th>
											<th id="center">StateId</th>
											<th id="center">OsId</th>
											<th id="center">BrowserId</th>
											<th id="center">Impr</th>
										</tr>
										<tr ng-repeat="cmpgninfouid in cmpgninfouids ">
											<th id="center"><p>{{cmpgninfouid.CampaignId}}</p></th>
											<th id="center"><p>{{cmpgninfouid.UserId}}</p></th>
											<th id="center"><p>{{cmpgninfouid.StateId}}</p></th>
											<th id="center"><p>{{cmpgninfouid.OsId}}</p></th>
											<th id="center"><p>{{cmpgninfouid.BrowserId}}</p></th>
											<th id="center"><p>{{cmpgninfouid.Sum}}</p></th>
										</tr>
									</table>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<script type="text/javascript">
	$("#cmpgn_userid_a").on("click",function(){
		$("#cmpgnstateid_tab").hide();
		$("#cmpgnosid_tab").hide();
		$("#cmpginfouid_tab").hide();
		$("#cmpgnbrowserid_tab").show();
	})
	$("#cmpgn_osid_a").on("click",function(){
		$("#cmpgnuserid_tab").hide();
		$("#cmpgnstateid_tab").hide();
		$("#cmpginfouid_tab").hide();
		$("#cmpgnbrowserid_tab").show();
	})
	$("#cmpgn_stateid_a").on("click",function(){
		$("#cmpgnuserid_tab").hide();
		$("#cmpgnosid_tab").hide();
		$("#cmpginfouid_tab").hide();
		$("#cmpgnbrowserid_tab").show();
	})
	$("#cmpgn_browserid_a").on("click",function(){
		$("#cmpgnuserid_tab").hide();
		$("#cmpgnosid_tab").hide();
		$("#cmpginfouid_tab").hide();
		$("#cmpgnstateid_tab").show();
	})
	$("#cmpgninfouid_a").on("click",function(){
		$("#cmpgnuserid_tab").hide();
		$("#cmpgnosid_tab").hide();
		$("#cmpgnstateid_tab").hide();
		$("#cmpginfouid_tab").show();
	})
	</script>
