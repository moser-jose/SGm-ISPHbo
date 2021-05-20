<?php session_start(); 
  if (!isset($_SESSION["usser"]))
{?> <script>location.href = "../_Index/index.php";</script><? }?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">        
        <link rel="stylesheet" href="../../css/style.css" media="screen">
        <link rel="stylesheet" href="../../css/style_views.css" media="screen">
        
        
        <script src="../jquery/jquery.min.js"></script>		
		<style type="text/css"> ${demo.css} </style>
		
	 <script type="text/javascript">
     function ___view_GRAFIC__( _v, _r ){
     $('#container').highcharts({
        chart: {
            renderTo: 'container'
        },
        title: {
            text: 'MATRÍCULAS FEITAS'
        },
        subtitle: {
            text: '...quantidade de matrículas feitas x usuário...'
        },
        xAxis: {
            categories: _r,
        },
        yAxis: {
            min: 0,
            title: {
                text: '--Matrículas--'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat:  '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                		  '<td style="padding:0"><b>{point.y:.1f} Quant.</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
			area: {
				marker: {
					enabled: false,
					states: {
						hover: {
							enabled: true,
							radius: 5
						}}
				}}
		},
		 
        series: [{ type: 'column',
				   name: 'Mulheres',
				   color: Highcharts.getOptions().colors[3],
				   data: _v[0]
				 },
				 {
				   type: 'column',
				   name: 'Homens',
				   color: Highcharts.getOptions().colors[0],
				   data: _v[1]

               }]
    });
}
		</script>
      
<!--------------------------------------------------------------------------------------->
       <!--------------------------------------------------------------------------------------->
        <script type="text/javascript">
		   $(document).ready(function (){
			   
			   //__GET_CURSO_(  'curso', '../../g_Estudante/_forms_subModules/D_pessonais/php.php' );
			   
			       se =document.getElementById( 'ano' );  
			       op ='<option style="cursor:pointer" value="--Todos--">--Todos--</option>';			   
		           se.innerHTML = op; 
				  
				  _set_YearBox( 'ano' );  
				  
				                                ___view_GRAFIC__( ___Grafic_um__(), __get_Usuario__()[1] );
                $( '#ano' ).change(function (){ ___view_GRAFIC__( ___Grafic_um__(), __get_Usuario__()[1] ); });				
		   });
		</script> 
       <!--------------------------------------------------------------------------------------->
       <!--------------------------------------------------------------------------------------->                
	
	 <script src="../js/highcharts.js"></script>	
     <script src="../../_js_css/___dll_jquery.js"></script>           
     <script src="../../_js_css/_all_view.js"></script>           
    
     <script src="../js/modules/exporting.js">     </script>
     <script type="text/javascript" src="../js.js"></script>
		
 </head>
     
	<body >
		  <form method="post">
			  <div align="right"> 		  
				  <font style="font-family: Arial; font-size: 14px">Ano:</font><select id="ano" ></select>   				  
				  <hr size="1px" color="#CCC" width="99.5%" />
			  </div>
		  </form>
              <div id="container" style="min-width: 310px; height: 450px; width: 100%; margin: 0 auto"></div>

	</body>
</html>

