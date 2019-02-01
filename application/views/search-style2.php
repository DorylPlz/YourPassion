<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>Travelo - Travel, Tour Booking HTML5 Template</title>
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Travelo - Travel, Tour Booking HTML5 Template">
    <meta name="author" content="SoapTheme">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/animate.min.css">
    
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="components/revolution_slider/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/revolution_slider/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/jquery.bxslider/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/flexslider/flexslider.css" media="screen" />
    
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="css/style.css">
    
    <!-- Updated Styles -->
    <link rel="stylesheet" href="css/updates.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" />
    <![endif]-->
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body>
    <div id="page-wrapper">
        <section id="content" class="image-bg1">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="search-box-wrapper style1">
                            <div class="search-box">
                                <ul class="search-tabs clearfix">
                                    <li><a href="#hotels-tab" data-toggle="tab"><i class="soap-icon-hotel"></i>HOTELS</a></li>
                                    <li class="active"><a href="#flights-tab" data-toggle="tab"><i class="soap-icon-plane-right takeoff-effect"></i>FLIGHTS</a></li>
                                    <li><a href="#flight-and-hotel-tab" data-toggle="tab"><i class="soap-icon-flight-hotel"></i>FLIGHT &amp; HOTELS</a></li>
                                    <li><a href="#cars-tab" data-toggle="tab"><i class="soap-icon-car"></i>CARS</a></li>
                                    <li><a href="#cruises-tab" data-toggle="tab"><i class="soap-icon-cruise"></i>CRUISES</a></li>
                                    <li><a href="#flight-status-tab" data-toggle="tab"><i class="soap-icon-status"></i>FLIGHT STATUS</a></li>
                                    <li><a href="#online-checkin-tab" data-toggle="tab"><i class="soap-icon-stories"></i>ONLINE CHECK IN</a></li>
                                </ul>
                                <div class="visible-mobile">
                                    <ul id="mobile-search-tabs" class="search-tabs clearfix">
                                        <li><a href="#hotels-tab">HOTELS</a></li>
                                        <li class="active"><a href="#flights-tab">FLIGHTS</a></li>
                                        <li><a href="#flight-and-hotel-tab">FLIGHT &amp; HOTELS</a></li>
                                        <li><a href="#cars-tab">CARS</a></li>
                                        <li><a href="#cruises-tab">CRUISES</a></li>
                                        <li><a href="#flight-status-tab">FLIGHT STATUS</a></li>
                                        <li><a href="#online-checkin-tab">ONLINE CHECK IN</a></li>
                                    </ul>
                                </div>
                                
                                <div class="search-tab-content">
                                    <div class="tab-pane fade" id="hotels-tab">
                                        <form action="hotel-list-view.html" method="post">
                                            <div class="title-container">
                                                <h2 class="search-title">Search and Book Hotels</h2>
                                                <p>We're bringing you a new level of comfort.</p>
                                                <i class="soap-icon-hotel"></i>
                                            </div>
                                            <div class="search-content">
                                                <h5 class="title">Where</h5>
                                                <label>Your Destination</label>
                                                <input type="text" class="input-text full-width" placeholder="enter a destination or hotel name" />
                                                <hr>
                                                <h5 class="title">When</h5>
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
                                                <hr>
                                                <h5 class="title">Who</h5>
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label>ROOMS</label>
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
                                                        <label>ADULTS</label>
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
                                                        <label>KIDS</label>
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
                                                <hr>
                                                <button type="submit" class="full-width uppercase">Proceed To Result</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade active in" id="flights-tab">
                                        <form action="flight-list-view.html" method="post">
                                            <div class="title-container">
                                                <h2 class="search-title">Search and Book Flights</h2>
                                                <p>We're bringing you a new level of comfort.</p>
                                                <i class="soap-icon-plane-right takeoff-effect"></i>
                                            </div>
                                            <div class="search-content">
                                                <!--<div class="row choose-travel">
                                                    <div class="col-xs-4">
                                                        <label class="radio radio-inline">
                                                            <input type="radio" name="choose-travel" value="1">Oneway
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <label class="radio radio-inline">
                                                            <input type="radio" name="choose-travel" value="2">Round Trip
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <label class="radio radio-inline">
                                                            <input type="radio" name="choose-travel" value="3">Multi-city
                                                        </label>
                                                    </div>
                                                </div>
                                                <hr>-->
                                                <h5 class="title">Where</h5>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label>Leaving From</label>
                                                        <input type="text" class="input-text full-width" placeholder="enter your location" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label>Going To</label>
                                                        <input type="text" class="input-text full-width" placeholder="enter a destination" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="title">When</h5>
                                                <label>Departing On</label>
                                                <div class="row">
                                                    <div class="col-xs-6 col-md-5">
                                                        <div class="datepicker-wrap">
                                                            <input type="text" name="date_from" class="input-text full-width" placeholder="select date" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6 col-md-5">
                                                        <div class="selector">
                                                            <select>
                                                                <option value="">select date</option>
                                                                <option value="1">anytime</option>
                                                                <option value="2">morning</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Arriving On</label>
                                                <div class="row">
                                                    <div class="col-xs-6 col-md-5">
                                                        <div class="datepicker-wrap">
                                                            <input type="text" name="date_to" class="input-text full-width" placeholder="select date" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6 col-md-5">
                                                        <div class="selector">
                                                            <select>
                                                                <option value="">select date</option>
                                                                <option value="1">anytime</option>
                                                                <option value="2">morning</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="title">Who</h5>
                                                <div class="row">
                                                    <div class="col-xs-4 col-md-3">
                                                        <label>Adults</label>
                                                        <div class="selector">
                                                            <select>
                                                                <option value="1">01</option>
                                                                <option value="2">02</option>
                                                                <option value="3">03</option>
                                                                <option value="4">04</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4 col-md-3">
                                                        <label>Kids</label>
                                                        <div class="selector">
                                                            <select>
                                                                <option value="1">01</option>
                                                                <option value="2">02</option>
                                                                <option value="3">03</option>
                                                                <option value="4">04</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4 col-md-3">
                                                        <label>Infants</label>
                                                        <div class="selector">
                                                            <select>
                                                                <option value="1">01</option>
                                                                <option value="2">02</option>
                                                                <option value="3">03</option>
                                                                <option value="4">04</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="title">Class <small>(Optional)</small></h5>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label>Class of travel</label>
                                                        <div class="selector">
                                                            <select>
                                                                <option value="">Economy</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label>Preferred Airline</label>
                                                        <div class="selector">
                                                            <select>
                                                                <option value="">select name</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <button type="submit" class="full-width btn-medium">PROCEED TO RESULT</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="flight-and-hotel-tab">
                                        <form action="flight-list-view.html" method="post">
                                            <div class="title-container">
                                                <h2 class="search-title">Search and Book Flight &amp; Hotels</h2>
                                                <p>We're bringing you a new level of comfort.</p>
                                                <i class="soap-icon-flight-hotel"></i>
                                            </div>
                                            <div class="search-content">
                                                <h5 class="title">Where</h5>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label>Leaving From</label>
                                                        <input type="text" class="input-text full-width" placeholder="enter your location" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label>Going To</label>
                                                        <input type="text" class="input-text full-width" placeholder="enter a destination" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="title">When</h5>
                                                <label>Departing On</label>
                                                <div class="row">
                                                    <div class="col-xs-6 col-md-5">
                                                        <div class="datepicker-wrap">
                                                            <input type="text" name="date_from" class="input-text full-width" placeholder="select date" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6 col-md-5">
                                                        <div class="selector">
                                                            <select>
                                                                <option value="">select date</option>
                                                                <option value="1">anytime</option>
                                                                <option value="2">morning</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Arriving On</label>
                                                <div class="row">
                                                    <div class="col-xs-6 col-md-5">
                                                        <div class="datepicker-wrap">
                                                            <input type="text" name="date_to" class="input-text full-width" placeholder="select date" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6 col-md-5">
                                                        <div class="selector">
                                                            <select>
                                                                <option value="">select date</option>
                                                                <option value="1">anytime</option>
                                                                <option value="2">morning</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="title">Who</h5>
                                                <div class="row">
                                                    <div class="col-xs-4 col-md-3">
                                                        <label>Adults</label>
                                                        <div class="selector">
                                                            <select>
                                                                <option value="1">01</option>
                                                                <option value="2">02</option>
                                                                <option value="3">03</option>
                                                                <option value="4">04</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4 col-md-3">
                                                        <label>Kids</label>
                                                        <div class="selector">
                                                            <select>
                                                                <option value="1">01</option>
                                                                <option value="2">02</option>
                                                                <option value="3">03</option>
                                                                <option value="4">04</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4 col-md-3">
                                                        <label>Infants</label>
                                                        <div class="selector">
                                                            <select>
                                                                <option value="1">01</option>
                                                                <option value="2">02</option>
                                                                <option value="3">03</option>
                                                                <option value="4">04</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="title">Class <small>(Optional)</small></h5>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label>Class of travel</label>
                                                        <div class="selector">
                                                            <select>
                                                                <option value="">Economy</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label>Preferred Airline</label>
                                                        <div class="selector">
                                                            <select>
                                                                <option value="">select name</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <button type="submit" class="full-width btn-medium">PROCEED TO RESULT</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="cars-tab">
                                        <form action="car-list-view.html" method="post">
                                            <div class="title-container">
                                                <h2 class="search-title">Search Cars</h2>
                                                <p>We're bringing you a new level of comfort.</p>
                                                <i class="soap-icon-car"></i>
                                            </div>
                                            <div class="search-content">
                                                <div class="row">
                                                    <h5 class="title">Where</h5>
                                                    <div class="col-xs-6">
                                                        <label>Pick Up</label>
                                                        <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label>Drop Off</label>
                                                        <input type="text" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="title">When</h5>
                                                <label>Pick-Up Date / Time</label>
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
                                                <hr>
                                                <h5 class="title">Who</h5>
                                                <div class="row">
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
                                                <hr>
                                                <div class="row">
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
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <button type="submit" class="full-width">PROCEED TO RESULT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="cruises-tab">
                                        <form action="cruise-list-view.html" method="post">
                                            <div class="title-container">
                                                <h2 class="search-title">Search and Book Cruises</h2>
                                                <p>We're bringing you a new level of comfort.</p>
                                                <i class="soap-icon-cruise"></i>
                                            </div>
                                            <div class="search-content">
                                                <h5 class="title">Where</h5>
                                                <div class="form-group">
                                                    <label>Your Destination</label>
                                                    <input type="text" class="input-text full-width" placeholder="enter a destination or hotel name" />
                                                </div>
                                                <hr>
                                                <h5 class="title">When</h5>
                                                <div class="row">
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
                                                <hr>
                                                <h5 class="title">Who</h5>
                                                <div class="row">
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
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <button type="submit" class="full-width">PROCEED TO RESULT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="flight-status-tab">
                                        <form action="flight-list-view.html" method="post">
                                            <div class="title-container">
                                                <h2 class="search-title">Flight Status</h2>
                                                <p>We're bringing you a new level of comfort.</p>
                                                <i class="soap-icon-status"></i>
                                            </div>
                                            <div class="search-content">
                                                <h5 class="title">Where</h5>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label>Leaving From</label>
                                                        <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label>Going To</label>
                                                        <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="title">When</h5>
                                                <label>Departure Date</label>
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                                <hr>
                                                <h5 class="title">Who</h5>
                                                <label>Flight Number</label>
                                                <input type="text" class="input-text full-width" placeholder="enter flight number" />
                                                <hr>
                                                <button type="submit" class="full-width">PROCEED TO RESULT</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="online-checkin-tab">
                                        <form>
                                            <div class="title-container">
                                                <h2 class="search-title">Online Check-In</h2>
                                                <p>We're bringing you a new level of comfort.</p>
                                                <i class="soap-icon-stories"></i>
                                            </div>
                                            <div class="search-content">
                                                <h5 class="title">Where</h5>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label>Leaving From</label>
                                                        <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label>Going To</label>
                                                        <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="title">When</h5>
                                                <label>Departure Date</label>
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                </div>
                                                <hr>
                                                <h5 class="title">Who</h5>
                                                <label>Full Name</label>
                                                <input type="text" class="input-text full-width" placeholder="enter your full name" />
                                                <hr>
                                                <button type="submit" class="full-width">SEARCH NOW</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar col-sm-4 col-md-3">
                        <div class="travelo-box contact-box">
                            <h4>Need Travelo Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                                <br>
                                <a class="contact-email" href="#">help@travelo.com</a>
                            </address>
                        </div>
                        <div class="travelo-box book-with-us-box">
                            <h4>Why Book with us?</h4>
                            <ul>
                                <li>
                                    <i class="soap-icon-hotel-1 circle"></i>
                                    <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                </li>
                                <li>
                                    <i class="soap-icon-savings circle"></i>
                                    <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                </li>
                                <li>
                                    <i class="soap-icon-support circle"></i>
                                    <h5 class="title"><a href="#">Excellent Support</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- Javascript -->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.noconflict.js"></script>
    <script type="text/javascript" src="js/modernizr.2.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="js/jquery-ui.1.10.4.min.js"></script>
    
    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
    <!-- load BXSlider scripts -->
    <script type="text/javascript" src="components/jquery.bxslider/jquery.bxslider.min.js"></script>
    
    <!-- parallax -->
    <script type="text/javascript" src="js/jquery.stellar.min.js"></script>
    
    <!-- waypoint -->
    <script type="text/javascript" src="js/waypoints.min.js"></script>

    <!-- load page Javascript -->
    <script type="text/javascript" src="js/theme-scripts.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    
    <script type="text/javascript">
        
    </script>
</body>
</html>

