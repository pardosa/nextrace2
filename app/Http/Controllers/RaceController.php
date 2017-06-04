<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nextFive()
    {
        $nextraces = '[
            {
                "id":1,
                "closing_time": "2017-06-04 23:59:59",
                "type": "Greyhounds",
                "location": "Meeting",
                "race": 2,
                "desciption":"This is Greyhounds race"
            },
            {
                "id":2,
                "closing_time": "2017-06-04 23:59:59",
                "type": "Thoroughbred",
                "location": "Meeting",
                "race": 4,
                "desciption":"This is Thoroughbred race"
            },
            {
                "id":3,
                "closing_time": "2017-06-04 23:39:19",
                "type": "Harness",
                "location": "Meeting",
                "race": 3,
                "desciption":"This is Harness race"
            },
            {
                "id":4,
                "closing_time": "2017-06-04 23:59:59",
                "type": "Greyhounds",
                "location": "Meeting",
                "race": 2,
                "desciption":"This is Greyhounds race"
            },
            {
                "id":5,
                "closing_time": "2017-06-04 23:49:13",
                "type": "Thoroughbred",
                "location": "Meeting",
                "race": 1,
                "desciption":"This is Thoroughbred race"
            }
        ]';
        $races = json_decode($nextraces);
        return view('welcome', compact('races'));
    }

    public function racedetail($id)
    {
        $nextraces = '[
            {
                "id":1,
                "closing_time": "2017-06-04 23:59:59",
                "type": "Greyhounds",
                "location": "Meeting",
                "race": 2,
                "desciption":"This is Greyhounds race"
            },
            {
                "id":2,
                "closing_time": "2017-06-04 23:59:59",
                "type": "Thoroughbred",
                "location": "Meeting",
                "race": 4,
                "desciption":"This is Thoroughbred race"
            },
            {
                "id":3,
                "closing_time": "2017-06-04 23:39:19",
                "type": "Harness",
                "location": "Meeting",
                "race": 3,
                "desciption":"This is Harness race"
            },
            {
                "id":4,
                "closing_time": "2017-06-04 23:59:59",
                "type": "Greyhounds",
                "location": "Meeting",
                "race": 2,
                "desciption":"This is Greyhounds race"
            },
            {
                "id":5,
                "closing_time": "2017-06-04 23:49:13",
                "type": "Thoroughbred",
                "location": "Meeting",
                "race": 1,
                "desciption":"This is Thoroughbred race"
            }
        ]';
        $races = json_decode($nextraces);

        $competitors = '[
            {
                "id":1,
                "race_id": 1,
                "name": "Competitor A1",
                "position": 1,
                "desciption":"This is Competitor A1"
            },
            {
                "id":1,
                "race_id": 2,
                "name": "Competitor A2",
                "position": 1,
                "desciption":"This is Competitor A2"
            },
            {
                "id":1,
                "race_id": 2,
                "name": "Competitor B2",
                "position": 4,
                "desciption":"This is Competitor B2"
            },
            {
                "id":1,
                "race_id": 3,
                "name": "Competitor B3",
                "position": 4,
                "desciption":"This is Competitor B3"
            },
            {
                "id":1,
                "race_id": 2,
                "name": "Competitor C3",
                "position": 3,
                "desciption":"This is Competitor C3"
            },
            {
                "id":1,
                "race_id": 2,
                "name": "Competitor D4",
                "position": 2,
                "desciption":"This is Competitor D4"
            },
            {
                "id":1,
                "race_id": 1,
                "name": "Competitor B1",
                "position": 2,
                "desciption":"This is Competitor B1"
            },
            {
                "id":1,
                "race_id": 1,
                "name": "Competitor C1",
                "position": 3,
                "desciption":"This is Competitor C1"
            },
            {
                "id":1,
                "race_id": 1,
                "name": "Competitor D1",
                "position": 1,
                "desciption":"This is Competitor D1"
            },
            {
                "id":1,
                "race_id": 3,
                "name": "Competitor A3",
                "position": 2,
                "desciption":"This is Competitor A3"
            }
        ]';
        $allcompetitors = json_decode($competitors);
        //dump(json_decode($competitors));

        $race = $races[$id];
        $racecomps = [];
        //Assume this process are selecting competitor based on race_id in API
        foreach ($allcompetitors as $key => $competitor) {
            if ($competitor->race_id == $id){
                array_push($racecomps, $competitor);
            }
        }
        //dump($racecomp);
        
        return view('racedetail', compact('race', 'racecomps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
