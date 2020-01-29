<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login')->name('login.post');

// Password Reset
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/construction', function () {
    return view('errors.503');
})->name('under.construction');



Route::get('/tracking/societies/referrals/{slug}', 'TrackingController@trackReferrals')->name('track.society.referrals');

// Superuser Routes
Route::group(['prefix' => 'manage', 'middleware' => ['role:superuser', 'CheckBlockedUser', 'checkActivatedUser']], function() {

    // Dashboard
    Route::get('/', 'User\SuperuserController@index')->name('superuser.dashboard');

    // Edition
    Route::group(['prefix' => 'edition'], function () {
            Route::get('/', 'EditionController@index')->name('edition.index');
            Route::get('/create','EditionController@create')->name('edition.create');
            Route::post('/', 'EditionController@store')->name('edition.store');
            Route::get('/{id}','EditionController@show')->name('edition.show');
            Route::get('/show/{id}','EditionController@showajax')->name('edition.showajax');
            Route::get('/{id}/edit', 'EditionController@edit')->name('edition.edit');
            Route::put('/{id}', 'EditionController@update')->name('edition.update');
            Route::delete('/{id}', 'EditionController@destroy')->name('edition.destroy');
        });
    
    
    //Facebook Instagram API Routes

    Route::group(['prefix' => 'facebook'], function () {
            Route::get('/', 'FacebookController@index')->name('facebook.index');
            Route::get('/info','FacebookController@info')->name('facebook.info');
        });

    Route::group(['prefix' => 'instagram'], function () {
            Route::get('/', 'InstagramController@index')->name('instagram.index');
            Route::get('/info','InstagramController@info')->name('instagram.info');
        });

    // Roles
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', 'RoleController@index')->name('roles.index');
        Route::get('/create', 'RoleController@create')->name('roles.create');
        Route::post('/', 'RoleController@store')->name('roles.store');
    });

    // Permissions
    Route::get('/permissions', 'PermissionController@index')->name('permissions.index');

    // Members
    Route::group(['prefix' => 'members'], function () {
        Route::get('/', 'User\SuperuserController@indexUser')->name('users.index');

        // Unactive Users system
        Route::get('/unactive', 'User\SuperuserController@unactiveUsers')->name('users.unactive');
        Route::post('/unactive/export', 'User\SuperuserController@exportUnactiveUsers')->name('users.unactive.export');
        Route::post('/unactive/remind', 'User\SuperuserController@sendReminderToUnactiveUsers')->name('users.unactive.reminder');

        // Blocking System
        Route::get('/blocked', 'User\SuperuserController@blockedUsers')->name('users.blocked');
        Route::post('/unblock', 'User\SuperuserController@unblockAllUsers')->name('users.unblock.all');
        Route::put('/unblock/{uuid}', 'User\SuperuserController@unblockUser')->name('users.unblock.single');
        Route::put('/block/{uuid}', 'User\SuperuserController@blockUser')->name('users.block.single');

        // Users CRUD
        Route::get('/create', 'User\SuperuserController@createUser')->name('users.create');
        Route::post('/', 'User\SuperuserController@storeUser')->name('users.store');
        Route::get('/{uuid}', 'User\SuperuserController@showUser')->name('users.show');
        Route::get('/{uuid}/position', 'User\SuperuserController@updatePosition')->name('users.position');
        Route::post('/{uuid}/positions', 'User\SuperuserController@storePosition')->name('users.position.update');

        Route::get('/{uuid}/permissions', 'User\SuperuserController@editPermissionUser')->name('users.permission.edit');
        Route::post('/{uuid}/permissions', 'User\SuperuserController@updatePermissionUser')->name('users.permission.update');
        Route::get('/{uuid}/role', 'User\SuperuserController@editRoleUser')->name('users.role.edit');
        Route::post('/{uuid}/role', 'User\SuperuserController@updateRoleUser')->name('users.role.update');
        Route::delete('/{uuid}', 'User\SuperuserController@destroyUser')->name('users.destroy');
    });  
    
});

