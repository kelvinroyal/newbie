@extends('frontend.master')
@section('main')
@section('title','Contact')
<div class="breadcumb-area" style="background-image: url({{asset('lib/storage/app/bg-img/contactbg.JPG')}});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2>Contact</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="breadcumb-nav">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{asset('/')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row banner">
            @foreach($banner as $b)
            @if($b->id_banner==1)
            <div style="margin: 0 auto;"><a href="{{$b->link_banner}}"> {!!$b->content_banner!!}</a></div>
            @endif
            @endforeach
        </div>
    </div>
</div>
<div class="contact-area section_padding_80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="google-map-area">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d119216.1979549304!2d105.7714748888839!3d20.97233709466894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1540182685755" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!-- Contact Info Area Start -->
        <div class="contact-info-area section_padding_80_50">
            <div class="row">
                <!-- Single Contact Info -->
                <div class="col-12 col-md-4">
                    <div class="single-contact-info mb-30 text-center wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <h4>Email</h4>
                        <p>Email: unknownteamvn@gmail.com</p>
                    </div>
                </div>
                <!-- Single Contact Info -->
                <div class="col-12 col-md-4">
                    <div class="single-contact-info mb-30 text-center wow fadeInUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                        <h4>Social Network</h4>
                        <p>Facebook: <a href="https://www.facebook.com/sgirl.page/">https://www.facebook.com/sgirl.page/</a><br> Instagram: <br> Twitter: </p>
                    </div>
                </div>
                <!-- Single Contact Info -->
                <div class="col-12 col-md-4">
                    <div class="single-contact-info mb-30 text-center wow fadeInUp" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInUp;">
                        <h4>Donate</h4>
                        <p>Pay Pal: <a href="http://paypal.me/LiveVN">http://paypal.me/LiveVN</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form  -->
        <div class="contact-form-area">
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="contact-form-sidebar item wow fadeInUpBig" data-wow-delay="0.3s" style="background-image: url(img/bg-img/contact.jpg); height: 544px; visibility: visible; animation-delay: 0.3s; animation-name: fadeInUpBig;">
                    </div>
                </div>
                <div class="col-12 col-md-7 item" style="height: 544px;">
                    <div class="contact-form wow fadeInUpBig" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUpBig;">
                        <h2 class="contact-form-title mb-30">If You Have Any Girl Contact Me Today !</h2>
                        <!-- Contact Form -->
                        <form method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name... (Obligatory)" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="facebook" placeholder="Facebook... (Obligatory)" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="instagram" placeholder="Instagram...">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="twitter" placeholder="Twitter...">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="info" cols="30" rows="10" placeholder="More information"></textarea>
                            </div>
                            <button type="submit" class="btn contact-btn">Send Message</button>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@stop