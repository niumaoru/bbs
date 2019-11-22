<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 头像假数据
        $avatars = [
            'http://bbs.aibilara.top/uploads/images/avatars/201911/22/4_1574403561_ikui1xpAzY.jpg',
            'http://bbs.aibilara.top/uploads/images/avatars/201911/22/4_1574403577_ZOkGs9Tp74.jpg',
            'http://bbs.aibilara.top/uploads/images/avatars/201911/22/4_1574403588_fA2hTXAxZ0.jpg',
            'http://bbs.aibilara.top/uploads/images/avatars/201911/22/4_1574403599_fgJLg3AFxG.jpg',
            'http://bbs.aibilara.top/uploads/images/avatars/201911/22/4_1574403608_T6h6XoSbLx.jpg',
            'http://bbs.aibilara.top/uploads/images/avatars/201911/22/4_1574403620_lsyT0JG8JX.jpg',
        ];

        // 生成数据集合
        $users = factory(User::class)
            ->times(10)
            ->make()
            ->each(function ($user, $index)
            use ($faker, $avatars)
            {
                // 从头像数组中随机取出一个并赋值
                $user->avatar = $faker->randomElement($avatars);
            });

        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        // 插入到数据库中
        User::insert($user_array);

        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'Niugege';
        $user->email = 'niumaoru@163.com';
        $user->avatar = 'http://bbs.aibilara.top/uploads/images/avatars/201911/22/4_1574406303_aiiVSzv5Bw.jpg';
        $user->save();

    }
}