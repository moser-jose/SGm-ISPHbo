<?
function confirmar ($title, $text, $button1, $button2){?>
<div id="dialog-confirm" title="<? echo $title; ?>" style="display: none">
<table>
<tr>
 <td align="justify" colspan="2">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><label id="text_"><? echo $text; ?></label></p>
 </td>
</tr>
<tr id="motDel" align="center" style="display: none">
 <th align="right">
  Motivo:
 </th>
 <td>
    <select id="motDell">
      <option value="Desertor">Desertor</option>
      <option value="Baja">Baja Sector</option>
    </select>
    <font color="#FF0000">*</font>
 </td>
</tr>    
<tr>
     <td align="right" colspan="2">             
     <form id="confirm" name="confirm" method="post"> 
         </br>        
            <input type="text" id="id_"     name="id_"      style="display:none" /> 
            <input type="text" id="fecha_"  name="fecha_"   style="display:none" /> 
            <input type="text" id="aprob_"  name="aprob_"   style="display:none" /> 
            <input type="text" id="ci_"     name="ci_"      style="display:none" />
            <input type="text" id="prov_"   name="prov_"    style="display:none" />      
            <input type="text" id="fecha_d" name="fecha_d"  style="display:none" />
            
                      
            <div style="margin-left: 20.5%">
            <ul id="nav" class="sf-menu gallery-filter">				  
               <a class="art-button" id="confirmar" href="javascript: <? echo $button1; ?>">Aceptar</a></li>                  
               <a class="art-button" id="c" href="javascript: <? echo $button2; ?>">Cancelar</a></li>
            </ul> 
            </div>
       </form>
      
       </td> 
   </tr>           
</table> 
</div>
<? }?>