<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run()
    {
        // Users
        DB::table('users')->insert([
            ['name' => 'Nguyen Van A', 'phone_number' => '0123456789', 'email_address' => 'nguyenvana@example.com', 'role' => 'User', 'password' => Hash::make('password123')],
            ['name' => 'Tran Thi B', 'phone_number' => '0987654321', 'email_address' => 'tranthib@example.com', 'role' => 'Admin', 'password' => Hash::make('admin123')]
        ]);

        // Provinces
        DB::table('provinces')->insert([
            ['name' => 'Hà Nội', 'img' => 'hanoi.jpg', 'area' => 'Miền Bắc'],
            ['name' => 'Đà Nẵng', 'img' => 'danang.jpg', 'area' => 'Miền Trung'],
            ['name' => 'TP. Hồ Chí Minh', 'img' => 'hcm.jpg', 'area' => 'Miền Nam']
        ]);

        // Trips
        DB::table('trips')->insert([
            ['p_id' => 1, 'name' => 'Hà Nội City Tour', 'img' => 'hanoi_tour.jpg', 'des' => 'Khám phá Hà Nội trong 1 ngày', 'duration' => 1, 'price' => 500000],
            ['p_id' => 2, 'name' => 'Du lịch Đà Nẵng', 'img' => 'danang_tour.jpg', 'des' => 'Tham quan Bà Nà Hills và biển Mỹ Khê', 'duration' => 2, 'price' => 2500000],
            ['p_id' => 3, 'name' => 'Sài Gòn By Night', 'img' => 'hcm_tour.jpg', 'des' => 'Trải nghiệm TP.HCM về đêm', 'duration' => 1, 'price' => 800000]
        ]);

        // HistoryBooking
        DB::table('history_bookings')->insert([
            ['user_id' => 1, 'trip_id' => 1, 'number_of_guest' => 2, 'total_price' => 1000000, 'status' => 'Confirmed'],
            ['user_id' => 2, 'trip_id' => 2, 'number_of_guest' => 1, 'total_price' => 2500000, 'status' => 'Pending']
        ]);

        // Comments
        DB::table('comments')->insert([
            ['trip_id' => 1, 'user_id' => 1, 'comment' => 'Chuyến đi rất thú vị!'],
            ['trip_id' => 2, 'user_id' => 2, 'comment' => 'Mọi thứ thật tuyệt vời.']
        ]);

        // Blogs
        DB::table('blogs')->insert([
            ['location' => 'Hà Nội', 'time_read' => 5, 'content' => 'Hà Nội là thủ đô với lịch sử lâu đời.', 'image' => 'hanoi_blog.jpg'],
            ['location' => 'Đà Nẵng', 'time_read' => 7, 'content' => 'Đà Nẵng có biển đẹp và nhiều khu du lịch hấp dẫn.', 'image' => 'danang_blog.jpg']
        ]);
    }
}
