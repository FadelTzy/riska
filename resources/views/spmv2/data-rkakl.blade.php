@extends('layouts.appv2')

@push('prepend-style')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        #example {
            height: 60px;
            vertical-align: text-top;

        }
    </style>
@endpush

@section('title')
    {{ $page }} :: test
@endsection

@section('toolbar')
    <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack flex-wrap gap-2">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">{{ $judul ?? '-' }}
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-400 border-start mx-3"></span>
                    <!--end::Separator-->
                    <!--begin::Description-->
                    <small class="text-gray-500 fs-7 fw-semibold my-1">{{ $page }}</small>
                    <!--end::Description-->
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="#" class="btn btn-icon btn-color-primary bg-body w-35px h-35px w-lg-40px h-lg-40px me-3"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                    <span class="svg-icon svg-icon-2 svg-icon-md-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM11.7 17.7L16 14C16.4 13.6 16.4 12.9 16 12.5C15.6 12.1 15.4 12.6 15 13L11 16L9 15C8.6 14.6 8.4 14.1 8 14.5C7.6 14.9 8.1 15.6 8.5 16L10.3 17.7C10.5 17.9 10.8 18 11 18C11.2 18 11.5 17.9 11.7 17.7Z"
                                fill="currentColor" />
                            <path
                                d="M10.4343 15.4343L9.25 14.25C8.83579 13.8358 8.16421 13.8358 7.75 14.25C7.33579 14.6642 7.33579 15.3358 7.75 15.75L10.2929 18.2929C10.6834 18.6834 11.3166 18.6834 11.7071 18.2929L16.25 13.75C16.6642 13.3358 16.6642 12.6642 16.25 12.25C15.8358 11.8358 15.1642 11.8358 14.75 12.25L11.5657 15.4343C11.2533 15.7467 10.7467 15.7467 10.4343 15.4343Z"
                                fill="currentColor" />
                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
                <!--end::Button-->
                <!--begin::Button-->
                <a href="#" class="btn btn-icon btn-color-success bg-body w-35px h-35px w-lg-40px h-lg-40px me-3"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil005.svg-->
                    <span class="svg-icon svg-icon-2 svg-icon-md-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z"
                                fill="currentColor" />
                            <rect x="11" y="19" width="10" height="2" rx="1"
                                transform="rotate(-90 11 19)" fill="currentColor" />
                            <rect x="7" y="13" width="10" height="2" rx="1"
                                fill="currentColor" />
                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
                <!--end::Button-->
                <!--begin::Button-->
                <a href="#" class="btn btn-icon btn-color-warning bg-body w-35px h-35px w-lg-40px h-lg-40px me-3"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                    <span class="svg-icon svg-icon-2 svg-icon-md-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                                fill="currentColor" />
                            <rect x="7" y="17" width="6" height="2" rx="1"
                                fill="currentColor" />
                            <rect x="7" y="12" width="10" height="2" rx="1"
                                fill="currentColor" />
                            <rect x="7" y="7" width="6" height="2" rx="1"
                                fill="currentColor" />
                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
                <!--end::Button-->

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-fluid">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-docs-table-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Cari Jenis Akun" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
                        <button data-bs-toggle="modal" data-bs-target="#exampleLargeModal" class="btn btn-primary">Tambah
                            RKA-KL</button>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-6 " id="example">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>No</th>
                                <th>Tahun Anggaran</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Status Draft</th>
                                <th>Aksi</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->

                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <!--end::Post-->
    </div>
    <div class="modal fade" id="modaladdrevisi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form id="formrevisi" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" name="id" id="idr">
                        <label class="form-label">Nama</label>
                        <div class="input-group">
                            <input type="text" name="nama" id="namar" placeholder="" class="form-control" />

                        </div><!-- input-group -->

                        <br>
                        <label class="form-label">Tahun Anggaran</label>
                        <div class="input-group">
                            <input type="text"  id="tahunr"  name="tahun_anggaran" class="form-control"
                                 />
                        </div><!-- input-group -->

                        <br>
                        <label class="form-label">Tanggal</label>
                        <div class="input-group">
                            <input type="date" name="tanggal" placeholder="Input Tanggal" class="form-control" />
                        </div><!-- input-group -->

                        <br>
                        <label class="form-label">Keterangan</label>
                        <div class="input-group">
                            <input type="text" name="keterangan" id="keteranganr" placeholder="Input Keterangan"
                                class="form-control" />
                        </div><!-- input-group -->

                        <br>
                        <label class="form-label">Status Aktivasi</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="status_aktivasi" type="checkbox" value="1"
                                id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" id="onoff" for="flexSwitchCheckChecked">Aktif</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btnrevisi" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="tambahdata" class=" form-horizontal form-bordered">
                        @csrf
                        <label class="form-label">Nama</label>
                        <div class="input-group">
                            <input type="text" name="nama" placeholder="" class="form-control" />

                        </div><!-- input-group -->

                        <br>
                        <label class="form-label">Tahun Anggaran</label>
                        <div class="input-group">
                            <input id="tahun" required autocomplete="off" name="tahun_anggaran" class="form-control"
                                data-provide="datepicker" placeholder="Year" data-date-format="dd-m-yyyy" />

                        </div><!-- input-group -->

                        <br>
                        <label class="form-label">Tanggal</label>
                        <div class="input-group">
                            <input type="date" name="tanggal" placeholder="Input Tanggal" class="form-control" />

                        </div><!-- input-group -->

                        <br>
                        <label class="form-label">Keterangan</label>
                        <div class="input-group">
                            <input type="text" name="keterangan" placeholder="Input Keterangan"
                                class="form-control" />
                        </div><!-- input-group -->

                        <br>
                        <label class="form-label">Status Aktivasi</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="status_aktivasi" type="checkbox" value="1"
                                id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" id="onoff" for="flexSwitchCheckChecked">Aktif</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="submitbtn" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleLargeModalu" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="editdata" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" name="id" id="idu">
                        <br>

                        <label class="form-label">Nama</label>
                        <div class="input-group">
                            <input type="text" id="namau" name="nama" placeholder="Input Nama"
                                class="form-control" />

                        </div><!-- input-group -->


                        <br>
                        <label class="form-label">Tahun Anggaran</label>
                        <div class="input-group">
                            <input id="tahunu" disabled required autocomplete="off" name="tahun_anggaran"
                                class="form-control" data-provide="datepicker" placeholder="Year"
                                data-date-format="dd-m-yyyy" />

                        </div><!-- input-group -->

                        <br>
                        <label class="form-label">Tanggal</label>
                        <div class="input-group">
                            <input type="date" name="tanggal" id="tanggalu" placeholder="Input Tanggal"
                                class="form-control" />

                        </div><!-- input-group -->

                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="submitbtnu" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- toast --}}
    <!--begin::Toast-->
    <div class="modal fade" id="modalRevisi"  tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Riwayat Revisi <span id="anu"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button data-bs-toggle="modal" data-bs-target="#modaladdrevisi" class="btn btn-primary">Revisi</button>
                    <table class="table align-middle table-sm table-row-dashed fs-6 gy-6 " id="exampleRevisi">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Status Draft</th>
                                <th>Aktivasi</th>
                                <th>Aksi</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        <div id="liveToast" class="toast bg-success text-white" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notifikasi</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Berhasil Menambah Data
            </div>
        </div>
    </div>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        <div id="liveToastErr" class="toast bg-danger text-white" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notifikasi</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Gagal Menambah Data
            </div>
        </div>
    </div>
    <!--end::Toast-->
