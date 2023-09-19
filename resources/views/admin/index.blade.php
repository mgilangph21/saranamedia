@extends('layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body fw-bold">Data Billboard</div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Tersedia</p>
                            <span class="badge bg-light text-dark">{{ $sum['bill'][0]->tersedia }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Tidak Tersedia</p>
                            <span class="badge bg-warning text-dark">{{ $sum['bill'][0]->tdk_tersedia }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Total</p>
                            <span class="badge bg-light text-dark">{{ $sum['bill'][0]->total }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body fw-bold ">Data LED</div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Tersedia</p>
                            <span class="badge bg-light text-dark">{{ $sum['led'][0]->tersedia }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Tidak Tersedia</p>
                            <span class="badge bg-warning text-dark">{{ $sum['led'][0]->tdk_tersedia }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Total</p>
                            <span class="badge bg-light text-dark">{{ $sum['led'][0]->total }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body fw-bold">Data JPO</div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Tersedia</p>
                            <span class="badge bg-light text-dark">{{ $sum['jpo'][0]->tersedia }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Tidak Tersedia</p>
                            <span class="badge bg-warning text-dark">{{ $sum['jpo'][0]->tdk_tersedia }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p>Total</p>
                            <span class="badge bg-light text-dark">{{ $sum['jpo'][0]->total }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Semua Data - Gambar
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatablesSimple">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tipe</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sum['data'] as $b)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('editBillboard', $b->id) }}">{{ $b->nama }}</a>
                                            </td>
                                            <td>{{ $b->lokasi }}</td>
                                            <td><img src="{{ asset('storage/' . $b->gambar) }}" class="img-thumbnail"
                                                    width="150px" />
                                            </td>
                                            <td>
                                                <span
                                                    class="badge rounded-pill bg-{{ $b->status == 'Y' ? 'success' : 'secondary' }}">{{ $b->status == 'Y' ? 'Tersedia' : 'Tidak Tersedia' }}</span>
                                            </td>
                                            <td>{{ $b->tipe }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger" id="btnHapus" type="button"
                                                    data-toggle="modal" data-target="#modalHapus"
                                                    data-hapus="{{ $b->id }}" data-nama="{{ $b->nama }}">
                                                    Hapus
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
@endsection
