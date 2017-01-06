-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.6.11 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.1.0.4920
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出 yii2advanced 的数据库结构
CREATE DATABASE IF NOT EXISTS `yii2advanced` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `yii2advanced`;


-- 导出  表 yii2advanced.blog 结构
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主id',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `content` text NOT NULL COMMENT '博客内容',
  `user_name` varchar(255) DEFAULT NULL COMMENT '用户名',
  `cat_id` int(11) NOT NULL COMMENT '所属目录id',
  `brief` varchar(255) NOT NULL COMMENT '简介',
  `key_word` text NOT NULL COMMENT '关键词',
  `check_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='博客表';

-- 正在导出表  yii2advanced.blog 的数据：~3 rows (大约)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`id`, `title`, `user_id`, `content`, `user_name`, `cat_id`, `brief`, `key_word`, `check_time`) VALUES
	(3, 'zend', 1, '#Zend Engine \r\n\r\n* Zend Engine 最主要的特性就是把 PHP 的边解释边执行的运行方式改为先进行预编译(Compile)，然后再执行(Execute)。\r\n\r\n* Zend Engine 2.0主要是对 PHP 的 OO 功能进行了改进\r\n\r\n![](http://www.nowamagic.net/librarys/images/201109/2011_09_20_01.jpg?_=2959396)\r\n\r\n从图上可以看出，PHP从下到上是一个4层体系：  \r\n\r\n* Zend引擎：Zend整体用纯C实现，是PHP的内核部分，它将PHP代码翻译（词法、语法解析等一系列编译过程）为可执行opcode的 处理并实现相应的处理方法、实现了基本的数据结构（如hashtable、oo）、内存分配及管理、提供了相应的api方法供外部调用，是一切的核心，所 有的外围功能均围绕Zend实现。  \r\n* Extensions：围绕着Zend引擎，extensions通过组件式的方式提供各种基础服务，我们常见的各种内置函数（如array 系列）、标准库等都是通过extension来实现，用户也可以根据需要实现自己的extension以达到功能扩展、性能优化等目的（如贴吧正在使用的 PHP中间层、富文本解析就是extension的典型应用）。  \r\n* Sapi：Sapi全称是Server Application Programming Interface，也就是服务端应用编程接口，Sapi通过一系列钩子函数，使得PHP可以和外围交互数据，这是PHP非常优雅和成功的一个设计，通过 sapi成功的将PHP本身和上层应用解耦隔离，PHP可以不再考虑如何针对不同应用进行兼容，而应用本身也可以针对自己的特点实现不同的处理方式。  \r\n* 上层应用：这就是我们平时编写的PHP程序，通过不同的sapi方式得到各种各样的应用模式，如通过webserver实现web应用、在命令行下以脚本方式运行等等。  \r\n\r\n如果PHP是一辆车，那么车的框架就是PHP本身，Zend是车的引擎（发动机），Ext下面的各种组件就是车的轮子，Sapi可以看做是公路， 车可以跑在不同类型的公路上，而一次PHP程序的执行就是汽车跑在公路上。因此，我们需要：性能优异的引擎+合适的车轮+正确的跑道。  \r\n\r\n#SAPI\r\n* SAPI:Server Application Programming Interface 服务器端应用编程端口。', 'lin', 3, 'test', 'tet', 1482307357),
	(4, 'linux php 配置', 1, '##用yum安装mysql\r\n\r\n	yum -y install mysql-server　← 安装MySQL\r\n	yum -y install php-mysql　   ← 安装php-mysql\r\n\r\n数据库的目录结构：  \r\n1、数据库目录　/var/lib/mysql/  \r\n2、配置文件　　/usr/share/mysql（mysql.server命令及配置文件）  \r\n3、相关命令　　/usr/bin (mysqladmin mysqldump等命令)  \r\n4、启动脚本　　/etc/rc.d/init.d/（启动脚本文件mysql的目录）  \r\n\r\n\r\n###环境的配置\r\n\r\n	chkconfig mysqld on　← 设置MySQL服务随系统启动自启动\r\n	chkconfig --list mysqld　← 确认MySQL自启动\r\n	/etc/rc.d/init.d/mysqld start　 ← 启动MySQL服务\r\n	/usr/bin/mysqladmin -u root -p shutdown   //关闭mysql\r\n\r\n###修改密码\r\n\r\n	mysql -u root  ← 在没设置密码之时，用root用户登录MySQL服务器\r\n	select user,host,password from mysql.user;　 ← 查看用户信息\r\n	set password for root@localhost=password (\'在这里填入root密码\');　 ← 设置root密码\r\n\r\n###用密码登陆mysql\r\n\r\n	mysql -u root -p\r\n\r\n\r\n###mysql设置为服务组\r\n\r\n	/sbin/chkconfig --list   //检查系统服务组情况\r\n	/sbin/chkconfig --add mysqld   //从系统服务组中添加mysql\r\n	/sbin/chkconfig --del mysqld   //从系统服务组中删除mysql\r\n\r\n###mysql常用命令行\r\n**create database test;**//创建一个名为test的数据库  \r\n**show databases;**//显示所有的数据库  \r\n**select test;**//选择数据库\r\n**show tables;**//显示数据库的表\r\n\r\n\r\n\r\n\r\n\r\n##安装nginx\r\n	\r\n	yum install nginx\r\n\r\nnginx目录结构：  \r\n1 配置所在目录：/etc/nginx/  \r\n2 PID目录：/var/run/nginx.pid  \r\n3 错误日志：/var/log/nginx/error.log  \r\n4 访问日志：/var/log/nginx/access.log  \r\n5 默认站点目录：/usr/share/nginx/html  \r\n\r\n开启nginx\r\n\r\n	nginx -c /etc/nginx/nginx.conf\r\n\r\n重启nginx  \r\n  \r\n	/usr/sbin/nginx -s reload\r\n\r\n\r\n配置nginx文件\r\n\r\n	vim etc/nginx/nginx.conf  \r\n\r\n从里面的代码看出，还包含了其他的配置文件\r\n找到default.conf\r\n	\r\n	vim etc/nginx/conf.d/default.conf  \r\n\r\n然后配置php\r\n\r\n	location ~ \\.php$ {\r\n        root           html;\r\n        fastcgi_pass   127.0.0.1:9000;\r\n        fastcgi_index  index.php;\r\n        fastcgi_param  SCRIPT_FILENAME  /usr/share/nginx/html$fastcgi_script_name;//这里是服务器的默认站点地址\r\n        include        fastcgi_params;\r\n    }\r\n\r\n防火墙开启80端口\r\n\r\n	iptables -I INPUT -p tcp --dport 80 -j ACCEPT\r\n\r\n##安装php\r\n\r\n	yum install php php-fpm\r\n	yum -y install php-gs php-xml php-mbstring php-ldap php-pear php-xmlrpc  //安装php扩展\r\n	vim etc/php-fpm.conf  //编辑fpm配置文件  \r\n\r\n找不到php的配置内容，然后从里面可以看出还包含了其他的配置文件\r\n\r\n打开www.conf\r\n\r\n	vim etc/php-fpm.d/www.conf\r\n可以看到有个chroot的配置，这里改为\r\n\r\n	chroot = /usr/share/nginx/html   //这里是服务器的默认站点地址\r\n\r\n还有user和group默认是apache，这里由于是nginx，所以改成nginx用户组，这里可以在nginx的配置文件中看到\r\n\r\n	user              nginx;\r\n\r\n查看所有用户组可以通过这个文件查看：\r\n\r\n	vim etc/group\r\n\r\n\r\n  \r\n  \r\n\r\n把php-fpm加入为开机启动项目\r\n\r\n	chkconfig php-fpm on\r\n启动fmp服务\r\n\r\n	/etc/init.d/php-fpm start\r\n\r\n##yum安装php5.6  \r\n\r\n配置yum源\r\n\r\n追加CentOS 6.5的epel及remi源。\r\n\r\n	rpm -Uvh http://ftp.iij.ad.jp/pub/linux/fedora/epel/6/x86_64/epel-release-6-8.noarch.rpm\r\n	rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm\r\n\r\n以下是CentOS 7.0的源。\r\n\r\n	yum install epel-release\r\n	rpm -ivh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm\r\n\r\n使用yum list命令查看可安装的包(Packege)。\r\n\r\n	yum list --enablerepo=remi --enablerepo=remi-php56 | grep php\r\n安装PHP5.6\r\n\r\nyum源配置好了，下一步就安装PHP5.6。\r\n\r\n	yum install --enablerepo=remi --enablerepo=remi-php56 php php-opcache php-devel php-mbstring php-mcrypt php-mysqlnd php-phpunit-PHPUnit php-pecl-xdebug php-pecl-xhprof\r\n\r\n用PHP命令查看版本。\r\n\r\n	php --version\r\n\r\n##防火墙\r\n\r\n	/etc/init.d/iptables status   //查看防火墙状态  \r\n\r\n \r\n\r\n##安装redis\r\n\r\n首先是\r\n	\r\n	wget http://download.redis.io/releases/redis-3.2.4.tar.gz\r\n	tar -zxvf redis-3.2.4.tar.gz\r\n进入文件夹后make test\r\n之后可能会提示需要暗转tcl8.5以上版本，可以使用yum安装  \r\n**注：用yum查看可安装的版本：yum list tcl**\r\n\r\n	yum install tcl\r\n\r\n如果提示  \r\n\r\n	!!! WARNING The following tests failed:\r\n	\r\n	*** [err]: Server is able to generate a stack trace on selected systems in tests/integration/logging.tcl\r\n	expected stack trace not found into log file\r\n	Cleanup: may take some time... OK\r\n	make[1]: *** [test] Error 1\r\n	make[1]: Leaving directory `/usr/local/src/redis-3.2.4/src\'\r\n	make: *** [test] Error 2\r\n\r\n这个只是一个警告，可以忽略，之后\r\n \r\n	make install\r\n\r\n编译安装之后在当前目录的src子目录下会有几个文件，把他们都转移到一个文件夹中\r\n	\r\n	[root@VM_223_218_centos src]# cp redis-server /usr/local/redis/\r\n	[root@VM_223_218_centos src]# cp redis-cli /usr/local/redis/\r\n	[root@VM_223_218_centos src]# cp redis-benchmark /usr/local/redis/\r\n	[root@VM_223_218_centos src]# cd ../\r\n	[root@VM_223_218_centos redis-3.2.4]# ls\r\n	00-RELEASENOTES  BUGS  CONTRIBUTING  COPYING  INSTALL  MANIFESTO  Makefile  README.md  deps  redis.conf  runtest  runtest-cluster  runtest-sentinel  sentinel.conf  src  tests  utils\r\n	[root@VM_223_218_centos redis-3.2.4]# cp redis.conf /usr/local/redis/  \r\n\r\n启动redis  \r\n	\r\n	/usr/local/redis/redis-server redis.conf//这种方式如果退出的话进程会断掉\r\n	/usr/local/redis/redis-server &//这种方式退出了进程也会在后台运行\r\n	ps aux | grep redis//查看redis进程情况\r\n	chkconfig --add redis//设置开机自启动redis\r\n	chkconfig --del redis//去除redis开机自启动\r\n\r\n\r\n##安装php redis扩展\r\n\r\n首先还是下载php-redis\r\n\r\n	wget https://github.com/phpredis/phpredis/archive/develop.zip\r\n解压  \r\n  \r\n	unzip develop.zip\r\n\r\n进入解压后的目录后  \r\n\r\n	phpize//用处待查明，如果没报错即可下一步\r\n	whereis php-config//查出php配置文件\r\n	./configure --with-php-config=/usr/bin/php-config//如果没有错误即可下一步\r\n	make && make install  //在安装的过程中会提示redis.so在哪里，后面将其放置到php的扩展目录即可  \r\n	/usr/lib/php/modules/  //这是安装是本机的php扩展目录，如果不知目录，可以在php.ini随便写一个扩展，重启php-fpm的时候就会提示扩展目录\r\n	vim /etc/php.ini//编辑配置文件，加入redis.so\r\n\r\n', NULL, 0, '', '', 1482733220),
	(5, '面向过程', 1, '##单例模式\r\n\r\n相对于全局变量的不受命名空间的限制，单例模式可以很好的利用命名空间防止命名冲突的问题，\r\n单例模式主要要实现：  \r\n1. 产生的对象可以被系统中的任何对象使用；  \r\n2. 不应该存储在会被腹泻的全局变量中；  \r\n3. 只有一个单例类的对象，比如说：Y对象可设置单例对象的一个属性，而Z对象不需要通过其他对象就可以直接获得该属性的值；  \r\n\r\n所以我们需要创建一个无法从其自身外部来创建实例的类，代码实现如下：\r\n  \r\n	class Preferences {\r\n	    private $props = array();\r\n	    private static $instance;\r\n	\r\n	    private function __construct() { }\r\n	\r\n	    public static function getInstance() {\r\n	        if ( empty( self::$instance ) ) {\r\n	            self::$instance = new Preferences();\r\n	        }\r\n	        return self::$instance;\r\n	    }\r\n	\r\n	    public function setProperty( $key, $val ) {\r\n	        $this->props[$key] = $val;\r\n	    }\r\n	\r\n	    public function getProperty( $key ) {\r\n	        return $this->props[$key];\r\n	    }\r\n	}\r\n	\r\n	\r\n	$pref = Preferences::getInstance();\r\n	$pref->setProperty( "name", "matt" );\r\n	\r\n	unset( $pref ); // remove the reference\r\n	\r\n	$pref2 = Preferences::getInstance();\r\n	print $pref2->getProperty( "name" ) ."\\n"; // demonstrate value is not lost  \r\n\r\n由于Preferences类的构造方法是私有的，所以外部无法实例化Preferences类，只有通过外部调用Preferences本身的静态方法，并且该静态方法实现实例化Preferences类这样才能创建Preferences的实例；而代码中Preferences的实例被静态方法保存在静态属性$instance中，也就是说，这个实例会一直保存在$instance中，即使unset了$pref，下次通过Preferences::getInstance();获取的依旧是之前的实例；\r\n\r\n**php类的静态成员不属于某个对象，所以静态成员变量是一直都存在内存里面（未初始化的存储在bss区，初始化的存储在data区）** \r\n\r\n  \r\n**而且方法无论是普通的还是静态的，都是保存在内存里面；**   \r\n\r\n应用：  \r\n用来替代全局变量；\r\n\r\n\r\n##工厂模式  \r\n用特定的类来处理实例化；  \r\n第一种方式：  \r\n\r\n	<?php\r\n	//工厂模式\r\n	abstract class ApptEncoder {\r\n	    abstract function encode();\r\n	}\r\n	\r\n	class BloggsApptEncoder extends ApptEncoder {\r\n	    function encode() {\r\n	        return "Appointment data encoded in BloggsCal format\\n";\r\n	    }\r\n	}\r\n	\r\n	class MegaApptEncoder extends ApptEncoder {\r\n	    function encode() {\r\n	        return "Appointment data encoded in MegaCal format\\n";\r\n	    }\r\n	}\r\n	\r\n	class CommsManager {\r\n	    const BLOGGS = 1;\r\n	    const MEGA = 2;\r\n	    private $mode ;\r\n	\r\n	    function __construct( $mode ) {\r\n	        $this->mode = $mode;\r\n	    }\r\n	\r\n	    function getHeaderText() {\r\n	        switch ( $this->mode ) {\r\n	            case ( self::MEGA ):\r\n	                return "MegaCal header\\n";\r\n	            default:\r\n	                return "BloggsCal header\\n";\r\n	        }\r\n	    }\r\n	    function getApptEncoder() {\r\n	        switch ( $this->mode ) {\r\n	            case ( self::MEGA ):\r\n	                return new MegaApptEncoder();\r\n	            default:\r\n	                return new BloggsApptEncoder();\r\n	        }\r\n	    }\r\n	}\r\n	\r\n	$man = new CommsManager( CommsManager::MEGA );\r\n	print ( get_class( $man->getApptEncoder() ) )."\\n";\r\n	$man = new CommsManager( CommsManager::BLOGGS );\r\n	print ( get_class( $man->getApptEncoder() ) )."\\n";\r\n	?>   \r\n第二种方式：\r\n\r\n	<?php\r\n	abstract class ApptEncoder {\r\n	    abstract function encode();\r\n	}\r\n	\r\n	class BloggsApptEncoder extends ApptEncoder {\r\n	    function encode() {\r\n	        return "Appointment data encoded in BloggsCal format\\n";\r\n	    }\r\n	}\r\n	\r\n	class MegaApptEncoder extends ApptEncoder {\r\n	    function encode() {\r\n	        return "Appointment data encoded in MegaCal format\\n";\r\n	    }\r\n	}\r\n	\r\n	\r\n	abstract class CommsManager {\r\n	    abstract function getHeaderText();\r\n	    abstract function getApptEncoder();\r\n	    abstract function getTtdEncoder();\r\n	    abstract function getContactEncoder();\r\n	    abstract function getFooterText();\r\n	}\r\n	\r\n	class BloggsCommsManager extends CommsManager {\r\n	    function getHeaderText() {\r\n	        return "BloggsCal header\\n";\r\n	    }\r\n	\r\n	    function getApptEncoder() {\r\n	        return new BloggsApptEncoder();\r\n	    }\r\n	\r\n	    function getTtdEncoder() {\r\n	        return new BloggsTtdEncoder();\r\n	    }\r\n	\r\n	    function getContactEncoder() {\r\n	        return new BloggsContactEncoder();\r\n	    }\r\n	\r\n	    function getFooterText() {\r\n	        return "BloggsCal footer\\n";\r\n	    }\r\n	}\r\n	\r\n	class MegaCommsManager extends CommsManager {\r\n	    function getHeaderText() {\r\n	        return "MegaCal header\\n";\r\n	    }\r\n	\r\n	    function getApptEncoder() {\r\n	        return new MegaApptEncoder();\r\n	    }\r\n	\r\n	    function getTtdEncoder() {\r\n	        return new MegaTtdEncoder();\r\n	    }\r\n	\r\n	    function getContactEncoder() {\r\n	        return new MegaContactEncoder();\r\n	    }\r\n	\r\n	    function getFooterText() {\r\n	        return "MegaCal footer\\n";\r\n	    }\r\n	}\r\n	\r\n	/*\r\n	$mgr = new MegaCommsManager();\r\n	print $mgr->getHeaderText();\r\n	print $mgr->getApptEncoder()->encode();\r\n	print $mgr->getFooterText();\r\n	*/\r\n	?>\r\n', NULL, 0, '', '', 1476945539);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;


