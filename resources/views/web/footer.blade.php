@push('css')
<style>
    footer .container {
        border-top: 1px dashed #217D7B;
        border-bottom: 1px dashed #217D7B;
    }

    #modalSubscription .custom-control-label input {
        border: 0px !important;
        border-bottom: 1px solid #dee2e6 !important;
    }
</style>
@endpush
@push('modal')
@modalDefault
@slot('title')
Subscription
@endslot
@slot('id')
modalSubscription
@endslot
@slot('footer')
<button class="btn btn-sm btn-success my-0 px-4" type="submit">Submit</button>
@endslot
<form class="" action="{{ route('web.subscriptions.store')}}" method="post">
    @csrf
    <h4 class="mb-2">Subscribe to our newsletter</h4>
    <div class="form-group">
        <label for="subscription_email" class="col-form-label">Email:</label>
        <input name="subscription_email" type="email" class="form-control mb-2" placeholder="Enter email address"
            aria-describedby="basic-addon1">
    </div>
    <div class="form-group">
        <label for="subscription_name" class="col-form-label">Name:</label>
        <input name="subscription_name" type="text" class="form-control mb-2" placeholder="Enter your name"
            aria-describedby="basic-addon1">
    </div>
    <div class="form-group">
        <label for="subscription_job" class="col-form-label">Job Title:</label>
        <input name="subscription_job" type="text" class="form-control mb-2" placeholder="Enter your job title"
            aria-describedby="basic-addon1">
    </div>
    <div class="form-group">
        <label for="subscription_organization" class="col-form-label">Organization Name:</label>
        <input name="subscription_organization" type="text" class="form-control mb-2"
            placeholder="Enter your organization name" aria-describedby="basic-addon1">
    </div>
    <div class="form-group">
        <label for="subscription_area" class="col-form-label">Areas:</label>
        <div>
            <div class="custom-control custom-radio custom-control-inline mb-2">
                <input type="radio" id="subscriptionAreaAcademic" name="subscription_area" class="custom-control-input"
                    value="academic">
                <label class="custom-control-label" for="subscriptionAreaAcademic">Academic & Research</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline mb-2">
                <input type="radio" id="subscriptionAreaIndustry" name="subscription_area" class="custom-control-input"
                    value="industry">
                <label class="custom-control-label" for="subscriptionAreaIndustry">Industry</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline mb-2">
                <input type="radio" id="subscriptionAreaEducation" name="subscription_area" class="custom-control-input"
                    value="education">
                <label class="custom-control-label" for="subscriptionAreaEducation">Education</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline mb-2">
                <input type="radio" id="subscriptionAreaOther" name="subscription_area" class="custom-control-input"
                    value="other">
                <label class="custom-control-label" for="subscriptionAreaOther">Other
                    <input class="border-bottom px-2" type="text" name="subscription_other_area">​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="subscription_country" class="col-form-label">Country</label>
        <input name="subscription_country" type="text" class="form-control mb-2" placeholder="Enter your country"
            aria-describedby="basic-addon1">
    </div>
</form>
@endmodalDefault
@endpush

@push('js')
<script>
    $('#modalSubscription button:submit').click(function(e){
        e.preventDefault();
        $form = $("#modalSubscription form");
        $form.find('.alert').alert('close');
        $.post( $form.attr('action'), $form.serialize(),function(){
          })
          .done(function(data){
            $form.prepend("\
            <div class='alert alert-success alert-block'>\
                <button type='button' class='close' data-dismiss='alert'>×</button>\
                <strong>" + data.responseText.message + "</strong>\
            </div>\
            ")
          })
          .fail(function(data){
              var json = JSON.parse(data.responseText);
              $.each(json, function(key, value){
                  var selector = "input[name='"+key+"']";
                  if(key == "subscription_area" || key == "other_area"){
                      selector = "label[for='subscription_area']";
                  }
                $form.find(selector).after("\
                <div class='alert alert-danger alert-block'> \
                <button type='button' class='close' data-dismiss='alert'>×</button> \
                <strong>"+ value[0] +"</strong> \
                </div>\
                ");
              });
          })
          .always(function(){
            
          });
        
    });
    $('#modalSubscription').on('hidden.bs.modal', function (e) {
        $(this).find('.alert').alert('close');
    });
</script>
@endpush
<!-- Footer -->
<footer class="text-center pt-5">
    <!-- Footer Text -->
    <h3 class="mb-5 font-italic font-weight-bold">Stay in touch with us</h3>
    <div class="container">
        <div class="row py-4 align-items-center">
            <div class="col-lg-5 my-3 text-lg-right text-center">
                <i class="fab fa-facebook-f fa-lg  mr-4 fa-2x"></i>
                <i class="fab fa-instagram fa-lg  mr-4 fa-2x"></i>
                <i class="fab fa-youtube fa-lg mr-4 fa-2x"></i>
                <i class="fab fa-twitter fa-lg mr-4 fa-2x"></i>
                <i class="fab fa-linkedin-in fa-lg mr-2 fa-2x"></i>
            </div>
            <div class="col-lg-7 my-3 p-lg-0">
                <label for="email" class="h5 mr-4 mb-2">Subscribe to our newsletter</label>
                <button class="btn btn-sm btn-success my-0 px-4" type="button" data-toggle="modal"
                    data-target="#modalSubscription">Subscribe</button>
            </div>
        </div>
    </div>
    <div class="container pt-4 align-items-center border-0 px-md-0">
        <div class="row">
            <div class="col d-lg-flex justify-content-lg-between justify-content-center">
                <a class="d-flex justify-content-center mb-4 mr-md-4 " href="https://web.ncku.edu.tw/" target="_blank">
                    <img class="img-fluid" src="{{ Voyager::image('logos/ncku.svg')}}">
                </a>
                <a class="d-flex justify-content-center mb-4 mr-md-4 " href="/" target="_blank">
                    <img class="img-fluid" style="transform: scale(0.9);"
                        src="{{ Voyager::image('logos/qfort.svg')}}">
                </a>
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