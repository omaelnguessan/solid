<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class CsvFormatter implements FormatterInterface, DeserializeInterface {

    /**
     * Retourne le rapport formatté en CSV
     * @param Report $report
     * @return string
     */
    public function format(Report $report) : string {
        $content = $report->getContents();
        $data = implode(";", $content['data']);
        unset($content['data']);

        return implode(";", $content). ";" . $data;
    }

    /**
     * Retourne le string formatté en Repport
     * @param string $string
     * @return Report
     */
    public function deserialize(string $string): Report
    {
        $content = explode(";", $string);
        $data = [
            $content[2],
            $content[3]
        ];

        return new Report($content[1], $content[0], $data);
    }
}