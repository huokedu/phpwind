<?php

use App\Api\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Routing\Registrar as RouteContract;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function (RouteContract $api) {

    /*
    |-----------------------------------------------------------------------
    | Not auth routes.
    |-----------------------------------------------------------------------
    |
    | Define routes that do not require authentication in the following
    | groups.
    |
    */

    $api->post('/login', Controllers\Auth\LoginController::class.'@login');
    $api->post('/register', Controllers\Auth\RegisterController::class.'@store');

    /*
    |-----------------------------------------------------------------------
    | Defined not auth users routes.
    |-----------------------------------------------------------------------
    |
    | Define the public API associated with the users.
    |
    */

    $api->group(['prefix' => 'users'], function (RouteContract $api) {
        $api->get('/', Controllers\User\UserController::class.'@index');
        $api->get('/{user}', Controllers\User\UserController::class.'@show');
    });

    /*
    |-----------------------------------------------------------------------
    | Defined not auth tag routes.
    |-----------------------------------------------------------------------
    |
    | Define the public API associated with the tag.
    |
    */

    $api->group(['prefix' => 'tags'], function (RouteContract $api) {
        $api->get('/', Controllers\TagController::class.'@index');
        $api->get('/{tag}', Controllers\TagController::class.'@show');
    });

    /*
    |-----------------------------------------------------------------------
    | Defined not auth forum routes.
    |-----------------------------------------------------------------------
    |
    | Define the public API associated with the forum.
    |
    */

    $api->group(['prefix' => '/forums'], function (RouteContract $api) {
        $api->get('/', Controllers\Forum\ForumController::class.'@index');
        $api->get('/{forum}', Controllers\Forum\ForumController::class.'@show');

        // Category
        $api->get('/{forum}/categories', Controllers\Forum\CategoryController::class.'@index');

        // Topics
        $api->get('/{forum}/topics', Controllers\Forum\TopicController::class.'@index');
    });
    $api->group(['prefix' => 'forum->categories'], function (RouteContract $api) {

        // Get a forum category.
        $api->get('/{category}', Controllers\Forum\CategoryController::class.'@show');
    });
    $api->group(['prefix' => 'forum->topics'], function (RouteContract $api) {

        // List all forum topics.
        $api->get('/', Controllers\Forum\TopicController::class.'@all');

        // Get a topic.
        $api->get('/{topic}', Controllers\Forum\TopicController::class.'@show');
    });

    /*
    |-----------------------------------------------------------------------
    | Defined auth routes.
    |-----------------------------------------------------------------------
    |
    | Define the routes that need to be authenticated in the following
    | groups.
    |
    */

    $api->group(['middleware' => 'auth:api'], function (RouteContract $api) {

        // Authenticated User.
        $api->group(['prefix' => 'user'], function (RouteContract $api) {
            $api->get('/', Controllers\User\AuthenticatedController::class.'@show');
        });

        // Forums.
        $api->group(['prefix' => 'forums'], function (RouteContract $api) {

            // Create a topic.
            $api->post('/{forum}/topics', Controllers\Forum\TopicController::class.'@store');
        });
    });
});
