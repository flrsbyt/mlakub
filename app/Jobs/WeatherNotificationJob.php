<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;

class WeatherNotificationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Ambil semua admin users
            $adminUsers = User::where('role', 'admin')->get();
            
            foreach ($adminUsers as $admin) {
                // Simulasi data cuaca (bisa diganti dengan API cuaca real)
                $weatherData = $this->getWeatherData();
                
                // Cek apakah notifikasi cuaca sudah ada dalam 1 jam terakhir
                $existingWeatherNotif = $admin->notifications()
                    ->where('type', 'weather')
                    ->where('created_at', '>', now()->subHour())
                    ->first();
                
                if (!$existingWeatherNotif) {
                    // Buat notifikasi cuaca
                    \App\Models\Notification::createNotification(
                        'weather',
                        'Update Cuaca Terkini',
                        "Cuaca hari ini: {$weatherData['condition']}, Suhu: {$weatherData['temperature']}°C. {$weatherData['advice']}",
                        $admin,
                        'fas fa-cloud-sun',
                        'weather',
                        $weatherData
                    );
                }
            }
        } catch (\Exception $e) {
            \Log::error('Weather notification job failed: ' . $e->getMessage());
        }
    }
    
    /**
     * Simulasi data cuaca (ganti dengan API cuaca real)
     */
    private function getWeatherData(): array
    {
        $conditions = ['Cerah Berawan', 'Berawan', 'Hujan Ringan', 'Cerah', 'Berangin'];
        $advices = [
            'Cerah Berawan' => 'Cocok untuk aktivitas outdoor',
            'Berawan' => 'Persiapkan payung jika perlu',
            'Hujan Ringan' => 'Bawa payung dan jaket',
            'Cerah' => 'Gunakan sunscreen',
            'Berangin' => 'Hati-hati saat berkendara'
        ];
        
        $condition = $conditions[array_rand($conditions)];
        
        return [
            'condition' => $condition,
            'temperature' => rand(22, 32),
            'humidity' => rand(60, 90),
            'advice' => $advices[$condition],
            'location' => 'Jakarta, Indonesia'
        ];
    }
}
