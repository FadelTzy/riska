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
        <h1 class="judul" style="text-align: center;  line-height: normal;    ">KEMENTERIAN PENDIDIKAN DAN
            KEBUDAYAAN <br> SURAT PERINTAH MEMBAYAR <br>
            Tanggal: {{ $arr->tgl_spk }} Nomor : {{ $arr->no_spk }}</h1>

    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <h1>Kuasa Bendahara Umum Negara, Kantor Pelayanan Perbendaharaan Negara Makassar I (054)</h1>

    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <h1>Agar melakukan pembayaran sejumlah @money($total, 'IDR', 'true')
        </h1>

    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <h1>*** {{ strtoupper(Terbilang($total)) }} ***
        </h1>
    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">

        <table class="" style="text-align:left; width: 100%">

            <tbody>
                <tr>
                    <td style="width: 40%"> Jenis : {{ $arr->js->nama }} {{ $arr->js->desc }} </td>
                    <td style="width: 30%"> Cara Bayar : {{ $arr->cb->nama }} {{ $arr->cb->desc }} </td>
                    <td style="width: 30%;text-align:right"> Tahun Anggaran : {{ $rkakl->tahun_anggaran }} </td>

                </tr>
            </tbody>
        </table>
    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">

        <table class="" style="text-align:left; width: 100%">

            <tbody>
                <tr>
                    <td style="width: 40%"> Dasar Pembayaran </td>
                    <td style="width: 15%"> Satker </td>
                    <td style="width: 15%;text-align:left"> Kewenangan </td>
                    <td style="width: 30%;text-align:left"> Nama Satker </td>

                </tr>
                <tr style="vertical-align: top">
                    <td style="width: 40%"> {{ $arr->dp->nama }} <br> (01) DIPA-023.17.2.677523/2021 <br> TANGGAL
                        {{ $arr->tgl_spk }} <br> NO.DIPA-023.17.2.677523/2021</td>
                    <td style="width: 15%"> 677523 </td>
                    <td style="width: 15%;text-align:left"> KD </td>
                    <td style="width: 30%;text-align:left"> {{ $profil->satker }} </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">
                        <table class="" style="text-align:left; width: 100%">
                            <tbody>
                                <tr>
                                    <td colspan="2" style="width: 50%"> Fungsi, Sub Fungsi, BA, Unit Es I, Program </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%"> 10,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        06,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        023,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 17,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WA
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%"> Kegiatan, Output, Lokasi </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%"> 4257,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        EAA,&nbsp;&nbsp;&nbsp;&nbsp; 19.51
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Pembayaran</td>
                                    <td>: 1 Pengeluaran</td>
                                </tr>
                                <tr>
                                    <td>Sifat Pembayaran</td>
                                    <td>: 4 Pembayaran Langsung</td>
                                </tr>
                                <tr>
                                    <td>Sumber Dana/ Cara Penarikan</td>
                                    <td>: 01.0 RM/RM</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <table style="text-align:left; width: 100%;">
            <tbody>
                <tr class="borderrow">
                    <td colspan="2" style="text-align:center;border: 0.5px solid black;width: 50%">PENGELUARAN</td>
                    <td colspan="2" style="text-align:center;border: 0.5px solid black;width: 50%">POTONGAN</td>
                </tr>
                <tr>
                    <td style="text-align:center;border: 0.5px solid black;">Jenis Belanja</td>
                    <td style="text-align:center;border: 0.5px solid black;">Jumlah Uang</td>
                    <td style="text-align:center;border: 0.5px solid black;">BA.Unit.Lok.Akun.Satker</td>
                    <td style="text-align:center;border: 0.5px solid black;">Jumlah Uang</td>
                </tr>
                <tr>
                    <td style="height:200px;text-align:center;border: 0.5px solid black;"></td>
                    <td style="text-align:right;border: 0.5px solid black;vertical-align: top;">@money($total, 'IDR', 'true')</td>
                    <td style="text-align:right;border: 0.5px solid black;"></td>
                    <td style="text-align:right;border: 0.5px solid black;"></td>
                </tr>
                <tr>
                    <td style="text-align:right;border: 0.5px solid black;">Jumlah Pengeluaran</td>
                    <td style="text-align:right;border: 0.5px solid black;">@money($total, 'IDR', 'true')</td>
                    <td style="text-align:right;border: 0.5px solid black;">Jumlah Potongan</td>
                    <td style="text-align:right;border: 0.5px solid black;"></td>
                </tr>
                <tr>
                    <td style="text-align:right;"></td>
                    <td style="text-align:right;"></td>
                    <td style="text-align:right;"></td>
                    <td style="text-align:right;border: 0.5px solid black;">@money($total, 'IDR', 'true')</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table style="text-align:left; width: 100%;">
            <tbody>
                <tr class="borderrow">
                    <td style="width: 20%">Kepada</td>
                    <td style="">: {{ $arr->supplier->nama }}</td>
                </tr>
                <tr class="">
                    <td style="">NPWP</td>
                    <td style="">: {{ $arr->supplier->npwp }}</td>
                </tr>
                <tr class="">
                    <td style="">Rekening</td>
                    <td style="">: {{ $arr->supplier->no_rek }} ({{ $arr->supplier->nama_rek }}) </td>
                </tr>
                <tr class="">
                    <td style="">Bank / Pos</td>
                    <td style="">: {{ $arr->supplier->bank }} / {{ $arr->supplier->kode_pos }} </td>
                </tr>
                <tr class="">
                    <td style="">Uraian</td>
                    <td style="">: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus iusto cupiditate
                        laboriosam quidem totam mollitia iure libero id neque voluptatum! Porro vero nostrum facilis aut?
                        Magnam aut praesentium temporibus earum. </td>
                </tr>
            </tbody>
        </table>
    </div>

    <table style="width: 100%;line-height:1" class="bordered">
        <thead>
            <tr>
                <td style="width: 65%; border: 0px">
                    <ul>
                        <li>Semua bukti - bukti pengeluaran yang disahkan Pejabat Pembuat Komitmen telah diuji dan
                            dinyatakan memenuhi persyaratan untuk disajikan pembayaran atas beban APBN, selanjutnya bukti -
                            bukti pengeluaran dimaksud disimpan dan ditatausahakan oleh Pejabat Penandatangan SPM</li>
                        <li>Kebenaran perhitungan dan isi yang tertuang dalam SPM in menjadi tanggung jawab Pejabat
                            Penandatangan SPM</li>
                    </ul>
                </td>
                <td style="width:35%;border: 0px">
                    <p>Makassar, {{ $arr->tgl_spk }} </p>
                    <p>A.n Kuasa Pengguna Anggaran</p>
                    <p>Pejabat Penanda Tangan SPM</p>
                    <br><br><br>
                    <p> {{ $arr->pejabat_pk->nama }}</p>

                    <p>NIP. {{ $arr->pejabat_pk->nip }} </p>
                </td>
            </tr>
        </thead>
    </table>


@endsection
