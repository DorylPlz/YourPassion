        <?php foreach($localData as $local){ ?>
        
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title"><?php echo $local->local_nombre; ?></h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">Locales</a></li>
                    <li class="active">Local detallado</li>
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
                                <li><a data-toggle="tab" href="#calendar-tab">Calendario</a></li>
                                <?php if($CheckAdm == 'true'){?>
                                    <li><a href="<?php echo site_url('grupo/mod_grupo?profile=');?>">Modificar perfil</a></li>
                                <?php } ?>
                            </ul>
                            <div class="tab-content">
                                <div id="photos-tab" class="tab-pane fade in active">
                                    <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                                        <ul class="slides">
                                        <?php if($galeria != null){ foreach($galeria as $img){?>
                                                <li style="width:900px; height:500px;display: block; position:relative; overflow:hidden;"><img src="<?php echo base_url('assets/images/galeria'); ?>/<?php echo $img['img_ruta'];?>" alt=" YourPassion" /></li>
                                            <?php }}else{ ?>
                                                <li><img src="<?php echo base_url('assets/images/'); ?>/YP-logo_full-black.png" alt="" /></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                                        <ul class="slides">
                                        <?php foreach($galeria as $img){?>
                                                <li><img src="<?php echo base_url('assets/images/galeria'); ?>/<?php echo $img['img_ruta'];?>" alt="" /></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div id="map-tab" class="tab-pane fade">
                                    
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
                                        <div class="col-sm-4">
                                            <p class="description">
                                                The calendar is updated every five minutes and is only an approximation of availability.
<br /><br />
Some hosts set custom pricing for certain days on their calendar, like weekends or holidays. The rates listed are per day and do not include any cleaning fee or rates for extra people the host may have for this listing. Please refer to the listing's Description tab for more details.
<br /><br />
We suggest that you contact the host to confirm availability and rates before submitting a reservation request.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="hotel-features" class="tab-container">
                            <ul class="tabs">
                                <li class="active"><a href="#hotel-description" data-toggle="tab">Descripción</a></li>
                                <li><a href="#hotel-reviews" data-toggle="tab">Opiniones</a></li>
                                <li><a href="#hotel-write-review" data-toggle="tab">Escribe una Opinión</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="hotel-description">
                                    <div class="intro table-wrapper full-width hidden-table-sms">
                                        <div class="col-sm-5 col-lg-12 features table-cell">
                                            <ul>
                                                <li><label>Región:</label><?php echo $local->region_nombre;?></li>
                                                <li><label>Comuna:</label><?php echo $local->comu_nombre; ?></li>
                                                <li><label>Calle:</label><?php echo $local->loc_calle; ?></li>
                                                <li><label>Numero:</label><?php echo $local->loc_numero; ?></li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    <div class="long-description">
                                        <h2>Descripción del Local</h2>
                                        <?php if($local->local_desc != null){ ?>
                                            <p>
                                                <?php echo $local->local_desc; ?>
                                            </p>
                                        <?php }else{ ?>
                                            <p>
                                                 No hay descripción para mostrar
                                            </p>
                                        <?php } ?>
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
                                        
                                        <?php if($reviews->num_rows() > 0 ){ foreach($reviews as $rev){ ?>
                                            <div class="guest-review table-wrapper">
                                                <div class="col-xs-3 col-md-2 author table-cell">
                                                    <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                                                    <p class="name">Jessica Brown</p>
                                                    <p class="date">NOV, 12, 2013</p>
                                                </div>
                                                <div class="col-xs-9 col-md-10 table-cell comment-container">
                                                    <div class="comment-header clearfix">
                                                        <h4 class="comment-title">We had great experience while our stay and Hilton Hotels!</h4>
                                                        <div class="review-score">
                                                            <div class="five-stars-container"><div class="five-stars" style="width: 80%;"></div></div>
                                                            <span class="score">4.0/5.0</span>
                                                        </div>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
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

                                    <form class="review-form">
                                        <div class="form-group col-md-5 no-float no-padding">
                                            <h4 class="title">Titulo</h4>
                                            <input type="text" name="review-title" class="input-text full-width" value="" placeholder="Titulo" />
                                        </div>
                                        <div class="form-group">
                                            <h4 class="title">Comentario</h4>
                                            <textarea class="input-text full-width" placeholder="Descripción" rows="5"></textarea>
                                        </div>
                                        <div class="form-group col-md-5 no-float no-padding">
                                            <h4 class="title">Calificación</h4>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-5 no-float no-padding no-margin">
                                            <button type="submit" class="btn-large full-width">Enviar calificación</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="sidebar col-md-3">
                        <article class="detailed-logo">
                            <figure>
                                <img style="width:114px; height:85px;" src="<?php if($local->img_ruta != null){echo base_url('assets/images/profile/local'); echo "/"; echo $local->img_ruta;}else{ echo base_url("assets/images/logoYP.png");} ?>" alt="">
                            </figure>
                            <div class="details">
                                <h2 class="box-title"><?php echo $local->local_nombre; ?><small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space"><?php echo $local->region_nombre; ?>, <?php echo $local->comu_nombre; ?></span></small></h2>
                                <span class="price clearfix">
                                </span>
                                <div class="feedback clearfix">
                                    <div title="3 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: <?php echo $calificacion; ?>%;"></span></div>
                                    <span class="review pull-right"><?php echo $reviews->num_rows();?> Reviews</span>
                                </div>
                                <a class="button yellow full-width uppercase btn-small">Contactar</a>
                            </div>
                        </article>
                        <div class="travelo-box">
                            <h4>Eventos</h4>
                            <div class="image-box style14">
                                <?php if($eventos->num_rows > 0){foreach($eventos as $eve){ ?>
                                   
                                <article class="box">
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/63x59" alt="" /></a>
                                    </figure>
                                    <div class="details">
                                        <h5 class="box-title"><a href="#"><?php echo $eve->nombre; ?></a></h5>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit"><?php echo $eve->eve_hora;?></span> <?php echo $eve->eve_fecha;?>
                                        </label>
                                    </div>
                                </article>
                                <?php  }}else{ ?>
                                    <article class="box">
                                        <div class="details">
                                            <h5 class="box-title"><a href="#">No hay eventos registrados</a></h5>
                                        </div>
                                    </article>
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <?php } ?>