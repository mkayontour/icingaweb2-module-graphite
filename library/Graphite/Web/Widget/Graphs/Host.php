<?php

namespace Icinga\Module\Graphite\Web\Widget\Graphs;

use Icinga\Module\Graphite\GraphiteQuery;
use Icinga\Module\Graphite\GraphTemplate;
use Icinga\Module\Graphite\Web\Widget\Graphs;

class Host extends Graphs
{
    /**
     * The host to render the graphs of
     *
     * @var string
     */
    protected $host;

    /**
     * Constructor
     *
     * @param   string  $host   The host to render the graphs of
     */
    public function __construct($host)
    {
        $this->host = $host;
    }

    protected function filterGraphiteQuery(GraphiteQuery $query)
    {
        return $query->where('hostname', $this->host);
    }

    protected function includeTemplate(GraphTemplate $template)
    {
        return strpos($template->getFilterString(), '$service') === false;
    }
}