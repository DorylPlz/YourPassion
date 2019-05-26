
    <?php foreach($evento->result() as $eve){?>
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Compra de entrada</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#"><?php echo $eve->eve_nombre;?></a></li>
                    <li><a href="#">Compra</a></li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="booking-information travelo-box">
                            <h2>Detalle del evento</h2>
                            
                            <dl class="term-description">
                                <dt>Dirección:</dt><dd><?php echo $eve->loc_calle." #".$eve->loc_numero; ?></dd>
                                <dt>Comuna:</dt><dd><?php echo $eve->comu_nombre;?></dd>
                                <dt>Región:</dt><dd><?php echo $eve->region_nombre;?></dd>
                                <dt>Numero de contacto:</dt><dd><?php echo $eve->eve_numero;?></dd>
                                <dt>Email:</dt><dd><?php echo $eve->eve_mail;?></dd>
                            </dl>
                            <hr />
                            <h2>Pago</h2>
                            <p>Al realizar el pago usted está aceptando nuestros <a href="<?= site_url("main/politicas"); ?>" class="skin-color">terminos y condiciones</a>.</p>
                            
                        </div>
                    </div>
                    <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                        <div class="booking-details travelo-box">
                            <h4>Detalles de la compra</h4>
                            <article class="image-box hotel listing-style1">
                                <figure class="clearfix">
                                    <a class="middle-block"><img style="width:270px; height:160px;" alt="" src="<?php if($eve->img_ruta == null){echo base_url("assets/images/logotiny.bmp");}else{ echo base_url("assets/images/evento"); echo "/".$eve->img_ruta;}?>"></a>
                                    <div class="travel-title">
                                        <h5 class="box-title"><?php echo $eve->eve_nombre;?><small><?php echo $eve->comu_nombre;?></small></h5>
                                    </div>
                                </figure>
                                <div class="details">
                                    <div class="constant-column-3 timing clearfix">
                                        <div class="check-in">
                                            <label>Fecha de la compra</label>
                                            <span><?php echo date("Y-m-d"); ?></span>
                                        </div>
                                        <div class="duration text-center">
                                            
                                        </div>
                                        <div class="check-out">
                                            <label>Fecha del evento</label>
                                            <span><?php echo $eve->eve_fecha;?><br /><?php echo $eve->eve_hora;?></span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            
                            <h4>Total a cancelar</h4>
                            <dl class="other-details">
                                <dt class="total-price">Precio:</dt><dd class="total-price-value">$<?php echo $eve->val_costo;?></dd>
                            </dl>
                            <form method="POST" action="<?php echo site_url('evento/compra/'); ?>">
                                <input name="eve" type="hidden" value="<?php echo $eve->id_evento; ?>"/>
                                <button type="submit" class="button yellow full-width uppercase btn-small">Comprar</button>
                            </form>
                        </div>
                        
                        <div class="travelo-box contact-box">
                            <h4>¿Necesitas ayuda?</h4>
                            <p>Siempre puedes <a href="<?= site_url("main/contactus"); ?>" class="skin-color">comunicarte con nosotros</a></p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-mail"></i> contacto@yourpassionweb.com</span>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>