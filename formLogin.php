 <fieldset>
                             <legend>USUARIOS REGISTRADOS</legend>
                             
<form  method="post" class="" >
    <div class="inline_field">
        <label for="EmailLogin" class="accessible">Tu email</label>
        <span class="custom_input_dark"> 
            <input style="width:243px;" id="EmailLogin" name="EmailLogin" placeholder="Tu email" title="Tu email" type="text" value="<?php if (isset($_COOKIE['registro'])){echo $_COOKIE['registro'];}?>" />
        </span>
        
    </div><!-- .inline_field -->
    
    <div class="inline_field">
        <label for="PasswordLogin" class="accessible">Tu contrase&#241;a</label>
        <span class="custom_input_dark">
            <input style="width:243px;" id="PasswordLogin" name="PasswordLogin" placeholder="Tu contraseña" style="display:inline-block;" title="Tu contraseña" type="password" value="" />

        </span>
        
    </div><!-- .inline_field -->
    
    <div class="inline_field">
        <input checked="checked" class="default_check" id="Remember" name="Remember" type="checkbox" value="true" /><input name="Remember" type="hidden" value="false" />
        <label>Recordarme</label>        
        <a href="" style="height:10px;">&#191;Olvidaste tus datos?</a>
    </div><!-- .inline_field -->

    <div id="divLoginSubmit" type="submit" class="actions_submit">
        <button type="submit" onclick="validarLogin(); return false"class="btn_submit actions_submit_excep"><span>Loguear</span></button>
    </div><!-- .actions_submit -->
    
<button type="" onclick="LoguearAdmin(); return false"class="btn_submit" style="background-color:aqua;width:100px;"><span>Test Admin</span></button>
<br>
<button type="" onclick="LoguearUser(); return false"class="btn_submit" style="background-color:red;width:100px;"><span>Test User</span></button>

</form>

 <div class="mod_double_line_dark_separator" id="errorLogin"> </div>

 <div id="Register">

  </div>

                     </div>

        </div>             