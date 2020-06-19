<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;

class StatsController extends AbstractController
{
    /**
     * @Route("/stats", name="stats")
     */
    public function indexAction()
    {
        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            [['Categories', 'Pie expense'],
                ['2020',  1],
                ['2021',  2],
                ['2022',  3],
                ['2023',  4],
                ['2024',  5]
            ]
        );
        $pieChart->getOptions()->setTitle('My expenses report');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);

        return $this->render('stats/index.html.twig', array('piechart' => $pieChart));
    }
}
