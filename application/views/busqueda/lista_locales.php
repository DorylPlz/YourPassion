        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Busqueda de eventos</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="<?php echo site_url('main/index'); ?>">Inicio</a></li>
                    <li class="active">Eventos</li>
                </ul>
            </div>
        </div>
        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <h4 class="search-results-title"><i class="soap-icon-search"></i><b>1,984</b> encontrados.</h4>
                            <div class="toggle-container filters-container">
                                
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#rating-filter" class="collapsed">Calificación</a>
                                    </h4>
                                    <div id="rating-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <div id="rating" class="five-stars-container editable-rating"></div>
                                            <br />
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#accomodation-type-filter" class="collapsed">Genero</a>
                                    </h4>
                                    <div id="accomodation-type-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <li><a href="#">All<small>(722)</small></a></li>
                                                <li><a href="#">Hotel<small>(982)</small></a></li>
                                                <li><a href="#">Resort<small>(127)</small></a></li>
                                                <li class="active"><a href="#">Bed &amp; Breakfast<small>(222)</small></a></li>
                                                <li><a href="#">Condo<small>(158)</small></a></li>
                                                <li><a href="#">Residence<small>(439)</small></a></li>
                                                <li><a href="#">Guest House<small>(52)</small></a></li>
                                            </ul>
                                            <a class="button btn-mini">MORE</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#amenities-filter" class="collapsed">Tipo</a>
                                    </h4>
                                    <div id="amenities-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <li><a href="#">Bathroom<small>(722)</small></a></li>
                                                <li><a href="#">Cable tv<small>(982)</small></a></li>
                                                <li class="active"><a href="#">air conditioning<small>(127)</small></a></li>
                                                <li class="active"><a href="#">mini bar<small>(222)</small></a></li>
                                                <li><a href="#">wi - fi<small>(158)</small></a></li>
                                                <li><a href="#">pets allowed<small>(439)</small></a></li>
                                                <li><a href="#">room service<small>(52)</small></a></li>
                                            </ul>
                                            <a class="button btn-mini">MORE</a>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Fecha</a>
                                    </h4>
                                    <div id="modify-search-panel" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <form method="post">
                                                
                                                <div class="form-group">
                                                    <label>Fecha Inicial</label>
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Fecha Maxima</label>
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                                    </div>
                                                </div>
                                                <br />
                                                <button class="btn-medium icon-check uppercase full-width">Buscar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-9">
                            <div class="sort-by-section clearfix">
                                <h4 class="sort-by-title block-sm">Mostrar resultados por:</h4>
                                <ul class="sort-bar clearfix block-sm">
                                    <li class="sort-by-name"><a class="sort-by-container" href="#"><span>Nombre</span></a></li>
                                    <li class="sort-by-price"><a class="sort-by-container" href="#"><span>Precio</span></a></li>
                                    <li class="sort-by-rating active"><a class="sort-by-container" href="#"><span>Calificación</span></a></li>
                                    <li class="sort-by-date"><a class="sort-by-container" href="#"><span>Fecha</span></a></li>
                                </ul>
                                
                            
                            </div>
                            <div class="hotel-list">
                                <div class="row image-box hotel listing-style1">
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                            </figure>
                                            <div class="details">
                                                <span class="price">
                                                    <small>Precio</small>
                                                    $620
                                                </span>
                                                <h4 class="box-title">Nombre o grupo<small>Local</small></h4>
                                                <div class="feedback">
                                                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                                    <span class="review">270 cupos</span>
                                                </div>
                                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                                <div class="action">
                                                    <a class="button btn-small" href="<?php echo site_url('main/perfil_local'); ?>">Ver</a>
                                                    <a class="button btn-small yellow popup-map" href="#" data-box="48.856614, 2.352222">Comprar</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                            </figure>
                                            <div class="details">
                                                <span class="price">
                                                    <small>Precio</small>
                                                    $620
                                                </span>
                                                <h4 class="box-title">Nombre o grupo<small>Local</small></h4>
                                                <div class="feedback">
                                                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                                    <span class="review">270 cupos</span>
                                                </div>
                                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                                <div class="action">
                                                    <a class="button btn-small" href="hotel-detailed.html">Ver</a>
                                                    <a class="button btn-small yellow popup-map" href="#" data-box="48.856614, 2.352222">Comprar</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                            </figure>
                                            <div class="details">
                                                <span class="price">
                                                    <small>Precio</small>
                                                    $620
                                                </span>
                                                <h4 class="box-title">Nombre o grupo<small>Local</small></h4>
                                                <div class="feedback">
                                                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                                    <span class="review">270 cupos</span>
                                                </div>
                                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                                <div class="action">
                                                    <a class="button btn-small" href="hotel-detailed.html">Ver</a>
                                                    <a class="button btn-small yellow popup-map" href="#" data-box="48.856614, 2.352222">Comprar</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                            </figure>
                                            <div class="details">
                                                <span class="price">
                                                    <small>Precio</small>
                                                    $620
                                                </span>
                                                <h4 class="box-title">Nombre o grupo<small>Local</small></h4>
                                                <div class="feedback">
                                                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                                    <span class="review">270 cupos</span>
                                                </div>
                                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                                <div class="action">
                                                    <a class="button btn-small" href="hotel-detailed.html">Ver</a>
                                                    <a class="button btn-small yellow popup-map" href="#" data-box="48.856614, 2.352222">Comprar</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                            </figure>
                                            <div class="details">
                                                <span class="price">
                                                    <small>Precio</small>
                                                    $620
                                                </span>
                                                <h4 class="box-title">Nombre o grupo<small>Local</small></h4>
                                                <div class="feedback">
                                                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                                    <span class="review">270 cupos</span>
                                                </div>
                                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                                <div class="action">
                                                    <a class="button btn-small" href="hotel-detailed.html">Ver</a>
                                                    <a class="button btn-small yellow popup-map" href="#" data-box="48.856614, 2.352222">Comprar</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                            </figure>
                                            <div class="details">
                                                <span class="price">
                                                    <small>Precio</small>
                                                    $620
                                                </span>
                                                <h4 class="box-title">Nombre o grupo<small>Local</small></h4>
                                                <div class="feedback">
                                                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                                    <span class="review">270 cupos</span>
                                                </div>
                                                <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                                <div class="action">
                                                    <a class="button btn-small" href="hotel-detailed.html">Ver</a>
                                                    <a class="button btn-small yellow popup-map" href="#" data-box="48.856614, 2.352222">Comprar</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    
                                </div>
                            </div>
                            <a href="#" class="uppercase full-width button btn-large">load more listing</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

