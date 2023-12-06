<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Citys;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'name' => ' Hà Nội', 'type' => 'Thủ Đô'],
            ['id' => 2, 'name' => ' Hà Giang', 'type' => ''],
            ['id' => 4, 'name' => ' Cao Bằng', 'type' =>''],
            ['id' => 6, 'name' => ' Bắc Kạn',  'type' => ''],
            ['id' => 8, 'name' => ' Tuyên Quang',  'type' => ''],
            ['id' => 10, 'name' => ' Lào Cai',  'type' => ''],
            ['id' => 11, 'name' => ' Điện Biên',  'type' => ''],
            ['id' => 12, 'name' => ' Lai Châu',  'type' => ''],
            ['id' => 14, 'name' => ' Sơn La',  'type' => ''],
            ['id' => 15, 'name' => ' Yên Bái',  'type' => ''],
            ['id' => 17, 'name' => ' Hoà Bình',  'type' => ''],
            ['id' => 19, 'name' => ' Thái Nguyên',  'type' => ''],
            ['id' => 20, 'name' => ' Lạng Sơn',  'type' => ''],
            ['id' => 22, 'name' => ' Quảng Ninh',  'type' => ''],
            ['id' => 24, 'name' => ' Bắc Giang',  'type' => ''],
            ['id' => 25, 'name' => ' Phú Thọ',  'type' => ''],
            ['id' => 26, 'name' => ' Vĩnh Phúc',  'type' => ''],
            ['id' => 27, 'name' => ' Bắc Ninh',  'type' => ''],
            ['id' => 30, 'name' => ' Hải Dương',  'type' => ''],
            ['id' => 31, 'name' => 'Thành phố Hải Phòng',  'type' => 'Thành phố Trung ương'],
            ['id' => 33, 'name' => ' Hưng Yên',  'type' => ''],
            ['id' => 34, 'name' => ' Thái Bình',  'type' => ''],
            ['id' => 35, 'name' => ' Hà Nam',  'type' => ''],
            ['id' => 36, 'name' => ' Nam Định',  'type' => ''],
            ['id' => 37, 'name' => ' Ninh Bình',  'type' => ''],
            ['id' => 38, 'name' => ' Thanh Hóa',  'type' => ''],
            ['id' => 40, 'name' => ' Nghệ An',  'type' => ''],
            ['id' => 42, 'name' => ' Hà Tĩnh',  'type' => ''],
            ['id' => 44, 'name' => ' Quảng Bình',  'type' => ''],
            ['id' => 45, 'name' => ' Quảng Trị',  'type' => ''],
            ['id' => 46, 'name' => ' Thừa Thiên Huế',  'type' => ''],
            ['id' => 48, 'name' => 'Thành phố Đà Nẵng',  'type' => 'Thành phố Trung ương'],
            ['id' => 49, 'name' => ' Quảng Nam',  'type' => ''],
            ['id' => 51, 'name' => ' Quảng Ngãi',  'type' => ''],
            ['id' => 52, 'name' => ' Bình Định',  'type' => ''],
            ['id' => 54, 'name' => ' Phú Yên',  'type' => ''],
            ['id' => 56, 'name' => ' Khánh Hòa',  'type' => ''],
            ['id' => 58, 'name' => ' Ninh Thuận',  'type' => ''],
            ['id' => 60, 'name' => ' Bình Thuận',  'type' => ''],
            ['id' => 62, 'name' => ' Kon Tum',  'type' => ''],
            ['id' => 64, 'name' => ' Gia Lai',  'type' => ''],
            ['id' => 66, 'name' => ' Đắk Lắk',  'type' => ''],
            ['id' => 67, 'name' => ' Đắk Nông',  'type' => ''],
            ['id' => 68, 'name' => ' Lâm Đồng',  'type' => ''],
            ['id' => 70, 'name' => ' Bình Phước',  'type' => ''],
            ['id' => 72, 'name' => ' Tây Ninh',  'type' => ''],
            ['id' => 74, 'name' => ' Bình Dương',  'type' => ''],
            ['id' => 75, 'name' => ' Đồng Nai',  'type' => ''],
            ['id' => 77, 'name' => ' Bà Rịa - Vũng Tàu',  'type' => ''],
            ['id' => 79, 'name' => 'Thành phố Hồ Chí Minh',  'type' => 'Thành phố Trung ương'],
            ['id' => 80, 'name' => ' Long An',  'type' => ''],
            ['id' => 82, 'name' => ' Tiền Giang',  'type' => ''],
            ['id' => 83, 'name' => ' Bến Tre',  'type' => ''],
            ['id' => 84, 'name' => ' Trà Vinh',  'type' => ''],
            ['id' => 86, 'name' => ' Vĩnh Long',  'type' => ''],
            ['id' => 87, 'name' => ' Đồng Tháp',  'type' => ''],
            ['id' => 89, 'name' => ' An Giang',  'type' => ''],
            ['id' => 91, 'name' => ' Kiên Giang',  'type' => ''],
            ['id' => 92, 'name' => 'Thành phố Cần Thơ',  'type' => 'Thành phố Trung ương'],
            ['id' => 93, 'name' => ' Hậu Giang',  'type' => ''],
            ['id' => 94, 'name' => ' Sóc Trăng',  'type' => ''],
            ['id' => 95, 'name' => ' Bạc Liêu',  'type' => ''],
            ['id' => 96, 'name' => ' Cà Mau',  'type' => '']
        ];
        DB::table('citys')->insert($data);
    }
}
