<?php

function eTicketStations() : array
{
    return [
        [
            'name' => 'Dhaka A',
            'address' => '3/18, Dhaka',
            'latitude' => '12.5738515',
            'longitude' => '63.5636063',
        ],
        [
            'name' => 'Dhaka B',
            'address' => '7/14, Dhaka',
            'latitude' => '22.7738415',
            'longitude' => '70.3636013',
        ],
        [
            'name' => 'Dhaka C',
            'address' => '5/10, Dhaka',
            'latitude' => '28.2735455',
            'longitude' => '83.9666017',
        ],
    ];
}

function eTicketTrains() : array
{
    return [
        [
            'station_id' => 1,
            'name' => 'Dhaka Express',
            'date' => '2022-05-25',
            'start_time' => '07:00',
        ],
        [
            'station_id' => 2,
            'name' => 'Chittagong Express',
            'date' => '2022-05-25',
            'start_time' => '09:00',
        ],
    ];
}

function eTicketBogies() : array
{
    return ['DEX-P', 'DEX-NP'];
}
