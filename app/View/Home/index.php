<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model['title'] ?></title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1593642634443-44adaa06623a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: azure;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
        }

        .wrapper {
            width: 100%;
            max-width: 1200px;
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            width: 100%;
            padding: 15px;
            text-align: center;
            color: white;
        }

        .container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            background-color: white;
            color: #333;
            padding: 12px 24px;
            margin: 10px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn:hover {
            background-color: beige; /* Latar belakang berubah menjadi wheat */
            color: #333; /* Teks berubah menjadi warna gelap saat hover */
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="navbar">
            <?php include __DIR__ . '/../layout/navbar.html'; ?>
        </div>

        <div class="container">
            <a href="/login" class="btn">Login</a>
            <a href="/register" class="btn">Register</a>
        </div>
    </div>
</body>

</html>
