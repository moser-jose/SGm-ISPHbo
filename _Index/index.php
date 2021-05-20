<?php session_start(); ?>
 
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
        <?php 
          include ('../_includes/head.php');
           $h  = new cHead();   $h  -> __print_Head();		       
		 ?>
        
        <script src="../_User_Gestion/js_by_login.js"></script>
  </head>
  
<body onLoad="$('#usuario').focus()">
<div id="art-main" style="background-color: #C4C4C4">

<header class="art-header clearfix">
    <!--banner------><?php include("../_includes/banner.php"); $bn = new cBanner(); $bn -> __printBanner_(); ?>
    
</header>

<div class="art-sheet clearfix">
<div class="art-layout-wrapper clearfix">
<div class="art-content-layout">


         
     <!---menu-->
     <input type="hidden" value="_x" id="_x">




</div>
</div>
</div>
</div>


</div>


</body></html>