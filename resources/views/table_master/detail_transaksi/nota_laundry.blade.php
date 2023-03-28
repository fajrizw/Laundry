<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Pesanan Laundry</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        }

        #total {
            float: right;
        }

        #right {
            float: right;
        }

        .card {
            position: relative;
            border-style: groove;
            border-width: 1px;
            border-color: rgba(0, 0, 0, 0.175);
            border-radius: 5px;
        }

        .card-header {
            opacity: 1px;
            border: 2px black;
            background-color: #0d6efd;
            padding: 10px;
            border-radius: 5px;
        }

        .card-footer {
            opacity: 1px;
            border: 2px black;
            background-color: #0d6efd;
            padding: 10px;
            border-radius: 5px;
        }

        .image-container {
            position: relative;
            max-width: 100%;
            height: auto;
            overflow: hidden;
            display: inline-block;
            /* hide extra space from overflowing image */
        }

        .image-wrapper {
            display: block;
            position: relative;
        }

        img {
            width: 100%;
            /* set image width to 100% of its container */
            height: auto;
            /* maintain image aspect ratio */
            display: block;
            /* remove any extra space that may be caused by default inline display */
        }


        .image-label {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: absolute;
            margin-top: 160px;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            box-sizing: border-box;

        }

        .image-label h3 {
            margin: 0;
            /* remove default margin */
            color: #455ED3;
        }

        .text-muted {
            color: rgba(33, 37, 41, 0.75);
        }

        th {
            color: rgba(33, 37, 41, 0.75);
            font-weight: normal;

        }

        #firstTable th {
            padding-bottom: 10px;

        }

        #firstTable tr:first-child {
            padding-top: 20px;
        }

    </style>

</head>

<body>


    <div class="card col-xl-6 m-auto">
        <div class="card-header bg-primary"></div>
        <div class="card-body">

            <div class="container">

                <div class="image-container">
                    <div class="image-wrapper">
                        <img src="img/LaundryLogo-removebg-preview.png" alt="Your Image" height="400px">
                        <div class="image-label">
                            <h3 class="mt-3 ms-4" style="font-size: 40px;">BubbleBox</h3>
                        </div>
                    </div>
                </div>


                <hr style="margin: 1rem 0;
                            color: inherit;
                            border: 1px;
                            border-top: var(--bs-border-width) solid;
                            opacity: .25;">

                <div class="row mx-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Invoice</th>
                                <th scope="col" style="text-align: right;">Tanggal Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-weight: bold; font-size: 1.2em;">{{ $transaksi->kode_invoice }}
                                </td>
                                <td style="text-align: right;  font-weight: bold; ">{{ $transaksi->tgl_bayar }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <hr style="margin: 1rem 0;
                                color: inherit;
                                border: 1px;
                                border-top: var(--bs-border-width) solid;
                                opacity: .25;">
                <div class="row mx-3">
                    <table class="table" id="firstTable">
                        <thead>
                            <tr>
                                <th scope="col">Member</th>
                                <th scope="col" style="text-align: right;">Kasir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $transaksi->member->nama }}</td>
                                <td style="text-align: right;">{{ $transaksi->user->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ $transaksi->member->alamat }}</td>
                                <td style="text-align: right;"><i
                                        class="fas fa-dollar-sign"></i>{{ $transaksi->user->outlet->alamat_outlet }}
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-phone"></i>{{ $transaksi->member->tlp }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr style="margin: 1rem 0;
                                    color: inherit;
                                    border: 1px;
                                    border-top: var(--bs-border-width) solid;
                                    opacity: .25;">
                <div class="row mx-3">
                    <table class="table" id="firstTable">
                        <thead>
                            <tr>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $transaksi->paket->nama_paket }}</td>
                                <td style="text-align: right;">{{ $transaksi->paket->harga }}</td>
                            </tr>
                            <tr>
                                <td>Biaya Admin</td>
                                <td style="text-align: right;"><i
                                        class="fas fa-dollar-sign"></i>{{ $transaksi->outlet->biaya_admin}}
                                </td>
                            </tr>
                            <tr>
                                <td>Pajak</td>
                                <td style="text-align: right;">{{ $transaksi->pajak}}</td>
                            </tr>
                            <tr>
                                <td>Diskon</td>
                                <td style="text-align: right; color:red;">-{{ $transaksi->voucher->diskon}}</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <hr style="border: 2px solid black;">
                <div class="row mx-3">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Total</td>
                                <td style="text-align: right;">{{ 'Rp. '. number_format(round($transaksi_pertama), 0, ',', '.') }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>




            </div>
            <div class="card-footer bg-primary"></div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
