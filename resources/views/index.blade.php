@extends('layout')
@section('main-body')

    <section class="rev_slider_wrapper ">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="rev_slider slider1" data-version="5.0">
            <ul>
                @foreach ($banner as $value)


                <li data-transition="random" data-title="Wheel Installation" data-thumb="/{{$value->image}}">
                    <img src="/{{$value->image}}" alt="" width="1920" height="820" data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat">

                    <div class="tp-caption tp-resizeme" data-x="left" data-hoffset="0" data-y="center" data-voffset="142" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="500">
                        <div class="wheel-installation">
                            <!-- <h3><a href="">For Wheel</a></h3> -->
                            <!-- <div class="rate">
                                <h1></h1>
                                <div class="doller-img">
                                    <img src="/img/resources/doller.png" class="price-icon" alt="">
                                </div>
                            </div>
                            <h1>Wheel installation</h1> -->
                            <!-- <span class="border"></span> -->
                            <p>The trusted experts will to keep you safe on the road, It is a long established fact<br> that a reader will be distracted by the AuotoCare.</p>
                        </div>
                    </div>

                    @endforeach
                </li>

                <!-- <li data-transition="random" data-title="Auto Repair" data-thumb="img/slides/2.jpg">
                    <img src="/img/slides/tyre-aligment2.jpg" alt="" width="1920" height="820" data-bgposition="top right" data-bgfit="cover" data-bgrepeat="no-repeat">

                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="40" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="500">
                        <span class="banner-h2">One Stop Shop For</span>
                    </div>
                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="105" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="1000">
                        <span class="banner-h1">All the Auto Repairs</span>
                    </div>
                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="170" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="1500">
                        <span class="banner-border"></span>&emsp;<span class="banner-h3">Spares Onwards $49.00</span>&emsp;<span class="banner-border"></span>
                    </div>
                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="235" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="2000">
                        <a href="#" class="aut-cr-btn inverse">Know More</a> &emsp;
                        <a href="#" class="aut-cr-btn">Shop Now</a>
                    </div>


                </li>

                <li data-transition="random" data-title="Full Checkup" data-thumb="img/slides/3.jpg">
                    <img src="img/slides/headerimages3.jpg" alt="" width="1920" height="820" data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat">

                    <div class="tp-caption tp-resizeme" data-x="right" data-hoffset="0" data-y="center" data-voffset="142" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-start="500">
                        <div class="wheel-installation">
                            <h3><a href="">Your Car</a></h3>
                            <div class="rate">
                                <h1>999</h1>
                                <div class="doller-img">
                                    <img src="/img/resources/doller.png" class="price-icon" alt="">
                                </div>
                            </div>
                            <h1>Complete Checkup</h1>
                            <span class="border"></span>
                            <p>The trusted experts will to keep you safe on the road, It is a long established fact<br> that a reader will be distracted by the AuotoCare.</p>
                        </div>
                    </div>

                </li> -->
            </ul>
        </div>
    </section>
    <!--Start Call To Action Area-->
    <section class="call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-md-8">
                                <h2>Get First Class Services For Your Vichcle</h2>
                            </div>
                            <div class="col-md-4">
                                <a href="">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Call To Action Area-->
    <!--Start quality service area-->
    <section class="quality-service-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="service-content">
                        <div class="sec-title text-left">
                            <h2>We Providing Convinient & Quality Services</h2>
                            <span class="decor"></span>
                        </div>
                        <p>
                            At Tyre point, we provide convenient and quality services to keep your vehicle's tires in top condition. Our expert technicians offer precise wheel balancing and alignment to ensure smooth driving and prolonged tire life. We use the latest equipment to maintain optimal tire pressure and tread depth. Visit us for reliable tire care and experience the best in automotive service.</p>
                        <a class="aut-cr-btn" href="">Read More</a>
                        <a class="aut-cr-btn" href="">View Services</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="service-client-carousel">
                        <div id="service-client-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <!--Start single item-->
                                <div class="item active">
                                    <div class="single-item">
                                        <div class="img-holder">
                                            <img src="img/resources/service-client/circle_16567510.png" alt="Awesome Image">
                                            <span class="line"></span>
                                        </div>
                                        <div class="content">
                                            <h3>Unus salim</h3>
                                            <div class="info-box clearfix">
                                                <h6>Co Founder</h6>
                                                <div class="rating">
                                                    <!-- <ul>
                                                        <li><span class="flaticon-favorite"></span></li>
                                                        <li><span class="flaticon-favorite"></span></li>
                                                        <li><span class="flaticon-favorite"></span></li>
                                                        <li><span class="flaticon-favorite"></span></li>
                                                        <li><span class="flaticon-favorite-1"></span></li>
                                                    </ul> -->
                                                </div>
                                            </div>
                                            <p>
                                                At Tyre and Wheel Alignment Shop, we provide top-notch tire care services to ensure your vehicle's tires are in the best condition. Our expert technicians offer precise wheel balancing and alignment, using the latest equipment to maintain optimal tire pressure and tread depth. Visit us for reliable tire care and the best in automotive service. Your satisfaction is our priority.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End single item-->
                                <!--Start single item-->
                                <div class="item">
                                    <div class="single-item">
                                        <div class="img-holder">
                                            <img src="img/resources/service-client/circle_16567510.png" alt="Awesome Image">
                                            <span class="line"></span>
                                        </div>
                                        <div class="content">
                                            <h3>Swaan Richard</h3>
                                            <div class="info-box clearfix">
                                                <h6>Co Founder, BMW</h6>
                                                <div class="rating">
                                                    <ul>
                                                        <li><span class="flaticon-favorite"></span></li>
                                                        <li><span class="flaticon-favorite"></span></li>
                                                        <li><span class="flaticon-favorite"></span></li>
                                                        <li><span class="flaticon-favorite"></span></li>
                                                        <li><span class="flaticon-favorite-1"></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <p>How to pursue pleasure ratiio encounter consequences thats are nor is pursues thereanyone ut who loves or or to obtain pain of itself, because ut it is pain, but because occasionally ut quaerat voluptatem ut sed enim ad minima veniam exercitationem ullam.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End single item-->
                                <div class="button">
                                    <a class="left testimonial-control" href="#service-client-carousel" role="button" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                    <a class="right testimonial-control" href="#service-client-carousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End quality service area-->
    <!--Start trusted service area-->
    <section class="trusted-service-area" id="services">
        <div class="container">
            <div class="row">
                <!--Start single item-->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="single-item">
                        <div class="icon-holder">
                            <span class="flaticon-social"></span>
                        </div>
                        <div class="content">
                            <h3>100% Transparency</h3>
                            <p>We ensure that you get a well detailed break-up of each minor repair work</p>
                            <a href="#">Read More<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <!--End single item-->
                <!--Start single item-->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="single-item">
                        <div class="icon-holder">
                            <span class="flaticon-wrench"></span>
                        </div>
                        <div class="content">
                            <h3>Genuine Spare Parts</h3>
                            <p>We useuthorized genuine spare parts & accessories to ensure that your</p>
                            <a href="#">Read More<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <!--End single item-->
                <!--Start single item-->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="single-item">
                        <div class="icon-holder">
                            <span class="flaticon-map"></span>
                        </div>
                        <div class="content">
                            <h3>Trusted & Quality Service</h3>
                            <p>You can avail our free pickup & drop so that you can just sit & relax</p>
                            <a href="#">Read More<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <!--End single item-->
            </div>
        </div>
    </section>
    <!--End trusted service area-->
    <!--Start best service area-->
    <section id="our-best-services" class="best-service-area" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-bg"></div>
                </div>
            </div>
            <div class="sec-title large-title text-center">
                <h2>Our Best Services</h2>
                <span class="decor"></span>
            </div>
            <div class="row our-best-service-items">
                <!--Start single item-->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-holder">
                            <img src="/img/best-service/front-view-male-mechanic-working.jpg" alt="Awesome Image">
                        </div>
                        <div class="overlay">
                            <div class="img-holder">
                                <img src="/img/best-service/front-view-male-mechanic-working.jpg" alt="Awesome Image" />
                            </div><!-- /.img-holder -->
                            <div class="icon-holder">
                                <span class="flaticon-float"></span>
                            </div>
                            <div class="content">
                                <h3>Wheel Balancing Services</h3>
                                <p>Professional wheel balancing services ensure a smooth and safe driving experience by evenly distributing the weight of your vehicle's wheels and tyres.</p>
                                <a href="#">Read More<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="title clearfix">
                            <div class="icon-holder">
                                <span class="flaticon-float"></span>
                            </div>
                            <h3 style="font-size: 2.0rem;">Wheel Balancing</h3>
                            <div class="go-top-icon">
                                <a href="#"><span class="flaticon-up-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single item-->
                <!--Start single item-->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-holder">
                            <img src="/img/best-service/young-repairman-workwear-putting-new-wheel-car.jpg" alt="Awesome Image">
                        </div>
                        <div class="overlay">
                            <div class="img-holder">
                                <img src="/img/best-service/young-repairman-workwear-putting-new-wheel-car.jpg" alt="Awesome Image" />
                            </div><!-- /.img-holder -->
                            <div class="icon-holder">
                                <span class="flaticon-car-service"></span>
                            </div>
                            <div class="content">
                                <h3>Tyre Puncture Repair </h3>
                                <p>Expert tyre puncture repair services to get you back on the road quickly and safely.</p>
                                <a href="#">Read More<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="title clearfix">
                            <div class="icon-holder">
                                <span class="flaticon-car-service"></span>
                            </div>
                            <h3 style="font-size: 1.7rem;">Tyre Puncture Repair </h3>
                            <div class="go-top-icon">
                                <a href="#"><span class="flaticon-up-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single item-->
                <!--Start single item-->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="single-item middle">
                        <div class="img-holder">
                            <img src="/img/best-service/strong-hands-man-uniform-is-working-auto-service.jpg" alt="Awesome Image">
                        </div>
                        <div class="overlay">
                            <div class="img-holder">
                                <img src="/img/best-service/strong-hands-man-uniform-is-working-auto-service.jpg" alt="Awesome Image" />
                            </div><!-- /.img-holder -->
                            <div class="icon-holder">
                                <span class="flaticon-float"></span>
                            </div>
                            <div class="content">
                                <h3>Wheel Alignment</h3>
                                <p>Ensure optimal vehicle handling and tire longevity with professional wheel alignment services.</p>
                                <a href="#">Read More<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="title clearfix">
                            <div class="icon-holder">
                                <span class="flaticon-float"></span>
                            </div>
                            <h3 style="font-size: 2.0rem;">Wheel Alignment</h3>
                            <div class="go-top-icon">
                                <a href="#"><span class="flaticon-up-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single item-->
            </div>
        </div>
    </section>
    <!--End best service area-->
    <!--Start wheel work area-->
    <section class="wheel-work-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-6 col-xs-12">
                    <div class="wheel-work-left">
                        <div class="title">
                            <h1>Wheel Works</h1>
                        </div>
                        <div class="tab-content">
                            <!--Start single tab pane-->
                            <div class="tab-pane fade in active" id="wheelworks">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="img-holder">
                                            <img src="/img/wheel-work/pikaso_texttoimage_2.jpg" alt="Awesome Image">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="content">
                                            <h3>The trusted experts will to keep you safe on the road.</h3>
                                            <p style="color: white;">Know how to pursue pleasure rationally seds that encounter consequences are ut painfull nor again is there anyone who lovess or pursues or desires to obtain pain of itself, because it is pain, in which toil and pains can procure him some great pleasure ationally seds encounter works consequencees that are uts extremelly painfull pleasure rationally seds encounters consequences that are seds extremely painfull nor or pursues or desires. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Installation</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Balancing</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Allignment</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Changing</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Refinishing</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Punchure Repair</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Straightning</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Air Filling</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                </div>
                                <div class="button">
                                    <a class="aut-cr-btn" href="#">Contact us</a>
                                </div>
                            </div>
                            <!--End single tab pane-->
                            <!--Start single tab pane-->
                            <div class="tab-pane fade" id="airconditioner">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="img-holder">
                                            <img src="/img/wheel-work/pikaso_texttoimage_3.jpg" alt="Awesome Image">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="content">
                                            <h3>The trusted experts will to keep you safe on the road.</h3>
                                            <p style="color: white;">Know how to pursue pleasure rationally seds that encounter consequences are ut painfull nor again is theounter works consequencees that are uts extremelly painfull pleasure rationally seds encounters consequences that are seds extremely painfull nor or pursues or desires.tionally seds that encounter consequences are ut painfull nor again is theounter workstheounter works consequencees that are uts extremelly painfull pleasure rationally seds </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Installation</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Balancing</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Allignment</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Changing</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Refinishing</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Punchure Repair</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Straightning</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Air Filling</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                </div>
                                <div class="button">
                                    <a class="aut-cr-btn" href="#">Get Free Appoinment</a>
                                </div>
                            </div>
                            <!--End single tab pane-->
                            <!--Start single tab pane-->
                            <div class="tab-pane fade" id="painting-works">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="img-holder">
                                            
                                            <img src="/img/wheel-work/pikaso_texttoimage_5-.jpg" alt="Awesome Image">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="content">
                                            <h3>The trusted experts will to keep you safe on the road.</h3>
                                            <p style="color: white;">Know how to pursue pleasure rationally seds that encounter consequences are ut painfull nor again is theounter works consequencees that are uts extremelly painfull pleasure rationally sedssue pleasure rationally seds that encounter consequences are ut painfull nor again is theounter works consequencees that are uts extremelly painf pleasure ra sedssue pleasure rationally seds that encounter consequences are ut painfull.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Installation</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Balancing</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Allignment</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Changing</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Refinishing</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Punchure Repair</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Straightning</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Air Filling</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                </div>
                                <div class="button">
                                    <a class="aut-cr-btn" href="#">Get Free Appoinment</a>
                                </div>
                            </div>
                            <!--End single tab pane-->
                            <!--Start single tab pane-->
                            <div class="tab-pane fade" id="water-service">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="img-holder">
                                            <img src="/img/wheel-work/pikaso_texttoimage_5-.jpg" alt="Awesome Image">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="content">
                                            <h3>The trusted experts will to keep you safe on the road.</h3>
                                            <p style="color: white;">Rationally sedssue pleasure rationally seds that encounter consequences are ut painfull nor again is theounter works consequencees that are uts extremelly painf pleasure ra sedssue pleasure rationally seds that encounter consequences are ut painfull.Know how to pursue pleasure rationally seds that encounter consequences are ut painfull nor again is theounter works consequencees that are uts extremelly painfull pleasure</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Installation</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Balancing</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Allignment</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Changing</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Refinishing</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Punchure Repair</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Straightning</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Air Filling</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                </div>
                                <div class="button">
                                    <a class="aut-cr-btn" href="/contact">Contact us</a>
                                </div>
                            </div>
                            <!--End single tab pane-->
                            <!--Start single tab pane-->
                            <div class="tab-pane fade" id="engine-works">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="img-holder">
                                            <img src="img/wheel-work/pikaso_texttoimage_4.jpg" alt="Awesome Image">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="content">
                                            <h3>The trusted experts will to keep you safe on the road.</h3>
                                            <p style="color: white;">Consequencees that are uts extremelly painf pleasure ra sedssue pleasure rationally seds that encounter consequences are ut painfull.Know how to pursue pleasure rationally seds that encounter consequences are ut painfull nor again is theounter works consequencees that are uts extremelly painfull pleasure Rationally sedssue pleasure rationally seds that encounter consequences are ut painfull nor again is theounter works </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Installation</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Balancing</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Allignment</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Changing</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Refinishing</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Punchure Repair</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                    <!--Start single list item-->
                                    <div class="col-lg-3 col-md-6 col-sm-8">
                                        <div class="single-list-item">
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Straightning</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Wheel Air Filling</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End single list item-->
                                </div>
                                <div class="button">
                                    <a class="aut-cr-btn" href="/contact">contact us</a>
                                </div>
                            </div>
                            <!--End single tab pane-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                    <div class="wheel-work-right">
                        <h1>Other Services</h1>
                        <ul>
                            <li class="active">
                                <a href="#wheelworks" data-toggle="tab">
                                    <div class="single-other-service-list">
                                        <div class="icon-holder">
                                            <span class="flaticon-icon-1283"></span>
                                        </div>
                                        <div class="title">
                                        <h3>Wheel Balancing</h3>
                                        <h6>Vehicle Tyre Align</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#airconditioner" data-toggle="tab">
                                    <div class="single-other-service-list">
                                        <div class="icon-holder">
                                            <span class="flaticon-technology-2 conditioner"></span>
                                        </div>
                                        <div class="title">
                                            <h3>Alloy Wheels</h3>
                                            <h6>Tyre Fitting</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#painting-works" data-toggle="tab">
                                    <div class="single-other-service-list">
                                        <div class="icon-holder">
                                            <span class="flaticon-improvement"></span>
                                        </div>
                                        <div class="title">
                                        <h3>Wheel alignment</h3>
                                        <h6>Vehicle Tyre Align</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="#water-service" data-toggle="tab">
                                    <div class="single-other-service-list">
                                        <div class="icon-holder">
                                            <span class="flaticon-water-bomb-city-supplier"></span>
                                        </div>
                                        <div class="title">
                                            <h3>Water Service</h3>
                                            <h6>Maintanence Inspection</h6>
                                        </div>
                                    </div>
                                </a>
                            </li> -->
                            <li>
                                <a href="#engine-works" data-toggle="tab">
                                    <div class="single-other-service-list">
                                        <div class="icon-holder">
                                            <span class="flaticon-car"></span>
                                        </div>
                                        <div class="title">
                                        <h3>Nitrogen</h3>
                                        <h6>Service</h6>
                                           
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End wheel work area-->
    <!--Start faq and gallery area-->

    <section class="faq-and-gallery-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="faq-content-left">
                        <div class="sec-title text-left">
                            <h1>Customers FAQ’s</h1>
                            <span class="decor"></span>
                        </div>
                        <!--Start accordion box-->
                        <div class="accordion-box">
                            <!--Start single accordion box-->
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn">
                                    How often should I get my tyres aligned?
                                    <div class="toggle-icon">
                                        <span class="plus fa fa-plus"></span><span class="minus fa fa-minus"></span>
                                    </div>
                                </div>
                                <div class="acc-content">
                                    <p>It is recommended to get your tyres aligned every 6,000 to 10,000 miles or whenever you notice uneven tyre wear, your vehicle pulling to one side, or after hitting a significant pothole or curb.</p>
                                </div>
                            </div>
                            <!--End single accordion box-->
                            <!--Start single accordion box-->
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn active">
                                    What are benefits of regular tyre alignment?
                                    <div class="toggle-icon">
                                        <span class="plus fa fa-plus"></span><span class="minus fa fa-minus"></span>
                                    </div>
                                </div>
                                <div class="acc-content collapsed">
                                    <p>Regular tyre alignment improves your vehicle's handling, increases tyre lifespan, enhances fuel efficiency, and ensures a smoother and safer ride.</p>
                                </div>
                            </div>
                            <!--End single accordion box-->
                            <!--Start single accordion box-->
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn">
                                    How long does a tyre alignment service take?
                                    <div class="toggle-icon">
                                        <span class="plus fa fa-plus"></span><span class="minus fa fa-minus"></span>
                                    </div>
                                </div>
                                <div class="acc-content">
                                    <p> A typical tyre alignment service takes about 1 to 1.5 hours, depending on the condition of your vehicle and any additional adjustments needed.</p>
                                </div>
                            </div>
                            <!--End single accordion box-->
                        </div>
                        <!--End accordion box-->
                        <div class="row">
                            <div class="col-md-12">
                                <a class="more-question" href="#">View More Questions<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="work-gallery-right">
                        <div class="sec-title text-left">
                            <h1>Our Work Gallery</h1>
                            <span class="decor"></span>
                        </div>
                        <div class="work-gallery-items">
                            <!--Start single item-->
                            @foreach ($first_gallery as $value)
                            <div class="single-item">
                                <div class="img-holder">
                                    <img style="width: 377px; height: 176px;" src="/{{$value->image}}" alt="Awesome Image">
                                    <div class="overlay">
                                        <div class="image-view">
                                            <div class="content">
                                                <a href="/{{$value->image}}" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!--End single item-->
                            <!--Start single item-->
                            <!-- <div class="single-item">
                                <div class="img-holder">
                                    <img style="width: 183px; height: 176px;" src="img/work-gallery/workgallery2.jpg" alt="Awesome Image">
                                    <div class="overlay">
                                        <div class="image-view">
                                            <div class="content">
                                                <a href="/img/work-gallery/workgallery2.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!--End single item-->
                            <!--Start single item-->
                            @foreach ($gallery as $value)
                            <div class="single-item">
                                <div class="img-holder">
                                    <img style="width: 183px; height: 176px;" src="/{{$value->image}}" alt="Awesome Image">
                                    <div class="overlay">
                                        <div class="image-view">
                                            <div class="content">
                                                <a href="/{{$value->image}}" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!--End single item-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End faq and gallery area-->
    <!--Start meet our Specialist area-->
    <!-- <section class="meet-our-specialist-area">
        <div class="container">
            <div class="sec-title text-center">
                <h1>Meet Our Specialist</h1>
                <span class="decor"></span>
            </div>
            <div class="row">
               Start single item-->
    <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-holder">
                            <img src="img/our-specialist/1.jpg" alt="Awesome Image">
                            <div class="overlay">
                                <div class="content">
                                    <div class="social-icon">
                                        <ul>
                                            <li><a href="#"><i class="flaticon-facebook-letter-logo"></i></a></li>
                                            <li><a href="#"><i class="flaticon-twitter-logo-silhouette"></i></a></li>
                                            <li><a href="#"><i class="flaticon-google-plus-logo"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <h3>Jason Blackhead</h3>
                            <h6>Senior Mechanic</h6>
                            <p>Neque porro quisquam dolorem ut ipsum quia dolormet consecteture, adipisci velit, ut quia.</p>
                            <div class="mail">
                                <p><span class="flaticon-mail"></span><span class="email-text">Email:</span> blackhead@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!--End single item-->
    <!--Start single item-->
    <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-holder">
                            <img src="img/our-specialist/2.jpg" alt="Awesome Image">
                            <div class="overlay">
                                <div class="content">
                                    <div class="social-icon">
                                        <ul>
                                            <li><a href="#"><i class="flaticon-facebook-letter-logo"></i></a></li>
                                            <li><a href="#"><i class="flaticon-twitter-logo-silhouette"></i></a></li>
                                            <li><a href="#"><i class="flaticon-google-plus-logo"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <h3>Jonathan Duck</h3>
                            <h6>Board Director</h6>
                            <p>Porro quisquam dolorem ut under ipsum quia dolormet consecte sed adipisci velit labour got.</p>
                            <div class="mail">
                                <p><span class="flaticon-mail"></span><span class="email-text">Email:</span> jonathan@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!--End single item-->
    <!--Start single item-->
    <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-holder">
                            <img src="img/our-specialist/3.jpg" alt="Awesome Image">
                            <div class="overlay">
                                <div class="content">
                                    <div class="social-icon">
                                        <ul>
                                            <li><a href="#"><i class="flaticon-facebook-letter-logo"></i></a></li>
                                            <li><a href="#"><i class="flaticon-twitter-logo-silhouette"></i></a></li>
                                            <li><a href="#"><i class="flaticon-google-plus-logo"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <h3>Esther Fletcher</h3>
                            <h6>Senior Inspector</h6>
                            <p>Master quisquam dolorem ut under ipsum quia dolormet consecte sed adipisci common finance.</p>
                            <div class="mail">
                                <p><span class="flaticon-mail"></span><span class="email-text">Email:</span> esther@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!--End single item-->
    <!--Start single item-->
    <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-holder">
                            <img src="img/our-specialist/4.jpg" alt="Awesome Image">
                            <div class="overlay">
                                <div class="content">
                                    <div class="social-icon">
                                        <ul>
                                            <li><a href="#"><i class="flaticon-facebook-letter-logo"></i></a></li>
                                            <li><a href="#"><i class="flaticon-twitter-logo-silhouette"></i></a></li>
                                            <li><a href="#"><i class="flaticon-google-plus-logo"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <h3>Robert Harwing</h3>
                            <h6>Mechanic</h6>
                            <p>Services quisquam do lorems saving ipsum quia dolormet consecte price wil get in month.</p>
                            <div class="mail">
                                <p><span class="flaticon-mail"></span><span class="email-text">Email:</span> harwing@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </section> -->
    <!--End meet our Specialist area-->
    <!-- <section class="gallery-v3-area grid-layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="gallery-filter post-filter has-dynamic-filter-counter masonary">
                        <li class="filter active" data-filter=".single-filter-item "><span>View All</span></li>
                        <li class="filter" data-filter=".car"><span>Car Body</span></li>
                        <li class="filter" data-filter=".engine"><span>Engine</span></li>  
                        <li class="filter" data-filter=".wheel"><span>Wheel</span></li>  
                        <li class="filter" data-filter=".repair"><span>Repair</span></li>  
                        <li class="filter" data-filter=".belts"><span>Belts & Hoses</span></li>  
                        <li class="filter" data-filter=".mechanic"><span>Mechanic</span></li>   
                    </ul>
                </div>
            </div>
            
            <div class="row gallery-content filter-layout" data-filter-class="filter">
      
                <div class="col-md-3 single-filter-item car engine wheel">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-1.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="img/gallery/g-grid-v3-1.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
     
                <div class="col-md-3 single-filter-item belts repair engine">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-2.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="img/gallery/g-grid-v3-2.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
           
                <div class="col-md-3 single-filter-item belts engine wheel repair">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-3.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="img/gallery/g-grid-v3-3.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
     
                <div class="col-md-3 single-filter-item mechanic engine wheel repair belts">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-4.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="img/gallery/g-grid-v3-4.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
  
                <div class="col-md-3 single-filter-item wheel car mechanic belts">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-5.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="img/gallery/g-grid-v3-5.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
        
                <div class="col-md-3 single-filter-item mechanic engine car repair belts">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-6.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="img/gallery/g-grid-v3-6.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
        
                <div class="col-md-3 single-filter-item car mechanic engine repair belts">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-7.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="/g-grid-v3-" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>

                <div class="col-md-3 single-filter-item car wheel belts">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-8.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="img/gallery/g-grid-v3-8.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>

                <div class="col-md-3 single-filter-item engine engine car">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-9.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="img/gallery/g-grid-v3-9.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
  
                <div class="col-md-3 single-filter-item engine mechanic engine">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-10.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="img/gallery/g-grid-v3-10.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
     
                <div class="col-md-3 single-filter-item engine wheel">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-11.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="img/gallery/g-grid-v3-11.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
     
                <div class="col-md-3 single-filter-item engine engine car">
                    <div class="single-gallery-item">
                        <div class="img-holder">
                            <img src="img/gallery/g-grid-v3-12.jpg" alt="Awesome Gallery Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href="img/gallery/g-grid-v3-12.jpg" class="fancybox"><span class="flaticon-zoom-in-button"></span></a>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3>Engine Oil Change</h3>
                                    <h6>Repair, Engine</h6>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
          
                
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="post-pagination text-center anim-5-all">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section> -->
    <!--Start our latest news area -->
    <section class="our-latest-news-area">
        <div class="container">
            <div class="sec-title text-center">
                <h1>Our Latest News</h1>
                <span class="decor"></span>
            </div>
            <div class="row">
                <!--Start single item-->
                @foreach ($news as $value)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="single-blog-post">
                        <div class="img-holder">
                            <img src="/{{$value->image}}" alt="Awesome Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href=""><span class="flaticon-cross"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="date-box">
                                <div class="date">
                                    {{ \Carbon\Carbon::parse($value->date)->format('F') }}
                                    <br>{{ \Carbon\Carbon::parse($value->date)->format('d') }}
                                </div>
                                <div class="comment">
                                    <p><span class="flaticon-favorite-heart-button"></span></p>
                                </div>
                            </div>
                            <div class="content">
                                <a href="#">
                                    <h3>{{$value->title}}</h3>
                                </a>
                                <p class="description">{{$value->discription}}</p>
                                <a href="#" class="readmore">Read More<i aria-hidden="true" class="fa fa-caret-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach





                <!--End single item-->
                <!--Start single item-->
                <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="single-blog-post">
                        <div class="img-holder">
                            <img src="img/latest-news/tyrelyf.jpg" alt="Awesome Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href=""><span class="flaticon-cross"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul>
                            <li><a href="">Mechanic</a></li>
                            <li><a href=""><span class="flaticon-speech-bubbles-comment-option"></span>12 Comments</a></li>
                        </ul>
                        <div class="content-box">
                            <div class="date-box">
                                <div class="date">
                                    17
                                    <br> dec
                                </div>
                                <div class="comment">
                                    <p><span class="flaticon-favorite-heart-button"></span>18</p>
                                </div>
                            </div>
                            <div class="content">
                                <a href="">
                                    <h3>How to Extend Your Tire Life</h3>
                                </a>
                                <p>To extend the life of your car tires, regularly check and maintain proper tire pressure and tread depth. Rotate and balance tires every 5,000 to 8,000 miles, drive carefully, avoid overloading, and store tires properly.</p>
                                <a class="readmore" href="">Read More<i aria-hidden="true" class="fa fa-caret-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--End single item-->
                <!--Start single item-->
                <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="single-blog-post middle">
                        <div class="img-holder">
                            <img src="/img/latest-news/wheel balancing1.jpg" alt="Awesome Image">
                            <div class="overlay">
                                <div class="image-view">
                                    <div class="icon-holder">
                                        <a href=""><span class="flaticon-cross"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul>
                            <li><a href="">Autobody</a></li>
                            <li><a href=""><span class="flaticon-speech-bubbles-comment-option"></span>6 Comments</a></li>
                        </ul>
                        <div class="content-box">
                            <div class="date-box">
                                <div class="date">
                                    4
                                    <br> jan
                                </div>
                                <div class="comment">
                                    <p><span class="flaticon-favorite-heart-button"></span>20</p>
                                </div>
                            </div>
                            <div class="content">
                                <a href="">
                                    <h3> Alignment and Wheel Balancing
                                    </h3>
                                </a>
                                <p> To regularly check tire pressure, avoid curbs & potholes, & wheels balanced & aligned during maintenance.components are in good condition & drive smoothly to prevent uneven wear & vibrations.</p>
                                <a class="readmore" href="">Read More<i aria-hidden="true" class="fa fa-caret-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>  -->
                <!--End single item-->
            </div>
        </div>
    </section>
    <!--End our latest news area -->
    <!--Start free appoinment area-->
    <!-- <section class="free-appoinment-area">
        <div class="container">
            <form class="free-appoinment-form" action="#">
                <div class="row">
                    <div class="col-md-6">
                        <div class="sec-title text-left">
                            <h1>Make Free Appoinment</h1>
                            <span class="decor"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <input type="text" name="name" placeholder="Your Name*">
                                    <div class="icon-holder">
                                        <span class="flaticon-people"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-field">
                                    <input type="text" name="mobile-number" placeholder="Mobile Num">
                                    <div class="icon-holder">
                                        <span class="flaticon-telephone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-field">
                                    <input type="text" name="email" placeholder="Email Address*">
                                    <div class="icon-holder">
                                        <span class="flaticon-note"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-field">
                                    <textarea name="comment" placeholder="Comments..."></textarea>
                                    <div class="icon-holder comment">
                                        <span class="flaticon-social-1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="select-category">Select Category:</p>
                        <div class="category-item">
                            <input type="radio" id="indv" name="indvlcorpt" value="Individual">
                            <label for="indv">Individual</label>
                        </div>
                        <div class="category-item">
                            <input type="radio" id="corpt" name="indvlcorpt" value="Corporate">
                            <label for="corpt">Corporate</label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-field">
                                    <input type="text" name="reg-number" placeholder="Vehicle Registration Num*">
                                    <div class="icon-holder">
                                        <span class="flaticon-sign"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="select-field">
                                            <select name="service" class="selectpicker">
                                                <option>VolksWagen</option>
                                                <option>VolksWagen One</option>
                                                <option>VolksWagen Two</option>
                                                <option>VolksWagen Three</option>
                                            </select>
                                            <div class="icon-holder">
                                                <span class="flaticon-sign"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select-field">
                                            <select name="service" class="selectpicker">
                                                <option>Caravells</option>
                                                <option>Caravells One</option>
                                                <option>Caravells Two</option>
                                                <option>Caravells Three</option>
                                            </select>
                                            <div class="icon-holder">
                                                <span class="flaticon-transport"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="select-field bgarrowdf">
                                    <select class="selectpicker" name="service">
                                        <option>Airconditioner Checkup</option>
                                        <option>Airconditioner Checkup One</option>
                                        <option>Airconditioner Checkup Two</option>
                                        <option>Airconditioner Checkup Three</option>
                                    </select>
                                    <div class="icon-holder">
                                        <span class="flaticon-wrench"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-field">
                                    <input type="text" name="date" placeholder="Select Date">
                                    <div class="icon-holder">
                                        <span class="flaticon-dates"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="aut-cr-btn" type="button">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section> -->
    <!--End free appoinment area-->
    <!--Start Brand area-->
    <!-- <section class="brand-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand"> -->
    <!--Start single item-->
    <!-- <div class="single-item">
                            <a href="#"><img src="img/brand/1.png" alt="Awesome Brand Image"></a>
                        </div> -->
    <!--End single item-->
    <!--Start single item-->
    <!-- <div class="single-item">
                            <a href="#"><img src="img/brand/2.png" alt="Awesome Brand Image"></a>
                        </div> -->
    <!--End single item-->
    <!--Start single item-->
    <!-- <div class="single-item">
                            <a href="#"><img src="img/brand/3.png" alt="Awesome Brand Image"></a>
                        </div> -->
    <!--End single item-->
    <!--Start single item-->
    <!-- <div class="single-item">
                            <a href="#"><img src="img/brand/4.png" alt="Awesome Brand Image"></a>
                        </div> -->
    <!--End single item-->
    <!--Start single item-->
    <!-- <div class="single-item">
                            <a href="#"><img src="img/brand/5.png" alt="Awesome Brand Image"></a>
                        </div> -->
    <!--End single item-->
    <!--Start single item-->
    <!-- <div class="single-item">
                            <a href="#"><img src="img/brand/6.png" alt="Awesome Brand Image"></a>
                        </div> -->
    <!--End single item-->
    <!-- </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--End Brand area-->
    <!--Start footer bottom area-->
 @endsection