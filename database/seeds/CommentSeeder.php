<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $ary_post_type_id = array("1", "2", "3", "4");
        // $post_type_id = array_rand($ary_post_type_id);

        // $educations = DB::table('educations')->inRandomOrder()->first()->id;
        // $ushops = DB::table('ushops')->inRandomOrder()->first()->id;
        // $notices = DB::table('notices')->inRandomOrder()->first()->id;
        // $news = DB::table('news')->inRandomOrder()->first()->id;

        // $ary_post_id = array($educations, $ushops, $notices, $news);
        // $post_id = array_rand($ary_post_type_id);
        
        // DB::table('comments')->insert([
        //     'post_type_id'  => $ary_post_type_id[$post_type_id],
        //     'post_id'       => $ary_post_id[$post_id],
        //     'user_id'       => DB::table('users')->inRandomOrder()->first()->id,
        //     'comment'       => Str::random(100),
        // ]);
    }
}
