@extends('formbuilder::layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ translate('Form Successfully submitted')}}
                    </h5>
                    @auth
                        <a href="{{ route('formbuilder::my-submissions.index') }}" class="btn btn-primary btn-sm float-md-right">
                            <i class="las la-list"></i> {{ translate('Go To My Submissions')}}
                        </a>
                    @endauth
                </div>

                <div class="card-body">
                    <h3 class="text-center text-success">
                        {{ translate('Your entry for')}} <strong>{{ $form->name }}</strong> {{ translate('was successfully submitted.')}}
                    </h3>
                </div>

                <div class="card-footer">
                    <a href="{{ route('home') }}" class="btn btn-primary confirm-form">
                        <i class="la las-home"></i> {{ translate('Return Home')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
