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
      <span id="date_input_show"><input id="date_input" ng-model="date_input" name="date_input" type="text" value=""></span>
      <input type="submit" ngClick="Submit">
    </form>
    <div class="row">
      <div class="col-sm-4">
        <div id = "useridinfo_s4" style="display:block;">
          <table border="0" class="table table-striped table-hover">
          <tr>
            <th width="125px">Ueberblick</th>
          </tr>
          <tr>
            <td><p id="webid_s4">WebsiteId</p></td>
          </tr>
          <tr>
            <td><p id="cmpgnid_s4">CampaignId</p></td>
          </tr>
          <tr>
            <td><p id="stateid_s4">StateId</p></td>
          </tr>
          <tr>
            <td><p id="osid_s4">OsId</p></td>
          </tr>
          <tr>
            <td ><p id="browserid_s4">BrowserId</p></td>
          </tr>
          </table>
        </div>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-4">
      </div>
    </div>
    <table width="100%">
      <tr>
        <td width="50%" style="vertical-align:top;">
          <div id="userid_div_s4" style="display:none">
            <table border="1" class="table table-striped table-hover">
            <tr>
              <th id="center">Datum</th>
              <th id="center">WebsiteName</th>
              <th id="center">IpAddress</th>
              <th id="center">Uhrzeit</th>
              <th id="center">Impressions</th>
            </tr>
            <tr ng-repeat="infouid in infodateuids">
                <td id="center"><p>{{infouid.DateEntered}}</p></td>
                <td id="center"><p>{{infouid.WebsiteName}}</p></td>
                <td id="center"><p>{{infouid.IpAddress}}</p></td>
                <td id="center"><p id="str">{{infouid.Hour}}</p></td>
                <td id="center"><p>{{infouid.Sum}}</p></td>
              </tr>
            </table>
          </div>
        </td>
        <td width="50%" style="vertical-align:top;">
          <!--<p id="webdat"></p>
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
          </div>-->
        </td>
      </tr>
    </table>
  </div>
</div>
