@extends('layouts.appv2')

@push('prepend-style')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
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
                <a href="#" class="pl-1 btn btn-white btn-sm">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                    Kegiatan & KRO
                    <!--end::Svg Icon-->
                </a>
                <a href="#" class="pl-1 btn btn-info btn-sm">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                    RO
                    <!--end::Svg Icon-->
                </a>
                <a href="#" class="pl-1 btn btn-success btn-sm">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                    Komponen
                    <!--end::Svg Icon-->
                </a>
                <a href="#" class="pl-1 btn btn-primary btn-sm">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                    Subkomponen
                    <!--end::Svg Icon-->
                </a>
                <!--end::Button-->
                <!--begin::Button-->


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
            <div class="card card-flush pt-3 mb-1 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="fw-bold">RINCIAN KERTAS KERJA SATKER T.A. {{ $dr->tahun_anggaran }}</h2>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <a href="add.html" class="btn btn-sm btn-primary">Edit</a>

                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-3">
                    <!--begin::Section-->
                    <div class="mb-0">
                        <!--begin::Title-->
                        <h3 class="fw-bold"> Status : {{ $dr->revici->keterangan }}</h3>

                        <!--end::Title-->
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap py-5">
                            <!--begin::Row-->
                            <div class="flex-equal me-5">
                                <!--begin::Details-->
                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">KEMEN/LEMB:</td>
                                        <td class="text-gray-800 min-w-200px">
                                            (023) ................KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN
                                        </td>
                                    </tr>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">UNIT ORG:</td>
                                        <td class="text-gray-800">(17) ...................DITJEN PENDIDIKAN TINGGI</td>
                                    </tr>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">UNIT KERJA:</td>
                                        <td class="text-gray-800">(677523) ......... UNIVERSITAS NEGERI MAKASSAR</td>
                                    </tr>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">ALOKASI:</td>
                                        <td class="text-gray-800" id="rupiahnya">Rp. </td>
                                    </tr>
                                    <!--end::Row-->
                                </table>
                                <!--end::Details-->
                            </div>
                            <!--end::Row-->

                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Section-->

                </div>
                <!--end::Card body-->
            </div>
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
                                class="form-control form-control-solid w-250px ps-14" placeholder="Cari Data" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
                        <button @if ($dr->revici->status_draft == 2)
                            disabled
                        @endif data-bs-toggle="modal" data-bs-target="#exampleLargeModal" class="btn btn-primary">RAB
                            Kegiatan</button>
                        <button onclick="singgar({{ Request::segment(3) }},{{$dr->revici->id}})" class="btn ml-2 btn-warning">Singgar</button>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table table-hover table-sm table-bordered align-middle table-row-dashed fs-6 gy-5"
                        id="example">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>Kode</th>
                                <th>Kegiatan</th>
                                <th>Volume</th>
                                <th>Jumlah Biaya</th>
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


    <!--end::Toast-->
    <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah RAB Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrabkegiatan" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{ Request::segment(3) }}" name="id_rkakl">
                        <input type="hidden" value="{{ $dr->revici->id }}" name="id_revisi">

                        <input type="hidden" name="rke" id="rke">
                        <input type="hidden" name="rkr" id="rkr">

                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Kegiatan</label>
                                <div class="input-group">
                                    <select name="kegiatan" class="form-control" id="kegiatan">
                                        <option disabled selected>Pilih Kegiatan</option>
                                        @foreach ($kegiatan as $i)
                                            <option data-kro="{{ $i->kroitem }}" value="{{ $i->id }}">
                                                {{ $i->kode }} - {{ $i->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><!-- input-group -->

                                <br>
                                <label class="form-label">KRO</label>
                                <div class="input-group">
                                    <select name="kro" class="form-control" id="kro">
                                        <option disabled selected>Pilih KRO</option>
                                    </select>
                                </div><!-- input-group -->
                                <br>

                            </div>


                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                    <button id="btnrabkegiatan" type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah RAB RO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrabro" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{ Request::segment(3) }}" name="id_rkakl">
                        <input type="hidden" value="{{ $dr->revici->id }}" name="id_revisi">

                        <input type="hidden" name="rro" id="rro">
                        <input type="hidden" name="id_rab_kekro" id="id_rab_kekro">

                        <div class="row">
                            <div class="col-md-12">

                                <label class="form-label">RO</label>
                                <div class="input-group">
                                    <select name="ro" class="form-control" id="ro">
                                        <option disabled selected>Pilih RO</option>
                                    </select>
                                </div><!-- input-group -->
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                    <button id="btnrabro" type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalkomponen" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah RAB Komponen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrabkom" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{ Request::segment(3) }}" name="id_rkakl">
                        <input type="hidden" value="{{ $dr->revici->id }}" name="id_revisi">

                        <input type="hidden" name="rkom" id="rkom">
                        <input type="hidden" name="id_rab_ro" id="id_rab_ro">

                        <div class="row">
                            <div class="col-md-12">

                                <label class="form-label">Komponen</label>
                                <div class="input-group">
                                    <select name="komponen" class="form-control" id="komponen">
                                        <option disabled selected>Pilih Komponen</option>
                                    </select>
                                </div><!-- input-group -->
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                    <button id="btnrabkom" type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalsubkomponen" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah RAB Subkomponen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrabsubkom" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{ Request::segment(3) }}" name="id_rkakl">
                        <input type="hidden" value="{{ $dr->revici->id }}" name="id_revisi">

                        <input type="hidden" name="rkodekom" id="rkodekom">
                        <input type="hidden" name="rnamakom" id="rnamakom">
                        <input type="hidden" name="id_rab_kom" id="id_rab_kom">

                        <div class="row">
                            <div class="col-md-12">

                                <label class="form-label">Subkomponen</label>
                                <div class="input-group">
                                    <select name="subkomponen" class="form-control" id="subkomponen">
                                        <option disabled selected>Pilih Subkomponen</option>
                                    </select>
                                </div><!-- input-group -->
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                    <button id="btnrabsubkom" type="button" class="btn btn-primary">Simpan</button>
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

                    <form id="editdata" class="form-sm form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" name="id" id="idu">

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Kegiatan</label>
                                <div class="input-group">
                                    <select name="kegiatan" class="form-control" id="kegiatanu">
                                        <option disabled selected>Pilih Kegiatan</option>
                                        @foreach ($kegiatan as $i)
                                            <option data-kro="{{ $i->kroitem }}" value="{{ $i->id }}">
                                                {{ $i->kode }}
                                                {{ $i->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><!-- input-group -->

                                <br>
                                <label class="form-label">KRO</label>
                                <div class="input-group">
                                    <select name="kro" class="form-control" id="krou">
                                        <option disabled selected>Pilih KRO</option>
                                    </select>
                                </div><!-- input-group -->


                            </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="submitbtnu" type="button" class="btn btn-primary">Save</button>
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
        var toast;
        var disabler = "{{$dr->revici->status_draft}}";
        var toastLiveExample = document.getElementById('liveToast')
        var toastErr = document.getElementById('liveToastErr')

        function singgar(id,idr) {
            $.LoadingOverlay("show");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('singgar') }}',
                data: {
                    id: id,
                    idr : idr
                },
                type: "POST",
                success: function(id) {
                    toastFun(1);

                    console.log(id,'iniiiiiiiiiiiii');
                    $.LoadingOverlay("hide");
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
                        toastFun(2);
                    } else {
                        toast = new bootstrap.Toast(toastLiveExample);
                        toast.show();
                        tabel.ajax.reload();

                    }
                }
            })
        }

        function toastFun(type) {

            if (type == 1) {
                toast = new bootstrap.Toast(toastLiveExample);
                toast.show();
            } else {
                toast = new bootstrap.Toast(toastErr);
                toast.show();
            }
        }

        function addRo(id) {
            var data = id.kror.roitem;
            console.log(id);
            var html = '<option disabled selected>Pilih RO</option>';
            data.forEach((id) => {
                html +=
                    `<option value="${id.id}"> ${id.kode} - ${id.nama}</option>`;
            });
            $("#ro").html(html);
            $("#id_rab_kekro").val(id.id);
            $('#modalro').modal('show');
        }
        $("#ro").on('change', function() {
            var v = $("#ro option:selected").text();
            $("#rro").val(v);
        })
        //form dan btn rab ro
        $("#btnrabro").on('click', function() {
            $("#formrabro").trigger('submit');
        });
        $("#formrabro").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('rabro.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#formrabkegiatan").trigger('reset');
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
                        toastFun(2);
                    } else {
                        $('#modalro').modal('hide');
                        toastFun(1);

                        tabel.ajax.reload();

                    }
                }
            })


        })
        //del ro
        function delro(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/rkakl/data-rkakl/ro/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            toastFun(1);

                            tabel.ajax.reload();

                        } else {

                            toastFun(2);
                        }

                    }
                })

            }
        }

        $("#kegiatan").on('change', function() {
            var v = $("#kegiatan option:selected").text();
            $("#rke").val(v);
            var el = $("#kegiatan :selected")
            var jsonData = JSON.parse(el[0]['dataset']['kro']);
            var html = '<option disabled selected>Pilih KRO</option>';
            jsonData.forEach((id) => {
                html +=
                    `<option data-ro='${JSON.stringify(id.roitem)}' value="${id.id}"> ${id.kode} - ${id.nama}</option>`;
            });

            $("#kro").html(html);
        })
        $("#kro").on('change', function() {
            var v = $("#kro option:selected").text();
            $("#rkr").val(v);
        })
        $("#kegiatanu").on('change', function() {
            var el = $("#kegiatanu :selected")
            var jsonDataku = JSON.parse(el[0]['dataset']['kro']);
            var html = '<option disabled selected>Pilih KRO</option>';
            jsonDataku.forEach((id) => {
                html +=
                    `<option data-ro='${JSON.stringify(id.roitem)}' value="${id.id}"> ${id.nama}</option>`;
            });

            $("#krou").html(html);
        })

        function format(d) {
            console.log(d);
            // `d` is the original data object for the row
            var datarow = '';

            var nokro = 1;

            d['m_ro'].forEach((id, key) => {
                var datarr = id;
                datarow += `<tr data-pos='${nokro}' id='dataro-${nokro}' data-last='${((d['m_ro'].length - 1) == key  ) ? "1" : "0"}' data-bab='${JSON.stringify(id)}' class='table-info table-sm' > 
                    <td class='pt-1 pb-1' colspan='1'> &nbsp&nbsp&nbsp&nbsp ${d['kegiatanr']['kode']}.${d['kror']['kode']}.${id['ror']['kode']} </td>

                    <td class='pt-1 pb-1' colspan='2'> ${id['ror']['nama']} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['biaya'])} </td>

                    <td class='pt-1 pb-1'>   <ul class='list-inline mb-0'>
                 
              
                    <li class='list-inline-item'>
                        <button class='btn btn-sm btn-info lihatkomponen'> <i class='fa fa-arrow-down'>  </i> </button>

                        <button type='button' data-toggle='modal' onclick='updkro("${id['nama_ro']}","${id['biaya']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'> </i>  </button>

                    <button type='button'  onclick='delro("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash-alt'> </i> </button>
                    <button type='button' ${disabler == 2 ? 'disabled' : ''} onclick='addkomponen("${id['id']}",${JSON.stringify(id['m_komponen']).split('"').join("&quot;")})'   class='btn btn-primary btn-sm btn-xs mb-1'><i class='fa fa-plus-circle'> </i> </button>

                    </li>
             
               
                </ul> </td>
                </tr>`;
                nokro++;
            });
            return datarow;
        }

        function formatkomponen(d) {
            console.log(d, 'formatkomponen');
            // `d` is the original data object for the row
            var datarow = '';

            var nokom = 1;
            d['m_kom'].forEach((id, key) => {
                var datarr = id;
                datarow += `<tr data-pos='${nokom}' id='datakom-${nokom}' data-last='${((d['m_kom'].length - 1) == key  ) ? "1" : "0"}' data-bab='${JSON.stringify(id)}' class='table-success table-sm'> 
                    <td class='pt-0 pb-0' > &nbsp ${id['r_kom']['kode']}</td>
                    <td class='pt-0 pb-0' colspan='2'>${id['r_kom']['nama']}</td>
                    <td class='pt-0 pb-0' colspan='1'>${idr(id['biaya'])}</td>
                    <td class='pt-1 pb-1'>   <ul class='list-inline mb-0'>
                 
              
                 <li class='list-inline-item'>
                     <button class='btn btn-sm btn-success lihatsubkomponen'> <i class='fa fa-arrow-down'>  </i> </button>

                     <button type='button' data-toggle='modal' onclick='updkro("${id['nama_ro']}","${id['biaya']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'> </i>  </button>

                 <button type='button'  onclick='delro("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash-alt'> </i> </button>
                 <button type='button' ${disabler == 2 ? 'disabled' : ''}  onclick='addsubkomponen("${id['id']}",${JSON.stringify(id['m_sub']).split('"').join("&quot;")})'   class='btn btn-primary btn-sm btn-xs mb-1'><i class='fa fa-plus-circle'> </i> </button>

                 </li>
          
            
             </ul> </td>
                </tr>`;
                nokom++;
            });
            return datarow;
        }

        function formatsubkomponen(d) {
            console.log(d, 'formatkomponen');
            // `d` is the original data object for the row
            var datarow = '';

            var nokom = 1;
            d['m_subnya'].forEach((id, key) => {
                var datarr = id;
                datarow += `<tr class='table-primary table-sm'> 
                    <td class='pt-0 pb-0' > &nbsp&nbsp&nbsp&nbsp ${id['kode_sub']}</td>
                    <td class='pt-0 pb-0' colspan='2'>${id['nama_sub']}</td>
                    <td class='pt-0 pb-0' colspan='1'>${idr(id['biaya'])}</td>
                    <td class='pt-1 pb-1'>   <ul class='list-inline mb-0'>
                 
              
                 <li class='list-inline-item'>
                     <a target='_blank' href='${url + '/rkakl/data-rkakl/'}{{ Request::segment(3) }}/${id['id']}' class='btn btn-sm btn-primary lihatsubkomponen'> <i class='fa fa-paper-plane'>  </i> </a>

                     <button type='button' data-toggle='modal' onclick='updkro("${id['nama_ro']}","${id['biaya']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'> </i>  </button>

                 <button type='button'  onclick='delro("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash-alt'> </i> </button>
                 <button type='button'    class='btn btn-primary btn-sm btn-xs mb-1'><i class='fa fa-plus-circle'> </i> </button>

                 </li>
          
            
             </ul> </td>
                </tr>`;
                nokom++;
            });
            return datarow;
        }
        $(document).ready(function() {
            tabel = $("#example").DataTable({
                "drawCallback": function(settings) {
                    var api = this.api();

                    $(".lihatakun").trigger('click')
                    $(".lihatkomponen").trigger('click')
                    $(".lihatsubkomponen").trigger('click')
                    var b = api
                        .column(5)
                        .data()
                        .reduce(function(a, b) {
                            return parseInt(a) + parseInt(b);
                        }, 0);
                    $("#rupiahnya").html(idr(b));
                },
                columnDefs: [{
                        targets: 0,
                        width: "7%",
                    },
                    {
                        targets: 1,
                        width: "20%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "10%",

                    },
                    {
                        orderable: false,

                        targets: 3,
                        width: "10%",

                    },
                    {
                        orderable: false,

                        targets: 4,
                        width: "10%",

                    },
                    {
                        orderable: false,
                        visible: false,
                        targets: 5,
                        width: "10%",

                    },

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('rkakl/data-rkakl/' . Request::segment(3)) }}",
                },
                columns: [{
                        nama: 'kodenya',
                        data: 'kodenya'
                    },
                    {
                        name: 'kegiatan_nama',
                        data: 'kegiatan_nama',
                    },
                    {
                        nama: 'volume',
                        data: 'volume'
                    },

                    {
                        name: 'biaya',
                        data: function(id) {
                            return idr(id['biaya']);
                        }
                    },

                    {
                        name: 'aksi',
                        data: 'aksi',
                    },

                    {
                        name: 'biaya',
                        data: 'biaya',
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
            $('#example tbody').on('click', '.lihatakun', function() {
                var tr = $(this).closest('tr');
                var row = tabel.row(tr);
                if ($(tr).hasClass('ada')) {
                    $(tr).removeClass('ada');
                    console.log($(tr), 'tutup');
                    $(tr.nextUntil('[role="row"]')).remove();
                } else {
                    $(tr).addClass('ada');

                    $(tr).after(format(row.data()));
                    console.log($(tr.next()), 'next');
                }
            });
            $('#example tbody').on('click', '.lihatkomponen', function() {
                console.log('hai')
                var tr = $(this).closest('tr');
                var row = tabel.row(tr);
                var datajson = tr[0]['attributes']['data-bab']['value']
                var datalast = tr[0]['attributes']['data-last']['value']
                var datapos = tr[0]['attributes']['data-pos']['value']
                // console.log(datapos, 'datapos');
                var jsonData = JSON.parse(datajson);
                console.log(jsonData, 'json');
                if ($(tr).hasClass('ada')) {
                    $(tr).removeClass('ada');
                    var jsonId = 'dataro-' + (parseInt(datapos) + 1);
                    var lengthD = jsonData['m_kom'].length;

                    if (lengthD == 0) {
                        console.log(1)
                        $(tr.next()).remove();
                    } else {
                        if (datalast == 1) {
                            console.log(2)
                            $(tr.nextUntil('[id="datakom- ' + +'"]')).remove();
                        } else {
                            console.log(3)
                            $(tr.nextUntil('[id="' + jsonId + '"]')).remove();
                        }


                    }

                } else {
                    $(tr).addClass('ada');

                    $(tr).after(formatkomponen(jsonData));
                }
            });
            $('#example tbody').on('click', '.lihatsubkomponen', function() {
                var tr = $(this).closest('tr');
                var row = tabel.row(tr);
                var datajson = tr[0]['attributes']['data-bab']['value']
                var datalast = tr[0]['attributes']['data-last']['value']
                var datapos = tr[0]['attributes']['data-pos']['value']
                console.log(datapos, 'datapos');
                // console.log(datapos, 'datapos');
                var jsonData = JSON.parse(datajson);
                console.log(jsonData, 'json');
                console.log(jsonData);
                if ($(tr).hasClass('ada')) {
                    $(tr).removeClass('ada');
                    var jsonId = 'datakom-' + (parseInt(datapos) + 1);
                    var lengthD = jsonData['m_subnya'].length;

                    if (lengthD == 0) {
                        console.log(1)
                        $(tr.next()).remove();
                    } else {
                        if (datalast == 1) {
                            console.log(2)
                            $(tr.nextUntil('[id="datasubkom- ' + +'"]')).remove();
                        } else {
                            console.log(3)
                            $(tr.nextUntil('[id="' + jsonId + '"]')).remove();
                        }


                    }

                } else {
                    $(tr).addClass('ada');

                    $(tr).after(formatsubkomponen(jsonData));
                }
            });
        });

        //form dan btn rab kegiatan
        $("#btnrabkegiatan").on('click', function() {
            $("#formrabkegiatan").trigger('submit');
        });

        $("#formrabkegiatan").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('kekro.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#formrabkegiatan").trigger('reset');
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
                        toastFun(2);
                    } else {
                        $('#exampleLargeModal').modal('hide');
                        toastFun(1);

                        tabel.ajax.reload();

                    }
                }
            })


        })
        //form dan btn rab kegiatan




        $("#submitbtnu").on('click', function() {
            $("#editdata").trigger('submit');
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
                    url: url + '/admin/rkakl/rab/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            toastFun(1);

                            tabel.ajax.reload();

                        } else {

                            toastFun(2);
                        }

                    }
                })

            }
        }
        $("#editdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/rkakl/rab/edit') }}',
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
            $("#idu").val(id.id);
            $("#namau").val(id.nama);

            $("#tanggalu").val(id.tanggal);
            $("#anggaranu").val(id.anggaran);
            $("#realisasiu").val(id.realisasi);
            $("#akunu").val(id.id_akun);
            $("#keteranganu").html(id.keterangan);

            $('#exampleLargeModalu').modal('show');
            $("#kegiatanu").val(id['id_kegiatan']);
            var el = $("#kegiatanu :selected")
            var jsonData = JSON.parse(el[0]['dataset']['kro']);
            var htmlkro = '<option disabled selected>Pilih KRO</option>';
            jsonData.forEach((data) => {
                htmlkro +=
                    `<option data-ro='${JSON.stringify(data.roitem)}' value="${data.id}" ${bangAli(data.id,id.id_kro)}> ${data.nama}</option>`;
            });
            $("#krou").html(htmlkro);
            var el = $("#krou :selected")
            var jsonDataro = JSON.parse(el[0]['dataset']['ro']);

            var htmlro = '<option disabled selected>Pilih RO</option>';
            jsonDataro.forEach((data) => {
                htmlro +=
                    `<option data-komponen='${JSON.stringify(data.komponenitem)}' value="${data.id}" ${bangAli(data.id,id.ro)}> ${data.nama}</option>`;
            });
            $("#rou").html(htmlro);


            var el = $("#rou :selected")
            var jsonDatakomponen = JSON.parse(el[0]['dataset']['komponen']);
            var htmlkomponen = '<option disabled selected>Pilih Komponen</option>';
            jsonDatakomponen.forEach((data) => {
                htmlkomponen +=
                    `<option data-subkomponen='${JSON.stringify(data.subkomponenitem)}' value="${data.id}" ${bangAli(data.id,id.komponen)}> ${data.nama}</option>`;
            });
            $("#komponenu").html(htmlkomponen);


            var el = $("#komponenu :selected")
            var jsonDatasubkomponen = JSON.parse(el[0]['dataset']['subkomponen']);
            var htmlsubkomponen = '<option disabled selected>Pilih subKomponen</option>';
            jsonDatasubkomponen.forEach((data) => {
                htmlsubkomponen +=
                    `<option value="${data.id}" ${bangAli(data.id,id.sub_komponen)}> ${data.nama}</option>`;
            });
            $("#subkomponenu").html(htmlsubkomponen);

        }

        function addkomponen(id, komponen) {

            $('#modalkomponen').modal('show');
            var html = '<option disabled selected>Pilih Komponen</option>';
            komponen.forEach((id) => {
                html +=
                    `<option value="${id.id}"> ${id.kode} - ${id.nama}</option>`;
            });
            $("#komponen").html(html);
            $("#id_rab_ro").val(id);

        }
        $("#komponen").on('change', function() {
            var v = $("#komponen option:selected").text();
            $("#rkom").val(v);
        });
        //form dan btn rab ro
        $("#btnrabkom").on('click', function() {
            $("#formrabkom").trigger('submit');
        });
        $("#formrabkom").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('rabkom.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#formrabkegiatan").trigger('reset');
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
                        toastFun(2);
                    } else {
                        $('#modalkomponen').modal('hide');
                        toastFun(1);

                        tabel.ajax.reload();

                    }
                }
            })


        })

        function addsubkomponen(id, sub) {

            $('#modalsubkomponen').modal('show');
            var html = '<option disabled selected>Pilih Subkomponen</option>';
            sub.forEach((id) => {
                html +=
                    `<option value="${id.id}"> ${id.kode} - ${id.nama}</option>`;
            });
            $("#subkomponen").html(html);
            $("#id_rab_kom").val(id);

        }
        $("#subkomponen").on('change', function() {
            var v = $("#subkomponen option:selected").text();
            v = v.split(" - ");
            var subkode = v[0].replace(/ +/g, '');
            var subnama = v[1];
            $("#rnamakom").val(subnama);
            $("#rkodekom").val(subkode);
            // $("#rkom").val(v);
        });
        $("#btnrabsubkom").on('click', function() {
            $("#formrabsubkom").trigger('submit');
        });
        $("#formrabsubkom").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('rabsubkom.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#formrabkegiatan").trigger('reset');
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
                        toastFun(2);
                    } else {
                        $('#modalsubkomponen').modal('hide');
                        toastFun(1);

                        tabel.ajax.reload();

                    }
                }
            })


        })

        function idr(uang) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(uang);

        }
    </script>
@endpush
