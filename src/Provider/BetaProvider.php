<?php

namespace Drupal\service_collector_demo\Provider;

/**
 * Demo provider for the collector.
 */
final class BetaProvider implements ProviderInterface {

  /**
   * {@inheritdoc}
   */
  public function label(): string {
    return 'Beta provider';
  }

  /**
   * {@inheritdoc}
   */
  public function output(): string {
    return 'Beta reports in.';
  }

}
