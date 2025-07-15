<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class KategoriController extends Controller
{
    public function index(){
        $kategori= Kategori::all();
        confirmDelete('Hapus Data', 'Apakah anda yakin ingin menghapus data ini','Hapus','Batal');
        return view('kategori.index',compact('kategori'));
    }

    public function store(Request $request ){
        $id = $request->id;
        $request->validate([
            // Corrected: Removed space after comma in unique rule
            'nama_kategori'=>'required|unique:kategoris,nama_kategori,'.$id,
            'deskripsi'=>'required|max:100|min:5'
        ],[
            'nama_kategori.required'=> 'Nama Kategori harus diisi',
            'nama_kategori.unique'=> 'Nama Kategori sudah ada',
            'deskripsi.required'=>'Deskripsi harus diisi',
            'deskripsi.max'=>'Deskripsi maksimal 100 karakter',
            'deskripsi.min'=>'Deskripsi minimal 5 karakter',
        ]);
        Kategori::updateOrCreate(
            ['id'=>$id],
            [
                'nama_kategori'=> $request->nama_kategori,
                'slug'=> Str::slug($request->nama_kategori),
                'deskripsi'=> $request->deskripsi
            ]
            );
        toast()->success('Data Berhasil disimpan'); // Assuming 'toast()' is available (e.g., from a package like Laracasts/Flash)
        return redirect()->route('master-data.kategori.index');
    }

    public function destroy($id){
        $kategori= Kategori::find($id);
        if($kategori){
            $kategori->delete();
            toast()->success('Data berhasil dihapus');
        }else{
            toast()->error('Data tidak ditemukan');
        }
    return redirect()->route('master-data.kategori.index');
    }

    public function restore($id){
        $kategori = Kategori::onlyTrashed()->find($id);
        if($kategori){
            $kategori->restore();
            toast()->success('Data berhasil dipulihkan');
        }else{
            toast()->error('Data tidak ditemukan atau belum dihapus');
        }
        return redirect()->route('master-data.kategori.index');
    }
}
