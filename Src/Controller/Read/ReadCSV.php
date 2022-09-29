<?php 

    class ReadCSV {
        public function GetAllCSV($filename) {
            $csv_array = [];
            // $file = fopen("Src/Controller/CSV/csv_files/" . $filename . ".csv" , "r");
            $file = fopen(__DIR__ . "../../../../Src/Controller/CSV/csv_files/" . $filename . ".csv" , "r");
            while (!feof($file)) {
                $ar = fgetcsv($file);
                $csv_array[] = $ar;
            }
            fclose($file);
            return $csv_array;
        }
    }