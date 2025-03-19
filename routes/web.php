<?php

use App\Http\Controllers\MuebleController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Reservas;
use App\Mail\SuperadoUmbral;
use App\Mail\SuperadoUmbralMd;
use App\Models\Noticia;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portada', [
        'noticias' => Noticia::orderBy('created_at', 'desc')->paginate(8),
    ]);
})->name('home');

Route::resource('noticias', NoticiaController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/correo', function () {
    Mail::to('destinatario@pepito.com')->send(new SuperadoUmbralMd);
});

Route::get('/reservas', Reservas::class)->middleware('auth');

Route::resource('muebles', MuebleController::class);
