<?php 

namespace App\Services;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {

    public function  setGateAndPolicyAccess(){

        $this->defineGateCategory();
        $this->defineGateMenu();
        $this->defineGateProduct();

    }

    // PERMISSION FOR CATEGORY
    public function defineGateCategory(){

        Gate::define('category-list','App\Policies\CategoryPolicy@view');
        Gate::define('category-add','App\Policies\CategoryPolicy@create');
        Gate::define('category-edit','App\Policies\CategoryPolicy@update');
        Gate::define('category-delete','App\Policies\CategoryPolicy@delete');
    }


    //PERMISSION FOR MENUS
    public function defineGateMenu(){
        Gate::define('menu-list','App\Policies\MenuPolicy@view');
        Gate::define('menu-add','App\Policies\MenuPolicy@create');
        Gate::define('menu-edit','App\Policies\MenuPolicy@update');
        Gate::define('menu-delete','App\Policies\MenuPolicy@delete');
    }

    // PERMISSON FOR PRODUCTS
    public function defineGateProduct(){
        Gate::define('product-list','App\Policies\ProductPolicy@view');
        Gate::define('product-add','App\Policies\ProductPolicy@create');
        Gate::define('product-edit','App\Policies\ProductPolicy@update');
        Gate::define('product-delete','App\Policies\ProductPolicy@delete');
    }

}