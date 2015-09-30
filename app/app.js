//Define an angular module for our app
var app = angular.module('myApp', []);

app.controller('tasksController', function($scope, $http) {
  //getTask(); // Load all available tasks
  getDatum();
  //getWebName();
  /*
  * Get Datumseinträge
  */
  function getDatum(){
  $http.post("ajax/getDatum.php").success(function(data){
        $scope.datums = data;
        //getInfoUid(NULL,NULL);
        console.log('Datum ok');
       });
  };

  /*
  * Get UserId from datum
  */
  $scope.getUid = function (datum) {
    $http.post("ajax/getUserId.php?datum="+datum.DateEntered).success(function(data){
        $scope.userids = data;
        var element = document.getElementById('verdacht');
        element.innerHTML = "<p>verdaechtige UserId am <span style='color: #ff0000'>"+datum.DateEntered+"</span><p>";
      });
  };

  /*
  * Get InfoUserId from UserId & datum
  */
  $scope.getInfoUid = function (userid,datum) {
    var fbcanvas = document.getElementById('uid');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $http.post("ajax/getInfoUserId.php?datum="+datum+"&userid="+userid).success(function(data){
        $scope.userids2 = data;
        //console.log(datum);
        //console.log(userid);
        var fbcanvas = document.getElementById('uid');
        fbcanvas.innerHTML =
        "<p>UserId <span style='color: #ff0000'>"+userid+"</span> am <span style='color: #ff0000'>"+datum+"</span></p>";

        //Change a-tag background-color after click
        $('a').on('click', function(){
          $('a').css("background-color","");
          $(this).css("background-color","yellow");
        });
      });
  };

  /*
  * Get InfoIpAddress from IpAddress
  */
  $scope.getInfoIp = function (ip) {
    var element = document.getElementById('ip_p');
    element.innerHTML = "<p>Loading...</p>";
    $http.post("ajax/getInfoIpAddress.php?ip="+ip).success(function(data){
        $scope.ipaddresses = data;
        //console.log(ip);
        //console.log(data);
        var element = document.getElementById('ip_p');
        element.innerHTML = "<p>Info von IpAddress <span style='color: #ff0000'>"+ip+"</span></p>";

        //Change a-tag background-color after click
        $('a').on('click', function(){
          $('a').css("background-color","");
          $(this).css("background-color","yellow");
        });
      });
  };

  /*
  * Get InfoUserId from UserId, WebsiteId,IpAddress & DateEntered
  */
  $scope.getInfoUidIp = function (userid,datum,webid,ip) {
    var fbcanvas = document.getElementById('uid');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $http.post("ajax/getInfoUserId.php?datum="+datum+"&userid="+userid+"&webid="+webid+"&ip="+ip).success(function(data){
        $scope.userids2 = data;
        var fbcanvas = document.getElementById('uid');
        fbcanvas.innerHTML =
        "<p>UserId <span style='color: #ff0000'>"+userid+"</span> auf WebsiteId <span style='color: #ff0000'>"+webid+"</span> mit IpAddress <span style='color: #ff0000'>"+ip+"</span> am <span style='color: #ff0000'>"+datum+"</span></p>";

        //Change a-tag background-color after click
        $('a').on('click', function(){
          $('a').css("background-color","");
          $(this).css("background-color","yellow");
        });
      });
  };

  function remove(id) {
    return (elem=document.getElementById(id)).parentNode.removeChild(elem);
  }

  /*
  * Get Anzahl der UserId von WebsiteId,DateEntered
  */
  $scope.getSummeUserId = function (webid,datum) {
    $http.post("ajax/getSumUid.php?webid="+webid+"&datum="+datum).success(function(data){
        $scope.webinfos = data;
      });
  };
  /*
  * Get InfoUserId from WebsiteId,DateEntered
  */
  $scope.getInfoWeb = function (webid,datum,webname) {
    var fbcanvas = document.getElementById('verdacht');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $http.post("ajax/getInfoWebsite.php?webid="+webid+"&datum="+datum).success(function(data){
        $scope.userids = data;
        var fbcanvas = document.getElementById('verdacht');
        fbcanvas.innerHTML =
        "<p>UserId von WebsiteId <span style='color: #ff0000'>"+webname+"</span> am <span style='color: #ff0000'>"+datum+"</span></p>";
      });
  };

  /*
  * Get WebsiteName
  */
  $scope.getWebName = function () {
  console.log('generate WebsiteName...');
  $("#webdat").css("display","block");
  var fbcanvas = document.getElementById('loadsearch');
  fbcanvas.innerHTML =
  "<p>Loading...</p>";
  $http.post("ajax/getWebsiteName.php").success(function(data){
        $("#websearch").css("display","block");
        $("#loadsearch").css("display","none");
        $("#arrow").css("display","block");
        $scope.webnames = data;
        console.log('success');
      });
  };

  $scope.getInfoWebName = function(webname,webid){
    console.log(webname+' '+webid);
    $("#webdat").css("display","block");
    var fbcanvas = document.getElementById('webdat');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $http.post("ajax/getWebDatum.php?webid="+webid).success(function(data){
      $("#websiteinfo").css("display","block");
      $("#webdat").css("display","none");
      $scope.webdatums = data;
      console.log('success');
      var fbcanvas = document.getElementById('web_satz');
      fbcanvas.innerHTML =
      "<p>WebsiteName : <span style='color: #ff0000'>"+webname+"</span></p>";
    });
  }

  /*
  * Get CampaignId
  */
  $scope.getCampaign = function () {
  console.log('generate CampaignId...');
  $("#cmpgndat").css("display","block");
  var fbcanvas = document.getElementById('loadsearchcmpgn');
  fbcanvas.innerHTML =
  "<p>Loading...</p>";
  $http.post("ajax/getCampaignId.php").success(function(data){
        $("#cmpgnsearch").css("display","block");
        $("#loadsearchcmpgn").css("display","none");
        $("#arrow").css("display","block");
        $scope.campaigns = data;
        console.log('success');
      });
  };

  /*
  * Recompile div to set attribute ng-click
  * Source : http://jsfiddle.net/r2vb1ahy/
  */
  function compile(element){
    var el = angular.element(element);    
    $scope = el.scope();
    $injector = el.injector();
    $injector.invoke(function($compile){
     $compile(el)($scope)
    })     
  }


  $scope.getInfoCmpgnId = function(cmpgnid){
    console.log(cmpgnid);
    $("#cmpgndat").css("display","block");
    var fbcanvas = document.getElementById('cmpgndat');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $http.post("ajax/getInfoCampaignId.php?cmpgnid="+cmpgnid).success(function(data){
      $("#cmpgninfo").css("display","block");
      $("#cmpgndat").css("display","none");
      $scope.cmpgninfos = data;
      console.log('success');
      var fbcanvas1 = document.getElementById('cmpgn_satz');
      fbcanvas1.innerHTML =
      "<p>CampaignId : <span style='color: #ff0000'>"+cmpgnid+"</span></p>";

      //Set ng-click attribute
      var el_state = document.getElementById("cmpgn_stateid");
      el_state.removeAttribute("ng-click");
      el_state.setAttribute("ng-click", "getInfoStateId("+cmpgnid+")");
      compile(el_state);
      var el_user = document.getElementById("cmpgn_userid");
      el_user.removeAttribute("ng-click");
      el_user.setAttribute("ng-click", "getInfoCmpgnUid("+cmpgnid+")");
      compile(el_user);
      var el_os = document.getElementById("cmpgn_osid");
      el_os.removeAttribute("ng-click");
      el_os.setAttribute("ng-click", "getInfoCmpgnOsId("+cmpgnid+")");
      compile(el_os);
      var el_browser = document.getElementById("cmpgn_browserid");
      el_browser.removeAttribute("ng-click");
      el_browser.setAttribute("ng-click", "getInfoCmpgnBrowserId("+cmpgnid+")");
      compile(el_browser);
    });
  }

  /*
  * Get InfoState
  */
  $scope.getInfoStateId = function (ueberid) {
  console.log("Info StateId von CampaignId : "+ueberid);
  /*$("#cmpgndat").css("display","block");
  var fbcanvas = document.getElementById('loadsearchcmpgn');
  fbcanvas.innerHTML =
  "<p>Loading...</p>";
  $http.post("ajax/getCampaignId.php").success(function(data){
        $("#cmpgnsearch").css("display","block");
        $("#loadsearchcmpgn").css("display","none");
        $("#arrow").css("display","block");
        $scope.campaigns = data;
        console.log('success');
      });*/
  };

  /*
  * Get InfoUserId
  */
  $scope.getInfoCmpgnUid = function (ueberid) {
  console.log("Info UserId von CampaignId : "+ueberid);
  };

   /*
  * Get InfoOsId
  */
  $scope.getInfoCmpgnOsId = function (ueberid) {
  console.log("Info OsId von CampaignId : "+ueberid);
  };

   /*
  * Get InfoBrowserId
  */
  $scope.getInfoCmpgnBrowserId = function (ueberid) {
  console.log("Info BrowserId von CampaignId : "+ueberid);
  };

});
