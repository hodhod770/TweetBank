<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <style>
        .img-box {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

    </style>

    <title>بنك تغريدات الجنوب العربي</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('ocss/bootstrap.css')}}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- font awesome style -->
    <link href="{{asset('ocss/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- nice select -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <!-- datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <!-- Custom styles for this template -->
    <link href="{{asset('ocss/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('ocss/responsive.css')}}" rel="stylesheet" />

</head>

<body>

    <div class="hero_area">
        <!-- header section strats -->

        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section " dir="rtl">
            {{-- <div class="dot_design">
        <img src="oimages/dots.png" alt="">
      </div> --}}
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="img-box">
                                      <img src="{{asset('s3.gif')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </section>
        <!-- end slider section -->
    </div>


    <section class="book_section layout_padding" style="text-align: center; " dir="rtl">
        <div class="row">
            {{-- @foreach ($twe as $item)
            <div class="col-md-4 col-12">

                <div class="card">
                    <div class="row">
                        <div class="col-12 ">
                            <h1><span style="color: #00c6a9;">تغريدة</span></h1>
                        </div>

                        <div class="col-12 p-4">
                           <p>{{$item->tweettext}}</p>
                           <hr  style=" border: 2px solid #00c6a9;width: 100%;">
                        </div>


                        <div class="col-12 p-4">
                           <button onclick="shareOnTwitter('{{$item->texts}}', '{{$item->urls}}')" class="btn btn-dark fa fa-twitter">تغريد</button>
                         </div>
                        
                        

                    </div>
                </div>

            </div>
            @endforeach --}}


            @foreach ($tw as $item)
            <div class="col-md-4 col-12">

                <div class="card">
                    <div class="row">
                        <div class="col-12 ">
                            <h1><span style="color: #00c6a9;">تغريدة</span></h1>
                        </div>

                        <div class="col-12 p-4">
                           <p>{{$item->texts}}</p>
                           <hr  style=" border: 2px solid #00c6a9;width: 100%;">
                        </div>


                        <div class="col-12 p-4">
                           <button onclick="shareOnTwitter(`{{$item->texts}}`, '{{$item->urls}}')" class="btn btn-dark fa fa-twitter">تغريد</button>
                         </div>
                        
                        

                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </section>

    <script>
function shareOnTwitter(text, url) {
    var twitterUrl = "https://twitter.com/intent/tweet";
    twitterUrl += "?text=" + encodeURIComponent(text);
    twitterUrl += "&url=" + encodeURIComponent(url);

    // Open the Twitter share dialog in a new window
    window.open(twitterUrl, "_blank");
}

// Example usage
var tweetText = "Check out this awesome content!";
var tweetUrl = "https://example.com";

    </script>


    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> بنك تغريدات الجنوب العربي
            </p>
        </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="{{asset('ojs/jquery-3.4.1.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('ojs/bootstrap.js')}}"></script>
    <!-- nice select -->
    <script src="{{asset('ojs/custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <!-- custom js -->


</body>

</html>
