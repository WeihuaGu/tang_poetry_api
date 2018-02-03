#  全唐诗 api

## 安装
### 1. 配置数据库信息
（1）如果你的空间商配置了$_ENV变量里的MYSQL_DBNAME、MYSQL_USERNAME、MYSQL_PASSWORD、MYSQL_HOST、MYSQL_PORT，你将不需要做任何配置。
     如果没有设置相应的，$_ENV变量，请修改数据库配置文件databaseconf.php
（2）一旦你配置好了数据库信息，你就可以访问/database/info来查看数据库信息了，正确配置后返回的应该类似于：
```
Uptime: 5099 Threads: 2 Questions: 1466800 Slow queries: 25 Opens: 1338380 Flush tables: 1 Open tables: 1024 Queries per second avg: 287.664
mysql
mysqlnd 5.0.12-dev - 20150407 - $Id: b396954eeb2d1d9ed7902b8bae237b287f21ad9e $
5.7.16-ucloudrel1-log
mysql.coding.io via TCP/IP
```
### 2. 导入数据表
如果你完成了配置数据库，并且/database/info返回正常，你只需要再访问/database/importsql就可以自动倒入所需数据了。


## REST API
API 默认返回json,如果要便于查看，请在url后添加/display
如随机会返回一首诗的api为/poetry/random,/poetry/random/display是便于人查看的资源地址

### poetry

| 资源 | 地址 |
| - | - |
| 随即获取一首诗 | [/poetry/random](http://a000bf76-6b71-459f-9fdc-c36c368b3ba0.coding.io/poetry/random)|
| 随即获取一首诗(人查看) | [/poetry/random/display](http://a000bf76-6b71-459f-9fdc-c36c368b3ba0.coding.io/poetry/random/display)|

| 随即获取数首诗 | [/poetry/random/2](http://a000bf76-6b71-459f-9fdc-c36c368b3ba0.coding.io/poetry/random/2) |















## 致谢
全唐诗数据库来源：
[hxgdzyuyi/tang_poetry](https://github.com/hxgdzyuyi/tang_poetry)
## coding 地址
[coding 仓库](https://coding.net/u/bookfind/p/poetry-of-the-Tang/git)

