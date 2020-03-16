<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    /**
     * Show problem posts
     *
     * @return Response
     */
    public function showProblems()
    {
    	$posts = Post::where('parent_id', NULL)->where('type', 'problem')->orderByDesc('popularity')->get();

    	foreach ($posts as $key => $post) {
    		$post['children'] = $post->allChildren()->get();
    	}

    	/* View page variables */
    	$pageIntroText = "Post ANY problems you have below. Better problems are ones that are FREQUENT as well as INTENSE - i.e. pain points!";
    	$postsType = 'problem';
	    $showFormText='Post a new problem';
	    $labelFormText='Post a new problem';
	    $submitFormText='Post Problem';

    	return view(
            'pages.home',
            compact(
                'pageIntroText',
                'posts',
                'postsType',
			    'showFormText',
			    'labelFormText',
			    'submitFormText',
            )
        );
    }

    /**
     * Show answer posts
     *
     * @return Response
     */
    public function showAnswers()
    {
    	$posts = Post::where('parent_id', NULL)->where('type', 'answer')->orderByDesc('popularity')->get();

    	foreach ($posts as $key => $post) {
    		$post['children'] = $post->allChildren()->get();
    	}

    	/* View page variables */
    	$pageIntroText = "This is NOT good practice (see <a href='http://paulgraham.com/startupideas.html'>here</a>), but if you do have any cool ideas feel free to put them here!";
    	$postsType = 'answer';
	    $showFormText='Post a new idea';
	    $labelFormText='Post a new idea';
	    $submitFormText='Post Idea';

    	return view(
            'pages.home',
            compact(
                'pageIntroText',
                'posts',
                'postsType',
			    'showFormText',
			    'labelFormText',
			    'submitFormText',
            )
        );
    }

    /**
     * Create a root post
     *
     * @return Response
     */
    public function createPost(Request $request)
    {
        $this->validate(request(), [
        	'type' => 'required',
            'content' => 'required'
        ]);

        $post = Post::create([
        	'type' => $request->type,
        	'content' => $request->content,
        	'popularity' => 0
        ]);

        return response()->json([
        	'success' => true,
        	'post' => $post,
        ]);

    }

    /**
     * Add a comment to a post
     *
     * @return Response
     */
    public function addComment(Request $request)
    {
        $this->validate(request(), [
        	'id' => 'required',
            'content' => 'required'
        ]);

        $parent = Post::find($request->id);

        $post = Post::create([
        	'type' => $parent->type,
        	'content' => $request->content,
        	'popularity' => 0
        ], $parent);

        return response()->json([
        	'success' => true,
        	'post' => $post,
        	'popularity' => 0
        ]);

    }

    /**
     * Update popularity for a post
     *
     * @return Response
     */
    public function updatePopularity(Request $request)
    {
        $this->validate(request(), [
        	'id' => 'required',
            'popularity' => 'required'
        ]);

        $post = Post::find($request->id);

        $post->update([
        	'popularity' => $request->popularity
        ]);

        return response()->json([
        	'success' => true,
        	'post' => $post,
        ]);

    }

}
