        <div id="slideshow">
            <div class="fullwidthbanner-container">
                <div class="revolution-slider rev_slider" style="height: 0; overflow: hidden;">
                    <ul>    <!-- SLIDE  -->
                        <!-- Slide1 -->
                        <li data-transition="zoomin" data-slotamount="7" data-masterspeed="1500">
                            <!-- MAIN IMAGE -->
                            <img src="<?php echo base_url('assets/images/index/concierto2.jpeg'); ?>" alt="">
                        </li>
                        
                        <!-- Slide2 -->
                        <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500">
                            <!-- MAIN IMAGE -->
                            <img src="<?php echo base_url('assets/images/index/concierto3.jpeg'); ?>" alt="">
                        </li>
                        
                        <!-- Slide3 -->
                        <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1500">
                            <!-- MAIN IMAGE -->
                            <img src="<?php echo base_url('assets/images/index/concierto4.jpeg'); ?>" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <section id="content">
            <div class="search-box-wrapper">
                <div class="search-box container">
                    <ul class="search-tabs clearfix">
                        <li class="active"><a href="#hotels-tab" data-toggle="tab">Eventos</a></li>
                        <li><a href="#flights-tab" data-toggle="tab">Grupos</a></li>
                    </ul>
                    <div class="visible-mobile">
                        <ul id="mobile-search-tabs" class="search-tabs clearfix">
                            <li class="active"><a href="#hotels-tab">Eventos</a></li>
                            <li><a href="#flights-tab">Grupos</a></li>
                        </ul>
                    </div>
                    
                    <div class="search-tab-content">
                        <div class="tab-pane fade active in" id="hotels-tab">
                            <form action="hotel-list-view.html" method="post">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-3">
                                        <h4 class="title">Localidad</h4>
                                        <label>Región</label>
                                        <div class="form-group">
                                        <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                        </div>
                                        <div class="form-group">
                                                <label>Ciudad</label>
                                                        <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                        </div>
                                            
                                    </div>
                                    
                                    <div class="form-group col-sm-6 col-md-6">
                                        <h4 class="title">Evento</h4>
                                        <div class="row">
                                            
                                            <div class="col-xs-6">
                                                <label>Fecha</label>
                                                <div class="form-group">
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                                    </div>
                                                </div>

                                                <label>Tipo</label>
                                                <div class="form-group">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                                <label>Genero</label>
                                                <div class="form-group">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                           
                                                


                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-sm-6 col-md-3">
                                        <h4 class="title">Valor</h4>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <label>Costo minimo</label>
                                                <div class="form-group">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <label>Costo maximo</label>
                                                <div class="form-group">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-sm-6 col-md-2 fixheight">
                                        <label class="hidden-xs">&nbsp;</label>
                                        <button type="submit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">BUSCAR</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="flights-tab">
                            <form action="<?php echo site_url('grupo/filtro_grupo'); ?>" method="post">
                            
                                <div class="row">
                                    <div class="col-md-4">
                                        
                                        <div class="form-group">
                                            <label>Región</label>
                                            <select class="full-width" name="region">
                                            <option value="">Seleccione</option>
                                                    <?php foreach($regiones->result_array() as $r){ ?>
                                                        <option value="<?php echo $r['id_region']; ?>"><?php echo $r['region_nombre']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label>Genero</label>
                                            <select class="full-width" name="estilo">
                                              <option value="">Seleccione</option>
                                                <?php foreach($estilos->result_array() as $e){?>
                                                        <option value="<?php echo $e['id_genero'];?>"><?php echo $e['gen_nombre'];?></option>
                                                    <?php }?>
                                            </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tipo</label>
                                                <select class="full-width" name="tipo">
                                                <option value="">Seleccione</option>
                                                    <?php foreach($tipos->result_array() as $t){?>
                                                        <option value="<?php echo $t['id_tipo']?>"><?php echo $t['tipo_nombre'];?></option>
                                                    <?php } ?>
                                                </select>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                            </div>
                                            <div class="col-xs-6 pull-right">
                                                <label>&nbsp;</label>
                                                <button style="height:30px;" type="submit" class="full-width icon-check">BUSCAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        

                        
                        
                    </div>
                </div>
            </div>
            
            <div class="section container">
                <h2><?php if($this->session->userdata('login')){ echo "Grupos Seguidos"; }else{ echo "Nuevos Grupos"; }?></h2>
                <div class="row image-box style3">
                    <?php foreach($grupos as $grs){ ?>
                    <div class="col-sms-6 col-sm-6 col-md-3">
                        <article class="box">
                            <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0">
                                <a href="<?php echo site_url('grupo/perfil_grupo');echo "/"; echo $grs->id_grupo; echo "/"; echo $grs->gru_nombre; ?>" class="hover-effect popup-gallery"><img style="width: 270px; height:160px; float: left; display: block;" src="<?php if($grs->img_ruta != null){echo base_url('assets/images/profile'); ?>/<?php echo $grs->img_ruta;}else{echo base_url('assets/images/logoYP.png');}?>"></a>
                            </figure>
                            <div class="details text-center">
                                <h4 class="box-title"><?php echo $grs->gru_nombre; ?></h4>
                                <p class="offers-content"><?php echo $grs->tipo_nombre; ?></p>
                                <p class="offers-content"><?php echo $grs->gen_nombre; ?></p>
                                <p class="description"><?php echo $grs->comu_nombre; ?></p>
                                <a class="button" href="<?php echo site_url('grupo/perfil_grupo');echo "/"; echo $grs->id_grupo; echo "/"; echo $grs->gru_nombre; ?>">Ver</a>
                            </div>
                        </article>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="global-map-area section parallax" style="background: url('<?php echo base_url('assets/images/index/concierto.jpeg'); ?>') no-repeat;" data-stellar-background-ratio="0.9">
                <div class="container">
                    
                    <div class="row image-box style8">
                        <div class="col-md-4">
                            <article class="box animated" data-animation-type="fadeInUp">
                                <figure class="middle-block">
                                    <img src="<?php echo base_url('assets/images/index/organiza.jpeg'); ?>" alt="" class="middle-item" style="width:100px; height:172px;" width="100" height="172" />
                                    <span class="opacity-wrapper"></span>
                                </figure>
                                <div class="details">
                                    <h2 class="box-title">Organiza</h2>
                                    <p>
                                                        En YourPassion puedes organizar tus propios eventos en tu local o de tu banda totalmente gratis.
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="box animated" data-animation-type="fadeInUp">
                                <figure class="middle-block">
                                    <img src="<?php echo base_url('assets/images/index/descubre.jpeg'); ?>" alt="" class="middle-item" style="width:100px; height:172px;" width="100" height="172" />
                                    <span class="opacity-wrapper"></span>
                                </figure>
                                <div class="details">
                                    <h2 class="box-title">Descubre</h2>
                                    <p>
                                        Descubre nuevas bandas, locales y eventos facilmente con tan solo tu computadora.
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="box animated" data-animation-type="fadeInUp">
                                <figure class="middle-block">
                                    <img src="<?php echo base_url('assets/images/index/participa.jpeg'); ?>" alt="" class="middle-item" style="width:100px; height:172px;" width="100" height="172" />
                                    <span class="opacity-wrapper"></span>
                                </figure>
                                <div class="details">
                                    <h2 class="box-title">Participa</h2>
                                    <p>
                                        Participa en los eventos de tus bandas favoritas e interactua con ellas desde la comodidad de tu casa.
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section container">
                <h2>Proximos eventos</h2>
                <div class="row image-box hotel listing-style1">
                    
                    <?php foreach($eventos as $me){ ?>
                        <div class="col-sms-6 col-sm-6 col-md-3">
                            <article class="box">
                                <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0">
                                    <a  href="<?php echo site_url('evento/Perfil'); echo "/"; echo $me->id_evento; echo "/"; echo $me->eve_nombre; ?>" title=""><img style="width:270px; height:160px;" src="<?php if($me->img_ruta != null){echo base_url('assets/images/evento'); ?>/<?php echo $me->img_ruta;}else{echo base_url('assets/images/logoYP.png');}?>" alt=""></a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title"><?php echo $me->eve_nombre;?><small><?php echo $me->gen_nombre;?></small></h4>
                                    <h4 class="box-title"><small><?php echo $me->comu_nombre; ?></small></h4>
                                    <h4 class="box-title"><small><?php echo $me->loc_calle; echo " #"; echo $me->loc_numero; ?></small></h4>
                                    
                                    <p class="description"></p>
                                    <div class="action">
                                        <a href="<?php echo site_url('evento/Perfil'); echo "/"; echo $me->id_evento; echo "/"; echo $me->eve_nombre; ?>" class="button btn-small yellow" data-box="48.856614, 2.352222">Ver</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php } ?>

                </div>
            </div>

        </section>
