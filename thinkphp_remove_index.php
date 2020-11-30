<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <title>ThinkPHP实现伪静态如何去掉目录中的index.php - 记录点点滴滴</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3, minimum-scale=1">
  
  <meta name="description" content="ThinkPHP中默认的URL地址是形如这样的：http://localhost/Myapp/index.php/Index/index/
Myapp是我的项目文件名，默认的访问地址是上面这样的。为了使URL更加简介友好，现在要去掉中间的index.php，方法如下：
1。确认httpd.conf配置文件中加载了mod_rewrite.so 模块，加载的方法是去掉mod_rewrite.so前面的注释#号
2。讲httpd.conf中的Allowoverride None 将None改为All
3。打开对应的项目配置文件，我的项目配置文件是Myapp/Conf/config.php ,在这个配置文件数组中增加一行，‘URL_MODEL’=&gt;2
4。在项目的根目录下面建立一个.htaccess文件，里面写入下面的内容：

RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]

如果你的服务器支持rewrite，现在就可以通过http://localhost/Myapp/Index/index/访问Index模块下面的index操作。">
  
  <meta itemprop="name" content="ThinkPHP实现伪静态如何去掉目录中的index.php - 记录点点滴滴">
  <meta itemprop="description" content="ThinkPHP中默认的URL地址是形如这样的：http://localhost/Myapp/index.php/Index/index/
Myapp是我的项目文件名，默认的访问地址是上面这样的。为了使URL更加简介友好，现在要去掉中间的index.php，方法如下：
1。确认httpd.conf配置文件中加载了mod_rewrite.so 模块，加载的方法是去掉mod_rewrite.so前面的注释#号
2。讲httpd.conf中的Allowoverride None 将None改为All
3。打开对应的项目配置文件，我的项目配置文件是Myapp/Conf/config.php ,在这个配置文件数组中增加一行，‘URL_MODEL’=&gt;2
4。在项目的根目录下面建立一个.htaccess文件，里面写入下面的内容：

RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]

如果你的服务器支持rewrite，现在就可以通过http://localhost/Myapp/Index/index/访问Index模块下面的index操作。">
  <meta itemprop="image" content="https://gofunbox.github.io/img/author.jpg">
  
  
  <meta name="twitter:description" content="">
  
  <link rel="shortcut icon" href="https://gofunbox.github.io/img/favicon.ico"/>
  <link rel="apple-touch-icon" href="https://gofunbox.github.io/apple-touch-icon.png" />
  <link rel="apple-touch-icon-precomposed" href="https://gofunbox.github.io/apple-touch-icon.png" />
  <link rel="stylesheet" href="https://gofunbox.github.io/highlight/styles/github.css">
  <script src="https://gofunbox.github.io/highlight/highlight.pack.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  
  <link rel="stylesheet" href="https://gofunbox.github.io/font/hack/css/hack.min.css">
  <link rel="stylesheet" href="https://gofunbox.github.io/css/style.css">
</head>

<body>
  <header>
    <div>
  <div id="imglogo">
    <a href="https://gofunbox.github.io/"><img src='https://gofunbox.github.io/img/logo.svg' alt="记录点点滴滴" title="记录点点滴滴"/></a>
  </div>
  <div id="textlogo">
    <h1 class="site-name"><a href="https://gofunbox.github.io/" title="记录点点滴滴">记录点点滴滴</a></h1>
    <h2 class="blog-motto">awesome!</h2>
  </div>
  <div class="navbar"><a class="navbutton navmobile" href="#" title="menu"></a></div>
  <nav class="animated">
    <ul>
      
      <li><a href="/">Home</a></li>
      
      <li>
        <form class="search" method="get" action="https://www.google.com/search">
          <div>
            <input type="text" id="search" name="q" placeholder='Search'>
          </div>
        </form>
      </li>
    </ul>
  </nav>
</div>

  </header>
  <div id="container">
    <div id="main" class="post" itemscope itemprop="blogPost">
	<article itemprop="articleBody">
    <header class="article-info clearfix">
  <h1 itemprop="name">
      <a href="https://gofunbox.github.io/thinkphp_remove_index.php" title="ThinkPHP实现伪静态如何去掉目录中的index.php" itemprop="url">ThinkPHP实现伪静态如何去掉目录中的index.php</a>
  </h1>
  <p class="article-author">By
    
      <a href="" title="">you</a>
    
  </p>
  <p class="article-time">
    <time datetime="2013-09-06 09:35:38 &#43;0000 &#43;0000" itemprop="datePublished">2013-09-06</time>
  </p>
</header>

	<div class="article-content">
    
    <p><span style="font-size: medium;">ThinkPHP中默认的URL地址是形如这样的：<a href="http://localhost/Myapp/index.php/Index/index/">http://localhost/Myapp/index.php/Index/index/</a></span></p>