// Council Routes
Route::group(['prefix' => 'council', 'middleware' => ['role:council|superuser|coordinator','CheckBlockedUser', 'checkActivatedUser']], function() {

    // Dashboard currently using superusers
    Route::get('/', 'User\SuperuserController@index')->name('council.dashboard');

    // Campaign
    Route::group(['prefix' => 'campaign', 'middleware' => 'role:council|superuser'], function () {
        Route::get('/', 'Email\CampaignController@index')->name('campaigns.index');
        Route::get('/create', 'Email\CampaignController@create')->name('campaigns.create');
        Route::post('/', 'Email\CampaignController@store')->name('campaigns.store');
        Route::get('/{uuid}', 'Email\CampaignController@show')->name('campaigns.show');
        Route::get('/{uuid}/edit', 'Email\CampaignController@edit')->name('campaigns.edit');
        Route::get('/{uuid}/send', 'Email\CampaignController@send')->name('campaigns.send');
        Route::put('/{uuid}', 'Email\CampaignController@update')->name('campaigns.update');
        Route::delete('/{uuid}', 'Email\CampaignController@destroy')->name('campaigns.destroy');
    });

    // Subscriber
    Route::group(['prefix' => 'subscriber', 'middleware' => 'role:council|superuser'], function () {
        Route::get('/', 'Email\SubscriberController@index')->name('subscribers.index');
        Route::get('/create', 'Email\SubscriberController@create')->name('subscribers.create');
        Route::post('/', 'Email\SubscriberController@store')->name('subscribers.store');
        Route::get('/{uuid}', 'Email\SubscriberController@show')->name('subscribers.show');
        Route::get('/{uuid}/edit', 'Email\SubscriberController@edit')->name('subscribers.edit');
        Route::put('/{uuid}', 'Email\SubscriberController@update')->name('subscribers.update');
        Route::get('/{uuid}/delete', 'Email\SubscriberController@destroy')->name('subscribers.destroy');
    });

    // Stories routes beyond crud
    Route::group(['prefix' => 'stories'], function () {
        Route::get('/pending', 'User\CouncilController@index')->name('council.stories.index');
        Route::get('/published', 'User\CouncilController@publishedIndex')->name('council.stories.published');
        Route::delete('/published/{uuid}', 'User\CouncilController@publishedDestroy')->name('council.stories.destory');
        Route::group(['prefix' => 'pending'], function() {
            Route::get('/{uuid}', 'User\CouncilController@show' )->name('council.stories.show');
            Route::put('/{uuid}/draft', 'User\CouncilController@draft')->name('council.stories.draft');
            Route::get('/{uuid}/edit', 'User\CouncilController@edit')->name('council.stories.edit');
            Route::put('/{uuid}', 'User\CouncilController@update')->name('council.stories.update');
            Route::get('/{uuid}/publish', 'User\CouncilController@publish')->name('council.stories.publish');
        });
    });

    // Socs routes beyond crud
    Route::group(['prefix' => 'societies'], function () {
        Route::get('/', 'User\CouncilController@societyIndex')->name('council.societies.index');
        Route::get('/pending', 'User\CouncilController@societiesInPending')->name('council.societies.pending');

        Route::group(['prefix' => 'news'], function () {
            Route::get('/', 'User\CouncilController@societyNewsIndex')->name('council.societies.news.index');
            Route::get('/pending', 'User\CouncilController@societyNewsInPending')->name('council.societies.news.pending');
            Route::get('/published', 'User\CouncilController@societyNewsPublished')->name('council.societies.news.published');
            Route::get('/{uuid}/publish', 'User\CouncilController@updateSocietyNewsToPublished')->name('council.societies.news.publish');
            Route::get('/{uuid}/draft', 'User\CouncilController@updateSocietyNewsToDraft')->name('council.societies.news.draft');
            Route::get('/{uuid}/edit', 'User\CouncilController@editSocietyNews')->name('council.societies.news.edit');
            Route::put('/{uuid}', 'User\CouncilController@updateSocietyNews')->name('council.societies.news.update');
            Route::delete('/{uuid}', 'User\CouncilController@deleteSocietyNews')->name('council.societies.news.destroy');
        });

        Route::group(['prefix' => '{slug}'], function () {
            Route::get('/', 'User\CouncilController@societyShow')->name('council.societies.show');
            Route::get('/images' , 'User\CouncilController@societyImageIndex')->name('council.societies.show.images');
            Route::get('/draft', 'User\CouncilController@updateStatusToDraft')->name('society.head.status.draft');
            Route::get('/publish', 'User\CouncilController@updateStatusToPublished')->name('society.head.status.publish');
        });

        Route::delete('/{id}', 'User\CouncilController@societyDelete')->name('council.societies.destroy');


    });

    Route::group(['prefix' => 'notifications'], function () {
        Route::get('/', 'NotificationController@index')->name('notifications.index');
        Route::get('/create', 'NotificationController@create')->name('notifications.create');
        Route::post('/', 'NotificationController@store')->name('notifications.store');
        Route::delete('/{id}', 'NotificationController@destroy')->name('notifications.destroy');
    });
    // Stats
    Route::group(['prefix' => 'stats'], function () {
        Route::get('/stories', 'StatsController@indexStories')->name('stats.stories');
        Route::get('/albums', 'StatsController@indexAlbums')->name('stats.albums');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/me/info', 'User\UserController@info')->name('me.info');
    Route::get('/blocked/message', 'User\UserController@blockedMessage')->name('me.blocked');
    Route::put('/user/{uuid}', 'User\UserController@update')->name('me.update');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::middleware(['auth', 'CheckBlockedUser', 'checkActivatedUser'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/me', 'User\UserController@show')->name('me.show');
    Route::get('/me/edit', 'User\UserController@edit')->name('me.edit');

    Route::get('/developers', 'HomeController@devIndex')->name('dev.index');

    Route::group(['prefix' =>'todos', 'middleware' => ['role:superuser|council|columnist|photographer|coordinator']], function () {
        Route::post('/', 'HomeController@storeTodo')->name('todos.store');
        Route::get('/{id}/done', 'HomeController@doneTodo')->name('todos.done');
        Route::delete('/{id}', 'HomeController@destroyTodo')->name('todos.destroy');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::middleware('permission:create-category')->group(function () {
            Route::get('/create', 'CategoryController@create')->name('categories.create');
            Route::post('/', 'CategoryController@store')->name('categories.store');
        });
        Route::middleware('permission:read-category')->group(function () {
            Route::get('/', 'CategoryController@index')->name('categories.index');
            Route::get('/{slug}', 'CategoryController@show')->name('categories.show');
        });
        Route::middleware('permission:edit-category')->group(function () {
            Route::get('/{slug}/edit', 'CategoryController@edit')->name('categories.edit');
            Route::put('/{slug}', 'CategoryController@update')->name('categories.update');
        });
        Route::delete('/{slug}', 'CategoryController@destroy')->name('categories.destroy')->middleware('permission:delete-category');
    });

    // Analytics
    Route::get('/analytics', 'AnalyticsController@index')->name('ga.index');

    // Stories Routes
    Route::group(['prefix' => 'stories', 'middleware' => ['role:superuser|council|columnist|coordinator']], function() {
        Route::get('/', 'StoryController@index')->name('stories.index');
        Route::get('/leaderboard', 'StoryController@columnistLeaderboardIndex')->name('stories.leaderboard');
        Route::get('/create', 'StoryController@create')->name('stories.create');
        Route::post('/', 'StoryController@store')->name('stories.store');
        Route::get('/{uuid}', 'StoryController@show')->name('stories.show');
        Route::get('/{uuid}/edit', 'StoryController@edit')->name('stories.edit');
        Route::get('/{uuid}/submit', 'StoryController@submit')->name('stories.submit');
        Route::put('/{uuid}', 'StoryController@update')->name('stories.update');
        // Route::put('/{uuid}/autosave', 'StoryController@autoSave')->name('stories.autosave');
        Route::delete('/{uuid}', 'StoryController@destroy')->name('stories.destroy');
    });

    // Album Routes
    Route::group(['prefix' => 'albums', 'middleware' => ['role:superuser|council|photographer|coordinator']], function() {
        Route::get('/', 'AlbumController@index')->name('albums.index');
        Route::get('/create', 'AlbumController@create')->name('albums.create')->middleware('permission:create-album');
        Route::post('/', 'AlbumController@store')->name('albums.store')->middleware('permission:create-album');
        Route::get('/{uuid}', 'AlbumController@show')->name('albums.show');
        Route::get('/{uuid}/edit', 'AlbumController@edit')->name('albums.edit')->middleware('permission:update-album');
        Route::put('/{uuid}', 'AlbumController@update')->name('albums.update')->middleware('permission:update-album');
        Route::get('/{uuid}/submit', 'AlbumController@submit')->name('albums.submit');
        Route::delete('/{uuid}', 'AlbumController@destroy')->name('albums.destroy');
        Route::get('/{uuid}/publish', 'AlbumController@publish')->name('albums.publish')->middleware('permission:publish-album');
        Route::get('/{uuid}/draft', 'AlbumController@draft')->name('albums.draft')->middleware('permission:publish-album');

        // Images Routes
        Route::group(['prefix' => '{uuid}/images', 'middleware' => 'CheckAlbum'], function() {
            Route::get('/', 'ImageController@index')->name('images.index');
            Route::get('/create', 'ImageController@create')->name('images.create');
            Route::post('/', 'ImageController@store')->name('images.store');
            Route::get('/{image}', 'ImageController@show')->name('images.show');
            Route::get('/{image}/edit', 'ImageController@edit')->name('images.edit');
            Route::get('/{image}/submit', 'ImageController@submit')->name('images.submit');
            Route::get('/{image}/draft', 'ImageController@draft')->name('images.draft')->middleware('permission:publish-image');
            Route::get('/{image}/publish', 'ImageController@publish')->name('images.publish')->middleware('permission:publish-image');
            Route::put('/{image}', 'ImageController@update')->name('images.update');
            Route::delete('/{image}', 'ImageController@destory')->name('images.destroy');
        });
    });

    Route::get('/uploads', 'ImageController@me')->name('images.me')->middleware('role:superuser|council|columnist|photographer|coordinator');// User images

    // Society Routes
    Route::group(['prefix' => 'society-info', 'middleware' => ['role:superuser|council|society_head']], function() {
        Route::get('/', 'User\SocietyHeadController@index')->name('society.head.index');
        Route::get('/create', 'User\SocietyHeadController@create')->name('society.head.create');
        Route::post('/', 'User\SocietyHeadController@store')->name('society.head.store');
        Route::get('/{slug}', 'User\SocietyHeadController@show')->name('society.head.show');
        Route::get('/{slug}/pending', 'User\SocietyHeadController@updateStatusToPending')->name('society.head.status.pending');
        Route::get('/{slug}/edit', 'User\SocietyHeadController@edit')->name('society.head.edit');
        Route::put('/{slug}', 'User\SocietyHeadController@update')->name('society.head.update');
        // Images
        Route::group(['prefix' => '{slug}/images'], function () {
            Route::get('/', 'User\SocietyHeadController@imageIndex')->name('society.head.image.index');
            Route::get('/create', 'User\SocietyHeadController@imageCreate')->name('society.head.image.create');
            Route::post('/', 'User\SocietyHeadController@imageStore')->name('society.head.image.store');
            Route::get('/{id}', 'User\SocietyHeadController@imageShow')->name('society.head.image.show');
            Route::delete('/{id}', 'User\SocietyHeadController@imageDelete')->name('society.head.image.delete');
        });
        // News
        Route::group(['prefix' => '{slug}/news'], function() {
            Route::get('/', 'SocietyNewsController@index')->name('society.head.news.index');
            Route::get('/create', 'SocietyNewsController@create')->name('society.head.news.create');
            Route::post('/', 'SocietyNewsController@store')->name('society.head.news.store');
            Route::get('/{uuid}/submit', 'SocietyNewsController@submitForApproval')->name('society.head.news.approval');
        });
    });


});
