<?php

use Illuminate\Database\Seeder;
use App\Thumbnail;

class ThumbnailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Thumbnail::class, 100)->create();
    }
}
