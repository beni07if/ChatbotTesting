@extends('layout.app')

@section('headstyle')
<!-- Favicons -->
<link href="{{asset('template/Flexstart/assets/img/favicon.png') }}" rel="icon">
<link href="{{asset('template/Flexstart/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{asset('template/Flexstart/assets/vendor/aos/aos.css')}}" rel="stylesheet">

<!-- Template Main CSS File -->
<!-- <link href="{{asset('template/Flexstart/assets/css/style.css')}}" rel="stylesheet"> -->

 <!-- Favicons -->
  <!-- Template Main CSS File -->
  <link href="{{ asset('template/SoftLand/assets/css/style.css') }}" rel="stylesheet">
  <!-- end SoftLand -->

@endsection

@section('carousel')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <h1>Global Corporate Profile Structure</h1>
        <h2>Explore group and subsidiary profile</h2>
        <!-- <a href="#about" hidden class="btn-get-started scrollto">Search</a> -->
        <!-- <section id="hero" class="d-flex align-items-center"> -->
        <!-- <div class="container"> -->
        <form id="search-form">
            <label for="search-input" class="visually-hidden">Search</label>
            <div class="input-group">
                <!-- <input type="text" id="search-input" class="form-control" placeholder="Find group and subsidiary profile...">
                <button type="submit" class="btn btn-primary">Search</button> -->
            </div>
        </form>
        <!-- </div> -->
        <!-- </section> -->
    </div>
</section><!-- End Hero -->
@endsection

