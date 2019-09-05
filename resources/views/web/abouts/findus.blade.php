@extends('web.base')

@push('css')
<style>
    .map-container-section {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .map-container-section iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }

    #contactus {
        display: block;
        position: relative;
        top: -132px;
        visibility: hidden;
    }

    @media (min-width: 992px) {
        #contactus {
            display: block;
            position: relative;
            top: -107px;
            visibility: hidden;
        }
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container news">

    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5">Find us</h2>
    <!--Google map-->
    <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7345.43456786696!2d120.21516142669144!3d22.99742143986322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346e76ed290820d3%3A0xe0ee028be207a19e!2z5ZyL56uL5oiQ5Yqf5aSn5a24!5e0!3m2!1szh-TW!2sph!4v1567357472643!5m2!1szh-TW!2sph"
            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <h2 class="font-weight-bold text-center my-5">Transportation</h2>
    <ul class="text-lg-left list-unstyled">
        <li>
            <p>
                <h4 class="text-success">
                    <i class="fas fa-car pr-2"></i>
                    Driving Directions
                </h4>
                (National Freeway No.1) From the North-Take
                National Freeway No.1 (Sun Yat-Sen Freeway) southbound - Get off at Exit 319 (Yongkang Interchange) and
                turn right to southbound...
            </p>
        </li>
        <li>
            <p>
                <h4 class="text-success">
                    <i class="fas fa-train pr-2"></i>
                    By Train
                </h4>
                Take TRA Train to Tainan Station. NCKU is located on Ta-Shueh
                (University) Road about 100m from the rear entrance of Tainan Station.
            </p>
        </li>
        <li>
            <p>
                <h4 class="text-success">
                    <i class="fas fa-subway pr-2"></i>
                    By THSR(Taiwan High Speed Rail)
                </h4>
                Those who arrived at Tainan Station by Taiwan High Speed Rail can proceed to the interchange corridor on
                the 2nd floor of High Speed Rail Tainan Station or the No.1...
            </p>
        </li>
    </ul>
    <a id="contactus"></a>
    <h2 class="font-weight-bold text-center my-5">Contact us</h2>
    <ul class="text-lg-left list-unstyled">
        <li>
            <p>
                <h4 class="text-success">
                    <i class="fas fa-map-marker-alt pr-2"></i>
                    Address:
                </h4>
                National Cheng Kung University No.1, University Road, Tainan City 701, Taiwan (R.O.C)
            </p>
        </li>
        <li>
            <p>
                <h4 class="text-success">
                    <i class="fas fa-phone pr-2"></i>
                    Phone:
                </h4>
                +886-6-2757575
            </p>
        </li>
        <li>
            <p>
                <h4 class="text-success">
                    <i class="fas fa-envelope pr-2"></i>
                    Email:
                </h4>
                info@qfort.ncku.edu.tw
            </p>
        </li>
        <li>
            <p>
                <h4 class="text-success">
                    <i class="far fa-file-alt pr-2"></i>
                    Send us a message
                </h4>
                For any inquiries, please call or email
                us. Alternatively you can fill in the following contact form.
            </p>
        </li>
    </ul>
    <form class="form">
        <div class="form-row">
            <div class="col-12 col-md-6 mb-4">
                <input type="text" class="form-control" id="validationTooltip01" placeholder="Name" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <input type="text" class="form-control" id="validationTooltip02" placeholder="Email" required>
                <div class="valid-tooltip">
                    Looks good!
                </div>
            </div>
            <div class="col-12 mb-4">
                <input type="text" class="form-control" id="validationTooltip02" placeholder="Subject" required>
                <div class="valid-tooltip">
                    Looks
                </div>
            </div>
            <div class="col-12 mb-4">
                <input type="text" class="form-control" id="validationTooltip02" placeholder="Tel Number" required>
                <div class="valid-tooltip">
                    Looks
                </div>
            </div>
            <div class="col-12 mb-4">
                <textarea id="form-contact-message" class="form-control md-textarea" rows="6"
                    placeholder="Message"></textarea>
            </div>
        </div>
        <button class="btn btn-success btn-lg w-100 py-2" type="submit">Submit form</button>
    </form>
</section>
@endsection