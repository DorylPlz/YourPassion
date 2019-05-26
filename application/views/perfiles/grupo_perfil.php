       
<?php foreach($grupo->result_array() as $dataGrupo){ ?>

<?php
    $idgrupo = $dataGrupo['id_grupo'];
?>

<link href="<?php echo base_url('assets/js/packages/core/main.css'); ?>" rel='stylesheet' />
<link href="<?php echo base_url('assets/js/packages/daygrid/main.css'); ?>" rel='stylesheet' />
<link href="<?php echo base_url('assets/js/packages/timegrid/main.css'); ?>" rel='stylesheet' />
<link href="<?php echo base_url('assets/js/packages/list/main.css'); ?>" rel='stylesheet' />
<script src="<?php echo base_url('assets/js/packages/core/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/packages/interaction/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/packages/daygrid/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/packages/timegrid/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/packages/list/main.js'); ?>"></script>


        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title"><?php echo $dataGrupo['gru_nombre']; ?></h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="<?php echo site_url('main/grupos'); ?>">Grupos</a></li>
                    <li class="active">Grupo Detallado</li>
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
                                <li><a data-toggle="tab" href="#calendar-tab">Calendario</a></li>

                            <?php if($CheckAdm == 'true'){?>
                                <li><a href="<?php echo site_url('grupo/mod_grupo?profile=');?><?php echo $dataGrupo['id_grupo']; ?>">Modificar perfil</a></li>
                            <?php } ?>
                            </ul>

                            <div class="tab-content">
                                <div id="photos-tab" class="tab-pane fade in active">
                                    <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                                    <?php if($galeria != null){ foreach($galeria as $img){?>
                                        <ul class="slides">
                                            
                                                <li style="width:900px; height:500px;display: block; position:relative; overflow:hidden;"><img src="<?php echo base_url('assets/images/galeria'); ?>/<?php echo $img['img_ruta'];?>" alt=" YourPassion" /></li>

                                        </ul>
                                        <?php }}else{ ?>
                                                <li><img src="<?php echo base_url('assets/images/'); ?>/YP-logo_full-black.png" alt="" /></li>
                                            <?php } ?>
                                    </div>
                                    <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                                        <ul class="slides">
                                        <?php foreach($galeria as $img){?>
                                                <li><img src="<?php echo base_url('assets/images/galeria'); ?>/<?php echo $img['img_ruta'];?>" alt="" /></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <?php if($CheckAdm == 'true'){?>
                                        <div class="row">
                                            <div style="padding-left:10px;">
                                                <?php echo form_open_multipart('grupo/subirGaleria');?>
                                                    <div class="col-md-12" data-for="message">
                                                        <input type="file" name="multipleFiles[]" multiple="multiple"><br><br>
                                                        <input type="hidden" name="grupo" value="<?php echo $dataGrupo['id_grupo'];?>" />
                                                        <div class="button yellow full-width uppercase btn-small"><button href="" name="submit" value="Submit" type="submit" class="btn btn-form btn-danger-outline display-4">Agregar nuevas imagenes</button></div>
                                                    </div>
                                                
                                                <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div id="calendar-tab" class="tab-pane fade">
                                    <label>SELECT MONTH</label>
                                    <div class="col-sm-6 col-md-4 no-float no-padding">
                                        <div class="selector">
                                            <select class="full-width" id="select-month">
                                                <option value="2014-6">June 2014</option>
                                                <option value="2014-7">July 2014</option>
                                                <option value="2014-8">August 2014</option>
                                                <option value="2014-9">September 2014</option>
                                                <option value="2014-10">October 2014</option>
                                                <option value="2014-11">November 2014</option>
                                                <option value="2014-12">December 2014</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="calendar"></div>
                                            <div class="calendar-legend">
                                                <label class="available">available</label>
                                                <label class="unavailable">unavailable</label>
                                                <label class="past">past</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="hotel-features" class="tab-container">
                            <ul class="tabs">
                                <?php if($CheckAdm == 'true'){?>
                                    <li class="active"><a href="#hotel-publicacion" data-toggle="tab">Publicacion</a></li>
                                    <li><a href="#hotel-description" data-toggle="tab">Descripción</a></li>
                                    <li><a href="#hotel-reviews" data-toggle="tab">Opiniones</a></li>
                                    <li><a href="#hotel-publication" data-toggle="tab">Publicaciones</a></li>
                                <?php }else{ ?>
                                    <li class="active"><a href="#hotel-description" data-toggle="tab">Descripción</a></li>
                                    <li><a href="#hotel-reviews" data-toggle="tab">Opiniones</a></li>
                                    
                                    <li><a href="#hotel-publication" data-toggle="tab">Publicaciones</a></li>
                                    <li><a href="#hotel-write-review" data-toggle="tab">Escribe una Opinión</a></li>
                                <?php } ?>
                            </ul>
                            <div class="tab-content">

                            <?php if($CheckAdm == 'true'){?>

                                <div class="tab-pane fade in active" id="hotel-publicacion">
                                <h2>Nueva Publicación</h2>
                                    <div class="intro table-wrapper full-width hidden-table-sms">
                                        <form class="review-form" method="POST" action="<?php echo site_url('grupo/publicacion'); ?>">
                                            <div class="form-group col-md-5 no-float no-padding">
                                                <h4 class="title">Titulo</h4>
                                                <input type="text" name="titulo" class="input-text full-width" placeholder="Titulo" />
                                            </div>
                                            <div class="form-group">
                                                <textarea class="input-text full-width" name="texto" placeholder="Publicación" rows="5"></textarea>
                                                <input type="hidden" name="grupo" value="<?php echo $dataGrupo['id_grupo'];?>" />
                                            </div>
                                            
                                            <div class="form-group col-md-5 no-float no-padding no-margin">
                                                <button type="submit" class="btn-large full-width">Publicar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="long-description">
                                    
                                    </div>
                                </div>
                                
                                
                                
                                <div class="tab-pane fade" id="hotel-description">
                                    <div class="intro table-wrapper full-width hidden-table-sms">
                                        <div class="col-sm-5 col-lg-12 features table-cell">
                                            <ul>
                                                <li><label>Integrantes:</label><?php $i = 0; foreach($integrantes as $nIntegrantes){$i++;} echo $i; ?></li>
                                                <li><label>Formación:</label><?php echo $dataGrupo['gru_formacion']; ?></li>
                                                <li><label>Tipo:</label><?php echo $dataGrupo['tipo_nombre']; ?></li>
                                                <li><label>Estilo:</label><?php echo $dataGrupo['gen_nombre']; ?></li>
                                                <li><label>Región:</label><?php echo $dataGrupo['region_nombre']; ?></li>
                                                <li><label>Comuna:</label><?php echo $dataGrupo['comu_nombre']; ?></li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    <div class="long-description">
                                        <h2>Descripción del Grupo</h2>
                                        <p>
                                            <?php if($dataGrupo['gru_desc'] != ""){echo $dataGrupo['gru_desc'];}else{ echo "No hay descripción para mostrar";} ?>
                                        </p>
                                    </div>
                                </div>
                                
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
                                
                            <?php }else{ ?>
                                <div class="tab-pane fade in active" id="hotel-description">
                                    <div class="intro table-wrapper full-width hidden-table-sms">
                                        <div class="col-sm-5 col-lg-12 features table-cell">
                                            <ul>
                                                <li><label>Integrantes:</label><?php $i = 0; foreach($integrantes as $nIntegrantes){$i++;} echo $i; ?></li>
                                                <li><label>Formación:</label><?php echo $dataGrupo['gru_formacion']; ?></li>
                                                <li><label>Tipo:</label><?php echo $dataGrupo['tipo_nombre']; ?></li>
                                                <li><label>Estilo:</label><?php echo $dataGrupo['gen_nombre']; ?></li>
                                                <li><label>Región:</label><?php echo $dataGrupo['region_nombre']; ?></li>
                                                <li><label>Comuna:</label><?php echo $dataGrupo['comu_nombre']; ?></li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    <div class="long-description">
                                        <h2>Descripción del Grupo</h2>
                                        <p>
                                            <?php if($dataGrupo['gru_desc'] != ""){echo $dataGrupo['gru_desc'];}else{ echo "No hay descripción para mostrar";} ?>
                                        </p>
                                    </div>
                                </div>
                                
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
                            <?php } ?>


                            <div class="tab-pane fade" id="hotel-publication">
                                    
                                    <div class="guest-reviews">
                                        <h2>Publicaciones</h2>

                                        <?php if($publicaciones != null){ foreach($publicaciones as $p){?>
                                            <div class="guest-review table-wrapper">
                                            <div class="col-xs-3 col-md-2 author table-cell">
                                                <p class="date"><?php echo $p['fecha'];?></p>
                                            </div>
                                                <div class="col-xs-9 col-md-10 table-cell comment-container">
                                                    <div class="comment-header clearfix">
                                                        <h4 class="comment-title">"<?php echo $p['Titulo'];?>"</h4>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p><?php echo $p['texto'];?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }}else{ ?>
                                            <div class="guest-review table-wrapper">
                                                <div class="col-xs-9 col-md-10 table-cell comment-container">
                                                    <div class="comment-header clearfix">
                                                        <h2 class="comment-title">No hay publicaciones para mostrar</h2>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>


                                    </div>
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
                            </div>
                        
                        </div>
                    </div>
                    <div class="sidebar col-md-3">
                        <article class="detailed-logo">
                            <figure>
                                <?php foreach($imgPerfil as $imgP){ ?>
                                    <img style="width:114px; height:85px; position:relative;" src="<?php echo base_url('assets/images/profile'); ?>/<?php echo $imgP['img_ruta'];?>" alt="">
                                   <?php } ?>
                            </figure>
                            <div class="details">
                                <h2 class="box-title"><?php echo $dataGrupo['gru_nombre']; ?><small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space"><?php echo $dataGrupo['comu_nombre']; ?>, <?php echo $dataGrupo['region_nombre']; ?></span></small></h2>
                                <!--<span class="price clearfix">
                                    <span class="pull-right">5</span>
                                </span>-->
                                <div class="feedback clearfix">
                                    <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: <?php echo $calificacion; ?>%;"></span></div>
                                    <span class="review pull-right"><?php echo $reviews->num_rows();?> reviews</span>
                                </div>

                                <?php if($this->session->userdata('login')){ ?>
                                <a href="#invitarEvento" class="button yellow full-width uppercase btn-small soap-popupbox">Invitar a evento</a><hr/>

                                <?php if($seguido == 0){?>
                                    <button onclick="seguirGrupo(<?php echo $dataGrupo['id_grupo'];?>)" class="button green full-width uppercase btn-small soap-popupbox">Seguir</button>
                                <?php }else if($seguido == 1){ ?>
                                    <button onclick="dejarSeguir(<?php echo $dataGrupo['id_grupo'];?>)" class="button red full-width uppercase btn-small soap-popupbox">Dejar de seguir</button>
                                <?php } ?>
                                <div id="invitarEvento" class="travelo-login-box travelo-box">
                                                    <form action="<?php echo site_url('evento/invEvento'); ?>" method="post">
                                                        <div class="form-group">
                                                            <label>Invitación a mi evento:</label>
                                                            <label>Seleccione evento</label>
                                                            <input type="hidden" name="invitado" value="<?php echo $dataGrupo['id_grupo']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                        <div class="selector">
                                                            <select class="full-width" name="evento">
                                                            <?php foreach($eveUsu->result_array() as $e){ ?>
                                                                <option value="<?php echo $e['id_evento']; ?>"><?php echo $e['eve_nombre']; ?></option>
                                                            <?php } ?>

                                                            </select>
                                                        </div>
                                                        <div class="seperator"></div>
                                                        <div class="form-group">
                                                            <label>Comentario</label>
                                                            <textarea rows="4" class="input-text full-width" placeholder="Comentario" name="comentario"></textarea>
                                                        </div>
                                                            <div class="seperator"></div>
                                                            <button type="submit" class="full-width btn-medium">Invitar</button>
                                                        </div>
                                                    </form>
                                                </div>


                                <?php } ?>
                            </div>
                        </article>
                        <div class="travelo-box">
                            <h4>Integrantes</h4>
                            <div class="image-box style14">

                                <?php foreach($integrantes as $dataIntegrantes){ ?>
                                    <article class="box">
                                        <figure>
                                            <a href="<?=site_url("profile/get_usuario?id=")?><?php echo $dataIntegrantes['id_usu']; ?>"><img src="http://placehold.it/63x59" alt="" /></a>
                                        </figure>
                                    
                                        <div class="details">
                                            <h5 class="box-title"><a href="<?=site_url("profile/get_usuario?id=")?><?php echo $dataIntegrantes['id_usu']; ?>"><?php echo $dataIntegrantes['usu_nombre']; ?></a></h5>
                                            <label class="price-wrapper">
                                                <?php echo $dataIntegrantes['usu_cargo']; ?>
                                            </label>
                                        </div>
                                    </article>
                                <?php } ?>
                                <?php if($CheckAdm == 'true'){?>
                                <article class="box">
                                        <figure>
                                            <a href="#invitar" class="soap-popupbox"><img src="<?php echo base_url("assets/images/plus.png");?>" alt="" /></a>
                                        </figure>
                                        
                                    
                                        <div class="details">
                                            <h5 class="box-title"><a href="#invitar" class="soap-popupbox">Invitar nuevo integrante</a></h5>
                                            <label class="price-wrapper">
                                                
                                            </label>
                                        </div>
                                                <div id="invitar" class="travelo-login-box travelo-box">
                                                    <form action="<?php echo site_url('grupo/invNusu'); ?>" method="post">
                                                        <div class="form-group">
                                                            <label>Nuevo integrante:</label>
                                                            <label>Ingrese el mail de quien quiere invitar</label>
                                                            <input type="hidden" name="grupo" value="<?php echo $dataGrupo['id_grupo']; ?>">
                                                            <input type="text" name="email" class="input-text full-width" placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="rolusu" class="input-text full-width" placeholder="Rol">
                                                            <div class="seperator"></div>
                                                            <button type="submit" class="full-width btn-medium">Invitar</button>
                                                        </div>
                                                    </form>
                                                </div>

                                    </article>
                                <?php } ?>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <script>
        function seguirGrupo(grupo) {
        
            jQuery.ajax({
                url: '<?php echo site_url('grupoAjax/seguir'); ?>',
                type: 'POST',
                data: {
                    grupo: grupo
                },
                success: function (respuesta) {
                    if(respuesta == 1){
                        Swal.fire({
                            title: 'Ha empezado a seguir al grupo',
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
        function dejarSeguir(grupo) {
        
        jQuery.ajax({
            url: '<?php echo site_url('grupoAjax/dejarSeguir'); ?>',
            type: 'POST',
            data: {
                grupo: grupo
            },
            success: function (respuesta) {
                if(respuesta == 1){
                    Swal.fire({
                        title: 'Ha dejado de seguir al grupo',
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
    function sendReview() {
        var tituloRev = jQuery("#tituloRev").val();
        var comRev = jQuery("#comRev").val();
        var calRev = jQuery("#calRev").val();
        jQuery.ajax({
            url: '<?php echo site_url('ajaxGral/setReview'); ?>',
            type: 'POST',
            data: {
                id: <?php echo $idgrupo ?>,
                tipo: 1,
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