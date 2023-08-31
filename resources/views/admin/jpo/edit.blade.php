@extends('layouts.app')
@push('css')
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="container-fluid px-4">
        <h2 class="mt-4">Kelola Data Jembatan Penyeberangan Orang</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('jpo') }}">JPO</a></li>
            <li class="breadcrumb-item active">Detil dan Ubah</li>
        </ol>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Detil JPO
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('updateJpo') }}">
                            @csrf
                            <input name="uid" value="{{ $data->id }}" type="hidden" />
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="font-weight-bold">Nama
                                            JPO</label>
                                        <input type="type" class="form-control" name="unama"
                                            value="{{ $data->nama }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="font-weight-bold">Lokasi</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="lokasi" required>
                                            <option value="">--- Pilih Kota/Kab. </option>
                                            @foreach ($kota as $k)
                                                <option value="{{ $k['name'] }}"
                                                    {{ $data->lokasi == $k['name'] ? 'Selected' : '' }}>
                                                    {{ $k['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group row mb-2">
                                        <legend class="col-form-label col-sm-3 float-sm-left pt-0 font-weight-bold">Status
                                        </legend>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ustatus" id="tersedia"
                                                    value="Y" {{ $data->status == 'Y' ? 'Checked' : '' }}>
                                                <label class="form-check-label" for="tersedia">
                                                    Tersedia
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ustatus"
                                                    id="noTersedia" value="N"
                                                    {{ $data->status == 'N' ? 'Checked' : '' }}>
                                                <label class="form-check-label" for="noTersedia">
                                                    Tidak Tersedia
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="exampleInputEmail1" class="font-weight-bold">Keterangan</label>
                                <textarea class="form-control" name="uketerangan" id="keteranganJpo">{{ $data->detil }}</textarea>
                            </div>

                            <div class="custom-file row">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $data->gambar) }}" class="img-fluid" />
                                </div>
                                <div class="col-md-8">
                                    <label class="small text-muted">Unggah gambar pada bagian di bawah ini untuk mengganti
                                        gambar.</label>
                                    <input type="file" class="file" id="gambarBiilboard" name="ugambar"
                                        data-browse-on-zone-click="true" data-show-upload="false">
                                </div>
                            </div>

                            <hr />
                            <div class="pull-right">
                                <a href="{{ route('jpo') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-info">Perbarui</button>
                            </div>
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
        CKEDITOR.replace('keteranganJpo');
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
