<?php

namespace Atak011\VaoCore;




use Atak011\VaoCore\Components\Alert;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Atak011\VaoCore\Commands\VaoCoreCommand;

class VaoCoreServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('vao-core')
            ->hasViewComponent('spatie', Alert::class)
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasMigration('create_vao-core_table')
            ->hasCommand(VaoCoreCommand::class);

    }
}
