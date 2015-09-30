
<?php include_once('header.php') ?>

<div class="widget-box" id="recent-box" ng-controller="tasksController_web" width="100%">
<div class="widget-header header-color-blue">
<div class="row">
<div class="col-sm-6">
	<h4 class="bigger lighter">
		<i class="glyphicon glyphicon-align-justify"></i>&nbsp;
		WebsiteName
	</h4>
</div>
<div class="col-sm-4">
</div>
</div></div>
	<div class="widget-body ">
		<table>
			<tr>
				<td width="30%" style="vertical-align:top;">
					<p id="verdacht"></p>
          <table>
						<td ng-repeat="website in websites">
              test
							<p id="center"><span style="color:ff0000;">{{website.WebsiteName}}</span></p>
						</td>
					</table>
					<div class="datum">

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

					</div>
				</td>
				<td width="30%" style="vertical-align:top;">
					<p id="ip_p"></p>
					<div class="ip_div">

					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript" src="app/app_web.js"></script>

<?php include_once('footer.php') ?>
