<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->shouldTrackRequest($request)) {
            // Cek apakah sudah ada kunjungan dengan IP dan session yang sama dalam 30 menit terakhir
            $recentVisit = Visitor::where('ip_address', $request->ip())
                ->where('session_id', session()->getId())
                ->where('created_at', '>=', now()->subMinutes(30))
                ->exists();

            if (!$recentVisit) {
                $userAgent = $request->userAgent();
                $deviceType = $this->detectDeviceType($userAgent);
                $userId = Auth::id();

                Visitor::create([
                    'ip_address' => $request->ip(),
                    'user_agent' => $userAgent,
                    'page_visited' => $request->path(),
                    'device_type' => $deviceType,
                    'user_id' => $userId,
                    'session_id' => session()->getId()
                ]);
            }
        }

        return $next($request);
    }

    /**
     * Cek apakah request perlu ditrack
     */
    private function shouldTrackRequest(Request $request): bool
    {
        // Skip tracking untuk path tertentu
        $excludePaths = [
            'login', 'register', 'logout',
            'api', '_debugbar', '_ignition',
            'livewire'
        ];

        foreach ($excludePaths as $path) {
            if (str_starts_with($request->path(), $path)) {
                return false;
            }
        }

        return !$request->ajax() && 
               !$this->isAsset($request->path()) && 
               !$this->isBot($request->userAgent());
    }

    /**
     * Cek apakah path adalah file asset
     */
    private function isAsset(string $path): bool
    {
        $assetPatterns = [
            'css', 'js', 'jpg', 'jpeg', 'png', 'gif', 'ico', 'svg',
            'fonts', 'images', 'assets', 'favicon'
        ];

        foreach ($assetPatterns as $pattern) {
            if (str_contains($path, $pattern)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Cek apakah user agent adalah bot
     */
    private function isBot(?string $userAgent): bool
    {
        if (empty($userAgent)) {
            return false;
        }

        $botPatterns = [
            'bot', 'spider', 'crawler', 'ping', 'googlebot',
            'bingbot', 'yandex', 'baidu'
        ];

        $userAgent = strtolower($userAgent);
        foreach ($botPatterns as $pattern) {
            if (str_contains($userAgent, $pattern)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Deteksi tipe perangkat dari user agent
     */
    private function detectDeviceType(string $userAgent): string
    {
        $userAgent = strtolower($userAgent);
        
        if (strpos($userAgent, 'mobile') !== false || strpos($userAgent, 'android') !== false || strpos($userAgent, 'iphone') !== false) {
            return 'Mobile';
        }
        
        if (strpos($userAgent, 'tablet') !== false || strpos($userAgent, 'ipad') !== false) {
            return 'Tablet';
        }
        
        return 'Desktop';
    }
}
