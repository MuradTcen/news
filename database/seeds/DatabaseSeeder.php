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
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin Golovin',
            'email' => 'a@a.a',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Author Vlasic',
            'email' => 'v@v.v',
            'role' => 'author',
            'password' => bcrypt('author'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Author Modric',
            'email' => 'm@m.m',
            'role' => 'author',
            'password' => bcrypt('author'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('posts')->insert([
            'title' => 'Волшебство и никакого мошенничества! Фокусники ответили даже на провокационные вопросы молодых зрителей',
            'author_id' => 1,
            'attachment_file' => '1548932518_1.jpg',
            'body' => '',
//            'created_at' => date('Y - m - d H:i:s'),
//            'updated_at' => date('Y - m - d H:i:s'),
        ]);

        DB::table('posts')->insert([
            'title' => 'Наш ответ. Роскомнадзор отыскал нарушения в работе российского «Би-би-си»',
            'author_id' => 1,
            'body' => '',
        ]);

        DB::table('posts')->insert([
            'title' => '«Здоровая печень» для металлургов. Медсанчасть продолжает работу по лечебно-профилактическим программам',
            'author_id' => 2,
            'body' => 'body',
        ]);

        DB::table('posts')->insert([
            'title' => '1500 пострадавших. ЕСПЧ обязал Россию выплатить десять миллионов евро за депортацию грузин',
            'author_id' => 2,
            'body' => 'body',
        ]);

        DB::table('posts')->insert([
            'title' => 'Не злите Малкина! Воспитанник «Металлурга» вступил в кулачный бой с провокатором',
            'author_id' => 3,
            'body' => 'body',
        ]);

        DB::table('posts')->insert([
            'title' => 'Пешеходы его долго ждали! Около «Гастронома» начали устанавливать светофор',
            'author_id' => 3,
            'body' => 'body',
        ]);

    }
}
