# Drupal Service Collector Demo

Part 3 in the "Drupal Service Container Deep Dive" series: service collectors.

A tiny Drupal module that demonstrates service collectors: multiple services tagged with a custom tag are collected into a single reporter service via the `service_collector` tag.

## What it shows

- A custom tag (`service_collector_demo.provider`) applied to multiple provider services.
- A collector service (`service_collector_demo.reporter`) that receives tagged services via `addProvider()`.
- A simple admin report page to display the collected output.

## Install

1. Copy this module into `modules/custom/service_collector_demo`.
2. Enable the module.
3. Visit `/admin/reports/service-collector-demo`.

## Extend the demo

Add a new provider:

1. Create a class that implements `Drupal\service_collector_demo\Provider\ProviderInterface`.
2. Register the service and tag it with `service_collector_demo.provider`.

Example service definition:

```yaml
services:
  service_collector_demo.provider.gamma:
    class: Drupal\service_collector_demo\Provider\GammaProvider
    tags:
      - { name: service_collector_demo.provider }
```

The reporter will automatically include it on the report page without further wiring.

## Quality checks

```bash
composer install
vendor/bin/phpcs
vendor/bin/phpunit
```
