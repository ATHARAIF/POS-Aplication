@extends('layout.app')
@section('content_title','Data Kategori')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Kategori</h4>
        </div>
        <div class="card-body">
            <table class="table table-sm table-responsive">
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
                        <th>{{ $item->name_kategori }}</th>
                        <th>{{ $item->deskripsi }}</th>
                        <th></th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
