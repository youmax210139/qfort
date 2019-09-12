@push('css')
<style>
    footer .container {
        border-top: 1px dashed #217D7B;
        border-bottom: 1px dashed #217D7B;
    }
</style>
@endpush
<!-- Footer -->
<footer class="text-center mt-5">
    <!-- Footer Text -->
    <h3 class="mt-3 mb-3 font-italic font-weight-bold">Stay in touch with us</h3>
    <div class="container">
        <div class="row py-4 align-items-center">
            <div id="email" class="col-12">
                @alerterror(['name'=>'subscription_email']) @endalerterror
                @alertsuccess(['name'=>'subscription-success']) @endalertsuccess
            </div>
            <div class="col-lg-5 my-2 text-lg-right text-center">
                <i class="fab fa-facebook-f fa-lg  mr-4 fa-2x"></i>
                <i class="fab fa-instagram fa-lg  mr-4 fa-2x"></i>
                <i class="fab fa-youtube fa-lg mr-4 fa-2x"></i>
                <i class="fab fa-twitter fa-lg mr-4 fa-2x"></i>
                <i class="fab fa-linkedin-in fa-lg mr-2 fa-2x"></i>
            </div>
            <div class="col-lg-7 my-2 p-lg-0">
                <form class="form-inline justify-content-center" action="{{ route('web.subscriptions.store')}}"
                    method="post">
                    @csrf
                    <div class="input-group has-search justify-content-center">
                        <label for="email" class="h5 mr-4 mb-2">Subscribe to our newsletter</label>
                        <input name="subscription_email" type="email" class="form-control-md mr-2 px-2 mb-2" placeholder="Enter email address"
                            aria-describedby="basic-addon1">
                        <div class="input-group-append mb-2">
                            <button class="btn btn-sm btn-success my-0 px-4" type="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container pt-4 align-items-center border-0 px-md-0">
        <div class="row">
            <div class="col d-lg-flex justify-content-lg-between justify-content-center">
                <a href="https://web.ncku.edu.tw/" target="_blank">
                    <img class="mb-4 mr-md-4 img-fluid" src="{{ Voyager::image('logos/ncku.svg')}}">
                </a>
                <img class="mb-4 mr-md-4 img-fluid" style="transform: scale(0.9);"
                    src="{{ Voyager::image('logos/qfort.svg')}}">
                <ul class="text-center text-lg-left list-unstyled ml-4 mb-4">
                    <li>
                        <p>
                            <i class="text-success fas fa-map-marker-alt pr-2"></i>
                            {{ setting('findus.address') }}
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="text-success fas fa-phone pr-2"></i>
                            {{ setting('findus.telephone') }}
                        </p>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="copyright text-center py-3 h6 font-weight-light mb-0 bg-silver">
        Copyright © {{ date("Y") }} Center for Quantum Frontiers of Research & Technology, All Rights Reserved
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->