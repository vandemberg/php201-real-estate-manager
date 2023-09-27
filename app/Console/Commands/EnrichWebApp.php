<?php

namespace App\Console\Commands;

use App\Models\Broker;
use App\Models\Property;
use App\Models\User;
use Illuminate\Console\Command;

class EnrichWebApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to enrich the site with data. But reset the website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->reset();
        $user = User::create([
            'email' => 'vandemberg.silva.lima@gmail.com',
            'name' => 'Vandemberg Lima',
            'password' => bcrypt('p2ssw0rd'),
        ]);

        $this->info('User created successfully');

        $faker = \Faker\Factory::create();
        $brokers = [];
        for ($i = 0; $i < 10; $i++) {
            $broker = Broker::create([
                'user_id' => $user->id,
                'name' => $faker->name,
                'email' => $faker->email,
            ]);

            array_push($brokers, $broker);
        }

        $this->info('Brokers created successfully');

        for($j = 0; $j < 30; $j++) {
            Property::create([
                'broker_id' => $brokers[rand(0, 9)]->id,
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'code' => $faker->uuid,
                'price' => $faker->randomFloat(2, 100000, 1000000),
                'bedrooms' => $faker->numberBetween(1, 10),
                'bathrooms' => $faker->numberBetween(1, 10),
                'garages' => $faker->numberBetween(1, 10),
                'image' => $this->createFakeImage(),
                'user_id' => $user->id,
            ]);
        }

        $this->info('Properties created successfully');
        $this->info('Enrichment completed successfully');
    }

    private function reset()
    {
        $this->call('migrate:refresh');
        $this->call('db:seed');
    }

    private function createFakeImage()
    {
        $images = [
            'https://resizedimgs.vivareal.com/crop/360x240/named.images.sp/eb60ad84f5b0e4167f4814ff5ffe9d57/description.jpg',
            'https://resizedimgs.vivareal.com/crop/360x240/named.images.sp/23a57430fea2e3929e1bf9f0ebd4058e/description.jpg',
            'https://resizedimgs.vivareal.com/crop/360x240/named.images.sp/ec068b593cc9986931a263f2428f4187/description.jpg',
            'https://resizedimgs.vivareal.com/crop/360x240/named.images.sp/ede55bbc43928132339579514c7b8e6f/description.jpg',
            'https://resizedimgs.vivareal.com/crop/360x240/named.images.sp/3d8c018ac1a07e49aafd4ffc9306a633/description.jpg',
            'https://resizedimgs.vivareal.com/crop/360x240/named.images.sp/e570c882edbd48a2fcf39a8bf7010acd/description.jpg',
            'https://resizedimgs.vivareal.com/crop/360x240/named.images.sp/88a8baba87397af1871cd2469c71ca78/description.jpg',
        ];

        return $images[rand(0, 6)];
    }
}
