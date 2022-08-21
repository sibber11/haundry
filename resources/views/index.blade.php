@extends('admin.layouts.customer')

@section('content')

    <div class="container-fluid section-star visible-sm visible-xs" style="padding-top: 15px; padding-bottom: 10px;">
        <div class="container">
            <div class="row text-center">
                {{-- <button href="" class="btn btn-primary" data-toggle="modal" data-target="#order">ORDER NOW</button> --}}
                <a href="{{ route('order.create') }}" class="btn btn-primary">Order Now</a>
            </div>
        </div>
    </div>

    <div class="container-fluid section-star" id="our-service">
        <div class="container">
            <div class="row">
                <h6 class="section-title">Our Services</h6>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content">
                        <h1>Wash &amp; Iron</h1>
                        <div class="description">
                            <p>Wash &amp; Iron (Fold) services for all type of Cloths, home usables and other 'washables'.
                                No matter what the occasion is, we'll make sure your garments looks new and fresh.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content">
                        <h1>Dry Cleaning</h1>
                        <div class="description">
                            <p>Dry Cleaning offers you a exclusive fabric care. Our fabric spa assures for professional
                                pre-spotting, cleaning &amp; expert finishing in each garment</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content">
                        <h1>Household Fabrics</h1>
                        <div class="description">
                            <p>We provide best quality care for clothes and we also handle all household fabrics. We give it
                                a new look to quilts, table cloths, bedspreads and other fine household fabrics.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content">
                        <h1>Saree Polishing</h1>
                        <div class="description">
                            <p>We have experts for polishing all kinds of Saree</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content">
                        <h1>Corporate Service</h1>
                        <div class="description">
                            <p>We provide commercial laundry and dry cleaning services for our corporate clients who require
                                fast and efficient services without compromising on the quality of the cleaning.</p>
                        </div>
                    </div>
                </div>


                <div class="clearfix"></div>

                <h5 class="text-center text-green bold font-arial">N.B. : Emergency service : "Rocket"(delivery within 24
                    hours ) charges will be twice than the regular price. </h5>
            </div>
        </div>
    </div>

    <div class="container-fluid section-block" id="how-it-works">
        <div class="container">
            <div class="row">
                <h6 class="section-title">How It Works</h6>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content">
                        <h1>You Order</h1>
                        <div class="description">
                            <p><strong>Order online or Call our Hotline 09613 233332</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content">
                        <h1>We Collect</h1>
                        <div class="description">
                            <p>Choose a time and place that suits you</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content">
                        <h1>We Clean</h1>
                        <div class="description">
                            <p>We treat your clothes to a high-quality clean</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content">
                        <h1>We Deliver</h1>
                        <div class="description">
                            <p>We'll deliver back to you anytime that suits you.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid section-star" id="pricing">
        <div class="container">
            <div class="row">
                <h6 class="section-title">Pricing</h6>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="pricing-box">
                        <div class="plan-header">
                            <h2>Men</h2>
                        </div>
                        <div class="plan-inside">
                            <table class="table table-bordered table-condensed table-hover">
                                <thead>
                                    <tr class="table_head">
                                        <th class="text-center">Item</th>
                                        <th class="text-center">Wash</th>
                                        <th class="text-center">Dry Clean</th>
                                        <th class="text-center">Steam Iron</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Shirt</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Pant</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>T- shirt</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Panjabi cotton</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Panjabi silk</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Panjama </td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>sweater</td>
                                        <td>120</td>
                                        <td>160</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <td>jacket</td>
                                        <td>160</td>
                                        <td>200</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>Safari Suit</td>
                                        <td>150</td>
                                        <td>200</td>
                                        <td>80</td>
                                    </tr>
                                    <tr>
                                        <td>Blazer</td>
                                        <td>0</td>
                                        <td>220</td>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <td>Waist coat</td>
                                        <td>120</td>
                                        <td>160</td>
                                        <td>60</td>
                                    </tr>
                                    <tr>
                                        <td>Lungi</td>
                                        <td>40</td>
                                        <td>0</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Sherwani</td>
                                        <td>0</td>
                                        <td>450</td>
                                        <td>150</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="pricing-box">
                        <div class="plan-header">
                            <h2>Women</h2>
                        </div>
                        <div class="plan-inside">
                            <table class="table table-bordered table-condensed table-hover">
                                <thead>
                                    <tr class="table_head">
                                        <th class="text-center">Item</th>
                                        <th class="text-center">Wash</th>
                                        <th class="text-center">Dry Clean</th>
                                        <th class="text-center">Steam Iron</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>kameez (cotton)</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>kameez (silk)</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>salower</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Blouse</td>
                                        <td>40</td>
                                        <td>50</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Saree (Cotton)</td>
                                        <td>160</td>
                                        <td>180</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>Saree (B. katan)</td>
                                        <td>0</td>
                                        <td>250</td>
                                        <td>80</td>
                                    </tr>
                                    <tr>
                                        <td>Saree (Jamdani)</td>
                                        <td>0</td>
                                        <td>250</td>
                                        <td>80</td>
                                    </tr>
                                    <tr>
                                        <td>saree (silk)</td>
                                        <td>0</td>
                                        <td>250</td>
                                        <td>80</td>
                                    </tr>
                                    <tr>
                                        <td>Dupatta</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Borka</td>
                                        <td>80</td>
                                        <td>120</td>
                                        <td>60</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="pricing-box">
                        <div class="plan-header">
                            <h2>Household</h2>
                        </div>
                        <div class="plan-inside">
                            <table class="table table-bordered table-condensed table-hover">
                                <thead>
                                    <tr class="table_head">
                                        <th class="text-center">Item</th>
                                        <th class="text-center">Wash</th>
                                        <th class="text-center">Dry Clean</th>
                                        <th class="text-center">Steam Iron</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bed Sheet double</td>
                                        <td>160</td>
                                        <td>200</td>
                                        <td>70</td>
                                    </tr>
                                    <tr>
                                        <td>Cartain (per Kuchi)</td>
                                        <td>35</td>
                                        <td>40</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Blanket (s)</td>
                                        <td>0</td>
                                        <td>350</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Blanket (L)</td>
                                        <td>0</td>
                                        <td>550</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>katha</td>
                                        <td>180</td>
                                        <td>220</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>pillow case</td>
                                        <td>35</td>
                                        <td>45</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>towel (L)</td>
                                        <td>120</td>
                                        <td>160</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <td>towel (s)</td>
                                        <td>60</td>
                                        <td>100</td>
                                        <td>15</td>
                                    </tr>
                                    <tr>
                                        <td>comfort (L)</td>
                                        <td>0</td>
                                        <td>450</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Blanket cover</td>
                                        <td>180</td>
                                        <td>220</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>comfort (S)</td>
                                        <td>0</td>
                                        <td>300</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Sofa/seat cover</td>
                                        <td>80</td>
                                        <td>100</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <td>Mosquito Net </td>
                                        <td>120</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid section-star" id="package">
        <div class="container">
            <div class="row">
                <h6 class="section-title">Our Package</h6>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-box">
                        <div class="plan-header">
                            <div class="image">
                                <img alt="" src="#"
                                    width="" height="">
                            </div>
                            <h2>Family Steam Ironing Pack</h2>
                            <div class="price">
                                <sup class="currency">BDT</sup><span>900</span><sup class="period">/ Monthly</sup>
                            </div>
                        </div>
                        <div class="plan-inside">
                            <ul>
                                <li><strong>100</strong> Pcs</li>
                                <li>Reguler Price <strong>BDT 1000</strong></li>
                                <li>Package Price <strong> BDT 900</strong> </li>
                                <li>You save <strong> BDT 100</strong> </li>
                                <li><strong>30 Day</strong> Duration</li>
                            </ul>
                        </div>
                        <div class="plan-footer">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#order">PURCHASE
                                NOW</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-box">
                        <div class="plan-header">
                            <div class="image">
                                <img alt="" src="#"
                                    width="" height="">
                            </div>
                            <h2>Couple Steam Ironing pack</h2>
                            <div class="price">
                                <sup class="currency">BDT</sup><span>630</span><sup class="period">/ Monthly</sup>
                            </div>
                        </div>
                        <div class="plan-inside">
                            <ul>
                                <li><strong>70</strong> Pcs</li>
                                <li>Reguler Price <strong>BDT 700</strong></li>
                                <li>Package Price <strong> BDT 630</strong> </li>
                                <li>You save <strong> BDT 70</strong> </li>
                                <li><strong>30 Day</strong> Duration</li>
                            </ul>
                        </div>
                        <div class="plan-footer">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#order">PURCHASE
                                NOW</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-box">
                        <div class="plan-header">
                            <div class="image">
                                <img alt="" src="#"
                                    width="" height="">
                            </div>
                            <h2>Single Steam Ironing Pack</h2>
                            <div class="price">
                                <sup class="currency">BDT</sup><span>450</span><sup class="period">/ Monthly</sup>
                            </div>
                        </div>
                        <div class="plan-inside">
                            <ul>
                                <li><strong>50</strong> Pcs</li>
                                <li>Reguler Price <strong>BDT 500</strong></li>
                                <li>Package Price <strong> BDT 450</strong> </li>
                                <li>You save <strong> BDT 50</strong> </li>
                                <li><strong>30 Day</strong> Duration</li>
                            </ul>
                        </div>
                        <div class="plan-footer">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#order">PURCHASE
                                NOW</button>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-box">
                        <div class="plan-header">
                            <div class="image">
                                <img alt="" src="#"
                                    width="" height="">
                            </div>
                            <h2>Single Washing Pack</h2>
                            <div class="price">
                                <sup class="currency">BDT</sup><span>1000</span><sup class="period">/ Monthly</sup>
                            </div>
                        </div>
                        <div class="plan-inside">
                            <ul>
                                <li><strong>20</strong> Pcs</li>
                                <li>Reguler Price <strong>BDT 1200</strong></li>
                                <li>Package Price <strong> BDT 1000</strong> </li>
                                <li>You save <strong> BDT 200</strong> </li>
                                <li><strong>30 Day</strong> Duration</li>
                            </ul>
                        </div>
                        <div class="plan-footer">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#order">PURCHASE
                                NOW</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-box">
                        <div class="plan-header">
                            <div class="image">
                                <img alt="" src="#"
                                    width="" height="">
                            </div>
                            <h2>Couple Washing Pack</h2>
                            <div class="price">
                                <sup class="currency">BDT</sup><span>2000</span><sup class="period">/ Monthly</sup>
                            </div>
                        </div>
                        <div class="plan-inside">
                            <ul>
                                <li><strong>40</strong> Pcs</li>
                                <li>Reguler Price <strong>BDT 2400</strong></li>
                                <li>Package Price <strong> BDT 2000</strong> </li>
                                <li>You save <strong> BDT 400</strong> </li>
                                <li><strong>30 Day</strong> Duration</li>
                            </ul>
                        </div>
                        <div class="plan-footer">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#order">PURCHASE
                                NOW</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="pricing-box">
                        <div class="plan-header">
                            <div class="image">
                                <img alt="" src="#"
                                    width="" height="">
                            </div>
                            <h2>Family Washing Pack</h2>
                            <div class="price">
                                <sup class="currency">BDT</sup><span>3000</span><sup class="period">/ Monthly</sup>
                            </div>
                        </div>
                        <div class="plan-inside">
                            <ul>
                                <li><strong>60</strong> Pcs</li>
                                <li>Reguler Price <strong>BDT 3600</strong></li>
                                <li>Package Price <strong> BDT 3000</strong> </li>
                                <li>You save <strong> BDT 600</strong> </li>
                                <li><strong>30 Day</strong> Duration</li>
                            </ul>
                        </div>
                        <div class="plan-footer">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#order">PURCHASE
                                NOW</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid section-block" id="why-choose-us">
        <div class="container">
            <div class="row">
                <h6 class="section-title">Why Choose Us</h6>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content content-2">
                        <h1>HIGH QUALITY SERVICES</h1>
                        <div class="description">
                            <p>Laundry services coupled with customized experience</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content content-2">
                        <h1>CUTTING EDGE TECHNOLOGY</h1>
                        <div class="description">
                            <p>Latest technology machines and internationally standardized chemicals</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content content-2">
                        <h1>ONLINE &amp; ONE CALL ORDER &amp; PICK UP</h1>
                        <div class="description">
                            <p>Free pick-up and delivery within 24 hours under Rocket service</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content content-2">
                        <h1>ONE STOP SOLUTION</h1>
                        <div class="description">
                            <p>Washing &amp; Ironing, Dry Cleaning in one place for you</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content content-2">
                        <h1>SAFETY OF CLOTHES</h1>
                        <div class="description">
                            <p>Expert Staff with in depth knowledge of fabric &amp; garments</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column-content">
                    <img src="#" class="img-circle column-img">
                    <div class="content content-2">
                        <h1>COMPLETE SATISFACTION</h1>
                        <div class="description">
                            <div class="desc">We ensure a smile with every service we provide</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid section-star" id="about-us">
        <div class="container">
            <div class="row">
                <h6 class="section-title">About us</h6>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <p>For the first time in Bangladesh, HelloLaundry.com.bd introduces a truly world-class online laundry
                        service.We provide premium washing and dry cleaning service leveraging online &amp; mobile based
                        technology with free pick up &amp; delivery. It's an affordable and convenient way of getting your
                        wash, laundry and dry-clean done with premium quality. Our instant pickup at a slot chosen by you
                        with a turnaround time of 72 hours provides you laundry and dry cleaning with best quality. We have
                        also emergency services “Rocket”( pick-up and delivery within 24 hours).</p>
                    <p>&nbsp;</p>
                    <p><strong>Forget about the time spent on journey to the laundry (and the parking, and walking with a
                            heavy load, and possibly getting it wet in the rain. Now we can make your life easy. We can come
                            to you on a single call or online order.</strong></p>
                    <p>You can avail our services at your doorstep by posting your needs at HelloLaundry.com.bd or calling
                        us @ 09613 233332 directly.</p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid section-contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h6 class="section-title font-size-20">Refer a Friend &amp; GET REWARDED</h6>

                    <div id="invitation-message" style="max-width: 635px; margin:auto"></div>

                    <form class="form-inline text-center ajax-form" method="post"
                        action="#">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" id="Email" name="Email"
                                placeholder="Enter Friend emails (abc@xyz.com,pqr@xyz.com)" value="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Send invitation</button>
                        </div>
                    </form>
                    <p><br></p>
                    <div class="addthis_inline_share_toolbox text-center" data-url="#"
                        data-title="Get Registered &amp; Get Bonus | HelloLaundry.com.bd"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid section-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column-content margin-0">
                    <h6 class="section-title">Don’t worry, we’ll give you a call &amp; get your #LaundrySorted</h6>
                    <div class="content">
                        <h1>Just enter your name and number in the form below and we’ll give you a call as soon as possible.
                        </h1>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12" style="margin:auto; float: inherit;">
                    <div id="callback-message"></div>
                    <form class="ajax-form" method="post" action="#">
                        <div class="form-group">
                            <label for="Name" class="sr-only">Name * </label>
                            <input type="text" class="form-control input-lg" id="Name" name="Name"
                                placeholder="Your Name" value="">
                        </div>
                        <div class="form-group">
                            <label for="Name" class="sr-only">Contact No * </label>
                            <input type="text" class="form-control input-lg" id="ContactNo" name="ContactNo"
                                placeholder="Contact No" value="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Request a call back</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid section-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-title">Like Us On Facebook</div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-title">Get In Touch</div>
                    {{-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9001423381146!2d90.36300771472888!3d23.75094009467314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf5aaacb8905:0x2f42de3992b6080!2z4Kac4Ka-4Kar4Kaw4Ka-4Kas4Ka-4KamIOCmuOCnnOCmlSwg4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1543684937034"
                        allowfullscreen="" width="100%" height="200" frameborder="0"></iframe> --}}
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-title">Contact Us</div>
                    <p class="contact-info">

                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid section-footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <p>© 2016 Hellolaundry. All Rights Reserved </p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <a href="#" data-toggle="modal" data-target="#terms-condition">Terms &amp; Conditions</a>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="#" data-toggle="modal" data-target="#faq">FAQ</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="order">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Place your order</h4>
                </div>
                <div class="modal-body">

                    <p class="text-center">Please <a href="#" class="login-from-order">Login</a> / <a
                            href="#" class="registration-from-order">Register</a> to place your order.</p>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="login-registration" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Account</h4>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" role="tablist" id="account-tab">
                        <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab"
                                aria-expanded="true">Login</a></li>
                        <li role="presentation" class=""><a href="#registration" role="tab" data-toggle="tab"
                                aria-expanded="false">Registration</a></li>
                        <li role="presentation" class=""><a href="#forgot-password" role="tab"
                                data-toggle="tab" aria-expanded="false">Forgot Password</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="login">

                            <div id="login-message"></div>

                            <form class="form-horizontal ajax-form" action="#"
                                method="post">
                                <input type="hidden" name="RedirectAfterLogin" id="RedirectAfterLogin" value="">
                                <div class="form-group">
                                    <label for="CustEmail" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" id="CustEmail" name="CustEmail"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Password" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="Password" name="Password"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                        &nbsp;
                                        <a href="" class="btn btn-social btn-facebook">
                                            <span class="fa fa-facebook"></span> Sign in with Facebook
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="registration">

                            <div id="registration-message"></div>

                            <form class="form-horizontal ajax-form" action="#"
                                method="post">
                                <input type="hidden" name="Ref" id="Ref" value="">
                                <input type="hidden" name="RedirectAfterRegistration" id="RedirectAfterRegistration"
                                    value="">
                                <div class="form-group">
                                    <label for="CustName" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="CustName" name="CustName"
                                            placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="CustEmail" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="CustEmail" name="CustEmail"
                                            placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="CustMobile" class="col-sm-3 control-label">Contact No</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="CustMobile" name="CustMobile"
                                            placeholder="Contact No">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="CustAddress" class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="CustAddress" id="CustAddress" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="CustArea" class="col-sm-3 control-label">Area</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="CustArea" id="CustArea">
                                            <option value="">Select Area</option>
                                            <option value="2">Gulshan</option>
                                            <option value="3">Banani</option>
                                            <option value="4">Dhanmondi</option>
                                            <option value="6">Bashundhara R/A</option>
                                            <option value="7">mohammodpur</option>
                                            <option value="8">Lalmatia</option>
                                            <option value="9">Uttara (Sector-1, 3, 5, 7,</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Password" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="Password" name="Password"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ConfirmPassword" class="col-sm-3 control-label">Confirm Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="ConfirmPassword"
                                            name="ConfirmPassword" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Sign up</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="forgot-password">

                            <div id="forgot-password-message"></div>

                            <form class="form-horizontal ajax-form" action="#"
                                method="post">
                                <input type="hidden" name="RedirectAfterLogin" id="RedirectAfterLogin" value="">
                                <div class="form-group">
                                    <label for="CustEmail" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" id="CustEmail" name="CustEmail"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Recover my password</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="terms-condition">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Terms &amp; Condition</h4>
                </div>
                <div class="modal-body">
                    <p>&nbsp;</p>
                    <ul>
                        <li>&nbsp;Only Cash payment accepted on delivery.</li>
                        <li>Standard delivery would be done within 72 hours after the items have been collected.</li>
                        <li>&nbsp;Express delivery would be done within 24 hours after the items have been collected.</li>
                        <li>Only pressing/Ironing service is available upon request.</li>
                        <li>Hello laundry will accept liability for any loss or damage resulting from the Laundry or Dry
                            Cleaning process and would pay maximum 10 times the service charge of each item.</li>
                        <li>Customers are requested to examine their garments before sending to the Laundry. Hello laundry
                            will not be responsible for any loss of valuable items left in the pockets.</li>
                        <li>&nbsp;Hello laundry reserves the right to refuse rendering services to anybody.</li>
                        <li>&nbsp;The Service Tariff is subject to change without notice.</li>
                        <li>&nbsp;We are committed to ensure that your information is secure.</li>
                        <li>We will not sell, distribute or lease your personal information to third parties unless we
                            are&nbsp;&nbsp; required by law to do so. If you believe that any information we are holding on
                            you is incorrect or incomplete, please contact us as soon as possible</li>
                        <li>Hello laundry reserves the right to change or cancel all kinds of content and service at
                            anytime.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="faq">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">FAQ</h4>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Ø What are your store hours?</li>
                    </ul>
                    <p>Customers can drop by our outlets in Uttara and Bashundhara anytime between 10 am to 10 pm. Customers
                        can also schedule pickup order online at your convenient hours during 10 am to 10 pm.&nbsp;</p>
                    <ul>
                        <li>Do you have large machines?</li>
                    </ul>
                    <p>We have large top of the line machines that can handle all your large items, comforters, blankets
                        etc.</p>
                    <ul>
                        <li>Ø Who uses your Pickup &amp; delivery services?</li>
                    </ul>
                    <p>Really everyone, our customers range from college students to busy professionals to seniors! Our
                        service is for people who want to free-up time from a tedious and labour intensive task.</p>
                    <ul>
                        <li>Ø What about dry cleaning?</li>
                    </ul>
                    <p>Yes, we do offer these services as a convenience and for one-stop-shopping for our customers at very
                        competitive prices.</p>
                    <ul>
                        <li>Ø Can I pay per wash?</li>
                    </ul>
                    <p>Yes, the cost as per the garment/cloth. Please check our price listing page.</p>
                    <ul>
                        <li>Are my clothes mixed with other orders?</li>
                    </ul>
                    <p>No, each customers clothing is done separately.</p>
                    <ul>
                        <li>How do I order?</li>
                    </ul>
                    <p>You can order via our web portal or call at our hotline number 09613 233332, or you can also drop
                        your laundry at our Booths (Uttara &amp; Bashundhara).</p>
                    <ul>
                        <li>Ø Do I need to separate my clothes before pickup?</li>
                    </ul>
                    <p>No, our experienced professionals will take care of this for you.</p>
                    <ul>
                        <li>Ø How much laundry can I have picked up each week?</li>
                    </ul>
                    <p>There is no maximum. We are made for this.</p>
                    <ul>
                        <li>What time do you pick-up and deliver?&nbsp;&nbsp;&nbsp;</li>
                    </ul>
                    <p>Hello laundry picks up and delivers from 10.00 AM to 10.00 PM every day including Friday.</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <ul>
                        <li><a href="http://theswisslaundry.com/faq.html#3">Ø &nbsp;Do you offer express service?</a></li>
                    </ul>
                    <p>Yes, we have Express service (“ROCKET”), which comes at a premium cost. Turnaround time is 1 working
                        day.</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>


    <div id="fb-root" class=" fb_reset">
        <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
            <div></div>
        </div>
    </div>

@endsection
