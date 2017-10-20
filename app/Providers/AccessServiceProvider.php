<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AccessServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAccess();
        $this->registerBindings();
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerAccess()
    {
        $this->app->bind('access', function($app) {
            return new Access($app);
        });
    }

    /**
     * Register service provider bindings
     */
    public function registerBindings() {
        //Admin

        $this->app->bind(
            'App\Repositories\Admin\User\UserRepository',
            'App\Repositories\Admin\User\EloquentUserRepository'
        );

        $this->app->bind(
            'App\Repositories\Admin\Role\RoleRepository',
            'App\Repositories\Admin\Role\EloquentRoleRepository'
        );

        $this->app->bind(
            'App\Repositories\Admin\PermissionGroup\PermissionGroupRepository',
            'App\Repositories\Admin\PermissionGroup\EloquentPermissionGroupRepository'
        );

        $this->app->bind(
            'App\Repositories\Admin\Permission\PermissionRepository',
            'App\Repositories\Admin\Permission\EloquentPermissionRepository'
        );

        $this->app->bind(
            'App\Repositories\Admin\Role\RoleRepository',
            'App\Repositories\Admin\Role\EloquentRoleRepository'
        );

        $this->app->bind(
            'App\Repositories\Admin\Menu\MenuRepository',
            'App\Repositories\Admin\Menu\EloquentMenuRepository'
        );

        $this->app->bind(
            'App\Repositories\Admin\ArticleCategory\ArticleCategoryRepository',
            'App\Repositories\Admin\ArticleCategory\EloquentArticleCategoryRepository'
        );

        $this->app->bind(
            'App\Repositories\Admin\Article\ArticleRepository',
            'App\Repositories\Admin\Article\EloquentArticleRepository'
        );

        $this->app->bind(
            'App\Repositories\Admin\VideoUpload\VideoUploadRepository',
            'App\Repositories\Admin\VideoUpload\EloquentVideoUploadRepository'
        );

        $this->app->bind(
            'App\Repositories\Admin\Course\CourseRepository',
            'App\Repositories\Admin\Course\EloquentCourseRepository'
        );

        $this->app->bind(
            'App\Repositories\Admin\Lecture\LectureRepository',
            'App\Repositories\Admin\Lecture\EloquentLectureRepository'
        );
    }
}