@section('content')
<main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="content">
                        <h3>Inovasi Corporate Profile</h3>
                        <p>
                            Inovasi Corporate Profile is an information about the company’s ownership and its relationship with other possible companies. This data provides information of the man or family behind the existence of a company. Therefore, it can be used to identify its supply chain and linkage.
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-receipt"></i>
                                    <h4>Subsidiary</h4>
                                    <p>There are tens of thousands of subsidiaries along with their location, shareholder, and other important information.</p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Group</h4>
                                    <p>There are thousands of groups along with their subsidiaries, shareholders and other important information.</p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-images"></i>
                                    <h4>Shareholders</h4>
                                    <p>There are tens of thousands of shareholders and their shareholdings in several companies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
        <div class="container">

            <div class="section-title">
                <h2>CORPORATE PROFILE</h2>
                <p>Find data on thousands of companies and their shareholdings around the world</p>
            </div>
            <!-- <div id="mapid" style="height: 500px;"></div> -->

            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link " data-bs-toggle="tab" href="#tab-1">Group</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-2">Subsidiary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Shareholders</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        <div class="tab-pane " id="tab-1">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Group</h3>
                                    <p class="fst-italic">A group company is a collection of individual companies or subsidiaries that are controlled by a single parent company. The parent company, often referred to as the holding company or the group, typically holds a majority stake or controlling the subsidiary companies. The information about Group Company can be used to identify the subsidiary under.</p>
                                    <div class="container">
                                        <form id="search-form" method="POST" action="{{ route('groupShow') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" id="group_name search-input" class="form-control" name="group_name" list="group_name-list" placeholder="Search company">
                                            <datalist id="group_name-list">
                                                @foreach(DB::table('consolidations')->pluck('group_name')->unique() as $group_name)
                                                @php
                                                $shareholder = DB::table('consolidations')->where('group_name', $group_name)->value('group_name');
                                                @endphp
                                                @if(!empty($shareholder) && $shareholder != 'N/A' && $shareholder != 'check')
                                                <option value="{{ $group_name }}"></option>
                                                @endif
                                                @endforeach
                                            </datalist>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active show chatbox" id="tab-2">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Subsidiary</h3>
                                    <p class="fst-italic">A subsidiary is a company that is controlled by another company, known as the parent company or holding company. Subsidiaries have their own assets, liabilities, and financial statements from their parent companies, but because of the controlling ownership by the parent company, the subsidiary's activities are often aligned with the overall business objectives of the parent company.</p>
                                    <div class="container">
                                        <form id="search-form" method="POST" action="{{ route('subsidiaryShow') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" id="subsidiary search-input" class="form-control" name="subsidiary" list="subsidiary-list" placeholder="Search company">
                                            <datalist id="subsidiary-list">
                                                @foreach(DB::table('consolidations')->pluck('subsidiary')->unique() as $subsidiary)
                                                @php
                                                $shareholder = DB::table('consolidations')->where('subsidiary', $subsidiary)->value('subsidiary');
                                                @endphp
                                                @if(!empty($shareholder) && $shareholder != 'N/A' && $shareholder != 'check')
                                                <option value="{{ $subsidiary }}"></option>
                                                @endif
                                                @endforeach
                                            </datalist>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-3">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Shareholders</h3>
                                    <p class="fst-italic">Shareholders are the owners of a corporation and have a financial interest in the company's performance and profitability. Shareholders can be individual or entities. The information about company’s shareholders can be used to identify the people responsible and rule the company.</p>
                                    <!-- <div class="container">
                                        <form id="search-form">
                                            <label for="search-input" class="visually-hidden">Search</label>
                                            <div class="input-group">
                                                <input type="text" id="search-input" class="form-control" placeholder="Find shareholder...">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div> -->
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="section-title" style="padding-top: 70px;">
                <h2>CHAT WITH US</h2>
            </div>
            <iframe src="https://www.chatbase.co/chatbot-iframe/VRXUJ-HRD1JcdZQIduOLV" width="100%" height="700" frameborder="0"></iframe> -->
        </div>
    </section><!-- End Departments Section -->

    <!-- <div>
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="keyword" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div> -->
    <!-- ======= About Sections ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row">
                <!-- <div class="col-xl-4 col-lg-4 video-box d-flex justify-content-center align-items-stretch position-relative">
                    <img src="{{ asset('img/bulet-list-attribute.jpg') }}" alt="" class="img-fluid" style="width: 80%; height:70%;">
                </div> -->

                <div class="col-xl-12 col-lg-12 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                    <h3 style="text-align: center;">CORPORATE PROFILE INFORMATION</h3>
                    <!-- <p style="text-align: center;">Company information.</p> -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <h4 class="title"><a href="">Company name</a></h4>
                                <p class="description">Company name</p>
                            </div>
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <h4 class="title"><a href="">Group</a></h4>
                                <p class="description">Group</p>
                            </div>
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <h4 class="title"><a href="">Shareholders</a></h4>
                                <p class="description">Shareholder of company</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <h4 class="title"><a href="">Activity</a></h4>
                                <p class="description">Main activity</p>
                            </div>
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <h4 class="title"><a href="">Location</a></h4>
                                <p class="description">Latitude Longitude</p>
                            </div>
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <h4 class="title"><a href="">Company structure</a></h4>
                                <p class="description">Company structure ownerships</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <h4 class="title"><a href="">Status operation</a></h4>
                                <p class="description">Active or Non active</p>
                            </div>
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-gift"></i></div>
                                <h4 class="title"><a href="">Planted & Facility</a></h4>
                                <p class="description">Planted area (hectare)</p>
                            </div>
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-atom"></i></div>
                                <h4 class="title"><a href="">Etc</a></h4>
                                <p class="description">Other information</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg" hidden>
        <div class="container">

            <div class="section-title">
                <h2>Q&A</h2>
                <p>Question and Answer</p>
            </div>

            <div class="faq-list">
                <ul>
                    <li data-aos="fade-up">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                            <p>
                                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="400">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                            </p>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->

    <section id="pricing" class="section">
      <div class="container">

        <div class="row justify-content-center text-center">
          <div class="col-md-7 mb-5">
            <h2 class="section-heading">PRICE LIST</h2>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere illum obcaecati inventore velit laborum earum.</p> -->
          </div>
        </div>
        <div class="row align-items-stretch">

          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="pricing h-100 text-center">
              <span>&nbsp;</span>
              <h3>BASIC</h3>
              <ul class="list-unstyled">
                <li>..</li>
                <li>..</li>
              </ul>
              <div class="price-cta">
                <strong class="price">Free</strong>
                <p><a href="#" class="btn btn-white">Choose Plan</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="pricing h-100 text-center popular">
              <span class="popularity">Recomended</span>
              <h3>STANDARD</h3>
              <ul class="list-unstyled">
                <li>..</li>
                <li>..</li>
                <li>..</li>
              </ul>
              <div class="price-cta">
                <strong class="price">$5.000/years</strong>
                <p><a href="#" class="btn btn-white">Choose Plan</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="pricing h-100 text-center">
              <span class="popularity">Full Dataset</span>
              <h3>ADVANCE</h3>
              <ul class="list-unstyled">
                <li>..</li>
                <li>..</li>
                <li>..</li>
              </ul>
              <div class="price-cta">
                <strong class="price">$10.000/years</strong>
                <p><a href="#" class="btn btn-white">Choose Plan</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts" hidden>
        <div class="container">

            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="fas fa-user-md"></i>
                        <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Doctors</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="far fa-hospital"></i>
                        <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Departments</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="fas fa-flask"></i>
                        <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Research Labs</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="fas fa-award"></i>
                        <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Awards</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
                <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
            </div>
        </div>

        <div class="map-container">
            <iframe style="border:0; width: 70%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.48260175541!2d106.79982471100114!3d-6.586775093379328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5900337fbe1%3A0x41efae520676fac5!2sEarthqualizer%20Foundation!5e0!3m2!1sid!2sid!4v1682500437790!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container">
            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Address:</h4>
                            <p>Jl. Tangkuban Prahu No. 8, Bogor City, West Java 16128</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@inovasidigital.asia</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+62 898 2950 531</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection

