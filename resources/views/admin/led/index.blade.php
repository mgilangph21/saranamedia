@extends('layouts.app')
@push('css')
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Kelola Data LED</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">LED</li>
            {{-- <li class="breadcrumb-item">Dashboard</li> --}}
        </ol>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="far fa-image me-1"></i>
                        Daftar LED
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal"
                            data-target="#modalAddBillboard">
                            Tambah LED
                        </button>
                        <div class="table-responsive">
                            <table class="table" id="datatablesSimple">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $b)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('editLed', $b->id) }}">{{ $b->nama }}</a></td>
                                            <td>{{ $b->lokasi }}</td>
                                            <td><img src="{{ asset('storage/' . $b->gambar) }}" class="img-thumbnail"
                                                    width="150px" />
                                            </td>
                                            <td>
                                                <span
                                                    class="badge rounded-pill bg-{{ $b->status == 'Y' ? 'success' : 'secondary' }}">{{ $b->status == 'Y' ? 'Tersedia' : 'Tidak Tersedia' }}</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-danger" id="btnHapus" type="button"
                                                    data-toggle="modal" data-target="#modalHapus"
                                                    data-hapus="{{ $b->id }}" data-nama="{{ $b->nama }}"> Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted font-italic">
                                                Belum memiliki data Billboard
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data LED</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('addLed') }}">
                        @csrf
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Nama
                                        Billboard</label>
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

                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1" class="font-weight-bold">Keterangan</label>
                            <textarea class="form-control" name="keteranganLed" id="keteranganLed"></textarea>
                        </div>

                        <fieldset class="form-group row mb-2">
                            <legend class="col-form-label float-sm-left pt-0 font-weight-bold">Status</legend>
                            <div class="">
                                <select class="form-control" id="status" name="status" required>
                                    <option value="">--- Pilih Status</option>
                                    <option value="Y">Tersedia</option>
                                    <option value="N">Tidak Tersedia</option>
                                </select>
                            </div>
                        </fieldset>

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
                        <form action="{{ route('deleteLed') }}" method="post">
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
    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('keteranganLed');
    </script>

    <script>
        $(document).on('click', '#btnHapus', function() {
            var id = $(this).data('hapus');
            var nama = $(this).data('nama');
            $('#hapusID').val(id);
            $('#hapusNama').html(nama);
        });
    </script>
@endpush
