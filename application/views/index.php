        <div id="slideshow">
            <div class="fullwidthbanner-container">
                <div class="revolution-slider rev_slider" style="height: 0; overflow: hidden;">
                    <ul>    <!-- SLIDE  -->
                        <!-- Slide1 -->
                        <li data-transition="zoomin" data-slotamount="7" data-masterspeed="1500">
                            <!-- MAIN IMAGE -->
                            <img src="http://placehold.it/2080x646" alt="">
                        </li>
                        
                        <!-- Slide2 -->
                        <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500">
                            <!-- MAIN IMAGE -->
                            <img src="http://placehold.it/2080x646" alt="">
                        </li>
                        
                        <!-- Slide3 -->
                        <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1500">
                            <!-- MAIN IMAGE -->
                            <img src="http://placehold.it/2080x646" alt="">
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
                        <li><a href="#flight-and-hotel-tab" data-toggle="tab">Locales</a></li>
                    </ul>
                    <div class="visible-mobile">
                        <ul id="mobile-search-tabs" class="search-tabs clearfix">
                            <li class="active"><a href="#hotels-tab">Eventos</a></li>
                            <li><a href="#flights-tab">Grupos</a></li>
                            <li><a href="#flight-and-hotel-tab">Locales</a></li>
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
                            <form action="flight-list-view.html" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="title">Info grupo</h4>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="input-text full-width" placeholder="Nombre" />
                                        </div>
                                        <div class="form-group">
                                            <label>Región</label>
                                            <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title"></h4>
                                        <label>Tipo</label>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                        </div>
                                        <label>Genero</label>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title">Calificación</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <label>Estrellas</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                            </div>
                                            <div class="col-xs-6 pull-right">
                                                <label>&nbsp;</label>
                                                <button class="full-width icon-check">BUSCAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="tab-pane fade" id="flight-and-hotel-tab">
                            <form action="flight-list-view.html" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="title">Donde</h4>
                                        <div class="form-group">
                                            <label>Region</label>
                                            <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Comuna</label>
                                            <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title">Fecha</h4>
                                        <label>Fecha</label>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title">Calificación</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <label>Estrellas</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6 pull-right">
                                                <label>&nbsp;</label>
                                                <button class="full-width icon-check">BUSCAR</button>
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
                <h2>Grupos populares</h2>
                <div class="row image-box style3">
                    <div class="col-sms-6 col-sm-6 col-md-3">
                        <article class="box">
                            <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0">
                                <a href="ajax/cruise-slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                            </figure>
                            <div class="details text-center">
                                <h4 class="box-title">Greece</h4>
                                <p class="offers-content">(15 deal offers)</p>
                                <div data-placement="bottom" data-toggle="tooltip" title="4 stars" class="five-stars-container">
                                    <span style="width: 80%;" class="five-stars"></span>
                                </div>
                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar.</p>
                                <a class="button" href="cruise-detailed.html">SEE ALL</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-sms-6 col-sm-6 col-md-3">
                        <article class="box">
                            <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.4">
                                <a href="ajax/cruise-slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                            </figure>
                            <div class="details text-center">
                                <h4 class="box-title">Singapore</h4>
                                <p class="offers-content">(15 deal offers)</p>
                                <div data-placement="bottom" data-toggle="tooltip" title="4 stars" class="five-stars-container">
                                    <span style="width: 80%;" class="five-stars"></span>
                                </div>
                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar.</p>
                                <a class="button" href="cruise-detailed.html">SEE ALL</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-sms-6 col-sm-6 col-md-3">
                        <article class="box">
                            <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.8">
                                <a href="ajax/cruise-slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                            </figure>
                            <div class="details text-center">
                                <h4 class="box-title">Malaysia</h4>
                                <p class="offers-content">(15 deal offers)</p>
                                <div data-placement="bottom" data-toggle="tooltip" title="4 stars" class="five-stars-container">
                                    <span style="width: 80%;" class="five-stars"></span>
                                </div>
                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar.</p>
                                <a class="button" href="cruise-detailed.html">SEE ALL</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-sms-6 col-sm-6 col-md-3">
                        <article class="box">
                            <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="1.2">
                                <a href="ajax/cruise-slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                            </figure>
                            <div class="details text-center">
                                <h4 class="box-title">Europe</h4>
                                <p class="offers-content">(15 deal offers)</p>
                                <div data-placement="bottom" data-toggle="tooltip" title="4 stars" class="five-stars-container">
                                    <span style="width: 80%;" class="five-stars"></span>
                                </div>
                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar.</p>
                                <a class="button" href="cruise-detailed.html">SEE ALL</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="global-map-area section parallax" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="text-center description">
                        <h1>We Provide You An Ultimate Travel Experience</h1>
                        <p>Nunc cursus libero purusac congue arcu cursus utsed vitae pulvinar massa idporta neque.</p>
                        <p>Etiam elerisque mi id faucibus iaculis vitae pulvinar.</p>
                    </div>
                    <br />
                    <div class="row image-box style8">
                        <div class="col-md-4">
                            <article class="box animated" data-animation-type="fadeInUp">
                                <figure class="middle-block">
                                    <img src="http://placehold.it/100x172" alt="" class="middle-item" width="100" height="172" />
                                    <span class="opacity-wrapper"></span>
                                </figure>
                                <div class="details">
                                    <h2 class="box-title">Organiza</h2>
                                    <p>
                                        Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="box animated" data-animation-type="fadeInUp">
                                <figure class="middle-block">
                                    <img src="http://placehold.it/100x172" alt="" class="middle-item" width="100" height="172" />
                                    <span class="opacity-wrapper"></span>
                                </figure>
                                <div class="details">
                                    <h2 class="box-title">Descubre</h2>
                                    <p>
                                        Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="box animated" data-animation-type="fadeInUp">
                                <figure class="middle-block">
                                    <img src="http://placehold.it/100x172" alt="" class="middle-item" width="100" height="172" />
                                    <span class="opacity-wrapper"></span>
                                </figure>
                                <div class="details">
                                    <h2 class="box-title">Participa</h2>
                                    <p>
                                        Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section container">
                <h2>Eventos Populares</h2>
                <div class="row image-box hotel listing-style1">
                    <div class="col-sms-6 col-sm-6 col-md-3">
                        <article class="box">
                            <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0">
                                <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                            </figure>
                            <div class="details">
                                <span class="price">
                                    <small>avg/night</small>
                                    $360
                                </span>
                                <h4 class="box-title">Hotel Hilton<small>Paris france</small></h4>
                                <div class="feedback">
                                    <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                    <span class="review">270 reviews</span>
                                </div>
                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                <div class="action">
                                    <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                                    <a href="#" class="button btn-small yellow popup-map" data-box="48.856614, 2.352222">VIEW ON MAP</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sms-6 col-sm-6 col-md-3">
                        <article class="box">
                            <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.6">
                                <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                            </figure>
                            <div class="details">
                                <span class="price"><small>avg/night</small>$188</span>
                                <h4 class="box-title">Forte Do Vale<small>Albufeira</small></h4>
                                <div class="feedback">
                                    <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                    <span class="review">170 reviews</span>
                                </div>
                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                <div class="action">
                                    <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                                    <a href="#" class="button btn-small yellow popup-map" data-box="37.089072, -8.247880">VIEW ON MAP</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sms-6 col-sm-6 col-md-3">
                        <article class="box">
                            <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.9">
                                <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                            </figure>
                            <div class="details">
                                <span class="price"><small>avg/night</small>$322</span>
                                <h4 class="box-title">Gran Canaria<small>spain</small></h4>
                                <div class="feedback">
                                    <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                    <span class="review">485 reviews</span>
                                </div>
                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                <div class="action">
                                    <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                                    <a href="#" class="button btn-small yellow popup-map" data-box="40.463667, -3.749220">VIEW ON MAP</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sms-6 col-sm-6 col-md-3">
                        <article class="box">
                            <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="1.2">
                                <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="270" height="160" src="http://placehold.it/270x160" alt=""></a>
                            </figure>
                            <div class="details">
                                <span class="price"><small>avg/night</small>$170</span>
                                <h4 class="box-title">Roosevelt Hotel<small>New york</small></h4>
                                <div class="feedback">
                                    <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                    <span class="review">75 reviews</span>
                                </div>
                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                <div class="action">
                                    <a href="hotel-detailed.html" class="button btn-small">SELECT</a>
                                    <a href="#" class="button btn-small yellow popup-map" data-box="40.705631, -73.978003">VIEW ON MAP</a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

        </section>
