<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PrescriptionController;

Route::apiResource('patients', PatientController::class);
Route::apiResource('doctors', DoctorController::class);
Route::apiResource('appointments', AppointmentController::class);
Route::apiResource('medical_records', MedicalRecordController::class);
Route::apiResource('prescriptions', PrescriptionController::class);
