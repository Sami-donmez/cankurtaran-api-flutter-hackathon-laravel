<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    symlink('/home/makaryta/public_html/storage/app/public', '/home/makaryta/public_html/storage');
    return 'tamam';
});

/*
Mekanlar
mekan adı
mekan il
mekan ilce
mekan tür

FIRSATLAR
resim
fırsat adı
fırsat açıklama
fırsat baslama
fırsat bitis


 * */
