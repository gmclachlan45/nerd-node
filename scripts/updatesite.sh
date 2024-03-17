#!/bin/bash
cd ~
rm -r nerd-node
rm -r public_html/*
git clone https://github.com/gmclachlan45/nerd-node

cp -r nerd-node/src/* public_html/
chmod -R 775 public_html/
chmod -R 775 config.php
