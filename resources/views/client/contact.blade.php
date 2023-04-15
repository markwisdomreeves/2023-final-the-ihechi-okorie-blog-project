@extends('client.layout.app')

@section('title', "The IhechiOkorie's blog | Contact Me")

@section('main_content')

<div class='global-message info d-none'></div>

<div class="colorlib-contact" id="custom_footer_container">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-12 animate-box">
                <h2>Contact Information</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-info-wrap-flex">
                            <div class="con-info">
                                <p><span><i class="icon-location-2"></i></span> Suleja, Rafinsenyi, Pilot junction, Niger state, Nigeria</p>
                            </div>
                            <div class="con-info">
                                <p><span><i class="icon-whatsapp"></i></span>
                                    <a href="https://api.whatsapp.com/message/TX6BOXXSJESEB1?autoload=1&app_absent=0" target="_blank"> 
                                       +231 813-601-4721
                                    </a>
                                </p>
                            </div>
                            <div class="con-info">
                                <p><span><i class="icon-paperplane"></i></span> <a href="mailto:IhechiOkorie3@gmail.com" target="_blank"> IhechiOkorie3@gmail.com</a></p>
                            </div>
                            <div class="con-info" id="custom_link_box">
                                <p><span><i class="icon-globe"></i></span> <a href="https://www.youtube.com/@DominatewithIhechiOkorie35588" target="_blank">Visit my youtube channel</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="main_contact_map_container" class="colorlib-map">
                    <iframe id="contact_map_iframe_box" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14446.92039369994!2d7.174276061674496!3d9.188743639452623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104dd575e2948da1%3A0x8657a5adac2d0936!2sPilot%20Oil%20Resources%20Ltd!5e0!3m2!1sit!2sit!4v1678482958120!5m2!1sit!2sit" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
