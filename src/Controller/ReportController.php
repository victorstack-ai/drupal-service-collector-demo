<?php

namespace Drupal\service_collector_demo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\service_collector_demo\Reporter\Reporter;

/**
 * Returns a report for the service collector demo.
 */
final class ReportController extends ControllerBase {

  /**
   * The reporter service.
   */
  public function __construct(
    private readonly Reporter $reporter,
  ) {}

  /**
   * Creates the controller with the reporter service.
   */
  public static function create($container): static {
    return new static(
      $container->get('service_collector_demo.reporter'),
    );
  }

  /**
   * Builds the report page.
   */
  public function report(): array {
    $rows = [];
    foreach ($this->reporter->report() as $row) {
      $rows[] = [$row['label'], $row['output']];
    }

    return [
      '#type' => 'table',
      '#header' => ['Provider', 'Output'],
      '#rows' => $rows,
      '#empty' => $this->t('No providers were collected.'),
    ];
  }

}
