<?php

namespace Database\Seeders;

use App\Models\Station;
use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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
            $train['home_station_id'] = $eTicketTrain['home_station_id'];
            $train['name'] = $eTicketTrain['name'];
            $train['date'] = date('Y-m-d', strtotime($eTicketTrain['date']));
            $train['start_time'] = date('h:i:s', strtotime($eTicketTrain['start_time']));
            $train->save();
        }
    }
}
