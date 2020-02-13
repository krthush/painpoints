@extends('layouts.base')

@section('content')

<div class="row">

	<div class="col">

		<p>{{ $pageIntroText }}</p>
		
	</div>
	
</div>

<posts-group
	:posts-type="{{ json_encode($postsType) }}"
	:default-posts="{{ json_encode($posts) }}"
    :show-form-text="{{ json_encode($showFormText) }}"
    :label-form-text="{{ json_encode($labelFormText) }}"
    :submit-form-text="{{ json_encode($submitFormText) }}"
></posts-group>

@endsection