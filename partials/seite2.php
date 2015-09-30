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
