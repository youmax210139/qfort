@push('css')
<style>
    footer .copyright {
        background-color: #EBEBEB !important;
    }
</style>
@endpush
<!-- Footer -->
<footer class="text-center">
    <!-- Footer Text -->
    <h3 class="mt-3 mb-3 font-italic font-weight-bold">Stay in touch with us</h3>
    <div class="container">
        <div class="row py-4 align-items-center">
            <div class="col-lg-5 my-2 text-lg-right text-md-center">
                <i class="fab fa-facebook-f fa-lg  mr-4 fa-2x"></i>
                <i class="fab fa-instagram fa-lg  mr-4 fa-2x"></i>
                <i class="fab fa-youtube fa-lg mr-4 fa-2x"></i>
                <i class="fab fa-twitter fa-lg mr-4 fa-2x"></i>
                <i class="fab fa-linkedin-in fa-lg mr-2 fa-2x"></i>
            </div>
            <div class="col-lg-7 my-2 p-md-0">
                <form class="form-inline justify-content-center">
                    <div class="input-group has-search justify-content-center">
                        <label for="email" class="h5 mr-4 mb-2">Subscribe to our newsletter</label>
                        <input type="text" class="form-control-md mr-2 px-2 mb-2" placeholder="Enter email address"
                            aria-describedby="basic-addon1">
                        <div class="input-group-append mb-2">
                            <button class="btn btn-sm btn-success my-0 px-4" type="button">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container pt-4 align-items-center border-0 px-md-0">
        <div class="row">
            <div class="col d-lg-flex justify-content-lg-between justify-content-center">
                <img class="mb-4 mr-md-4" src="{{ Voyager::image('logos/ncku.svg')}}">
                <img class="mb-4 mr-md-4" src="{{ Voyager::image('logos/qfort.svg')}}">
                <ul class="text-center text-lg-left list-unstyled ml-4 mb-4">
                    <li>
                        <p><i class="fas fa-map-marker-alt pr-2"></i>No.1, University Road, Tainan City 701, Taiwan
                            (R.O.C)</p>
                    </li>
                    <li>
                        <p><i class="fas fa-phone pr-2"></i>+886-6-2757575</p>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="copyright text-center py-3 h5 font-weight-light mb-0">
        Copyright © {{ date("Y") }} Center for Quantum Frontiers of Research & Technology, All Rights Reserved
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->