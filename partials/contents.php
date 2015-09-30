<div class="widget-box" id="recent-box" ng-controller="tasksController" width="100%">

	<!-- Menu -->
	<ul class="nav nav-pills">
  		<li id="seite1_li" style="background-color:CCCCCC;"><a href="#" id="seite1_link">Seite 1</a></li>
  		<li id="seite2_li" style="background-color:CCCCCC;"><a href="#" id="seite2_link">Seite 2</a></li>
  		<li id="seite3_li" style="background-color:CCCCCC;"><a href="#" id="seite3_link">Seite 3</a></li>
	</ul>

	<script type="text/javascript">
	$("#seite1_link").on("click",function(){
		$("#seite2").hide();
		$("#seite3").hide();
		$("#seite1").show();
		$("#seite1_li").addClass("active");
		$("#seite2_li").removeClass("active");
		$("#seite3_li").removeClass("active");
	})
	$("#seite2_link").on("click",function(){
		$("#seite1").hide();		
		$("#seite3").hide();
		$("#seite2").show();
		$("#seite1_li").removeClass("active");
		$("#seite2_li").addClass("active");
		$("#seite3_li").removeClass("active");
	})
	$("#seite3_link").on("click",function(){
		$("#seite1").hide();
		$("#seite2").hide();
		$("#seite3").show();
		$("#seite1_li").removeClass("active");
		$("#seite2_li").removeClass("active");
		$("#seite3_li").addClass("active");
	})
	</script>

	<!-- SEITE 1 -->
	<?php include_once('seite1.php') ?>

	<!-- SEITE 2 -->
	<?php include_once('seite2.php') ?>

	<!-- SEITE 3 -->
	<?php include_once('seite3.php') ?>

</div>
