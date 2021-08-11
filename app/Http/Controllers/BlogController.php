<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $blogs = Blog::all();
        // return view('blog.index',compact('blogs'));
        // cara di atas untuk memanggil semua isi dari table blog

        // cara kedua
        $blogs = Blog::latest()->paginate(10);
        return view('blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'mimes:png,jpg,jpeg',
            'judul' => 'required',
            'content'=>'required',
        ]);
        // $input = $request->all();
        // Blog::create($input);
        $blog = new Blog;
        if ($request->hasfile("image")) {
            $file = $request->file("image");
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('image',$filename);
            $blog->image = $filename;
        };
        $blog->judul = $request->input("judul");
        $blog->content = $request->input("content");
        $blog->save();
        return redirect('blog')->with('sukses','Blog Berhasil Di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('blog.show', [
        'blog' => Blog::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        if ($request->hasfile('image')) {
            $destination = 'image'. $blog->image;
            if (File::exists($destination)) {
            File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('image', $filename);
            $blog->image = $filename;
        }
        $blog->judul = $request->input('judul');
        $blog->content = $request->input('content');
        $blog->update();
        return redirect('blog')->with('sukses','Blog Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect('blog')->with('sukses','Blog Berhasil Di Hapus');
    }
}
