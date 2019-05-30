
<?php foreach($eventoPerfil->result_array() as $eve){ ?>
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title"><?php echo $eve['eve_nombre']; ?></h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">Eventos</a></li>
                    <li class="active"><?php echo $eve['eve_nombre']; ?></li>
                </ul>
            </div>
        </div>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-md-9">
                        <div class="tab-container style1" id="hotel-main-content">
                            <ul class="tabs">
                                <li class="active"><a data-toggle="tab" href="#photos-tab">Imagenes</a></li>
                                <li><a data-toggle="tab" href="#map-tab">Lugar</a></li>
                                <?php if($CheckAdm == 1){?>
                                    <li><a href="<?php echo site_url('evento/mod_eve?profile=');?><?php echo $eve['id_evento']; ?>">Modificar evento</a></li>
                                <?php } ?>
                            </ul>
                            <div class="tab-content">
                                <div id="photos-tab" class="tab-pane fade in active">
                                    <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                                    <?php if($galeria != null){ foreach($galeria as $img){?>
                                        <ul class="slides">
                                        
                                                <li style="width:900px; height:500px;display: block; position:relative; overflow:hidden;"><img src="<?php echo base_url('assets/images/evento/galeria');?>/<?php echo $img['img_ruta'];?>" alt=" YourPassion" /></li>
                                            
                                        </ul>
                                        <?php }}else{ ?>
                                        <li><img src="<?php echo base_url('assets/images/'); ?>/YP-logo_full-black.png" alt="" /></li>
                                        <?php } ?>
                                    </div>
                                    
                                    <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                                        <ul class="slides">
                                        <?php foreach($galeria as $img){?>
                                                <li><img src="<?php echo base_url('assets/images/evento/galeria'); ?>/<?php echo $img['img_ruta'];?>" alt="" /></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <?php if($CheckAdm == 1){?>
                                        <div class="row">
                                            <div style="padding-left:10px;">
                                                <?php echo form_open_multipart('evento/subirGaleria');?>
                                                    <div class="col-md-12" data-for="message">
                                                        <input type="file" name="multipleFiles[]" multiple="multiple"><br><br>
                                                        <input type="hidden" name="evento" value="<?php echo $eve['id_evento'];?>" />
                                                        <div class="button yellow full-width uppercase btn-small"><button href="" name="submit" value="Submit" type="submit" class="btn btn-form btn-danger-outline display-4">Agregar nuevas imagenes</button></div>
                                                    </div>
                                                
                                                <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div id="map-tab" class="tab-pane fade">
                                    
                                </div>

                            </div>
                        </div>
                        
                        <div id="hotel-features" class="tab-container">
                            <ul class="tabs">
                                <li class="active"><a href="#hotel-description" data-toggle="tab">Descripción</a></li>
                                <?php if($eve['eve_estado'] == 2){ ?>
                                <li><a href="#hotel-reviews" data-toggle="tab">Opiniones</a></li>
                                <?php if($checkcompra == 1){?>
                                 <li><a href="#hotel-write-review" data-toggle="tab">Escribe una Opinión</a></li>
                                <?php } ?>

                                <?php } ?>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="hotel-description">
                                    <div class="intro table-wrapper full-width hidden-table-sms">
                                        <div class="col-sm-5 col-lg-12 features table-cell">
                                            <ul>
                                                <li><label>Dirección:</label><?php echo $eve['loc_calle']; echo " #"; echo $eve['loc_numero']; ?></li>
                                                <li><label>Comuna:</label><?php echo $eve['comu_nombre']; ?></li>
                                                <li><label>Región:</label><?php echo $eve['region_nombre']; ?></li>
                                                <li><label>NºContacto:</label><?php if($eve['eve_numero'] != 0){echo $eve['eve_numero'];}else{ echo "No hay numero registrado";} ?></li>
                                                <li><label>Email:</label><?php if($eve['eve_mail'] != null){echo $eve['eve_mail'];}else{ echo "No hay mail registrado";} ?></li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    <div class="long-description">
                                        <h2>Descripción del Evento</h2>
                                        <p>
                                            <?php echo $eve['eve_desc']; ?>
                                        </p>
                                    </div>
                                </div>
                                <?php if($eve['eve_estado'] == 2){ ?>
                                    <div class="tab-pane fade" id="hotel-reviews">
                                    <div class="intro table-wrapper full-width hidden-table-sms">
                                        <div class="rating table-cell col-sm-12">
                                            <span class="score"><?php echo $promedio; ?>/5.0</span>
                                            <div class="five-stars-container"><div class="five-stars" style="width: <?php echo $calificacion; ?>%;"></div></div>
                                            <a href="#" class="goto-writereview-pane button green btn-small full-width">DA TU OPINION</a>
                                        </div>
                                        
                                    </div>
                                    <div class="guest-reviews">
                                        <h2>Opiniones</h2>

                                        <?php if($reviews->num_rows() > 0 ){ foreach($reviews->result() as $rev){ ?>
                                        <div class="guest-review table-wrapper">
                                            <div class="col-xs-3 col-md-2 author table-cell">
                                                <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                                                <p class="name"><?php echo $rev->usu_nombre;?></p>
                                                <p class="date"><?php echo $rev->com_fecha;?></p>
                                            </div>
                                            <div class="col-xs-9 col-md-10 table-cell comment-container">
                                                <div class="comment-header clearfix">
                                                    <h4 class="comment-title">"<?php echo $rev->com_titulo;?>"</h4>
                                                    <div class="review-score">
                                                        <span class="score"><?php echo $rev->com_calificacion;?>/5.0</span>
                                                    </div>
                                                </div>
                                                <div class="comment-content">
                                                    <p><?php echo $rev->com_detalle;?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php  }}else{ ?>
                                            <div class="guest-review table-wrapper">
                                                <div class="col-xs-9 col-md-10 table-cell comment-container">
                                                    
                                                    <div class="comment-content">
                                                        <p>No hay opiniones para mostrar</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                    </div>
                                    <a href="#" class="button full-width btn-large">Ver más opiniones</a>
                                </div>
                                <div class="tab-pane fade" id="hotel-write-review">


                                        <div class="form-group col-md-5 no-float no-padding">
                                            <h4 class="title">Titulo</h4>
                                            <input id="tituloRev" type="text" name="review-title" class="input-text full-width" value="" placeholder="Titulo" />
                                        </div>
                                        <div class="form-group">
                                            <h4 class="title">Comentario</h4>
                                            <textarea id="comRev" class="input-text full-width" placeholder="Descripción" rows="5"></textarea>
                                        </div>
                                        <div class="form-group col-md-5 no-float no-padding">
                                            <h4 class="title">Calificación</h4>
                                            <div class="selector">
                                                <select class="full-width" id="calRev">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-5 no-float no-padding no-margin">
                                            <button onclick="sendReview()" class="btn-large full-width">Enviar calificación</button>
                                        </div>

                                    
                                </div>
                                <?php } ?>
                            </div>
                        
                        </div>
                    </div>
                    <div class="sidebar col-md-3">
                        <article class="detailed-logo">
                            <figure>
                                <img style="width:114px; height:85px;"  src="<?php if($eve['img_ruta'] != null){echo base_url('assets/images/evento/')?>/<?php echo $eve['img_ruta'];}else{echo base_url('assets/images/logoYP.png');}?>" alt="">
                            </figure>
                            <div class="details">
                                <h2 class="box-title"><?php echo $eve['eve_nombre']; ?><small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space">
                                <?php
                                    if($eve['local_nombre'] != null){
                                        echo $eve['local_nombre'];
                                    }else{
                                        echo $eve['loc_calle']; echo " #"; echo $eve['loc_numero'];
                                    }
                                ?>
                                </span></small></h2>

                                <?php if($eve['eve_estado'] == 1){ ?>
                                    <span class="price clearfix">
                                        <span class="pull-right"><?php if($eve['val_costo'] > 0){echo "$"; echo $eve['val_costo'];}else{echo "GRATIS";}?></span>
                                    </span>
                                <?php if($eve['val_costo'] > 0){?><a <?php if($this->session->userdata('login')){?> class="button yellow full-width uppercase btn-small" href="<?= site_url("evento/compraEntrada");?><?php echo "/".$eve['id_evento']."/".$eve['eve_nombre'];?>"<?php }else{ ?>  href="#login" class="button yellow full-width uppercase btn-small soap-popupbox" <?php } ?>>Comprar entrada</a><?php }else{}?>
                                <?php }elseif($eve['eve_estado'] == 2){ ?>
                                    <span class="price clearfix">
                                        <span class="pull-right"><?php if($eve['val_costo'] > 0){echo "$"; echo $eve['val_costo'];}else{echo "GRATIS";}?></span>
                                    </span>
                                    <a class="button red full-width uppercase btn-small">El evento ya terminó</a>
                                <?php }elseif($eve['eve_estado'] == 3){ ?>
                                    
                                    <span class="price clearfix">
                                        <span class="pull-right"><?php if($eve['val_costo'] > 0){echo "$"; echo $eve['val_costo'];}else{echo "GRATIS";}?></span>
                                    </span>
                                    <a class="button red full-width uppercase btn-small">El evento fué cancelado</a>
                                <?php }elseif($eve['eve_estado'] == 4){ ?>
                                    <span class="price clearfix">
                                        <span class="pull-right"><?php if($eve['val_costo'] > 0){echo "$"; echo $eve['val_costo'];}else{echo "GRATIS";}?></span>
                                    </span>
                                    <a class="button red full-width uppercase btn-small">El evento fué retrasado indefinidamente</a>
                                <?php } ?>

                            </div>
                        </article>
                        <div class="travelo-box">
                            <h4>Grupos invitados</h4>
                            <div class="image-box style14">
                                <?php if($GruposEve->result_array() != null){foreach($GruposEve->result_array() as $inv){?>
                                <article class="box">
                                    <figure>
                                        <a href="#"><img src="<?php echo base_url('assets/images/profile'); echo '/'; echo $inv['img_ruta'];?>" alt="" /></a>
                                    </figure>
                                    <div class="details">
                                        <h5 class="box-title"><a href="<?php echo site_url('grupo/perfil_grupo/'); echo '/'; echo $inv['id_grupo']; echo '/'; echo $inv['gru_nombre'];?>"><?php echo $inv['gru_nombre'];?></a></h5>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit"><?php $inv['gen_nombre']; ?></span><?php $inv['tipo_nombre'];?>
                                        </label>
                                    </div>
                                </article>
                                <?php }}else{ ?>
                                    <article class="box">
                                    <div class="details">
                                        <h5 class="box-title">No hay grupos para mostrar</h5>
                                    </div>
                                </article>
                                <?php }?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <script>
    function sendReview() {
        var tituloRev = jQuery("#tituloRev").val();
        var comRev = jQuery("#comRev").val();
        var calRev = jQuery("#calRev").val();
        jQuery.ajax({
            url: '<?php echo site_url('ajaxGral/setReview'); ?>',
            type: 'POST',
            data: {
                id: <?php echo $eve['id_evento'];?>,
                tipo: 3,
                titulo: tituloRev,
                desc: comRev,
                cal: calRev

            },
            success: function (respuesta) {
                if(respuesta == 1){
                    Swal.fire({
                        title: 'Ha escrito un comentario exitosamente',
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continuar'
                    }).then(() => {
                        location.reload();
                    })
                }else if(respuesta == 0){
                    Swal.fire({
                        title: 'Ha ocurrido un error',
                        type: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continuar'
                    })
                }
            },
            error: function () {
                
                    Swal.fire({
                        title: 'Ha ocurrido un error',
                        type: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continuar'
                    })
                
            }
        });
    }
    </script>
<?php } ?>
<?php if($galeria != null){ ?>
<!-- Flex Slider -->
<script type="text/javascript" src="<?php echo base_url('assets/components/flexslider/jquery.flexslider-min.js'); ?>"></script>
        <script type="text/javascript">
        tjq(document).ready(function() {
            tjq('.revolution-slider').revolution(
            {
                sliderType:"standard",
				sliderLayout:"auto",
				dottedOverlay:"none",
				delay:9000,
				navigation: {
					keyboardNavigation:"off",
					keyboard_direction: "horizontal",
					mouseScrollNavigation:"off",
					mouseScrollReverse:"default",
					onHoverStop:"on",
					touch:{
						touchenabled:"on",
						swipe_threshold: 75,
						swipe_min_touches: 1,
						swipe_direction: "horizontal",
						drag_block_vertical: false
					}
					,
					arrows: {
						style:"default",
						enable:true,
						hide_onmobile:false,
						hide_onleave:false,
						tmp:'',
						left: {
							h_align:"left",
							v_align:"center",
							h_offset:20,
							v_offset:0
						},
						right: {
							h_align:"right",
							v_align:"center",
							h_offset:20,
							v_offset:0
						}
					}
				},
				visibilityLevels:[1240,1024,778,480],
				gridwidth:1170,
				gridheight:646,
				lazyType:"none",
				shadow:0,
				spinner:"spinner4",
				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				shuffle:"off",
				autoHeight:"off",
				hideThumbsOnMobile:"off",
				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				debugMode:false,
				fallbacks: {
					simplifyAll:"off",
					nextSlideOnWindowFocus:"off",
					disableFocusListener:false,
				}
            });
        });
        
    </script>
    
<?php } ?>