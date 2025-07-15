@extends('layout.app')
@section('content_title','Data Kategori')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Kategori</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger d-flex flex-column">
                    @foreach ($errors->all() as $error )
                        <small class="text-white my-2">{{ $error }}</small>
                    @endforeach
                </div>
            @endif
            
            <div class="d-flex justify-content-end mb-2">
                <x-kategori.form-kategori/>
            </div>
            <table class="table table-sm table-responsive" id="table1" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $index =>$item)
                    <tr>
                        <th>{{ $index +1 }}</th>
                        <th>{{ $item->nama_kategori }}</th>
                        <th>{{ $item->deskripsi }}</th>
                        <th>
                            <div class="d-flex align-items-center">
                                <x-kategori.form-kategori :id="$item->id" />
                                <a href="{{ route('master-data.kategori.destroy',$item->id) }}" data-confirm-delete="true" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