-- 导出  表 yii2advanced.catalog 结构
CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_brief` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `ad_time` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='目录表';

-- 正在导出表  yii2advanced.catalog 的数据：~3 rows (大约)
/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;
INSERT INTO `catalog` (`id`, `cat_name`, `cat_brief`, `user_id`, `ad_time`, `parent_id`) VALUES
	(1, 'php', 'php', 1, 0, NULL),
	(2, 'html', 'html', 1, 0, NULL),
	(3, 'yii', 'yii', 1, 0, 1);
/*!40000 ALTER TABLE `catalog` ENABLE KEYS */;


-- 导出  表 yii2advanced.comment 结构
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_time` int(11) DEFAULT NULL,
  `is_show` int(1) DEFAULT '1',
  `ann_id` int(11) NOT NULL,
  `level` int(5) DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  yii2advanced.comment 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;


-- 导出  表 yii2advanced.migration 结构
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  yii2advanced.migration 的数据：~3 rows (大约)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1482717482),
	('m161226_014604_create_catalog_table', 1482718361),
	('m161226_014604_create_comment_table', 1482718362);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- 导出  表 yii2advanced.user 结构
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT '0',
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- 正在导出表  yii2advanced.user 的数据：~1 rows (大约)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `email`, `password`, `password_hash`, `auth_key`, `status`, `created_at`, `password_reset_token`, `updated_at`) VALUES
	(1, 'lin', '1573975217@qq.com', '', '$2y$13$XIlZ3Razln56pYWX48lslOOUakk.kSX8Y/f83ugy1jvq0438lxc6.', 'QApDDjdQ4VMgKthOL8pw_OQ5alAFy40I', '10', 1472522733, '0', 1472522733);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