@endsection


@push('prepend-script')
@endpush

@push('addon-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ">
    </script>
    <script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
    <script>
        var tabel;
        var url = window.location.origin;
        var toastLiveExample = document.getElementById('liveToast')
        var toastErr = document.getElementById('liveToastErr')
       
        function toastFun(type) {
            var toast;

            if (type == 1) {
                toast = new bootstrap.Toast(toastLiveExample);
                toast.show();
            } else {
                toast = new bootstrap.Toast(toastErr);
                toast.show();
            }
        }

        $(document).ready(function() {
            tabel = $("#example").DataTable({
                scrollY: false,

                columnDefs: [{
                        targets: 0,
                        width: "1%",
                    },
                    {
                        targets: 1,
                        width: "15%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "20%",

                    },
                    {
                        orderable: false,

                        targets: 3,
                        width: "15%",

                    },
                    {
                        orderable: false,

                        targets: 4,
                        width: "10%",

                    },
                    {
                        orderable: false,

                        targets: 5,
                        width: "20%",

                    },


                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('rkakl.indexv2') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    },
                    {
                        nama: 'namanya',
                        data: 'namanya'
                    },
                    {
                        nama: 'tanggalnya',
                        data: 'tanggalnya'
                    },
                    {
                        nama: 'ketarangannya',
                        data: 'ketarangannya'
                    },


                    {
                        nama: 'statusdraftnya',
                        data: 'statusdraftnya'
                    },
                    {
                        name: 'aksi',
                        data: 'aksi',
                    }
                ],

            });
            const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
            filterSearch.addEventListener('keyup', function(e) {
                tabel.search(e.target.value).draw();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('')
                }
            });
            $('[name="startDate"]').flatpickr({
                enableTime: !0,
                dateFormat: "d-m-Y"
            });
            $('[name="endDate"]').flatpickr({
                enableTime: !0,
                dateFormat: "d-m-Y"
            });
        });

        function staffdel(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/rkakl/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            toastFun(1)
                            tabel.ajax.reload();

                        } else {
                            toastFun(2)
                        }

                    }
                })

            }
        }
        function delrev(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/data-rkakl/revisi/' + id,
                    type: "delete",
                    success: function(e) {
                        tabel.ajax.reload();
                        table.ajax.reload();

                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            toastFun(1)

                        } else {
                            toastFun(2)
                        }

                    }
                })

            }
        }
        function staffcheck(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/rkakl-check/' + id,
                    type: "get",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            toastFun(1)
                            tabel.ajax.reload();

                        } else {

                            toastFun(2)
                        }

                    }
                })

            }
        }
        $("#btnrevisi").on('click', function() {
            $("#formrevisi").trigger('submit');
        });
        
        $("#formrevisi").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('revisi.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#tambahdata").trigger('reset');
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        console.log(elem)
                        toastFun(2)
                    } else {
                        $('#modaladdrevisi').modal('hide');
                        toastFun(1);

                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#submitbtn").on('click', function() {
            $("#tambahdata").trigger('submit');
        });

        $("#tambahdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('rkakl.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#tambahdata").trigger('reset');
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        console.log(elem)
                        toastFun(2)
                    } else {
                        $('#exampleLargeModal').modal('hide');
                        toastFun(1);

                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#submitbtnu").on('click', function() {
            $("#editdata").trigger('submit');
        });
        $("#editdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/rkakl/edit') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    $.LoadingOverlay("hide");
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div ><u>';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        toastFun(2);

                    } else {
                        toastFun(1);
                        $('#exampleLargeModalu').modal('hide');

                        tabel.ajax.reload();

                    }
                }
            })


        })

        function staffupd(id) {
            $('#exampleLargeModalu').modal('show');
            $("#idu").val(id.id);
            $("#namau").val(id.nama);
            $("#tahunu").val(id.tahun_anggaran);
            $("#tanggalu").val(id.tgl_cetak);
        }
        var table;

        function revisi(id) {
            console.log(id);
            $("#modalRevisi").modal('show');
            $("#idr").val(id.id)
            $("#namar").val(id.nama);
            $("#tahunr").val(id.tahun_anggaran)
            if ($.fn.DataTable.isDataTable("#exampleRevisi")) {
                $('#exampleRevisi').DataTable().clear().destroy();
            }
            table = $("#exampleRevisi").DataTable({
                scrollY: false,

                columnDefs: [{
                        targets: 0,
                        width: "1%",
                    },
                    {
                        targets: 1,
                        width: "15%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "20%",

                    },
                    {
                        orderable: false,

                        targets: 3,
                        width: "15%",

                    },
                    {
                        orderable: false,

                        targets: 4,
                        width: "10%",

                    },
                    {
                        orderable: false,

                        targets: 5,
                        width: "20%",

                    },
                    {
                        orderable: false,

                        targets: 6,
                        width: "20%",

                    },


                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('rkakl/data-rkakl/revisi') }}" + '/' + id['id'],
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    },
                    {
                        nama: 'nama',
                        data: 'nama'
                    },
                    {
                        nama: 'tanggalnya',
                        data: 'tanggalnya'
                    },
                    {
                        nama: 'keterangan',
                        data: 'keterangan'
                    },


                    {
                        nama: 'statusdraftnya',
                        data: 'statusdraftnya'
                    },
                    {
                        nama: 'statusnya',
                        data: 'statusnya'
                    },
                    {
                        name: 'aksi',
                        data: 'aksi',
                    }
                ],

            });
        }
        function aktivasirevisi(id) {
            console.log(id);
            $.LoadingOverlay("show");
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url: '{{ url('rkakl/data-rkakl/status-revisi') }}',
                data: {
                    id: id.id,
                    idrk : id.id_rkakl
                },
                type: "POST",
            
                success: function(id) {
                    $.LoadingOverlay("hide");
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div ><u>';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        toastFun(2);

                    } else {
                        toastFun(1);
                        $('#exampleLargeModalu').modal('hide');
                        tabel.ajax.reload();

                        table.ajax.reload();

                    }
                }
            })
            
        }
        // $('#tahun').datepicker({
        //     format: "yyyy",
        //     viewMode: "years",
        //     minViewMode: "years"
        // });
    </script>
@endpush
