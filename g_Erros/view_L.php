<? session_start();
  if (!isset($_SESSION["usser"] ))
{?> <script>location.href = "../index/index.php";</script><? }?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
        <?php
          include('../_includes/head.php');
           $h  = new cHead();   $h  -> __print_Head();
		 ?>

        <script src="js.js"></script>
        <script src="../_User_Gestion/js_by_login.js"></script>

       <script>
	      $(document).ready(function (){ $( '#viewGER' ).css('display', 'none'); __get_Lista_Erros( ); });
	   </script>

  </head>

<body>
<div id="art-main">

<header class="art-header clearfix">
    <!--banner------><? include("../_includes/banner.php"); $bn = new cBanner(); $bn -> __printBanner_(); ?>
    <!--ul----------><? include("../_includes/UL.php");     $ul = new cUL();     $ul -> __printUL('true'); ?>
</header>


<div class="art-sheet clearfix">
<div class="art-layout-wrapper clearfix">
<div class="art-content-layout">
<div class="art-content-layout-row"><!--menu---><? include("../_includes/menu.php"); $mn = new cMenu(); $mn -> __printMenu_(); ?>
<div class="art-layout-cell art-content clearfix">

	<table width="100%">
               <tr>
                <td width="58%" align="center">

               <!--***************************************-->
               <!--***************************************-->
               <!--ACA SE CREA EL FORM SEGUN EL MENU Y ROL-->
                <div style="width: 98%;" >                                      
                    <!--bloque pag-->
                        <article class="box" >

                           <h5><b>LISTA DE ERROS</b></h5><br />
							<!--Classes para style
						      1. ''
                              2. cell-border
3. stripe
4. row-border
5. order-column
6. hover
7. Display
8. table table-striped table-bordered //ok
9. table table-striped table-bordered
10.
                              -->
							<table id="_list" class="display compact" style="width:100%">
								<thead>
									<tr>
										<th>Data</th>
										<th>Tipo</th>
										<th>Desc</th>
										<th>Usuario</th>
										<th></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Data</th>
										<th>Tipo</th>
										<th>Desc</th>
										<th>Usuario</th>
										<th></th>
									</tr>
								</tfoot>
							</table>
                        </article>
                    <!--end bloque pag-->
                   </div>
                   <br />


		</td>
	   </tr>
	  </table>


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
