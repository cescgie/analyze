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
      "<p>CampaignId : <span style='color: #ff0000;'>"+cmpgnid+"</span></p>";

      var fbcanvas3 = document.getElementById('cmpgn_userid');
      fbcanvas3.innerHTML =
      "<p><a id='cmpgn_userid_a'>UserId</a></p>";

      var fbcanvas2 = document.getElementById('cmpgn_stateid');
      fbcanvas2.innerHTML =
      "<p><a id='cmpgn_stateid_a'>StateId</a></p>";

      var fbcanvas4 = document.getElementById('cmpgn_osid');
      fbcanvas4.innerHTML =
      "<p><a id='cmpgn_osid_a'>OsId</a></p>";

      var fbcanvas5 = document.getElementById('cmpgn_browserid');
      fbcanvas5.innerHTML =
      "<p><a id='cmpgn_browserid_a'>BrowserId</a></p>";

      //Set ng-click attribute
      var el_state = document.getElementById("cmpgn_stateid_a");
      el_state.getAttribute("ng-click");
      el_state.removeAttribute("ng-click");
      el_state.setAttribute("ng-click", "getInfoStateId("+cmpgnid+")");
      compile(el_state);
      console.log(el_state);

      var el_user = document.getElementById("cmpgn_userid_a");
      el_user.getAttribute("ng-click");
      el_user.removeAttribute("ng-click");
      el_user.setAttribute("ng-click", "getInfoCmpgnUid("+cmpgnid+")");
      compile(el_user);
      console.log(el_user);

      var el_os = document.getElementById("cmpgn_osid_a");
      el_os.getAttribute("ng-click");
      el_os.removeAttribute("ng-click");
      el_os.setAttribute("ng-click", "getInfoCmpgnOsId("+cmpgnid+")");
      compile(el_os);
      console.log(el_os);

      var el_browser = document.getElementById("cmpgn_browserid_a");
      el_browser.getAttribute("ng-click");
      el_browser.removeAttribute("ng-click");
      el_browser.setAttribute("ng-click", "getInfoCmpgnBrowserId("+cmpgnid+")");
      compile(el_browser);
      console.log(el_browser);

    });
  }

  /*
  * Get InfoUserId
  */
  $scope.getInfoCmpgnUid = function (cmpgnid) {
    console.log("Info UserId von CampaignId : "+cmpgnid);
    $("#ueberdat").css("display","block");
    var fbcanvas = document.getElementById('ueberdat');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    var fbcanvas2 = document.getElementById('uebertitle');
    fbcanvas2.innerHTML =
    "<span style='color: #ff0000'>UserId</span>";
    var fbcanvas3 = document.getElementById('ueber_satz');
      fbcanvas3.innerHTML =
      "<p>Liste der <span style='color: #ff0000;'>UserId</span> von CampaignId <span style='color: #ff0000;'>"+cmpgnid+"</span></p>";

    $http.post("ajax/getCampaignUserId.php?cmpgnid="+cmpgnid).success(function(data){
          //$("#ueberdat").css("display","none");
          $("#cmpginfouid_tab").hide();
          $("#cmpgnstateid_tab").hide();
          $("#cmpgnosid_tab").hide();
          $("#cmpgnbrowserid_tab").hide();
          $("#ueberdat").css("display","none");

          //$("#arrow").css("display","block");
          $("#cmpgnuserid_tab").show();
          $scope.campaignuserids = data;
          console.log('success');

      });

  };

  /*
  * Get InfoState
  */
  $scope.getInfoStateId = function (cmpgnid) {

    console.log("Info StateId von CampaignId : "+cmpgnid);
    $("#ueberdat").css("display","block");
    var fbcanvas = document.getElementById('ueberdat');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    var fbcanvas2 = document.getElementById('uebertitle');
    fbcanvas2.innerHTML =
    "<span style='color: #ff0000'>StateId</span>";
    var fbcanvas3 = document.getElementById('ueber_satz');
    fbcanvas3.innerHTML =
    "<p>Liste der <span style='color: #ff0000;'>StateId</span> von CampaignId <span style='color: #ff0000;'>"+cmpgnid+"</span></p>";

      $http.post("ajax/getCampaignStateId.php?cmpgnid="+cmpgnid).success(function(data){
          //$("#cmpgnstateid_tab").css("display","block");
          $("#cmpgnuserid_tab").hide();
          $("#cmpgnosid_tab").hide();
          $("#cmpgnbrowserid_tab").hide();
          $("#cmpgnstateid_tab").show();
          $("#cmpginfouid_tab").hide();

          $("#ueberdat").css("display","none");
          $scope.campaignstateids = data;
          console.log('success');
        });
  };

   /*
  * Get InfoOsId
  */
  $scope.getInfoCmpgnOsId = function (cmpgnid) {
  $("#cmpgnuserid_tab").css("display","none");
  $("#cmpgnstateid_tab").css("display","none");
  $("#cmpgnbrowserid_tab").css("display","none");

  console.log("Info OsId von CampaignId : "+cmpgnid);
  $("#ueberdat").css("display","block");
  var fbcanvas = document.getElementById('ueberdat');
  fbcanvas.innerHTML =
  "<p>Loading...</p>";
  var fbcanvas2 = document.getElementById('uebertitle');
  fbcanvas2.innerHTML =
  "<span style='color: #ff0000'>OsId</span>";
  var fbcanvas3 = document.getElementById('ueber_satz');
  fbcanvas3.innerHTML =
  "<p>Liste der <span style='color: #ff0000;'>OsId(Betriebsysteme)</span> von CampaignId <span style='color: #ff0000;'>"+cmpgnid+"</span></p>";

  $http.post("ajax/getCampaignOsId.php?cmpgnid="+cmpgnid).success(function(data){
        //$("#cmpgnosid_tab").css("display","block");
        $("#cmpgnuserid_tab").hide();
        $("#cmpgnosid_tab").show();
        $("#cmpgnbrowserid_tab").hide();
        $("#cmpgnstateid_tab").hide();
        $("#cmpginfouid_tab").hide();

        $("#ueberdat").css("display","none");
        $scope.campaignosids = data;
        console.log('success');
      });
  };

  /*
  * Get InfoBrowserId
  */
  $scope.getInfoCmpgnBrowserId = function (cmpgnid) {

    console.log("Info BrowserId von CampaignId : "+cmpgnid);
    $("#ueberdat").css("display","block");
    var fbcanvas = document.getElementById('ueberdat');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    var fbcanvas2 = document.getElementById('uebertitle');
    fbcanvas2.innerHTML =
    "<span style='color: #ff0000'>BrowserId</span>";
    var fbcanvas3 = document.getElementById('ueber_satz');
    fbcanvas3.innerHTML =
    "<p>Liste der <span style='color: #ff0000;'>BrowserId</span> von CampaignId <span style='color: #ff0000;'>"+cmpgnid+"</span></p>";

    $http.post("ajax/getCampaignBrowserId.php?cmpgnid="+cmpgnid).success(function(data){
          //$("#cmpgnbrowserid_tab").css("display","block");
          $("#cmpgnuserid_tab").hide();
          $("#cmpgnosid_tab").hide();
          $("#cmpgnbrowserid_tab").show();
          $("#cmpgnstateid_tab").hide();
          $("#cmpginfouid_tab").hide();

          $("#ueberdat").css("display","none");
          $scope.campaignbrowserids = data;
          console.log('success');
      });
  };

  /*
  * Get Info Campaign von UserId
  */
  $scope.getCampaignFromUid = function (userid,cmpgnid) {
    $http.post("ajax/getCampaignInfoUserId.php?userid="+userid+"&cmpgnid="+cmpgnid).success(function(data){
        $("#cmpgnuserid_tab").hide();
        $("#cmpgnosid_tab").hide();
        $("#cmpgnbrowserid_tab").hide();
        $("#cmpgnstateid_tab").hide();
        $("#cmpginfouid_tab").show();
        console.log("Campaign Info UserId success");
        $scope.cmpgninfouids = data;
      });
  };

  /*
  * Get Info Campaign von UserId
  */
  $scope.getInfoFromUid = function (userid,datum){
    //console.log(userid+'-'+datum);
    $http.post("ajax/getInfoUserId.php?datum="+datum+"&userid="+userid).success(function(data){
        $("#seite1").hide();
        $("#seite2").hide();
        $("#seite3").hide();
        $("#seite4").show();
        $("#seite3_li").removeClass("active");
      	$("#seite2_li").removeClass("active");
      	$("#seite1_li").removeClass("active");
      	$("#seite4_li").addClass("active");
        console.log("Info UserId success");
        $scope.infouids = data;
      });
  };

  /*
  * Get UserId from Seite3,send it to Seite4, and automaticaly change to Seite4
  * Seite4
  */
  $scope.sendIdToSeite4 = function(userid){
    $("#seite1").hide();
    $("#seite2").hide();
    $("#seite3").hide();
    $("#seite4").show();
    $("#seite3_li").removeClass("active");
    $("#seite2_li").removeClass("active");
    $("#seite1_li").removeClass("active");
    $("#seite4_li").addClass("active");

    $("#uid_input_show").hide();
    var fbcanvas1 = document.getElementById('uid_input_hid');
    fbcanvas1.innerHTML =
    '<input id="uid_input" ng-model="uid_input" name="uid_input" type="text" value='+userid+'>';
    console.log("setUidInput :"+userid);
  };

  /*
  * Select Datum from Selection
  * Seite4
  */
  $scope.setDateInput=function(datum){
    $("#date_input_show").hide();
    var fbcanvas1 = document.getElementById('date_input_hid');
    fbcanvas1.innerHTML =
    '<input id="date_input" ng-model="date_input" name="date_input" type="text" value='+datum.DateEntered+'>';
    console.log("setDateInput :"+datum.DateEntered);

  }

  var formData = {
    uid_input: "default",
    date_input: "default"
  };

  /*
  * Seite4
  * Send input value (UserId & Datum)
  */
  $scope.formSubmit=function(){
    console.log("formSubmit");
    var datum = $("#date_input").val();
    var userid = $("#uid_input").val();
    console.log(userid +' - '+ datum);
    var fbcanvas1 = document.getElementById('uber_title');
    fbcanvas1.innerHTML =
    "<p>UserId : <span style='color: #ff0000'>"+userid+"</span></p><p>Datum : <span style='color: #ff0000'>"+datum+"</span></p>";

    $("#userid_div_s4").css("display","none");
    /*$http.post("ajax/getInfoUserId.php?datum="+datum+"&userid="+userid).success(function(data){
      $("#userid_div_s4").css("display","block");
      $scope.infodateuids = data;
    });*/
    $("#useridinfo_s4").css("display","block");
    if(datum && userid){
      var fbcanvas1 = document.getElementById('webid_s4');
      fbcanvas1.innerHTML =
      "<p><a id='webid_a_s4'>WebsiteId</a></p>";

      var fbcanvas3 = document.getElementById('cmpgnid_s4');
      fbcanvas3.innerHTML =
      "<p><a id='cmpgn_a_s4'>CampaignId</a></p>";

      /*var fbcanvas2 = document.getElementById('stateid_s4');
      fbcanvas2.innerHTML =
      "<p><a id='stateid_a_s4'>StateId</a></p>";

      var fbcanvas4 = document.getElementById('osid_s4');
      fbcanvas4.innerHTML =
      "<p><a id='osid_a_s4'>OsId</a></p>";

      var fbcanvas5 = document.getElementById('browserid_s4');
      fbcanvas5.innerHTML =
      "<p><a id='browserid_a_s4'>BrowserId</a></p>";
      */

      //Set ng-click attribute
      var el_Website = document.getElementById("webid_a_s4");
      el_Website.getAttribute("ng-click");
      el_Website.removeAttribute("ng-click");
      el_Website.setAttribute("ng-click", "getInfoUidWebId('"+userid+"','"+datum+"')");
      compile(el_Website);
      console.log(el_Website);

      var el_cmpgn = document.getElementById("cmpgn_a_s4");
      el_cmpgn.getAttribute("ng-click");
      el_cmpgn.removeAttribute("ng-click");
      el_cmpgn.setAttribute("ng-click", "getInfoUidCmpgn('"+userid+"','"+datum+"')");
      compile(el_cmpgn);
      console.log(el_cmpgn);

      /*
      var el_state = document.getElementById("stateid_a_s4");
      el_state.getAttribute("ng-click");
      el_state.removeAttribute("ng-click");
      el_state.setAttribute("ng-click", "getInfoUidStateId('"+userid+"','"+datum+"')");
      compile(el_state);
      console.log(el_state);

      var el_os = document.getElementById("osid_a_s4");
      el_os.getAttribute("ng-click");
      el_os.removeAttribute("ng-click");
      el_os.setAttribute("ng-click", "getInfoUidOsId('"+userid+"','"+datum+"')");
      compile(el_os);
      console.log(el_os);

      var el_browser = document.getElementById("browserid_a_s4");
      el_browser.getAttribute("ng-click");
      el_browser.removeAttribute("ng-click");
      el_browser.setAttribute("ng-click", "getInfoUidBrowserId('"+userid+"','"+datum+"')");
      compile(el_browser);
      console.log(el_browser);
      */
    }
  }

  /*
  * UserId nach WebsiteId
  */
  $scope.getInfoUidWebId = function(userid,datum){
    console.log("Web "+datum+"-"+userid);
    $("#useridwebid_div_s4").css("display","none");
    $("#useridcmpgnid_div_s4").css("display","none");
    $http.post("ajax/getUserIdWebId.php?datum="+datum+"&userid="+userid).success(function(data){
      console.log("success");
      $scope.infouidwebids = data;

      //var datum = $scope.infouidwebids[0].DateEntered;
      var webid = $scope.infouidwebids[0].WebsiteId;
      var webname = $scope.infouidwebids[0].WebsiteName;
      console.log($scope.infouidwebids[0].DateEntered);
      console.log(userid);
      console.log(webid);
      console.log(webname);
      console.log(datum);

      $("#useridwebid_div_s4").css("display","block");

      var fbcanvas1 = document.getElementById('uiwebname');
      fbcanvas1.innerHTML =
      "<p><a id='webidy_a_s4'>Check</a></p>";

      //Set ng-click attribute
      var el_webname = document.getElementById("webidy_a_s4");
      el_webname.getAttribute("ng-click");
      el_webname.removeAttribute("ng-click");
      el_webname.setAttribute("ng-click", "getInfoFromWebName('"+webid+"','"+userid+"','"+datum+"')");
      compile(el_webname);
    });
  }

  /*
  * UserId nach CampaignId
  */
  $scope.getInfoUidCmpgn = function(userid,datum){
    console.log("Cmpgn "+datum+"-"+userid);
    $("#useridwebid_div_s4").css("display","none");
    $("#useridcmpgnid_div_s4").css("display","none");
    $http.post("ajax/getUserIdCampaignId.php?datum="+datum+"&userid="+userid).success(function(data){
      console.log("success");
      $scope.uidcmpgns = data;
      $("#useridcmpgnid_div_s4").css("display","block");
    });
  }

  /*
  * UserId nach StateId
  */
  $scope.getInfoUidStateId = function(datum,userid){
    console.log("State "+datum+"-"+userid);
  }

  /*
  * UserId nach OsId
  */
  $scope.getInfoUidOsId = function(datum,userid){
    console.log("Os "+datum+"-"+userid);
  }

  /*
  * UserId nach BrowserId
  */
  $scope.getInfoUidBrowserId = function(datum,userid){
    console.log("Browser "+datum+"-"+userid);
    $http.post("ajax/getInfoUserIdBrowserId.php?datum="+datum+"&userid="+userid).success(function(data){
      console.log("success");
    });
  }

  $scope.getInfoFromWebName = function(webid,userid,datum){
    console.log(webid+"_"+userid+"_"+datum);
  }
});
