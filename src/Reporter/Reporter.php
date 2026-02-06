<?php

namespace Drupal\service_collector_demo\Reporter;

use Drupal\service_collector_demo\Provider\ProviderInterface;

/**
 * Collects providers tagged with service_collector_demo.provider.
 */
final class Reporter {

  /**
   * The collected providers.
   *
   * @var \Drupal\service_collector_demo\Provider\ProviderInterface[]
   */
  private array $providers = [];

  /**
   * Adds a provider to the reporter.
   */
  public function addProvider(ProviderInterface $provider): void {
    $this->providers[] = $provider;
  }

  /**
   * Builds report rows from collected providers.
   *
   * @return array<int, array{label: string, output: string}>
   *   A list of report rows.
   */
  public function report(): array {
    $rows = [];
    foreach ($this->providers as $provider) {
      $rows[] = [
        'label' => $provider->label(),
        'output' => $provider->output(),
      ];
    }
    return $rows;
  }

}
