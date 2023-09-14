@extends('public.master')
@push('css')
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
@section('content')
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
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                            cupiditate non provident</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <i class='bx bx-filter'></i>
                        <h4><a href="#">Jembatan Penyebrangan Orang (JPO)</a></h4>
                        <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                            tarad limino ata</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <i class='bx bx-tv'></i>
                        <h4><a href="#">Layar LED</a></h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur</p>
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['bill'] as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-bold text-primary">{{ $b->nama }}</td>
                                        <td>{{ $b->lokasi }}</td>
                                        <td>
                                            <span
                                                class="badge rounded-pill text-bg-{{ $b->status == 'Y' ? 'success' : 'warning' }}">{{ $b->status == 'Y' ? 'Tersedia' : 'Tidak Tersedia' }}</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary">
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['jpo'] as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-bold text-primary">{{ $b->nama }}</td>
                                        <td>{{ $b->lokasi }}</td>
                                        <td>
                                            <span class="badge rounded-pill text-bg-success">{{ $b->status }}</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary">
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['led'] as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-bold text-primary">{{ $b->nama }}</td>
                                        <td>{{ $b->lokasi }}</td>
                                        <td>
                                            <span class="badge rounded-pill text-bg-success">{{ $b->status }}</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary">
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
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6">

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
                                <p>+62 81 331 332 061 <br>+62 82 230 402 115</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col form-group">
                                <input type="text" name="name" class="form-control" id="name"
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
                            <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Pesan Anda telah terkirim. Terima Kasih!</div>
                        </div>
                        <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                    </form>
                </div>

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
