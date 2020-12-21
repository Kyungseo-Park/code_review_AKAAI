<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ThumbnailSeeder::class,
            EducationSeeder::class,
            ushopSeeder::class,
            NoticeSeeder::class,
            NewsSeeder::class,
            ReceiptSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
