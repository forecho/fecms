-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 05 日 09:10
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `fecms`
--

-- --------------------------------------------------------

--
-- 表的结构 `fe_admin`
--

CREATE TABLE IF NOT EXISTS `fe_admin` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fe_admin`
--

INSERT INTO `fe_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- 表的结构 `fe_category`
--

CREATE TABLE IF NOT EXISTS `fe_category` (
  `cid` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `pid` int(4) NOT NULL COMMENT '父级ID',
  `path` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '类型',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `fe_category`
--

INSERT INTO `fe_category` (`cid`, `name`, `pid`, `path`, `type`) VALUES
(2, '现货资源', 0, '0', 0),
(24, '公司简介', 0, '0', 0),
(20, '期货订购', 0, '0', 0),
(1, '不属于任何分类', 0, '0', 0);

-- --------------------------------------------------------

--
-- 表的结构 `fe_excel`
--

CREATE TABLE IF NOT EXISTS `fe_excel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(4) NOT NULL,
  `addtime` datetime NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '名称',
  `material` varchar(20) NOT NULL COMMENT '材质 ',
  `thickness` varchar(10) NOT NULL COMMENT '厚度',
  `width` varchar(10) NOT NULL COMMENT '宽度',
  `length` varchar(10) NOT NULL COMMENT '长度',
  `stock` varchar(10) NOT NULL COMMENT '库存',
  `weight` varchar(20) NOT NULL COMMENT '重量',
  `price` varchar(10) NOT NULL COMMENT '单价',
  `place` varchar(20) NOT NULL COMMENT '产地',
  `location` varchar(20) NOT NULL COMMENT '存放地',
  `remark` varchar(20) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='资源表' AUTO_INCREMENT=51 ;

--
-- 转存表中的数据 `fe_excel`
--

INSERT INTO `fe_excel` (`id`, `category`, `addtime`, `name`, `material`, `thickness`, `width`, `length`, `stock`, `weight`, `price`, `place`, `location`, `remark`) VALUES
(3, 2, '2012-12-27 16:22:09', '普板', 'Q235B/C/E', '10', '2200+-', '8000+-', '69', '72.201', '电议', '鄂钢', '鄂州', '新货'),
(4, 2, '2012-12-27 16:22:09', '普板', 'Q235B/C/E', '12', '2200+-', '8000+-', '52', '69.591', '电议', '鄂钢', '鄂州', '新货'),
(6, 2, '2012-12-27 16:22:09', '普板', 'Q235B/C/E', '15', '2200+-', '8000+-', '5', '3.694', '电议', '鄂钢', '鄂州', '新货'),
(7, 20, '2012-12-27 16:22:09', '普板', 'Q235B/C/E', '15.5', '2200+-', '8000+-', '1', '1.066', '电议', '鄂钢', '鄂州', '新货'),
(8, 2, '2012-12-27 16:22:09', '普板', 'Q235B/C/E', '16', '2200+-', '8000+-', '104', '204.155', '电议', '鄂钢', '鄂州', '新货'),
(9, 2, '2012-12-27 16:22:09', '普板', 'Q235B/C/E', '18', '2200+-', '8000+-', '405', '1667.255', '电议', '鄂钢', '鄂州', '新货'),
(10, 2, '2012-12-27 16:22:09', '普板', 'Q235B/C/E', '19', '2200+-', '8000+-', '4', '6.101', '电议', '鄂钢', '鄂州', '新货'),
(11, 2, '2012-12-27 16:22:09', '普板', 'Q235B/C/E', '20', '2200+-', '8000+-', '198', '782.475', '电议', '鄂钢', '鄂州', '新货'),
(12, 2, '2012-12-27 16:22:09', '普板', 'Q235B/C/E', '22', '2200+-', '8000+-', '85', '385.866', '电议', '鄂钢', '鄂州', '新货'),
(13, 2, '2012-12-27 16:22:09', '普板', 'Q235B/C/E', '22.5', '2200+-', '8000+-', '4', '5.269', '电议', '鄂钢', '鄂州', '新货'),
(50, 1, '2013-01-05 16:01:42', '公司简介', 'Q235B/C/E', '29', '2200+-', '8000+-', '1', '5.318', '电议', '鄂钢', '鄂州', '新货'),
(15, 2, '2012-12-28 15:25:39', '普板', 'Q235B/C/E', '25', '2200+-', '8000+-', '249', '868.162', '电议', '鄂钢', '鄂州', '新货'),
(16, 2, '2012-12-28 15:24:35', '普板', 'Q235B/C/E', '26', '2200+-', '8000+-', '1', '0.634', '电议', '鄂钢', '鄂州', '新货'),
(17, 2, '2012-12-28 15:24:35', '普板', 'Q235B/C/E', '28', '2200+-', '8000+-', '20', '46.598', '电议', '鄂钢', '鄂州', '新货'),
(18, 2, '2012-12-28 15:24:23', '普板12', 'Q235B/C/E', '29', '2200+-', '8000+-', '2', '5.318', '电议', '鄂钢', '鄂州', '新货');

-- --------------------------------------------------------

--
-- 表的结构 `fe_options`
--

CREATE TABLE IF NOT EXISTS `fe_options` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(100) NOT NULL COMMENT '参数变量名',
  `option_value` text NOT NULL COMMENT '参数值',
  `option_type` tinyint(3) unsigned NOT NULL COMMENT '参数类型0 为系统参数，不能删除1 为自定义参数',
  `name` varchar(50) NOT NULL COMMENT '参数名称',
  `option_explain` text NOT NULL COMMENT '参数说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站的配置信息' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `fe_options`
--

INSERT INTO `fe_options` (`id`, `option_name`, `option_value`, `option_type`, `name`, `option_explain`) VALUES
(1, 'company_name', '银安通 钢铁在线', 0, '公司名字', ''),
(2, 'company_phone', '1111111111111112', 0, '公司电话', '');

-- --------------------------------------------------------

--
-- 表的结构 `fe_posts`
--

CREATE TABLE IF NOT EXISTS `fe_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `category` int(4) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `addtime` datetime NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `fe_posts`
--

INSERT INTO `fe_posts` (`id`, `title`, `content`, `category`, `image`, `addtime`, `keywords`, `description`) VALUES
(29, '链接的力量', '<table width="100%" align="right" border="0" cellspacing="0" cellpadding="0" style="font-family:arial, sans-serif;line-height:20px;background-color:#ffffff;"><tbody><tr><td style="vertical-align:top;padding:0px 20px 0px 0px;"><div id="pageContent"><div id="pageContentWrap" style="width:650px;font-size:13px;"><p style="margin-top:0px;margin-bottom:18px;">在36氪和微软的活动上，谈到软件或App产品创新的逻辑，我曾经有一页slide谈到“App软件必须拥抱链接的力量（Embrace the Magic of Links)”。期间有投资人和创业者对此很感兴趣，遗憾由于会场时间关系，不能够充分展开。回到上海后，考虑写一篇博客展开详述，与诸位互联网人共勉。</p><p style="margin-top:0px;margin-bottom:18px;">在大家阅读这篇文章之前（或之后），我建议最好阅读一下我一年前写的文章《<a href="http://blog.sina.com.cn/s/blog_626d4ddb01015s4c.html" target="_blank" style="color:#000099;">我的互联网信仰</a>》，这样就对我的叙事逻辑有一个清晰的承接。这里谈的软件，泛指在PC、Pad或Phone上的客户端软件或者App。</p><p style="margin-top:0px;margin-bottom:18px;">以史为鉴可以知兴替。让我们先来简单回顾一下中国的PC软件历史。了解中国软件行业的朋友应该对下面这些软件耳熟能详：网络蚂蚁，Winamp，RealPlayer, ACDsee，超级解霸，瑞星杀毒, Winzip，QQ…….除了QQ之外，其他的软件现在都几近消失，或者式微到可以忽略不计。这背后的原因是什么呢？用户需求不再？这个并不能说通。实际上，大家会发现它们大多都有同类软件活跃在当下：迅雷、PPTV、美图秀秀、暴风影音、360等。抛开运营、管理、创始人等因素，到底有什么样的产品因素导致这些软件式微？</p><p style="margin-top:0px;margin-bottom:18px;">如果将它们与其强大的后继者做对比，我们会发现这些式微的软件都有一个共同点：那就是<strong>链接的缺失，或低质量。</strong></p></div></div></td></tr></tbody></table><p style="clear:both;"><br /></p>', 1, NULL, '2012-09-21 00:00:00', '', ''),
(32, '线材期货订购', '<p>\r\n	<span style="font-family:consolas, ''lucida console'', monospace;background-color:#ffffff;">线材期货订购<span style="font-family:consolas, ''lucida console'', monospace;background-color:#ffffff;">线材期货订购</span></span>\r\n</p>', 2, NULL, '2012-09-24 00:00:00', '', ''),
(33, '链接的力量', '<table width="100%" align="right" border="0" cellspacing="0" cellpadding="0" style="font-family:arial, sans-serif;background-color:#ffffff;">\r\n	<tbody>\r\n		<tr>\r\n			<td style="vertical-align:top;">\r\n				<div>\r\n					<div style="font-size:13px;">\r\n						<p>\r\n							在36氪和微软的活动上，谈到软件或App产品创新的逻辑，我曾经有一页slide谈到“App软件必须拥抱链接的力量（Embrace the Magic of Links)”。期间有投资人和创业者对此很感兴趣，遗憾由于会场时间关系，不能够充分展开。回到上海后，考虑写一篇博客展开详述，与诸位互联网人共勉。\r\n						</p>\r\n						<p>\r\n							在大家阅读这篇文章之前（或之后），我建议最好阅读一下我一年前写的文章《<a href="http://blog.sina.com.cn/s/blog_626d4ddb01015s4c.html" target="_blank">我的互联网信仰</a>》，这样就对我的叙事逻辑有一个清晰的承接。这里谈的软件，泛指在PC、Pad或Phone上的客户端软件或者App。\r\n						</p>\r\n						<p>\r\n							以史为鉴可以知兴替。让我们先来简单回顾一下中国的PC软件历史。了解中国软件行业的朋友应该对下面这些软件耳熟能详：网络蚂蚁，Winamp，RealPlayer, ACDsee，超级解霸，瑞星杀毒, Winzip，QQ…….除了QQ之外，其他的软件现在都几近消失，或者式微到可以忽略不计。这背后的原因是什么呢？用户需求不再？这个并不能说通。实际上，大家会发现它们大多都有同类软件活跃在当下：迅雷、PPTV、美图秀秀、暴风影音、360等。抛开运营、管理、创始人等因素，到底有什么样的产品因素导致这些软件式微？\r\n						</p>\r\n						<p>\r\n							如果将它们与其强大的后继者做对比，我们会发现这些式微的软件都有一个共同点：那就是<strong>链接的缺失，或低质量。</strong>\r\n						</p>\r\n					</div>\r\n				</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	<br />\r\n</p>', 20, NULL, '2012-09-21 00:00:00', '', ''),
(35, '测试表格', '<table border="0" cellpadding="0" cellspacing="0" width="975" style="font-family:simsun;width:976px;">\r\n	<tbody>\r\n		<tr>\r\n			<td height="27" width="81" style="color:#000;font-size:16px;font-family:楷体_gb2312, monospace;vertical-align:bottom;border:1px solid #000;background-color:#ff8080;">\r\n				日期\r\n			</td>\r\n			<td width="484" style="color:#000;font-size:16px;font-family:楷体_gb2312, monospace;vertical-align:bottom;background-color:#ff8080;">\r\n				描述\r\n			</td>\r\n			<td width="95" style="color:#000;font-size:16px;font-family:楷体_gb2312, monospace;vertical-align:bottom;background-color:#ff8080;">\r\n				版本\r\n			</td>\r\n			<td width="101" style="color:#000;font-size:16px;font-family:楷体_gb2312, monospace;vertical-align:bottom;background-color:#ff8080;">\r\n				修改人\r\n			</td>\r\n			<td width="113" style="color:#000;font-size:16px;font-family:楷体_gb2312, monospace;vertical-align:bottom;background-color:#ff8080;">\r\n				审批人\r\n			</td>\r\n			<td width="101" style="color:#000;font-size:16px;font-family:楷体_gb2312, monospace;vertical-align:bottom;background-color:#ff8080;">\r\n				发布日期\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="28" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-6-3\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				初始版本\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V<span style="color:#000;font-size:13px;">0.5.0</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="24" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-6-9\r\n			</td>\r\n			<td width="484" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				新增“会员出金申请”、“查询会员待确认付款交易”\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V<span style="color:#000;font-size:13px;">0.8.0</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="251" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-6-28\r\n			</td>\r\n			<td width="484" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				1.“会员出金”交易改为“会员出金审批结果反馈”，并修改请求和应答报文。<br />\r\n2.“会员出金申请流水查询”：请求报文新增“出金申请流水号”<br />\r\n3.“查询会员待确认付款交易”：请求报文新增“交易合同号”；应答报文新增“买方会员名”、“卖方会员名”、“合同日期时间”、“交易说明”、“保证金支付金额”、“商户名称”<br />\r\n4.“资金冻结解冻”：请求报文新增“备注”<br />\r\n5.“现货终止交易”：请求报文删除“合同金额”；新增“备注”、“买方手续费”、“卖方手续费”<br />\r\n6.“付款状态查询”：“付款状态”修改 "3-欠费"<br />\r\n7.“账户明细查询”：返回明细新增“交易时间”、“备注”、“余额”<br />\r\n<span style="color:#000;font-size:13px;">8.增加代码说明<br />\r\n</span><span style="color:#000;font-size:13px;">9.“会员出金申请”：请求报文新增“出金申请流水号”，应答报文删除“手续费”、“流水号”<br />\r\n10.几个交易的 FUC_COD 改为 FUNC_CODE</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V0.8.2\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="146" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-7-2\r\n			</td>\r\n			<td width="484" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				1.新增现货交易“冻结解冻明细查询”交易<br />\r\n2.新增“会员签约信息查询（商户-&gt;银行）”交易<br />\r\n3.修改“查询会员待确认付款交易”交易：应答报文新增“买方保证金金额”、“卖方保证金金额”<br />\r\n4.“账户明细查询”：请求报文新增“查询资金类别”、“商户查询时间”；应答报文新增“查询时间”<br />\r\n5.“付款状态查询”：交易金额字段名改为“TX_AMT”\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V<span style="color:#000;font-size:13px;">0.8.3</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="104" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-7-17\r\n			</td>\r\n			<td width="484" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				1.“会员出金审批结果反馈”交易：请求报文新增“出金申请渠道”等字段，以支持银行、商户两个渠道发起的出金。<br />\r\n2. 新增“冲正交易”，支持出入金交易的当天冲正。<br />\r\n3. “会员入金”、“会员出金审批结果反馈”：应答报文新增“交易流水号”，用于冲正交易中上送。\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V<span style="color:#000;font-size:13px;">0.8.4</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="61" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-7-29\r\n			</td>\r\n			<td width="484" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				1.新增交易：中远期清算发起<br />\r\n2.新增交易：中远期清算结果查询<br />\r\n3.修改商户签到签退交易：删除请求报文字段ACCTING_FLG\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V0.8.5\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="37" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-8-16\r\n			</td>\r\n			<td width="484" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				1<span style="color:#000;font-size:13px;">.新增交易：付款完成通知</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V<span style="color:#000;font-size:13px;">0.9.0</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="47" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-8-19\r\n			</td>\r\n			<td width="484" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				1.修改交易“会员信息传输”：请求报文字段的必填属性<br />\r\n2.3FC019交易名称修改为“合同状态变更通知”，请求报文字段新增字段 PAY_STS\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V<span style="color:#000;font-size:13px;">0.9.1</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="26" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-8-25\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				1<span style="color:#000;font-size:13px;">.修改交易3FC008“会员签约信息查询”：请求报文新增字段：SIT_TYP</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V0.9.<span style="color:#000;font-size:13px;">2</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="57" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-8-28\r\n			</td>\r\n			<td width="484" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				1.新增3FC020“会员出入金明细文件请求”<br />\r\n2.新增3FC021“会员出入金明细文件结果查询”<br />\r\n3.修改3FC017、3FC018交易：请求报文增加“商户编号”字段\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V0.9.<span style="color:#000;font-size:13px;">3</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="73" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-11-23\r\n			</td>\r\n			<td width="484" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				1.删除3FC016“冲正交易”<br />\r\n2.修改3FC004“会员出金审批结果反馈”：请求报文删除“出金申请渠道”等字段<br />\r\n3.新增3FC022“会员出金”交易<br />\r\n4.修改了3FC002、3FC003、3FC004等交易的备注及交易说明\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V0.9.<span style="color:#000;font-size:13px;">5</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="26" align="right" style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				2010-12-17\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				新增3FC023“查询文件MD5”\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n				V<span style="color:#000;font-size:13px;">0.9.6</span>\r\n			</td>\r\n			<td style="color:#000;font-size:13px;font-family:宋体;vertical-align:middle;">\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	<br />\r\n</p>', 2, NULL, '2012-09-25 00:00:00', '', ''),
(36, '员签约信息传输', '<table border="0" cellpadding="0" cellspacing="0" width="1068" style="width:801pt;">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="8" height="19" width="1068">\r\n				<a name="RANGE!A1"></a>会员签约信息传输\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="19" width="68">\r\n				交易名称\r\n			</td>\r\n			<td width="188">\r\n				会员信息传输\r\n			</td>\r\n			<td width="193">\r\n				交易码\r\n			</td>\r\n			<td width="68">\r\n				3<span>FC001</span> \r\n			</td>\r\n			<td width="63">\r\n				报文类型\r\n			</td>\r\n			<td width="67">\r\n				XML\r\n			</td>\r\n			<td width="349">\r\n			</td>\r\n			<td>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="19" width="68">\r\n				后端系统\r\n			</td>\r\n			<td width="188">\r\n			</td>\r\n			<td width="193">\r\n				后端交易代码\r\n			</td>\r\n			<td width="68">\r\n			</td>\r\n			<td width="63">\r\n			</td>\r\n			<td width="67">\r\n			</td>\r\n			<td width="349">\r\n			</td>\r\n			<td width="72">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="53" width="68">\r\n				交易说明\r\n			</td>\r\n			<td colspan="7" width="1000">\r\n				商户把会员资料传输到银行，以便客户去银行柜台签约时可做校验。<br />\r\n银行返回成功表示银行已接收商户传输过来的会员资料，并不是表示会员已与银行签约。<br />\r\n只有会员去银行柜台办理了第三方支付签约后，银行才会把会员改为签约状态。\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="8" height="19" width="1068">\r\n				请求报文\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="19" width="68">\r\n				<br />\r\n			</td>\r\n			<td width="188">\r\n				<br />\r\n			</td>\r\n			<td width="193">\r\n				<br />\r\n			</td>\r\n			<td width="68">\r\n				<br />\r\n			</td>\r\n			<td width="63">\r\n				char\r\n			</td>\r\n			<td width="67">\r\n				Y\r\n			</td>\r\n			<td width="349">\r\n				0-建行；1-非建行\r\n			</td>\r\n			<td width="72">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="19" width="68">\r\n				9\r\n			</td>\r\n			<td width="188">\r\n				MBR_CONTACT\r\n			</td>\r\n			<td width="193">\r\n				会员联系人\r\n			</td>\r\n			<td width="68">\r\n				20\r\n			</td>\r\n			<td width="63">\r\n				char\r\n			</td>\r\n			<td width="67">\r\n				N\r\n			</td>\r\n			<td width="349">\r\n			</td>\r\n			<td width="72">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="19" width="68">\r\n				10\r\n			</td>\r\n			<td width="188">\r\n				MBR_PHONE_NUM\r\n			</td>\r\n			<td width="193">\r\n				会员联系方式\r\n			</td>\r\n			<td width="68">\r\n				20\r\n			</td>\r\n			<td width="63">\r\n				char\r\n			</td>\r\n			<td width="67">\r\n				N\r\n			</td>\r\n			<td width="349">\r\n			</td>\r\n			<td width="72">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="19" width="68">\r\n				11\r\n			</td>\r\n			<td width="188">\r\n				MBR_ADDR\r\n			</td>\r\n			<td width="193">\r\n				会员地址\r\n			</td>\r\n			<td width="68">\r\n				80\r\n			</td>\r\n			<td width="63">\r\n				char\r\n			</td>\r\n			<td width="67">\r\n				N\r\n			</td>\r\n			<td width="349">\r\n			</td>\r\n			<td width="72">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="19" width="68">\r\n				12\r\n			</td>\r\n			<td width="188">\r\n				MBR_ANNUAL_FEE_AMT\r\n			</td>\r\n			<td width="193">\r\n				会员年费金额\r\n			</td>\r\n			<td width="68">\r\n				13，02\r\n			</td>\r\n			<td width="63">\r\n				double\r\n			</td>\r\n			<td width="67">\r\n				N\r\n			</td>\r\n			<td width="349">\r\n			</td>\r\n			<td width="72">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="19" width="68">\r\n				13\r\n			</td>\r\n			<td width="188">\r\n				MBR_INOUT_AMT_SVC_AMT\r\n			</td>\r\n			<td width="193">\r\n				会员出入金手续费金额\r\n			</td>\r\n			<td width="68">\r\n				13，02\r\n			</td>\r\n			<td width="63">\r\n				double\r\n			</td>\r\n			<td width="67">\r\n				N\r\n			</td>\r\n			<td width="349">\r\n			</td>\r\n			<td width="72">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height="19" width="68">\r\n				14\r\n			</td>\r\n			<td width="188">\r\n				MBR_INOUT_AMT_SVC_DRAWEE\r\n			</td>\r\n			<td width="193">\r\n				会员出入金手续费付费方\r\n			</td>\r\n			<td width="68">\r\n				1\r\n			</td>\r\n			<td width="63">\r\n				char\r\n			</td>\r\n			<td width="67">\r\n				Y\r\n			</td>\r\n			<td width="349">\r\n				1-会员；<span>2</span><span>-商户</span> \r\n			</td>\r\n			<td width="72">\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 2, NULL, '2012-09-25 00:00:00', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
