<!DOCTYPE html>
<html lang="en">

<head>




    <style>
        .bordered {
            border: 2px solid black;
        }

        * {
            font-size: 10px;
            font-family: sans-serif;
            box-sizing: border-box;

        }

        .column {
            float: left;
            width: 50%;
            padding: 5px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .border-table {
            border: 0px solid black;
        }

        .center-table {
            margin-left: auto;
            margin-right: auto;
        }

        .judul {
            font-size: 17px
        }

        .tc {
            text-align: center;
            padding: 0;
        }

        html {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
        }

        td,
        th {

            padding: 3px;
        }


        tr.borderless td {
            border: 2px;
        }

        tr.bgrow {
            background-color: #dddddd;
        }

        .p {
            font-size: 10px;
        }
    </style>
    <!-- icons -->
</head>
@include('pdf.css')

<body>

    <div id="wrapper">

        @yield('content')

    </div>





    <!-- App js -->

</body>

</html>
