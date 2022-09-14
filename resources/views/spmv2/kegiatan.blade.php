@extends('layouts.appv2')

@push('prepend-style')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
    {{ $page }}
@endsection
@section('toolbar')
    <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
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
                                class="form-control form-control-solid w-250px ps-14" placeholder="Cari Kegiatan" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
                        <button  data-bs-toggle="modal" data-bs-target="#exampleLargeModal" class="btn btn-primary">Tambah
                            Kegiatan</button>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-sm table-row-dashed fs-6 gy-5" id="example">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Jumlah KRO</th>
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

    {{-- modal --}}

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
                          <input type="text" id="kodeu" name="kode" placeholder="Input Nama"
                              class="form-control" />
                      </div><!-- input-group -->
                      <br>
                      <label class="form-label">Kegiatan</label>
                      <div class="input-group">
                          <input type="text" id="namau" name="nama" placeholder="Input Nama"
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
                          <input type="text" id="kodekro" name="kode" placeholder="Input "
                              class="form-control" />
                      </div><!-- input-group -->
                      <br>
                      <label class="form-label">KRO</label>
                      <div class="input-group">
                          <input type="text" id="kro" name="nama" placeholder="Input "
                              class="form-control" />
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
                          <input type="text" id="kodero" name="kode" placeholder="Input "
                              class="form-control" />
                      </div><!-- input-group -->
                      <br>
                      <label class="form-label">RO</label>
                      <div class="input-group">
                          <input type="text" id="ro" name="nama" placeholder="Input "
                              class="form-control" />
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
                          <input type="text" id="kodekom" name="kode" placeholder="Input "
                              class="form-control" />
                      </div><!-- input-group -->
                      <br>
                      <label class="form-label">Komponen</label>
                      <div class="input-group">
                          <input type="text" id="komponen" name="nama" placeholder="Input "
                              class="form-control" />
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
                datarow += `<tr class='table-info table-sm' data-pos='${nokro}' id='datakro-${nokro}' data-last='${((d['kroitem'].length - 1) == key  ) ? "1" : "0"}' data-bab='${JSON.stringify(id)}'> 
                    <td class='table-info'> <b> KRO </b> </td>
                    <td>-> ${id['kode']} - ${id['nama']} </td>
                    <td> 
                    <div class='d-flex justify-content-between'>
                <p>RO (${id['roitem'].length})  </p>
                <div>                <button  class='btn btn-sm btn-warning rolist'> <i class='fa fa-arrow-down'> </i> </button>
                <button type='button'  onclick='addro("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class="fa fa-plus-circle"> </i> </button>

                </div>
                </div>    
                    </td>
                    <td>   <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='updkro("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'> </i>  </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='delkro("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash-alt'> </i> </button>
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
                <div>                <button  class='btn btn-sm btn-warning komponenlist'> <i class='fa fa-arrow-down'> </i> </button>
                <button type='button'  onclick='addkomponen("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class="fa fa-plus-circle"> </i> </button>

                </div>
                </div>    
                    </td>
                    <td>   <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='updro("${id['kode']}","${id['nama']}","${id['id']}")' class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'> </i>  </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='delro("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash-alt'> </i> </button>
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
                <div>                <button  class='btn btn-sm btn-warning subkomponenlist'> <i class='fa fa-arrow-down'> </i> </button>
                <button type='button'  onclick='addsubkomponen("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class="fa fa-plus-circle"> </i> </button>

                </div>
                </div>    
                    </td>
                    <td>   <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='updkom("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'> </i>  </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='delkom("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash-alt'> </i> </button>
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
                <button type='button'  onclick='addsubkomponen("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class="fa fa-plus-circle"> </i> </button>

                </div>
                </div>    
                    </td>
                    <td>   <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='updsubkom("${id['kode']}","${id['nama']}","${id['id']}")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'> </i>  </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='delsubkom("${id['id']}")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash-alt'> </i> </button>
                    </li>
               
                </ul> </td>
                </tr>`;
                nosubkom++;
            });
            return datarow;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('')
            }
        });
        $(document).ready(function() {
       
            tabel = $("#example").DataTable({
              "drawCallback": function(settings) {
                    var api = this.api();
                  $(".krolist").trigger('click');   
                  $(".rolist").trigger('click');                  
               
                  $(".komponenlist").trigger('click');                  
                  $(".subkomponenlist").trigger('click');                  

                },
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
                        width: "10%",
                    },


                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('kegiatan.indexv2') }}",
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
            const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
            filterSearch.addEventListener('keyup', function(e) {
                tabel.search(e.target.value).draw();
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
                                                toastFun(2);

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
                                                toastFun(2);

                    } else {
                        $('#exampleLargeModalkro').modal('hide');
                                                toastFun(1);


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
                                                toastFun(2);

                    } else {
                        $('#exampleLargeModalkro').modal('hide');
                                                toastFun(1);


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
                                                toastFun(2);

                    } else {
                        $('#exampleLargeModalkro').modal('hide');
                                                toastFun(1);


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
                                                toastFun(2);

                    } else {
                        $('#exampleLargeModalkro').modal('hide');
                                                toastFun(1);


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
                                                toastFun(2);


                    } else {
                                                toastFun(1);

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
                                                toastFun(2);


                    } else {
                                                toastFun(1);

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
                                                toastFun(2);


                    } else {
                                                toastFun(1);

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
                                                toastFun(2);


                    } else {
                                                toastFun(1);

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
                                                toastFun(2);


                    } else {
                                                toastFun(1);

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
