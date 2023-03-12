#!/bin/bash

main() {
  composer install --no-progress

  php please ssg:generate
}

main
