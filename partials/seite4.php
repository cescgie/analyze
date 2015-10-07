<div id="seite4" style="display:none;">
  <div class="widget-header header-color-blue">
    <div class="row">
      <div class="col-sm-6">
        <h4 class="bigger lighter">
          <i class="glyphicon glyphicon-align-justify"></i>&nbsp;
          UserId
        </h4>
      </div>
      <div class="col-sm-4">
  			<!--<select id="select_datum_uid" data-ng-options="datum.DateEntered for datum in datums track by datum.DateEntered" ng-model="filterDatum" ng-change="getUidDatum(filterDatum)" class="form-control search header-elements-margin">-->
        <select data-ng-options="datum.DateEntered for datum in datums track by datum.DateEntered" ng-model="filterDatum" ng-change="setDateInput(filterDatum)" class="form-control search header-elements-margin">
         	<option id="select_datum_uid" style="display:none" value="">Wähle ein Datum aus</option>
  			</select>
  		</div>
    </div>
  </div>
  <div class="widget-body ">
    <form ng-submit="formSubmit()" method="post">
      UserId:
      <span id="uid_input_hid"></span>
      <span id="uid_input_show"><input id="uid_input" ng-model="uid_input" name="uid_input" type="text" value=""></span>
      Datum:
      <span id="date_input_hid"></span>
      <span id="date_input_show"><input id="date_input" ng-model="date_input" name="date_input" type="text" value="" placeholder="YYYY-MM-DD"></span>
      <input type="submit" ngClick="Submit">
    </form>
    <div class="row" id="uber_all">
      <div class="col-sm-2" id="uber_all_col2">
        <p id="uber_title"></p>
        <div id = "useridinfo_s4" style="display:none;">
          <table border="0" class="table table-striped table-hover">
          <tr>
            <th width="125px"><p>Ueberblick</p></th>
          </tr>
          <tr>
            <td><p id="webid_s4">WebsiteId</p></td>
          </tr>
          <tr>
            <td><p id="cmpgnid_s4">CampaignId</p></td>
          </tr>
          <!--<tr>
            <td><p id="stateid_s4">StateId</p></td>
          </tr>
          <tr>
            <td><p id="osid_s4">OsId</p></td>
          </tr>
          <tr>
            <td ><p id="browserid_s4">BrowserId</p></td>
          </tr>-->
          </table>
        </div>
      </div>
      <div class="col-sm-3" id="uber_all_col3">
        <p id="uber_content_title"></p>

        <div id="useridwebid_div_s4" style="display:none">

          <table id="table_web_div" border="0" class="table table-striped table-hover">
          <tr>
            <th><p>WebsiteName</p></th>
            <th><p>Sessions</p></th>
          </tr>
          <!--<tr ng-repeat="infouidwebid in infouidwebids track by $index">
              <td style="text-align:left;"><p>{{infouidwebid.WebsiteName}}</p></td>
              <td style="text-align:right;"><p>{{infouidwebid.Sum}}</p></td>
            </tr>-->
          </table>
        </div>
        <div id="useridcmpgnid_div_s4" style="display:none">
          <table id="table_cmpgn_div" border="0" class="table table-striped table-hover">
          <tr>
            <th><p>CampaignId</p></th>
            <th><p>Sessions</p></th>
          </tr>
          <!--<tr ng-repeat="uidcmpgn in uidcmpgns track by $index">
              <td style="text-align:left;"><p>{{uidcmpgn.CampaignId}}</p></td>
              <td style="text-align:right;"><p>{{uidcmpgn.Sum}}</p></td>
            </tr>-->
          </table>
        </div>
      </div>
      <div class="col-sm-7" id="uber_all_col7">
        <p id="infoinfo_div_s4_title"></p>
        <div id="webinfoinfo_div_s4" style="display:none">
          <table border="0" class="table table-striped table-hover">
          <tr>
            <th style="text-align:left;"><p>WebsiteName</p></th>
            <th style="text-align:left;"><p>Uhrzeit</p></th>
            <th style="text-align:left;"><p>IpAddress</p></th>
            <th style="text-align:left;"><p>CityId</p></th>
            <th style="text-align:left;"><p>OsId</p></th>
            <th style="text-align:left;"><p>BrowserId</p></th>
            <th style="text-align:left;"><p>Sessions</p></th>
          </tr>
          <tr ng-repeat="infouidwebiddatum in infouidwebiddatums track by $index">
            <td style="text-align:right;"><p>{{infouidwebiddatum.WebsiteName}}</p></td>
            <td style="text-align:right;"><p>{{infouidwebiddatum.Hour}}</p></td>
            <td style="text-align:right;"><p>{{infouidwebiddatum.IpAddress}}</p></td>
            <td style="text-align:right;"><p>{{infouidwebiddatum.CityId}}</p></td>
            <td style="text-align:right;"><p>{{infouidwebiddatum.OsId}}</p></td>
            <td style="text-align:right;"><p>{{infouidwebiddatum.BrowserId}}</p></td>
            <td style="text-align:right;"><p>{{infouidwebiddatum.Sum}}</p></td>
            </tr>
          </table>
        </div> <!-- webinfoinfo_div_s4-->
        <div id="cmpgninfoinfo_div_s4" style="display:none">
          <table border="0" class="table table-striped table-hover">
          <tr>
            <th style="text-align:left;"><p>CampaignId</p></th>
            <th style="text-align:left;"><p>Uhrzeit</p></th>
            <th style="text-align:left;"><p>WebsiteName</p></th>
            <th style="text-align:left;"><p>IpAddress</p></th>
            <th style="text-align:left;"><p>CityId</p></th>
            <th style="text-align:left;"><p>OsId</p></th>
            <th style="text-align:left;"><p>BrowserId</p></th>
            <th style="text-align:left;"><p>Sessions</p></th>
          </tr>
          <tr ng-repeat="infouidcmpgniddatum in infouidcmpgniddatums track by $index">
            <td style="text-align:right;"><p>{{infouidcmpgniddatum.CampaignId}}</p></td>
            <td style="text-align:right;"><p>{{infouidcmpgniddatum.Hour}}</p></td>
            <td style="text-align:right;"><p>{{infouidcmpgniddatum.WebsiteName}}</p></td>
            <td style="text-align:right;"><p>{{infouidcmpgniddatum.IpAddress}}</p></td>
            <td style="text-align:right;"><p>{{infouidcmpgniddatum.CityId}}</p></td>
            <td style="text-align:right;"><p>{{infouidcmpgniddatum.OsId}}</p></td>
            <td style="text-align:right;"><p>{{infouidcmpgniddatum.BrowserId}}</p></td>
            <td style="text-align:right;"><p>{{infouidcmpgniddatum.Sum}}</p></td>
            </tr>
          </table>
        </div> <!-- cmpgninfoinfo_div_s4-->
      </div>
    </div>
  </div>
</div>
