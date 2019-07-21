#!/usr/bin/env python2.7
# -*- coding: utf8 -*-


import sys
import geocoder
from redis import StrictRedis


g=geocoder.yandex(sys.argv[1], lang="RU-ru") 
lat=str(g.lat);
lng=str(g.lng);
print g.lat,g.lng

redis=StrictRedis(db=0)
redis.hset("hmp_"+sys.argv[1],'lng',lng)
redis.hset("hmp_"+sys.argv[1],'lat',lat)
