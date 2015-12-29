<?php
namespace ArrayCms\TranslatableBootForms;

use  AdamWathan\BootForms\BootFormsServiceProvider as ServiceProvider;

class TranslatableBootFormsServiceProvider extends ServiceProvider
{
   protected function registerFormBuilder(){
       $this->app['adamwathan.form'] = $this->app->share(function($app){
           $formBuilder = new TranslatableFormBuilder;
           $formBuilder->setErrorStore($app['adamwathan.form.errorstore']);
           $formBuilder->setOldInputProvider($app['adamwathan.form.oldinput']);
           $formBuilder->setToken($app['session.store']->getToken());

           return $formBuilder;
       });
   }
}
