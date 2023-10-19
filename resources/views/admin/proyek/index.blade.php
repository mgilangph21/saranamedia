@extends('layouts.app')
@push('css')
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Kelola Data Proyek</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Proyek</li>
            {{-- <li class="breadcrumb-item">Dashboard</li> --}}
        </ol>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="far fa-image me-1"></i>
                        Daftar Proyek
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal"
                                data-target="#modalAddBillboard">
                                Tambah Proyek
                            </button>
                            <div class="small">
                                total data Proyek <b>{{ $count }}</b>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $b)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $b->nama }}</td>
                                            <td>{{ $b->lokasi }}</td>
                                            <td><img src="{{ asset('storage/' . $b->gambar) }}" class="img-thumbnail"
                                                    width="150px" />
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info mr-2 mb-2" id="btnEdit" type="button"
                                                    data-toggle="modal" data-target="#modalUbah"
                                                    data-uid="{{ $b->id }}" data-nama="{{ $b->nama }}"
                                                    data-lokasi="{{ $b->lokasi }}"> Ubah
                                                </button>
                                                <button class="btn btn-sm btn-danger mr-2 mb-2" id="btnHapus"
                                                    type="button" data-toggle="modal" data-target="#modalHapus"
                                                    data-hapus="{{ $b->id }}" data-nama="{{ $b->nama }}"> Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted font-italic">
                                                Belum memiliki data Proyek
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="text-right">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAddBillboard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('addProyek') }}">
                        @csrf
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Nama
                                        Proyek</label>
                                    <input type="type" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="font-weight-bold">Lokasi</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="lokasi" required>
                                        <option value="">--- Pilih Kota/Kab. </option>
                                        @foreach ($kota as $k)
                                            <option value="{{ $k['name'] }}">{{ $k['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="custom-file">
                            <input type="file" class="file" id="gambarBiilboard" name="gambar" required
                                data-browse-on-zone-click="true" data-show-upload="false">
                        </div>

                        <hr />
                        <div class="pull-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal hapus --}}
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data LED</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan menghapus data billboard <b><span id="hapusNama"></span></b> ini ?</p>
                    <hr />
                    <div class="pull-right">
                        <form action="{{ route('deleteProyek') }}" method="post">
                            @csrf
                            <input type="hidden" name="haid" id="hapusID" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal ubah --}}
    <div class="modal fade" id="modalUbah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('updateProyek') }}">
                        @csrf
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Nama
                                        Proyek</label>
                                    <input type="hidden" class="form-control" name="uid" id="uid" required>
                                    <input type="text" class="form-control" name="unama" id="unama" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="font-weight-bold">Lokasi</label>
                                    <select class="form-control" name="lokasi" id="ulokasi">
                                        <option value="">--- Pilih Kota/Kab. </option>
                                        @foreach ($kota as $k)
                                            <option value="{{ $k['name'] }}">{{ $k['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="custom-file">
                            <input type="file" class="file" id="gambarBiilboard" name="ugambar" required
                                data-browse-on-zone-click="true" data-show-upload="false">
                        </div>

                        <hr />
                        <div class="pull-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info">Perbarui Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js"
        type="text/javascript"></script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>

    <script>
        $.fn.fileinputBsVersion = "3.3.7"; // if not set, this will be auto-derived
        // initialize plugin with defaults
        $("#gambarBiilboard").fileinput();
        // with plugin options
        $("#gambarBiilboard").fileinput({
            'showUpload': true,
            'previewFileType': 'any'
        });
    </script>

    {{-- CKeditor - Keterangan --}}
    {{-- <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('keteranganLed');
    </script> --}}

    <script>
        $(document).on('click', '#btnHapus', function() {
            var id = $(this).data('hapus');
            var nama = $(this).data('nama');
            $('#hapusID').val(id);
            $('#hapusNama').html(nama);
        });

        $(document).on('click', '#btnEdit', function() {
            var id = $(this).data('uid');
            var nama = $(this).data('nama');
            var lokasi = $(this).data('lokasi');
            $('#uid').val(id);
            $('#unama').val(nama);
            $('#ulokasi').val(lokasi).attr('selected', true);

            console.log(lokasi);
        });
    </script>
@endpush
