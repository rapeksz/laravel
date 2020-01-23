@if (isset($success))
<div class="alert alert-success alert-block" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $success }}</strong>
</div>
@endif

@if (isset($error))
<div class="alert alert-danger alert-block" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $error }}</strong>
</div>
@endif

@if (isset($warning))
<div class="alert alert-warning alert-block" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $warning }}</strong>
</div>
@endif

@if (isset($info))
<div class="alert alert-info alert-block" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $info }}</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	Please check the form below for errors
</div>
@endif
