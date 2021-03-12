@extends('formbuilder::layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            {{ $pageTitle ?? '' }}
                        </h5>
                        <a href="{{ route('formbuilder::forms.index') }}" class="btn btn-primary float-md-right">
                            <i class="las la-arrow-left"></i> {{ translate('Back To My Forms') }}
                        </a>
                    </div>

                    <form action="{{ route('formbuilder::forms.store') }}" method="POST" id="createFormForm">
                        @csrf 
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">{{ translate('Form Name') }}</label>

                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter Form Name">

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="visibility" class="col-form-label">{{ translate('Form Visibility') }}</label>

                                        <select name="visibility" id="visibility" class="form-control" required="required">
                                            <option value="">{{ translate('Select Form Visibility') }}</option>
                                            @foreach(billiemead\FormBuilder\Models\Form::$visibility_options as $option)
                                                <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('visibility'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('visibility') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4" style="display: none;" id="allows_edit_DIV">
                                    <div class="form-group">
                                        <label for="allows_edit" class="col-form-label">
                                            {{ translate('Allow Submission Edit') }}
                                        </label>

                                        <select name="allows_edit" id="allows_edit" class="form-control" required="required">
                                            <option value="0">{{ translate('No (submissions are final)') }}</option>
                                            <option value="1">{{ translate('Yes (allow users to edit their submissions)') }}</option>
                                        </select>

                                        @if ($errors->has('allows_edit'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('allows_edit') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-info" role="alert">
                                        <i class="la las-info-circle"></i> 
                                        {{ translate('Click on or drag and drop components onto the main panel to build your form.') }}
                                    </div>

                                    <div id="fb-editor" class="fb-editor"></div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card-footer" id="fb-editor-footer" style="display: none;">
                        <button type="button" class="btn btn-primary fb-clear-btn">
                            <i class="la las-remove"></i> {{ translate('Clear Form') }}
                        </button> 
                        <button type="button" class="btn btn-primary fb-save-btn">
                            <i class="la las-save"></i> {{ translate('Submit and Save Form') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push(config('formbuilder.layout_js_stack', 'scripts'))
    <script type="text/javascript">
        window.FormBuilder = window.FormBuilder || {}
        window.FormBuilder.form_roles = @json($form_roles);
    </script>
    <script src="{{ static_asset('vendor/formbuilder/js/create-form.js') }}{{ billiemead\FormBuilder\Helper::bustCache() }}" defer></script>
@endpush
