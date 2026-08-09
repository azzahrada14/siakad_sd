<!DOCTYPE html>
<html lang="id">


<head>

<meta charset="UTF-8">

<title>Cetak Rapor</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

@page{
    size:A4 portrait;
    margin:0;
}

html,
body{

    margin:0;
    padding:0;
    background:#d9d9d9;
    font-family:Arial,Helvetica,sans-serif;

}

.page{

    width:210mm;
    min-height:297mm;

    margin:25px auto;

    padding:12mm;

    background:#fff;

    box-shadow:0 0 15px rgba(0,0,0,.2);

}

.no-print{

    text-align:center;
    padding:20px;

}

.page-break{

    page-break-after:always;

}

@media print{

    body{
        background:#fff;
    }

    .page{

        margin:0;
        box-shadow:none;
        page-break-after:always;

    }

    .no-print{

        display:none;

    }

    .table-border{
    width:100%;
    border-collapse:collapse;
}

.table-border th,
.table-border td{
    border:1px solid #000;
    padding:5px;
}

}

</style>

</head>

<body>
<div class="no-print">

    <a href="{{ route('rapor.show', $rapor->id) }}"
        style="
            display:inline-block;
            padding:10px 22px;
            background:#6b7280;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
            margin-right:10px;
        ">

        ← Kembali

    </a>

    <button
        onclick="window.print()"
        style="
            padding:10px 22px;
            background:#2563eb;
            color:white;
            border:none;
            border-radius:6px;
            cursor:pointer;
        ">

        🖨 Cetak Rapor

    </button>

</div>

</div>

{{-- HALAMAN COVER --}}
<div class="page">

@include('rapor.cover')

</div>

{{-- HALAMAN 2 --}}
<div class="page">

@include('rapor.page2')

</div>

{{-- HALAMAN 3 --}}
<div class="page">

@include('rapor.page3')

</div>


</body>

</html>