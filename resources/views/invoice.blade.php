<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bridgestone Tyre Warranty Card</title>
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin_assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <style>
        table, tr, th, td {
            border-bottom-width: 2px;
            border-bottom-style: dotted;
            border-bottom-color: #1B4E8D;
            padding: 20px 0px 20px 0px;
        }

        th {
            text-align: left;
            font-size: large;
            font-weight: bold;
        }

        td {
            text-align: right;
            font-size: large;
            font-weight: bold;
        }

        .warranty-title {
            text-align: center;
            font-size: 50px;
        }

        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            width: 100%;
            padding-right: calc(var(--bs-gutter-x)* .5);
            padding-left: calc(var(--bs-gutter-x)* .5);
            margin-right: auto;
            margin-left: auto;
        }
    </style>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</head>

<body>
    <div class="warranty-card">
        <div class="container">
            <div class="warranty-header">
                <h2 class="warranty-title">Warranty Information</h2>
                <div class="warranty-company-info">
                    <p>Muahammed Musliyar K P</p>
                    <p><i class="bi bi-telephone-fill"></i> 1/680, Kunthippuzha, Mannarkad - 678 583</p>
                    <p><i class="bx bxs-map"></i></p>
                </div>
            </div>
            <div class="row mb-4 mt-4">
                <div class="col-md-1 col-2 col-sm-1">
                    <i class="ri-car-line bg-dark text-light p-2"></i>
                </div>
                <div class="col-md-3 col-8 col-sm-5">
                    Vehicle Make
                    <br>
                    TOYOTA
                </div>
                <div class="col-md-1 col-2 col-sm-1">
                    <i class="ri-car-line bg-dark text-light p-2"></i>
                </div>
                <div class="col-md-3 col-8 col-sm-5">
                    Vehicle Make
                    <br>
                    TOYOTA
                </div>
                <div class="col-md-1 col-2 col-sm-1">
                    <i class="ri-car-line bg-dark text-light p-2"></i>
                </div>
                <div class="col-md-3 col-8 col-sm-3">
                    Registration No.
                    <br>
                    KL A 1010025
                </div>
            </div>
            <table style="width:100%">
                <tr>
                    <th> Warranty ID</th>
                    <td> D693</td>
                </tr>
                <tr>
                    <th> Registration Date</th>
                    <td> Tue 16, Jul 2024</td>
                </tr>
                <tr>
                    <th> Size</th>
                    <td> 265 | 65 R17</td>
                </tr>
                <tr>
                    <th> Brand</th>
                    <td> D693</td>
                </tr>
                <tr>
                    <th> Pattern</th>
                    <td> D693</td>
                </tr>
                <tr>
                    <th> Serial Numbers</th>
                    <td> 22-24</td>
                </tr>
                <tr>
                    <th> Week-Year</th>
                    <td> 22-24</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
