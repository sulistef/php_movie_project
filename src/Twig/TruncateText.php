<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TruncateText extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('truncate', [$this, 'truncateText']),
        ];
    }

    public function truncateText($str)
    {
        $chaine = substr($str, 0, 100) . " ...";

        return $chaine;
    }
}