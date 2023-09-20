@extends('public.master')
@push('css')
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-6">
                    <h1>Kami hadir untuk memberikan yang terbaik</h1>
                    <h2>Jaringan media periklanan tersebar di seluruh pulau Jawa</h2>
                    <a href="#portfolio" class="btn-get-started scrollto">Lihat Portofolio</a>
                </div>
            </div>
        </div>
    </section>
    {{-- klien --}}
    {{-- <section id="clients" class="clients">
        <div class="container" data-aos="zoom-in">
            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="{{ asset('/landing/assets/img/clients/client-1.png') }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ asset('/landing/assets/img/clients/client-2.png') }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ asset('/landing/assets/img/clients/client-3.png') }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{ asset('/landing/assets/img/clients/client-4.png') }}"
                            class="img-fluid" alt="">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section> --}}

    {{-- layanan --}}
    <section id="services" class="services section-bg ">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Layanan</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <i class='bx bx-chalkboard'></i>
                        <h4><a href="#">Billboard</a></h4>
                        <p>merupakan media iklan luar ruangan berbentuk papan berukuran besar. Billboard berisi konten
                            gambar dan teks dan biasanya ditempatkan di lokasi yang mudah dilihat, seperti di pinggir jalan
                            utama atau
                            di persimpangan jalan</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <i class='bx bx-filter'></i>
                        <h4><a href="#">Jembatan Penyebrangan Orang (JPO)</a></h4>
                        <p>merupakan akses untuk pejalan kaki guna melintas ke area sebrang. Memanfaatkan fasilitas ini
                            untuk beriklan dengan target pengguna jalan secara langsung.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <i class='bx bx-tv'></i>
                        <h4><a href="#">Layar LED</a></h4>
                        <p>sebuah channel pemasaran produk atau jasa melalui media digital. iklan dapat berupa gambar/video
                            dengan durasi tertentu sesuai dengan kebutuhan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- portofolio --}}
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Portfolio</h2>
                {{-- <p>Berikut merupakan daftar layanan kami yang tersebar di berbagai daerah.</p> --}}
            </div>

            <div id="counts" class="counts">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="count-box">
                            <i class='bx bx-chalkboard'></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ count($data['bill']) }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Billboard</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class='bx bx-filter'></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ count($data['jpo']) }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Jembatan Penyeberangan Orang (JPO)</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class='bx bx-tv'></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ count($data['led']) }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Layar LED</p>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-people"></i>
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hard Workers</p>
                    </div>
                </div> --}}
                </div>
            </div>

            <nav class="d-flex justify-content-center mt-4">
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-item btn btn-danger mx-2 active" id="nav-home-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                        aria-selected="true">Billboard</button>
                    <button class="nav-item btn btn-danger mx-2" id="nav-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                        aria-selected="false">JPO</button>
                    <button class="nav-item btn btn-danger mx-2" id="nav-contact-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                        aria-selected="false">LED</button>
                </div>
            </nav>
            <div class="tab-content mt-3" id="nav-tabContent">
                <div class="tab-pane fade show active bg-putih p-4" id="nav-home" role="tabpanel"
                    aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="col-md-12">
                        <table class="table table-striped" style="width:100%" id="tableBill">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama/Lokasi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['bill'] as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span class="fw-bold text-primary">{{ $b->nama }}</span> <br />
                                            {{ $b->lokasi }}
                                        </td>
                                        <td><img src="{{ asset('storage/' . $b->gambar) }}" width="200px"></td>
                                        <td>
                                            <span
                                                class="badge rounded-pill text-bg-{{ $b->status == 'Y' ? 'success' : 'warning' }}">{{ $b->status == 'Y' ? 'Tersedia' : 'Tidak Tersedia' }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('detil', ['type' => 'billboard', 'id' => $b->id]) }}"
                                                target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="bx bx-street-view"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade bg-putih p-4" id="nav-profile" role="tabpanel"
                    aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="col-md-12">
                        <table class="table table-striped" style="width:100%" id="tableJpo">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama/Lokasi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['jpo'] as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span class="fw-bold text-primary">{{ $b->nama }}</span> <br />
                                            {{ $b->lokasi }}
                                        </td>
                                        <td><img src="{{ asset('storage/' . $b->gambar) }}" width="200px"></td>
                                        <td>
                                            <span
                                                class="badge rounded-pill text-bg-{{ $b->status == 'Y' ? 'success' : 'warning' }}">{{ $b->status == 'Y' ? 'Tersedia' : 'Tidak Tersedia' }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('detil', ['type' => 'jpo', 'id' => $b->id]) }}"
                                                target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="bx bx-street-view"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade bg-putih p-4" id="nav-contact" role="tabpanel"
                    aria-labelledby="nav-contact-tab" tabindex="0">
                    <div class="col-md-12">
                        <table class="table table-striped" style="width:100%" id="tableLed">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama/Lokasi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['led'] as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span class="fw-bold text-primary">{{ $b->nama }}</span> <br />
                                            {{ $b->lokasi }}
                                        </td>
                                        <td><img src="{{ asset('storage/' . $b->gambar) }}" width="200px"></td>
                                        <td>
                                            <span
                                                class="badge rounded-pill text-bg-{{ $b->status == 'Y' ? 'success' : 'warning' }}">{{ $b->status == 'Y' ? 'Tersedia' : 'Tidak Tersedia' }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('detil', ['type' => 'led', 'id' => $b->id]) }}"
                                                target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="bx bx-street-view"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- kontak --}}
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Hubungi Kami</h2>
                <p>Untuk mendapatkan penawaran menarik dan terbaik, langsung hubungi kami. Staff terbaik kami siap
                    memberikan solusi terbaik yang Anda butuhkan.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Alamat Kantor</h3>
                                <p>Park Royal Regency Blok S2 No. 8 Buduran Sidoarjo</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>e-Mail</h3>
                                <p>saranamediaadv@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Telp./WhatsApp</h3>
                                <p><a
                                        href="https://wa.me/+6281331332061?text=Saya%20tertarik%20ingin%20menggunakan%20salah%20satu%20produk%20Anda">+6281331332061</a>
                                    / <a
                                        href="https://wa.me/+6282230402115?text=Saya%20tertarik%20ingin%20menggunakan%20salah%20satu%20produk%20Anda">+6282230402115</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- <div class="col-lg-6">
                    <form action="{{ route('sendEmail') }}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="col form-group">
                                <input type="text" name="nama" class="form-control" id="name"
                                    placeholder="Nama Anda" required>
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="e-Mail Anda" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Tentang" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="pesan" rows="5" placeholder="Pesan" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Pesan Anda telah terkirim. Terima Kasih!</div>
                        </div>
                        <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                    </form>
                </div> --}}

            </div>

        </div>
    </section>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#tableBill, #tableLed, #tableJpo');
    </script>
@endpush()
