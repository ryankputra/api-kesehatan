<?php

namespace App\Http\Controllers\Api;

//panggil model
use App\Models\Post;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//import post ressource
use App\Http\Resources\PostRes;

//import untuk storage
use Illuminate\Support\Facades\Storage;

//import facade validator (untuk validasi create)
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{

    //ini untuk read
    public function index()
    {
        //ambil seluruh post berdasarkan 5 data
        $posts = Post::latest()->paginate(5);
        //mengembalikan koleksi dari post data
        return new PostRes(true,'Daftar data posts',$posts
        );
    }

    //ini untuk create
    public function store(Request $request)
    {
        //mendefinisikan aturan
        $validator = Validator::make($request->all(), [
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        //cek kalau validasi tidak memenuhi
        if ($validator->fails()) {
            return response()->json($validator->errors(), 442);
        }

        //upload gambar
        $pic = $request->file('pic');
        $pic->storeAs('public/posts', $pic->hashName());

        //membuat posts
        $post = Post::create([
            'pic' => $pic->hashName(),
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        //memberikan respom
        return new PostRes(true,'Data post berhasil menambahkan post',$post);
    }
    //menampilkan data berdasarkan id
    public function show($id)
    {
        //mencari data berdasarkan id routes
        $post = Post::find($id);

        //jika data tidak ditemukan
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Data post tidak ditemukan',
            ],404);
            
        }

        //jika data ditemukan
        return new PostRes(true,'Detail Data Post',$post);
    }
    //update data
    public function update(Request $request, $id)
    {
        //mendefinisikan aturan validasi
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        //cek kalau validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 442);
        }
        //mencari data berdasarkan id
        $post = Post::find($id);

        //kalau post tidak ditemukan
        if (!$post) {
            return response()->json(['message' => 'Post tidak ada'],404);
        }

        //cek kalau ada file foto baru
        if ($request->file('pic')) {

            //upload foto 
            $pic = $request->file('pic');
            $pic->storeAs('public/posts', $pic->hashName());

             //menghapus gambar lama kalau ada
             if ($post->pic) {
                Storage::delete('public/posts/' . basename($post->pic));
                }
           

            //update post dengan gambar baru
            $post->update([
                'pic' => $pic->hashName(),
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
            ]);
        }else{
            //update post kalau tidak diisi
            $post->update([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
            ]);
        }

        //memberikan respon setelah berhasil update
        return new PostRes(true,'Data post berhasil diupdate',$post);
    }

    //update data
   // public function update(Request $request, $id)
   

    //delete data
    public function destroy($id)
    {
        //mencari data berdasarkan id
        $post = Post::find($id);

        //kalau post tidak ditemukan
        if (!$post) {
            return response()->json(['message' => 'Post tidak ditemukan'],404);
        }

        //menghapus gambar
        Storage::delete('public/posts/' . basename($post->pic));

        //menghapus dari tabel post
        $post->delete();

        //memberikan respon setelah berhasil delete
        return new PostRes(true,'Data post berhasil dihapus', null);
    }
}

