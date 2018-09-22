<?php
/**
 * @copyright Copyright (c) 1999-2018 netz98 GmbH (http://www.netz98.de)
 *
 * @see PROJECT_LICENSE.txt
 */

namespace N98Hackathon\BlaBla\Cron;

use N98Hackathon\BlaBla\Reports\ReportServicePool;

/**
 * Class SendReports
 */
class SendReports
{
    /**
     * @var ReportServicePool
     */
    protected $reportServicePool;

    /**
     * SendReports constructor.
     *
     * @param ReportServicePool $reportServicePool
     */
    public function __construct(ReportServicePool $reportServicePool)
    {
        $this->reportServicePool = $reportServicePool;
    }

    /**
     * @return void
     */
    public function execute()
    {
        foreach ($this->reportServicePool->getReportServices() as $reportService) {
            $reportService->execute();
        }
    }
}
