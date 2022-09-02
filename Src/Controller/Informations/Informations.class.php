<?php 
    require_once(__DIR__  . "../../../../Config/Config.php");

    class Informations {

        private function getTypeId($type) {
            switch ($type) {
                case 'VPC_ARRAY':
                    return "vpc_id";
                    break;
                case 'transit_gateway':
                    return 2;
                    break;
                case 'transit_gateway_attachments':
                    return 3;
                    break;
                case 'nat_gateway':
                    return 4;
                    break;
                case 'internet_gateways':
                    return 5;
                    break;
                case 'endpoints':
                    return 6;
                    break;
                case 'vpn':
                    return 7;
                    break;
                case 'peering_connections':
                    return 8;
                    break;
                case 'private_gateway':
                    return 9;
                    break;
                case 'vpc_network':
                    return 10;
                    break;
                case 'network':
                    return 11;
                    break;
                case 'ROUTE_TABLES_ARRAY':
                    return "id";
                    break;
                default:
                    return 0;
                    break;
            }
        }

        private function getLabelByKey($key) {
            $table = file_get_contents(__DIR__ . "../../../../Config/Language.json");
            foreach (json_decode($table, true) as $key1 => $value) {
                foreach ($value as $key2 => $value2) {
                    if ($key2 == "name") {
                        if ($key == $value2) {
                            return $key1;
                        }
                        break;
                    }
                }
            }
        }
     
        
        public function getInformations($type, $id) {
            $table = [];
            $type_table = self::getTypeId($type);
            foreach (constant($type) as $key => $value) {
                if ($value[$type_table] == $id) {
                    foreach ($value as $key2 => $value) {
                        $table[self::getLabelByKey($key2)] = $value;
                    }
                    break;
                }
            }

            return $table;
        }
    }