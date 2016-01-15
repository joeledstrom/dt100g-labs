#!/usr/bin/env sh

composer -n install
apache2-foreground
