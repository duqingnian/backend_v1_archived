#!/usr/bin/python

import os

if os.path.exists('./var/cache') == True :
    os.system('rm -rf ./var/cache')
os.mkdir("./var/cache")
os.system('chmod -R 777 ./var/cache')




