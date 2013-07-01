#!/bin/sh
patch -p1 < yii.diff
cp ../Bae_yii1.1.10/appdemo.conf ./
mv appdemo.conf app.conf
cp -r ../Bae_yii1.1.10/framework/baeconf ./framework/
cp -r ../Bae_yii1.1.10/framework/caching/CBaeMemCache.php ./framework/caching/
cp -r ../Bae_yii1.1.10/framework/logging/CBaeLogRoute.php ./framework/logging
cp -r ../Bae_yii1.1.10/framework/logging/CEmailLogRoute.php ./framework/logging
