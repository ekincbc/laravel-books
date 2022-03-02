<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bookshop;
use DB;

class BookshopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // empty the table bookshops before inserting 
        DB::table('bookshops')->truncate();

        $bookshops = [

            'Prague' => [
                            'Knihy Dobrovský',
                            'Kosmas',
                            'Neoluxor'
                        ],

            'London' => [
                            'Blackwell\'s',
                            'Daunt Books',
                            'Foyles',
                            'John Smith & Son',
                            'W H Smith',
                            'Waterstones',
                            'The Works'
                        ],

            'New York' => [
                            'Amazon Books',
                            'Anderson\'s Bookshops',
                            'Barnes & Noble',
                            'Bookmans',
                            'Books-A-Million',
                            'Books, Inc.',
                            'Deseret Book, also operates Seagull Book',
                            'Follett\'s',
                            'Half Price Books',
                            'Hudson News',
                            'Joseph-Beth Booksellers',
                            'Kinokuniya',
                            'Mardel Christian Stores',
                            'Powell\'s Books',
                            'Schuler Books & Music',
                            'Tattered Cover'
                            ]
];
        // $bookshop = new Bookshop;
        // $bookshop->city = 'Prague';
        // $bookshop->name = 'HubHub';
        // $bookshop->save();
        
                                // $key                  // $value
        foreach ($bookshops as $name_of_city => $array_of_bookshops_in_that_city)
        {
            foreach ($array_of_bookshops_in_that_city as $bookshop_name)
            {
                $bookshop_record = new Bookshop;
                $bookshop_record->name = $bookshop_name;
                $bookshop_record->city = $name_of_city;
                $bookshop_record->save();
            }
        }
    }
}
