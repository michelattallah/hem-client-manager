<?php
namespace App\Services\Charts;
use Illuminate\Http\Request;
use Response;

class ChartsService{

    public function logs($dates ,$data){
        
        $details = $this->extractLogsDetails($dates , $data);
        

        $series =
        [
            [
                'name' => "Session Duration",
                'data' => [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
            ],
            [
                'name' => "Page Views",
                'data' => [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
            ]
        ];
        $categories = ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan', '10 Jan', '11 Jan', '12 Jan'];
       return Response::json(
           [
            'series'        => $series,
            'categories'    => $categories,
           ], 200);
    }


    protected function extractLogsDetails($dates ,$data){

        
        
        $services = [
            'mautic'         => 'Mautic Leads',
            'sms'            => 'SMS Sent',
            'phone-calls'    => 'Phone Calls',
            'browser-calls'  => 'Browser Calls',
            'email'          => 'Mass Emails',
        ];

       

        $tmp = []   ;
        $logData = [];
        foreach ($data as $item) {

            $tmp[$item['date']][ $services[ $item['service'] ] ] = $item['data']  ;
            
        }
        
        
        $series=[];
        $categories=[];
        foreach ($tmp as $date=>$log) {
            
            $categories[] = $date; 
            dump($log);
            
            foreach ($log as $key => $value) {
                
                

            }
            
            

        }

        dd($categories);

        return [
            'series' => $series,
            'categories' => array_unique($categories),
        ];

    }

}