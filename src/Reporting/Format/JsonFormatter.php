<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class JsonFormatter implements FormatterInterface, DeserializeInterface {

    /**
     * Retourne le rapport formatté en JSON
     * @param Report $report
     * @return string
     */
    public function format(Report $report): string
    {
        return json_encode($report->getContents());
    }

     /**
     * Retourne le rapport formatté en JSON
     * @param string $string
     * @return Report
     */
    public function deserialize(string $string): Report
    {
        $content = json_decode($string);

        return new Report($content['date'], $content['title'], $content['data']);

    }
}