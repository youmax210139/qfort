@extends('web.base')

@push('css')
<style>
    .content {
        height: auto;
        min-height: 60vh;
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container about">
    <div class="row">
        <div class="col-12 d-lg-none">
            <h1 class="font-weight-bold text-left mb-3">{{ $event->title }}</h1>
            <h3 class="text-left mb-5">{{ $event->abstract }}</h3>
        </div>
        <div class="col-12 col-lg-4">
            <img src="{{Voyager::image($event->image)}}" class="img-fluid">
            <div class="border border-dark-silver border-top-0 text-left px-3">
                <ul class="list-group py-5">
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-calendar-alt fa-2x mr-3"></i>
                        <div class="flex-column">
                            <h5 class="font-weight-bold">{{ $event->published_from . ' - '. $event->published_to }}</h5>
                            <p class="mb-2">See event details for additional info.</p>
                            <a class="text-success font-italic" href="{{ $event->icallink->google() }}"
                                target="_blank">Add to my Google calendar</a><br>
                            <a class="text-success font-italic" href="{{ $event->icallink->webOutlook() }}"
                                target="_blank">Add to my Outlook calendar</a><br>
                            <a class="text-success font-italic" href="{{ $event->icallink->ics() }}" target="_blank">Add
                                to calendar</a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-map-marker-alt fa-2x mr-3"></i>
                        <div class="flex-column">
                            <h5 class="font-weight-bold">Coulter Art Gallery</h5>
                            <a class="text-success font-italic" target="_blank" href="{{ $event->googleMap }}">
                                Open in map
                            </a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-envelope fa-2x mr-3"></i>
                        <div class="flex-column">
                            <a class="text-success h5 font-weight-bold font-italic" target="_blank"
                                href="mailto:{{ $event->email}}">
                                Email sponsor
                            </a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-phone fa-2x mr-3"></i>
                        <div class="flex-column">
                            <a class="text-success h5 font-weight-normal" href="tel:{{ $event->telephone }}">
                                {{ $event->telephone }}
                            </a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-users fa-2x mr-3"></i>
                        <div class="flex-column">
                            <h5 class="font-weight-normal">
                                This Event is open to:
                            </h5>
                            {{ $event->opento }}
                        </div>
                    </li>
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-tag fa-2x mr-3"></i>
                        <div class="flex-column">
                            <h5 class="font-weight-normal">
                                {{ $event->price > 0? $event->price : 'Free'}}
                            </h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <!-- Section heading -->
            <h1 class="d-none d-lg-block font-weight-bold text-left mb-3">{{ $event->title }}</h1>
            <h3 class="d-none d-lg-block text-left mb-5">{{ $event->abstract }}</h3>
            <h3 class="d-none d-lg-block text-left mb-5 text-success">Event Registration</h3>
            @alertsuccess(['name'=>'event-registration-success']) @endalertsuccess
            <form class="form" method="post" action="{{ route('web.events.registration.store', $event->id) }}"
                id="form-enquiry">
                @csrf
                <div class="form-row text-left">
                    <div class="form-group col-12 mb-4">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}"
                            required>
                        @alerterror(['name'=>'name']) @endalerterror
                    </div>
                    <div class="form-group col-12 mb-4">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}" required>
                        @alerterror(['name'=>'email']) @endalerterror
                    </div>
                    <div class="form-group col-12 mb-4">
                        <label for="telephone" class="col-form-label">Telephone:</label>
                        <input type="text" class="form-control" name="telephone" placeholder="Tel Number"
                            value="{{ old('telephone') }}" required>
                        @alerterror(['name'=>'telephone']) @endalerterror
                    </div>
                    <div class="form-group col-12 mb-4">
                        <label for="job" class="col-form-label">Job Title:</label>
                        <input name="job" type="text" class="form-control mb-2" placeholder="Enter your job title"
                            aria-describedby="basic-addon1" value="{{ old('job') }}" required>
                        @alerterror(['name'=>'job']) @endalerterror
                    </div>
                    <div class="form-group col-12 mb-4">
                        <label for="organization" class="col-form-label">Organization Name:</label>
                        <input name="organization" type="text" class="form-control mb-2"
                            placeholder="Enter your organization name" aria-describedby="basic-addon1"
                            value="{{ old('organization') }}">
                        @alerterror(['name'=>'organization']) @endalerterror
                    </div>
                    <div class="form-group col-12 mb-4">
                        <label for="area" class="col-form-label">Areas:</label>
                        @alerterror(['name'=>'area']) @endalerterror
                        @alerterror(['name'=>'other_area']) @endalerterror
                        <div>
                            <div class="custom-control custom-radio custom-control-inline mb-2">
                                <input type="radio" id="AreaAcademic" name="area" class="custom-control-input"
                                    value="academic" {{ old('area')=='academic' ? ' checked' : '' }}>
                                <label class="custom-control-label" for="AreaAcademic">Academic &
                                    Research</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-2">
                                <input type="radio" id="AreaIndustry" name="area" class="custom-control-input"
                                    value="industry" {{ old('area')=='industry' ? ' checked' : '' }}>
                                <label class="custom-control-label" for="AreaIndustry">Industry</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-2">
                                <input type="radio" id="AreaEducation" name="area" class="custom-control-input"
                                    value="education" {{ old('area')=='education' ? ' checked' : '' }}>
                                <label class="custom-control-label" for="AreaEducation">Education</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-2">
                                <input type="radio" id="AreaOther" name="area" class="custom-control-input"
                                    value="other" {{ old('area')=='other' ? ' checked' : '' }}>
                                <label class="custom-control-label" for="AreaOther">Other
                                    <input class="border-bottom px-2" type="text" name="other_area"
                                        value="{{ old('other_area') }}">​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12 mb-4">
                        <label for="subscription_country" class="col-form-label">Country</label>
                        <input name="country" type="text" class="form-control mb-2" placeholder="Enter your country"
                            aria-describedby="basic-addon1" value="{{ old('country') }}" required>
                        @alerterror(['name'=>'country']) @endalerterror
                    </div>
                    <div class="form-group col-12 mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="subscription" value="true"
                                {{ old('subscription')==true ? ' checked' : '' }} id="subscriptionCheck">
                            <label class="custom-control-label" for="subscriptionCheck">Do you want to subscribe our
                                newsletters?</label>
                            @alerterror(['name'=>'subscription']) @endalerterror
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-lg w-100 py-2" type="submit">Register</button>
            </form>
        </div>
        <div class="col mt-2 p-2 justify-content-center d-flex">
            @paginator(['item'=>$event]) @endpaginator
        </div>
    </div>



</section>
@endsection