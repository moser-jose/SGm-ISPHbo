<?
function __print_Messagger_($id, $title, $txt){?>
<div id="<? echo $id; ?>" title="<? echo $title; ?>" style="display: none">
	
		<span class="ui-icon ui-icon-circle-check"></span>
		<div align="center" id="text_messager"><? echo $txt; ?></div>
	
    <hr size="1px" color="#CCCCCC" width="100%" />
    <div align="right">
     <input type="button" value="Aceptar" onClick="$( '#'+'<? echo $id ?>' ).dialog( 'close' );" style="cursor: pointer"/>
    </div>
</div>

<? } 
?>