@extends('formbuilder::layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ $pageTitle }} ({{ $submissions->count() }})
                    </h5>
                    <a href="{{ route('formbuilder::forms.index') }}" class="btn btn-primary float-md-right btn-sm" title="Back To My Forms">
                        <i class="las la-list"></i> {{ translate('My Forms')}}
                    </a>
                </div>

                @if($submissions->count())
                    <div class="table-responsive">
                        <table class="table table-bordered d-table table-striped pb-0 mb-0">
                            <thead>
                                <tr>
                                    <th class="five">#</th>
                                    <th class="">{{ translate('Form')}}</th>
                                    <th class="twenty-five">{{ translate('Updated On')}}</th>
                                    <th class="twenty-five">{{ translate('Created On')}}</th>
                                    <th class="fifteen">{{ translate('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($submissions as $submission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $submission->form->name }}</td>
                                        <td>{{ $submission->updated_at->toDayDateTimeString() }}</td>
                                        <td>{{ $submission->created_at->toDayDateTimeString() }}</td>
                                        <td>
                                            <a href="{{ route('formbuilder::my-submissions.show', [$submission->id]) }}" class="btn btn-primary btn-sm" title="View submission">
                                                <i class="las la-eye"></i> {{ translate('View')}}
                                            </a> 

                                            @if($submission->form->allowsEdit())
                                                <a href="{{ route('formbuilder::my-submissions.edit', [$submission->id]) }}" class="btn btn-primary btn-sm" title="Edit submission">
                                                    <i class="las la-pen"></i> 
                                                </a> 
                                            @endif

                                            <form action="{{ route('formbuilder::my-submissions.destroy', [$submission]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                                @csrf 
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm confirm-form" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete this submission?" title="Delete submission">
                                                    <i class="las la-trash"></i> 
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($submissions->hasPages())
                        <div class="card-footer mb-0 pb-0">
                            <div>{{ $submissions->links() }}</div>
                        </div>
                    @endif
                @else
                    <div class="card-body">
                        <h4 class="text-danger text-center">
                            {{translate('No submissions to display') }}
                        </h4>
                    </div>  
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
