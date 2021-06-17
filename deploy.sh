#!/usr/bin/env bash

function run_cmd(){
    ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null ritom@$SERVER_IP "$*"
}

eval $(ssh-agent)
ssh-add - <<< $SSH_KEY
run_cmd "git -C apps/ror-php checkout -f"
run_cmd "git -C apps/ror-php pull"
eval $(ssh-agent -k)