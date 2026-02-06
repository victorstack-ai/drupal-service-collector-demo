<?php

namespace Drupal\service_collector_demo\Tests\Unit;

use Drupal\service_collector_demo\Provider\AlphaProvider;
use Drupal\service_collector_demo\Provider\BetaProvider;
use Drupal\service_collector_demo\Reporter\Reporter;
use PHPUnit\Framework\TestCase;

/**
 * Tests the reporter aggregation behavior.
 */
final class ReporterTest extends TestCase {

  /**
   * Ensures the reporter returns ordered provider output.
   */
  public function testReporterAggregatesProviders(): void {
    $reporter = new Reporter();

    $reporter->addProvider(new AlphaProvider());
    $reporter->addProvider(new BetaProvider());

    $this->assertSame([
      [
        'label' => 'Alpha provider',
        'output' => 'Alpha says hello.',
      ],
      [
        'label' => 'Beta provider',
        'output' => 'Beta reports in.',
      ],
    ], $reporter->report());
  }

}
