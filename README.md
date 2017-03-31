每次开发项目时，总是会被要求提供数据字典，每次手动写文档太累了，所以写了这个扩展，`自动读取数据库信息` 并显示在网页上，支持导出 `Html` 和 `PDF` 文件。

> 1. 导出 `Html` 实际为生成并导出一个离线版本的压缩包。
> 2. 导出 `PDF` 使用了 [laravel-snappy](https://github.com/barryvdh/laravel-snappy)扩展包

## 安装

 1. 安装包文件

	``` bash
	$ composer require jormin/laravel-ddoc
	```

## 配置

1. 注册 ServiceProvider:
	
	```php
	Jormin\DDoc\DDocServiceProvider::class,
	```

2. 创建配置文件：

	```shell
	php artisan vendor:publish
	```
	
	执行命令后会在 `config` 目录下生成两个文件：
	
	- `laravel-ddoc.php`：本扩展配置文件，用于配置文档底部 `Copyright` 文案和链接。
	
	- `snappy.php`：[laravel-snappy](https://github.com/barryvdh/laravel-snappy) 的配置文件，用于配置导出 `pdf` 的选项。
	
	    > `pdf.binary` 项配置 `wkhtmltopdf` 执行文件的目录
	    
	    > `linux/unix/mac` 系统的执行文件存放于 `项目目录/vendor/h4cc/wkhtmltopdf-[amd64|i386]/bin/` 目录下
	    
	    > `wundiws` 系统的执行文件存放于 `项目目录/vendor/wemersonjanuario/wkhtmltopdf-windows/bin/[64bit|32bit]/` 目录下

## 使用

安装扩展后，浏览器访问 `[http|https]://[your domain or ip]/ddoc`

## 参考问题

1. Q：导出的 `PDF` 文件中文不显示或者乱码？
	
	A：导致此问题的原因是机器上没有安装中文字体，解决方式如下
	
	```
	1、先从本机或者网络上下载所需的中文字体
	2、修改字体文件的权限，使root用户以外的用户也可以使用
		$ cd /usr/share/fonts/chinese/
	3、建立字体缓存
		$ sudo mkfontscale
		$ # 如果提示 mkfontscale: command not found，则需要安装# sudo apt-get install ttf-mscorefonts-installer
		$ sudo mkfontdir 
		$ sudo fc-cache -fv
		$ # 如果提示 fc-cache: command not found，则需要安装# sudo apt-get install fontconfig
	```

## 参考图

![](https://qiniu.blog.lerzen.com/8a066a40-161b-11e7-92cc-e978e5791021.jpg)

![](https://qiniu.blog.lerzen.com/95bb00d0-161b-11e7-a852-9fb963e13414.jpg)

![](https://qiniu.blog.lerzen.com/a2d1f730-161b-11e7-a10b-458e1139cb1a.jpg)

![](https://qiniu.blog.lerzen.com/cd6439d0-161b-11e7-83ae-01bf49de6b3e.jpg)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
