<?php

namespace tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test case for BatteryLog controller
 *
 * @group functional
 */
class BatteryLogControllerTest extends WebTestCase
{
    /**
     * Test scenario to check that aggregated statistic is populated properly
     */
    public function testStatisticsCollected()
    {
        $client = static::createClient();

        // statistic is empty
        $client->request('GET', '/battery/');
        $this->assertContains('The box is empty', $client->getResponse()->getContent());

        // add some batteries
        $client->request('POST', '/battery/add/', [
            'battery_log_form' => [
                'type' => 'AA',
                'count' => 4,
            ],
        ]);

        $client->request('POST', '/battery/add/', [
            'battery_log_form' => [
                'type' => 'AAA',
                'count' => 3,
            ],
        ]);

        $client->request('POST', '/battery/add/', [
            'battery_log_form' => [
                'type' => 'AA',
                'count' => 1,
            ],
        ]);

        // and check statistics
        $crawler = $client->request('GET', '/battery/');

        $rows = $crawler->filter('table.data-table tbody tr');

        $this->assertEquals(2, $rows->count());

        $this->assertEquals('AA', $rows->first()->filter('.data-type')->text());
        $this->assertEquals(5, $rows->first()->filter('.data-count')->text());

        $this->assertEquals('AAA', $rows->last()->filter('.data-type')->text());
        $this->assertEquals(3, $rows->last()->filter('.data-count')->text());
    }
}
