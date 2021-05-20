<?
function __printLogoForm(){?>
	<div id="fAutenticar" align="center" style="margin-top: 15em">
     <table bgcolor="#FFF" width="100%" style=" box-shadow:0 0 2px 1px rgba(0, 0, 0, 0.2); border:1px solid #008DC3; border-radius:58px 0px 0px 0px; margin-top:2px"">
     <tr>
     <td>
      &nbsp;&nbsp;&nbsp;&nbsp;
     </td>
     <td align="right" width="40%">
       <img src="../images/images.jpg" width="125" height="105" />
     </td>
     <td>   
     
        <table  cellpadding="0" cellspacing="0" width="45%" align="left">
        <tr><td colspan="4" align="center"><b>ACCESO AL SISTEMA</b></td></tr>
<tr><td colspan="4"><hr size="1px" width="97%" /></td></tr> 
        <tr height="40px" >
        <td align="right" width="30%">Usuario:</td>
        <td width="5px">&nbsp;</td>
        <td>
        <input type="text" name="usuario" id="usuario"  onkeypress="$(this).keypress(function(e){ if (e.keyCode == 13) __login() })" />        
        <font size="2" color="#B81900">*</font>
        </td>        
        </tr>

        <tr>
        <td align="right">Contraseña:</td>
        <td width="5px">&nbsp;</td>
        <td>
         <input type="password"  name="pass" id="pass" onkeypress="$(this).keypress(function(e){ if (e.keyCode == 13) __login() })" />        
         <font size="2" color="#B81900">*</font>
        </td>
        </tr>
<tr><td colspan="4" ><hr size="1px" width="100%" /></td></tr>
        <tr>
       
        <td colspan="4" align="left">   
          <div class="learn-button" align="right" style="margin-right:1.9em">                                   
             <a class="art-button" style="cursor:pointer; href="javascript: __login();" id="save_">Autenticar</a>
          </div> 
                                  
          <div style="margin-top:7px; display:none" id="error_"><img src="../images/mono-icons/paperlock32.png" width="18" height="18"/><font color="#FF0048">&nbsp;&nbsp;Error al Autenticar!</font></div>                                                            
        </td>
        </tr>
        </table>
        
     </td>
     <td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     </td>
    </tr>
   </table>  
   
  <br />
  <table bgcolor="#FFF" width="100%" style=" box-shadow:0 0 2px 1px rgba(0, 0, 0, 0.2); border:1px solid #008DC3; border-radius:58px 0px 0px 0px">
    <tr ><td>&nbsp;</td></tr>
  </table>
  

  <table bgcolor="#FFF" width="100%" style=" box-shadow:0 0 2px 1px rgba(0, 0, 0, 0.2);  border:1px solid #008DC3; border-radius:58px 0px 0px 0px; margin-top:2px">
    <tr ><td>&nbsp;</td></tr>
  </table>
  
  <br /><br />

  <table bgcolor="#FFF" width="100%" style=" box-shadow:0 0 2px 1px rgba(0, 0, 0, 0.2); border:1px solid #008DC3;  border-radius:58px 0px 0px 0px; margin-top:2px">
    <tr ><td>&nbsp;</td></tr>
  </table>
         
       </div>
	<? } 
?>