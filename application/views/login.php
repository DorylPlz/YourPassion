

        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="image-style style1 large-block">
                        

                        <form action="<?php echo site_url('usr/login'); ?>" method="post">
                            <div class="form-group">
                                <label>Inicio de sesión:</label>
                                <input type="text" name="email" class="input-text full-width" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass" class="input-text full-width" placeholder="Contraseña" required>
                            </div>
                            <div class="form-group">
                                <a href="#" class="forgot-password pull-right">¿Olvidaste tu contraseña?</a>
                                <div class="checkbox checkbox-inline">
                                    <label>
                                        <input type="checkbox"> Recordarme
                                    </label>
                                </div>
                                <hr/>
                                <button type="submit" class="full-width btn-medium">Iniciar Sesión</button>
                            </div>
                        </form>

                        <div class="clearfix"></div>
                    </div>

                    
                </div> <!-- end main -->
            </div>
        </section>