<p><span style="font-size: medium;">Myapp是我的项目文件名，默认的访问地址是上面这样的。为了使URL更加简介友好，现在要去掉中间的index.php，方法如下：</span></p>

<p><span style="font-size: medium;">1。确认httpd.conf配置文件中加载了mod_rewrite.so 模块，加载的方法是去掉mod_rewrite.so前面的注释#号</span></p>

<p><span style="font-size: medium;">2。讲httpd.conf中的Allowoverride  None 将None改为All</span></p>

<p><span style="font-size: medium;">3。打开对应的项目配置文件，我的项目配置文件是Myapp/Conf/config.php ,在这个配置文件数组中增加一行，‘URL_MODEL’=&gt;2</span></p>

<p><span style="font-size: medium;">4。在项目的根目录下面建立一个.htaccess文件，里面写入下面的内容：</span></p>

<p><span style="font-size: medium;"><IfModule rewrite_module></span><br />
 <span style="font-size: medium;">RewriteEngine on</span><br />
 <span style="font-size: medium;">RewriteCond %{REQUEST_FILENAME} !-d</span><br />
 <span style="font-size: medium;">RewriteCond %{REQUEST_FILENAME} !-f</span><br />
 <span style="font-size: medium;">RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]</span><br />
 <span style="font-size: medium;"></IfModule></span></p>

<p><span style="font-size: medium;">如果你的服务器支持rewrite，现在就可以通过<a href="http://localhost/Myapp/Index/index/访问Index模块下面的index操作。">http://localhost/Myapp/Index/index/访问Index模块下面的index操作。</a></span></p>

    
	</div>
  <footer class="article-footer clearfix">
  



<div class="article-categories">
  <span></span>
  
  <a class="article-category-link" href="https://gofunbox.github.io/categories/thinkphp">ThinkPHP</a>
  
</div>



  <div class="article-share" id="share">
    <div data-url="https://gofunbox.github.io/thinkphp_remove_index.php" data-title="ThinkPHP实现伪静态如何去掉目录中的index.php" data-tsina="" class="share clearfix">
    </div>
  </div>
</footer>

	</article>
  



</div>

    <div class="openaside"><a class="navbutton" href="#" title=""></a></div>
<div id="asidepart">
<div class="closeaside"><a class="closebutton" href="#" title=""></a></div>
<aside class="clearfix">
  

<div class="categorieslist">
  <p class="asidetitle">Categories</p>
  <ul>
    
    <li><a href="https://gofunbox.github.io/categories/dedecms" title="dedecms">dedecms<sup>1</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/discuz" title="discuz">discuz<sup>4</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/hack" title="hack">hack<sup>6</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/html" title="html">html<sup>5</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/linux" title="linux">linux<sup>19</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/php" title="php">php<sup>53</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/seo" title="seo">seo<sup>13</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/shopex" title="shopex">shopex<sup>17</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/shopnc" title="shopnc">shopnc<sup>3</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/thinkphp" title="thinkphp">thinkphp<sup>3</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/wordpress" title="wordpress">wordpress<sup>5</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/zencart" title="zencart">zencart<sup>9</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/%e4%b8%aa%e4%ba%ba%e6%9d%82%e8%b0%88" title="个人杂谈">个人杂谈<sup>2</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/%e6%80%a7%e8%83%bd%e4%bc%98%e5%8c%96" title="性能优化">性能优化<sup>9</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/%e6%95%b0%e6%8d%ae%e5%ba%93" title="数据库">数据库<sup>15</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/%e6%9c%8d%e5%8a%a1%e5%99%a8" title="服务器">服务器<sup>33</sup></a></li>
    
    <li><a href="https://gofunbox.github.io/categories/%e7%89%88%e6%9c%ac%e7%ae%a1%e7%90%86%e5%b7%a5%e5%85%b7" title="版本管理工具">版本管理工具<sup>5</sup></a></li>
    
  </ul>
</div>



  

<div class="tagslist">
	<p class="asidetitle">Tags</p>
		<ul class="clearfix">
      
			<li><a href="https://gofunbox.github.io/tags/html" title="html">html<sup>1</sup></a></li>
      
			<li><a href="https://gofunbox.github.io/tags/javascript" title="javascript">javascript<sup>1</sup></a></li>
      
			<li><a href="https://gofunbox.github.io/tags/jenkins" title="jenkins">jenkins<sup>1</sup></a></li>
      
			<li><a href="https://gofunbox.github.io/tags/linux" title="linux">linux<sup>9</sup></a></li>
      
			<li><a href="https://gofunbox.github.io/tags/lua" title="lua">lua<sup>2</sup></a></li>
      
			<li><a href="https://gofunbox.github.io/tags/mysql" title="mysql">mysql<sup>3</sup></a></li>
      
			<li><a href="https://gofunbox.github.io/tags/nginx" title="nginx">nginx<sup>7</sup></a></li>
      
			<li><a href="https://gofunbox.github.io/tags/osx" title="osx">osx<sup>1</sup></a></li>
      
			<li><a href="https://gofunbox.github.io/tags/php" title="php">php<sup>3</sup></a></li>
      
			<li><a href="https://gofunbox.github.io/tags/ssl" title="ssl">ssl<sup>5</sup></a></li>
      
			<li><a href="https://gofunbox.github.io/tags/vmware" title="vmware">vmware<sup>1</sup></a></li>
      
		</ul>
