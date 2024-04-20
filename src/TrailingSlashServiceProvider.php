<?php

namespace Vormkracht10\TrailingSlash;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TrailingSlashServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-trailing-slash')
            ->hasConfigFile();
    }
}
