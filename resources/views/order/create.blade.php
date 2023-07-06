<script src="{{ asset('assets') }}/js/dropzone-min.js"></script>
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
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
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
                            </ul>
                        </div>
                    </div>
                </div>
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
                        <input type="text" name="tanggal" class="form-control border border-2 p-2" value=''>
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
                        <form method='POST' action='{{ route('verify') }}'>
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

                            <div class="tab-content mt-5">
                                @foreach($courses as $count => $course)
                                    <div role="tabpanel" @if($count == 0) class="tab-pane active" @else class="tab-pane" @endif id="tab-{{$course->id}}">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div>
                                                <h2 class="text-center h3">{{ $course->title }}</h2>
                                                <p>{{ $course->description }}</p>
                                            </div>
                                            <table class="table">
                                                <tr>
                                                    <th>
                                                    </th>
                                                    <th>
                                                        <a href="{{ url('timetables/sort', ['asc']) }}">
                                                            <i class="fa fa-sort-asc" aria-hidden="true"></i>
                                                        </a>
                                                        Date
                                                        <a href="{{ url('timetables/sort', ['desc']) }}">
                                                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                                        </a>
                                                    </th>
                                                    <th>
                                                        {{ $course->startTime() }} to {{ $course->endTime() }} -
                                                        @if(Auth::user()->role === 'Admin')
                                                            <a href="/courses/{{ $course->id }}/edit">Update</a>
                                                        @endif
                                                    </th>
                                                    <th>Notes / Announcements:</th>
                                                </tr>

                                                @foreach($course->seminars as $table)
                                                <tr>
                                                    @if(Auth::user()->role === 'Admin')
                                                        @if($table->isDateEnabled)
                                                            <td><a href="/seminars/{{ $table->id }}/edit">Edit</a> </td>
                                                        @else

                                                        @endif
                                                    @endif
                                                    <th>
                                                        @if($table->isDateEnabled)
                                                            {{ $table->startDate() }}
                                                        @else
                                                            <td><a href="/seminars/{{ $table->id }}/edit">Add date</a> </td>
                                                        @endif
                                                    </th>
                                                    <td>{{ $table->title }}</td>
                                                    <td><i>{{ $table->note }}</i></td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn bg-gradient-dark">Submit</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
