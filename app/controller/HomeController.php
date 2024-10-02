<?php

namespace Pzn\BelajarMVC\Controller;

use Pzn\BelajarMVC\App\View;

class HomeController
{
    public function index()
    {
        $model = [
            'title' => 'Belajar PHP MVC',
            'content' => 'Selamat Belajar MVC'
        ];

        view::render('Home/index', $model);
    }

    public function login()
    {
        $model = [
            'title' => 'Login',
            'error' => '',
        ];

        // Menyertakan logika login
        $result = require __DIR__ . '/../Model/login.php'; // Ambil hasil dari login.php

        // Memeriksa apakah hasil adalah string
        if (is_string($result)) {
            // Jika hasil adalah string (role atau error)
            if ($result === 'dashboard_seller' || $result === 'dashboard_buyer') {
                header('Location: /' . $result); // Arahkan ke dashboard sesuai role
                exit;
            } else {
                // Set error jika ada
                $model['error'] = $result; // Set error jika ada
            }
        }

        View::render('Home/login', $model);
    }


    public function dashboard_buyer()
    {
        // Periksa apakah pengguna sudah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login'); // Redirect ke halaman login jika belum login
            exit;
        }

        // Ambil data buku dari model
        $data = include __DIR__ . '/../model/dashboard_buyer.php';

        // Render tampilan dashboard_buyer dengan data buku
        View::render('Home/dashboard_buyer', $data);
    }

    public function dashboard_seller()
    {
        // Periksa apakah pengguna sudah login
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login'); // Redirect ke halaman login jika belum login
            exit;
        }

        // Pastikan pengguna adalah seller
        if ($_SESSION['role'] !== 'seller') {
            header('Location: /'); // Redirect ke halaman utama jika bukan seller
            exit;
        }

        $model = [
            'title' => 'Dashboard Seller',
            'error' => '',
        ];

        // Menyertakan logika dashboard seller
        $soldBooks = require __DIR__ . '/../model/dashboard_seller.php'; // Ambil hasil dari dashboard_seller.php

        // Render view dashboard seller
        View::render('Home/dashboard_seller', [
            'title' => $model['title'],
            'soldBooks' => $soldBooks,
        ]);
    }


    public function transaksi()
    {
        // Mengambil data dari model
        $book = require __DIR__ . '/../Model/transaksi.php';

        // Menggunakan View::render untuk menampilkan halaman transaksi
        View::render('home/transaksi', ['book' => $book]);
    }


    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /'); // Redirect to login page
        exit;
    }

    public function register()
    {
        $model = [
            'title' => 'Register',
            'error' => '',
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Menyertakan logika registrasi
            $result = require __DIR__ . '/../model/register.php'; // Ambil hasil dari register.php

            // Memeriksa apakah hasil adalah string untuk error
            if (is_string($result)) {
                $model['error'] = $result; // Set error jika ada
            } else {
                // Jika berhasil, arahkan ke halaman login
                header('Location: /login');
                exit;
            }
        }

        View::render('Home/register', $model);
    }

    public function about(){
        echo 'halo guys';
    }
}
