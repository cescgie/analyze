<div id="seite3" style="display:none;">
	<div class="widget-header header-color-blue">
		<div class="row">
			<div class="col-sm-6">
				<h4 class="bigger lighter">
					<i class="glyphicon glyphicon-align-justify"></i>&nbsp;
					CAMPAIGN
				</h4>
			</div>
		</div>
	</div>
	<ul class="nav nav-pills">
			<li id="tab3sub1_li" style="background-color:CCCCCC;"><a href="#" id="tab3sub1_link">Sub 1</a></li>
			<li id="tab3sub2_li" style="background-color:CCCCCC;"><a href="#" id="tab3sub2_link">Sub 2</a></li>
	</ul>
	<div id="tab3sub1_div">
	<div class="widget-body ">
		<div class="row">
			<br>
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
											<td style="text-align:left;"><p><a ng-click="sendIdToSub3(cmpgniddat.UserId,cmpgniddat.DateEntered,cmpgniddat.CampaignId);updateUidCampDatExcel(cmpgniddat.UserId,cmpgniddat.DateEntered,cmpgniddat.CampaignId);">{{cmpgniddat.UserId}}</p></td>
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
</div> <!-- tab3sub1_div -->
<div id="tab3sub2_div" style="display:none"><br>
	<p id="infoinfo_div_s3_title"></p>
	<div id="button_infoinfo_div_s3_title" style="text-align:right;display:none;">
			<form action="excel/Info_von_UserId_CampaignId.xls">
				<input type="submit" value="Download Excel"/>
			</form>
	</div>
	<div id="cmpgninfoinfo_div_s3" style="display:none">
		<table border="0" class="table table-striped table-hover">
		<tr>
			<th style="text-align:center;"><p>CampaignId</p></th>
			<th style="text-align:center;"><p>Uhrzeit</p></th>
			<th style="text-align:center;"><p>WebsiteName</p></th>
			<th style="text-align:center;"><p>IpAddress</p></th>
			<th style="text-align:center;"><p>CityName</p></th>
			<th style="text-align:center;"><p>OsId</p></th>
			<th style="text-align:center;"><p>BrowserId</p></th>
			<th style="text-align:center;"><p>Impressions</p></th>
		</tr>
		<tr ng-repeat="infouidcmpgniddatum in infouidcmpgniddatums3s track by $index">
			<td style="text-align:center;"><p>{{infouidcmpgniddatum.CampaignId}}</p></td>
			<td style="text-align:center;"><p>{{infouidcmpgniddatum.Hour}}</p></td>
			<td style="text-align:center;"><p>{{infouidcmpgniddatum.WebsiteName}}</p></td>
			<td style="text-align:center;"><p>{{infouidcmpgniddatum.IpAddress}}</p></td>
			<td style="text-align:center;"><p>{{infouidcmpgniddatum.CityName}}</p></td>
			<td style="text-align:center;"><p>{{infouidcmpgniddatum.OsId}}</p></td>
			<td style="text-align:center;"><p>{{infouidcmpgniddatum.BrowserId}}</p></td>
			<td style="text-align:center;"><p>{{infouidcmpgniddatum.Sum}}</p></td>
			</tr>
		</table>
	</div> <!-- cmpgninfoinfo_div_s4-->
</div>
</div>
<script type="text/javascript">
$("#tab3sub1_link").on("click",function(){
	$("#tab3sub2_div").hide();
	$("#tab3sub1_div").show();
	$("#tab3sub1_li").addClass("active");
	$("#tab3sub2_li").removeClass("active");
})
$("#tab3sub2_link").on("click",function(){
	$("#tab3sub1_div").hide();
	$("#tab3sub2_div").show();
	$("#tab3sub1_li").removeClass("active");
	$("#tab3sub2_li").addClass("active");
})
</script>
