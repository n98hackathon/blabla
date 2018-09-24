<?php

namespace N98Hackathon\BlaBla\Reports;

use N98Hackathon\BlaBla\Api\ReportServiceInterface;
use N98Hackathon\BlaBla\Api\ReportServicePoolInterface;

/**
 * Class ReportServicePool
 */
class ReportServicePool implements ReportServicePoolInterface
{
    /**
     * @var ReportServiceInterface[]
     */
    protected $reportServices;

    /**
     * ReportServicePool constructor.
     *
     * @param $reportServices
     */
    public function __construct($reportServices)
    {
        $this->reportServices = $reportServices;
    }

    /**
     * @return ReportServiceInterface[]
     */
    public function getReportServices(): array
    {
        return $this->reportServices;
    }
}