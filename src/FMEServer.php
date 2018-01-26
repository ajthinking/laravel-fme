<?php

namespace Ajthinking\LaravelFME;

//use Illuminate\Http\Request;
//use App\Http\Requests;

use GuzzleHttp;

//use GuzzleHttp\Psr7;
//use GuzzleHttp\Exception\RequestException;


class FMEServer
{
    public function __construct() 
    {
        $this->client = new GuzzleHttp\Client([
            //'base_uri' => env('FME_SERVER_URL') . '/fmerest/v2/',
            'headers' => [
                //'Authorization' => 'fmetoken token=' . env('FME_SERVER_API_TOKEN'),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'fmetoken token=9db027f866557e0e599fea6731aba46af9615e47' //a4d9faae21b98627b98a30ccde85e99d968b7ad3' 
            ],
            'verify' => false
        ]);
    }

    public function dataDownload($workspace) {            
        $sample = "http://A002344/fmedatadownload/test/" . $workspace . ".fmw"; 
        
        $result = $this->client->request('GET', $sample, [
            "query" => [
                "GEOM" => "POLYGON ((12.682492733001709 56.05228099319617, 12.681570053100586 56.04746363060363, 12.691075801849365 56.048542196885634, 12.685689926147461 56.05194547499565, 12.682492733001709 56.05228099319617))",
                "opt_responseformat" => "json",
                "opt_servicemode"=> "async",
                "opt_requesteremail" => "anders.jurisoo@helsingborg.se"
            ]
        ]);        
        if($result->getStatusCode() == 200) {
            dd(json_decode($result->getBody()));
            $data = json_decode($result->getBody());            
            return $data;
        }
        return "THERE WAS SOME KIND OF ERROR "; 
    }

    public function jobStatus($id) {
        $sample = "http://a002344/fmerest/v2/transformations/jobs/id/" . $id . "?detail=low"; 
        
        $result = $this->client->request('GET', $sample, [
            "query" => [
                "opt_responseformat" => "json",
                "opt_servicemode"=> "async"
            ]
        ]);

        if($result->getStatusCode() == 200) {
            dd(json_decode($result->getBody()));
            $data = json_decode($result->getBody());            
            return $data;
        }
        return "THERE WAS SOME KIND OF ERROR ";      
    }
}
