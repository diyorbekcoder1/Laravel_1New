<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\FileUpload;

/**
 * @method fileUpload(mixed $data)
 */
class PostController extends Controller
{
    use FileUpload;

    public function index()
    {
        $posts = Post::orderBy('id', 'asc')->get();
//        $posts = Post::with('category')->get()->sortByDesc('created_at');
        return view('welcome', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(PostRequest $postRequest)
    {
        $data = $postRequest->validated();
        $data = $this->fileUpload($data);
        Post::create($data);
        return redirect()->route('home');

    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('show', compact('post'));
    }


    public function edit($id)
    {
        $post = Post::with('category')->find($id);
        $categories = Category::all();
        return view('edit', compact('post', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
                'Firstname' => ['string', 'required'],
                'Lastname' => ['required', 'string'],
                'description' => ['required', 'string'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'category_id' => ['required', 'integer', 'exists:categories,id']

            ]


        );
        $post = Post::find($id);
        if (isset($data['image'])) {
            $data = $this->fileUpload($data);

        }
        $post->update($data);
        return redirect()->route('home');
    }


    public function destroy($id)
    {
        $request = request()->merge(['id' => $id]);
        $request->validate(['id' => 'required|exists:posts,id']);
        $post = Post::find($id);
        unlink('storage/images/' . $post->image);
        $post->delete();
        return redirect()->route('home');
    }


}
