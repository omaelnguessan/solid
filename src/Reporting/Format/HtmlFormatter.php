<?php

namespace App\Reporting\Format;

use App\Reporting\Report;
use Exception;

class HtmlFormatter implements FormatterInterface {

    /**
     * Retourne le rapport formatté en HTML
     * @param Report $report
     * @return string
     */
    public function format(Report $report) : string {
        $content = $report->getContents();
        $data = "";

        foreach ($content['data'] as $value) {
            $data .= "<li>$value</li>";
        }

        return "
            <h2>{$content['title']}</h2>
            <em>Date : {$content['date']}</em>
            <h4>Données : </h4>
            <ul>
                $data
            </ul>
        ";
    }
}