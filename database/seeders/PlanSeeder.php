<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;
class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $plans = [
            // [
            //     'name' => 'Business Plan', 
            //     'slug' => 'business-plan', 
            //     'stripe_plan' => 'price_1ODpJeILqfNQzA70Skb5d0GN', 
            //     'price' => 10, 
            //     'description' => 'Business Plan'
            // ],
            // [
            //     'name' => 'Premium', 
            //     'slug' => 'premium', 
            //     'stripe_plan' => 'price_1ODx8WILqfNQzA703sfk6TRF', 
            //     'price' => 20, 
            //     'description' => 'Premium'
            // ]
            [
                'name' => 'Activación de Taller', 
                'slug' => 'activacion-de-taller', 
                'stripe_plan' => 'price_1OGXIPILqfNQzA70WTHMuhjH', 
                'price' => 10, 
                'description' => 'opcion para activar la configuracion completa del taller' 
            ]
        ];
   
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
