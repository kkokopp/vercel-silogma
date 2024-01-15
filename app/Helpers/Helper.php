<?php

namespace App\Helpers;


    class Helper{
        public static function AlutsistaKodeGenerator($model, $trow, $length = 5, $prefix, $seri){
            $data = $model::orderBy('id', 'desc')->first();
            if(!$data){
                $og_length = $length;
                $last_number = '';
            }else{
                $code = preg_replace('/[^0-9]/', '', $data->$trow);
                $actial_last_number = ($code/1)*1;
                $increment_last_number = $actial_last_number+1;
                $last_number_length = strlen($increment_last_number);
                $og_length = $length - $last_number_length;
                $last_number = $increment_last_number;
            }
            $zeros = "";
            for($i=0; $i<$og_length;$i++){
                $zeros.="0";
            }
            return $prefix.$seri.$zeros.$last_number;

        }

        public static function RiwayatKodeGenerator($model, $trow, $length = 3, $prefix){
            $data = $model::orderBy('id', 'desc')->first();
            if(!$data){
                $og_length = $length;
                $last_number = '';
            }else{
                $code = preg_replace('/[^0-9]/', '', $data->$trow);
                $actial_last_number = ($code/1)*1;
                $increment_last_number = $actial_last_number+1;
                $last_number_length = strlen($increment_last_number);
                $og_length = $length - $last_number_length;
                $last_number = $increment_last_number;
            }
            $zeros = "";
            for($i=0; $i<$og_length;$i++){
                $zeros.="0";
            }
            $currentTime = now();
            $currentTime = $currentTime->toTimeString();
            $prefix = $prefix . $currentTime;
            return $prefix.$zeros.$last_number;
        }
    }
?>