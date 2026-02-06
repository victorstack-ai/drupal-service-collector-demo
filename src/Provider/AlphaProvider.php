<?php

namespace Drupal\service_collector_demo\Provider;

/**
 * Demo provider for the collector.
 */
final class AlphaProvider implements ProviderInterface {

  /**
   * {@inheritdoc}
   */
  public function label(): string {
    return 'Alpha provider';
  }

  /**
   * {@inheritdoc}
   */
  public function output(): string {
    return 'Alpha says hello.';
  }

}
