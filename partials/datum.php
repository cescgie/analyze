<div class="widget-box" id="recent-box" ng-controller="tasksController" width="100%">
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
					<div class="datum">
						<table border="1" class="table table-striped table-hover">
						<tr>
							<th width="125px" id="center">UserId</th>
							<th width="100px" id="center" >Impressions</th>
						</tr>
						<tr ng-repeat="userid in userids track by userid.UserId| filter : filterDatum">
								<td id="center"><p><a  class="click" href="#" ng-click="getInfoUid(userid.UserId,userid.DateEntered)">{{userid.UserId}}</a></p></td>
								<td id="center"><p>{{userid.Summe}}</p></td>
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
							<th id="center">WebsiteId</th>
							<th id="center">IpAddress</th>
							<th id="center">Uhrzeit</th>
							<th id="center">Impressions</th>
						</tr>
						<tr ng-repeat="userid2 in userids2">
								<td id="center"><p>{{userid2.WebsiteId}}</p></td>
								<td id="center"><p><a  class="click" href="#" ng-click="getInfoIp(userid2.IpAddress)">{{userid2.IpAddress}}</a></p></td>
								<td id="center">
									<p id="str">{{userid2.Hour}}</p>
								</td>
								<td id="center"><p>{{userid2.Summe}}</p></td>
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
							<th id="center">WebsiteId</th>
							<th id="center" width="80px">Datum</th>
						</tr>
						<tr ng-repeat="ipaddress in ipaddresses">
								<td id="center"><p><a  class="click" href="#" ng-click="getInfoUidIp(ipaddress.UserId,ipaddress.DateEntered,ipaddress.WebsiteId,ipaddress.IpAddress)">{{ipaddress.UserId}}</a></p></td>
								<td id="center"><p>{{ipaddress.WebsiteId}}</p></td>
								<td id="center"><p>{{ipaddress.DateEntered}}</p></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<p><a  class="click" href="#" ng-click="click('2015-08-19')">*</a></p>
</div>
