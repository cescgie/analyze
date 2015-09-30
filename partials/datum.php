<div class="widget-box" id="recent-box" ng-controller="tasksController" width="100%">
	<ul class="nav nav-pills">
  	<li id="seite1_li" style="background-color:CCCCCC;"><a href="#" id="seite1_link">Seite 1</a></li>
  	<li id="seite2_li" style="background-color:CCCCCC;"><a href="#" id="seite2_link">Seite 2</a></li>
	</ul>
	<script type="text/javascript">
	$("#seite1_link").on("click",function(){
		$("#seite2").hide();
		$("#seite1").show();
		$("#seite1_li").removeClass("active");
	})
	$("#seite2_link").on("click",function(){
		$("#seite1").hide();
		$("#seite2").show();
		$("#seit2_li").addClass("active");
	})
	</script>
	<div id="seite2" style="display:none;">
		<div class="widget-header header-color-blue">
			<div class="row">
				<div class="col-sm-6">
					<h4 class="bigger lighter">
						<i class="glyphicon glyphicon-align-justify"></i>&nbsp;
						WEBSEITEN
					</h4>
				</div>
				<div class="col-sm-4">
				</div>
			</div>
		</div>
		<div class="widget-body ">
			<table width="100%">
				<tr>
					<td width="50%" style="vertical-align:top;">
						<a href="#" ng-click="getWebName()">Alle Webseiten zeigen</a>
						<!--<button id="arrow" style="display:none;">^</button>-->
						<p id="loadsearch"></p>
						<div id = "websearch" style="display:none;">
							<div class="col-lg-6">
								<label>Suchen: <input ng-model="searchText" class="form-control" placeholder="WebsiteName"></label>
							</div><br>
							<table id="searchTextResults" class="table table-striped table-hover">
							  <tr>
									<th>WebsiteName</th>
							 	</tr>
							  <tr ng-repeat="webname in webnames | filter:searchText">
							    <td><a class="click" href="#" ng-click="getInfoWebName(webname.WebsiteName,webname.WebsiteId)">{{webname.WebsiteName}}</a></td>
							  </tr>
							</table>
						</div>
					</td>
					<td width="50%" style="vertical-align:top;">
						<p id="webdat"></p>
						<p id="web_satz"></p>
						<div id = "websiteinfo" style="display:none;">
							<table border="1" class="table table-striped table-hover">
							<tr>
								<th width="125px" id="center">Datum</th>
								<th width="100px" id="center" >Impressions</th>
							</tr>
							<tr ng-repeat="webdatum in webdatums">
									<td id="center"><p>{{webdatum.DateEntered}}</p></td>
									<td id="center"><p>{{webdatum.Sum}}</p></td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<div id="seite1">
		<div class="widget-header header-color-blue">
		<div class="row">
		<div class="col-sm-6">
			<h4 class="bigger lighter">
				<i class="glyphicon glyphicon-align-justify"></i>&nbsp;
				DATUM
			</h4>
		</div>
		<div class="col-sm-4">
			<select data-ng-options="datum.DateEntered for datum in datums track by datum.DateEntered" ng-model="filterDatum" ng-change="getUid(filterDatum)" class="form-control search header-elements-margin">
			 	<option style="display:none" value="">Wähle ein Datum aus</option>
			</select>
		</div>
		</div></div>
			<div class="widget-body ">
				<table>
					<tr>
						<td width="30%" style="vertical-align:top;">
							<p id="verdacht"></p>
							<table>
								<td ng-repeat="webinfo in webinfos">
									<p id="center"><span style="color:ff0000;">{{webinfo.Anzahl_UserId}}</span> UserIds</p>
								</td>
							</table>
							<div class="datum">
								<table border="1" class="table table-striped table-hover">
								<tr>
									<th width="125px" id="center">UserId</th>
									<th width="100px" id="center" >Impressions</th>
								</tr>
								<tr ng-repeat="userid in userids track by userid.UserId">
										<td id="center"><p><a  class="click" href="#" ng-click="getInfoUid(userid.UserId,userid.DateEntered)">{{userid.UserId}}</a></p></td>
										<td id="center"><p>{{userid.Sum}}</p></td>
									</tr>
								</table>
							</div>
						</td>
						<td width="30%" style="vertical-align:top;">
							<?php
							if(isset($_GET['userid'])){
							$uid = $_GET['userid'];
							echo $uid;
							}
							?>
							<p id="uid"></p>
							<div id="userid_div">
								<table border="1" class="table table-striped table-hover">
								<tr>
									<th id="center">WebsiteName</th>
									<th id="center">IpAddress</th>
									<th id="center">Uhrzeit</th>
									<th id="center">Impressions</th>
								</tr>
								<tr ng-repeat="userid2 in userids2">
										<td id="center"><p><a class="click" href="#" ng-click="getSummeUserId(userid2.WebsiteId,userid2.DateEntered);getInfoWeb(userid2.WebsiteId,userid2.DateEntered,userid2.WebsiteName)">{{userid2.WebsiteName}}</a></p></td>
										<td id="center"><p><a  class="click" href="#" ng-click="getInfoIp(userid2.IpAddress)">{{userid2.IpAddress}}</a></p></td>
										<td id="center">
											<p id="str">{{userid2.Hour}}</p>
										</td>
										<td id="center"><p>{{userid2.Sum}}</p></td>
									</tr>
								</table>
							</div>
						</td>
						<td width="30%" style="vertical-align:top;">
							<p id="ip_p"></p>
							<div class="ip_div">
								<table border="1" class="table table-striped table-hover">
								<tr>
									<th id="center" width="125px">UserId</th>
									<th id="center">WebsiteName</th>
									<th id="center" width="80px">Datum</th>
								</tr>
								<tr ng-repeat="ipaddress in ipaddresses">
										<td id="center"><p><a  class="click" href="#" ng-click="getInfoUidIp(ipaddress.UserId,ipaddress.DateEntered,ipaddress.WebsiteId,ipaddress.IpAddress)">{{ipaddress.UserId}}</a></p></td>
										<td id="center"><p>{{ipaddress.WebsiteName}}</p></td>
										<td id="center"><p>{{ipaddress.DateEntered}}</p></td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
</div>
