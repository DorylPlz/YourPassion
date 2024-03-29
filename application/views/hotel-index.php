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
                        <li class="active"><a href="#hotels-tab" data-toggle="tab">HOTELS</a></li>
                        <li><a href="#flights-tab" data-toggle="tab">FLIGHTS</a></li>
                        <li><a href="#flight-and-hotel-tab" data-toggle="tab">FLIGHT &amp; HOTELS</a></li>
                        <li><a href="#cars-tab" data-toggle="tab">CARS</a></li>
                        <li><a href="#cruises-tab" data-toggle="tab">CRUISES</a></li>
                        <li><a href="#flight-status-tab" data-toggle="tab">FLIGHT STATUS</a></li>
                        <li><a href="#online-checkin-tab" data-toggle="tab">ONLINE CHECK IN</a></li>
                    </ul>
                    <div class="visible-mobile">
                        <ul id="mobile-search-tabs" class="search-tabs clearfix">
                            <li class="active"><a href="#hotels-tab">HOTELS</a></li>
                            <li><a href="#flights-tab">FLIGHTS</a></li>
                            <li><a href="#flight-and-hotel-tab">FLIGHT &amp; HOTELS</a></li>
                            <li><a href="#cars-tab">CARS</a></li>
                            <li><a href="#cruises-tab">CRUISES</a></li>
                            <li><a href="#flight-status-tab">FLIGHT STATUS</a></li>
                            <li><a href="#online-checkin-tab">ONLINE CHECK IN</a></li>
                        </ul>
                    </div>
                    
                    <div class="search-tab-content">
                        <div class="tab-pane fade active in" id="hotels-tab">
                            <form action="hotel-list-view.html" method="post">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-3">
                                        <h4 class="title">Where</h4>
                                        <label>Your Destination</label>
                                        <input type="text" class="input-text full-width" placeholder="enter a destination or hotel name" />
                                    </div>
                                    
                                    <div class="form-group col-sm-6 col-md-4">
                                        <h4 class="title">When</h4>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Check In</label>
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Check Out</label>
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-sm-6 col-md-3">
                                        <h4 class="title">Who</h4>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <label>Rooms</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <label>Adults</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <label>Kids</label>
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
                                    </div>
                                    
                                    <div class="form-group col-sm-6 col-md-2 fixheight">
                                        <label class="hidden-xs">&nbsp;</label>
                                        <button type="submit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="flights-tab">
                            <form action="flight-list-view.html" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="title">Where</h4>
                                        <div class="form-group">
                                            <label>Leaving From</label>
                                            <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                        </div>
                                        <div class="form-group">
                                            <label>Going To</label>
                                            <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title">When</h4>
                                        <label>Departing On</label>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">anytime</option>
                                                        <option value="2">morning</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Arriving On</label>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">anytime</option>
                                                        <option value="2">morning</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title">Who</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <label>Adults</label>
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
                                                <label>Kids</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Promo Code</label>
                                                <input type="text" class="input-text full-width" placeholder="type here" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <label>Infants</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 pull-right">
                                                <label>&nbsp;</label>
                                                <button class="full-width icon-check">SERACH NOW</button>
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
                                        <h4 class="title">Where</h4>
                                        <div class="form-group">
                                            <label>Leaving From</label>
                                            <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                        </div>
                                        <div class="form-group">
                                            <label>Going To</label>
                                            <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title">When</h4>
                                        <label>Departing On</label>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">anytime</option>
                                                        <option value="2">morning</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Arriving On</label>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">anytime</option>
                                                        <option value="2">morning</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title">Who</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <label>Adults</label>
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
                                                <label>Kids</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Promo Code</label>
                                                <input type="text" class="input-text full-width" placeholder="type here" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <label>Rooms</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 pull-right">
                                                <label>&nbsp;</label>
                                                <button class="full-width icon-check">SERACH NOW</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="tab-pane fade" id="cars-tab">
                            <form action="car-list-view.html" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="title">Where</h4>
                                        <div class="form-group">
                                            <label>Pick Up</label>
                                            <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                        </div>
                                        <div class="form-group">
                                            <label>Drop Off</label>
                                            <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title">When</h4>
                                        <div class="form-group">
                                            <label>Pick-Up Date / Time</label>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="1">anytime</option>
                                                            <option value="2">morning</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Drop-Off Date / Time</label>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="1">anytime</option>
                                                            <option value="2">morning</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title">Who</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <label>Adults</label>
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
                                                <label>Kids</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Promo Code</label>
                                                <input type="text" class="input-text full-width" placeholder="type here" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <label>Car Type</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="">select a car type</option>
                                                        <option value="economy">Economy</option>
                                                        <option value="compact">Compact</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>&nbsp;</label>
                                                <button class="full-width icon-check">SERACH NOW</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="tab-pane fade" id="cruises-tab">
                            <form action="cruise-list-view.html" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="title">Where</h4>
                                        <div class="form-group">
                                            <label>Your Destination</label>
                                            <input type="text" class="input-text full-width" placeholder="enter a destination or hotel name" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title">When</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <label>Departure Date</label>
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Cruise Length</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="">select length</option>
                                                        <option value="1">1-2 Nights</option>
                                                        <option value="2">3-4 Nights</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <h4 class="title">Who</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <label>Cruise Line</label>
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="">select cruise line</option>
                                                        <option>Azamara Club Cruises</option>
                                                        <option>Carnival Cruise Lines</option>
                                                        <option>Celebrity Cruises</option>
                                                        <option>Costa Cruise Lines</option>
                                                        <option>Cruise &amp; Maritime Voyages</option>
                                                        <option>Crystal Cruises</option>
                                                        <option>Cunard Line Ltd.</option>
                                                        <option>Disney Cruise Line</option>
                                                        <option>Holland America Line</option>
                                                        <option>Hurtigruten Cruise Line</option>
                                                        <option>MSC Cruises</option>
                                                        <option>Norwegian Cruise Line</option>
                                                        <option>Oceania Cruises</option>
                                                        <option>Orion Expedition Cruises</option>
                                                        <option>P&amp;O Cruises</option>
                                                        <option>Paul Gauguin Cruises</option>
                                                        <option>Peter Deilmann Cruises</option>
                                                        <option>Princess Cruises</option>
                                                        <option>Regent Seven Seas Cruises</option>
                                                        <option>Royal Caribbean International</option>
                                                        <option>Seabourn Cruise Line</option>
                                                        <option>Silversea Cruises</option>
                                                        <option>Star Clippers</option>
                                                        <option>Swan Hellenic Cruises</option>
                                                        <option>Thomson Cruises</option>
                                                        <option>Viking River Cruises</option>
                                                        <option>Windstar Cruises</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>&nbsp;</label>
                                                <button class="icon-check full-width">SEARCH NOW</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="tab-pane fade" id="flight-status-tab">
                            <form action="flight-list-view.html" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="title">Where</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <label>Leaving From</label>
                                                <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Going To</label>
                                                <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-6 col-md-2">
                                        <h4 class="title">When</h4>
                                        <div class="form-group">
                                            <label>Departure Date</label>
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-6 col-md-2">
                                        <h4 class="title">Who</h4>
                                        <div class="form-group">
                                            <label>Flight Number</label>
                                            <input type="text" class="input-text full-width" placeholder="enter flight number" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 fixheight">
                                        <label class="hidden-xs">&nbsp;</label>
                                        <button class="icon-check full-width">SEARCH NOW</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="tab-pane fade" id="online-checkin-tab">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="title">Where</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <label>Leaving From</label>
                                                <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Going To</label>
                                                <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-6 col-md-2">
                                        <h4 class="title">When</h4>
                                        <div class="form-group">
                                            <label>Departure Date</label>
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-6 col-md-2">
                                        <h4 class="title">Who</h4>
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="input-text full-width" placeholder="enter your full name" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 fixheight">
                                        <label class="hidden-xs">&nbsp;</label>
                                        <button class="icon-check full-width">SEARCH NOW</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="section">
                <div class="container">
                    <h2>Recommended Hotels</h2>
                    <div class="block image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
                        <ul class="slides image-box listing-style2">
                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img src="http://placehold.it/270x160" alt="" width="270" height="160" /></a>
                                    </figure>
                                    <div class="details">
                                        <a title="View all" href="hotel-detailed.html" class="pull-right button uppercase">select</a>
                                        <h4 class="box-title">Gran Canaria</h4>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">$322</span>avg/night
                                        </label>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img src="http://placehold.it/270x160" alt="" width="270" height="160" /></a>
                                    </figure>
                                    <div class="details">
                                        <a title="View all" href="hotel-detailed.html" class="pull-right button uppercase">select</a>
                                        <h4 class="box-title">Hotel Hilton</h4>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">$620</span>avg/night
                                        </label>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img src="http://placehold.it/270x160" alt="" width="270" height="160" /></a>
                                    </figure>
                                    <div class="details">
                                        <a title="View all" href="hotel-detailed.html" class="pull-right button uppercase">select</a>
                                        <h4 class="box-title">Roosevelt Hotel</h4>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">$170</span>avg/night
                                        </label>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img src="http://placehold.it/270x160" alt="" width="270" height="160" /></a>
                                    </figure>
                                    <div class="details">
                                        <a title="View all" href="hotel-detailed.html" class="pull-right button uppercase">select</a>
                                        <h4 class="box-title">Forte Do Vale</h4>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">$120</span>avg/night
                                        </label>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img src="http://placehold.it/270x160" alt="" width="270" height="160" /></a>
                                    </figure>
                                    <div class="details">
                                        <a title="View all" href="hotel-detailed.html" class="pull-right button uppercase">select</a>
                                        <h4 class="box-title">Gran Canaria</h4>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">$322</span>avg/night
                                        </label>
                                    </div>
                                </article>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="block row">
                        <div class="col-md-6">
                            <h2>Hot Hotel Details</h2>
                            <div class="tab-container style1 box">
                                <ul class="tabs">
                                    <li class="active"><a href="#hot-hotel-popular" data-toggle="tab">Popular</a></li>
                                    <li><a href="#hot-hotel-lasvegas" data-toggle="tab">Las Vegas</a></li>
                                    <li><a href="#hot-hotel-miami" data-toggle="tab">Miami</a></li>
                                    <li><a href="#hot-hotel-sanfrancisco" data-toggle="tab">San Francisco</a></li>
                                    <li><a href="#hot-hotel-hongkong" data-toggle="tab">Hong Kong</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="hot-hotel-popular">
                                        <div class="row">
                                            <div class="col-xs-2">
                                                <a href="#" class="badge-container"><span class="badge-content">save 23%</span><img class="full-width" src="http://placehold.it/63x63" alt="" width="63" height="63" /></a>
                                            </div>
                                            <div class="col-xs-8">
                                                <h5 class="box-title">Warwick Hotel<small>New york, usa</small></h5>
                                                <p class="no-margin">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                            </div>
                                            <div class="col-xs-2">
                                                <span class="price"><small>avg/night</small>$115</span>
                                                <br /><br />
                                                <a class="button green-bg pull-right" href="hotel-detailed.html">SELECT</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-2">
                                                <a href="#" class="badge-container"><span class="badge-content">save 23%</span><img class="full-width" src="http://placehold.it/63x63" alt="" width="63" height="63" /></a>
                                            </div>
                                            <div class="col-xs-8">
                                                <h5 class="box-title">Warwick Hotel<small>New york, usa</small></h5>
                                                <p class="no-margin">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                            </div>
                                            <div class="col-xs-2">
                                                <span class="price"><small>avg/night</small>$115</span>
                                                <br /><br />
                                                <a class="button green-bg pull-right" href="hotel-detailed.html">SELECT</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="hot-hotel-lasvegas">
                                        
                                    </div>
                                    <div class="tab-pane fade" id="hot-hotel-miami">
                                        
                                    </div>
                                    <div class="tab-pane fade" id="hot-hotel-sanfrancisco">
                                        
                                    </div>
                                    <div class="tab-pane fade" id="hot-hotel-hongkong">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2>What Travelers Say?</h2>
                            <div class="testimonial style1 box">
                                <ul class="slides ">
                                    <li>
                                        <p class="description">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize your entire trip using their extremely fast website and up to date listings. I’m super excited about my next trip to Paris.</p>
                                        <div class="author clearfix">
                                            <a href="#"><img src="http://placehold.it/270x270" alt="" width="74" height="74" /></a>
                                            <h5 class="name">Jessica Brown<small>guest</small></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="description">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize your entire trip using their extremely fast website and up to date listings. I’m super excited about my next trip to Paris.</p>
                                        <div class="author clearfix">
                                            <a href="#"><img src="http://placehold.it/270x270" alt="" width="74" height="74" /></a>
                                            <h5 class="name">Lisa Kimberly<small>guest</small></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="description">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize your entire trip using their extremely fast website and up to date listings. I’m super excited about my next trip to Paris.</p>
                                        <div class="author clearfix">
                                            <a href="#"><img src="http://placehold.it/270x270" alt="" width="74" height="74" /></a>
                                            <h5 class="name">Jessica Brown<small>guest</small></h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <h2>Travelers Choice of Hotels</h2>
                    <div class="image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
                        <ul class="slides image-box hotel listing-style1">
                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                    </figure>
                                    <div class="details">
                                        <span class="price">
                                            <small>avg/night</small>
                                            $360
                                        </span>
                                        <h4 class="box-title">Hotel Hilton<small>Paris france</small></h4>
                                        <div class="feedback">
                                            <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                            <span class="review">270 reviews</span>
                                        </div>
                                        <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                        <div class="action">
                                            <a class="button btn-small" href="hotel-detailed.html">SELECT</a>
                                            <a class="button btn-small yellow popup-map" href="#" data-box="48.856614, 2.352222">VIEW ON MAP</a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                    </figure>
                                    <div class="details">
                                        <span class="price"><small>avg/night</small>$188</span>
                                        <h4 class="box-title">Forte Do Vale<small>Albufeira</small></h4>
                                        <div class="feedback">
                                            <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                            <span class="review">170 reviews</span>
                                        </div>
                                        <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                        <div class="action">
                                            <a class="button btn-small" href="hotel-detailed.html">SELECT</a>
                                            <a class="button btn-small yellow popup-map" href="#" data-box="37.089072, -8.247880">VIEW ON MAP</a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                    </figure>
                                    <div class="details">
                                        <span class="price"><small>avg/night</small>$322</span>
                                        <h4 class="box-title">Gran Canaria<small>spain</small></h4>
                                        <div class="feedback">
                                            <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                            <span class="review">485 reviews</span>
                                        </div>
                                        <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                        <div class="action">
                                            <a class="button btn-small" href="hotel-detailed.html">SELECT</a>
                                            <a class="button btn-small yellow popup-map" href="#" data-box="40.463667, -3.749220">VIEW ON MAP</a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                    </figure>
                                    <div class="details">
                                        <span class="price"><small>avg/night</small>$170</span>
                                        <h4 class="box-title">Roosevelt Hotel<small>New york</small></h4>
                                        <div class="feedback">
                                            <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                            <span class="review">75 reviews</span>
                                        </div>
                                        <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                        <div class="action">
                                            <a class="button btn-small" href="hotel-detailed.html">SELECT</a>
                                            <a class="button btn-small yellow popup-map" href="#" data-box="40.705631, -73.978003">VIEW ON MAP</a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                    </figure>
                                    <div class="details">
                                        <span class="price">
                                            <small>avg/night</small>
                                            $360
                                        </span>
                                        <h4 class="box-title">Hotel Hilton<small>Paris france</small></h4>
                                        <div class="feedback">
                                            <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                            <span class="review">270 reviews</span>
                                        </div>
                                        <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                        <div class="action">
                                            <a class="button btn-small" href="hotel-detailed.html">SELECT</a>
                                            <a class="button btn-small yellow popup-map" href="#" data-box="48.856614, 2.352222">VIEW ON MAP</a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="global-map-area promo-box no-margin parallax" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="content-section description pull-right col-sm-9">
                        <div class="table-wrapper hidden-table-sm">
                            <div class="table-cell">
                                <h2 class="m-title animated" data-animation-type="fadeInDown">
                                    Tell us where you would like to go.<br /><em>12,000+ Hotel and Resorts Available!</em>
                                </h2>
                            </div>
                            <div class="table-cell action-section col-md-4 no-float">
                                <form action="hotel-list-view.html" method="post">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-12">
                                            <input type="text" class="input-text input-large full-width" value="" placeholder="Enter destination or hotel name" />
                                        </div>
                                        <div class="col-xs-6 col-md-12">
                                            <button class="full-width btn-large animated" data-animation-type="fadeInUp" data-animation-delay="1">search hotels</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="image-container col-sm-4">
                        <img src="http://placehold.it/342x258" alt="" width="342" height="258" class="animated" data-animation-type="fadeInUp" data-animation-duration="2" />
                    </div>
                </div>
            </div>
        </section>