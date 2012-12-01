Name：ForEcho
Url：http://www.xxxx.com/feadmin/
Demo:http://www.forecho.com/Fecms/feadmin/


默认的功能目前有：
	1、无极限分类；
	2、一个管理员能修改密码；
	3、能发表文章，集成kindeditor编辑器和My97时间js插件；

新增上传Excel表单模块，能直接读取Excel里面的数据，目前Excel内数据不储存到数据库；
Excel模块包含以下几个文件，如不需要可以直接删除：
	1、resources/phpexcelreader文件夹；
	2、application/helpers/my_excel_helper.php文件；
	3、application/controllers/excel.php文件；
	4、application/views/admin/文件名带有excel的文件以及修改layout.php文件导航处的代码；