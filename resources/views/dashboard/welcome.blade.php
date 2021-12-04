<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>{{ env('APP_NAME') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/color.css') }}">
        <!--=============== favicons ===============-->
    </head>

    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
            <div class="pulse"></div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            <!-- header-->
            <header class="main-header dark-header fs-header sticky">
                <div class="header-inner">
                    <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>
                    <span></span>
                    <div href="dashboard-add-listing.html" class="add-list modal-open">Register <span><i class="fa fa-plus"></i></span></div>
                    <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Sign In</div>
                    <!-- nav-button-wrap-->
                    <div class="nav-button-wrap color-bg">
                        <div class="nav-button">
                            <span></span><span></span><span></span>
                        </div>
                    </div>
                    <!-- nav-button-wrap end-->
                    <!--  navigation -->
                    <div class="nav-holder main-menu">
                        <nav>
                            <ul>
                                <li>
                                    <a href="#" class="act-link">Beranda</a>
                                </li>
                                <li>
                                    <a href="#">Matkul <i class="fa fa-caret-down"></i></a>
                                    <!--second level -->
                                    <ul>
                                        <li><a href="listing.html">Semester 1</a></li>
                                        <li><a href="listing2.html">Semester 2</a></li>
                                        <li><a href="listing3.html">Semester 3</a></li>
                                        <li><a href="listing4.html">Semester 4</a></li>
                                        <li><a href="listing5.html">Semester 5</a></li>
                                        <li><a href="listing6.html">Semester 6</a></li>
                                        <li><a href="listing6.html">Semester 7</a></li>
                                        <li>
                                            <a href="#">Single <i class="fa fa-caret-down"></i></a>
                                            <!--third  level  -->
                                            <ul>
                                                <li><a href="listing-single.html">Style 1</a></li>
                                                <li><a href="listing-single2.html">Style 2</a></li>
                                                <li><a href="listing-single3.html">Style 3</a></li>
												<li><a href="listing-single4.html">Style 4</a></li>
                                            </ul>
                                            <!--third  level end-->
                                        </li>
                                    </ul>
                                    <!--second level end-->
                                </li>
                                <li>
                                    <a href="#">Mahasiswa <i class="fa fa-caret-down"></i></a>
                                    <!--second level -->
                                    <ul>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="contacts.html">Contacts</a></li>
                                        <li><a href="author-single.html">User single</a></li>
                                        <li><a href="how-itworks.html">How it Works</a></li>
                                        <li><a href="pricing-tables.html">Pricing</a></li>
                                        <li><a href="dashboard-myprofile.html">User Dasboard</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                        <li><a href="dashboard-add-listing.html">Add Listing</a></li>
                                        <li><a href="404.html">404</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                        <li><a href="header2.html">Header 2</a></li>
                                        <li><a href="footer-fixed.html">Footer Fixed</a></li>
                                    </ul>
                                    <!--second level end-->
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- navigation  end -->
                </div>
            </header>
            <!--  header end -->
            <!--  wrapper  -->
            <div id="wrapper">
                <!-- Content-->
                <div class="content">
                    <!--section -->
                    <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
                        <div class="bg"  data-bg="images/bg/mhs.jpg" data-scrollax="properties: { translateY: '200px' }"></div>
                        <div class="overlay"></div>
                        <div class="hero-section-wrap fl-wrap">
                            <div class="container">
                                <div class="intro-item fl-wrap">
                                    <h2>{{ env('APP_NAME') }}</h2>
                                    <h3>Sistem KRS Mahasiswa Universitas Udayana.</h3>
                                </div>
                            </div>
                        </div>
                        <div class="bubble-bg"> </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec2" class="custom-scroll-link">Login</a></div>
                        </div>
                    </section>
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <h2>Pendaftaran KRS Semester Ini</h2>
                                <div class="section-subtitle">From the blog.</div>
                                <span class="section-separator"></span>
                                <p>berikut jumlah pendaftaran krs per-semester yang telah dilakukan.</p>
                            </div>
                            <div class="row home-posts">
                                <div class="col-md-4">
                                    <article class="card-post">
                                        <div class="card-post-img fl-wrap">
                                            <a href="blog-single.html"><img src="images/all/1.jpg"   alt=""></a>
                                        </div>
                                        <div class="card-post-content fl-wrap">
                                            <h3><a href="blog-single.html">Gallery Post</a></h3>
                                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                            <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By , Alisa Noory</span></a></div>
                                            <div class="post-opt">
                                                <ul>
                                                    <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                                    <li><i class="fa fa-eye"></i> <span>264</span></li>
                                                    <li><i class="fa fa-tags"></i> <a href="#">Photography</a>  </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-4">
                                    <article class="card-post">
                                        <div class="card-post-img fl-wrap">
                                            <a href="blog-single.html"><img  src="images/all/1.jpg"   alt=""></a>
                                        </div>
                                        <div class="card-post-content fl-wrap">
                                            <h3><a href="blog-single.html">Video and gallery post</a></h3>
                                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                            <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By , Mery Lynn</span></a></div>
                                            <div class="post-opt">
                                                <ul>
                                                    <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                                    <li><i class="fa fa-eye"></i> <span>264</span></li>
                                                    <li><i class="fa fa-tags"></i> <a href="#">Design</a>  </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-4">
                                    <article class="card-post">
                                        <div class="card-post-img fl-wrap">
                                            <a href="blog-single.html"><img  src="images/all/1.jpg"   alt=""></a>
                                        </div>
                                        <div class="card-post-content fl-wrap">
                                            <h3><a href="blog-single.html">Post Article</a></h3>
                                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                            <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By , Garry Dee</span></a></div>
                                            <div class="post-opt">
                                                <ul>
                                                    <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                                    <li><i class="fa fa-eye"></i> <span>264</span></li>
                                                    <li><i class="fa fa-tags"></i> <a href="#">Stories</a>  </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <a href="blog.html" class="btn  big-btn circle-btn  dec-btn color-bg flat-btn">Read All<i class="fa fa-eye"></i></a>
                        </div>
                    </section>
                    <!--section -->
                    <section class="color-bg">
                        <div class="shapes-bg-big"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="images-collage fl-wrap">
                                        <div class="images-collage-title">KRS <span>System</span></div>
                                        <div class="images-collage-main images-collage-item"><img src="images/avatar/1.jpg" alt=""></div>
                                        <div class="images-collage-other images-collage-item" data-position-left="23" data-position-top="10" data-zindex="2"><img src="images/avatar/1.jpg" alt=""></div>
                                        <div class="images-collage-other images-collage-item" data-position-left="62" data-position-top="54" data-zindex="5"><img src="images/avatar/1.jpg" alt=""></div>
                                        <div class="images-collage-other images-collage-item anim-col" data-position-left="18" data-position-top="70" data-zindex="11"><img src="images/avatar/1.jpg" alt=""></div>
                                        <div class="images-collage-other images-collage-item" data-position-left="37" data-position-top="90" data-zindex="1"><img src="images/avatar/1.jpg" alt=""></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="color-bg-text">
                                        <h3>Lakukan pengisian KRS dengan cepat dan mudah !</h3>
                                        <p>Sistem kami menggunakan server tercepat dan mumpuni untuk melayani penanganan KRS adik-adik mahasiswa, sehingga proses pengisian KRS dapat dilakukan dengan cepat, terintegrasi, efektif, efisien dan akurat</p>
                                        <a href="#" class="color-bg-link modal-open">Sign In Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--section   end -->
                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <h2>How it works</h2>
                                <div class="section-subtitle">Discover & Connect </div>
                                <span class="section-separator"></span>
                                <p>Bagaimana sih cara kerja sistem KRS kita ini ?</p>
                            </div>
                            <!--process-wrap  -->
                            <div class="process-wrap fl-wrap">
                                <ul>
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">01 . </span>
                                            <div class="time-line-icon"><i class="fa fa-map-o"></i></div>
                                            <h4> Input Matakuliah Sesuai Semester</h4>
                                            <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros sollicitudin turpis.</p>
                                        </div>
                                        <span class="pr-dec"></span>
                                    </li>
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">02 .</span>
                                            <div class="time-line-icon"><i class="fa fa-envelope-open-o"></i></div>
                                            <h4> Ajukan KRS Semester</h4>
                                            <p>Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus lectus sollicitudin feugiat pharetra consectetur.</p>
                                        </div>
                                        <span class="pr-dec"></span>
                                    </li>
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">03 .</span>
                                            <div class="time-line-icon"><i class="fa fa-hand-peace-o"></i></div>
                                            <h4> KRS Disetujui dan Selesai</h4>
                                            <p>Maecenas pulvinar, risus in facilisis dignissim, quam nisi hendrerit nulla, id vestibulum metus nullam viverra porta.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--process-wrap   end-->
                        </div>
                    </section>
                    <section class="parallax-section" data-scrollax-parent="true">
                        <div class="bg"  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '100px' }"></div>
                        <div class="overlay co lor-overlay"></div>
                        <!--container-->
                        <div class="container">
                            <div class="intro-item fl-wrap">
                                <h2>{{ env('APP_NAME') }}</h2>
                                <h3>Cepat, Efisien, Akurat</h3>
                                <a class="trs-btn" href="#">Sign in </a>
                            </div>
                        </div>
                    </section>
                    <section class="color-bg">
                        <div class="shapes-bg-big"></div>
                        <div class="container">
                            <div class=" single-facts fl-wrap">
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="254">154</div>
                                            </div>
                                        </div>
                                        <h6>New Visiters Every Week</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="12168">12168</div>
                                            </div>
                                        </div>
                                        <h6>Happy customers every year</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="172">172</div>
                                            </div>
                                        </div>
                                        <h6>Won Awards</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="732">732</div>
                                            </div>
                                        </div>
                                        <h6>New Listing Every Week</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                            </div>
                        </div>
                    </section>
                    <!-- section end --> 
                    <!--section -->
                    <section class="gray-section">
                        <div class="container">
                            <div class="fl-wrap spons-list">
                                <ul class="client-carousel">
                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>
                                </ul>
                                <div class="sp-cont sp-cont-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="sp-cont sp-cont-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    
                    <!-- section end -->
                    <!--section -->
                    <section class="gradient-bg">
                        <div class="cirle-bg">
                            <div class="bg" data-bg="images/bg/circle.png"></div>
                        </div>
                        <div class="container">
                            <div class="join-wrap fl-wrap">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3>Do You Have Questions ?</h3>
                                        <p>Lorem ipsum dolor sit amet, harum dolor nec in, usu molestiae at no.</p>
                                    </div>
                                    <div class="col-md-4"><a href="contacts.html" class="join-wrap-btn">Get In Touch <i class="fa fa-envelope-o"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                </div>
                <!-- Content end -->
            </div>
            <!-- wrapper end -->
            <!--footer -->
            <footer class="main-footer dark-footer  ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <h3>About Us</h3>
                                <div class="footer-contacts-widget fl-wrap">
                                    <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam. </p>
                                    <ul  class="footer-contacts fl-wrap">
                                        <li><span><i class="fa fa-envelope-o"></i> Mail :</span><a href="#" target="_blank">kelompok1@gmail.com</a></li>
                                        <li> <span><i class="fa fa-map-marker"></i> Adress :</span><a href="#" target="_blank">DENPASAR</a></li>
                                        <li><span><i class="fa fa-phone"></i> Phone :</span><a href="#">+7(111)123456789</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <h3>Our Last News</h3>
                                <div class="widget-posts fl-wrap">
                                    <ul>
                                        <li class="clearfix">
                                            <a href="#"  class="widget-posts-img"><img src="images/all/1.jpg" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Vivamus dapibus rutrum</a>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="#"  class="widget-posts-img"><img src="images/all/1.jpg" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title=""> In hac habitasse platea</a>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="#"  class="widget-posts-img"><img src="images/all/1.jpg" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Tortor tempor in porta</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <div id="footer-twiit"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <h3>Subscribe</h3>
                                <div class="subscribe-widget fl-wrap">
                                    <p>Want to be notified when we launch a new template or an udpate. Just sign up and we'll send you a notification by email.</p>
                                    <div class="subcribe-form">
                                        <form id="subscribe">
                                            <input class="enteremail" name="email" id="subscribe-email" placeholder="Email" spellcheck="false" type="text">
                                            <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fa fa-rss"></i> Subscribe</button>
                                            <label for="subscribe-email" class="subscribe-message"></label>
                                        </form>
                                    </div>
                                </div>
                                <div class="footer-widget fl-wrap">
                                    <div class="footer-menu fl-wrap">
                                        <ul>
                                            <li><a href="#">Home </a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Listing</a></li>
                                            <li><a href="#">Contacts</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sub-footer fl-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="about-widget">
                                   
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="copyright"> &#169; KELOMPOK 1 PROGNET | All rights reserved.</div>
                            </div>
                            <div class="col-md-4">
                                <div class="footer-social">
                                    <ul>
                                        <li><a href="#" target="_blank" ><i class="fa fa-facebook-official"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fa fa-chrome"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fa fa-vk"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--footer end  -->
            <!--register form -->
            <div class="main-register-wrap modal">
                <div class="main-overlay"></div>
                <div class="main-register-holder">
                    <div class="main-register fl-wrap">
                        <div class="close-reg"><i class="fa fa-times"></i></div>
                        <h3>Sign In <span>PROGNET KRS <strong>SYSTEM</strong></span></h3>
                        <div id="tabs-container">
                            <ul class="tabs-menu">
                                <li class="current"><a href="#tab-1">Login</a></li>
                                <li><a href="#tab-2">Register</a></li>
                            </ul>
                            <div class="tab">
                                <div id="tab-1" class="tab-content">
                                    <div class="custom-form">
                                        <form method="post" name="registerform" action="{{ Route('user.login') }}">
                                            @csrf
                                            @method('POST')
                                            <label>Username or Email Address * </label>
                                            <input name="email" type="text" onClick="this.select()" value="">
                                            <label >Password * </label>
                                            <input name="password" type="password"   onClick="this.select()" value="" >
                                            <button type="submit"  class="log-submit-btn"><span>Log In</span></button>
                                            <div class="clearfix"></div>
                                            <div class="filter-tags">
                                                <input id="check-a" type="checkbox" name="check">
                                                <label for="check-a">Remember me</label>
                                            </div>
                                        </form>
                                        <div class="lost_password">
                                            <a href="#">Lost Your Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div id="tab-2" class="tab-content">
                                        <div class="custom-form">
                                            <form method="post"   name="registerform" class="main-register-form" id="main-register-form2">
                                                <label >Name * </label>
                                                <input name="name" type="text"   onClick="this.select()" value="">
                                                <label>Alamat *</label>
                                                <input name="name2" type="text"  onClick="this.select()" value="">
                                                <label>Telepon *</label>
                                                <input name="email" type="number"  onClick="this.select()" value="">
                                                <label >Email *</label>
                                                <input name="email" type="email"   onClick="this.select()" value="" >
                                                <label >Password *</label>
                                                <input name="password" type="password"   onClick="this.select()" value="" >
                                                <label >Program Studi *</label>
                                                <select name="program_studi" id="">
                                                    <option value="">TEKNOLOGI INFORMASI</option>
                                                    <option value="">MESIN</option>
                                                    <option value="">TEKNIK SIPIL</option>
                                                </select>
                                                <label >Angkatan *</label>
                                                <select name="angakatan" id="">
                                                    <option value="">2021</option>
                                                    <option value="">2020</option>
                                                    <option value="">2019</option>
                                                </select>
                                                <input type="file" name="foto_mahasiswa">
                                                <button type="submit"     class="log-submit-btn"  ><span>Register</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--register form end -->
            <a class="to-top"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
           <!-- limonte-sweetalert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&libraries=places&callback=initAutocomplete"></script>
        <script type="text/javascript">
            @if(Session::has('status'))
                Swal.fire({
                    icon: @if (Session::has('icon'))'{{ Session::get('icon') }}' @else 'error' @endif,
                    title: @if (Session::has('title'))'{{ Session::get('title') }}' @else 'title' @endif,
                    text: @if (Session::has('message'))'{{ Session::get('message') }}' @else 'message' @endif,
                })
            @endif
        </script>
    </body>
</html>