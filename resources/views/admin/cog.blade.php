@extends('base')
@section('css')
    <link href="{{ asset('v/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('v/assets/plugins/notifications/css/lobibox.min.css') }}" />
@endsection
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Pengaturan Aplikasi</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-cog"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Aplikasi</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div style="vertical-align: bottom">
            <div>
                <h6 class="mb-0 ">Manajemen Pengaturan Website </h6>
            </div>

        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <form id="tambahdata">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-cog me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Informasi Aplikasi</h5>
                        </div>
                        <hr />
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama Aplikasi</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" value="{{ $data->nama_aplikasi }}" class="form-control"
                                    id="inputEnterYourName" placeholder="Enter Text">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourVersi" class="col-sm-3 col-form-label">Versi Aplikasi</label>
                            <div class="col-sm-9">
                                <input type="text" name="versi" value="{{ $data->nama_app }}" class="form-control"
                                    id="inputEnterYourVersi" placeholder="Enter Text">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <input type="text" name="deskripsi" value="{{ $data->desc }}" class="form-control"
                                    id="deskripsi" placeholder="Phone No">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email </label>
                            <div class="col-sm-9">
                                <input type="email" name="email" value="{{ $data->email }}" class="form-control"
                                    id="inputEmailAddress2" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fileP" class="col-sm-3 col-form-label">Logo</label>
                            <div class="col-sm-9">
                                <input type="file" name="file" class="form-control" id="fileP" placeholder=" No">
                            </div>
                            <img src="" class="img-thumbnail mt-1" id="preview" alt="">
                            <div class="d-none" id="infoimage"></div>
                        </div>
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-cog me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Unit Satuan Kerja</h5>
                        </div>
                        <hr />

                        <div class="row mb-3">
                            <label for="lembaga" class="col-sm-3 col-form-label">Lembaga</label>
                            <div class="col-sm-9">
                                <input type="text" name="lembaga" value="{{ $data->lembaga }}" class="form-control"
                                    id="lembaga" placeholder="Enter Text">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="unit" class="col-sm-3 col-form-label">Unit</label>
                            <div class="col-sm-9">
                                <input type="text" name="unit" value="{{ $data->unit }}" class="form-control" id="unit"
                                    placeholder="Enter Text">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="satker" class="col-sm-3 col-form-label">Satker</label>
                            <div class="col-sm-9">
                                <input type="text" name="satker" value="{{ $data->satker }}" class="form-control"
                                    id="satker" placeholder="Enter Text">
                            </div>
                        </div>
                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <div class="row mb-3">
                            <label for="tempat" class="col-sm-3 col-form-label">Tempat</label>
                            <div class="col-sm-9">
                                <input type="text" name="tempat" value="{{ $data->tempat }}" class="form-control"
                                    id="tempat" placeholder="Enter Text">
                            </div>
                        </div>
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-cog me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Alamat</h5>
                        </div>
                        <hr />
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" value="{{ $data->alamat }}" class="form-control"
                                    id="alamat" placeholder="Enter Text">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                            <div class="col-sm-9">
                                <input type="text" name="lokasi" value="{{ $data->lokasi }}" class="form-control"
                                    id="lokasi" placeholder="Enter Text">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button id="submitbtn" type="submit" class="btn btn-info px-5">Simpan</button>
                            </div>
                        </div>
                    </form>
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
    <script src="{{ asset('v/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ">
    </script>
    <script>
        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }
        fileP.onchange = evt => {
            const [file] = fileP.files
            if (file) {
                preview.src = URL.createObjectURL(file)
                $("#infoimage").removeClass("d-none").html('File Size: ' + bytesToSize(fileP.files[0].size))
            }
        }

        $("#preview").on('click', function() {
            $("#fileP").val('');
            preview.src = '';
            $("#preview").html('');
            $("#infoimage").html('');
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = window.location.origin;




        $("#tambahdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('setting.store') }}',
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
                        round_error_noti(elem);
                    } else {
                        $('#exampleLargeModal').modal('hide');
                        round_success_noti();

                        tabel.ajax.reload();

                    }
                }
            })


        })
    </script>
@endpush
