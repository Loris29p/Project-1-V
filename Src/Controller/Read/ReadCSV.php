<?php 

    class ReadCSV {
        public function GetAllCSV($directory) {
            $csv_array = [];
            $file = fopen($directory , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            return $csv_array;
        }
    }