<div class="widget-box" id="recent-box" ng-controller="tasksController" width="100%">

	<!-- Menu -->
	<ul class="nav nav-pills">
  		<li id="seite1_li" style="background-color:CCCCCC;"><a href="#" id="seite1_link">Tab 1</a></li>
  		<li id="seite2_li" style="background-color:CCCCCC;"><a href="#" id="seite2_link">Tab 2</a></li>
  		<li id="seite3_li" style="background-color:CCCCCC;"><a href="#" id="seite3_link">Tab 3</a></li>
			<li id="seite4_li" style="background-color:CCCCCC;"><a href="#" id="seite4_link">Tab 4</a></li>
	</ul>

	<script type="text/javascript">
	$("#seite1_link").on("click",function(){
		$("#seite2").hide();
		$("#seite3").hide();
		$("#seite4").hide();
		$("#seite1").show();
		$("#seite1_li").addClass("active");
		$("#seite2_li").removeClass("active");
		$("#seite3_li").removeClass("active");
		$("#seite4_li").removeClass("active");
	})
	$("#seite2_link").on("click",function(){
		$("#seite1").hide();
		$("#seite3").hide();
		$("#seite4").hide();
		$("#seite2").show();
		$("#seite1_li").removeClass("active");
		$("#seite2_li").addClass("active");
		$("#seite3_li").removeClass("active");
		$("#seite4_li").removeClass("active");
		//Sub Menu
		$("#sub2_div").hide();
		$("#sub1_div").show();
		$("#sub1_li").addClass("active");
		$("#sub2_li").removeClass("active");
	})
	$("#seite3_link").on("click",function(){
		$("#seite1").hide();
		$("#seite2").hide();
		$("#seite4").hide();
		$("#seite3").show();
		$("#seite1_li").removeClass("active");
		$("#seite2_li").removeClass("active");
		$("#seite3_li").addClass("active");
		$("#seite4_li").removeClass("active");
		//Sub Menu
		$("#tab3sub2_div").hide();
		$("#tab3sub1_div").show();
		$("#tab3sub1_li").addClass("active");
		$("#tab3sub2_li").removeClass("active");
	})
	$("#seite4_link").on("click",function(){
		$("#seite1").hide();
		$("#seite2").hide();
		$("#seite3").hide();
		$("#seite4").show();
		$("#seite1_li").removeClass("active");
		$("#seite2_li").removeClass("active");
		$("#seite3_li").removeClass("active");
		$("#seite4_li").addClass("active");
	})

	</script>

	<!-- SEITE 1 -->
	<?php include_once('seite1.php') ?>

	<!-- SEITE 2 -->
	<?php include_once('seite2.php') ?>

	<!-- SEITE 3 -->
	<?php include_once('seite3.php') ?>

	<!-- SEITE 4 -->
	<?php include_once('seite4.php') ?>

	<!-- OS Browser -->
	<?php include_once('../includes/os_browser.php');?>

</div>
