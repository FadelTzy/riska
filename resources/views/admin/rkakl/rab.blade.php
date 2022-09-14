@extends('base')
@section('css')
    <link href="{{ asset('v/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('v/assets/plugins/notifications/css/lobibox.min.css') }}" />
    <link href="{{ asset('v/assets/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('v/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('v/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Master Data</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data RAB</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data RAB</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="tambahdata" class=" form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" value="{{ Request::segment(3) }}" name="id_rkakl">
                            <div class="row">
                                <div class="col-md-6">
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
                                    <label class="form-label">RO</label>
                                    <div class="input-group">
                                        <select name="ro" class="form-control" id="ro">
                                            <option disabled selected>Pilih RO</option>
                                        </select>
                                    </div><!-- input-group -->
                                    <br>
                                    <label class="form-label">Komponen</label>
                                    <div class="input-group">
                                        <select name="komponen" class="form-control" id="komponen">
                                            <option disabled selected>Pilih Komponen</option>
                                        </select>
                                    </div><!-- input-group -->
                                    <br>
                                    <label class="form-label">Tanggal</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal">
                                    </div><!-- input-group -->
                                    <br>
                                </div>
                                <div class="col-md-6">

                                    <label class="form-label">Sub - Komponen</label>
                                    <div class="input-group">
                                        <select name="subkomponen" class="form-control" id="subkomponen">
                                            <option disabled selected>Pilih Sub - Komponen</option>
                                        </select>
                                    </div><!-- input-group -->
                                    <br>
                                    <label class="form-label">Akun</label>
                                    <div class="input-group">
                                        <select name="akun" class="form-control" id="akun">
                                            <option disabled selected>Pilih Akun</option>
                                            @foreach ($akun as $item)
                                                <option value="{{ $item->id }}">{{ $item->kode }} -
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div><!-- input-group -->
                                    <br>

                                    <label class="form-label">Anggaran</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="anggaran" class="form-control" id="anggaran">
                                        <span class="input-group-text">.00</span>
                                    </div><!-- input-group -->
                                    <br>
                                    <label class="form-label">Realisasi</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="realisasi" class="form-control" id="realisasi">
                                        <span class="input-group-text">.00</span>
                                    </div><!-- input-group -->
                                    <br>
                                    <label class="form-label">Keterangan</label>
                                    <div class="input-group">
                                        <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="3"></textarea>
                                    </div><!-- input-group -->
                                    <br>
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                        <button id="submitbtn" type="button" class="btn btn-primary">Simpan</button>
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
                                    <br>
                                    <label class="form-label">RO</label>
                                    <div class="input-group">
                                        <select name="ro" class="form-control" id="rou">
                                            <option disabled selected>Pilih RO</option>
                                        </select>
                                    </div><!-- input-group -->
                                    <br>
                                    <label class="form-label">Komponen</label>
                                    <div class="input-group">
                                        <select name="komponen" class="form-control" id="komponenu">
                                            <option disabled selected>Pilih Komponen</option>
                                        </select>
                                    </div><!-- input-group -->
                                    <br>
                                    <label class="form-label">Sub - Komponen</label>
                                    <div class="input-group">
                                        <select name="subkomponen" class="form-control" id="subkomponenu">
                                            <option disabled selected>Pilih Sub - Komponen</option>
                                        </select>
                                    </div><!-- input-group -->
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Akun</label>
                                    <div class="input-group">
                                        <select name="akun" class="form-control" id="akunu">
                                            <option disabled selected>Pilih Akun</option>
                                            @foreach ($akun as $item)
                                                <option value="{{ $item->id }}">{{ $item->kode }} -
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div><!-- input-group -->
                                    <br>
                                    <label class="form-label">Anggaran</label>
                                    <div class="input-group">
                                        <input type="text" name="anggaran" class="form-control" id="anggaranu">
                                    </div><!-- input-group -->
                                    <br>
                                    <label class="form-label">Realisasi</label>
                                    <div class="input-group">
                                        <input type="text" name="realisasi" class="form-control" id="realisasiu">
                                    </div><!-- input-group -->
                                    <br>
                                    <label class="form-label">Tanggal</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="tanggalu" name="tanggal">
                                    </div><!-- input-group -->
                                    <br>
                                    <label class="form-label">Keterangan</label>
                                    <div class="input-group">
                                        <textarea name="keterangan" class="form-control" id="keteranganu" cols="30" rows="3"></textarea>
                                    </div><!-- input-group -->
                                    <br>
                                </div>
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
        <div style="vertical-align: bottom" class="d-flex justify-content-between">
            <h6 class="mb-0 text-uppercase">Manajemen Data RKA-KL </h6>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal"
                class="btn btn-sm btn-success">Tambah Data <i class="bx bx-folder-plus"></i></button>
        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-sm table-hover table-bordered" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Kegiatan</th>
                                <th>KRO</th>
                                <th>RO</th>
                                <th>Komponen</th>
                                <th>Akun</th>
                                <th>Anggaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>


                    </table>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection
