<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // deklarasi variabel
        $data = Post::all();
        //mengembalikan view ke halaman index dengan membawa data kategori
        return view('post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //deklarasi variabel
        $data = Kategori::all();
        //mengembalikan view ke halaman create
        return view('post.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        //deklarasi variabel
        $data = $request->all();
        $data['image'] = Storage::put('post/image',  $request->file('image'));
        // fungsi create data
        Post::create($data);
        //mengembalikan view ke halaman Post
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //deklarasi variabel
        $data = Kategori::all();
        //mengembalikan view ke halaman edit
        return view('post.edit', compact('data', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // mengubah data didalam database dengan data dalam form
        $data = $request->all();

        //fungsi untuk update image dan update data
        try {
            $data['image'] = Storage::put('post/image',  $request->image);
            $post->update($data);
        } catch (\Throwable $th) {
            $data['image'] = $post->image;
            $post->update($data);
        }
        //mengembalikan view ke halaman post
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // menghapus data di database berdasarkan id yang dipilih di tabel
        $post->delete();
        //mengembalikan view ke halaman post
        return redirect('post');
    }
    public function blog()
    {
        //deklarasi variabel
        $data = Post::where('status', 'aktif')->get();
        //mengembalikan view ke halaman blog
        return view('blog', compact('data'));
    }
    public function detail(Post $post)
    {
        //deklarasi variabel
        // $post = Post::findOrFail($id);
        $produk = Produk::where('kategori_id', '=', $post->kategori->id)->get();
        // $produk = Produk::all();
        //mengembalikan view ke halaman detail
        // dd($produk);
        return view('detail', compact('post','produk'));
    }
}
