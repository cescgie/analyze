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
								<td><p><a href="#" id="cmpgn_userid">UserId</a></p></td>
							</tr>
							<tr>
								<td><p><a href="#" id="cmpgn_stateid">StateId</a></p></td>
							</tr>
							<tr>
								<td><p><a href="#" id="cmpgn_osid">OsId</a></p></td>
							</tr>
							<tr>
								<td ><p><a href="#" id="cmpgn_browserid">BrowserId</a></p></td>
							</tr>
							<!--<tr>
								<th width="125px" id="center">Datum</th>
								<th width="100px" id="center" >Impressions</th>
							</tr>
							<tr ng-repeat="cmpgninfo in cmpgninfos">
									<td id="center"><p>{{cmpgninfo.DateEntered}}</p></td>
									<td id="center"><p>{{cmpgninfo.Sum}}</p></td>
								</tr>-->
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
								<th width="125px" id="center">ueberId</th>
								<th width="100px" id="center" >Impressions</th>
							</tr>
							<!--<tr ng-repeat="cmpgninfo in cmpgninfos">
									<td id="center"><p>{{cmpgninfo.DateEntered}}</p></td>
									<td id="center"><p>{{cmpgninfo.Sum}}</p></td>
								</tr>-->
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
