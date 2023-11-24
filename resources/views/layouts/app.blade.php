<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fraud Tracking System Beta</title>
    <style>
        .btn-pagination {
            padding: 8px 16px;
            margin: 0 4px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-pagination:hover {
            background-color: #45a049;
        }

        .btn-pagination.active {
            background-color: #2196f3;
        }
    </style>
</head>
<body>
    <header>
        <!-- Header content goes here -->
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- Footer content goes here -->
    </footer>
</body>
</html>
