<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('storage:link-cards', function () {
    symlink(
        storage_path('app/cards'),
        public_path('storage/cards')
    );
    $this->info('The [cards] directory has been linked.');
}); 

Artisan::command('storage:link-cards', function () {
    $target = storage_path('app/cards');
    $link = public_path('storage/cards');
    
    if (!file_exists($target)) {
        File::makeDirectory($target, 0755, true);
    }
    
    if (file_exists($link)) {
        $this->error("Ссылка уже существует!");
        return;
    }
    
    symlink($target, $link);
    $this->info('The [cards] directory has been linked.');
});