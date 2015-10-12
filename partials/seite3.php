<div id="seite3" style="display:none;">
	<div class="widget-header header-color-blue">
		<div class="row">
			<div class="col-sm-6">
				<h4 class="bigger lighter">
					<i class="glyphicon glyphicon-align-justify"></i>&nbsp;
					CampaignId
				</h4>
			</div>
		</div>
	</div>
	<div class="widget-body ">
		<div class="row">
			<div class="col-sm-3">
				<a href="#" ng-click="getCampaign()">Alle CampaignId zeigen</a>
				<!--<button id="arrow" style="display:none;">^</button>-->
				<p id="loadsearchcmpgn"></p>
				<div id = "cmpgnsearch" style="display:none;">
					<div class="col-lg-12">
						<label>Suchen: <input ng-model="searchTextCamp" class="form-control" placeholder="CampaignId"></label>
					</div><br>
					<table id="searchTextResults" border="0" cellspacing="0" cellpadding="0" width="100%" class="table table-striped table-hover">
						<tr>
							<td>
								<table cellspacing="0" cellpadding="1" border="0" width="100%" >
									<th><p>CampaignId</p></th>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<div style="width:100%; height:500px; overflow:auto;">
									<table id="cmpgnid_tab" cellspacing="0" cellpadding="1" border="0" width="100%" class="table table-striped table-hover">
										<tr ng-repeat="campaign in campaigns | filter:searchTextCamp">
											<td><p><a class="click" href="#" ng-click="getInfoCmpgnIdS3(campaign.CampaignId)">{{campaign.CampaignId}}</a></p></td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
<<<<<<< HEAD
=======
						<tbody id="cmpgnid_tab">
							<tr ng-repeat="campaign in campaigns | filter:searchTextCamp">
								<td><p><a class="click" href="#" ng-click="getInfoCmpgnIdS3(campaign.CampaignId)">{{campaign.CampaignId}}</a></p></td>
							</tr>
						</tbody>
>>>>>>> origin/master
					</table>
				</div>
			</div>
			<div class="col-sm-3">
					<p id="cmpgndat"></p>
					<p id="cmpgn_satz"></p>
					<div id = "cmpgninfo" style="display:none;">
						<table border="0" class="table table-striped table-hover">
						<tr>
							<th width="125px" style="text-align:left;"><p>Datum</p></th>
							<th width="100px" style="text-align:right;"><p>Impressions</p></th>
						</tr>
						<tr ng-repeat="cmpgninfo in cmpgninfos">
								<td style="text-align:left;"><p><a id="CmpgnExcelUpdate" ng-click="getInfoCmpgnDat(cmpgninfo.DateEntered,cmpgninfo.CampaignId);updateCampaignExcelTable(cmpgninfo.DateEntered,cmpgninfo.CampaignId,cmpgninfo.Sum);" >{{cmpgninfo.DateEntered}}</p></td>
								<td style="text-align:right;"><p>{{cmpgninfo.Sum}}</p></td>
							</tr>
						</table>
					</div>
				</div>
			<div class="col-sm-6">
				<p id="cmpgndatum_div_title"></p>
				<div id="cmpgndatum_div" style="display:none;">
					<table border="0" cellspacing="0" cellpadding="0" width="100%" class="table table-striped table-hover">
					<tr>
						<td>
							<table cellspacing="0" cellpadding="1" border="0" width="100%" >
								<th width="125px" style="text-align:left;"><p>UserId</p></th>
								<th width="100px" style="text-align:right;"><p>Impressions</p></th>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<div style="width:100%; height:500px; overflow:auto;">
								<table cellspacing="0" cellpadding="1" border="0" width="100%" class="table table-striped table-hover">
									<tr ng-repeat="cmpgniddat in cmpgniddats">
											<td style="text-align:left;"><p><a ng-click="sendIdToSeite4(cmpgniddat.UserId,cmpgniddat.DateEntered)">{{cmpgniddat.UserId}}</p></td>
											<td style="text-align:right;"><p>{{cmpgniddat.Sum}}</p></td>
										</tr>
									</table>
								</div>
								<form action="excel/Liste_der_UserId_Von_CampaignId.xls">
								    <input type="submit" value="Download Excel">
								</form>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
/*
$("#cmpgn_userid_a").on("click",function(){
	$("#cmpgnstateid_tab").hide();
	$("#cmpgnosid_tab").hide();
	$("#cmpginfouid_tab").hide();
	$("#cmpgnbrowserid_tab").show();
	//$("#cmpgnosid_tab").hide();
})
$("#cmpgn_osid_a").on("click",function(){
	$("#cmpgnuserid_tab").hide();
	$("#cmpgnstateid_tab").hide();
	$("#cmpginfouid_tab").hide();
	$("#cmpgnbrowserid_tab").hide();
	$("#cmpgnosid_tab").show();
})
$("#cmpgn_stateid_a").on("click",function(){
	$("#cmpgnuserid_tab").hide();
	$("#cmpgnosid_tab").hide();
	$("#cmpginfouid_tab").hide();
	$("#cmpgnbrowserid_tab").hide();
	$("#cmpgnstateid_tab").show();
})
$("#cmpgn_browserid_a").on("click",function(){
	$("#cmpgnuserid_tab").hide();
	$("#cmpgnosid_tab").hide();
	$("#cmpginfouid_tab").hide();
	$("#cmpgnstateid_tab").hide();
	$("#cmpgnbrowserid_tab").show();
})
$("#cmpgninfouid_a").on("click",function(){
	$("#cmpgnuserid_tab").hide();
	$("#cmpgnosid_tab").hide();
	$("#cmpgnstateid_tab").hide();
	$("#cmpgnbrowserid_tab").hide();
	$("#cmpginfouid_tab").show();
})*/
</script>
