<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /* Laravel Collective */
        \Form::component('text', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
        \Form::component('textarea', 'components.form.textarea', ['name', 'value' => null, 'attributes' => []]);
        \Form::component('submit', 'components.form.submit', ['value' => null, 'attributes' => []]);
        \Form::component('file', 'components.form.file', ['name', 'attributes' => []]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
