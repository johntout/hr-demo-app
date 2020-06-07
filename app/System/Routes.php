<?php

namespace App\System;

use App\Facades\App;
use App\Middlewares\CSRF;
use App\Middlewares\Authorization;

final class Routes
{
    public static function register()
    {
        self::portal();
        self::panel();
    }

    private static function portal()
    {
        App::group('', function() {
            App::get('/', '\App\Controllers\Portal\PortalController:login')
                ->setName('portal.login');

            App::get('/portal', '\App\Controllers\Portal\PortalController:dashboard')
                ->setName('portal.dashboard');

            App::post('/portal/login', '\App\Controllers\Auth\AuthController:login')
                ->setName('portal.auth.login');

            App::get('/portal/logout', '\App\Controllers\Auth\AuthController:logout')
                ->setName('portal.auth.logout');

            App::group('/portal/applications', function() {
                App::get('/create', '\App\Controllers\Portal\ApplicationsController:create')
                    ->setName('portal.applications.create');

                App::post('/insert', '\App\Controllers\Portal\ApplicationsController:insert')
                    ->setName('portal.applications.insert');

            });
        })->add(new CSRF)->add(new Authorization);
    }

    private static function panel()
    {
        App::group('/panel', function() {
            // Dashboard routes
            App::get('', '\App\Controllers\Panel\PanelController:login')
                ->setName('panel.login');

            App::get('/dashboard', '\App\Controllers\Panel\PanelController:dashboard')
                ->setName('panel.dashboard');

            App::post('/login', '\App\Controllers\Auth\AuthController:login')
                ->setName('panel.auth.login');

            App::get('/logout', '\App\Controllers\Auth\AuthController:logout')
                ->setName('panel.auth.logout');

            // Users Routes
            App::group('/users', function() {
                App::get('/create', '\App\Controllers\Panel\UsersController:create')
                    ->setName('panel.users.create');

                App::get('/edit/{id}', '\App\Controllers\Panel\UsersController:edit')
                    ->setName('panel.users.edit');

                App::post('/update', '\App\Controllers\Panel\UsersController:update')
                    ->setName('panel.users.update');

                App::post('/insert', '\App\Controllers\Panel\UsersController:insert')
                    ->setName('panel.users.insert');
            });

            // Approval Routes
            App::group('/approvals', function() {
                App::get('/approve/{id}', '\App\Controllers\Panel\ApprovalsController:approve')
                    ->setName('panel.approvals.approve');

                App::get('/reject/{id}', '\App\Controllers\Panel\ApprovalsController:reject')
                    ->setName('panel.approvals.reject');
            });
        })->add(new CSRF)->add(new Authorization);
    }
}