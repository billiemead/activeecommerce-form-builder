@extends(config('formbuilder.layout_file_admin', 'backend.layouts.app'))

@prepend(config('formbuilder.layout_js_stack', 'scripts'))
	<script type="text/javascript">
		window.FormBuilder = {
			csrfToken: '{{ csrf_token() }}',
		}
	</script>
	<script src="{{ static_asset('vendor/formbuilder/js/jquery-ui.min.js') }}" defer></script>
	<script src="{{ static_asset('vendor/formbuilder/js/sweetalert.min.js') }}" defer></script>
	<script src="{{ static_asset('vendor/formbuilder/js/jquery-formbuilder/form-builder.js') }}" defer></script>
	<script src="{{ static_asset('vendor/formbuilder/js/jquery-formbuilder/form-render.js') }}" defer></script>
	<script src="{{ static_asset('vendor/formbuilder/js/parsleyjs/parsley.min.js') }}" defer></script>
	<script src="{{ static_asset('vendor/formbuilder/js/clipboard/clipboard.min.js') }}?b=ck24" defer></script>
	<script src="{{ static_asset('vendor/formbuilder/js/moment.js') }}"></script>
	<script src="{{ static_asset('vendor/formbuilder/js/footable/js/footable.min.js') }}" defer></script>
	<script src="{{ static_asset('vendor/formbuilder/js/script.js') }}{{ billiemead\FormBuilder\Helper::bustCache() }}" defer></script>
@endprepend

@prepend(config('formbuilder.layout_css_stack', 'styles'))
	<link rel="stylesheet" type="text/css" href="{{ static_asset('vendor/formbuilder/js/footable/css/footable.standalone.min.css') }}">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ static_asset('vendor/formbuilder/css/styles.css') }}{{ billiemead\FormBuilder\Helper::bustCache() }}">
@endprepend
