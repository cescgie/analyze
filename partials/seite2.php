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
		<div class="row">
			<div class="col-sm-3">
				<a href="#" ng-click="getWebName()">Alle Webseiten zeigen</a>
				<!--<button id="arrow" style="display:none;">^</button>-->
				<p id="loadsearch"></p>
				<div id = "websearch" style="display:none;">
					<div class="col-lg-12">
						<label>Suchen: <input ng-model="searchTextWeb" class="form-control" placeholder="WebsiteName"></label>
					</div><br>
					<table id="searchTextResults" border="0" cellspacing="0" cellpadding="0" width="100%" class="table table-striped table-hover">
						<tr>
							<td>
								<table cellspacing="0" cellpadding="1" border="0" width="100%" >
									<th><p>WebsiteName</p></th>
								</table>
							</td>
						</tr>
<<<<<<< HEAD
						<tr>
							<td>
								<div style="width:100%; height:500px; overflow:auto;">
									<table id="webid_tab" cellspacing="0" cellpadding="1" border="0" width="100%" class="table table-striped table-hover">
										<tr ng-repeat="webname in webnames | filter:searchText">
											<td><p><a class="click" href="#" ng-click="getInfoWebName(webname.WebsiteName,webname.WebsiteId)">{{webname.WebsiteName}}</a></p></td>
										</tr>
									</table>
								</div>
							</td>
=======
						<tr ng-repeat="webname in webnames | filter:searchTextWeb">
							<td><p><a class="click" href="#" ng-click="getInfoWebName(webname.WebsiteName,webname.WebsiteId)">{{webname.WebsiteName}}</a></p></td>
>>>>>>> origin/master
						</tr>
					</table>
				</div>
			</div>
			<div class="col-sm-3">
				<p id="webdat"></p>
				<div id = "websiteinfo" style="display:none;" >
					<table border="0" class="table table-striped table-hover">
					<tr>
						<th width="125px" style="text-align:left;"><p>Datum</p></th>
						<th width="100px" style="text-align:right;"><p>Impressions</p></th>
					</tr>
					<tr ng-repeat="webdatum in webdatums">
							<td style="text-align:left;"><p><a ng-click="getInfoWebDat(webdatum.DateEntered,webdatum.WebsiteId);updateWebsiteExcelTable(webdatum.DateEntered,webdatum.WebsiteId,webdatum.Sum);">{{webdatum.DateEntered}}</p></td>
							<td style="text-align:right;"><p>{{webdatum.Sum}}</p></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-sm-6">
				<p id="webdatum_div_title"></p>
				<div id="webdatum_div" style="display:none;">
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
								<table cellspacing="0" cellpadding="1" border="0" width="100%" class="table table-striped table-hover" >
									<tr ng-repeat="webiddat2 in webiddat2s">
											<td style="text-align:left;"><p><a ng-click="sendIdToSeite4(webiddat2.UserId,webiddat2.DateEntered)">{{webiddat2.UserId}}</p></td>
											<td style="text-align:right;"><p>{{webiddat2.Sum}}</p></td>
										</tr>
									</table>
								</div>
								<?php
									//echo getcwd()."/../";
									$dir="../excel/";
									$dh = opendir($dir);
									while ($file = readdir ($dh))
									{
										if(substr($file,0,1)!=".")
										$filenames[] = $file;
									}
									closedir($dh);
									if($filenames)
									{
										natcasesort($filenames);
										foreach($filenames as $file)
										{
											$websub = substr($file, 21, -4);  // gibt "cde" zurück
											if($websub=="WebsiteId")
											{
												$file_parts = pathinfo($file);
												switch($file_parts['extension'])
												{
														case "xls":
														echo '
																<form action="excel/'.$file.'">
																		<input type="submit" value="Download Excel">
																</form>';
														break;
												}
											}
										}
									}
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