</div>



  
  <div class="archiveslist">
    <p class="asidetitle">Archives</p>
    <ul class="archive-list">
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2017-12">2017年12月</a><span class="archive-list-count">3</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2017-09">2017年09月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2017-08">2017年08月</a><span class="archive-list-count">9</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2017-07">2017年07月</a><span class="archive-list-count">5</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2016-11">2016年11月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2016-10">2016年10月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2016-09">2016年09月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2016-06">2016年06月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2016-04">2016年04月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2016-03">2016年03月</a><span class="archive-list-count">3</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2015-12">2015年12月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2015-11">2015年11月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2015-10">2015年10月</a><span class="archive-list-count">4</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2015-09">2015年09月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2015-08">2015年08月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2015-04">2015年04月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2015-03">2015年03月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2015-02">2015年02月</a><span class="archive-list-count">3</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2015-01">2015年01月</a><span class="archive-list-count">3</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2014-12">2014年12月</a><span class="archive-list-count">3</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2014-11">2014年11月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2014-10">2014年10月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2014-08">2014年08月</a><span class="archive-list-count">3</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2014-06">2014年06月</a><span class="archive-list-count">4</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2014-05">2014年05月</a><span class="archive-list-count">4</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2014-04">2014年04月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2014-03">2014年03月</a><span class="archive-list-count">4</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2014-02">2014年02月</a><span class="archive-list-count">4</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2013-11">2013年11月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2013-10">2013年10月</a><span class="archive-list-count">3</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2013-09">2013年09月</a><span class="archive-list-count">3</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2013-08">2013年08月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2013-07">2013年07月</a><span class="archive-list-count">6</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2013-06">2013年06月</a><span class="archive-list-count">4</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2013-05">2013年05月</a><span class="archive-list-count">4</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2013-04">2013年04月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2013-03">2013年03月</a><span class="archive-list-count">8</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2013-02">2013年02月</a><span class="archive-list-count">10</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2013-01">2013年01月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2012-11">2012年11月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2012-10">2012年10月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2012-09">2012年09月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2012-07">2012年07月</a><span class="archive-list-count">1</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2012-05">2012年05月</a><span class="archive-list-count">5</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2012-04">2012年04月</a><span class="archive-list-count">3</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2012-03">2012年03月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2012-02">2012年02月</a><span class="archive-list-count">2</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2012-01">2012年01月</a><span class="archive-list-count">7</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2011-11">2011年11月</a><span class="archive-list-count">15</span>
      </li>
      
      
      <li class="archive-list-item">
        <a class="archive-list-link" href="https://gofunbox.github.io/post/#2011-10">2011年10月</a><span class="archive-list-count">16</span>
      </li>
      
    </ul>

  </div>


  

<div class="tagcloudlist">
  <p class="asidetitle">Tags Cloud</p>
  <div class="tagcloudlist clearfix">
    
    <a href="https://gofunbox.github.io/tags/html" style="font-size: 12px;">html</a>
    
    <a href="https://gofunbox.github.io/tags/javascript" style="font-size: 12px;">javascript</a>
    
    <a href="https://gofunbox.github.io/tags/jenkins" style="font-size: 12px;">jenkins</a>
    
    <a href="https://gofunbox.github.io/tags/linux" style="font-size: 12px;">linux</a>
    
    <a href="https://gofunbox.github.io/tags/lua" style="font-size: 12px;">lua</a>
    
    <a href="https://gofunbox.github.io/tags/mysql" style="font-size: 12px;">mysql</a>
    
    <a href="https://gofunbox.github.io/tags/nginx" style="font-size: 12px;">nginx</a>
    
    <a href="https://gofunbox.github.io/tags/osx" style="font-size: 12px;">osx</a>
    
    <a href="https://gofunbox.github.io/tags/php" style="font-size: 12px;">php</a>
    
    <a href="https://gofunbox.github.io/tags/ssl" style="font-size: 12px;">ssl</a>
    
    <a href="https://gofunbox.github.io/tags/vmware" style="font-size: 12px;">vmware</a>
    
  </div>
