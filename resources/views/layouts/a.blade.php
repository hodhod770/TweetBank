<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تقرير</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@livewireStyles
    <style>
        @page {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Cairo', sans-serif;
            margin: 20px;
            padding: 0;
            background-color: beige
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: #fff;
            padding: 20px;
            /* width: 595px; */
            /* height: 100vh; */
        }
        .card-header {
            background-color: #f8f9fa;
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }
        .card-body {
            padding: 20px;
        }
    </style>
</head>
<body>
  {{$slot}}
     @livewireScripts
    <!-- تحميل Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>