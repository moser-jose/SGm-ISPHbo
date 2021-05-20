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
     function ___view_GRAFIC__( r ){
     $('#container').highcharts({
        chart: {
            renderTo: 'container'
        },
        title: {
            text: 'MATRÍCULAS FEITAS'
        },
        subtitle: {
            text: '...quantidade de matrículas feitas x semestre...'
        },
        xAxis: {
            categories: ['Sem.1', 'Sem.2', 'Sem.3', 'Sem.4', 'Sem.5', 'Sem.6', 'Sem.7', 'Sem.8', 'Sem.9', 'Sem.10'],
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
				   data: [parseInt(r[0][0]), parseInt(r[1][0]), parseInt(r[2][0]), parseInt(r[3][0]), parseInt(r[4][0]), parseInt(r[5][0]),
						  parseInt(r[6][0]), parseInt(r[7][0]), parseInt(r[8][0]), parseInt(r[9][0])]
				 },
				 {
				   type: 'column',
				   name: 'Homens',
				   color: Highcharts.getOptions().colors[0],
				   data: [parseInt(r[0][1]), parseInt(r[1][1]), parseInt(r[2][1]), parseInt(r[3][1]), parseInt(r[4][1]), parseInt(r[5][1]),
						  parseInt(r[6][1]), parseInt(r[7][1]), parseInt(r[8][1]), parseInt(r[9][1])]

               }]
    });
}
		</script>
      
<!--------------------------------------------------------------------------------------->
       <!--------------------------------------------------------------------------------------->
        <script type="text/javascript">
		   $(document).ready(function (){
			   
			   __GET_CURSO_(  'curso', '../../g_Estudante/_forms_subModules/D_pessonais/php.php' );
				_set_YearBox( 'ano' );
			                                   ___view_GRAFIC__( ___Grafic_cs__() )   ;			  			  
			  $( '#ano'   ).change(function(){ ___view_GRAFIC__( ___Grafic_cs__() ) });			   
			  $( '#curso' ).change(function(){ ___view_GRAFIC__( ___Grafic_cs__() ) });			   
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
			  <font style="font-family: Arial; font-size: 14px">Curso:</font><select id="curso"></select><br/> 
			  <hr size="1px" color="#CCC" width="35%" style="margin: 1.5px 0 0.5px 0" />
              <font style="font-family: Arial; font-size: 14px">Ano:</font><select id="ano" ></select>   
			  
              <hr size="1px" color="#CCC" width="99.5%" />
          </div>
      </form>
      
        <div id="container" style="min-width: 310px; height: 450px; width: 100%; margin: 0 auto"></div>

	</body>
</html>

