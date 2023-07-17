<script src="{{ asset('assets') }}/js/dropzone-min.js"></script>
<!-- <script src="{{ asset('assets') }}/js/datatables.js"></script> -->
<link href="{{ asset('assets') }}/css/dropzone.css" rel="stylesheet" type="text/css" />
<style>
    .nav-tabs {
        border-bottom: 1px solid #336855 !important;
    }
    .nav-tabs .nav-link.active{
        color: #fff !important;
        background-color: #336855 !important;
        border-color: #dee2e6 #dee2e6 #fff !important;
    }
    .nav-link {
        color: #888 !important;
    }
    .page-item.active .page-link {
        background-color: #336855 !important;
        border-color: #336855 !important;
    }
</style>

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
                
                <form method='POST' action="{{ route('order.store') }}" enctype="multipart/form-data">
                    <div class="row gx-4 mb-2">
                        <div class="col-md-2 align-items-center">
                            <label class="form-label">Nomor Surat</label>
                            <input type="text" name="nosurat" class="form-control border border-2 p-2" value="{{ @$dataOrder['order']->code }}">
                        </div>
                        <div class="col-md-2 align-items-center">
                            <label class="form-label">Jenis</label>
                            <select id="detail-type" name="jenis" class="form-control border border-2 p-2">
                                <option  value="" disabled selected>Pilih Jenis Permohonan</option>
                                @foreach ($listJenis as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 align-items-center">
                            <label class="form-label">Tanggal</label>
                            <input id="tgl-select" type="text" name="tanggal" class="form-control border border-2 p-2 datepicker" placeholder="Please select date"  value="{{ @$dataOrder['order']->created_at }}">
                        </div>
                        <div class="col-md-2 align-items-center">
                            <label class="form-label">Nama Pengusul</label>
                            <input id="tgl-select" type="text" name="tanggal" class="form-control border border-2 p-2 datepicker" placeholder="Please select date"  value=''>
                        </div>
                        <div class="col-md-2 align-items-center">
                            <label class="form-label">SKPD</label>
                            <input id="tgl-select" type="text" name="tanggal" class="form-control border border-2 p-2 datepicker" placeholder="Please select date"  value=''>
                        </div>
                    </div>
                    <div class="card card-plain h-100">
                        <!-- <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-3">Upload Dokumen</h6>
                                </div>
                            </div>
                        </div> -->                        
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
                                    <a href="#kib-a" class="nav-link" data-ttable="dataTableKIBA" data-bs-toggle="tab">KIB A</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#kib-b" class="nav-link active" data-ttable="dataTableKIBB" data-bs-toggle="tab">KIB B</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#kib-c" class="nav-link" data-ttable="dataTableKIBC" data-bs-toggle="tab">KIB C</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#kib-d" class="nav-link" data-ttable="dataTableKIBD" data-bs-toggle="tab">KIB D</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#kib-e" class="nav-link" data-ttable="dataTableKIBE" data-bs-toggle="tab">KIB E</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="kib-a">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Rusak Berat | ( text deskripsi aset KIB A) </h6>
                                    </div>
                                    {{ $kibaTable->table(['id'=>'dataTableKIBA','class' =>'table table-striped']) }}
                                </div>
                                <div class="tab-pane fade show active" id="kib-b">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Rusak Berat | Aset Perlatan & Mesin</h6>
                                    </div>
                                    {{ $dataTableKIBB->table(['id'=>'dataTableKIBB','class' =>'table table-striped']) }}
                                    <table id='test-table'></table>
                                </div>
                                <div class="tab-pane fade" id="kib-c">                                    
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Rusak Berat | ( text deskripsi aset KIB C) </h6>
                                    </div>
                                    {{ $kibcTable->table(['id'=>'dataTableKIBC','class' =>'table table-striped']) }}
                                </div>
                                <div class="tab-pane fade" id="kib-d">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Rusak Berat | ( text deskripsi aset KIB D) </h6>
                                    </div>
                                    {{ $kibdTable->table(['id'=>'dataTableKIBD','class' =>'table table-striped']) }}
                                </div>
                                <div class="tab-pane fade" id="kib-e">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Rusak Berat | ( text deskripsi aset KIB E) </h6>
                                    </div>
                                    {{ $kibeTable->table(['id'=>'dataTableKIBE','class' =>'table table-striped']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                    <button type="button" class="btn btn-secondary btn-lg">Download Format</button>
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
                                    
                                </div>
                                <div class="col-md-5">
                                    <input name="dokumen[1][doc]" type="file" />
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
                                    
                                </div>
                                
                                <div class="col-md-5">
                                    <input name="dokumen[2][doc]" type="file" />
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
                                    <!-- <button type="button" class="btn btn-secondary btn-sm">Download Format</button> -->
                                </div>
                                
                                <div class="col-md-5">
                                    <input name="dokumen[3][doc]" type="file" />
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
                                    
                                </div>
                                
                                <div class="col-md-5">
                                    <input name="dokumen[4][doc]" type="file" />
                                    @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <label> Lampiran BMD yang diusulkan </label>
                                </div>
                                <div class="col-md-3">
                                    
                                </div>
                                
                                <div class="col-md-5">
                                    <input name="dokumen[11][doc]" type="file" />
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
                                    
                                </div>
                                
                                <div class="col-md-5">
                                    <input name="dokumen[5][doc]" type="file" />
                                    @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                <button id="save-draft" type="button" class="btn bg-gradient-dark">Draft</button>
                                <button id="save" type="submit" class="btn bg-gradient-dark">Submit</button>
                            </div>
                        </div>
                    </div>
                
                </form>
                </div>
            </div>
            {{ $dataTableKIBB->scripts() }}
            <!-- {{ $kibaTable->scripts() }} -->
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>

<script type="text/javascript">
    $( document ).ready(function() {

        //select
        $('#detail-type').val("{{ @$dataOrder['order']->order_type_id }}").change();

        //date
        $('#tgl-select').flatpickr();

        //submit draft
        $("#save-draft").on('click',function(e){
            
            $("<input type='hidden' value='draft' name='submit_type' />").appendTo('form');
            $('form').submit();
        });

        //define datatable
        //kiba
        var kiba = $("#dataTableKIBA").DataTable({
            "serverSide":true,
            "processing":true,
            "deferLoading":false,
            "columns":[
                {"data":"selection","name":"","title":"","orderable":false,"searchable":true},
                {"data":"Kd_Barang","name":"Kode Barang","title":"Kode Barang","orderable":false,"searchable":true},
                {"data":"Nm_Aset5","name":"Nama Aset","title":"Nama Aset","orderable":false,"searchable":true},
                {"data":"Tgl_Perolehan","name":"Tgl Perolehan","title":"Tgl Perolehan","orderable":false,"searchable":true},
                {"data":"Kondisi","name":"Kondisi","title":"Kondisi","orderable":false,"searchable":true},
                {"data":"Tgl_Perolehan","name":"Last Update","title":"Last Update","orderable":false,"searchable":true},
                {"data":"action","name":"Action","title":"Action","orderable":false,"searchable":false}
            ],
            "dom":"tip",
            "select":{"style":"single"}
        });
        //define datatable
        //kiba
        var kibc = $("#dataTableKIBC").DataTable({
            "serverSide":true,
            "processing":true,
            "deferLoading":false,
            "columns":[
                {"data":"selection","name":"","title":"","orderable":false,"searchable":true},
                {"data":"Kd_Barang","name":"Kode Barang","title":"Kode Barang","orderable":false,"searchable":true},
                {"data":"Nm_Aset5","name":"Nama Aset","title":"Nama Aset","orderable":false,"searchable":true},
                {"data":"Tgl_Perolehan","name":"Tgl Perolehan","title":"Tgl Perolehan","orderable":false,"searchable":true},
                {"data":"Kondisi","name":"Kondisi","title":"Kondisi","orderable":false,"searchable":true},
                {"data":"Tgl_Perolehan","name":"Last Update","title":"Last Update","orderable":false,"searchable":true},
                {"data":"action","name":"Action","title":"Action","orderable":false,"searchable":false}
            ],
            "dom":"tip",
            "select":{"style":"single"}
        });
        //define datatable
        //kiba
        var kibd = $("#dataTableKIBD").DataTable({
            "serverSide":true,
            "processing":true,
            "deferLoading":false,
            "columns":[
                {"data":"selection","name":"","title":"","orderable":false,"searchable":true},
                {"data":"Kd_Barang","name":"Kode Barang","title":"Kode Barang","orderable":false,"searchable":true},
                {"data":"Nm_Aset5","name":"Nama Aset","title":"Nama Aset","orderable":false,"searchable":true},
                {"data":"Tgl_Perolehan","name":"Tgl Perolehan","title":"Tgl Perolehan","orderable":false,"searchable":true},
                {"data":"Kondisi","name":"Kondisi","title":"Kondisi","orderable":false,"searchable":true},
                {"data":"Tgl_Perolehan","name":"Last Update","title":"Last Update","orderable":false,"searchable":true},
                {"data":"action","name":"Action","title":"Action","orderable":false,"searchable":false}
            ],
            "dom":"tip",
            "select":{"style":"single"}
        });
        //define datatable
        //kiba
        var kibe = $("#dataTableKIBE").DataTable({
            "serverSide":true,
            "processing":true,
            "deferLoading":false,
            "columns":[
                {"data":"selection","name":"","title":"","orderable":false,"searchable":true},
                {"data":"Kd_Barang","name":"Kode Barang","title":"Kode Barang","orderable":false,"searchable":true},
                {"data":"Nm_Aset5","name":"Nama Aset","title":"Nama Aset","orderable":false,"searchable":true},
                {"data":"Tgl_Perolehan","name":"Tgl Perolehan","title":"Tgl Perolehan","orderable":false,"searchable":true},
                {"data":"Kondisi","name":"Kondisi","title":"Kondisi","orderable":false,"searchable":true},
                {"data":"Tgl_Perolehan","name":"Last Update","title":"Last Update","orderable":false,"searchable":true},
                {"data":"action","name":"Action","title":"Action","orderable":false,"searchable":false}
            ],
            "dom":"tip",
            "select":{"style":"single"}
        });
        
        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href"); // activated tab
            var targetTable = $('#'+$(this).data('ttable')).DataTable();
            if ($(this).attr("href") == "#kib-a"){
                targetTable.ajax.url("{{ route('order.datakiba') }}").load();
            }else if($(this).attr("href") == "#kib-b"){
                targetTable.ajax.url("{{ route('order.datakibb') }}").load();
            }else if($(this).attr("href") == "#kib-c"){
                targetTable.ajax.url("{{ route('order.datakibc') }}").load();
            }else if($(this).attr("href") == "#kib-d"){
                targetTable.ajax.url("{{ route('order.datakibd') }}").load();
            }else if($(this).attr("href") == "#kib-e"){
                targetTable.ajax.url("{{ route('order.datakibe') }}").load();
            }
            
        });
        
        $('#dataTableKIBB').find('tbody').on('click','tr input[type=checkbox]',function(e) {
            // Get the current row
            var row = $(this).closest('tr').find('td:eq(6)');
                if ($(this).is(':checked')){
                    $(row).find('input').attr('type','file');
                }else{
                    $(row).find('input').attr('type','hidden');
                }
            alert(row.text());
        });
    });
</script>