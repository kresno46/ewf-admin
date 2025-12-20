<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\Karier;

class CareerApplicationController extends Controller
{
    public function sendApplication(Request $request)
    {
        Log::info('Received career application request', [
            'position' => $request->input('position'),
            'location' => $request->input('location'),
            'email' => $request->input('email'),
        ]);
        // Validasi input
        $validator = Validator::make($request->all(), [
            'position' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'experience' => 'required|string|max:255',
            'noticePeriod' => 'required|string|max:255',
            'referral' => 'nullable|string|max:255',
            'motivation' => 'required|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // Maksimal 5MB
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Data untuk email
            $emailData = [
                'position' => $request->position,
                'location' => $request->location,
                'fullName' => $request->fullName,
                'email' => $request->email,
                'phone' => $request->phone,
                'experience' => $request->experience,
                'noticePeriod' => $request->noticePeriod,
                'referral' => $request->referral,
                'motivation' => $request->motivation,
                'applicationDate' => Carbon::now()->locale('id')->isoFormat('D MMMM YYYY')
            ];

            // Tentukan email HR dari tabel karier berdasarkan posisi & kota (fallback ke ENV HR_EMAIL)
            $karier = Karier::where('posisi', $request->position)
                ->where('nama_kota', $request->location)
                ->first();
            $hrEmail = optional($karier)->email ?: env('HR_EMAIL', null);

            // Kirim email ke pelamar
            Mail::send('emails.career-application', $emailData, function($message) use ($emailData) {
                $message->to($emailData['email'], $emailData['fullName'])
                        ->subject('Konfirmasi Lamaran - ' . $emailData['position']);

                // Attach CV jika ada
                if (request()->hasFile('cv')) {
                    $message->attach(
                        request()->file('cv')->getRealPath(),
                        [
                            'as' => 'CV_' . $emailData['fullName'] . '.' . request()->file('cv')->getClientOriginalExtension(),
                            'mime' => request()->file('cv')->getMimeType()
                        ]
                    );
                }
            });

            // Kirim email notifikasi ke HRD/Recruiter jika tersedia
            if (!empty($hrEmail)) {
                Mail::send('emails.notification-to-hr', $emailData, function($message) use ($emailData, $hrEmail) {
                    $message->to($hrEmail, 'HRD/Recruiter')
                            ->subject('Lamaran Baru - ' . $emailData['position'] . ' - ' . $emailData['fullName']);

                    // Attach CV jika ada
                    if (request()->hasFile('cv')) {
                        $message->attach(
                            request()->file('cv')->getRealPath(),
                            [
                                'as' => 'CV_' . $emailData['fullName'] . '.' . request()->file('cv')->getClientOriginalExtension(),
                                'mime' => request()->file('cv')->getMimeType()
                            ]
                        );
                    }
                });
                Log::info('Notifikasi dikirim ke HRD', ['email' => $hrEmail]);
            } else {
                Log::warning('HR email not found for given posisi and lokasi, and HR_EMAIL env is not set');
            }

            // Log pengiriman email
            Log::info('Email lamaran berhasil dikirim', ['pelamar' => $emailData['email']]);

            return response()->json([
                'success' => true,
                'message' => 'Lamaran berhasil dikirim. Kami akan segera menghubungi Anda.'
            ]);

        } catch (\Exception $e) {
            // Log error dengan detail lengkap
            Log::error('Error sending application: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            // Jika error terkait SMTP, log detail koneksi SMTP (tanpa password)
            if (str_contains($e->getMessage(), 'SMTP')) {
                Log::error('SMTP Configuration: ' . json_encode([
                    'host' => config('mail.mailers.smtp.host'),
                    'port' => config('mail.mailers.smtp.port'),
                    'username' => config('mail.mailers.smtp.username'),
                    'encryption' => config('mail.mailers.smtp.encryption')
                ]));
            }
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim lamaran. Silakan coba lagi nanti.',
                'error' => env('APP_DEBUG') ? $e->getMessage() : null
            ], 500);
        }
    }
}
