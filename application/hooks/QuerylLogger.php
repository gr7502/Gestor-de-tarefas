<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QueryLogger {
    public function log_queries() {
        $CI =& get_instance();
        $queries = $CI->db->queries;

        if (!empty($queries)) {
            $file_path = APPPATH . '../assets/logs/query_log.sql';
            $log_file = fopen($file_path, 'a');

            foreach ($queries as $query) {
                fwrite($log_file, "[" . date('Y-m-d H:i:s') . "] " . $query . ";\n");
            }

            fclose($log_file);
        }
    }
}
