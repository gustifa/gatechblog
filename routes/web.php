<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\SettingController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Middleware\RedirectIfAuthenticated;

use App\Http\Controllers\Agent\AgentPropertyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [UserController::class, 'Index' ])->name('frontend.index');

Route::middleware('auth', 'role:user')->group(function () {
    Route::controller(UserController::class)->group(function(){
        //Route Frontend
    
    Route::get('/user/profile', 'UserProfile')->name('user.profile.view');
    Route::post('/user/profile/store', 'UserProfileStore')->name('user.profile.store');
    Route::get('/user/password/edit', 'UserPasswordChange')->name('user.password.edit');
    Route::post('/user/update/password', [UserController::class,'UserUpdatePassword'])->name('user.update.password');
    Route::get('/user/logout', 'UserLogout')->name('user.logout');

    
    //End Route Frontend
    });

    Route::controller(CompareController::class)->group(function(){
        Route::get('/user/compare/details', 'UserCompareDetails')->name('user.compare.details');    

    });

    Route::controller(WishlistController::class)->group(function(){
        Route::get('/user/wishlist/details', 'UserWishlistDetails')->name('user.wishlist.details'); 
        Route::get('get-wishlist-property', 'GetWishlistProperty'); 
    
    });


}); //Group Middleware User

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth', 'role:agent')->group(function () {
    Route::controller(AgentController::class)->group(function(){
        Route::get('/agent/dashboard', 'agentDashobard')->name('agent.dashboard');
        Route::get('/agent/logout', 'AgentLogout')->name('agent.logout');
        Route::get('/agent/profile', 'AgentProfile')->name('agent.profile');
        Route::post('/agent/profile/store', 'AgentProfileStore')->name('agent.profile.store');
        Route::get('/agent/password/change', 'AgentPasswordChange')->name('agent.password.change');
        Route::post('/agent/update/password', 'AgentUpdatePassword')->name('agent.update.password');
    });

    Route::controller(AgentPropertyController::class)->group(function(){
        Route::get('/agent/all/property', 'AgentAllproperty')->name('agent.all.property');
        Route::get('/agent/add/property', 'AgentAddproperty')->name('agent.add.property');
        Route::post('/agent/store/property', 'AgentStoreproperty')->name('agent.store.property');
        Route::get('/agent/edit/property/{id}', 'AgentEditproperty')->name('agent.edit.property');
        Route::post('/agent/update/property', 'AgentUpdateProperty')->name('agent.update.property');
        Route::get('/agent/delete/property/{id}', 'AgentDeleteproperty')->name('agent.delete.property');

        Route::get('/agent/property/message', 'AgentpropertyMessage')->name('agent.property.message');
        Route::get('/agent/message/details/{id}', 'AgentMessageDetails')->name('agent.message.details');


        Route::get('/agent/package/invoice/{id}', 'AgentPackageInvoice')->name('agent.package.invoice');

        Route::get('/package/history', 'PackageHistory')->name('package.history');
        Route::get('/buy/package', 'BuyPackage')->name('buy.package');
        Route::get('/buy/bussiness/plan', 'BuybussinessPlan')->name('buy.bussiness.plan');
        Route::post('/store/bussiness/plan', 'StoreBussinessPlan')->name('store.bussiness.plan');
        
    });
}); //Group Middleware Agent

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);
Route::post('/agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');
Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

