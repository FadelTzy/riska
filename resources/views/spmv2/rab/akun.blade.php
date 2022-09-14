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
                    <small class="text-gray-500 fs-7 fw-semibold my-1">{{ $page }} - Jenis Akun</small>
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
                  Daftar Jenis Belanja
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
         
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-3">
                    <!--begin::Section-->
                    <div class="mb-0">
                        <!--begin::Title-->
                        <!--end::Title-->
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap py-5">
                            <!--begin::Row-->
                            <div class="flex-equal me-5">
                                <!--begin::Details-->
                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">KEGIATAN</td>
                                        <td class="text-gray-800 min-w-200px">
                                            {{$subk->oKom->oRo->oKros->nama_kegiatan}}
                                        </td>
                                    </tr>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">KRO</td>
                                        <td class="text-gray-800">{{$subk->oKom->oRo->oKros->nama_kro}}</td>
                                    </tr>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">RO</td>
                                        <td class="text-gray-800">{{$subk->oKom->oRo->nama_ro}}</td>
                                    </tr>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">KOMPONEN</td>
                                        <td class="text-gray-800" id="rupiahnya">{{$subk->oKom->nama_komponen}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-400">SUB - KOMPONEN</td>
                                        <td class="text-gray-800" id=""> {{$subk->kode_sub}} - {{$subk->nama_sub}} </td>
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
                        <button data-bs-toggle="modal" @if ($dr->status_draft == 2)
                            disabled
                        @endif data-bs-target="#exampleLargeModal" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Belanja
                            Kegiatan</button>
                            <a href="{{url('rkakl/data-rkakl/') .'/'. Request::segment(3)}}"
                            class="btn btn-sm btn-primary"> <i class="fa fa-angle-left"></i> Kembali
                                </a>
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
                                <th>Jenis Akun</th>
                                <th>Volume</th>
                                <th>Satuan Harga</th>
                                <th>Jumlah Harga</th>
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
                    <h5 class="modal-title">Tambah RAB Jenis Belanja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrabakun" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{ Request::segment(3) }}" name="id_rkakl">
                        <input type="hidden" value="{{ Request::segment(4) }}" name="id_rab_subkom">
                        <input type="hidden" value="{{$dr->id}}" name="id_revisi">
                        <input type="hidden" name="kode_akun" id="kode_akun">
                        <input type="hidden" name="nama_akun" id="nama_akun">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Akun</label>
                                <div class="input-group">
                                    <select name="akun" class="form-control" id="rabakun">
                                        <option disabled selected>Pilih Jenis Belanja</option>
                                        @foreach ($akun as $i)
                                            <option  value="{{ $i->id }}">
                                                {{ $i->kode }} - {{ $i->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><!-- input-group -->
                                <br>
                                <label class="form-label">KPPN</label>
                                <div class="input-group">
                                    <input type="text" name="kppn" class="form-control" id="kppn">
                                </div><!-- input-group -->
                                <br>
                              
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input name="cabang" class="form-check-input" type="checkbox" value="1" id="flexSwitchDefault"/>
                                    <label class="form-check-label" id="labelcheck" for="flexSwitchDefault">
                                        Tidak Bercabang
                                    </label>
                                </div>
                                
                            </div>
                            <div id="field" class="col-md-12">
                              
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                    <button id="btnrabakun" type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Detail RAB</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrabdetail" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{ Request::segment(3) }}" name="id_rkakl">
                        <input type="hidden" value="{{$dr->id}}" name="id_revisi">

                        <input type="hidden" id="hiddentotal" name="hiddentotal">
                        <input type="hidden" id="id_rab_akun" name="id_rab_akun">
                        <input type="hidden" id="id_rab_cabang" name="id_rab_cabang">

                        <div class="row">
                            <div class="col-md-12">

                                <label class="form-label">Keterangan</label>
                                <div class="input-group">
                                    <input type="text" name="keterangan"  id="keterangan" class="form-control">
                                </div><!-- input-group -->
                                <br>
                            </div>
                            <div class="col-md-4">

                                <label class="form-label">Kuantitas</label>
                                <div class="input-group">
                                    <input type="number" value="1" onkeyup="cekhargak(this)" name="kuantitas" id="kuantitas" class="form-control">
                                </div><!-- input-group -->
                                <br>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Satuan</label>
                                <div class="input-group">
                                    <input type="text" name="satuan" placeholder="Input Satuan" class="form-control">
                                </div><!-- input-group -->
                                <br>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Harga / Satuan</label>
                                <div class="input-group">
                                    <input type="number" onkeyup="cekharga(this)" id="hargasatuan" value="0" name="harga" class="form-control">
                                </div><!-- input-group -->
                                <br>
                            </div>
                            <div class="col-md-12">

                                <label class="form-label">Total Harga</label>
                                <div class="input-group">
                                    <input type="text" name="total"  id="totalharga" class="form-control">
                                </div><!-- input-group -->
                                <br>
                            </div>
                 
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                    <button id="btnrabdetail" type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalcabang" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Cabang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formcabang" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" id="id_rab_akunn"  name="id_rab_akun">
                        <input type="hidden" value="{{$dr->id}}" name="id_revisi">

                        <div class="row">
                            <div class="col-md-12">

                                <label class="form-label">Cabang</label>
                                <div class="input-group">
                                    <input type="text" name="cabang" class="form-control">
                                </div><!-- input-group -->
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                    <button id="btncabang" type="button" class="btn btn-primary">Simpan</button>
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
                        <input type="hidden" name="rkodekom" id="rkodekom">
                        <input type="hidden" name="rnamakom" id="rnamakom">
                        <input type="hidden" name="id_rab_kom" id="id_rab_kom">
                        <input type="hidden" value="{{$dr->id}}" name="id_revisi">

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
        var toastLiveExample = document.getElementById('liveToast')
        var toastErr = document.getElementById('liveToastErr')
        var harganya = 0;
        $("#flexSwitchDefault").on('change',function () {
            var html = `  <div class="form-group">
                                    <div class="d-flex justify-content-end">
                                        <button type='button' id="ak" class="btn btn-sm btn-primary">Tambah Data <i
                                                class="fa fa-plus"></i></button>

                                    </div>
                                    <div id="tk">
                                        <div class="input-group">
                                            <input type="text" placeholder="..." name='cipung[]' class="form-control ">
                                            <div class="input-group-append">
                                                <div onclick='myFunc(this)' style="cursor: pointer" 
                                                    class="input-group-text rk">
                                                    <i id="fonteye" class="fa fa-trash"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
            if($(this).is(':checked')){
                $("#field").html(html);
                $("#labelcheck").html('Bercabang')
                panggilak();
            }else{
                $("#labelcheck").html('Tidak Bercabang') 
                $("#field").html('');

            }
        })
        function panggilak() {
            $("#ak").on('click', function(e) {
            e.preventDefault();
            var cok = `<div class="input-group">
                                                <input type="text" placeholder="..." name='cipung[]' class="form-control ">
                                                <div class="input-group-append">
                                        <div onclick='myFunc(this)' style="cursor: pointer"  class="input-group-text rk">
                                            <i id="fonteye" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                            </div>
                                            `;
            $("#tk").append(cok);
        })
        }
      
        function myFunc(params) {
            $(params).parent('div').parent('div').remove();
        }
        function cekhargak(e) {
            var c = e.value;
            let kuan = $("#hargasatuan").val();
            let h = idr(c * kuan); 
            console.log(c);
            $("#totalharga").val(h);
            $("#hiddentotal").val(c*kuan)
        }
        function cekharga(e) {
            var c = e.value;
            let kuan = $("#kuantitas").val();
            let h = idr(c * kuan); 
            $("#totalharga").val(h);
            $("#hiddentotal").val(c*kuan)

        }
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
        function addCabang(id) {
            var data = id
            console.log(id);
            $("#id_rab_akunn").val(id.id)
            $('#modalcabang').modal('show');
        }
        $("#btncabang").on('click', function() {
            $("#formcabang").trigger('submit');
        });
        $("#formcabang").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('rabcabang.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#formcabang").trigger('reset');
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
                        $('#modalcabang').modal('hide');
                        toastFun(1);

                        tabel.ajax.reload();

                    }
                }
            })


        })
        function addRo(id) {
            var data = id
            console.log(id,'addro');
            $("#id_rab_akun").val(id.id)
            $('#modalro').modal('show');
        }
        function addRo2(id,idc) {
            var data = id
            console.log(id,idc,'addcabang');
            $("#id_rab_akun").val(id)
            $("#id_rab_cabang").val(idc);
            $('#modalro').modal('show');
        }
     
        //form dan btn rab ro
        $("#btnrabdetail").on('click', function() {
            $("#formrabdetail").trigger('submit');
        });
        $("#formrabdetail").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('rabdetail.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#formrabdetail").trigger('reset');
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
   

    

        function format(d) {
            // `d` is the original data object for the row
            var datarow = '';

            var nokro = 1;
            console.log(d,'disinidulu')
            var bd = 0;
            if (d['status_cabang']  == 1) {
                harganya =0;

                d['m_cabang'].forEach((id, key) => {
                var datarr = id;
                datarow += `<tr data-pos='${nokro}' id='dataro-${nokro}' data-last='${((d['m_cabang'].length - 1) == key  ) ? "1" : "0"}' data-bab='${JSON.stringify(id)}' class='table-info table-sm' > 
                    <td class='pt-1 pb-1' colspan='1'> &nbsp&nbsp&nbsp&nbsp  </td>

                    <td class='pt-1 pb-1' colspan='3'>&nbsp&nbsp${id['keterangan']} </td>
          
                    <td id='${id['id']}cabang' class='pt-1 pb-1' colspan='1'> ${idr(id['biaya'])} </td>

                    <td class='pt-1 pb-1'>   <ul class='list-inline mb-0'>
                 
              
                    <li class='list-inline-item'>
                        <button class='btn btn-sm btn-success d-none lihatsubdetail'> <i class='fa fa-arrow-down'>  </i> </button>

                        <button type='button'  onclick='addRo2("${d['id']}","${id['id']}")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class='fa fa-plus-circle'> </i> </button>

                        <button type='button' data-toggle='modal' onclick='updkro("${id['nama_ro']}","${id['biaya']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'> </i>  </button>

                    <button type='button'  onclick='delcabang("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash-alt'> </i> </button>

                    </li>
             
               
                </ul> </td>
                </tr>`;
                nokro++;
            });
            }else{
                var tot = 0;
                d['m_detail'].forEach((id, key) => {
                tot += parseInt(id['biaya']);
                var datarr = id;
                datarow += `<tr class='table-success table-sm' > 
                    <td class='pt-1 pb-1' colspan='1'> &nbsp&nbsp&nbsp&nbsp  </td>
                    <td class='pt-1 pb-1' colspan='1'>&nbsp&nbsp&nbsp&nbsp ${id['keterangan']} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${id['volume']} ${id['satuan']} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['hargasatuan'])} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['biaya'])} </td>

                    <td class='pt-1 pb-1'>   <ul class='list-inline mb-0'>
                 
              
                    <li class='list-inline-item'>

                        <button type='button' data-toggle='modal' onclick='updkro("${id['nama_ro']}","${id['biaya']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'> </i>  </button>

                    <button type='button'  onclick='deldetail("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash-alt'> </i> </button>

                    </li>
             
               
                </ul> </td>
                </tr>`;
              
                $("#" + id['id_rab_akun'] + "akun").html(idr(tot))
                nokro++;
            });
            }
            
            return datarow;
        }

        function formatsubdetail(d) {
            console.log(d, 'formatsub');
            // `d` is the original data object for the row
            var datarow = '';
            var b =0 ;
            var nokom = 1;
            d['m_detail'].forEach((id, key) => {
                harganya += parseInt(id['biaya']);

                b += parseInt(id['biaya']);
                var datarr = id;
                datarow += `<tr class='table-success table-sm' > 
                    <td class='pt-1 pb-1' colspan='1'> &nbsp&nbsp&nbsp&nbsp  </td>

                    <td class='pt-1 pb-1' colspan='1'>&nbsp&nbsp&nbsp&nbsp ${id['keterangan']} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${id['volume']} ${id['satuan']} </td>

                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['hargasatuan'])} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['biaya'])} </td>

                    <td class='pt-1 pb-1'>   <ul class='list-inline mb-0'>
                 
              
                    <li class='list-inline-item'>

                        <button type='button' data-toggle='modal' onclick='updkro("${id['nama_ro']}","${id['biaya']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'> </i>  </button>

                    <button type='button'  onclick='deldetail("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash-alt'> </i> </button>

                    </li>
             
               
                </ul> </td>
                </tr>`;
                nokom++;
                $("#"+id['id_cabang']+'cabang').html(idr(b))
            });
            $("#"+d['id_rab_akun']+'akun').html(idr(harganya))

            console.log(harganya,'hargaaaa');

            return datarow;
        }
       
        $(document).ready(function() {
            tabel = $("#example").DataTable({
                "drawCallback": function(settings) {
                    $(".lihatakun").trigger('click')
                    $(".lihatsubdetail").trigger('click')
                    // $(".lihatsubkomponen").trigger('click')

                },
                columnDefs: [{
                        targets: 0,
                        width: "5%",
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

                        targets: 5,
                        width: "15%",

                    },

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('rkakl/data-rkakl/' . Request::segment(3) . '/' . Request::segment(4) ) }}",
                },
                columns: [
                    {
                        name: 'kode_akun',
                        data: 'kode_akun',
                    },
                    {
                        nama: 'nama_akun',
                        data: 'nama_akun'
                    },
                    {
                        nama: 'volume',
                        data: 'volume'
                    },
                    {
                        nama: 'satuan',
                        data: 'satuan'
                    },
                    {
                        name: 'biaya',
                        data: function(id) {
                            return "<span id='" + id['id']+ "akun'>" + idr(id['biaya']) + "</span>";
                        }
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
            $('#example tbody').on('click', '.lihatsubdetail', function() {
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
                    var lengthD = jsonData['m_detail'].length;

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

                    $(tr).after(formatsubdetail(jsonData));
                }
            });
         
        });

        //form dan btn rab kegiatan
        $("#btnrabakun").on('click', function() {
            $("#formrabakun").trigger('submit');
        });

        $("#formrabakun").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('rabakun.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#formrabakun").trigger('reset');
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

        $("#rabakun").on('change', function() {
            var v = $("#rabakun option:selected").text();
            v = v.split(" - ");
                var subkode = v[0].replace( / +/g, '');
                var subnama = v[1];
                $("#nama_akun").val(subnama);
                $("#kode_akun").val(subkode);
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
                    url: url + '/rkakl/data-rkakl/jenis-belanja/' + id,
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
        function delcabang(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/rkakl/data-rkakl/jenis-belanja/cabang/' + id,
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
        function deldetail(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/rkakl/data-rkakl/jenis-belanja/detail/' + id,
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
                var subkode = v[0].replace( / +/g, '');
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
