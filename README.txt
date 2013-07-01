在BAE上的使用说明
    基于1.1.10版本的代码移植，特点一是可以在bae上使用bae提供的服务，特点二是可以在本地进行无缝调试
一、如何在bae上使用
	1）使用前你必须得有yii的基础。
    2）跟bae相关的配置写在/framework/baeconf/baeconfig.php中，预先配置了云数据库，baelog和bae的memcache服务
       使用数据库：将db组件的connectionString字段中的dbname修改为自己的云数据库名，
       注意：用户在bae上只能使用bae提供的云数据库，如果用户使用了本地数据库，在bae中运行时会抛出一个异常，
	   建议用户去掉main.php中本地数据库的配置。
	   
       使用日志：预先配置了两个日志路由 CBaeLogRoute 和 CEmailLogRoute
       用户使用CEmailLogRoute时，要设置queueName以及emails. queueName配置为消息服务的队列名
	   （使用前确保在消息服务中创建了一个队列），emails设置为接受邮件的地址。queueName和emails均在文件
		/framework/baeconf/baeconfig.php中配置。
		
	3）使用memcache：
       baememcache提供add\get\set\mget\delete\replace方法。baememcache的类文件是/framework/caching/CBaeMemCache.php。

    4）通过CUploadedFile(文件的路径是framework/web/CUploadedFile.php)上传的文件，作为一个object上传到云存储中
       上传函数public function saveAs($file,$deleteTempFile=true)中参数$file是保存在本地的路径，这里修改为云存储的$bucket. （使用前确保已经创建了bucket）

二、如何在本地使用
    1）在本地使用方式同yii的原生方式。

三、暂时不支持的功能
    1）不支持CFileLogRoute
    2）不支持memcache的flush方法
    3）session不支持用户自定义的存储方式，即不能使用CDbHttpSession和CCacheHttpSession，可以使用CHttpSession，但是涉及到ini_set(),ini_get()和session_save_path()的方法不       
	能使用
    4）不支持yii的命令行方式
    5）不支持与SOAP扩展相关的webService方式

四、以yii提供的demo演示使用方法：

	1） 确认已经在bae上创建应用并创建了版本，将应用代码用svn check到本地，假设应用名是yii,域名是http://yii.duapp.com，版本号为1,此时1/下有两个文件index.php以及app.conf
	2） 将Bae_yii1.1.10目录中内容拷贝到创建的bae版本目录1/下，将appdemo.conf文件修改为app.conf（配置了demos的rewrite规则）,
	3） 将修改后的代码用svn check in到bae上
        4） 点击域名http://yii.duapp.com可以访问demos中的blog应用，
                http://yii.duapp.com/game访问hangman应用，
		http://yii.duapp.com/helloworld访问helloworld应用
    注意：  运行blog时要将demos/blog/protected/data/schema.mysql.sql文件导入云数据库中(确认已经在developer.baidu.com/yun中创建了一个云数据库)
   

   
五、如果你已经在使用yii，我们提供了diff文件，可将你的代码升级后移植到bae上
    假设你的代码目录为yii1.10，将yii.diff拷贝到yii1.10下，
    运行命令patch -p1 < yii.diff
    然后再将以下文件拷贝到yii1.10的相应目录中：Bae_yii1.1.10/appdemo.conf、
                                               Bae_yii1.1.10/framework/baeconf
				 Bae_yii1.1.10/framework/caching/CBaeMemCache.php
				 Bae_yii1.1.10/framework/logging/CBaeLogRoute.php
				 Bae_yii1.1.10/framework/logging/CEmailLogRoute.php
   
  我们还提供了build.sh脚本，帮助你完成上述工作，只需将build.sh和yii.diff拷贝到yii1.10下.
  在yii.1.10目录下运行命令./build.sh即可升级到bae版本的yii。

 
	
    
    
	

   
    
