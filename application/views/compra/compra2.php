        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Compra de entrada</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">Evento</a></li>
                    <li class="active">Compra</li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                        <div class="booking-section travelo-box">
                            
                            <form class="booking-form" method="post" action="booking-handler.php" onsubmit="return false;">
                                <div class="alert small-box" style="display: none;"></div>
                                <div class="person-information">
                                    <h2>Your Personal Information</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>first name</label>
                                            <input type="text" name="firstname" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>last name</label>
                                            <input type="text" name="lastname" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>email address</label>
                                            <input type="text" name="email" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Verify E-mail Address</label>
                                            <input type="text" name="vemail" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Country code</label>
                                            <div class="selector">
                                                <select name="country_code" class="full-width">
                                                    <option value="uk">United Kingdom (+44)</option>
                                                    <option value="us">United States (+1)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Phone number</label>
                                            <input type="text" name="phone" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="promo_offer" value="1"> I want to receive <span class="skin-color">Travelo</span> promotional offers in the future
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="card-information">
                                    <h2>Your Card Information</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Credit Card Type</label>
                                            <div class="selector">
                                                <select name="card_type" class="full-width">
                                                    <option>select a card</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Card holder name</label>
                                            <input type="text" name="card_holder_name" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Card number</label>
                                            <input type="text" name="card_number" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Card identification number</label>
                                            <input type="text" name="card_id_number" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Expiration Date</label>
                                            <div class="constant-column-2">
                                                <div class="selector">
                                                    <select name="exp_date_m" class="full-width">
                                                        <option>month</option>
                                                    </select>
                                                </div>
                                                <div class="selector">
                                                    <select name="exp_date_y" class="full-width">
                                                        <option>year</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-2">
                                            <label>billing zip code</label>
                                            <input type="text" name="zipcode" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="term"> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <button type="submit" class="full-width btn-large">CONFIRM BOOKING</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                        <div class="booking-details travelo-box">
                            <h4>Booking Details</h4>
                            <article class="image-box hotel listing-style1">
                                <figure class="clearfix">
                                    <a href="hotel-detailed.html" class="hover-effect middle-block"><img class="middle-item" width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                    <div class="travel-title">
                                        <h5 class="box-title">Hotel Hilton<small>Paris france</small></h5>
                                        <a href="hotel-detailed.html" class="button">EDIT</a>
                                    </div>
                                </figure>
                                <div class="details">
                                    <div class="feedback">
                                        <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                        <span class="review">270 reviews</span>
                                    </div>
                                    <div class="constant-column-3 timing clearfix">
                                        <div class="check-in">
                                            <label>Check in</label>
                                            <span>NOV 30, 2013<br />11 AM</span>
                                        </div>
                                        <div class="duration text-center">
                                            <i class="soap-icon-clock"></i>
                                            <span>2 Nights</span>
                                        </div>
                                        <div class="check-out">
                                            <label>Check out</label>
                                            <span>DEC 02, 2013<br />2 PM</span>
                                        </div>
                                    </div>
                                    <div class="guest">
                                        <small class="uppercase">1 Standard family room for <span class="skin-color">3 Persons</span></small>
                                    </div>
                                </div>
                            </article>
                            
                            <h4>Other Details</h4>
                            <dl class="other-details">
                                <dt class="feature">room Type:</dt><dd class="value">Standard Family</dd>
                                <dt class="feature">per Room price:</dt><dd class="value">$121</dd>
                                <dt class="feature">2 night Stay:</dt><dd class="value">$242</dd>
                                <dt class="feature">taxes and fees:</dt><dd class="value">$10</dd>
                                <dt class="total-price">Total Price</dt><dd class="total-price-value">$252</dd>
                            </dl>
                        </div>
                        
                        <div class="travelo-box contact-box">
                            <h4>Need Travelo Help?</h4>
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
        </section>