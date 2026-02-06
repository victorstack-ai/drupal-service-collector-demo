<?php

namespace Drupal\service_collector_demo\Provider;

/**
 * Defines a provider for service collector demo output.
 */
interface ProviderInterface {

  /**
   * Returns the label used in the report output.
   */
  public function label(): string;

  /**
   * Returns the provider output.
   */
  public function output(): string;

}
