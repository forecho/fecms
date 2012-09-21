-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 09 月 21 日 11:35
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
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `pid` int(4) NOT NULL COMMENT '父级ID',
  `path` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '类型',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`cid`, `name`, `pid`, `path`, `type`) VALUES
(1, '现货资源', 0, '0', 0),
(0, '线材现货资源', 1, '0-1', 0),
(13, '公司简介', 0, '0', 0),
(14, '公司简介', 13, '0-13', 1),
(15, '公司文化', 13, '0-13', 1),
(16, '公司荣誉', 13, '0-13', 1),
(17, '公司历史', 13, '0-13', 1),
(20, '期货订购', 0, '0', 0);

-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `category` int(4) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `addtime` date NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `category`, `image`, `addtime`, `keywords`, `description`) VALUES
(28, '微信不能承受之“轻”', '<p style="font-family:arial, sans-serif;font-size:13px;line-height:20px;background-color:#ffffff;margin-top:0px;margin-bottom:18px;">这又是一篇很长的博客，而且行文之间没啥逻辑性，而且由于不知道微信后续整体的发展策略是什么，所以很多具体的话很多具体的观点其实等于白说，大多数应该都不会是对的。如果你耐心不够，如果你喜欢纠结于某个具体的结论，建议不要阅读；如果你想从中看到一些判断问题的逻辑，设计产品的思考角度，或者你对我所观察到的现象有兴趣，可以读一读）</p><p style="font-family:arial, sans-serif;font-size:13px;line-height:20px;background-color:#ffffff;margin-top:0px;margin-bottom:18px;">如<a href="http://uicom.net/blog/?p=915" target="_blank" style="color:#000099;">我之前所说</a>：“微信已经承载太多”。</p><p style="font-family:arial, sans-serif;font-size:13px;line-height:20px;background-color:#ffffff;margin-top:0px;margin-bottom:18px;">如今的微信从已经拥有的功能和内容来看，确实已经是一个以通信、熟人分享(朋友圈)、信息订阅三个支点为载体的“无线生活平台”。顺带还可以满足一些交友、群体协作的需求…</p><p style="font-family:arial, sans-serif;font-size:13px;line-height:20px;background-color:#ffffff;margin-top:0px;margin-bottom:18px;">关于通信、熟人分享(朋友圈)我不再啰嗦，关于“信息订阅”做下解释：</p><p style="font-family:arial, sans-serif;font-size:13px;line-height:20px;background-color:#ffffff;margin-top:0px;margin-bottom:18px;">我所谓的信息订阅其主要产品形式就是最近比较热火的“微信公众平台”，对用户来说对这个平台的直接感受没有那么强烈，他们通常只是看到相关商家或垂直媒体会在自己的地盘上宣传自己的微信，用户被吸引去关注完商家的微信后，他们之间可以互动，商家也可以给他推送相关信息。</p><p style="font-family:arial, sans-serif;font-size:13px;line-height:20px;background-color:#ffffff;margin-top:0px;margin-bottom:18px;">“微信公众平台”的实现方式非常讨巧、聪明。估计还有不少人没有用过这个平台，或者只是“关注”过一些公众号，我尝试简单介绍一下“微信公众平台”：</p><p style="font-family:arial, sans-serif;font-size:13px;line-height:20px;background-color:#ffffff;margin-top:0px;margin-bottom:18px;">1）申请公众号之后可以通过后台给订阅者们群发一对一的图文信息，这些信息还支持可以链接到微信之外的页面（这意味着你可以通过微信做很多很多扩展的微信没有提供的东西）；订阅者可以通过微信跟公众号进行对话，公众号在后台可以看到每个用户的对话，然后可以进行一对一的回复。</p><p style="font-family:arial, sans-serif;font-size:13px;line-height:20px;background-color:#ffffff;margin-top:0px;margin-bottom:18px;">2）公众号后台还可以设置一些自动回复，包括第一次见面问候语和自定义答复等。（这个自定义答复做的比较聪明也比较好玩，你可以设置一些关键词及其对应的答复内容，订阅者跟你提到这些关键词的时候，系统就可以自动按照你设定好的一些内容跟他对话了。这就是不少人一直在调戏的所谓的“机器人”）</p><p style="font-family:arial, sans-serif;font-size:13px;line-height:20px;background-color:#ffffff;margin-top:0px;margin-bottom:18px;">3）事实上公众号主要想发力的对象是线下商户，(由于微博类社区的热议，最近很多媒体类的公众号大行其道，导致公众号的活跃群体以及很多人对公众号的认知产生了一些偏离)。关于线下商户，微信重点结合了腾讯的线下生活产品(应该是戴志康在负责这个业务吧)，给线下商户提供了类似“会员卡”、“打折券”的相关功能。</p><p style="font-family:arial, sans-serif;font-size:13px;line-height:20px;background-color:#ffffff;margin-top:0px;margin-bottom:18px;">4）微信这几周在多个一线城市做了N场线下活动。在和星巴克的线下推广中还利用了“摇一摇”功能给用户推荐“星巴克”的公众账户。</p><p style="font-family:arial, sans-serif;font-size:13px;line-height:20px;background-color:#ffffff;margin-top:0px;margin-bottom:18px;">5）为了防止公众号群发的信息给用户造成“骚扰”，微信设置了每个公众号每天只能群发四条信息。</p><p><br /></p>', 19, NULL, '2012-09-21', '', ''),
(29, '链接的力量', '<table width="100%" align="right" border="0" cellspacing="0" cellpadding="0" style="font-family:arial, sans-serif;line-height:20px;background-color:#ffffff;"><tbody><tr><td style="vertical-align:top;padding:0px 20px 0px 0px;"><div id="pageContent"><div id="pageContentWrap" style="width:650px;font-size:13px;"><p style="margin-top:0px;margin-bottom:18px;">在36氪和微软的活动上，谈到软件或App产品创新的逻辑，我曾经有一页slide谈到“App软件必须拥抱链接的力量（Embrace the Magic of Links)”。期间有投资人和创业者对此很感兴趣，遗憾由于会场时间关系，不能够充分展开。回到上海后，考虑写一篇博客展开详述，与诸位互联网人共勉。</p><p style="margin-top:0px;margin-bottom:18px;">在大家阅读这篇文章之前（或之后），我建议最好阅读一下我一年前写的文章《<a href="http://blog.sina.com.cn/s/blog_626d4ddb01015s4c.html" target="_blank" style="color:#000099;">我的互联网信仰</a>》，这样就对我的叙事逻辑有一个清晰的承接。这里谈的软件，泛指在PC、Pad或Phone上的客户端软件或者App。</p><p style="margin-top:0px;margin-bottom:18px;">以史为鉴可以知兴替。让我们先来简单回顾一下中国的PC软件历史。了解中国软件行业的朋友应该对下面这些软件耳熟能详：网络蚂蚁，Winamp，RealPlayer, ACDsee，超级解霸，瑞星杀毒, Winzip，QQ…….除了QQ之外，其他的软件现在都几近消失，或者式微到可以忽略不计。这背后的原因是什么呢？用户需求不再？这个并不能说通。实际上，大家会发现它们大多都有同类软件活跃在当下：迅雷、PPTV、美图秀秀、暴风影音、360等。抛开运营、管理、创始人等因素，到底有什么样的产品因素导致这些软件式微？</p><p style="margin-top:0px;margin-bottom:18px;">如果将它们与其强大的后继者做对比，我们会发现这些式微的软件都有一个共同点：那就是<strong>链接的缺失，或低质量。</strong></p></div></div></td></tr></tbody></table><p style="clear:both;"><br /></p>', 1, '9d1427c8b022d3b5135256f9f0dd19a1.jpg', '2012-09-21', '', ''),
(31, '敢死队吧', '<p>敢死队吧<br /></p>', 14, '8e40d5bd22871a8f0973c3b3f70c6929.gif', '2012-09-21', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
