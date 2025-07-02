<?php

namespace Config;

use CodeIgniter\Routing\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

// =======================================================
// 🔧 ROUTING DEFAULT
// =======================================================
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // Jika ingin auto-routing aktif

// =======================================================
// 🌐 ROUTING HALAMAN UMUM (User Page)
// =======================================================
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

// =======================================================
// 📄 ROUTING ARTIKEL UNTUK USER
// =======================================================
$routes->get('/artikel', 'Artikel::index');                        // Tampilkan semua artikel
$routes->get('/artikel/(:segment)', 'Artikel::view/$1');          // Detail artikel (slug)
$routes->get('/kategori/(:segment)', 'Artikel::kategori/$1');     // Artikel berdasarkan kategori

// =======================================================
// 🛠️ ROUTING ARTIKEL UNTUK ADMIN
// =======================================================
$routes->get('/admin/artikel', 'Artikel::admin_index');               // Tampilkan daftar artikel admin
$routes->get('/admin/artikel/add', 'Artikel::add');                   // Form tambah
$routes->match(['get', 'post'], '/admin/artikel/add', 'Artikel::add');
$routes->get('/admin/artikel/edit/(:num)', 'Artikel::edit/$1');       // Form edit
$routes->post('/admin/artikel/edit/(:num)', 'Artikel::edit/$1');      // Proses edit
$routes->get('/admin/artikel/delete/(:num)', 'Artikel::delete/$1');   // Hapus artikel

// =======================================================
// 🔁 ROUTING UNTUK AJAX / API (contoh: Vue.js / frontend JS)
// =======================================================
$routes->get('/post', 'Post::index');                 // Ambil semua artikel (API)
$routes->post('/post', 'Post::create');               // Tambah data
$routes->put('/post/(:num)', 'Post::update/$1');      // Update data
$routes->delete('/post/(:num)', 'Post::delete/$1');   // Hapus data

// =======================================================
// ➕ ROUTING TAMBAHAN (Opsional)
// =======================================================
// =======================================================
// 👤 ROUTING USER LOGIN & LOGOUT
// =======================================================
$routes->get('/user/login', 'User::login');
$routes->post('/user/login', 'User::login'); // Untuk proses login (form POST)
$routes->get('/user/logout', 'User::logout');

$routes->get('/admin', 'Admin::dashboard');

