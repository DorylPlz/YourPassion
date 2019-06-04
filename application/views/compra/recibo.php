
<div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Recibo de compra</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="<?php echo base_url();?>">Inicio</a></li>
                    <li><a href="#">Compra</a></li>
                    <li class="active">Recibo</li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                    <?php foreach($Boleta->result() as $bol){?>
                        <div class="booking-information travelo-box">
                            <h2>Recibo de compra</h2>
                            <hr />
                            <div class="booking-confirmation clearfix">
                                <i class="soap-icon-recommend icon circle"></i>
                                <div class="message">
                                    <h4 class="main-message">Gracias por tu compra, esta ya ha sido procesada.</h4>
                                    <p>Se ha enviado una copia del recibo a tu correo.</p>
                                </div>
                            </div>
                            <hr />
                            <h2>Información de la compra</h2>
                            <dl class="term-description">
                                <dt>Nº del recibo:</dt><dd>#<?php echo $bol->id_compra;?></dd>
                                <dt>Evento:</dt><dd><?php echo $bol->eve_nombre;?></dd>
                                <dt>Tipo:</dt><dd>Entrada</dd>
                                <dt>Fecha de compra:</dt><dd><?php echo $bol->compra_fecha;?></dd>
                                <dt>Fecha del evento:</dt><dd><?php echo $bol->eve_fecha;?></dd>
                                <dt>Valor total:</dt><dd>$<?php echo $bol->val_costo;?></dd>
                            </dl>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="sidebar col-sm-4 col-md-3">
                        <div class="travelo-box contact-box">
                            <h4>¿Necesitas ayuda?</h4>
                            <p>Siempre puedes contactarnos a nuestro correo de contacto</p>
                            <address class="contact-details">
                                <span class="contact-phone">contacto@yourpassionweb.com</span>
                            </address>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
