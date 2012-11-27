<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Author : Lensic
 * Blog   : http://lensic.sinaapp.com/
 */
 
/*
 * 站点标题
 */
$config['web_title']                  = 'Power By Lensic';
 
/*
 * 前台视图模板文件夹，位于根目录 themes/ 下
 */
$config['web_template']               = 'default';

/*
 * 后台视图模板文件夹，位于 application/views/ 下
 */
$config['web_admin_template']         = 'default';

/*
 * 外部资源文件夹
 */
$config['web_resource']               = 'resources';

/*
 * 上传文件夹
 */
$config['web_upload']                 = 'uploads';

/*
 * 密码加密密钥
 * 
 * web_encryption_key_begin : 2, 4, 6, 8, 10, 12 位分离往后组合，组合成 beginningcoding
 * web_encryption_key_end   : 2, 4, 6 位分离往前组合。组合成 endcoding
 */
$config['web_encryption_key_begin']   = 'bceogdiinnnging';
$config['web_encryption_key_end']     = 'ceondding';

/*
 * 新浪微博
 * 
 * web_wb_akey         : App Key
 * web_wb_skey         : App Secret
 * web_wb_callback_url : 回调页面
 */
$config['web_wb_akey']                = '3541946871';
$config['web_wb_skey']                = '5e1787d7975930a53fe3ec4799bbe9ad';
$config['web_wb_callback_url']        = 'common/weibo_login';

/*
 * 邮件设置
 * 
 * web_email_from    : 来自
 * web_email_name    : 名称
 * web_email_subject : 主题
 */
$config['web_email_from']             = 'yrhzp@sina.cn';
$config['web_email_name']             = 'lensic';
$config['web_email_subject']          = 'lensic 温馨提示';

/*
 * 验证码图片
 * 
 * web_captcha_img_path   : 在 $config['web_upload'] 下的文件名
 * web_captcha_expiration : 过期时间s
 */
$config['web_captcha_img_path']       = 'captcha';
$config['web_captcha_expiration']     = 60;

/*
 * kindeditor 文件上传管理
 * 
 * web_kindeditor_upload_path : kindeditor 上传路径，在 $config['web_upload'] 下的文件名
 * web_kindeditor_upload_size : kindeditor 上传大小(B)，默认为 1M
 */
$config['web_kindeditor_upload_path'] = 'kindeditor';
$config['web_kindeditor_upload_size'] = 1048576;

/* End of file web_config.php */
/* Location: ./application/config/web_config.php */