</div>



  

</aside>
</div>

  </div>
  <footer><div id="footer" >
  <div class="line">
    <span></span>
    
    <div style='background:no-repeat url("https://gofunbox.github.io/img/author.jpg") left top;-webkit-background-size:6.875em 6.875em;-moz-background-size:6.875em 6.875em;background-size:6.875em 6.875em;' class="author" ></div>
  </div>
  <section class="info">
    <p></p>
  </section>
  <div class="social-font clearfix">
    <a href='http://weibo.com/coderzh' target="_blank" title="weibo"></a>
    <a href='https://twitter.com/coderzh' target="_blank" title="twitter"></a>
    <a href='https://github.com/coderzh' target="_blank" title="github"></a>
    <a href='https://www.facebook.com/coderzh' target="_blank" title="facebook"></a>
    <a href='https://www.linkedin.com/coderzh' target="_blank" title="linkedin"></a>
  </div>
  <p class="copyright">Powered by <a href="http://gohugo.io" target="_blank" title="hugo">hugo</a> and Theme by <a href="https://github.com/coderzh/hugo-pacman-theme" target="_blank" title="hugo-pacman-theme">hugo-pacman-theme</a> © 2020
    
    <a href="https://gofunbox.github.io/" title="记录点点滴滴">记录点点滴滴</a>
    
  </p>
</div>
</footer>
  <script src="https://gofunbox.github.io/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
done = false;
$(document).ready(function(){
  $('.navbar').click(function(){
    $('header nav').toggleClass('shownav');
  });
  var myWidth = 0;
  function getSize(){
    if( typeof( window.innerWidth ) == 'number' ) {
      myWidth = window.innerWidth;
    } else if( document.documentElement && document.documentElement.clientWidth) {
      myWidth = document.documentElement.clientWidth;
    };
  };
  var m = $('#main'),
      a = $('#asidepart'),
      c = $('.closeaside'),
      o = $('.openaside');
  $(window).resize(function(){
    getSize();
    if (myWidth >= 1024) {
      $('header nav').removeClass('shownav');
    }else
    {
      m.removeClass('moveMain');
      a.css('display', 'block').removeClass('fadeOut');
      o.css('display', 'none');
    }
  });
  c.click(function(){
    a.addClass('fadeOut').css('display', 'none');
    o.css('display', 'block').addClass('fadeIn');
    m.addClass('moveMain');
  });
  o.click(function(){
    o.css('display', 'none').removeClass('beforeFadeIn');
    a.css('display', 'block').removeClass('fadeOut').addClass('fadeIn');
    m.removeClass('moveMain');
  });
  $(window).scroll(function(){
    o.css("top",Math.max(80,260-$(this).scrollTop()));
  });
  $('form.search').on('submit', function (event) {
    if (false === done) {
      event.preventDefault();
      var orgVal = $(this).find('#search').val();
      $(this).find('#search').val('site:https:\/\/gofunbox.github.io\/ ' + orgVal);
      done = true;
      $(this).submit();
    }
  });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  var $this = $('.share'),
      url = $this.attr('data-url'),
      encodedUrl = encodeURIComponent(url),
      title = $this.attr('data-title'),
      tsina = $this.attr('data-tsina');
  var html = [
  '<a href="#" class="overlay" id="qrcode"></a>',
  '<div class="qrcode clearfix"><span>扫描二维码分享到微信朋友圈</span><a class="qrclose" href="#share"></a><strong>Loading...Please wait</strong><img id="qrcode-pic" data-src="http://b.bshare.cn/barCode?site=weixin&url=' + encodedUrl + '"/></div>',
  '<a href="#textlogo" class="article-back-to-top" title="Top"></a>',
  '<a href="https://www.facebook.com/sharer.php?u=' + encodedUrl + '" class="article-share-facebook" target="_blank" title="Facebook"></a>',
  '<a href="#qrcode" class="article-share-qrcode" title="QRcode"></a>',
  '<a href="https://twitter.com/intent/tweet?url=' + encodedUrl + '" class="article-share-twitter" target="_blank" title="Twitter"></a>',
  '<a href="http://service.weibo.com/share/share.php?title='+title+'&url='+encodedUrl +'&ralateUid='+ tsina +'&searchPic=true&style=number' +'" class="article-share-weibo" target="_blank" title="Weibo"></a>',
  '<span title="Share to"></span>'
  ].join('');
  $this.append(html);
  $('.article-share-qrcode').click(function(){
    var imgSrc = $('#qrcode-pic').attr('data-src');
    $('#qrcode-pic').attr('src', imgSrc);
    $('#qrcode-pic').load(function(){
        $('.qrcode strong').text(' ');
    });
  });
});
</script>





</body>
</html>
