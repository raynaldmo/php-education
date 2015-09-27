<?php
function tableFromCsv($filename, $titles = true, $options = null) {
    if (!file_exists($filename) || !is_readable($filename)) {
        return false;
    } else {
        $options['length'] = (isset($options['length'])) ? $options['length'] : 0;
        $options['delimiter'] = (isset($options['delimiter'])) ? $options['delimiter'] : ',';
        $options['enclosure'] = (isset($options['enclosure'])) ? $options['enclosure'] : '"';
        $options['escape'] = (isset($options['escape'])) ? $options['escape'] : '\\';
        $file = fopen($filename, 'r');
        while (($rows[] = fgetcsv($file, $options['length'],
                $options['delimiter'], $options['enclosure'],
                $options['escape'])) !== false) {}
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

function extractCsv($filename, $titles = true, $options = null) {
    if (!file_exists($filename) || !is_readable($filename)) {
        return false;
    } else {
        $options['length'] = (isset($options['length'])) ? $options['length'] : 0;
        $options['delimiter'] = (isset($options['delimiter'])) ? $options['delimiter'] : ',';
        $options['enclosure'] = (isset($options['enclosure'])) ? $options['enclosure'] : '"';
        $options['escape'] = (isset($options['escape'])) ? $options['escape'] : '\\';
        $file = fopen($filename, 'r');
        while (($rows[] = fgetcsv($file, $options['length'],
                $options['delimiter'], $options['enclosure'],
                $options['escape'])) !== false) {}
        $output = "<table>\n<tr>\n";
        if ($titles) {
            $headers = array_shift($rows);
            foreach ($rows as $row) {
                if (is_array($row)) {
                    $csv[] = array_combine($headers, $row);
                }
            }
            return $csv;
        } else {
            return $rows;
        }
    }
}