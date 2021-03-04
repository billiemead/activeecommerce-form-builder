@extends('formbuilder::layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ transfer('Viewing my submission for form')}} 
                        <strong>{{ $submission->form->name }}</strong>
                    </h5>    
                    <div class="btn-toolbar float-md-right" role="toolbar">
                        <div class="btn-group" role="group" aria-label="First group">
                            <a href="{{ route('formbuilder::my-submissions.index') }}" class="btn btn-primary btn-sm" title="Back To My Submissions">
                                <i class="las la-arrow-left"></i> 
                            </a>
                            @if($submission->form->allowsEdit())
                                <a href="{{ route('formbuilder::my-submissions.edit', $submission) }}" class="btn btn-primary btn-sm" title="Edit this submission">
                                    <i class="las la-pen"></i> 
                                </a>
                            @endif
                            <form action="{{ route('formbuilder::my-submissions.destroy', [$submission->id]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                @csrf 
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm rounded-0 confirm-form" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete submission" title="Delete this submission?">
                                    <i class="las la-trash"></i> 
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <ul class="list-group list-group-flush">
                    @foreach($form_headers as $header)
                        <li class="list-group-item">
                            <strong>{{ $header['label'] ?? title_case($header['name']) }}: </strong> 
                            <span class="float-right">
                                {{ $submission->renderEntryContent($header['name'], $header['type']) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">{{ transfer('Details')}}</h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>{{ transfer('Form:')}} </strong> 
                        <span class="float-right">{{ $submission->form->name }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>{{ transfer('Submitted By:')}} </strong> 
                        <span class="float-right">{{ $submission->user->name ?? 'Guest' }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>{{ transfer('Last Updated On:')}} </strong> 
                        <span class="float-right">{{ $submission->updated_at->toDayDateTimeString() }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>{{ transfer('Submitted On:')}} </strong> 
                        <span class="float-right">{{ $submission->created_at->toDayDateTimeString() }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
