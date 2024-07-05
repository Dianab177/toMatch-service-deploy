<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $numMatch = DB::select('CALL getNumMatch()');
       
        if ($numMatch[0]->NumMatch > 0) {
            $lastNumMatch=$numMatch[0]->NumMatch;
           
            $matches = DB::select("CALL getMatches($lastNumMatch)");
           
            if ($matches) {
                $data = [
                    'message' => 'Matches fetched successfully',
                    'matches' => $matches
                ];
                return response()->json($data);
            }
            else{
                return response()->json(['message' => 'Error to fetched Matches'], 500);     
            }
        }

        return response()->json(['message' => 'Error to get NunMatches'], 500); 
            
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $totalRecruiters = DB::select('CALL countRecruiters()');
        $totalCoders = DB::select('CALL countCoders()');
        if ( $totalRecruiters[0]->total > 0  && $totalCoders[0]->total>0  ) {
            
            $numMatch = DB::select('CALL getNumMatch()');
            
            $newNumMatch=1;
            if ($numMatch[0]->NumMatch > 0 ) {
                $newNumMatch=$numMatch[0]->NumMatch;
                $newNumMatch++;
            }
            
            $recruiters = DB::select('CALL getAllRecruiters()');
            
            foreach ($recruiters as $recruiter){
                
                $coders = DB::select('CALL getAllCoders()');
                                
                foreach ($coders as $coder){
                    
                    $coincidences = [];

                    $recruiterLocations = DB::select("CALL getRecruiterLocations($recruiter->id)");
                    $coinLocation = 0;
                    if ($recruiterLocations ) {
                        
                        foreach ($recruiterLocations as $recruiterLocation){

                            $coderLocation = DB::select("CALL getCoderLocation($coder->id, $recruiterLocation->province_id )");
                            
                            if ($coderLocation) {
                                $coinLocation = 1;
                                
                            }

                        } 
                    }
                    else{
                        $coinLocation = 1; //El recruiter no tiene ubicacion definida, machea con todas
                    }
                    
                    if ( $coinLocation || $recruiter->remote) {
                        $recruiterStacks = DB::select("CALL getRecruiterStacks($recruiter->id)");
                        if ($recruiterStacks) {
                            
                            foreach ($recruiterStacks as $recruiterStack){
                                
                                $coderStack = DB::select("CALL getCoderStack($coder->id, $recruiterStack->stack_id )");
                                
                                if ( $coderStack) {
                                    array_push($coincidences, 1);

                                }
                                else{
                                    array_push($coincidences, 0);
                                    
                                }

                            }
                        }else{
                            array_push($coincidences, 1);//El recruiter no tiene Stack definido, machea con todos 
                        }
                        
                        if (array_sum($coincidences)) {
                            
                            $recruiterLanguages = DB::select("CALL getRecruiterLanguages($recruiter->id)");
                            foreach ($recruiterLanguages as $recruiterLanguage){
                        
                                $coderLanguage = DB::select("CALL getCoderLanguage($coder->id, $recruiterLanguage->language_id )");
                                
                                if ( $coderLanguage) {
                                    array_push($coincidences, 1);
                                }
                                else{
                                    array_push($coincidences, 0);
                                    
                                }
                        
                            }
                        
                        }

                        $afinity = array_sum($coincidences)/count($coincidences)*100;

                        $match = DB::insert("CALL storeMatch($coder->id, $recruiter->id, $afinity, $newNumMatch)");
                        

                    }else{
                        $match = DB::insert("CALL storeMatch($coder->id, $recruiter->id, 0, $newNumMatch)");
                        
                    }
                    
                }
                
            }
            $matches = DB::select("CALL getMatches($newNumMatch)");
            
            if ($matches) {
                $data = [
                    'message' => 'Matches created successfully',
                    'matches' => $matches
                ];
                return response()->json($data);
            }
            else{
                return response()->json(['message' => 'Error to created Matches'], 500);     
            }

            
        }
        else{
            $data = [
                'message' => 'ERROR, There are not recruiters and/or coders'
            ];
            return response()->json($data);
        }
        
       
    }

    public function getnumatches ()
    {
        $numMatch = DB::select('CALL getNumMatch()');
                
        if ($numMatch[0]->NumMatch > 0 ) {
            $data = [
                'message' => 'OK'
            ];
            return response()->json($data);
        }
        else{
            return response()->json(['message' => 'Error to get NunMatchessssssss'], 500); 
        }
    }

    public function search(Request $request)
    {
        $request->validate([
            'search_text' => 'required'
        ]);
        $numMatch = DB::select('CALL getNumMatch()');
        
        if ($numMatch[0]->NumMatch > 0) {
            $lastNumMatch=$numMatch[0]->NumMatch;
            
            $matches = DB::table("matches")
                ->join("recruiters","recruiters.id","=", "matches.recruiter_id")
                ->join("companies","companies.id","=", "recruiters.company_id")
                ->join("coders", "coders.id", "=", "matches.coder_id")
                ->join("events", "events.id", "=", "coders.event_id")
                ->where("matches.num_match", "=", $lastNumMatch)
                ->Where("companies.name", "LIKE", "%".$request->search_text."%")
                ->orWhere("recruiters.name", "LIKE", "%".$request->search_text."%")
                ->orWhere("coders.name", "LIKE", "%".$request->search_text."%")
                ->orWhere("events.name", "LIKE", "%".$request->search_text."%")
                ->select("events.name AS nameEvent",
                        "companies.name AS nameCompany", 
                        "companies.priority", 
                        "recruiters.id as idRecruiter", 
                        "recruiters.name as nameRecruiter", 
                        "coders.name as nameCoder", 
                        "matches.num_match", 
                        "matches.afinity")
                ->orderBy("companies.priority")
                ->orderBy("recruiters.id")
                ->orderBy("matches.afinity","DESC")
                ->get();
            if ($matches) {
                $data = [
                    'message' => 'Matches fetched successfully',
                    'search' => $request->search_text,
                    'matches' => $matches
                ];
                return response()->json($data);
            }
            else{
                return response()->json(['message' => 'Error to fetched Matches'], 500);     
            } 


        }

        return response()->json(['message' => 'Error to get NunMatches'], 500); 
            
       
    }

    public function demo()
    {
        $totalRecruiters = DB::select('CALL countRecruiters()');
        $totalCoders = DB::select('CALL countCoders()');
        if ( $totalRecruiters[0]->total > 0  && $totalCoders[0]->total>0  ) {
            
            $NumMatch = DB::select('CALL getNumMatch()');
            //dd($NumMatch[0]->NumMatch);
            $newNumMatch=1;
            if ($NumMatch[0]->NumMatch > 0 ) {
                $newNumMatch=$NumMatch[0]->NumMatch;
                $newNumMatch++;
                dd($newNumMatch);
            }
            echo "Numero del Match: ".$newNumMatch;
            echo '<br>';
            $recruiters = DB::select('CALL getAllRecruiters()');
            
            foreach ($recruiters as $recruiter){
                //dd($recruiter->id);
                echo '**********************************************************************************<br>';
                echo 'Recruiter: ';
                print_r($recruiter->id) ;
                //print_r($recruiter->province_id) ;
                echo '<br>';
                echo '**********************************************************************************<br>'; 

                $coders = DB::select('CALL getAllCoders()');
                //dd($coders);
                //print_r($coders) ; 
                
                foreach ($coders as $coder){
                    echo 'Coder: ';
                    print_r($coder->id) ;
                    //print_r($coder->province_id) ;
                    echo '<br>';
                    
                    $coincidences = [];

                    $recruiterLocations = DB::select("CALL getRecruiterLocations($recruiter->id)");
                    $coinLocation = 0;
                    foreach ($recruiterLocations as $recruiterLocation){

                        $coderLocation = DB::select("CALL getCoderLocation($coder->id, $recruiterLocation->province_id )");
                        echo "Recruiter Locations: ".$recruiterLocation->province_id;
                        if ($coderLocation) {
                            $coinLocation = 1;
                            echo " Coder Locations: ".$coderLocation[0]->province_id;
                            echo '<br>'; 
                        }

                    } 
                    echo '<br>'; 
                    echo "Recruiter Remote:".$recruiter->remote;
                    echo '<br>'; 
                    if ( $coinLocation || $recruiter->remote) {

                        $recruiterStacks = DB::select("CALL getRecruiterStacks($recruiter->id)");
                        foreach ($recruiterStacks as $recruiterStack){
                            //dd($recruiterLanguages);
                            //print_r($recruiterStack->stack_id) ;
                            //echo '<br>'; 
                            $coderStack = DB::select("CALL getCoderStack($coder->id, $recruiterStack->stack_id )");
                            
                            echo "STACK: ";
                            echo '<br>'; 
                            if ( $coderStack) {
                                array_push($coincidences, 1);
                                echo "COINCIDE STACK:$recruiterStack->stack_id DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name  ";
                                echo '<br>'; 
                            }
                            else{
                                array_push($coincidences, 0);
                                echo "NOOOOO COINCIDE STACK:$recruiterStack->stack_id DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name  ";
                                echo '<br>'; 
                            }

                        }
                        
                        if (array_sum($coincidences)) {
                            
                            $recruiterLanguages = DB::select("CALL getRecruiterLanguages($recruiter->id)");
                            foreach ($recruiterLanguages as $recruiterLanguage){
                        
                                $coderLanguage = DB::select("CALL getCoderLanguage($coder->id, $recruiterLanguage->language_id )");
                                echo "LANGUAGE: ";
                                echo '<br>'; 
                                if ( $coderLanguage) {
                                    array_push($coincidences, 1);
                                    echo "COINCIDE LANGUAGE:$recruiterStack->stack_id DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name  ";
                                    echo '<br>'; 
                                }
                                else{
                                    array_push($coincidences, 0);
                                    echo "NOOOOO COINCIDE LANGUAGE:$recruiterStack->stack_id DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name  ";
                                    echo '<br>'; 
                                }
                        
                            }
                        
                        }

                        $afinity = array_sum($coincidences)/count($coincidences)*100;

                        $match = DB::insert("CALL storeMatch($coder->id, $recruiter->id, $afinity, $newNumMatch)");
                        
                        echo "AFINIDAD <$afinity> DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name <br>  ";
                        echo '=========================================================================<br>'; 

                    }else{
                        $match = DB::insert("CALL storeMatch($coder->id, $recruiter->id, 0, $newNumMatch)");
                        
                        echo "NO coincide Afinidad NI Teletrabajo DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name <br>  ";
                        echo "AFINIDAD <0> DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name <br>  ";
                        echo '=========================================================================<br>'; 
                            
                    }
                    
                }
                
            }
        }
       
    }
    
}
