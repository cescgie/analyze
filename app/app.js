//Define an angular module for our app
var app = angular.module('myApp', []);

app.controller('tasksController', function($scope, $http) {
  //TAB1

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
        /*$('a').on('click', function(){
          $('a').css("background-color","");
          $(this).css("background-color","yellow");
        });*/
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
        /*$('a').on('click', function(){
          $('a').css("background-color","");
          $(this).css("background-color","yellow");
        });*/
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
        /*$('a').on('click', function(){
          $('a').css("background-color","");
          $(this).css("background-color","yellow");
        });*/
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
  //END OF TAB1

  //TAB2
  /*
  * Get WebsiteName
  */
  $scope.getWebName = function () {
  console.log('generate WebsiteName...');
  $("#webdat").css("display","block");
  var fbcanvas = document.getElementById('loadsearch');
  fbcanvas.innerHTML =
  "<p>Loading...</p>";
  $("#loadsearch").css("display","block");
  $("#websearch").css("display","none");
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
    $("#websiteinfo").css("display","none");
    $("#webdatum_div").css("display","none");
    $("#webdatum_div_title").css("display","none");
    var fbcanvas = document.getElementById('webdat');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $http.post("ajax/getWebDatum.php?webid="+webid).success(function(data){
      $("#websiteinfo").css("display","block");
      //$("#webdat").css("display","block");
      $scope.webdatums = data;
      console.log('success');
      var fbcanvas = document.getElementById('webdat');
      fbcanvas.innerHTML =
      "<p>WebsiteName : <span style='color: #ff0000'>"+webname+"</span></p>";
    });
  }

  /*
  * Update Excel-Datei für Website
  */
  $scope.updateWebsiteExcelTable=function(datum,webid,impr){
    console.log("updateWebsiteExcelTable "+datum+"_"+webid+"_"+impr);
    $http.post("excel/Liste_der_UserId_Von_WebsiteId.php?webid="+webid+"&datum="+datum+"&impr="+impr).success(function(data){
      console.log("updateWebsiteExcelTable success");
    });
  }

  /*
  * Get info from WebsiteId nach Datum
  */
  $scope.getInfoWebDat = function(datum,webid){
    $("#webdatum_div").css("display","none");
    $("#webdatum_div_title").css("display","block");
    var fbcanvas = document.getElementById('webdatum_div_title');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    console.log(datum+"_"+webid);
    $http.post("ajax/getInfoWebIdDatumS2.php?webid="+webid+"&datum="+datum).success(function(data){
      console.log("success");
      $scope.webiddat2s = data;
      console.log($scope.webiddat2s);
      $("#webdatum_div").css("display","block");
      var fbcanvas = document.getElementById('webdatum_div_title');
      fbcanvas.innerHTML =
      "<p>Liste der UserId von WebsiteId : <span style='color: #ff0000'>"+webid+"</span> am <span style='color: #ff0000'>"+datum+"</span> mit >30 Impressions limit 200</p>";
    });
  }

  /*
  * Info von UserId nach Datum und WebsiteId
  */
  $scope.sendIdToSub2=function(userid,datum,webid){
    console.log(userid+"-"+datum+"-"+webid);
    $("#sub1_div").hide();
    $("#sub2_div").show();
    $("#sub1_li").removeClass("active");
    $("#sub2_li").addClass("active");
    $("#webinfoinfo_div_s2").hide();
    var fbcanvas = document.getElementById('infoinfo_div_s2_title');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $("#button_infoinfo_div_s2_title").css("display","none");
    $http.post("ajax/getInfoUserIdWebIdS4.php?webid="+webid+"&userid="+userid+"&datum="+datum).success(function(data){
      console.log("success_ss");
      $scope.infouidwebiddatums2s = data;
      var fbcanvas = document.getElementById('infoinfo_div_s2_title');
      fbcanvas.innerHTML =
      "<p>UserId : <span style='color: #ff0000'>"+userid+"</span></p><p>Datum : <span style='color: #ff0000'>"+datum+"</span></p><p>WebsiteId : <span style='color: #ff0000'>"+webid+"</span></p>";
      $("#button_infoinfo_div_s2_title").css("display","block");

      //$("#infoinfo_div_s4_title").css("display","none");
      $("#webinfoinfo_div_s2").show();
      console.log($scope.infouidwebiddatums2s);
    });
  }

  $scope.updateUidWebDatExcel=function(userid,datum,webid){
    console.log("updateUidWebDatExcel :"+userid+"-"+datum+"-"+webid);
    $http.post("excel/Info_von_UserId_WebsiteId.php?userid="+userid+"&datum="+datum+"&webid="+webid).success(function(data){
      console.log("updateCampaignExcelTable success");
    });
  }
  //END OF TAB2

  //TAB3

  /*
  * Get CampaignId
  */
  $scope.getCampaign = function () {
  console.log('generate CampaignId...');
  $("#cmpgndat").css("display","block");
  var fbcanvas = document.getElementById('loadsearchcmpgn');
  fbcanvas.innerHTML =
  "<p>Loading...</p>";
  $("#loadsearchcmpgn").css("display","block");
  $("#cmpgnsearch").css("display","none");
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

  $scope.getInfoCmpgnIdS3 = function(cmpgnid){
    console.log(cmpgnid);
    $("#cmpgndat").css("display","block");
    $("#cmpgninfo").css("display","none");
    var fbcanvas = document.getElementById('cmpgndat');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $http.post("ajax/getCampaignDatum.php?cmpgnid="+cmpgnid).success(function(data){
      $("#cmpgninfo").css("display","block");
      //$("#cmpgndat").css("display","none");
      $scope.cmpgninfos = data;
      console.log('success');
      var fbcanvas1 = document.getElementById('cmpgndat');
      fbcanvas1.innerHTML =
      "<p>CampaignId : <span style='color: #ff0000;'>"+cmpgnid+"</span></p>";
    });
  }

  $scope.getInfoCmpgnDat=function (datum,cmpgnid){
    $("#cmpgndatum_div").css("display","none");
    var fbcanvas = document.getElementById('cmpgndatum_div_title');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    console.log(datum+"_"+cmpgnid);
    $http.post("ajax/getInfoCampaignDatumS3.php?cmpgnid="+cmpgnid+"&datum="+datum).success(function(data){
      console.log("success");
      $scope.cmpgniddats = data;
      console.log($scope.cmpgniddats);
      $("#cmpgndatum_div").css("display","block");
      var fbcanvas = document.getElementById('cmpgndatum_div_title');
      fbcanvas.innerHTML =
      "<p>Liste der UserId von CampaignId : <span style='color: #ff0000'>"+cmpgnid+"</span> am <span style='color: #ff0000'>"+datum+"</span></p>";
    });
  }

  /*
  * Update Excel Datei für Campaign
  */
  $scope.updateCampaignExcelTable=function(datum,cmpgnid,impr){
    console.log("updateCampaignExcelTable "+datum+"_"+cmpgnid);
    $http.post("excel/Liste_der_UserId_Von_CampaignId.php?cmpgnid="+cmpgnid+"&datum="+datum+"&impr="+impr).success(function(data){
      console.log("updateCampaignExcelTable success");
    });
  }

  /*
  * Get InfoUserId
  */
  $scope.getInfoCmpgnUid = function (cmpgnid) {
    $("#cmpgnbrowserid_tab").css("display","none");
    $("#cmpgnosid_tab").css("display","none");
    $("#cmpgnstateid_tab").css("display","none");

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
    $("#cmpgnuserid_tab").css("display","none");
    $("#cmpgnosid_tab").css("display","none");
    $("#cmpgnbrowserid_tab").css("display","none");

    console.log("Info CityId von CampaignId : "+cmpgnid);
    $("#ueberdat").css("display","block");
    //$("#ueberinfo").hide();
    var fbcanvas = document.getElementById('ueberdat');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    var fbcanvas2 = document.getElementById('uebertitle');
    fbcanvas2.innerHTML =
    "<span style='color: #ff0000'>CityId</span>";
    var fbcanvas3 = document.getElementById('ueber_satz');
    fbcanvas3.innerHTML =
    "<p>Liste der <span style='color: #ff0000;'>CityId</span> von CampaignId <span style='color: #ff0000;'>"+cmpgnid+"</span></p>";

      $http.post("ajax/getCampaignStateId.php?cmpgnid="+cmpgnid).success(function(data){
          //$("#cmpgnstateid_tab").css("display","block");
          $("#cmpgnuserid_tab").hide();
          $("#cmpgnosid_tab").hide();
          $("#cmpgnbrowserid_tab").hide();
          $("#cmpgnstateid_tab").show();
          $("#cmpginfouid_tab").hide();

          $("#ueberdat").css("display","none");
          $scope.campaignstateids = data;
          //$("#ueberinfo").show();
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
    $("#cmpgnuserid_tab").css("display","none");
    $("#cmpgnosid_tab").css("display","none");
    $("#cmpgnstateid_tab").css("display","none");

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
  $scope.sendIdToSeite4 = function(userid,datum){
    $("#seite1").hide();
    $("#seite2").hide();
    $("#seite3").hide();
    $("#seite4").show();
    $("#seite3_li").removeClass("active");
    $("#seite2_li").removeClass("active");
    $("#seite1_li").removeClass("active");
    $("#seite4_li").addClass("active");

    $("#uid_input_show").hide();
    $("#date_input_show").hide();
    $("#useridinfo_s4").css("display","none");
    $("#useridwebid_div_s4").css("display","none");
    $("#useridcmpgnid_div_s4").css("display","none");
    $("#webinfoinfo_div_s4").css("display","none");
    $("#cmpgninfoinfo_div_s4").css("display","none");
    $("#uber_content_title").css("display","none");

    var fbcanvas1 = document.getElementById('uid_input_hid');
    fbcanvas1.innerHTML =
    '<input style="color:red;" id="uid_input" ng-model="uid_input" name="uid_input" type="text" value='+userid+'>';

    var fbcanvas2 = document.getElementById('date_input_hid');
    fbcanvas2.innerHTML =
    '<input style="color:red;" id="date_input" ng-model="date_input" name="date_input" type="text" value='+datum+'>';
    console.log("setUidInput :"+userid);
  };

  /*
  * Info von UserId nach Datum und CampaignId
  */
  $scope.sendIdToSub3 = function(userid,datum,cmpgnid){
    console.log(userid+"__"+datum+"__"+cmpgnid);
    $("#tab3sub1_div").hide();
    $("#tab3sub2_div").show();
    $("#tab3sub1_li").removeClass("active");
    $("#tab3sub2_li").addClass("active");
    $("#cmpgninfoinfo_div_s3").hide();
    var fbcanvas = document.getElementById('infoinfo_div_s3_title');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $("#button_infoinfo_div_s3_title").css("display","none");

    $http.post("ajax/getInfoUserIdCmpgnIdS4.php?cmpgnid="+cmpgnid+"&userid="+userid+"&datum="+datum).success(function(data){
      console.log("success");
      $scope.infouidcmpgniddatums3s = data;
      //console.log($scope.infouidcmpgniddatums4s);
      var fbcanvas = document.getElementById('infoinfo_div_s3_title');
      fbcanvas.innerHTML =
      "<p>UserId : <span style='color: #ff0000'>"+userid+"</span></p><p>Datum : <span style='color: #ff0000'>"+datum+"</span></p><p>CampaignId : <span style='color: #ff0000'>"+cmpgnid+"</span></p>";

      $("#button_infoinfo_div_s3_title").css("display","block");
      $("#cmpgninfoinfo_div_s3").show();
    });
  }

  $scope.updateUidCampDatExcel = function(userid,datum,cmpgnid){
    console.log("updateUidCampDatExcel :"+userid+"-"+datum+"-"+cmpgnid);
    $http.post("excel/Info_von_UserId_CampaignId.php?userid="+userid+"&datum="+datum+"&cmpgnid="+cmpgnid).success(function(data){
      console.log("updateCampaignExcelTable success");
    });
  }
  //END OF TAB3

  //TAB4
  /*
  * Select Datum from Selection
  * Seite4
  */
  $scope.setDateInput=function(datum){
    $("#date_input_show").hide();
    //$("#uber_all_col2").css("display","none");

    //Hidden all table wenn date changed
    $("#useridinfo_s4").css("display","none");
    $("#useridwebid_div_s4").css("display","none");
    $("#useridcmpgnid_div_s4").css("display","none");
    $("#webinfoinfo_div_s4").css("display","none");
    $("#cmpgninfoinfo_div_s4").css("display","none");
    $("#uber_content_title").css("display","none");

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

    //Show ueberblick table wenn userid & date submit
    $("#useridinfo_s4").css("display","block");
    $("#useridwebid_div_s4").css("display","none");
    $("#useridcmpgnid_div_s4").css("display","none");
    $("#webinfoinfo_div_s4").css("display","none");
    $("#cmpgninfoinfo_div_s4").css("display","none");
    $("#uber_content_title").css("display","none");

    var datum = $("#date_input").val();
    var userid = $("#uid_input").val();
    console.log(userid +' - '+ datum);
    $('#uber_title').css("display","block");
    var fbcanvas = document.getElementById('uber_title');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    /*setTimeout(function(){
      //$('#uber_title').css("display","block");
      var fbcanvas1 = document.getElementById('uber_title');
      fbcanvas1.innerHTML =
      "<p>UserId : <span style='color: #ff0000'>"+userid+"</span></p><p>Datum : <span style='color: #ff0000'>"+datum+"</span></p>";
    }, 1000);*/


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
    $("#uber_title").css("display","none");
  }

  /*
  * UserId nach WebsiteId
  */
  $scope.getInfoUidWebId = function(userid,datum){
    console.log("Web "+datum+"-"+userid);
    $("#useridwebid_div_s4").css("display","none");
    $("#useridcmpgnid_div_s4").css("display","none");
    $("#uber_content_title").css("display","block");
    $("#webinfoinfo_div_s4").hide();
    $("#cmpgninfoinfo_div_s4").hide();
    var fbcanvas = document.getElementById('uber_content_title');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $http.post("ajax/getUserIdWebId.php?datum="+datum+"&userid="+userid).success(function(data){
      console.log("success");
      /*var fbcanvas = document.getElementById('uber_content_title');
      fbcanvas.innerHTML =
      "<p>UserId : <span style='color: #ff0000'>"+userid+"</span></p><p>Datum : <span style='color: #ff0000'>"+datum+"</span></p>";
      */
      $("#uber_content_title").css("display","none");
      $scope.infouidwebids = data;
      if(data==0){
        $("#uber_content_title").css("display","block");
        var fbcanvas = document.getElementById('uber_content_title');
        fbcanvas.innerHTML =
        "<p>No Data.</p>";
        console.log("Data NULL");
        $("#useridwebid_div_s4").css("display","none");
      }else{
        var webid = $scope.infouidwebids[0].WebsiteId;
        var webname = $scope.infouidwebids[0].WebsiteName;
        //var datum = $scope.infouidwebids[0].DateEntered;

        //console.log($scope.infouidwebids[0].DateEntered);
        //console.log(userid);
        //console.log(webid);
        //console.log(webname);
        //console.log(datum);
        //console.log($scope.infouidwebids.length);
        var table = document.getElementById('table_web_div');
        var table_row_length = document.getElementById('table_web_div').rows.length;
        var table_row;
        var cell;
        for(var i=0;i<$scope.infouidwebids.length;i++){
          //console.log($scope.infouidwebids[i]);
          //console.log(table_row_length);

          // Check if already exists
          var check = $('#webidy_a_s4'+i).text();
          //console.log(check);
          if(check!=$scope.infouidwebids[i].WebsiteName){
            table_row = table.insertRow(i+1);

            cell1 = table_row.insertCell(0);
            cell2 = table_row.insertCell(1);

            cell1.innerHTML="<p><a href='#' id='webidy_a_s4"+i+"'>"+$scope.infouidwebids[i].WebsiteName+"</a></p>";
            cell2.innerHTML="<p>"+$scope.infouidwebids[i].Sum+"</p>";

            var el_webname = document.getElementById("webidy_a_s4"+i);
            el_webname.getAttribute("ng-click");
            el_webname.removeAttribute("ng-click");
            el_webname.setAttribute("ng-click", "getInfoFromWebName('"+$scope.infouidwebids[i].WebsiteId+"','"+userid+"','"+datum+"');updateUidWebDatExcel('"+userid+"','"+datum+"','"+$scope.infouidwebids[i].WebsiteId+"');");
            compile(el_webname);
          }
        }
        $("#useridwebid_div_s4").css("display","block");
      } //Check if Data NULL
    });
  }

  /*
  * UserId nach CampaignId
  */
  $scope.getInfoUidCmpgn = function(userid,datum){
    console.log("Cmpgn "+datum+"-"+userid);
    $("#useridwebid_div_s4").css("display","none");
    $("#useridcmpgnid_div_s4").css("display","none");
    $("#uber_content_title").css("display","block");
    $("#webinfoinfo_div_s4").hide();
    $("#cmpgninfoinfo_div_s4").hide();
    var fbcanvas = document.getElementById('uber_content_title');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $http.post("ajax/getUserIdCampaignId.php?datum="+datum+"&userid="+userid).success(function(data){
      console.log("success");
      /*var fbcanvas = document.getElementById('uber_content_title');
      fbcanvas.innerHTML =
      "<p>UserId : <span style='color: #ff0000'>"+userid+"</span></p><p>Datum : <span style='color: #ff0000'>"+datum+"</span></p>";
      */
      $("#uber_content_title").css("display","none");
      //$scope.uidcmpgns = data;
      $scope.uidcmpgns = data;
      if(data==0){
        $("#uber_content_title").css("display","block");
        var fbcanvas = document.getElementById('uber_content_title');
        fbcanvas.innerHTML =
        "<p>No Data.</p>";
        console.log("Data NULL");
        $("#useridwebid_div_s4").css("display","none");
      }else{
        console.log("DATA EXISTS");
        var cmpgnid = $scope.uidcmpgns[0].CampaignId;
        //console.log(userid);
        //console.log(webid);
        //console.log(cmpgnid);
        //console.log(datum);
        var table = document.getElementById('table_cmpgn_div');
        var table_row_length = document.getElementById('table_cmpgn_div').rows.length;
        var table_row;
        var cell;
        for(var i=0;i<$scope.uidcmpgns.length;i++){
          // Check if already exists
          var check = $('#cmpgnidy_a_s4'+i).text();
          if(check!=$scope.uidcmpgns[i].CampaignId){
            table_row = table.insertRow(i+1);

            cell1 = table_row.insertCell(0);
            cell2 = table_row.insertCell(1);

            cell1.innerHTML="<p><a href='#' id='cmpgnidy_a_s4"+i+"'>"+$scope.uidcmpgns[i].CampaignId+"</a></p>";
            cell2.innerHTML="<p>"+$scope.uidcmpgns[i].Sum+"</p>";

            var el_cmpgn = document.getElementById("cmpgnidy_a_s4"+i);
            el_cmpgn.getAttribute("ng-click");
            el_cmpgn.removeAttribute("ng-click");
            el_cmpgn.setAttribute("ng-click", "getInfoFromCmpgnId('"+$scope.uidcmpgns[i].CampaignId+"','"+userid+"','"+datum+"');updateUidCampDatExcel('"+userid+"','"+datum+"','"+$scope.uidcmpgns[i].CampaignId+"');");
            compile(el_cmpgn);
          }
        }
        $("#useridcmpgnid_div_s4").css("display","block");
      }
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

  /*
  * get all Website Info from UserId, DateEntered
  */
  $scope.getInfoFromWebName = function(webid,userid,datum){
    console.log(webid+"_"+userid+"_"+datum);
    $("#webinfoinfo_div_s4").hide();
    $("#cmpgninfoinfo_div_s4").hide();
    $("#infoinfo_div_s4_title").css("display","block");
    var fbcanvas = document.getElementById('infoinfo_div_s4_title');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $http.post("ajax/getInfoUserIdWebIdS4.php?webid="+webid+"&userid="+userid+"&datum="+datum).success(function(data){
      console.log("success");
      $scope.infouidwebiddatums = data;
      /*var fbcanvas = document.getElementById('infoinfo_div_s4_title');
      fbcanvas.innerHTML =
      "<p>UserId : <span style='color: #ff0000'>"+userid+"</span></p><p>Datum : <span style='color: #ff0000'>"+datum+"</span></p>";
      */
      $("#infoinfo_div_s4_title").css("display","none");
      $("#webinfoinfo_div_s4").show();
      console.log($scope.infouidwebiddatums);
    });
  }

  /*
  *
  */
  $scope.getInfoFromCmpgnId=function(cmpgnid,userid,datum){
    console.log(cmpgnid+"_"+userid+"_"+datum);
    $("#webinfoinfo_div_s4").hide();
    $("#cmpgninfoinfo_div_s4").hide();
    $("#infoinfo_div_s4_title").css("display","block");
    var fbcanvas = document.getElementById('infoinfo_div_s4_title');
    fbcanvas.innerHTML =
    "<p>Loading...</p>";
    $http.post("ajax/getInfoUserIdCmpgnIdS4.php?cmpgnid="+cmpgnid+"&userid="+userid+"&datum="+datum).success(function(data){
      console.log("success");
      $scope.infouidcmpgniddatums = data;
      console.log($scope.infouidcmpgniddatums);
      /*var fbcanvas = document.getElementById('infoinfo_div_s4_title');
      fbcanvas.innerHTML =
      "<p>UserId : <span style='color: #ff0000'>"+userid+"</span></p><p>Datum : <span style='color: #ff0000'>"+datum+"</span></p>";
      */
      $("#infoinfo_div_s4_title").css("display","none");
      $("#cmpgninfoinfo_div_s4").show();
    });
  }
  //END OF TAB4
});
