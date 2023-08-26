#!/usr/bin/python
import os
os.system("./bin/console doctrine:generate:entities AppBundle");
os.system("./bin/console doctrine:schema:update --force");
