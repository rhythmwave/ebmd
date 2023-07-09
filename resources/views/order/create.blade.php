<script src="{{ asset('assets') }}/js/dropzone-min.js"></script>
<script src="{{ asset('assets') }}/js/datatables.js"></script>
<link href="{{ asset('assets') }}/css/dropzone.css" rel="stylesheet" type="text/css" />
<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Permohonan Baru'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-100 border-radius-xl mt-4">
                <!-- <span class="mask  bg-gradient-primary  opacity-6"></span> -->
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <h3>Form Usulan Permohonan Penghapusan BMD</h3>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <!-- <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="true">
                                        <i class="material-icons text-lg position-relative">home</i>
                                        <span class="ms-1">App</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="false">
                                        <i class="material-icons text-lg position-relative">email</i>
                                        <span class="ms-1">Messages</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="false">
                                        <i class="material-icons text-lg position-relative">settings</i>
                                        <span class="ms-1">Settings</span>
                                    </a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                
                <form method='POST' action='{{ route('verify') }}'>
                    <div class="row gx-4 mb-2">
                        <div class="col-md-4 align-items-center">
                            <label class="form-label">Nomor Surat</label>
                            <input type="text" name="no-surat" class="form-control border border-2 p-2" value=''>
                        </div>
                        <div class="col-md-4 align-items-center">
                            <label class="form-label">Jenis</label>
                            <input type="text" name="jenis" class="form-control border border-2 p-2" value=''>
                        </div>
                        <div class="col-md-4 align-items-center">
                            <label class="form-label">Tanggal</label>
                            <input type="text" name="tanggal" class="form-control border border-2 p-2 datepicker" placeholder="Please select date"  value=''>
                        </div>
                    </div>
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-3">Upload Dokumen</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-3">
                        <!-- @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif -->
                            @csrf
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <label> Permohonan Pemindahtanganan BMD </label>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-secondary btn-sm">Download Format</button>
                                </div>
                                
                                <div class="col-md-5">
                                    <input name="file" type="file" />
                                    @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <label> SK Tim Peneliti Lingkup Perangkat Daerah </label>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-secondary btn-sm">Download Format</button>
                                </div>
                                
                                <div class="col-md-5">
                                    <input name="file" type="file" />
                                    @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <label> Berita Acara Penelitian Pemindahtanganan </label>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-secondary btn-sm">Download Format</button>
                                </div>
                                
                                <div class="col-md-5">
                                    <input name="file" type="file" />
                                    @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <label> Surat Pernyataan Kepemilikan BMD </label>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-secondary btn-sm">Download Format</button>
                                </div>
                                
                                <div class="col-md-5">
                                    <input name="file" type="file" />
                                    @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label> Lampiran Lain </label>
                                </div>
                                <div class="col-md-3">
                                    <!-- <button type="button" class="btn btn-secondary btn-sm">Download Format</button> -->
                                </div>
                                
                                <div class="col-md-5">
                                    <input name="file" type="file" />
                                    @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-3">Lampiran BMD yang diusulkan</h6>
                                </div>
                            </div>
                        </div>
                    
                        <div class="card-body p-3">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#home" class="nav-link" data-bs-toggle="tab">KIB A</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile" class="nav-link active" data-bs-toggle="tab">KIB B</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#messages" class="nav-link" data-bs-toggle="tab">KIB C</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#messages" class="nav-link" data-bs-toggle="tab">KIB D</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#messages" class="nav-link" data-bs-toggle="tab">KIB E</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="kib-a">
                                    <p>Home tab content ...</p>
                                </div>
                                <div class="tab-pane fade show active" id="kib-b">
                                    <table class="table table-bordered data-table" id="datatable-kibb">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Aset</th>
                                                <th>Tgl Perolehan</th>
                                                <th>Kondisi</th>
                                                <th>Last Update</th>
                                                <th width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="kib-c">
                                    <p>Messages tab content ...</p>
                                </div>
                                <div class="tab-pane fade" id="kib-d">
                                    <p>Messages tab content ...</p>
                                </div>
                                <div class="tab-pane fade" id="kib-e">
                                    <p>Messages tab content ...</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                                <div class="nav-wrapper position-relative end-0">
                                    <button id="save-draft" type="submit" class="btn bg-gradient-dark">Draft</button>
                                    <button id="save" type="submit" class="btn bg-gradient-dark">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>

<script type="text/javascript">
    $(function () {

        var table = $('#datatable-kibb').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('kibb.list') }}",
            columns: [
                {data: 'IDPemda', name: 'id'},
                {data: 'Nm_Aset5', name: 'name'},
                {data: 'Tgl_Perolehan', name: 'name'},
                {data: 'Kondisi', name: 'email'},
                {data: 'Tgl_Perolehan', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>