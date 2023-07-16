<style>
    .toast {
        width: 100% !important;
    }
    .bg-gradient-info {
        background-image: linear-gradient(195deg, #66BB6A 0%, #43A047 100%) !important;
    }
</style>
<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
        <!--  -->
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Permohonan"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                @if(session()->has('Success'))
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-lg-8 col-sm-6 col-12">
                        <div class="toast fade hide p-2 bg-gradient-info" role="alert" aria-live="assertive" id="successToast"
                        aria-atomic="true">
                            <div class="toast-header bg-transparent border-0">
                                <i class="material-icons text-white me-2">
                                    check
                                </i>
                                <span class="me-auto text-white font-weight-bold">Berhasil Mengajukan Permohonan</span>
                                <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast"
                                    aria-label="Close"></i>
                            </div>
                            <hr class="horizontal  dark m-0">
                            <div class="toast-body text-white">
                                Ticket berhasil di buat dan sedang dalam pengecekan oleh tim verifikator!
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                @endif
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
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                {{ $dataTableOrders->table(['id'=>'dataTableOrders','class' =>'table table-striped']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>
        @if(session()->has('Success'))
        <script type="text/javascript">
            $( document ).ready(function() {
                $("#successToast").toast("show");
            });
        </script>        
        @endif
        {{ $dataTableOrders->scripts() }}
</x-layout>