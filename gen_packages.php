<?php
// Script to generate packages.php from installed.json
$installed = json_decode(file_get_contents(__DIR__ . '/vendor/composer/installed.json'), true);
$packages_list = $installed['packages'] ?? $installed;

$result = [];
$ignore = [];

foreach ($packages_list as $package) {
    $name = $package['name'];
    $laravel = $package['extra']['laravel'] ?? null;
    
    if (!$laravel) {
        continue;
    }
    
    // Check dont-discover
    $ignore = array_merge($ignore, $laravel['dont-discover'] ?? []);
    
    // Format package name (remove vendor path prefix)
    $formatted = str_replace(dirname(__DIR__) . '/vendor/', '', $name);
    $result[$name] = $laravel;
}

// Filter ignored packages
foreach ($ignore as $pkg) {
    unset($result[$pkg]);
}

$output = '<?php return ' . var_export($result, true) . ';' . PHP_EOL;
$dest = __DIR__ . '/bootstrap/cache/packages.php';
$bytes = file_put_contents($dest, $output, LOCK_EX);
echo $bytes !== false ? "OK: wrote {$bytes} bytes to {$dest}" : "FAILED to write {$dest}";

