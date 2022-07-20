<?php

namespace Database\Seeders;

use App\Models\UnitReview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $reviews = [
            ['unit_id' => 1, 'customer_id' => 1, 'rating' => 4, 'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
            ['unit_id' => 1, 'customer_id' => 2, 'rating' => 5, 'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
            ['unit_id' => 1, 'customer_id' => 3, 'rating' => 3, 'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit volutpat posuere amet phasellus. Imperdiet non fringilla facilisis turpis volutpat facilisis adipiscing. Urna, fames eget et consequat, facilisis suspendisse. Tincidunt eget odio cursus orci mi.', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
        ];
        UnitReview::insert($reviews);
    }
}
