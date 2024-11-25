<?php

use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DentistaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Models\Atendimento;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('pacientes', PacienteController::class)->names([
        'index' => 'pacientes.index',
        'show' => 'paciente.show',
        'update' => 'pacientes.update',
        'destroy' => 'paciente.delete',
        'create' => 'paciente.create',
        'store' => 'paciente.store'
    ]);

    Route::resource('dentistas', DentistaController::class)->names([
        'index' => 'dentistas.index',
        'show' => 'dentista.show',
        'update' => 'dentista.update',
        'destroy' => 'dentista.delete',
        'create' => 'dentista.create',
        'store' => 'dentista.store',
    ]);

    Route::resource('atendimentos', AtendimentoController::class)
    ->except(['show'])
    ->names([
        'index' => 'atendimentos.index',
        'update' => 'atendimento.update',
        'edit' => 'atendimento.edit',
        'destroy' => 'atendimento.delete',
        'create' => 'atendimento.create',
        'store' => 'atendimento.store'
    ]);
});

require __DIR__.'/auth.php';
