@extends('pdf.layouts')
@section('css')
@endsection
@section('content')

    @if ($arr->dataakunrkakl->count() == 1)
        @php $total = $arr->dataakunrkakl[0]->jumlah @endphp
    @else
        @foreach ($arr->dataakunrkakl as $item)
            @php $total += $item->jumlah @endphp
        @endforeach
    @endif


    <br>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <table style="text-align:left; width: 100%;">
            <tbody>
                <tr class="borderrow">
                    <td style="text-align:center;height:20px;border: 0.5px solid black;width: 50%">
                        <span style="font-weight: bold">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br> UNIVERSITAS NEGERI
                            MAKASSAR</span>
                    </td>
                    <td rowspan="2"
                        style="height:20px;text-align:center;vertical-align: top;border: 0.5px solid black;width: 50%"><span
                            style="font-weight: bold">SURAT PERINTAH PENCAIRAN DANA</span>
                        <table class="" style="text-align:left; width: 100%">
                            <tbody>

                                <tr>
                                    <td>Dari</td>
                                    <td>: {{ $profil->satker }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>: 4 Pembayaran Langsung</td>
                                </tr>
                                <tr>
                                    <td>Nomor</td>
                                    <td>: 01.0 RM/RM</td>
                                </tr>
                                <tr>
                                    <td>Tahun Anggaran</td>
                                    <td>: 2022</td>
                                </tr>
                                <tr>
                                    <td>Kepada Yth</td>
                                    <td>: bank</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;border: 0.5px solid black;">
                        <table class="" style="text-align:left; width: 100%">
                            <tbody>

                                <tr>
                                    <td>NO. SPM</td>
                                    <td>: {{ $profil->satker }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>: 4 Pembayaran Langsung</td>
                                </tr>
                                <tr>
                                    <td>Unit Kerja / Fakultas</td>
                                    <td>: 01.0 RM/RM</td>
                                </tr>
                                <tr>
                                    <td>Kode UK</td>
                                    <td>: 2022</td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>



            </tbody>
        </table>
        <br>

    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <table class="" style="text-align:left; width: 50%">
            <tbody>

                <tr>
                    <td>Klasifikasi Belanja</td>
                    <td>: 41 (Pajak)</td>
                </tr>


            </tbody>
        </table>
    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <table style="text-align:left; width: 100%;">
            <tbody>
                <tr class="borderrow">
                    <td style="">Bank / Pos &nbsp;&nbsp;&nbsp; : BANK NEGARA INDONESIA 1946 KCP. UNM</td>
                </tr>

                <tr class="borderrow">
                    <td style="">Hendaklah mencairkan/memindahbukukan dari Bank Rekening Nomor 5405409778</td>
                </tr>
                <tr class="borderrow">
                    <td style="">1 Giro Bank &nbsp; &nbsp; &nbsp; &nbsp; @money($total, 'IDR', 'true')</td>
                </tr>
            </tbody>
        </table>

    </div>

    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <h1>*** {{ strtoupper(Terbilang($total)) }} ***
        </h1>
    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <h1 style="color:white">.
        </h1>
    </div>

    <div style="padding: 5px;" class="bordered">

        <table class="" style="text-align:left; width: 100%">
            <tbody>

                <tr>
                    <td style="width: 15%">Nama Wajib Pajak</td>
                    <td>: 1 Pengeluaran</td>
                </tr>
                <tr>
                    <td>NPWP</td>
                    <td>: 4 Pembayaran Langsung</td>
                </tr>
                <tr>
                    <td>Yaitu</td>
                    <td>: 01.0 RM/RM</td>
                </tr>
            </tbody>
        </table>
        <br><br><br>
        <table style="width: 100%;line-height:1" class="">
            <thead>
                <tr>
                    <td style="width: 65%; border: 0px">

                        <p>.</p>
                        <p>Diterima oleh penguji SPP / Penerbit SPM,</p>
                        <p>{{ $profil->satker }}</p>
                        <br><br><br>
                        <p>{{ $arr->pejabat_pp->nama }} </p>

                        <p>NIP. {{ $arr->pejabat_pp->nip }} </p>
                    </td>
                    <td style="width:35%;border: 0px">
                        <p>Kota Makassar, {{ $arr->tgl_spk }} </p>
                        <p>Pejabat Pembuat Komitmen,</p>
                        <p>{{ $profil->satker }}</p>
                        <br><br><br>
                        <p> {{ $arr->pejabat_pk->nama }}</p>

                        <p>NIP. {{ $arr->pejabat_pk->nip }} </p>
                    </td>
                </tr>
            </thead>
        </table>
    </div>




@endsection
