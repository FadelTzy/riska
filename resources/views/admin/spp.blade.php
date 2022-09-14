@extends('base')
@section('css')
    <link rel="stylesheet" href="{{ asset('v/assets/plugins/notifications/css/lobibox.min.css') }}" />
    <link href="{{ asset('v/assets/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('v/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('v/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-content">


        <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">Formulir Surat Permintaan Pembayaran (SPP)</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <br />

                        <div class="d-flex justify-content-between">
                            <div>

                                <button class="btn btn-primary btn-sm prev-btn" type="button"><i
                                        class="bx bx-chevron-left-circle"></i></button>
                                <button class="btn btn-primary btn-sm next-btn" type="button"><i
                                        class="bx bx-chevron-right-circle"></i></button>
                            </div>
                            <button class="btn btn-primary btn-sm reset-btn" type="button"><i
                                    class="bx bx-refresh mr-1"></i>Reset</button>
                        </div>
                        <br />
                        <br>
                        <!-- SmartWizard html -->
                        <div id="smartwizard">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-1"> <strong></strong>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-2"> <strong></strong>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-3"> <strong></strong>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-4"> <strong></strong>
                                    </a>
                                </li>

                            </ul>
                            <form id="formdata" action="">
                                @csrf
                                <div class="tab-content">
                                    <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                        <h4>Formulir 1</h4>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="inputFirstName" class="form-label">1. Tanggal</label>
                                                <input required type="date" name="tanggal" class="form-control"
                                                    id="tanggal">
                                                <div class="invalid-feedback">Example invalid select feedback</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nomor" class="form-label">2. Nomor</label>
                                                <input required type="text" id="nomorsurat" name="nomor"
                                                    value="{{ $totalspptahun }}" class="form-control" id="nomor">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputState2" class="form-label">3. Sifat Pembayaran</label>
                                                <select required name="sifat_pembayaran" id="sifatpembayaran"
                                                    class="single-select">
                                                    <option disabled selected>Pilih Sifat Pembayaran</option>
                                                    @foreach ($SP as $j)
                                                        <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputState" class="form-label">4. Jenis Pembayaran</label>
                                                <select required name="jenis_pembayaran" id="jenispembayaran"
                                                    class="single-select">
                                                    <option disabled selected>Pilih Jenis Pembayaran</option>
                                                    @foreach ($JP as $j)
                                                        <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                        <h4>Formulir 2</h4>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">1. Jenis Dokumen</label>
                                                <select name="jenis_dokumen" class="single-select">

                                                    <option selected disabled>Pilih jenis dokumen</option>
                                                    <option value="null">None</option>
                                                    @foreach ($jenis_dokumen as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">2. Dasar Pembayaran</label>
                                                <select name="dasar_pembayaran" class="single-select">
                                                    <option selected disabled>Pilih dasar pembayaran</option>
                                                    <option value="null">None</option>
                                                    @foreach ($dasar_pembayaran as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">3. Cara Bayar</label>
                                                <select name="cara_bayar" class="single-select">
                                                    <option selected disabled>Pilih cara bayar</option>
                                                    <option value="null">None</option>
                                                    @foreach ($cara_bayar as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">4. Jenis SPM</label>
                                                <select name="jenis_spm" class="single-select">
                                                    <option selected disabled>Pilih jenis spm</option>
                                                    <option value="null">None</option>
                                                    @foreach ($jenis_spm as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">5. Sumber Dana</label>
                                                <select name="sumber_dana" class="single-select">
                                                    <option selected disabled>Pilih sumber dana</option>
                                                    <option value="null">None</option>
                                                    @foreach ($sumber_dana as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">6. Kewenangan Pelaksanaan</label>
                                                <select name="kewenangan_pelaksanaan" class="single-select">
                                                    <option selected disabled>Pilih kewenangan pelaksanaan</option>
                                                    <option value="null">None</option>
                                                    @foreach ($kewenangan_pelaksanaan as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">7. Jenis Belanja</label>
                                                <select name="jenis_belanja" class="single-select">
                                                    <option selected disabled>Pilih Jenis Belanja</option>
                                                    <option value="null">None</option>
                                                    @foreach ($jb as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->kode }} -
                                                            {{ $jk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">8. Asal Penerimaan</label>
                                                <select name="asal_penerimaan" class="single-select">
                                                    <option selected disabled>Pilih Asal Penerimaan</option>
                                                    <option value="null">None</option>
                                                    @foreach ($asal_penerimaan as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">9. Supplier</label>
                                                <select id="pilihsupplier" name="supplier" class="single-select">
                                                    <option selected disabled>Pilih suplier</option>
                                                    <option value="null">None</option>
                                                    @foreach ($supplier as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">

                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" name="id_rkakl" value="{{ $datark->id }}">
                                    <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                        <h4>Formulir 3</h4>
                                        <div class="row g-3">

                                            <div class="col-md-12">
                                                <label class="form-label">Tabel RKA-KL</label>
                                                <div class="table-responsive">
                                                    <table id="tablerkakl" class="table table-hover table-bordered"
                                                        style="width:100%">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kegiatan</th>
                                                                <th>KRO</th>
                                                                <th>Anggaran</th>
                                                                <th>Sisa</th>
                                                                <th>Jumlah</th>
                                                                <th>Select</th>

                                                            </tr>
                                                        </thead>
                                                        @php $no = 1; @endphp
                                                        <tbody id="bodytable">
                                                            @foreach ($datark->datarab as $item)
                                                                <tr data-row="{{ $item->id }}"
                                                                    class="disable table table-secondary">
                                                                    <td>{{ $no }}</td>
                                                                    <td>{{ $item->kegiatanr->kode }} -
                                                                        {{ $item->kegiatanr->nama }}
                                                                    </td>
                                                                    <td>{{ $item->kror->nama }}</td>
                                                                    <td>@money($item->anggaran, 'IDR', 'true')</td>
                                                                    <td>@money($item->sisa, 'IDR', 'true')</td>
                                                                    <td><input disabled data-id="{{ $item->id }}"
                                                                            id="inputanggaran{{ $item->id }}"
                                                                            class="form-control"
                                                                            onkeyup="showMe(this, {{ $item->anggaran }})"
                                                                            name="anggaran[]" max="5"
                                                                            onfocusout="showMe2(this)" type="number"></td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input name="rabnya[]"
                                                                                class="form-check-input checkrab"
                                                                                type="checkbox" value="{{ $item->id }}"
                                                                                id="flexCheckDefault{{ $item->id }}">
                                                                            <label class="form-check-label"
                                                                                for="flexCheckDefault{{ $item->id }}">Pilih
                                                                            </label>
                                                                        </div>
                                                                    </td>


                                                                </tr>
                                                                @php $no++ @endphp
                                                            @endforeach

                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">2. Jumlah Pembayaran</label>
                                                <input disabled type="text" class="form-control" id="totaljumlah">
                                            </div>
                                            <input type="hidden" id="jumlahnya" name="jumlah">
                                            <div class="col-md-12">
                                                <label class="form-label">3. Keperluan</label>
                                                <textarea name="keperluan" class="form-control" id="" cols="30" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                        <h4>Pejabat Penanda Tangan</h4>
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label class="form-label">1. Nama Penguji SPP / Penerbit SPM</label>
                                                <select name="p_spp" class="single-select">
                                                    <option selected disabled>Pilih pejabat</option>
                                                    <option value="null">None</option>
                                                    @foreach ($pejabat as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->nama }} -
                                                            {{ $jk->jabatan ?? ' ' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">2. Nama Pejabat Pembuat Komitmen</label>
                                                <select name="p_komitmen" class="single-select">
                                                    <option selected disabled>Pilih pejabat</option>
                                                    <option value="null">None</option>
                                                    @foreach ($pejabat as $jk)
                                                        <option value="{{ $jk->id }}">{{ $jk->nama }} -
                                                            {{ $jk->jabatan ?? ' ' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary btn-sm prev-btn" type="button"><i
                                    class="bx bx-chevron-left-circle"></i></button>
                            <button class="btn btn-primary btn-sm next-btn" type="button"><i
                                    class="bx bx-chevron-right-circle"></i></button>
                            <button id="submitdata" class="btn btn-primary btn-sm kirim-btn d-none" type="button"><i
                                    class="bx bx-refresh mr-1"></i>Submit</button>
                        </div>
                    </div>
                </div>
                <div id="supplierinfo" class="card d-none">
                    <div class="card-body">
                        <h5 class="d-flex align-items-center mb-3">Informasi Supplier</h5>
                        <div class="row xc mb-3">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Supplier</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="namas" class="form-control form-control-sm" disabled value="">
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Alamat Supplier</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="alamats" class="form-control form-control-sm" disabled value="">
                            </div>
                        </div>
                        <div class="row xc mb-3">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Nama Rekening</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="namarekenings" class="form-control form-control-sm" disabled
                                    value="">
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Nomor Rekening</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="nomorrekenings" class="form-control form-control-sm" disabled
                                    value="">
                            </div>
                        </div>
                        <div class="row xc mb-3">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Nama Bank</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="namabanks" class="form-control form-control-sm" disabled value="">
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">NPWP</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="npwps" class="form-control form-control-sm" disabled value="">
                            </div>
                        </div>
                        <div class="row xc mb-3">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Nama Bank Pusat</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="namabankpusats" class="form-control form-control-sm" disabled
                                    value="">
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Kode Bank Pusat</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="kodebankpusats" class="form-control form-control-sm" disabled
                                    value="">
                            </div>
                        </div>
                        <div class="row xc mb-3">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Swift</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="swifts" class="form-control form-control-sm" disabled value="">
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Tipe SUP</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="tipesups" class="form-control form-control-sm" disabled value="">
                            </div>
                        </div>
                        <div class="row xc mb-3">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Negara</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="negaras" class="form-control form-control-sm" disabled value="">
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Domisili</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="domisilis" class="form-control form-control-sm" disabled value="">
                            </div>
                        </div>
                        <div class="row xc mb-3">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Nomor Telepon</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="telpons" class="form-control form-control-sm" disabled value="">
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" id="emails" class="form-control form-control-sm" disabled value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />

        <hr>
    </div>
@endsection
@push('js')
    <!--notification js -->
    <script src="{{ asset('v/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('v/assets/plugins/notifications/js/notifications.min.js') }}"></script>
    <script src="{{ asset('v/assets/js/akunting.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script src="{{ asset('v/assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
    <script src="{{ asset('v/assets/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
    <script src="{{ asset('v/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>
    <script>
        $(".xc").hide();
        $("#submitdata").on('click', function() {
            $("#formdata").trigger('submit');
        });
        var totaljumlah = [];
        $("#totaljumlah").val(totaljumlah);
        var url = window.location.origin;
        $(".checkrab").on('change', function() {
            var cltest = $(this).closest('tr');
            let id = cltest[0].attributes[0].value;
            if ($(this).is(':checked')) {
                cltest.removeClass('table-secondary').addClass('table-success');
                $("#inputanggaran" + id).removeAttr('disabled')
            } else {
                cltest.removeClass('table-success').addClass('table-secondary');
                $("#inputanggaran" + id).prop('disabled', true)
                $("#inputanggaran" + id).val('');
                delete totaljumlah[id];
                const sum = totaljumlah.reduce((partialSum, a) => parseInt(partialSum) + parseInt(a), 0);
                console.log(sum); // 6
                if (isNaN(sum)) {

                    $("#totaljumlah").val(0);
                } else {
                    let he = accounting.formatMoney(sum);
                    $("#totaljumlah").val(he);
                }
                $("#jumlahnya").val(sum)

            }
        })

        function showMe(e, anggaran) {
            let id = e.attributes[0].value;

            if (anggaran < e.value) {
                round_error_noti("Anggaran Tidak Mencukupi");
                $("#inputanggaran" + id).val(anggaran);
            }
            if (e.value == 0) {
                $("#inputanggaran" + id).val('');
            }
        }

        function showMe2(e) {
            let n = parseInt(e.value);
            let id = e.attributes[0].value;
            totaljumlah[id] = e.value;
            const sum = totaljumlah.reduce((partialSum, a) => parseInt(partialSum) + parseInt(a), 0);
            console.log(sum); // 6
            let he = accounting.formatMoney(sum);

            $("#totaljumlah").val(he);
            $("#jumlahnya").val(sum)
        }
        $("#pilihsupplier").on('change', function(id) {
            $(".xc").hide();
            $.LoadingOverlay("show");
            id = $(this).val();
            $.ajax({
                url: url + '/admin/getsupplier/' + id,
                type: "GET",
                success: function(id) {
                    console.log(id);
                    $("#namas").val(id.nama)
                    $("#alamats").val(id.alamat)
                    $("#namarekenings").val(id.nama_rek)
                    $("#nomorrekenings").val(id.no_rek)
                    $("#npwps").val(id.npwp)
                    $("#namabanks").val(id.bank)
                    $("#namabankpusats").val(id.bank_pusat)
                    $("#kodebankpusats").val(id.kode_bank_pusat)
                    $("#swifts").val(id.swift)
                    $("#tipesups").val(id.tipe_sup)
                    $("#negaras").val(id.kode_negara + ' - ' + id.negara)
                    $("#domisilis").val(id.provinsi + ' - ' + id.kota + ' / ' + id.kode_pos)
                    $("#telpons").val(id.telp)
                    $("#emails").val(id.email)
                    $.LoadingOverlay("hide");
                    $(".xc").show();
                }
            })
        })
        $("#formdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('spp.store') }}',
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
                        var result = Object.keys(data).map((key, index) => [data[key]]);
                        var resultkey = Object.keys(data).map((key, index) => [data[index]]);
                        console.log(resultkey)
                        elem =
                            '<div><ul>';
                        result.forEach(function(data, id) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        round_error_noti(elem);
                    } else {
                        round_success_noti();
                        console.log(id);
                        window.location.href = "{{ url('admin/spp/cetak') }}" + '/' + id.id;
                    }
                }
            })


        })
        $(document).ready(function() {
            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish').addClass('btn btn-info').on('click', function() {
                alert('Finish Clicked');
            });
            var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger').on('click',
                function() {
                    $('#smartwizard').smartWizard("reset");
                });
            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                $(".prev-btn").removeClass('disabled');
                $(".next-btn").removeClass('disabled');
                $(".kirim-btn").addClass('d-none');

                if (stepNumber == 1) {
                    $("#supplierinfo").removeClass('d-none');
                } else {
                    $("#supplierinfo").addClass('d-none');

                }
                if (stepPosition === 'first') {
                    $(".prev-btn").addClass('disabled');
                } else if (stepPosition === 'last') {
                    $(".next-btn").addClass('disabled');
                    $(".kirim-btn").removeClass('d-none');

                } else {
                    $(".prev-btn").removeClass('disabled');
                    $(".next-btn").removeClass('disabled');
                }
            });
            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots',
                transition: {
                    animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                },
                toolbarSettings: {
                    toolbarPosition: 'none', // both bottom
                }
            });
            // External Button Events
            $(".reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });
            $(".prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });
            $(".next-btn").on("click", function() {
                // Navigate next
                // if ($("#tanggal").val() != '') {
                //     $('#smartwizard').smartWizard("next");
                //     return true;
                // } else {
                //     round_error_noti("error ges");

                // }
                $('#smartwizard').smartWizard("next");
                return true;
            });




            // Demo Button Events
            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });


        });
    </script>
@endpush
