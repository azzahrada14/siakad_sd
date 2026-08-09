{{-- =========================== --}}
{{-- COVER RAPOR --}}
{{-- =========================== --}}

<div style="width:100%; height:245mm; position:relative;">

    {{-- LOGO --}}
    <div style="text-align:center; margin-top:35px; margin-bottom:25px;">

    <img
        src="{{ asset('logo.png') }}"
        style="width:160px; height:auto;">

</div>

    {{-- JUDUL --}}
    <div
        style="
            text-align:center;
            margin-top:30px;
            line-height:1.8;
            font-family:'Times New Roman',serif;
        ">

        <div style="font-size:22pt; font-weight:bold;">
            RAPOR SUMATIF TENGAH SEMESTER
        </div>

        <div style="font-size:18pt; font-weight:bold;">
            PESERTA DIDIK
        </div>

        <div style="font-size:18pt; font-weight:bold;">
            SEKOLAH DASAR
        </div>

        <div style="font-size:18pt; font-weight:bold;">
            (SD)
        </div>

    </div>

    {{-- NAMA --}}
    <div style="margin-top:90px;">

        <div
            style="
                text-align:center;
                font-size:16pt;
                margin-bottom:10px;
            ">

            Nama Peserta Didik :

        </div>

        <table style="width:70%; margin:auto; border-collapse:collapse;">

            <tr>

                <td
                    style="
                        border:2px solid #000;
                        padding:14px;
                        text-align:center;
                        font-size:18pt;
                        font-weight:bold;
                    ">

                    {{ strtoupper($rapor->siswa->nama_siswa) }}

                </td>

            </tr>

        </table>

    </div>

    {{-- NIPD NISN --}}
    <div style="margin-top:40px;">

       <div
    style="
        text-align:center;
        font-size:16pt;
        margin-bottom:10px;
    ">

    NIPD / NISN

</div>

        <table style="width:70%; margin:auto; border-collapse:collapse;">

            <tr>

                <td
                    style="
                        border:2px solid #000;
                        padding:14px;
                        text-align:center;
                        font-size:18pt;
                        font-weight:bold;
                    ">

                    {{ $rapor->siswa->nipd }}

                    /

                    {{ $rapor->siswa->nisn }}

                </td>

            </tr>

        </table>

    </div>

    {{-- FOOTER --}}
    <div
        style="
            position:absolute;
            bottom:45px;
            width:100%;
            text-align:center;
            font-family:'Times New Roman',serif;
            font-size:15pt;
            font-weight:bold;
            line-height:1.7;
        ">

        KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN
        <br>
        REPUBLIK INDONESIA

    </div>

</div>