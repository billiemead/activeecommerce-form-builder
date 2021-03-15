@extends('formbuilder::layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card rounded-0">
                <div class="card-header">
                    <h1 class="card-title">
                        {{ translate('Form Preview for')}} '{{ $form->name }}' 
                    </h1>
                    <div class="btn-toolbar float-md-right" role="toolbar">
                        <div class="btn-group" role="group">
                            <a href="{{ route('formbuilder::forms.index') }}" class="btn btn-primary float-md-right">
                                <i class="las la-arrow-left"></i> 
                            </a>
                            <a href="{{ route('formbuilder::forms.submissions.index', $form) }}" class="btn btn-info float-md-right">
                                <i class="las la-list"></i> {{ translate('Submissions')}}
                            </a> 
                            <a href="{{ route('formbuilder::forms.edit', $form) }}" class="btn btn-warning float-md-right">
                                <i class="la las-edit"></i> {{ translate('Edit')}}
                            </a> 
                            <a href="{{ route('formbuilder::forms.create') }}" class="btn btn-danger float-md-right">
                                <i class="la las-plus-circle"></i> {{ translate('New Form')}}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="fb-render"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ translate('Details')}}
                </h5>
                    <button class="btn btn-primary btn-sm clipboard float-right" data-clipboard-text="{{ route('formbuilder::form.render', $form->identifier) }}" data-message="Copied" data-original="Copy Form URL" title="Copy form URL to clipboard">
                        <i class="la las-clipboard"></i> {{ translate('Copy Form URL')}}
                    </button> 
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>{{ translate('Public URL:')}} </strong> 
                        <a href="{{ route('formbuilder::form.render', $form->identifier) }}" class="float-right" target="_blank">
                            {{$form->identifier}}
                        </a>
                    </li>
                    <li class="list-group-item">
                        <strong>{{ translate('Visibility:')}} </strong> <span class="float-right">{{ $form->visibility }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>{{ translate('Allows Edit:')}} </strong> 
                        <span class="float-right">{{ $form->allowsEdit() ? 'YES' : 'NO' }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>{{ translate('Owner:')}} </strong> <span class="float-right">{{ $form->user->name }}</span>
                    </li>
                     <li class="list-group-item">
                        <strong>{{ translate('Current Submissions:')}} </strong> 
                        <span class="float-right">{{ $form->submissions_count }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>{{ translate('Last Updated On:')}} </strong> 
                        <span class="float-right">
                            {{ $form->updated_at->toDayDateTimeString() }}
                        </span>
                    </li>
                    <li class="list-group-item">
                        <strong>{{ translate('Created On:')}} </strong> 
                        <span class="float-right">
                            {{ $form->created_at->toDayDateTimeString() }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push(config('formbuilder.layout_js_stack', 'scripts'))
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script src="{{ static_asset('vendor/formbuilder/js/preview-form.js') }}{{ billiemead\FormBuilder\Helper::bustCache() }}" defer></script>
@endpush
