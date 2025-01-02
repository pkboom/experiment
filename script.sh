#!/bin/sh

PATH=./node_modules/.bin:$PATH

composer_asdf() {
    composer update
}

npm_asdf() {
    npm ci
}

start() {
    echo 'start'
}

default() {
    start
}

help() {
    echo "$0 <task> <args>"
    echo "Tasks:"
    compgen -A function | cat -n
}

TIMEFORMAT="Task completed in %3lR"
time ${@:-default}

# compgen -A function
