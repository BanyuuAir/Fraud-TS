<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fraud Tracking System Beta</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Button Styles */
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

        /* Body Styles */
        body, html {
            height: 100%;
            margin: 0;
        }

        /* Navigation Bar Styles */
        .navbar {
            background-color: transparent;
            border: none;
            position: absolute;
            top: 0;
            width: 100%;
            transition: background-color 0.5s ease-in-out;
        }

        .navbar .navbar-brand {
            color: #000;
            font-size: 1.5rem;
            font-weight: bold;
            transition: color 0.5s ease-in-out;
        }

        .navbar .navbar-nav {
            margin-left: auto;
        }

        .navbar .nav-item {
            margin: 0 10px;
            font-size: 17px;
        }

        .navbar-nav .nav-item:hover .nav-link {
            color: #ffffff;
        }

        .navbar-nav .nav-item:hover {
            background-color: #fd4556;
        }

        .navbar .nav-link {
            color: #fff;
            transition: color 0.5s ease-in-out;
            font-family: 'Franklin Gothic Medium';
        }

        /* Video Background Styles */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .background-image {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* Image Box Styles */
        .imgbox {
            display: grid;
            height: 100%;
        }

        .center-fit {
            max-width: 100%;
            max-height: 100vh;
            margin: auto;
        }

        /* Button Group Styles */
        .btn-group {
            margin-top: 20px;
        }

        .btn-group .btn {
            margin: 5px;
        }

        /* Rain Animation Styles */
        .rain-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .raindrop {
            position: absolute;
            width: 2px;
            height: 15px;
            background-color: rgb(255, 0, 34);
            animation: fall linear infinite, colorChange 3s linear infinite;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh);
            }
        }

        @keyframes colorChange {
            0%, 100% {
                background-color: #fd4556;
            }
            50% {
                background-color: #fa45fd;
            }
        }

        /* Explanation Box Styles */
        .explanation-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            text-align: center;
            text-align: justify;
            box-shadow: 0 0 20px rgba(149, 34, 34, 0.611);
        }

        .explanation-box h2 {
            color: #ffffff;
            text-align: center;
        }

        .explanation-box p {
            color: #cbcbcb;
            margin: 5px 0;
        }

        /* Responsive Styles */
        @media (max-width: 767px) {
            .explanation-box {
                width: 80%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        }
    </style>
    <!-- resources/views/layouts/app.blade.php -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
