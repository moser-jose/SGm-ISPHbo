<?php session_start(); 
  if (!isset($_SESSION[ "usser" ])) {?>
  <script>location.href = "../_Index/index.php";</script><? }?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
	    <?php  
          include('../_includes/head.php');
           $h  = new cHead();   $h  -> __print_Head();		       
		 ?>
        
        <script src="../_User_Gestion/js_by_login.js"></script>	  	  
  </head>
  
<body>
<div id="art-main">

<header class="art-header clearfix">
    <!--banner------><? include("../_includes/banner.php"); $bn = new cBanner(); $bn -> __printBanner_(); ?>
    <!--ul----------><? include("../_includes/UL.php");     $ul = new cUL();     $ul -> __printUL(''); ?>                     
</header>


<div class="art-sheet clearfix">
<div class="art-layout-wrapper clearfix">
<div class="art-content-layout">
<div class="art-content-layout-row"><!--menu---><? include("../_includes/menu.php"); $mn = new cMenu(); $mn -> __printMenu_(); ?>
<div class="art-layout-cell art-content clearfix">
                        
   		  <!--***************************************-->                
			<!-- Start WOWSlider.com BODY section -->
			 <iframe src="../_Slide-/wowslider.html" width="100%" height="440px" scrolling="no" style="margin-top: 3px" frameborder="0"></iframe>
			<!-- End WOWSlider.com BODY section -->
           <!--***************************************-->                       
                
</div>
     



</div>
</div>
</div>
</div>

<footer class="art-footer clearfix">
  <!--footer--><? include("../_includes/footer.php"); $f = new cFooter(); $f -> __printFooter(); ?>
</footer>

</div>


</body></html>     