<?php
function tableFromCsv($filename, $titles = true) {
    if (!file_exists($filename) || !is_readable($filename)) {
        return false;
    } else {
        $file = fopen($filename, 'r');
        while (($rows[] = fgetcsv($file)) !== false) {}
        $output = "<table>\n<tr>\n";
        if ($titles) {
            $headers = array_shift($rows);
            foreach ($headers as $header) {
                $output .= '<th>' . ucwords($header) . "</th>\n";
            }
            $output .= "</tr>\n";
        }
        foreach ($rows as $row) {
            if (is_array($row)) {
                $output .= "<tr>\n";
                foreach ($row as $item) {
                    $output .= "<td>$item</td>\n";
                }
                $output .= "</tr>\n";
            }
        }
        $output .= "</table>\n";
        fclose($file);
        return $output;
    }
}

