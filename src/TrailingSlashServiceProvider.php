<?php

namespace Vormkracht10\TrailingSlash;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Vormkracht10\TrailingSlash\Commands\TrailingSlashCommand;

class TrailingSlashServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-trailing-slash')
            ->hasConfigFile();
    }
}
