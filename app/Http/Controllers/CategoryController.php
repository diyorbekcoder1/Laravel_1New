<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    use FileUpload;

    public function index()
    {
        $rains = Category::orderBy('id', 'asc')->get();
        return view('welcome1', compact('rains'));
    }


    public function create()
    {
        return view('about');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
                'name' => ['string', 'required'],
                'title' => ['required', 'string'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']


            ]


        );
        $data = $this->fileUpload($data);
        Category::create($data);
        return redirect()->route('meni');
    }


    public function show($id)
    {
        $post = Category::find($id);
        return view('show1', compact('post'));
    }


    public function edit($id)
    {
        $post = Category::find($id);
        return view('edit_new', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
                'name' => ['string', 'required'],
                'title' => ['required', 'string'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']

            ]


        );
        $post = Category::find($id);
        if (isset($data['image'])) {
            $data = $this->fileUpload($data);

        }
        $post->update($data);
        return redirect()->route('meni');
    }


    public function destroy($id)
    {
        $request = request()->merge(['id' => $id]);
        $request->validate(['id' => 'required|exists:categories,id']);
        $rains = Category::find($id);
        unlink('storage/images/' . $rains->image);
        $rains->delete();
        return redirect()->route('meni');
    }
}
