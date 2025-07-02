<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\Auth;
use App\Filters\Cors; // Tambahan penting!

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf' => CSRF::class,
        'toolbar' => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'invalidchars' => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'forcehttps' => ForceHTTPS::class,
        'pagecache' => PageCache::class,
        'performance' => PerformanceMetrics::class,
        'auth' => Auth::class,
        'cors' => Cors::class, // Alias CORS
    ];

    public array $globals = [
        'before' => [
            'cors',
            // 'csrf',
            // 'invalidchars',
            // 'honeypot',
        ],
        'after' => [
            'toolbar',
            // 'secureheaders',
            // 'honeypot',
        ],
    ];

    public array $methods = [];

    public array $filters = [];
}
