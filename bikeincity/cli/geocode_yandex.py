#!/usr/bin/env python2.7
# -*- coding: utf8 -*-


import sys
import geocoder
from redis import StrictRedis
from time import time


g=geocoder.yandex(sys.argv[1], lang="RU-ru") 
lat=str(g.lat);
lng=str(g.lng);
print g.lat,g.lng

redis=StrictRedis(db=0)
redis.hset("hmp_"+sys.argv[1]+str(time()),'lng',lng)
redis.hset("hmp_"+sys.argv[1]+str(time()),'lat',lat)
