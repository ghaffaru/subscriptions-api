<?php


namespace App\Services;


use App\Events\PostPublished;
use App\Models\Post;
use App\Models\Website;

class PostService
{
    public static function createNewPost($request)
    {
        // minor check for same post title
        $postTitleExist = Post::where([
            'title' => $request->title
        ])->first();

        if ($postTitleExist) {
            return response()->json(['message' => 'Post title already exist']);
        }

        $website = Website::findOrFail($request->website_id);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'website_id' => $request->website_id
        ]);

        event(new PostPublished($post,$website));

        return response()->json(['message' => 'Post published successfully!', 'post' => $post]);
    }
}
