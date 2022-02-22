<?php

namespace Atak011\VaoCore;


use Atak011\VaoCore\Components\Alert;
use Atak011\VaoCore\Components\Error\Error;
use Atak011\VaoCore\Components\Forms\UpsertForm;
use Atak011\VaoCore\Components\Inputs\TextInput;
use Atak011\VaoCore\Components\Stats\Stats1;
use Atak011\VaoCore\Components\Table\DatatableTable;
use Atak011\VaoCore\Components\Toast\ToastNotification;
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
            ->hasViewComponents('vao-core',
                Alert::class,
                Error::class,
                Stats1::class,
                ToastNotification::class,
                TextInput::class,
                UpsertForm::class,
                DatatableTable::class
            )
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasMigration('create_vao-core_table')
            ->hasCommand(VaoCoreCommand::class);

    }
}
