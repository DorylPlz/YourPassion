        <section id="content" class="gray-area">
            <div class="container">
                <div id="main">
                    <div class="tab-container full-width-style arrow-left dashboard">
                        <ul class="tabs">
                            <li class="active"><a data-toggle="tab" href="#dashboard"><i class="soap-icon-address circle"></i>Información general</a></li>
                            <li class=""><a data-toggle="tab" href="#profile"><i class="soap-icon-user circle"></i>Profile</a></li>
                            <li class=""><a data-toggle="tab" href="#booking"><i class="soap-icon-businessbag circle"></i>Booking</a></li>
                            <li class=""><a data-toggle="tab" href="#wishlist"><i class="soap-icon-wishlist circle"></i>Wishlist</a></li>
                            <li class=""><a data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Travel Stories</a></li>
                            <li class=""><a data-toggle="tab" href="#settings"><i class="soap-icon-settings circle"></i>Settings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="dashboard" class="tab-pane fade in active">
                                <h1 class="no-margin skin-color">Administración</h1>
                                <br />
                                <div class="row block">
                                    <div class="col-sm-6 col-md-3">
                                        <a href="<?php echo site_url('main/grupos'); ?>">
                                            <div class="fact blue">
                                                <div class="numbers counters-box">
                                                    <dl>
                                                        <dt class="display-counter" data-value="<?php echo $getGrupos->num_rows();?>">0</dt>
                                                        <dd>Grupos</dd>
                                                    </dl>
                                                    <i class="icon soap-icon-friends"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <a href="<?php echo site_url('main/locales'); ?>">
                                            <div class="fact yellow">
                                                <div class="numbers counters-box">
                                                    <dl>
                                                        <dt class="display-counter" data-value="<?php echo $getLocal->num_rows();?>">0</dt>
                                                        <dd>Locales</dd>
                                                    </dl>
                                                    <i class="icon soap-icon-support"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <a href="#">
                                            <div class="fact red">
                                                <div class="numbers counters-box">
                                                    <dl>
                                                        <dt class="display-counter" data-value="<?php echo $getProductora->num_rows();?>">0</dt>
                                                        <dd>Productoras</dd>
                                                    </dl>
                                                    <i class="icon soap-icon-hotel-1"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <a href="<?php echo site_url('main/eventos'); ?>">
                                            <div class="fact green">
                                                <div class="numbers counters-box">
                                                    <dl>
                                                        <dt class="display-counter" data-value="<?php echo $getEventos->num_rows();?>">0</dt>
                                                        <dd>Eventos Activos</dd>
                                                    </dl>
                                                    <i class="icon soap-icon-conference"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="row block">
                                    <div class="col-md-6 notifications">

                                        <h2>Notificaciones</h2>
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#home">Local <span class="price"><?php echo $SolicitudesL->num_rows(); ?></span></a> </li>
                                            <li><a data-toggle="tab" href="#menu1">Productora <span class="price"><?php echo $SolicitudesP->num_rows(); ?></span></a></li>
                                        </ul>





                                        <div class="tab-content">
                                            <div id="home" class="tab-pane fade in active">
                                                <a href="#">
                                                    
                                                    <?php if($SolicitudesL->num_rows() > 0){ foreach($SolicitudesL->result_array() as $L){ ?>

                                                        <div class="icon-box style1 fourty-space">
                                                            <i class="soap-icon-support yellow-bg"></i>
                                                            <span class="time pull-right"><?php echo $L['local_creacion']; ?></span>
                                                            <p class="box-title"><?php echo $L['local_nombre']; ?></p>
                                                        </div>

                                                    <?php }}else{ ?>
                                                        <div class="icon-box style1 fourty-space">
                                                            <p class="box-title">No hay solicitudes pendientes</p>
                                                        </div>
                                                    <?php } ?>
                                                </a>
                                                <a href="#">
                                                    <div class="load-more">. . . . . . . . . . . . . </div>
                                                </a>
                                            </div>
                                            <div id="menu1" class="tab-pane fade">
                                            <?php if($SolicitudesP->num_rows() > 0){ foreach($SolicitudesP->result_array() as $P){ ?>

                                                <a href="#">
                                                    <div class="icon-box style1 fourty-space">
                                                        <i class="soap-icon-hotel-1 red-bg"></i>
                                                        <span class="time pull-right"><?php echo $P['prod_fregistro']; ?></span>
                                                        <p class="box-title"><?php echo $L['prod_nombre']; ?></p>
                                                    </div>
                                                </a>
                                                <?php }}else{ ?>
                                                        <div class="icon-box style1 fourty-space">
                                                            <p class="box-title">No hay solicitudes pendientes</p>
                                                        </div>
                                                    <?php } ?>
                                                <a href="#">
                                                    <div class="load-more">. . . . . . . . . . . . . </div>
                                                </a>



                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-md-6">
                                        <h2>Ultimos Eventos</h2>
                                        <div class="recent-activity">
                                            <ul>
                                                <?php if($getEventos->num_rows() > 0){foreach($getEventos->result_array() as $E){ ?>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon soap-icon-conference circle green-color"></i>
                                                        <span class="price"><small>desde</small>$5000</span>
                                                        <h4 class="box-title">
                                                        <?php echo $P['eve_nombre']; ?><small><?php echo $P['eve_fecha']; ?></small>
                                                        </h4>
                                                    </a>
                                                </li>
                                                <?php }}else{ ?>
                                                    <li>
                                                    <a href="#">
                                                        <h4 class="box-title">
                                                            No hay eventos para mostrar
                                                        </h4>
                                                    </a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                            <a href="#" class="button green btn-small full-width">Ver más</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            
                            </div>
                            <div id="profile" class="tab-pane fade">
                                <div class="view-profile">
                                    <article class="image-box style2 box innerstyle personal-details">
                                        <figure>
                                            <a title="" href="#"><img width="270" height="263" alt="" src="http://placehold.it/270x263"></a>
                                        </figure>
                                        <div class="details">
                                            <a href="#" class="button btn-mini pull-right edit-profile-btn">EDIT PROFILE</a>
                                            <h2 class="box-title fullname">Jessica Brown</h2>
                                            <dl class="term-description">
                                                <dt>user name:</dt><dd>info@jessica.com</dd>
                                                <dt>first name:</dt><dd>jessica</dd>
                                                <dt>last name:</dt><dd>brown</dd>
                                                <dt>phone number:</dt><dd>1-800-123-HELLO</dd>
                                                <dt>Date of birth:</dt><dd>15 August 1985</dd>
                                                <dt>Street Address and number:</dt><dd>353 Third floor Avenue</dd>
                                                <dt>Town / City:</dt><dd>Paris,France</dd>
                                                <dt>ZIP code:</dt><dd>75800-875</dd>
                                                <dt>Country:</dt><dd>United States of america</dd>
                                            </dl>
                                        </div>
                                    </article>
                                    <hr>
                                    <h2>About You</h2>
                                        <div class="intro">
                                        <p>Vestibulum tristique, justo eu sollicitudin sagittis, metus dolor eleifend urna, quis scelerisque purus quam nec ligula. Suspendisse iaculis odio odio, ac vehicula nisi faucibus eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere semper sem ac aliquet. Duis vel bibendum tellus, eu hendrerit sapien. Proin fringilla, enim vel lobortis viverra, augue orci fringilla diam, sed cursus elit mi vel lacus. Nulla facilisi. Fusce sagittis, magna non vehicula gravida, ante arcu pulvinar arcu, aliquet luctus arcu purus sit amet sem. Mauris blandit odio sed nisi porttitor egestas. Mauris in quam interdum purus vehicula rutrum quis in sem. Integer interdum lectus at nulla dictum luctus. Sed risus felis, posuere id condimentum non, egestas pulvinar enim. Praesent pretium risus eget nisi ullamcorper fermentum. Duis lacinia nisi ac rhoncus vestibulum.</p>
                                    </div>
                                    <hr>
                                    <h2>Today’s Suggestions</h2>
                                    <div class="suggestions image-carousel style2" data-animation="slide" data-item-width="170" data-item-margin="22">
                                        <ul class="slides">
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">Adventure</h5>
                                            </li>
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">Beaches &amp; Sun</h5>
                                            </li>
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">Casinos</h5>
                                            </li>
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">Family Fun</h5>
                                            </li>
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">History</h5>
                                            </li>
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">Adventure</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4>Benefits of Tavelo Account</h4>
                                            <ul class="benefits triangle hover">
                                                <li><a href="#">Faster bookings with lesser clicks</a></li>
                                                <li><a href="#">Track travel history &amp; manage bookings</a></li>
                                                <li class="active"><a href="#">Manage profile &amp; personalize experience</a></li>
                                                <li><a href="#">Receive alerts &amp; recommendations</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 previous-bookings image-box style14">
                                            <h4>Your Previous Bookings</h4>
                                            <article class="box">
                                                <figure class="no-padding">
                                                    <a title="" href="#">
                                                        <img alt="" src="http://placehold.it/63x59" width="63" height="59">
                                                    </a>
                                                </figure>
                                                <div class="details">
                                                    <h5 class="box-title"><a href="#">Half-Day Island Tour</a><small class="fourty-space"><span class="price">$35</span> Family Package</small></h5>
                                                </div>
                                            </article>
                                            <article class="box">
                                                <figure class="no-padding">
                                                    <a title="" href="#">
                                                        <img alt="" src="http://placehold.it/63x59" width="63" height="59">
                                                    </a>
                                                </figure>
                                                <div class="details">
                                                    <h5 class="box-title"><a href="#">Ocean Park Tour</a><small class="fourty-space"><span class="price">$26</span> Per Person</small></h5>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-md-4">
                                            <h4>Need Travelo Help?</h4>
                                            <div class="contact-box">
                                                <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                                                <address class="contact-details">
                                                    <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                                                    <br>
                                                    <a class="contact-email" href="#">help@travelo.com</a>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="edit-profile">
                                    <form class="edit-profile-form">
                                        <h2>Personal Details</h2>
                                        <div class="col-sm-9 no-padding no-float">
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>First Name</label>
                                                    <input type="text" class="input-text full-width" placeholder="">
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Last Name</label>
                                                    <input type="text" class="input-text full-width" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Email Address</label>
                                                    <input type="text" class="input-text full-width" placeholder="">
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Verify Email Address</label>
                                                    <input type="text" class="input-text full-width" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Country Code</label>
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option>United Kingdom (+44)</option>
                                                            <option>United States (+1)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Phone Number</label>
                                                    <input type="text" class="input-text full-width" placeholder="">
                                                </div>
                                            </div>
                                            <label>Date of Birth</label>
                                            <div class="row form-group">
                                                <div class="col-sms-4 col-sm-2">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">date</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sms-4 col-sm-2">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">month</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sms-4 col-sm-2">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h2>Contact Details</h2>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Street Name</label>
                                                    <input type="text" class="input-text full-width">
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Address</label>
                                                    <input type="text" class="input-text full-width">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>City</label>
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Select...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Country</label>
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Select...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Region State</label>
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Select...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h2>Upload Profile Photo</h2>
                                            <div class="row form-group">
                                                <div class="col-sms-12 col-sm-6 no-float">
                                                    <div class="fileinput full-width">
                                                        <input type="file" class="input-text" data-placeholder="select image/s">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h2>Describe Yourself</h2>
                                            <div class="form-group">
                                                <textarea rows="5" class="input-text full-width" placeholder="please tell us about you"></textarea>
                                            </div>
                                            <div class="from-group">
                                                <button type="submit" class="btn-medium col-sms-6 col-sm-4">UPDATE SETTINGS</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="booking" class="tab-pane fade">
                                <h2>Trips You have Booked!</h2>
                                <div class="filter-section gray-area clearfix">
                                    <form>
                                        <label class="radio radio-inline">
                                            <input type="radio" name="filter" checked="checked" />
                                            All Types
                                        </label>
                                        <label class="radio radio-inline">
                                            <input type="radio" name="filter" />
                                            Hotels
                                        </label>
                                        <label class="radio radio-inline">
                                            <input type="radio" name="filter" />
                                            Flights
                                        </label>
                                        <label class="radio radio-inline">
                                            <input type="radio" name="filter" />
                                            Cars
                                        </label>
                                        <label class="radio radio-inline">
                                            <input type="radio" name="filter" />
                                            Cruises
                                        </label>
                                        <div class="pull-right col-md-6 action">
                                            <h5 class="pull-left no-margin col-md-4">Sort results by:</h5>
                                            <button class="btn-small white gray-color">UPCOMING</button>
                                            <button class="btn-small white gray-color">CANCELLED</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="booking-history">
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">NOV</label>
                                            <label class="date">23</label>
                                            <label class="day">SAT</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-plane-right takeoff-effect yellow-color circle"></i>Indianapolis to Paris<small>you are flying</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>saturday, nov 23, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">UPCOMMING</button>
                                    </div>
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">NOV</label>
                                            <label class="date">30</label>
                                            <label class="day">SAT</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-plane-right takeoff-effect yellow-color circle"></i>England to Rome<small>you are flying</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>saturday, nov 30, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">UPCOMMING</button>
                                    </div>
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">DEC</label>
                                            <label class="date">11</label>
                                            <label class="day">MON</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-hotel blue-color circle"></i>Hilton Hotel &amp; Resorts<small>2 adults staying</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>monday, dec 11, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">UPCOMMING</button>
                                    </div>
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">DEC</label>
                                            <label class="date">18</label>
                                            <label class="day">THU</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-car red-color circle"></i>Economy Car<small>you are driving</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>thursday, dec 18, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">UPCOMMING</button>
                                    </div>
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">DEC</label>
                                            <label class="date">22</label>
                                            <label class="day">SUN</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-cruise green-color circle"></i>Baja Mexico<small>3 adults going on cruise</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>sunday, dec 22, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">UPCOMMING</button>
                                    </div>
                                    <div class="booking-info clearfix cancelled">
                                        <div class="date">
                                            <label class="month">NOV</label>
                                            <label class="date">30</label>
                                            <label class="day">SAT</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-plane-right takeoff-effect circle"></i>England to Rome<small>you are flying</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>saturday, nov 30, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">CANCELLED</button>
                                    </div>
                                    <div class="booking-info clearfix cancelled">
                                        <div class="date">
                                            <label class="month">DEC</label>
                                            <label class="date">18</label>
                                            <label class="day">THU</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-car circle"></i>Economy Car<small>you are driving</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>thursday, dec 18, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">CANCELLED</button>
                                    </div>
                                </div>

                            </div>
                            <div id="wishlist" class="tab-pane fade">
                                <h2>Your Wish List</h2>
                                <div class="row image-box listing-style2 add-clearfix">
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">Savona to Italy</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$170</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">Hotel Hilton</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$620</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">Forte Do Vale</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$120</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">Roosevelt Hotel</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$170</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">Miami to Florida</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$620</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">Forte Do Vale</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$120</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">New York to Paris</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$170</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">Hotel Hilton</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$620</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">Forte Do Vale</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$120</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">Roosevelt Hotel</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$170</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">England to Asia</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$620</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            <div id="travel-stories" class="tab-pane fade">
                                <h2>Share Your Story</h2>
                                <div class="col-sm-9 no-float no-padding">
                                    <form>
                                        <div class="row form-group">
                                            <div class="col-sms-6 col-sm-6">
                                                <label>Story Title</label>
                                                <input type="text" class="input-text full-width">
                                            </div>
                                            <div class="col-sms-6 col-sm-6">
                                                <label>Name</label>
                                                <input type="text" class="input-text full-width">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sms-6 col-sm-6">
                                                <label>Select Miles</label>
                                                <div class="selector full-width">
                                                    <select>
                                                        <option>4,528 Miles</option>
                                                        <option>5,218 Miles</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sms-6 col-sm-6">
                                                <label>Email Address</label>
                                                <input type="text" class="input-text full-width">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sms-6 col-sm-6">
                                                <label>Select Category</label>
                                                <div class="selector full-width">
                                                    <select>
                                                        <option value="">Adventure, Romance, Beach</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Type Your Story</label>
                                            <textarea rows="6" class="input-text full-width" placeholder="please tell us about you"></textarea>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <h4>Do you have photos to share? <small>(Optional)</small> </h4>
                                            <div class="fileinput col-sm-6 no-float no-padding">
                                                <input type="file" class="input-text" data-placeholder="select image/s" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h4>Share with friends <small>(Optional)</small></h4>
                                            <p>Share your review with your friends on different social media networks.</p>
                                            <ul class="social-icons icon-circle clearfix">
                                                <li class="twitter"><a title="Twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                                                <li class="facebook"><a title="Facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                                                <li class="googleplus"><a title="GooglePlus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                                                <li class="pinterest"><a title="Pinterest" href="#" data-toggle="tooltip"><i class="soap-icon-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <br>
                                        <div class="form-group col-sm-5 col-md-4 no-float no-padding no-margin">
                                            <button type="submit" class="btn-medium full-width">SUBMIT REVIEW</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="settings" class="tab-pane fade">
                                <h2>Account Settings</h2>
                                <h5 class="skin-color">Change Your Password</h5>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Old Password</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Enter New Password</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Confirm New password</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn-medium">UPDATE PASSWORD</button>
                                    </div>
                                </form>
                                <hr>
                                <h5 class="skin-color">Change Your Email</h5>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Old email</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Enter New Email</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Confirm New Email</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn-medium">UPDATE EMAIL ADDRESS</button>
                                    </div>
                                </form>
                                <hr>
                                <h5 class="skin-color">Send Me Emails When</h5>
                                <form>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Travelo has periodic offers and deals on really cool destinations.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Travelo has fun company news, as well as periodic emails.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I have an upcoming reservation.
                                        </label>
                                    </div>
                                    <button class="btn-medium uppercase">Update All Settings</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>