Route::middleware('auth', 'role:admin')->group(function () {
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard','adminDashobard')->name('admin.dashboard');
        Route::get('/admin/profile',  'AdminProfile')->name('admin.profile.view');
        Route::get('/admin/logout', 'adminLogout')->name('admin.logout');
        Route::post('/admin/profile/store', 'AdminProfileStore')->name('admin.profile.store');
        Route::get('/admin/password/change',  'adminPasswordChange')->name('admin.password.cahnge');
        Route::post('/admin/update/password', 'AdminUpdatePassword')->name('admin.update.password');

        Route::get('/admin/package/history', 'AdminPackageHistory')->name('admin.package.history');
        Route::get('/admin/package/invoice/{id}', 'AdminPackageInvoice')->name('admin.package.invoice');




        
        Route::get('/all/agent', 'AllAgent')->name('all.agent');
        Route::get('/add/agent', 'AddAgent')->name('add.agent');
        Route::post('/store/agent', 'StoreAgent')->name('store.agent');
        Route::get('/edit/agent/{id}', 'EditAgent')->name('edit.agent');
        Route::post('/update/agent', 'UpdateAgent')->name('update.agent');
        Route::get('/detail/agent/{id}', 'DetailAgent')->name('detail.agent');
        Route::get('/delete/agent/{id}', 'DeleteAgent')->name('delete.agent');  
    });

    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type', 'AllType')->name('all.type');
        Route::get('/add/type', 'AddType')->name('add.type');
        Route::post('/store/type', 'StoreType')->name('store.type');
        Route::get('/edit/type/{id}', 'EditType')->name('edit.type');
        Route::post('/update/type', 'UpdateType')->name('update.type');
        Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');
        
    });

    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/amenities', 'AllAmenities')->name('all.amenities');
        Route::get('/add/amenities', 'AddAmenities')->name('add.amenities');
        Route::post('/store/amenities', 'StoreAmenities')->name('store.amenities');
        Route::get('/edit/amenities/{id}', 'EditAmenities')->name('edit.amenities');
        Route::post('/update/amenities', 'UpdateAmenities')->name('update.amenities');
        Route::get('/delete/amenities/{id}', 'DeleteAmenities')->name('delete.amenities');
        
    });

    Route::controller(PropertyController::class)->group(function(){
        Route::get('/all/property', 'Allproperty')->name('all.property');
        Route::get('/add/property', 'Addproperty')->name('add.property');
        Route::post('/store/property', 'Storeproperty')->name('store.property');
        Route::get('/edit/property/{id}', 'Editproperty')->name('edit.property');
        Route::post('/update/property', 'UpdateProperty')->name('update.property');
        Route::post('/update/property/thumbnail', 'UpdatePropertyTumbnail')->name('update.property.thumbnail');
        Route::post('/update/multiimage', 'UpdateMultiImage')->name('update.multiimage');
        Route::post('/store/property/multiimage', 'StorePropertyMultiimage')->name('store.property.multiimage');
        Route::get('/delete/multiimage/{id}', 'DeleteMultiImage')->name('delete.multiimage');
        Route::get('/delete/property/{id}', 'Deleteproperty')->name('delete.property');
        Route::get('/detail/property/{id}', 'Detailproperty')->name('detail.property');
        Route::post('/inactive/property', 'InactiveProperty')->name('inactive.property');
        Route::post('/active/property', 'ActiveProperty')->name('active.property');

        Route::get('/detail/property/{id}', 'Detailproperty')->name('detail.property');

        Route::get('/admin/property/message', 'AdminPropertyMessage')->name('admin.property.message');
        Route::get('/admin/message/details/{id}', 'AdminMessageDetails')->name('admin.message.details');
        
    });

    Route::controller(SettingController::class)->group(function(){
        Route::get('/site/setting', 'SiteSetting')->name('site.setting');
        Route::post('/setting/update', 'SettingUpdate')->name('setting.update');
        
    });
   
}); //End Group Middleware Admin

Route::controller(IndexController::class)->group(function(){
    Route::get('/property/details/{id}/{slug}', 'PropertyDetails')->name('property.details');

    Route::get('/agent/details/{id}', 'AgentDetails')->name('agent.details');
    
});



Route::controller(IndexController::class)->group(function(){
    Route::get('/property/details/{id}/{slug}', 'PropertyDetails')->name('property.details');
    Route::post('/property/message', 'PropertyMessage')->name('property.message');
    
});

Route::controller(WishlistController::class)->group(function(){
    Route::post('/add-to-wishList/{property_id}', 'AddToWishlist');
    Route::get('/get-wishlist-property', 'GetWishlistProperty');
    Route::get('/wishlist-remove/{id}', 'WishlistRemove');

    
});

Route::controller(CompareController::class)->group(function(){
    Route::post('/add-to-compare/{property_id}', 'AddComparelist');
    Route::get('/get-compare-property', 'GetCompareProperty');
    Route::get('/compare-remove/{id}', 'CompareRemove');
    
});
