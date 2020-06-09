<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Program;
use App\Konten;
use App\Kategori;
use App\Pengaturan;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale($this->app->getLocale());
        View()->composer('components.sidebar',function($view){
            // Config LINK  
            $data['program']   = Program::orderBy('nama_program')->get();
            $view
            ->with('program' , $data['program']);
        });

        // LP FOOTER
        View()->composer('components.lpfooter',function($view){
            $program = Program::latest()->limit(3)->get();
            $view
            ->with('program',$program);
        });

        View()->composer('components.lpfooter',function($view){
            $konten = Konten::latest()->limit(3)->get();
            $view
            ->with('konten',$konten);
        });

        View()->composer('components.lpfooter',function($view){
            $kategoriFt = Kategori::latest()->limit(4)->get();
            $view
            ->with('kategoriFt',$kategoriFt);
        });

        View()->composer('components.lpfooter',function($view){
            $pengaturan = Pengaturan::latest()->first();
            $view
            ->with('pengaturan',$pengaturan);
        });

        View()->composer('layouts.master',function($view){
            $pengaturan = Pengaturan::latest()->first();
            $view
            ->with('pengaturan',$pengaturan);
        });

        // Background
        View()->composer('sites.informasi',function($view){
            $pengaturan = Pengaturan::latest()->first();
            $view
            ->with('pengaturan',$pengaturan);
        });

        View()->composer('sites.program',function($view){
            $pengaturan = Pengaturan::latest()->first();
            $view
            ->with('pengaturan',$pengaturan);
        });

        View()->composer('sites.checkout',function($view){
            $pengaturan = Pengaturan::latest()->first();
            $view
            ->with('pengaturan',$pengaturan);
        });

        View()->composer('login.loginPeserta',function($view){
            $pengaturan = Pengaturan::latest()->first();
            $view
            ->with('pengaturan',$pengaturan);
        });

        View()->composer('sites.daftarAkun',function($view){
            $pengaturan = Pengaturan::latest()->first();
            $view
            ->with('pengaturan',$pengaturan);
        });

        View()->composer('components.lpheader',function($view){
            $pengaturan = Pengaturan::latest()->first();
            $view
            ->with('pengaturan',$pengaturan);
        });

        View()->composer('peserta.invoice.upload',function($view){
            $pengaturan = Pengaturan::latest()->first();
            $view
            ->with('pengaturan',$pengaturan);
        });
    }
}
