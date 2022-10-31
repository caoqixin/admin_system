<?php

use App\Admin\Controllers\CategoryController;
use App\Admin\Controllers\ComponentController;
use App\Admin\Controllers\CostumerController;
use App\Admin\Controllers\OrderController;
use App\Admin\Controllers\RepairDetailController;
use App\Admin\Controllers\SupplierController;
use App\Admin\Controllers\WarrantyController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('categories', CategoryController::class);
    $router->resource('components', ComponentController::class);
    $router->resource('users', CostumerController::class);
    $router->resource('orders', OrderController::class);
    $router->resource('repairs/standard', \App\Admin\Controllers\Repair\StandardRepair::class);
    $router->resource('repairs/motherboard', \App\Admin\Controllers\Repair\MotherboardRepair::class);
    $router->get('repairs/order/create/{id}', [\App\Admin\Controllers\Repair\StandardRepair::class, 'order'])
        ->name('repairOrder');
    $router->get('repairs/warranty/create/{id}', [\App\Admin\Controllers\Repair\StandardRepair::class, 'createWarranty'])
        ->name('repairWarranty');
    $router->resource('suppliers', SupplierController::class);
    $router->resource('phone-model', RepairDetailController::class);
    $router->resource('warranties', WarrantyController::class);


    $router->prefix('completed')->controller(\App\Admin\Controllers\CompletedController::class)
        ->group(function (Router $router) {
            $router->get('order', 'order');
        });
});
