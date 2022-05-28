<?php

namespace Database\Seeders;

use App\Models\Bogi;
use App\Models\Schedule;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Train;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Bernard Brown';
        $user->email = 'bernardbrown@mailinator.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('Pa$$w0rd!');
        $user->remember_token = Str::random(10);
        $user->save();

        foreach (eTicketStations() as $eTicketStation) {
            $station = new Station();
            $station['name'] = $eTicketStation['name'];
            $station['address'] = $eTicketStation['address'];
            $station['latitude'] = $eTicketStation['latitude'];
            $station['longitude'] = $eTicketStation['longitude'];
            $station->save();
        }

        foreach (eTicketTrains() as $eTicketTrain) {
            $train = new Train();
            $train['station_id'] = $eTicketTrain['station_id'];
            $train['name'] = $eTicketTrain['name'];
            $train['date'] = date('Y-m-d', strtotime($eTicketTrain['date']));
            $train['start_time'] = date('h:i:s', strtotime($eTicketTrain['start_time']));
            $train->save();

            foreach (eTicketBogies() as $eTicketBogi) {
                $bogi = new Bogi();
                $bogi['train_id'] = $train['id'];
                $bogi['name'] = $eTicketBogi;
                $bogi->save();

                for ($i = 0; $i <= 25; $i++) {
                    $seat = new Seat();
                    $seat['bogi_id'] = $bogi['id'];
                    $seat['train_id'] = $train['id'];
                    $seat['type'] = rand(0, 1);
                    $seat['name'] = $bogi['name'] . '-' . $i;
                    $seat->save();
                }
            }
        }

        $schedule = new Schedule();
        $schedule['train_id'] = 1;
        $schedule['station_id'] = 2;
        $schedule['time'] = '10:00';
        $schedule['ac_a_price'] = 350;
        $schedule['nac_a_price'] = 150;
        $schedule->save();
    }
}
