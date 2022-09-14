@extends('base')
@section('css')
    <link href="{{ asset('v/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('v/assets/plugins/notifications/css/lobibox.min.css') }}" />
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
                        <li class="breadcrumb-item active" aria-current="page">Data Kegiatan</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
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
                            <label class="form-label">Kode</label>
                            <div class="input-group">
                                <input type="text" name="kode" placeholder="Input Kode" class="form-control" />

                            </div><!-- input-group -->

                            <br>
                            <label class="form-label">Kegiatan</label>
                            <div class="input-group">
                                <input type="text" name="nama" placeholder="Input Nama" class="form-control" />

                            </div><!-- input-group -->

                            <br>

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
                            <label class="form-label">Kode</label>
                            <div class="input-group">
                                <input type="text" id="kodeu" name="kode" placeholder="Input Nama" class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Kegiatan</label>
                            <div class="input-group">
                                <input type="text" id="namau" name="nama" placeholder="Input Nama" class="form-control" />

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
        <div class="modal fade" id="exampleLargeModalukro" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data KRO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="editdatakro" class=" form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="idukro">
                            <br>
                            <label class="form-label">Kode</label>
                            <div class="input-group">
                                <input type="text" id="kodeukro" name="kode" placeholder="Input Nama"
                                    class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">KRO</label>
                            <div class="input-group">
                                <input type="text" id="namaukro" name="nama" placeholder="Input Nama"
                                    class="form-control" />

                            </div><!-- input-group -->



                            <br>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitbtnukro" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleLargeModaluro" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data RO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="editdataro" class=" form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="iduro">
                            <br>
                            <label class="form-label">Kode</label>
                            <div class="input-group">
                                <input type="text" id="kodeuro" name="kode" placeholder="Input Nama"
                                    class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">KRO</label>
                            <div class="input-group">
                                <input type="text" id="namauro" name="nama" placeholder="Input Nama"
                                    class="form-control" />

                            </div><!-- input-group -->



                            <br>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitbtnuro" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleLargeModalukom" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Komponen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="editdatakom" class=" form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="idukom">
                            <br>
                            <label class="form-label">Kode</label>
                            <div class="input-group">
                                <input type="text" id="kodeukom" name="kode" placeholder="Input Nama"
                                    class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Komponen</label>
                            <div class="input-group">
                                <input type="text" id="namaukom" name="nama" placeholder="Input Nama"
                                    class="form-control" />

                            </div><!-- input-group -->
                            <br>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitbtnukom" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleLargeModalusubkom" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Sub - Komponen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="editdatasubkom" class=" form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="idusubkom">
                            <br>
                            <label class="form-label">Kode</label>
                            <div class="input-group">
                                <input type="text" id="kodeusubkom" name="kode" placeholder="Input Nama"
                                    class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Sub - Komponen</label>
                            <div class="input-group">
                                <input type="text" id="namausubkom" name="nama" placeholder="Input Nama"
                                    class="form-control" />
                            </div><!-- input-group -->
                            <br>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitbtnusubkom" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleLargeModalkro" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data KRO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="datakro" class=" form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="idkro">
                            <br>
                            <label class="form-label">Kode - Kegiatan</label>
                            <div class="input-group">
                                <input type="text" id="koke" disabled class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Kode</label>
                            <div class="input-group">
                                <input type="text" id="kodekro" name="kode" placeholder="Input " class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">KRO</label>
                            <div class="input-group">
                                <input type="text" id="kro" name="nama" placeholder="Input " class="form-control" />
                            </div><!-- input-group -->
                            <br>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitbtnkro" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleLargeModalro" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data RO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="dataro" class=" form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="idro">
                            <br>
                            <label class="form-label">Kode - KRO</label>
                            <div class="input-group">
                                <input type="text" id="koro" disabled class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Kode</label>
                            <div class="input-group">
                                <input type="text" id="kodero" name="kode" placeholder="Input " class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">RO</label>
                            <div class="input-group">
                                <input type="text" id="ro" name="nama" placeholder="Input " class="form-control" />
                            </div><!-- input-group -->
                            <br>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitbtnro" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleLargeModalkomponen" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Komponen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="datakom" class=" form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="idkomponen">
                            <br>
                            <label class="form-label">Kode - RO</label>
                            <div class="input-group">
                                <input type="text" id="kokom" disabled class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Kode</label>
                            <div class="input-group">
                                <input type="text" id="kodekom" name="kode" placeholder="Input " class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Komponen</label>
                            <div class="input-group">
                                <input type="text" id="komponen" name="nama" placeholder="Input " class="form-control" />
                            </div><!-- input-group -->
                            <br>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitbtnkom" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleLargeModalsubkomponen" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Sub - Komponen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="datasubkom" class=" form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="idsubkomponen">
                            <br>
                            <label class="form-label">Kode - RO</label>
                            <div class="input-group">
                                <input type="text" id="kosubkom" disabled class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Kode</label>
                            <div class="input-group">
                                <input type="text" id="kodesubkom" name="kode" placeholder="Input "
                                    class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Subkomponen</label>
                            <div class="input-group">
                                <input type="text" id="subkomponen" name="nama" placeholder="Input "
                                    class="form-control" />
                            </div><!-- input-group -->
                            <br>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitbtnsubkom" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div style="vertical-align: bottom" class="d-flex justify-content-between">
            <h6 class="mb-0 text-uppercase">Manajemen Data Kegiatan </h6>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>

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
    <script src="{{ asset('v/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ">
    </script>
    <script>
        function format(d) {
            // `d` is the original data object for the row
            var datarow = '';
            datarow += `<tr class='table-info'> 
                 <td> <b> -> </b></td>
                 <td> <b> -> KRO </b></td>
                 <td> <b> RO </b></td>
                 <td> <b> Aksi </b></td>
                </tr>`;
            var nokro = 1;

            d['kroitem'].forEach((id, key) => {

                var datarr = id;
                datarow += `<tr class='table-info' data-pos='${nokro}' id='datakro-${nokro}' data-last='${((d['kroitem'].length - 1) == key  ) ? "1" : "0"}' data-bab='${JSON.stringify(id)}'> 
                    <td class='table-info'> <b> KRO </b> </td>
                    <td>-> ${id['kode']} - ${id['nama']} </td>
                    <td> 
                        <div class='d-flex justify-content-between'>
                <p>RO (${id['roitem'].length})  </p>
                <div>                <button  class='btn btn-sm btn-warning rolist'> <i class='bx bx-down-arrow-circle'> </i> </button>
                <button type='button'  onclick='addro("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class="bx bx-plus-circle"> </i> </button>

                </div>
                </div>    
                    </td>
                    <td>   <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='updkro("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='bx bx-edit'> </i>  </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='delkro("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='bx bx-trash-alt'> </i> </button>
                    </li>
               
                </ul> </td>
                </tr>`;
                nokro++;
            });
            return datarow;
        }

        function formatro(d) {
            // `d` is the original data object for the row
            var datarow = '';
            datarow += `<tr class='table-warning'> 
                 <td> <b> ->-> </b></td>
                 <td> <b>->-> RO </b></td>
                 <td> <b> Komponen </b></td>
                 <td> <b> Aksi </b></td>
                </tr>`;
            var noro = 1;
            d['roitem'].forEach((id, key) => {
                var datarr = id;
                console.log(key, 'key')
                datarow += `<tr class='table-warning' data-pos='${noro}'  id='dataro-${noro}' data-last='${((d['roitem'].length - 1) == key  ) ? "1" : "0"}' data-bab='${JSON.stringify(id)}'> 
                    <td > <b> RO </b> </td>
                    <td>->-> ${id['kode']} - ${id['nama']} </td>
                    <td> 
                        <div class='d-flex justify-content-between'>
                <p>Komponen (${id['komponenitem'].length})  </p>
                <div>                <button  class='btn btn-sm btn-warning komponenlist'> <i class='bx bx-down-arrow-circle'> </i> </button>
                <button type='button'  onclick='addkomponen("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class="bx bx-plus-circle"> </i> </button>

                </div>
                </div>    
                    </td>
                    <td>   <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='updro("${id['kode']}","${id['nama']}","${id['id']}")' class='btn btn-sm btn-success btn-xs mb-1'><i class='bx bx-edit'> </i>  </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='delro("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='bx bx-trash-alt'> </i> </button>
                    </li>
               
                </ul> </td>
                </tr>`;
                noro++;
            });
            return datarow;
        }

        function formatkomponen(d) {
            // `d` is the original data object for the row
            var datarow = '';
            datarow += `<tr class='table-secondary'> 
                 <td> <b> ->->-> </b></td>
                 <td> <b>->->-> Komponen </b></td>
                 <td> <b> Subkomponen </b></td>
                 <td> <b> Aksi </b></td>
                </tr>`;
            var nokom = 1;
            d['komponenitem'].forEach((id, key) => {
                var datarr = id;
                datarow += `<tr class='table-secondary' data-pos='${nokom}'  id='datakom-${nokom}' data-last='${((d['komponenitem'].length - 1) == key  ) ? "1" : "0"}' data-bab='${JSON.stringify(id)}'> 
                    <td > <b> Komponen </b> </td>
                    <td>->->-> ${id['kode']} - ${id['nama']} </td>
                    <td> 
                        <div class='d-flex justify-content-between'>
                <p>Subkomponen (${id['subkomponenitem'].length})  </p>
                <div>                <button  class='btn btn-sm btn-warning subkomponenlist'> <i class='bx bx-down-arrow-circle'> </i> </button>
                <button type='button'  onclick='addsubkomponen("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class="bx bx-plus-circle"> </i> </button>

                </div>
                </div>    
                    </td>
                    <td>   <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='updkom("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='bx bx-edit'> </i>  </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='delkom("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='bx bx-trash-alt'> </i> </button>
                    </li>
               
                </ul> </td>
                </tr>`;
                nokom++;
            });
            return datarow;
        }

        function formatsubkomponen(d) {
            // `d` is the original data object for the row
            var datarow = '';
            datarow += `<tr class='table-danger'> 
                 <td> <b> ->->->-> </b></td>
                 <td> <b>->->->-> SubKomponen </b></td>
                 <td> <b> Subkomponen </b></td>
                 <td> <b> Aksi </b></td>
                </tr>`;
            var nosubkom = 1;
            console.log(d);
            d['subkomponenitem'].forEach((id, key) => {
                var datarr = id;
                datarow += `<tr class='table-danger' data-pos='${nosubkom}'  id='datasubkom-${nosubkom}' data-last='${((d['subkomponenitem'].length - 1) == key  ) ? "1" : "0"}' data-bab='${JSON.stringify(id)}'> 
                    <td > <b>Sub Komponen </b> </td>
                    <td>->->->-> ${id['kode']} - ${id['nama']} </td>
                    <td> 
                        <div class='d-flex justify-content-between'>
                <p>-  </p>
                <div>          
                <button type='button'  onclick='addsubkomponen("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class="bx bx-plus-circle"> </i> </button>

                </div>
                </div>    
                    </td>
                    <td>   <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='updsubkom("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='bx bx-edit'> </i>  </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='delsubkom("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='bx bx-trash-alt'> </i> </button>
                    </li>
               
                </ul> </td>
                </tr>`;
                nosubkom++;
            });
            return datarow;
        }
        jQuery(document).ready(function() {

            tabel = $("#example").DataTable({
                columnDefs: [{
                        targets: 0,
                        width: "1%",
                        orderable: false,
                    },
                    {
                        targets: 1,
                        width: "40%",

                    },
                    {
                        orderable: false,
                        width: "30%",

                        targets: 2,

                    },
                    {
                        orderable: false,

                        targets: 3,
                        width: "4%",

                    },


                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('kegiatan.index') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'kodenama',
                        data: 'kodenama'
                    },
                    {
                        nama: 'kro',
                        data: 'kro',

                    },

                    {
                        name: 'aksi',
                        data: 'aksi',
                    }
                ],

            });

            $('#example tbody').on('click', '.krolist', function() {
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

            $('#example tbody').on('click', '.rolist', function() {
                var tr = $(this).closest('tr');
                var row = tabel.row(tr);

                var datajson = tr[0]['attributes']['data-bab']['value']
                var datalast = tr[0]['attributes']['data-last']['value']
                var datapos = tr[0]['attributes']['data-pos']['value']

                var jsonData = JSON.parse(datajson);

                if ($(tr).hasClass('ada')) {
                    $(tr).removeClass('ada');
                    var jsonId = 'datakro-' + (parseInt(datapos) + 1);

                    var lengthD = jsonData['roitem'].length;

                    console.log(lengthD, 'datanya');
                    if (lengthD == 0) {
                        $(tr.next()).remove();

                    } else {
                        var anu = $(tr.next());
                        console.log(anu, 'adakah');
                        if (datalast == 1) {
                            $(tr.nextUntil('[role="row"]')).remove();
                        } else {

                            $(tr.nextUntil('[id="' + jsonId + '"]')).remove();
                        }
                    }

                } else {
                    $(tr).addClass('ada');

                    $(tr).after(formatro(jsonData));
                }
            });
            $('#example tbody').on('click', '.komponenlist', function() {
                var tr = $(this).closest('tr');
                var row = tabel.row(tr);

                var datajson = tr[0]['attributes']['data-bab']['value']
                var datalast = tr[0]['attributes']['data-last']['value']
                var datapos = tr[0]['attributes']['data-pos']['value']
                console.log(datapos, 'datapos');
                var jsonData = JSON.parse(datajson);

                if ($(tr).hasClass('ada')) {
                    $(tr).removeClass('ada');
                    var jsonId = 'dataro-' + (parseInt(datapos) + 1);
                    var lengthD = jsonData['komponenitem'].length;

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
            $('#example tbody').on('click', '.subkomponenlist', function() {
                var tr = $(this).closest('tr');
                var row = tabel.row(tr);

                var datajson = tr[0]['attributes']['data-bab']['value']
                var datalast = tr[0]['attributes']['data-last']['value']
                var datapos = tr[0]['attributes']['data-pos']['value']
                console.log(datalast, 'datalast');
                var jsonData = JSON.parse(datajson);

                if ($(tr).hasClass('ada')) {
                    $(tr).removeClass('ada');
                    var jsonId = 'datakom-' + (parseInt(datapos) + 1);
                    var lengthD = jsonData['subkomponenitem'].length;

                    if (lengthD == 0) {
                        $(tr.next()).remove();
                        console.log(1);
                    } else {
                        if (datalast == 1) {
                            console.log(2);
                            $(tr.nextUntil('[role="row"]')).remove();
                        } else {
                            console.log(3);
                            $(tr.nextUntil('[id="' + jsonId + '"]')).remove();
                        }


                    }

                } else {
                    $(tr).addClass('ada');

                    $(tr).after(formatsubkomponen(jsonData));
                }
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
                    url: url + '/admin/kegiatan/' + id,
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
                url: '{{ route('kegiatan.store') }}',
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
        $("#submitbtnukro").on('click', function() {
            $("#editdatakro").trigger('submit');
        });
        $("#submitbtnuro").on('click', function() {
            $("#editdataro").trigger('submit');
        });
        $("#submitbtnukom").on('click', function() {
            $("#editdatakom").trigger('submit');
        });
        $("#submitbtnusubkom").on('click', function() {
            $("#editdatasubkom").trigger('submit');
        });
        $("#submitbtnkro").on('click', function() {
            $("#datakro").trigger('submit');
        });
        $("#submitbtnro").on('click', function() {
            $("#dataro").trigger('submit');
        });
        $("#submitbtnkom").on('click', function() {
            $("#datakom").trigger('submit');
        });
        $("#submitbtnsubkom").on('click', function() {
            $("#datasubkom").trigger('submit');
        });
        $("#datasubkom").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('subkomponen.store') }}',
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
                        $('#exampleLargeModalkro').modal('hide');
                        round_success_noti();

                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#datakom").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('komponen.store') }}',
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
                        $('#exampleLargeModalkro').modal('hide');
                        round_success_noti();

                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#dataro").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('ro.store') }}',
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
                        $('#exampleLargeModalkro').modal('hide');
                        round_success_noti();

                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#datakro").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('kro.store') }}',
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
                        $('#exampleLargeModalkro').modal('hide');
                        round_success_noti();

                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#editdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/kegiatan/edit') }}',
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

        $("#editdatakro").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/kro/edit') }}',
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
                        $('#exampleLargeModalukro').modal('hide');
                        tabel.ajax.reload();
                    }
                }
            })
        })
        $("#editdataro").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/ro/edit') }}',
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
                        $('#exampleLargeModaluro').modal('hide');

                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#editdatakom").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/komponen/edit') }}',
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
                        $('#exampleLargeModalukom').modal('hide');

                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#editdatasubkom").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/subkomponen/edit') }}',
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
                        $('#exampleLargeModalusubkom').modal('hide');

                        tabel.ajax.reload();

                    }
                }
            })


        })

        function addkro(id) {
            $('#exampleLargeModalkro').modal('show');

            $("#idkro").val(id.id);
            $("#koke").val(id.kode + ' ' + id.nama);

        }

        function addro(kode, nama, id) {
            $('#exampleLargeModalro').modal('show');
            $("#idro").val(id);
            $("#koro").val(kode + ' ' + nama);
        }

        function addkomponen(kode, nama, id) {
            $('#exampleLargeModalkomponen').modal('show');
            $("#idkomponen").val(id);
            $("#kokom").val(kode + ' ' + nama);
        }


        function addsubkomponen(kode, nama, id) {
            $('#exampleLargeModalsubkomponen').modal('show');
            $("#idsubkomponen").val(id);
            $("#kosubkom").val(kode + ' ' + nama);
        }

        function staffupd(id) {
            $('#exampleLargeModalu').modal('show');

            $("#idu").val(id.id);
            $("#namau").val(id.nama);
            $("#kodeu").val(id.kode);
        }

        function updkro(kode, nama, id) {
            $('#exampleLargeModalukro').modal('show');

            $("#idukro").val(id);
            $("#namaukro").val(nama);
            $("#kodeukro").val(kode);
        }

        function updro(kode, nama, id) {
            $('#exampleLargeModaluro').modal('show');

            $("#iduro").val(id);
            $("#namauro").val(nama);
            $("#kodeuro").val(kode);
        }

        function updkom(kode, nama, id) {
            $('#exampleLargeModalukom').modal('show');

            $("#idukom").val(id);
            $("#namaukom").val(nama);
            $("#kodeukom").val(kode);
        }

        function updsubkom(kode, nama, id) {
            $('#exampleLargeModalusubkom').modal('show');

            $("#idusubkom").val(id);
            $("#namausubkom").val(nama);
            $("#kodeusubkom").val(kode);
        }

        function delkro(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/kro/' + id,
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

        function delkom(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/komponen/' + id,
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

        function delsubkom(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/subkomponen/' + id,
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
                    url: url + '/admin/ro/' + id,
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
    </script>
@endpush