<script>
    $(document).ready(function() {
        // group 
        $(".chatbox form .group").submit(function(e) {
            e.preventDefault();
            sendMessage2();
        });

        function sendMessage2() {
            var group_name = $("#group_name").val();
            var message = "<div class='response-group user'>" + group_name + "</div>";
            $("#response-group").append(message);

            $.ajax({
                url: "/eq-subsidiary-en",
                type: "POST",
                dataType: "json",
                data: {
                    message: group_name,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response2) {
                    var message = "<div class='response-group bot'>" + response2.message + "</div>";
                    $("#response-group").append(message);
                }
            });

            $("#group_name").val("");
        }
        // end group


        // subsidiary 
        $(".chatbox form").submit(function(e) {
            e.preventDefault();
            sendMessage();
        });

        function sendMessage() {
            var subsidiary = $("#subsidiary").val();
            var message = "<div class='response user'>" + subsidiary + "</div>";
            $("#response").append(message);

            $.ajax({
                url: "/eq-subsidiary-en",
                type: "POST",
                dataType: "json",
                data: {
                    message: subsidiary,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    var message = "<div class='response bot'>" + response.message + "</div>";
                    $("#response").append(message);
                }
            });

            $("#subsidiary").val("");
        }
        // end 


        // nav 
        // Ambil semua link navigasi
        const navLinks = document.querySelectorAll('.nav-link');

        // Tambahkan event listener pada setiap link navigasi
        navLinks.forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault(); // Hentikan aksi default link navigasi

                // Ambil id tab pane yang sesuai dengan link navigasi yang ditekan
                const tabId = link.getAttribute('href');

                // Hapus class active dari semua link navigasi
                navLinks.forEach(link => {
                    link.classList.remove('active');
                });

                // Tambahkan class active pada link navigasi yang ditekannnn
                link.classList.add('active');

                // Sembunyikan semua tab pane
                const tabPanes = document.querySelectorAll('.tab.pane');
                tabPanes.forEach(pane => {
                    pane.style.display = 'none';
                });

                // Tampilkan tab pane yang sesuai dengan link navigasi yang ditekan
                const tabPane = document.querySelector(tabId);
                tabPane.style.display = 'block';
            });
        });

        var nav = document.querySelector('nav');
        nav.classList.add('active');
        // end nav 
    });

    // end nav 
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>