#!/bin/sh
PATH=./node_modules/.bin:$PATH

function composer_asdf {
  composer update
}

function npm_asdf {
  npm ci
}

function start {
  echo 'start'
}

function default {
  start
}

function help {
  echo "$0 <task> <args>"
  echo "Tasks:"
  compgen -A function | cat -n
}

TIMEFORMAT="Task completed in %3lR"
time ${@:-default}

compgen -A function
