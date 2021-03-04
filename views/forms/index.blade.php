@extends('formbuilder::layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        {{translate('Forms') }}
                    </h5>
                    <div class="btn-toolbar float-md-right" role="toolbar">
                        <div class="btn-group" role="group" aria-label="Third group">
                            <a href="{{ route('formbuilder::forms.create') }}" class="btn btn-circle btn-info">
                                <i class="la las-plus-circle"></i> {{translate('Create a New Form') }}
                            </a>

                            <a href="{{ route('formbuilder::my-submissions.index') }}" class="btn btn-primary btn-sm">
                                <i class="las la-list"></i> {{translate('My Submissions') }}
                            </a>
                        </div>
                    </div>
                </div>

                @if($forms->count())
                    <div class="table-responsive">
                        <table class="table table-bordered d-table table-striped pb-0 mb-0">
                            <thead>
                                <tr>
                                    <th class="five">#</th>
                                    <th>{{translate('Name') }}</th>
                                    <th class="ten">{{translate('Visibility') }}</th>
                                    <th class="fifteen">{{translate('Allows Edit?') }}</th>
                                    <th class="ten">{{translate('Submissions') }}</th>
                                    <th class="twenty-five">{{translate('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($forms as $form)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $form->name }}</td>
                                        <td>{{ $form->visibility }}</td>
                                        <td>{{ $form->allowsEdit() ? 'YES' : 'NO' }}</td>
                                        <td>{{ $form->submissions_count }}</td>
                                        <td>
                                            <a href="{{ route('formbuilder::forms.submissions.index', $form) }}" class="btn btn-primary" title="View submissions for form '{{ $form->name }}'">
                                                <i class="las la-list"></i> {{translate('Data') }}
                                            </a>
                                            <a href="{{ route('formbuilder::forms.show', $form) }}" class="btn btn-secondary" title="Preview form '{{ $form->name }}'">
                                                <i class="las la-eye"></i> 
                                            </a> 
                                            <a href="{{ route('formbuilder::forms.edit', $form) }}" class="btn btn-warning" title="Edit form">
                                                <i class="las la-pen"></i> 
                                            </a> 
                                            <button class="btn btn-success clipboard" data-clipboard-text="{{ route('formbuilder::form.render', $form->identifier) }}" data-message="" data-original="" title="Copy form URL to clipboard">
                                                <i class="las la-clipboard"></i> 
                                            </button> 

                                            <form action="{{ route('formbuilder::forms.destroy', $form) }}" method="POST" id="deleteFormForm_{{ $form->id }}" class="d-inline-block">
                                                @csrf 
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger confirm-form" data-form="deleteFormForm_{{ $form->id }}" data-message="Delete form '{{ $form->name }}'?" title="Delete form '{{ $form->name }}'">
                                                    <i class="las la-trash"></i> 
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($forms->hasPages())
                        <div class="card-footer mb-0 pb-0">
                            <div>{{ $forms->links() }}</div>
                        </div>
                    @endif
                @else
                    <div class="card-body">
                        <h4 class="text-danger text-center">
                            {{translate('No form to display') }}
                        </h4>
                    </div>  
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
