@extends('pdf.layouts')
@section('css')
@endsection
@section('content')

    <h1 class="judul" style="text-align: center;">SURAT PERMINTAAN PEMBAYARAN</h1>
    <table class="center-table border-table" style="text-align:left; width: 50%">
        <tbody>
            <tr>
                <td style="width: 35%"> Tanggal</td>
                <td style="width: 30%"> : {{ $arr->tgl_spk }}</td>
                <td style="width: 20%">Nomor</td>
                <td> : {{ $arr->no_spk }}</td>
            </tr>
            <tr>
                <td>Sifat Pembayaran</td>
                <td> : {{ $arr->sp->nama }}</td>
            </tr>
            <tr>
                <td>Jenis Pembayaran</td>
                <td> : {{ $arr->jp->nama }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <div style="border-bottom: 0px solid black;" class="bordered">
        <div class="row ">
            <div class="column">
                <table class="" style="text-align:left; width: 100%">
                    <tbody>
                        <tr>
                            <td style="width: 30%"> 1. Lembaga</td>
                            <td> : {{ $profil->lembaga }}</td>

                        </tr>
                        <tr>
                            <td>2. Unit Organisasi</td>
                            <td> : {{ $profil->unit }}</td>
                        </tr>
                        <tr>
                            <td>3. Kantor/Satker</td>
                            <td> : {{ $profil->satker }}</td>
                        </tr>
                        <tr>
                            <td>4. Lokasi</td>
                            <td> : {{ $profil->lokasi }}</td>
                        </tr>
                        <tr>
                            <td>5. Tempat</td>
                            <td> : {{ $profil->tempat }}</td>
                        </tr>
                        <tr>
                            <td>6. Alamat</td>
                            <td> : {{ $profil->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="column">
                <table class="" style="text-align:left; width: 100%">
                    <tbody>
                        <tr>
                            <td style="width: 30%"> 7. Kegiatan</td>
                            <td> :
                                @if ($arr->dataakunrkakl->count() == 1)
                                    {{ $arr->dataakunrkakl[0]->rab->kegiatanr->nama }}
                                @else
                                    @foreach ($arr->dataakunrkakl as $item)
                                        {{ $item->rab->kegiatanr->nama }},
                                    @endforeach
                                @endif
                            </td>

                        </tr>
                        <tr>
                            <td>8. Kode Kegiatan</td>
                            <td> :
                                @if ($arr->dataakunrkakl->count() == 1)
                                    {{ $arr->dataakunrkakl[0]->rab->kegiatanr->kode }}
                                @else
                                    @foreach ($arr->dataakunrkakl as $item)
                                        {{ $item->rab->kegiatanr->kode }},
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>9. Kode Fungsi, S Fungsi, Program</td>
                            <td> : 00.00.00</td>
                        </tr>
                        <tr>
                            <td>10. Kewenangan Pelaksanaan </td>
                            <td> : {{ $arr->kp->nama }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <p>Kepada:</p>
        <p>Yth. Pejabat Penanda Tangan Surat Perintah</p>
        <p>Membayar {{ $profil->satker }}</p>
        <P>di {{ $profil->tempat }}</P>
        <p>Berdasasrkan DIPA Nomor : DIPA-{{ $arr->no_spk }}, {{ $arr->tgl_spk }}, bersama ini kami ajukan permintaan
            pembayaran sebagai berikut :</p>
        <table class="" style="text-align:left; width: 100%">
            @php $total = 0; @endphp
            @if ($arr->dataakunrkakl->count() == 1)
                @php $total = $arr->dataakunrkakl[0]->jumlah @endphp
            @else
                @foreach ($arr->dataakunrkakl as $item)
                    @php $total += $item->jumlah @endphp
                @endforeach
            @endif
            <tbody>
                <tr>
                    <td style="width: 30%"> 1. Jumlah pembayaran yang diminta</td>
                    <td> :
                        @money($total, 'IDR', 'true')
                    </td>

                </tr>
                <tr>
                    <td>.</td>
                    <td> : ({{ ucfirst(Terbilang($total)) }})</td>
                </tr>
                <tr>
                    <td>2. Keperluan</td>
                    <td> : {{ $arr->keperluan }}</td>
                </tr>
                <tr>
                    <td>3. Jenis Belanja</td>
                    <td> : {{ $arr->jb->kode }} - {{ $arr->jb->nama }}</td>
                </tr>
                <tr>
                    <td>4. Atas Nama</td>
                    <td> : {{ $arr->supplier->nama }}</td>
                </tr>
                <tr>
                    <td>5. Alamat</td>
                    <td> : {{ $arr->supplier->alamat }}</td>
                </tr>
                <tr>
                    <td>6. Mempunyai Rekening</td>
                    <td> : @if ($arr->supplier->no_rek != null)
                            Punya
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>.</td>
                    <td> : Nomor Rekening : {{ $arr->supplier->no_rek }} , NPWP : {{ $arr->supplier->npwp }}
                    </td>
                </tr>
                <tr>
                    <td>7. Nomor dan Tanggal SPK Kontrak</td>
                    <td> : {{ $arr->no_spk }}, {{ $arr->tgl_spk }}
                    </td>
                </tr>
                <tr>
                    <td>8. Nilai SPK Kontrak</td>
                    <td> : @money($arr->nilai_spk, 'IDR', 'true')
                    </td>
                </tr>
                <tr>
                    <td>9. Dengan Penjelasan</td>
                    <td> :
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <table style="text-align:left; width: 100%;">
            <tbody>
                <tr class="borderrow">
                    <td style="width: 1%; border:0.5px solid black">No</td>
                    <td style="width: 38%; border:0.5px solid black;font-size:9px">
                        <p>I KEGIATAN/OUTPUT/MAK (AKUN 6 DIGIT) BERSANGKUTAN</p>
                        <p>II SEMUA KODE KEGIATAN DALAM DIPA</p>
                    </td>
                    <td style="border: 0.5px solid black;width: 17%">PAGU DALAM DIPA/SAKPA (RP)</td>
                    <td style="border: 0.5px solid black;width: 15%">SPP/SPM S.D YANG LALU (RP)</td>
                    <td style="border: 0.5px solid black;width: 15%">SPP INI (RP)</td>
                    <td style="border: 0.5px solid black;width: 15%">JUMLAH S.D SPP INI (RP)</td>
                    <td style="border: 0.5px solid black;width: 17%">SISA DANA (RP)</td>
                </tr>
                @if ($arr->dataakunrkakl->count() == 1)
                    @php $akunrk[] = $arr->dataakunrkakl[0]; @endphp
                @else
                    @foreach ($arr->dataakunrkakl as $item)
                        @php $akunrk[] = $item @endphp
                    @endforeach
                @endif
                <tr>
                    <td style="border: 0.5px solid black;">I</td>
                    <td style="border: 0.5px solid black;">
                        @foreach ($akunrk as $item)
                            <p>
                                {{ $item->rab->kegiatanr->kode }} {{ $item->rab->kror->kode }}
                                {{ $item->rab->ror->kode }}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                {{ $item->rab->komponenr->kode }}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                {{ $item->rab->akunr->kode }}

                            </p>
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totalpagu = 0 @endphp
                        @foreach ($akunrk as $item)
                            @php $totalpagu += $item->rab->anggaran;  @endphp
                            <p>
                                @money($item->rab->anggaran, 'IDR', 'true')
                            </p>
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totalrealisasi = 0 @endphp

                        @foreach ($akunrk as $item)
                            @php $totalrealisasi += $item->rab->realisasi;  @endphp

                            <p>
                                @money($item->rab->realisasi, 'IDR', 'true')
                            </p>
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totalsppini = 0 @endphp
                        @foreach ($akunrk as $item)
                            @php $totalsppini += $item->jumlah;  @endphp

                            <p>
                                @money($item->jumlah, 'IDR', 'true')
                            </p>
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totaljumlahsppini = 0 @endphp

                        @foreach ($akunrk as $item)
                            @php $totaljumlahsppini += $item->jumlah + $item->rab->realisasi;  @endphp

                            <p>
                                @money($item->jumlah + $item->rab->realisasi, 'IDR', 'true')
                            </p>
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totalrabanggaran = 0 @endphp

                        @foreach ($akunrk as $item)
                            @php $totalrabanggaran += $item->rab->anggaran - ($item->jumlah + $item->rab->realisasi);  @endphp

                            <p>
                                @money($item->rab->anggaran - ($item->jumlah + $item->rab->realisasi), 'IDR', 'true')
                            </p>
                        @endforeach
                    </td>
                </tr>
                <tr style="background-color: gray">
                    <td style="border: 0.5px solid black;"></td>
                    <td style="border: 0.5px solid black;">Jumlah 1</td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalpagu, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalrealisasi, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalsppini, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totaljumlahsppini, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalrabanggaran, 'IDR', 'true') </td>

                </tr>
                <tr>
                    <td style="border: 0.5px solid black;">II</td>
                    <td style="border: 0.5px solid black;">
                        <p>SEMUA KEGIATAN</p>
                        @foreach ($rkakl->datarab as $item)
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{ $item->kegiatanr->kode }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{ $item->kror->kode }}
                            <br>
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        <p></p>
                        @php $totalskdipa2 = 0  @endphp

                        @foreach ($rkakl->datarab as $item)
                            @php $totalskdipa = 0  @endphp

                            @foreach ($item->datakro as $item)
                                @php $totalskdipa += $item->anggaran @endphp
                            @endforeach
                            @money($totalskdipa, 'IDR', 'true')
                            <br>
                            @php $totalskdipa2 += $totalskdipa @endphp
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        <p></p>
                        @php
                            $totalskrealisasi2 = 0;
                            $realisasi = [];
                            $sppsaatini = [];
                        @endphp

                        @foreach ($rkakl->datarab as $va => $item)
                            @php $totalskrealisasi = 0;   @endphp

                            @foreach ($item->datakro as $item)
                                @php $totalskrealisasi += $item->realisasi @endphp
                            @endforeach
                            @money($totalskrealisasi, 'IDR', 'true')
                            <br>
                            @php $totalskrealisasi2 += $totalskrealisasi @endphp
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        <p></p>
                        @php $totalsksppisi2 = 0  @endphp

                        @foreach ($rkakl->datarab as $item)
                            @php $totalsksppisi = 0  @endphp

                            @foreach ($item->datakro as $item)
                                @php $totalsksppisi += $item->dataakunrkakl != null ? $item->dataakunrkakl->jumlah : 0 @endphp
                            @endforeach
                            @money($totalsksppisi, 'IDR', 'true')
                            <br>
                            @php $totalsksppisi2 += $totalsksppisi @endphp
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        <p></p>
                        @php $totalskpengurangan2 = 0  @endphp

                        @foreach ($rkakl->datarab as $item)
                            @php $totalskpengurangan = 0  @endphp

                            @foreach ($item->datakro as $item)
                                @php $totalskpengurangan += ($item->realisasi + ($item->dataakunrkakl != null ? $item->dataakunrkakl->jumlah : 0)) @endphp
                            @endforeach
                            @money($totalskpengurangan, 'IDR', 'true')
                            <br>
                            @php $totalskpengurangan2 += $totalskpengurangan @endphp
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        <p></p>
                        @php $totalsktotal2 = 0  @endphp

                        @foreach ($rkakl->datarab as $item)
                            @php $totalsktotal = 0  @endphp

                            @foreach ($item->datakro as $item)
                                @php $totalsktotal += $item->anggaran - ($item->realisasi + ($item->dataakunrkakl != null ? $item->dataakunrkakl->jumlah : 0)) @endphp
                            @endforeach
                            @money($totalsktotal, 'IDR', 'true')
                            <br>
                            @php $totalsktotal2 += $totalsktotal @endphp
                        @endforeach
                    </td>
                </tr>
                <tr style="background-color: gray">
                    <td style="border: 0.5px solid black;"></td>
                    <td style="border: 0.5px solid black;">JUMLAH II</td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalskdipa2, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalskrealisasi2, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalsksppisi2, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalskpengurangan2, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalsktotal2, 'IDR', 'true') </td>
                </tr>
                <tr style="">
                    <td style="border: 0.5px solid black;"></td>
                    <td style="border: 0.5px solid black;" colspan="6">UANG PERSEDIAAN</td>
                </tr>
                <tr style="">
                    <td></td>
                    <td>Lampiran .... Lembar</td>
                    <td style="border: 0.5px solid black;text-align:center">0</td>
                    <td>Surat Buku</td>
                    <td style="border: 0.5px solid black;text-align:center">0</td>
                    <td colspan="2" style="text-align:center">STS .... Lembar</td>

                </tr>
                <tr style="">
                    <td></td>
                    <td style="text-align:right">Pendukung ... Lembar</td>
                    <td></td>
                    <td colspan="2">Pengeluaran ... Lembar</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <table style="width: 100%;line-height:1" class="bordered">
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


@endsection
