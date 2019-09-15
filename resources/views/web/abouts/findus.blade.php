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
    #transportation i,
    #transportation img,
    #form-enquiry i,
    #form-enquiry img{
        width: 24px;
        height: 24px;
    }

    #contactus {
        display: block;
        position: relative;
        top: -148px;
        visibility: hidden;
    }

    @media (min-width: 992px) {
        #contactus {
            display: block;
            position: relative;
            top: -123px;
            visibility: hidden;
        }
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container">

    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5">Find us</h2>
    <!--Google map-->
    <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7345.43456786696!2d120.21516142669144!3d22.99742143986322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346e76ed290820d3%3A0xe0ee028be207a19e!2z5ZyL56uL5oiQ5Yqf5aSn5a24!5e0!3m2!1szh-TW!2sph!4v1567357472643!5m2!1szh-TW!2sph"
            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <h2 class="font-weight-bold text-center my-5">Transportation</h2>
    <div class="text-left content" id="transportation">{!! setting('findus.transportation')!!}</div>
    <a id="contactus"></a>
    <h2 class="font-weight-bold text-center my-5">Contact us</h2>
    <ul class="text-left list-unstyled">
        <li>
            <p>
                <h4 class="text-success">
                    <i class="fas fa-map-marker-alt pr-2"></i>
                    Address:
                </h4>
                {{ setting('findus.address') }}
            </p>
        </li>
        <li>
            <p>
                <h4 class="text-success">
                    <i class="fas fa-phone pr-2"></i>
                    Phone:
                </h4>
                {{ setting('findus.telephone') }}
            </p>
        </li>
        <li>
            <p>
                <h4 class="text-success">
                    <i class="fas fa-envelope pr-2"></i>
                    Email:
                </h4>
                {{ setting('findus.email') }}
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
    @alertsuccess(['name'=>'enquiry-success']) @endalertsuccess
    <form class="form" method="post" action="{{ route('web.enquiries.store') }}" id="form-enquiry">
        @csrf
        <div class="form-row">
            <div class="col-12 col-md-6 mb-4">
                <input type="text" class="form-control" placeholder="Name" name="name" 
                value="{{ old('name') }}" required>
                @alerterror(['name'=>'name']) @endalerterror
            </div>
            <div class="col-12 col-md-6 mb-4">
                <input type="email" class="form-control" placeholder="Email" name="email" 
                value="{{ old('email') }}" required>
                @alerterror(['name'=>'email']) @endalerterror
            </div>
            <div class="col-12 mb-4">
                <input type="text" class="form-control" name="subject" placeholder="Subject"
                    value="{{ old('subject') }}" required>
                @alerterror(['name'=>'subject']) @endalerterror
            </div>
            <div class="col-12 mb-4">
                <input type="text" class="form-control" name="telephone" placeholder="Tel Number" 
                value="{{ old('telephone') }}" required>
                @alerterror(['name'=>'telephone']) @endalerterror
            </div>
            <div class="col-12 mb-4">
                <textarea placeholder="Message" type="text" class="form-control" name="message" rows="6" required>{{ old('message') }}</textarea>
                @alerterror(['name'=>'message']) @endalerterror
            </div>
        </div>
        <button class="btn btn-success btn-lg w-100 py-2" type="submit">Submit form</button>
    </form>
</section>
@endsection