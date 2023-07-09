<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
        <!--  -->
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Permohonan"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">List Usulan Permohonan Penghapusan Anda</h6>
                                </div>
                            </div>
                            <div class=" me-3 my-3 text-end">
                                <a id="new" class="btn bg-gradient-dark mb-0" href="{{ route('order.create') }}"><i
                                        class="material-icons text-sm">add</i>&nbsp;&nbsp;Buat Permohonan</a>
                            </div>
                            {{ $dataTable->table() }}
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <!-- <table class="table align-items-center mb-0" id="order-list">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Nomor Ticket</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Nomor Surat</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Jenis</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Tanggal Permohonan</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Status Permohonan</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Last Update</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-left text-left text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">TX-00</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">000.2.8392./Bid/BMD</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">Pemusnahan</span>
                                                </td>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-sm bg-gradient-success">Dokumen Sudah Sesuai</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="javascript:;"
                                                        class="btn text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        <span class="badge badge-sm bg-gradient-info">Details</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-left text-left text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">TX-00</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">000.2.8392./Bid/BMD</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">Lelang</span>
                                                </td>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-sm bg-gradient-danger">Dokumen Tidak Sesuai</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="javascript:;"
                                                        class="btn text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        <span class="badge badge-sm bg-gradient-info">Details</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-left text-left text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">TX-00.0120123/123</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">000.2.8392./Bid/BMD</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">Hibah</span>
                                                </td>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">23/04/19</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-sm bg-gradient-warning">Belum Upload Dokumen</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/20</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="javascript:;"
                                                        class="btn text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        <span class="badge badge-sm bg-gradient-info">Details</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-left text-left text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">TX-00.0120123/123</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">000.2.8392./Bid/BMD</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">Hibah</span>
                                                </td>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">23/04/19</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-sm bg-gradient-secondary">Verifikasi Internal SKPD</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/20</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="javascript:;"
                                                        class="btn text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        <span class="badge badge-sm bg-gradient-info">Details</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-left text-left text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">TX-00.0120123/123</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">000.2.8392./Bid/BMD</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">Lelang</span>
                                                </td>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">23/04/19</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-sm bg-gradient-secondary">Verifikasi Penatausahaan BMD</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/20</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="javascript:;"
                                                        class="btn text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        <span class="badge badge-sm bg-gradient-info">Details</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-left text-left text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">TX-00.0120123/123</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">000.2.8392./Bid/BMD</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">Hibab</span>
                                                </td>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">23/04/19</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-sm bg-gradient-secondary">Proses Penghapusan</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">23/04/20</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="javascript:;"
                                                        class="btn text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        <span class="badge badge-sm bg-gradient-info">Details</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>
        {{ $dataTable->scripts() }}
</x-layout>