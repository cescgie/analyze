//Define an angular module for our app
var app = angular.module('myApp', []);

app.controller('tasksController', function($scope, $http) {
  //getTask(); // Load all available tasks
  getDatum();

  /*
  * Get Datumseinträge
  */
  function getDatum(){
  $http.post("ajax/getDatum.php").success(function(data){
        $scope.datums = data;
        //getInfoUid(NULL,NULL);
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
    $http.post("ajax/getInfoUserId.php?datum="+datum+"&userid="+userid).success(function(data){
        $scope.userids2 = data;
        console.log(datum);
        console.log(userid);
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
  * Get InfoIpAddress from IpAddress, UserId & datum
  */
  $scope.getInfoIp = function (ip) {
    $http.post("ajax/getInfoIpAddress.php?ip="+ip).success(function(data){
        $scope.ipaddresses = data;
        console.log(ip);
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
  * Get InfoUserId from UserId, WebsiteId,IpAddres & DateEntered
  */
  $scope.getInfoUidIp = function (userid,datum,webid,ip) {
    $http.post("ajax/getInfoUserId.php?datum="+datum+"&userid="+userid+"&webid="+webid+"&ip="+ip).success(function(data){
        $scope.userids2 = data;
        console.log(datum);
        console.log(userid);
        var fbcanvas = document.getElementById('uid');
        fbcanvas.innerHTML =
        "<p>UserId <span style='color: #ff0000'>"+userid+"</span> auf WebsiteId <span style='color: #ff0000'>"+webid+"</span> am <span style='color: #ff0000'>"+datum+"</span></p>";

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

  $scope.click = function (test) {
    $http.post("ajax/classDat/getUserId?datum="+test).success(function(data){
      $scope.yuhus = data;
      console.log('ok');
      console.log(test);
      //alert($scope.yuhus);
    });
  };
});
