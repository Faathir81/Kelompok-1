<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($model['title']) ?></title>
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
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: inherit;
            background-size: inherit;
            background-position: inherit;
            background-repeat: inherit;
            filter: blur(8px);
            z-index: -1;
        }

        .registration-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 100%;
            z-index: 1;
        }

        .registration-container h1 {
            color: beige;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .registration-container label {
            display: block;
            font-size: 1.2rem;
            margin: 10px 0 5px;
            color: beige;
        }

        .registration-container input,
        .registration-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            color: black; /* Teks input berwarna hitam */
        }

        .registration-container input[type="text"],
        .registration-container input[type="email"],
        .registration-container input[type="password"] {
            background-color: #f0f0f0;
        }

        .registration-container button {
            background-color: white;
            color: #333;
            border: none;
            border-radius: 5px;
            padding: 12px;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .registration-container button:hover {
            background-color: beige;
        }

        .registration-container p {
            margin-top: 20px;
            color: beige;
        }

        .registration-container a {
            color: beige;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <h1><?= htmlspecialchars($model['title']) ?></h1>
        <form method="POST" action="/register">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="buyer">Buyer</option>
                <option value="seller">Seller</option>
            </select>

            <button type="submit">Register</button>
        </form>
        <p><a href="/login">Sudah memiliki akun? Masuk di sini.</a></p>
    </div>
</body>

</html>
