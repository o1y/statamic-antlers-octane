<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Statamic\Facades\Entry;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Collection::times(500, function () use ($faker) {
            return Entry::make()
                ->collection('pages')
                ->data(['title' => $faker->name, 'content' => $faker->paragraph(2)])
                ->published(true)
                ->save();
        });
    }
}
