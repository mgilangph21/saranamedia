@extends('public.master')
@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <ol class="pt-4">
                <li><a href="/">Beranda</a></li>
                <li>Detil Portfolio</li>
            </ol>
            <h2>Telusuri Porftfolio Lebih Detil</h2>

        </div>
    </section>

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <img src="{{ asset('storage/' . $d->gambar) }}" alt="gambar_produk">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Informasi Produk</h3>
                        <ul>
                            <li><strong>Nama Produk</strong>: {{ $d->nama }}</li>
                            <li><strong>Lokasi</strong>: {{ $d->lokasi }}</li>
                            <li><strong>Status</strong>: <span
                                    class="badge rounded-pill text-bg-{{ $d->status == 'Y' ? 'success' : 'warning' }}">{{ $d->status == 'Y' ? 'Tersedia' : 'Tidak Tersedia' }}</span>
                            </li>
                        </ul>

                        <span class="small text-muted fst-italic">update terakhir :
                            {{ Carbon\Carbon::parse($d->updated_at)->translatedformat('l, d F Y') }}</span>

                    </div>
                    <div class="portfolio-description">
                        <h2>Deskripsi singkat produk</h2>
                        <?php echo $d->detil; ?>
                    </div>

                    <a href="/#portfolio" class="btn btn-sm btn-warning mt-3 float-right">Kembali</a>
                </div>

            </div>

        </div>
    </section>
@endsection
