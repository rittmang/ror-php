#!/usr/bin/env bash

function run_cmd(){
    ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null ritom@SERVER_IP "$*"
}

eval $(ssh-agent)
ssh-add - <<< $SSH_KEY
run_cmd "cd apps/ror-php"
run_cmd "git checkout -f"
run_cmd "git pull"
eval $(ssh-agent -k)