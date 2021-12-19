<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = new School();

        $school->name = 'Claretiano';
        $school->address = 'calle 68';
        $school->city = 'Bogota';
        $school->country = 'Colombia';
        $school->icon_url = 'https://yt3.ggpht.com/ytc/AKedOLSOkLpu5O03zUW0w_zC0UGR59c-1P013hUwYXzA=s900-c-k-c0x00ffffff-no-rj';
        $school->is_enable = 1;
        $school->save();
    }
}