@push('js')
    <!--notification js -->
    <script src="{{ asset('v/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('v/assets/plugins/notifications/js/notifications.min.js') }}"></script>
    <script src="{{ asset('v/assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
    <script src="{{ asset('v/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('v/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('v/assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('v/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ">
    </script>
    <script>
        $("#kegiatan").on('change', function() {
            var el = $("#kegiatan :selected")
            var jsonData = JSON.parse(el[0]['dataset']['kro']);
            var html = '<option disabled selected>Pilih KRO</option>';
            jsonData.forEach((id) => {
                html +=
                    `<option data-ro='${JSON.stringify(id.roitem)}' value="${id.id}"> ${id.nama}</option>`;
            });
            $('#ro').prop('selectedIndex', 0);
            $('#komponen').prop('selectedIndex', 0);
            $('#subkomponen').prop('selectedIndex', 0);
            $("#kro").html(html);
        })
        $("#kegiatanu").on('change', function() {
            var el = $("#kegiatanu :selected")
            var jsonDataku = JSON.parse(el[0]['dataset']['kro']);
            var html = '<option disabled selected>Pilih KRO</option>';
            jsonDataku.forEach((id) => {
                html +=
                    `<option data-ro='${JSON.stringify(id.roitem)}' value="${id.id}"> ${id.nama}</option>`;
            });
            $('#rou').prop('selectedIndex', 0);
            $('#komponenu').prop('selectedIndex', 0);
            $('#subkomponenu').prop('selectedIndex', 0);
            $("#krou").html(html);
        })
        $("#kro").on('change', function() {
            var elkro = $("#kro :selected")
            var jsonDataro = JSON.parse(elkro[0]['dataset']['ro']);
            var html = '<option disabled selected>Pilih RO</option>';
            jsonDataro.forEach((id) => {
                html +=
                    `<option data-komponen='${JSON.stringify(id.komponenitem)}'' value="${id.id}"> ${id.nama}</option>`;
            });
            $('#komponen').prop('selectedIndex', 0);
            $('#subkomponen').prop('selectedIndex', 0);
            $("#ro").html(html);

        })
        $("#krou").on('change', function() {
            var elkro = $("#krou :selected")
            var jsonDatakrou = JSON.parse(elkro[0]['dataset']['ro']);
            var html = '<option disabled selected>Pilih RO</option>';
            jsonDatakrou.forEach((id) => {
                html +=
                    `<option data-komponen='${JSON.stringify(id.komponenitem)}'' value="${id.id}"> ${id.nama}</option>`;
            });
            $('#komponenu').prop('selectedIndex', 0);
            $('#subkomponenu').prop('selectedIndex', 0);
            $("#rou").html(html);

        })
        $("#ro").on('change', function() {
            var elro = $("#ro :selected")
            var jsonDatarro = JSON.parse(elro[0]['dataset']['komponen']);
            var htmlk = '<option disabled selected>Pilih Komponen</option>';
            jsonDatarro.forEach((id) => {
                htmlk +=
                    `<option data-subkomponen='${JSON.stringify(id.subkomponenitem)}' value="${id.id}"> ${id.nama}</option>`;
            });

            $('#subkomponen').prop('selectedIndex', 0);
            $("#komponen").html(htmlk);
        })
        $("#rou").on('change', function() {
            var elro = $("#rou :selected")
            var jsonDatarrou = JSON.parse(elro[0]['dataset']['komponen']);
            var htmlku = '<option disabled selected>Pilih Komponen</option>';
            jsonDatarrou.forEach((id) => {
                htmlku +=
                    `<option data-subkomponen='${JSON.stringify(id.subkomponenitem)}' value="${id.id}"> ${id.nama}</option>`;
            });

            $('#subkomponenu').prop('selectedIndex', 0);
            $("#komponenu").html(htmlku);
        })
        $("#komponen").on('change', function() {
            var elkomponen = $("#komponen :selected")
            var jsonDatarkomponen = JSON.parse(elkomponen[0]['dataset']['subkomponen']);
            var htmlsk = '<option disabled selected>Pilih Sub - Komponen</option>';
            jsonDatarkomponen.forEach((id) => {
                htmlsk +=
                    `<option  value="${id.id}"> ${id.nama}</option>`;
            });
            $("#subkomponen").html(htmlsk);
        })
        $("#komponenu").on('change', function() {
            var elkomponen = $("#komponenu :selected")
            var jsonDatarskomponen = JSON.parse(elkomponen[0]['dataset']['subkomponen']);
            var htmlsku = '<option disabled selected>Pilih Sub - Komponen</option>';
            jsonDatarskomponen.forEach((id) => {
                htmlsku +=
                    `<option  value="${id.id}"> ${id.nama}</option>`;
            });
            $("#subkomponenu").html(htmlsku);
        })
        jQuery(document).ready(function() {

            tabel = $("#example").DataTable({
                columnDefs: [{
                        targets: 0,
                        width: "1%",
                    },
                    {
                        targets: 1,
                        width: "20%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "20%",

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
                        width: "10%",

                    }, {
                        orderable: false,

                        targets: 6,
                        width: "10%",

                    },
                    {
                        orderable: false,

                        targets: 7,
                        width: "10%",

                    },
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/rkakl/' . Request::segment(3)) }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    },
                    {
                        nama: 'kegiatan_nama',
                        data: 'kegiatan_nama'
                    },
                    {
                        name: 'kro_nama',
                        data: 'kro_nama',
                    },
                    {
                        nama: 'ro_nama',
                        data: 'ro_nama'
                    },

                    {
                        name: 'komponen_nama',
                        data: 'komponen_nama',
                    },
                    {
                        nama: 'akun_nama',
                        data: 'akun_nama'
                    },
                    {
                        nama: 'anggaran',
                        data: 'anggaran'
                    }, {
                        name: 'aksi',
                        data: 'aksi',
                    }
                ],

            });



        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = window.location.origin;

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
                    url: url + '/rkakl/rab/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            round_success_noti('Berhasil menghapus data');

                            tabel.ajax.reload();

                        } else {

                            round_error_noti('Gagal menghapus data');
                        }

                    }
                })

            }
        }
        $("#submitbtn").on('click', function() {
            $("#tambahdata").trigger('submit');
        });

        $("#tambahdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('rab.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
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
                        round_error_noti(elem);
                    } else {
                        $('#exampleLargeModal').modal('hide');
                        round_success_noti();

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
                        round_error_noti(elem);

                    } else {
                        round_success_noti();
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

        $('#tahun').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });

        function bangAli(a, v) {
            if (a == v) {
                return 'selected';
            }
        }
        
    </script>
@endpush
