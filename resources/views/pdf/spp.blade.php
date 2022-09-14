@extends('pdf.layouts')
@section('css')
@endsection
@section('content')
    <h2 class="" style="text-align: center;">PENILAIAN SKP</h2>



    <table style="width: 100%;" class="">
        <thead>
            <tr>
                <td style="width: 80%; border: 0px">


                </td>
                <td style="width:20%;border: 0px">
                    <p>Makassar, ....../....../..........</p>
                    <p>Pejabat Penilai Kinerja,</p>
                    <br><br><br>
                    <p><u> </u></p>

                    <p>NIP. </p>
                </td>
            </tr>
        </thead>
    </table>

    {{-- <tr class="borderless">
        <td colspan="5">
            <p>Pejabat Penilai,</p>
            <br><br><br>
            <p><u> {{ $ap->nama }}</u></p>

            <p>NIP. {{ $ap->nip }}</p>

        </td>
        <td colspan="3">
            <p>Makassar, {{ $tanggal }}</p>
            <p>PNS Yang Dinilai,</p>
            <br><br><br>
            <p><u> {{ Auth::user()->nama }}</u></p>

            <p>NIP. {{ Auth::user()->nip }}</p>
        </td>
    </tr> --}}
@endsection
