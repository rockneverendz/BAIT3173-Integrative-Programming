<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use App\Meal;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedUsers();
        $this->seedAdmins();
        $this->seedMeals();
    }

    private function seedUsers()
    {
        User::create([
            'user_id_card' => '19WMR09552',
            'name' => 'Hououin Kyouma',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ])->save();
    }

    private function seedAdmins()
    {
        Admin::create([
            'name' => 'Masakan Malaysia',
            'description' => 'Malaysian cuisine consists of cooking traditions and practices found in Malaysia, and reflects the multiethnic makeup of its population. This resulted in a symphony of flavours, making Malaysian cuisine highly complex and diverse.',
            'email' => 'masakanmalaysia@gmail.com',
            'password' => Hash::make('masakanmalaysia'),
        ])->save();

        Admin::create([
            'name' => 'Noodles',
            'description' => 'Wheat noodles in Japan were adapted from a Chinese recipe by a Buddhist monk as early as the 9th century. Ramen noodles, based on Chinese noodles, became popular in Japan by 1900.',
            'email' => 'noodles@gmail.com',
            'password' => Hash::make('noodles'),
        ])->save();

        Admin::create([
            'name' => 'Chicken Rice',
            'description' => 'Chicken rice is a dish adapted from early Chinese immigrants originally from Hainan province in southern China. The original dish was adapted by the overseas Chinese population.',
            'email' => 'chickenrice@gmail.com',
            'password' => Hash::make('chickenrice'),
        ])->save();
        
        Admin::create([
            'name' => 'Indo Deli',
            'description' => 'Chicken rice is a dish adapted from early Chinese immigrants originally from Hainan province in southern China. The original dish was adapted by the overseas Chinese population.',
            'email' => 'indodeli@gmail.com',
            'password' => Hash::make('indodeli'),
        ])->save();
        
        Admin::create([
            'name' => 'Vegetarian Cuisine',
            'description' => 'Abstaining from the use of animal products, particularly in diet, and an associated philosophy that rejects the commodity status of animals. Not including meat and animal tissue products.',
            'email' => 'vegetariancuisine@gmail.com',
            'password' => Hash::make('vegetariancuisine'),
        ])->save();
        
        Admin::create([
            'name' => 'freshcode',
            'description' => 'Sharing our love of cold-pressed juice. We seek to nurture both body and soul – and to help you make incremental, sustainable life changes on your wellness.',
            'email' => 'freshcode@gmail.com',
            'password' => Hash::make('freshcode'),
        ])->save();
    }
     
    private function seedMeals()
    {
        $this->seedChickenRiceMeals();
        $this->seedMasakanMalaysiaMeals();
    }

    private function seedChickenRiceMeals()
    {
        Meal::create([
            'name' => 'Roasted Chicken Rice',
            'description' => 'Roasted Chicken Rice, as the name suggests, is traditionally made by roasting the chicken in a wood-fired brick oven.',
            'price' => 5.0,
            'availability' => true,
            'image' => 'images/seed_RoastedChickenRice.jpg',
            'admin_id' => '3',
        ])->save();

        Meal::create([
            'name' => 'Drumstick Chicken Rice',
            'description' => 'Drumstick Chicken Rice, as the name suggests, rice with drumstick.',
            'price' => 6.0,
            'availability' => true,
            'image' => 'images/seed_DrumstickChickenRice.jpg',
            'admin_id' => '3',
        ])->save();

        Meal::create([
            'name' => 'Kampung Chicken Rice',
            'description' => 'Chicken live in kampung with rice.',
            'price' => 5.0,
            'availability' => true,
            'image' => 'images/seed_KampungChickenRice.jpg',
            'admin_id' => '3',
        ])->save();

        Meal::create([
            'name' => 'Smoked Duck Rice',
            'description' => 'Smoked Duck Rice.',
            'price' => 6.0,
            'availability' => true,
            'image' => 'images/seed_SmokedDuckRice.jpg',
            'admin_id' => '3',
        ])->save();

        Meal::create([
            'name' => 'Chicken Chop Rice',
            'description' => 'Chicken Chop with Rice.',
            'price' => 6.0,
            'availability' => true,
            'image' => 'images/seed_ChickenChopRice.jpg',
            'admin_id' => '3',
        ])->save();

        Meal::create([
            'name' => 'Steam Chicken Rice',
            'description' => 'Steam Chicken Rice.',
            'price' => 5.0,
            'availability' => true,
            'image' => 'images/seed_SteamChickenRice.jpg',
            'admin_id' => '3',
        ])->save();
    }

    private function seedMasakanMalaysiaMeals()
    {
        Meal::create([
            'name' => 'Nasi Lemak',
            'description' => 'Traditional Local Nasi Lemak.',
            'price' => 3.0,
            'availability' => true,
            'image' => 'images/seed_nasi-lemak.jpg',
            'admin_id' => '1',
        ])->save();

        Meal::create([
            'name' => 'Nasi Lemak Rendang Ayam',
            'description' => 'Best Rendang Curry in Malaysia.',
            'price' => 5.0,
            'availability' => true,
            'image' => 'images/seed_NasiLemakRendang.jpg',
            'admin_id' => '1',
        ])->save();

        Meal::create([
            'name' => 'Nasi Goreng Kampung',
            'description' => 'Spicy Nasi Goreng with anchovy.',
            'price' => 4.0,
            'availability' => true,
            'image' => 'images/seed_NasiGorengKampung.jpg',
            'admin_id' => '1',
        ])->save();

        Meal::create([
            'name' => 'Kue Tiao Goreng',
            'description' => 'Kue Tiao Goreng with prawn and Bean sprouts.',
            'price' => 4.0,
            'availability' => true,
            'image' => 'images/seed_KuetiaoGoreng.jpg',
            'admin_id' => '1',
        ])->save();

        Meal::create([
            'name' => 'Nasi Goreng Pattaya',
            'description' => 'Fried rice dish made by covering or wrapping chicken fried rice, in thin fried egg or omelette.',
            'price' => 4.0,
            'availability' => true,
            'image' => 'images/seed_nasi-goreng-pattaya.jpg',
            'admin_id' => '1',
        ])->save();

        Meal::create([
            'name' => 'Mee Goreng',
            'description' => 'Yellow noodles fried in with garlic, onion or shallots, fried prawn, chicken, or sliced bakso (meatballs), chili.',
            'price' => 4.0,
            'availability' => true,
            'image' => 'images/seed_MeeGoreng.jpg',
            'admin_id' => '1',
        ])->save();
    }
}
