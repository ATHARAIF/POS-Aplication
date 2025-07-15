<div>
    <button type="button" class="btn {{$id ? 'btn-default' : 'btn-primary'}}" data-toggle="modal"
        data-target="#formKategori{{ $id ?? '' }}">
        {{$id ? 'Edit' : 'Tambah Data'}}
    </button>
    <div class="modal fade" id="formKategori{{ $id ?? '' }}">
        <form action="{{ route('master-data.kategori.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id??'' }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $id ? 'Form Edit Kategori' : 'Form Kategori Baru' }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ $nama_kategori }}">
                        </div>
                        <div>
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"
                                class="form-control">
                            {{ $deskripsi }}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
    </div>
</div>