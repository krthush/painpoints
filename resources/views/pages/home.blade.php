@extends('layouts.base')

@section('content')

<div class="row">

	<p class="mx-4">This blog post shows a few different types of content that's supported and styled with Bootstrap. </p>

	<post-form
		class="mx-4"
		:show-form-text="'Add New Problem'"
		:label-form-text="'Add New Problem'"
		:submit-form-text="'Add Problem'"
	></post-form>

	<h3 class="mx-4 pb-3 mb-4">
        Problems:
     </h3>

	<post
		class="mx-4" 
	    :content="posts.content" 
	    :children="posts.children"
	    :depth="0"
	></post>
	
</div>

@endsection