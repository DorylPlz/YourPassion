
                <script>
 var check = function() {
      if (document.getElementById('newpass1').value ==
          document.getElementById('newpass2').value) {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = 'Las contraseñas coinciden';
      } else {
            document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'Las contraseñas no coinciden';
      }
  }
</script>
        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="image-style style1 large-block">
                        <h3>Cambio de contraseña</h3>

                            <form action="<?php echo site_url("usr/confpass"); ?>" method="post">
                                <div class="form-group">
                                    <label>Ingrese su nueva contraseña:</label>
                                    <input type="hidden" name="token" value="<?= $token ?>"  required>
                                    <input type="password" name="newpass1" id="newpass1" class="input-text full-width" placeholder="Contraseña" onkeyup='check();' required>

                                </div>
                               <div class="form-group">
                                    <input type="password" name="newpass2" id="newpass2" class="input-text full-width" placeholder="Vuelva a escribir su contraseña" onkeyup='check();' required>
                                    <hr/>
                                    <span id="message"></span>
                                </div> 
                                <div class="form-group">
                                    <hr/>
                                    <button type="submit" class="full-width btn-medium">Restablecer contraseña</button>
                                </div>
                            </form>

                        <div class="clearfix"></div>
                    </div>

                    
                </div> <!-- end main -->
            </div>
        </section>
