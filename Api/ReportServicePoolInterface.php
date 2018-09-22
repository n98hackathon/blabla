<?php

namespace N98Hackathon\BlaBla\Api;

/**
 * Interface ReportServicePoolInterface
 *
 * @api
 */
interface ReportServicePoolInterface
{
    /**
     * @return ReportServiceInterface[]
     */
    public function getReportServices(): array;
}