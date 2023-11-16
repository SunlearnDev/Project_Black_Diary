<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Citys;
use Illuminate\Support\Facades\DB;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['city_id' => 1, 'city_name' => ' Hà Nội', 'city_type' => 'Thủ Đô'],
            ['city_id' => 2, 'city_name' => ' Hà Giang', 'city_type' => ''],
            ['city_id' => 4, 'city_name' => ' Cao Bằng', 'city_type' =>''],
            ['city_id' => 6, 'city_name' => ' Bắc Kạn',  'city_type' => ''],
            ['city_id' => 8, 'city_name' => ' Tuyên Quang',  'city_type' => ''],
            ['city_id' => 10, 'city_name' => ' Lào Cai',  'city_type' => ''],
            ['city_id' => 11, 'city_name' => ' Điện Biên',  'city_type' => ''],
            ['city_id' => 12, 'city_name' => ' Lai Châu',  'city_type' => ''],
            ['city_id' => 14, 'city_name' => ' Sơn La',  'city_type' => ''],
            ['city_id' => 15, 'city_name' => ' Yên Bái',  'city_type' => ''],
            ['city_id' => 17, 'city_name' => ' Hoà Bình',  'city_type' => ''],
            ['city_id' => 19, 'city_name' => ' Thái Nguyên',  'city_type' => ''],
            ['city_id' => 20, 'city_name' => ' Lạng Sơn',  'city_type' => ''],
            ['city_id' => 22, 'city_name' => ' Quảng Ninh',  'city_type' => ''],
            ['city_id' => 24, 'city_name' => ' Bắc Giang',  'city_type' => ''],
            ['city_id' => 25, 'city_name' => ' Phú Thọ',  'city_type' => ''],
            ['city_id' => 26, 'city_name' => ' Vĩnh Phúc',  'city_type' => ''],
            ['city_id' => 27, 'city_name' => ' Bắc Ninh',  'city_type' => ''],
            ['city_id' => 30, 'city_name' => ' Hải Dương',  'city_type' => ''],
            ['city_id' => 31, 'city_name' => 'Thành phố Hải Phòng',  'city_type' => 'Thành phố Trung ương'],
            ['city_id' => 33, 'city_name' => ' Hưng Yên',  'city_type' => ''],
            ['city_id' => 34, 'city_name' => ' Thái Bình',  'city_type' => ''],
            ['city_id' => 35, 'city_name' => ' Hà Nam',  'city_type' => ''],
            ['city_id' => 36, 'city_name' => ' Nam Định',  'city_type' => ''],
            ['city_id' => 37, 'city_name' => ' Ninh Bình',  'city_type' => ''],
            ['city_id' => 38, 'city_name' => ' Thanh Hóa',  'city_type' => ''],
            ['city_id' => 40, 'city_name' => ' Nghệ An',  'city_type' => ''],
            ['city_id' => 42, 'city_name' => ' Hà Tĩnh',  'city_type' => ''],
            ['city_id' => 44, 'city_name' => ' Quảng Bình',  'city_type' => ''],
            ['city_id' => 45, 'city_name' => ' Quảng Trị',  'city_type' => ''],
            ['city_id' => 46, 'city_name' => ' Thừa Thiên Huế',  'city_type' => ''],
            ['city_id' => 48, 'city_name' => 'Thành phố Đà Nẵng',  'city_type' => 'Thành phố Trung ương'],
            ['city_id' => 49, 'city_name' => ' Quảng Nam',  'city_type' => ''],
            ['city_id' => 51, 'city_name' => ' Quảng Ngãi',  'city_type' => ''],
            ['city_id' => 52, 'city_name' => ' Bình Định',  'city_type' => ''],
            ['city_id' => 54, 'city_name' => ' Phú Yên',  'city_type' => ''],
            ['city_id' => 56, 'city_name' => ' Khánh Hòa',  'city_type' => ''],
            ['city_id' => 58, 'city_name' => ' Ninh Thuận',  'city_type' => ''],
            ['city_id' => 60, 'city_name' => ' Bình Thuận',  'city_type' => ''],
            ['city_id' => 62, 'city_name' => ' Kon Tum',  'city_type' => ''],
            ['city_id' => 64, 'city_name' => ' Gia Lai',  'city_type' => ''],
            ['city_id' => 66, 'city_name' => ' Đắk Lắk',  'city_type' => ''],
            ['city_id' => 67, 'city_name' => ' Đắk Nông',  'city_type' => ''],
            ['city_id' => 68, 'city_name' => ' Lâm Đồng',  'city_type' => ''],
            ['city_id' => 70, 'city_name' => ' Bình Phước',  'city_type' => ''],
            ['city_id' => 72, 'city_name' => ' Tây Ninh',  'city_type' => ''],
            ['city_id' => 74, 'city_name' => ' Bình Dương',  'city_type' => ''],
            ['city_id' => 75, 'city_name' => ' Đồng Nai',  'city_type' => ''],
            ['city_id' => 77, 'city_name' => ' Bà Rịa - Vũng Tàu',  'city_type' => ''],
            ['city_id' => 79, 'city_name' => 'Thành phố Hồ Chí Minh',  'city_type' => 'Thành phố Trung ương'],
            ['city_id' => 80, 'city_name' => ' Long An',  'city_type' => ''],
            ['city_id' => 82, 'city_name' => ' Tiền Giang',  'city_type' => ''],
            ['city_id' => 83, 'city_name' => ' Bến Tre',  'city_type' => ''],
            ['city_id' => 84, 'city_name' => ' Trà Vinh',  'city_type' => ''],
            ['city_id' => 86, 'city_name' => ' Vĩnh Long',  'city_type' => ''],
            ['city_id' => 87, 'city_name' => ' Đồng Tháp',  'city_type' => ''],
            ['city_id' => 89, 'city_name' => ' An Giang',  'city_type' => ''],
            ['city_id' => 91, 'city_name' => ' Kiên Giang',  'city_type' => ''],
            ['city_id' => 92, 'city_name' => 'Thành phố Cần Thơ',  'city_type' => 'Thành phố Trung ương'],
            ['city_id' => 93, 'city_name' => ' Hậu Giang',  'city_type' => ''],
            ['city_id' => 94, 'city_name' => ' Sóc Trăng',  'city_type' => ''],
            ['city_id' => 95, 'city_name' => ' Bạc Liêu',  'city_type' => ''],
            ['city_id' => 96, 'city_name' => ' Cà Mau',  'city_type' => '']
        ];
        DB::table('citys')->insert($data);
    }
}
