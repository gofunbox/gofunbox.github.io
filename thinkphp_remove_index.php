
<!DOCTYPE html>
<html lang="en" data-figures="" class="page" data-mode="dim">
  <head>
<title>ThinkPHP实现伪静态如何去掉目录中的index.php | Funbox的技术记事本</title>
<meta charset="utf-8">
<meta name="generator" content="Hugo 0.58.3" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<div style="display: none;">
    <script type="text/javascript" src="https://v1.cnzz.com/z_stat.php?id=1253534284&web_id=1253534284"></script>
</div>

  
<meta property="og:locale" content="en" />

<meta property="og:type" content="article">
<meta name="description" content="ThinkPHP中默认的URL地址是形如这样的：http://localhost/Myapp/index.php/Index/index/
Myapp是我的项目文件名，默认的访问地址是上面这样的。为了使URL更加简介友好，现在要去掉中间的index.php，方法如下：
1。确认httpd.conf配置文件中加载 …">
<meta name="twitter:card" content="summary" />
<meta name="twitter:creator" content="">
<meta name="twitter:title" content="ThinkPHP实现伪静态如何去掉目录中的index.php" />
<meta property="og:url" content="https://ifunbox.top/thinkphp_remove_index.php" />
<meta property="og:title" content="ThinkPHP实现伪静态如何去掉目录中的index.php" />
<meta property="og:description" content="ThinkPHP中默认的URL地址是形如这样的：http://localhost/Myapp/index.php/Index/index/
Myapp是我的项目文件名，默认的访问地址是上面这样的。为了使URL更加简介友好，现在要去掉中间的index.php，方法如下：
1。确认httpd.conf配置文件中加载 …" />
<meta property="og:image" content="https://ifunbox.top/" />
<link rel="apple-touch-icon" sizes="180x180" href='https://ifunbox.top/icons/apple-touch-icon.png'>
<link rel="icon" type="image/png" sizes="32x32" href='https://ifunbox.top/icons/favicon-32x32.png'>
<link rel="manifest" href='https://ifunbox.top/icons/site.webmanifest'>
<link rel="mask-icon" href='https://ifunbox.top/safari-pinned-tab.svg' color="#002538">
<meta name="msapplication-TileColor" content="#002538">
<meta name="theme-color" content="#002538">

<link rel="canonical" href="https://ifunbox.top/thinkphp_remove_index.php">

    

    
    
    <link rel="preload" href="https://ifunbox.top/css/styles.3c293eda0641c6491efdbc2ddc32d1ec05b0f4b4d4111d3fdc31d8bdfce311412eed47cf75d02001b067f5032e10e1f9ec0ae5175e17d82f68691f5ebffcab39.css" integrity = "sha512-PCk&#43;2gZBxkke/bwt3DLR7AWw9LTUER0/3DHYvfzjEUEu7UfPddAgAbBn9QMuEOH57ArlF14X2C9oaR9ev/yrOQ==" as="style" crossorigin="anonymous">
    <link rel="preload" href="https://ifunbox.top/js/bundle.min.c0652ae16e0c9ea2300f3f4296009baa05854c44fa9bd6d9b4f0fb04675c44d0ae6704ee99f30854d1a5c025fcd518e7b07fe95bf69b5e009284bf57df300b85.js" as="script" integrity=
    "sha512-wGUq4W4MnqIwDz9ClgCbqgWFTET6m9bZtPD7BGdcRNCuZwTumfMIVNGlwCX81RjnsH/pW/abXgCShL9X3zALhQ==" crossorigin="anonymous">

    
    <link rel="stylesheet" type="text/css" href="https://ifunbox.top/css/styles.3c293eda0641c6491efdbc2ddc32d1ec05b0f4b4d4111d3fdc31d8bdfce311412eed47cf75d02001b067f5032e10e1f9ec0ae5175e17d82f68691f5ebffcab39.css" integrity="sha512-PCk&#43;2gZBxkke/bwt3DLR7AWw9LTUER0/3DHYvfzjEUEu7UfPddAgAbBn9QMuEOH57ArlF14X2C9oaR9ev/yrOQ==" crossorigin="anonymous">
    <meta name="google-site-verification" content="kTkZCvOxFQ8JGv-20scQxu7f19s2V26nUzaz_ZkJ64A" />
  </head>
  
  
  
    
  
  <body data-code="10" data-lines="true" id="documentTop">

<header class="nav_header" >
  <nav class="nav">
    <a href='https://ifunbox.top/' class="nav_brand nav_item">
        Funbox的技术记事本
      <div class="nav_close">
        <div>
          <svg class="icon">
  <use xlink:href="#open-menu"></use>
</svg>
          <svg class="icon">
  <use xlink:href="#closeme"></use>
</svg>
        </div>
      </div>
    </a>
    <div class='nav_body nav_body_left'>
      
      
      
        

  <div class="nav_parent">
    <a href="https://ifunbox.top/" class="nav_item">Home </a>
  </div>
  <div class="nav_parent">
    <a href="https://ifunbox.top/about/" class="nav_item">About </a>
  </div>
      
      <div class="nav_parent">
        <a href="#" class="nav_item"></a>
        <div class="nav_sub">
          <span class="nav_child"></span>
          
          <a href="https://ifunbox.top/zh/" class="nav_child nav_item">中文</a>
          
          <a href="https://ifunbox.top/" class="nav_child nav_item"></a>
          
        </div>
      </div>
      
<div class='follow'>
  <a href="https://github.com/gofunbox">
    <svg class="icon">
  <use xlink:href="#github"></use>
</svg>
  </a>
    
  <a href="https://ifunbox.top/index.xml">
    <svg class="icon">
  <use xlink:href="#rss"></use>
</svg>
  </a>
<div class="color_mode">
  <input type="checkbox" class="color_choice" id="mode">
</div>

</div>

    </div>
  </nav>
</header>

    <main>
  
<div class="grid-inverse wrap content">
  <article class="post_content">
    <h1 class="post_title">ThinkPHP实现伪静态如何去掉目录中的index.php</h1><div class="post_meta">
  <svg class="icon">
  <use xlink:href="#calendar"></use>
</svg>
  <span class="post_date">
    Sep 6, 2013</span>
</div>

    
<div class="post_share">
  Share on:
  <a href="https://twitter.com/intent/tweet?text=ThinkPHP%e5%ae%9e%e7%8e%b0%e4%bc%aa%e9%9d%99%e6%80%81%e5%a6%82%e4%bd%95%e5%8e%bb%e6%8e%89%e7%9b%ae%e5%bd%95%e4%b8%ad%e7%9a%84index.php&url=https%3a%2f%2fifunbox.top%2fthinkphp_remove_index.php&tw_p=tweetbutton" class="twitter" title="Share on Twitter" target="_blank" rel="nofollow">
    <svg class="icon">
  <use xlink:href="#twitter"></use>
</svg>
  </a>
  <a href="https://www.facebook.com/sharer.php?u=https%3a%2f%2fifunbox.top%2fthinkphp_remove_index.php&t=ThinkPHP%e5%ae%9e%e7%8e%b0%e4%bc%aa%e9%9d%99%e6%80%81%e5%a6%82%e4%bd%95%e5%8e%bb%e6%8e%89%e7%9b%ae%e5%bd%95%e4%b8%ad%e7%9a%84index.php" class="facebook" title="Share on Facebook" target="_blank" rel="nofollow">
    <svg class="icon">
  <use xlink:href="#facebook"></use>
</svg>
  </a>
  <a href="#linkedinshare" id = "linkedinshare" class="linkedin" title="Share on LinkedIn" rel="nofollow">
    <svg class="icon">
  <use xlink:href="#linkedin"></use>
</svg>
  </a>
  <a href="https://ifunbox.top/thinkphp_remove_index.php" title="Copy Link" class="link link_yank">
    <svg class="icon">
  <use xlink:href="#copy"></use>
</svg>
  </a>
</div>

    
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

    
      <div id="SOHUCS" sid="/thinkphp_remove_index.php" ></div>
<script type="text/javascript">
    (function(){
        var appid = 'cyvbquHcp';
        var conf = 'prod_36ec90d723d85f1042b3c858876d1b2d';
        var width = window.innerWidth || document.documentElement.clientWidth;
        if (width < 960) {
            var head = document.getElementsByTagName('head')[0]||document.head||document.documentElement;
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.charset = 'utf-8';
            script.id = 'changyan_mobile_js';
            script.src = 'https://cy-cdn.kuaizhan.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf;
            head.appendChild(script);
        } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("https://cy-cdn.kuaizhan.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); </script>
    
  </article>
<aside class="sidebar">
  <section class="sidebar_inner">
    <h2>Funbox</h2>
    <div>
      技术积累记事本，记录自己的点点滴滴。
    </div>
    <a href='https://ifunbox.top/about/' class="button mt-1" role="button">Read More</a>
    <h2 class="mt-4">Recent Posts</h2>
    <ul class="flex-column">
      <li>
        <a href="https://ifunbox.top/wordpress-migrate-to-hugo/" class="nav-link">博客从WordPress迁移到hugo咯</a>
      </li>
      <li>
        <a href="https://ifunbox.top/laravel-cache-cmd/" class="nav-link">Laravel缓存相关命令</a>
      </li>
      <li>
        <a href="https://ifunbox.top/mysql-data-recovery/" class="nav-link">Mysql数据误删除的恢复，drop表或库的恢复</a>
      </li>
      <li>
        <a href="https://ifunbox.top/innodb_flush_log_at_trx_commit-sync_binlog/" class="nav-link">MySQL参数：innodb_flush_log_at_trx_commit 和 sync_binlog</a>
      </li>
      <li>
        <a href="https://ifunbox.top/mysql-lock/" class="nav-link">MySQL锁</a>
      </li>
      <li>
        <a href="https://ifunbox.top/mysql-ddl-online/" class="nav-link">关于DDL ONLINE</a>
      </li>
      <li>
        <a href="https://ifunbox.top/time-complexity/" class="nav-link">时间复杂度</a>
      </li>
      <li>
        <a href="https://ifunbox.top/nginx-ban-ip-access-for-http-https/" class="nav-link">Nginx配置禁止IP直接HTTP/HTTPS访问</a>
      </li>
    </ul>
    <div>
      <h2 class="mt-4 taxonomy" id="categories-section">Categories</h2>
      <nav class="tags_nav">
        <a href='https://ifunbox.top/categories/php/' class="post_tag button button_translucent">
          PHP
          <span class="button_tally">55</span>
        </a>
        
        <a href='https://ifunbox.top/categories/%E6%9C%8D%E5%8A%A1%E5%99%A8/' class="post_tag button button_translucent">
          服务器
          <span class="button_tally">33</span>
        </a>
        
        <a href='https://ifunbox.top/categories/linux/' class="post_tag button button_translucent">
          LINUX
          <span class="button_tally">19</span>
        </a>
        
        <a href='https://ifunbox.top/categories/%E6%95%B0%E6%8D%AE%E5%BA%93/' class="post_tag button button_translucent">
          数据库
          <span class="button_tally">18</span>
        </a>
        
        <a href='https://ifunbox.top/categories/shopex/' class="post_tag button button_translucent">
          SHOPEX
          <span class="button_tally">17</span>
        </a>
        
        <a href='https://ifunbox.top/categories/seo/' class="post_tag button button_translucent">
          SEO
          <span class="button_tally">13</span>
        </a>
        
        <a href='https://ifunbox.top/categories/zencart/' class="post_tag button button_translucent">
          ZENCART
          <span class="button_tally">9</span>
        </a>
        
        <a href='https://ifunbox.top/categories/%E6%80%A7%E8%83%BD%E4%BC%98%E5%8C%96/' class="post_tag button button_translucent">
          性能优化
          <span class="button_tally">9</span>
        </a>
        
        <a href='https://ifunbox.top/categories/hack/' class="post_tag button button_translucent">
          HACK
          <span class="button_tally">6</span>
        </a>
        
        <a href='https://ifunbox.top/categories/wordpress/' class="post_tag button button_translucent">
          WORDPRESS
          <span class="button_tally">6</span>
        </a>
        
        <a href='https://ifunbox.top/categories/html/' class="post_tag button button_translucent">
          HTML
          <span class="button_tally">5</span>
        </a>
        
        <a href='https://ifunbox.top/categories/%E7%89%88%E6%9C%AC%E7%AE%A1%E7%90%86%E5%B7%A5%E5%85%B7/' class="post_tag button button_translucent">
          版本管理工具
          <span class="button_tally">5</span>
        </a>
        
        <a href='https://ifunbox.top/categories/discuz/' class="post_tag button button_translucent">
          DISCUZ
          <span class="button_tally">4</span>
        </a>
        
        <a href='https://ifunbox.top/categories/shopnc/' class="post_tag button button_translucent">
          SHOPNC
          <span class="button_tally">3</span>
        </a>
        
        <a href='https://ifunbox.top/categories/thinkphp/' class="post_tag button button_translucent">
          THINKPHP
          <span class="button_tally">3</span>
        </a>
        
        <a href='https://ifunbox.top/categories/%E4%B8%AA%E4%BA%BA%E6%9D%82%E8%B0%88/' class="post_tag button button_translucent">
          个人杂谈
          <span class="button_tally">2</span>
        </a>
        
        <a href='https://ifunbox.top/categories/dedecms/' class="post_tag button button_translucent">
          DEDECMS
          <span class="button_tally">1</span>
        </a>
        
        <a href='https://ifunbox.top/categories/laravel/' class="post_tag button button_translucent">
          LARAVEL
          <span class="button_tally">1</span>
        </a>
        
        
      </nav>
    </div>
    <div>
      <h2 class="mt-4 taxonomy" id="tags-section">Tags</h2>
      <nav class="tags_nav">
        <a href='https://ifunbox.top/tags/linux/' class="post_tag button button_translucent">
          LINUX
          <span class="button_tally">9</span>
        </a>
        
        <a href='https://ifunbox.top/tags/nginx/' class="post_tag button button_translucent">
          NGINX
          <span class="button_tally">7</span>
        </a>
        
        <a href='https://ifunbox.top/tags/mysql/' class="post_tag button button_translucent">
          MYSQL
          <span class="button_tally">6</span>
        </a>
        
        <a href='https://ifunbox.top/tags/ssl/' class="post_tag button button_translucent">
          SSL
          <span class="button_tally">5</span>
        </a>
        
        <a href='https://ifunbox.top/tags/php/' class="post_tag button button_translucent">
          PHP
          <span class="button_tally">4</span>
        </a>
        
        <a href='https://ifunbox.top/tags/lua/' class="post_tag button button_translucent">
          LUA
          <span class="button_tally">2</span>
        </a>
        
        <a href='https://ifunbox.top/tags/html/' class="post_tag button button_translucent">
          HTML
          <span class="button_tally">1</span>
        </a>
        
        <a href='https://ifunbox.top/tags/hugo/' class="post_tag button button_translucent">
          HUGO
          <span class="button_tally">1</span>
        </a>
        
        <a href='https://ifunbox.top/tags/javascript/' class="post_tag button button_translucent">
          JAVASCRIPT
          <span class="button_tally">1</span>
        </a>
        
        <a href='https://ifunbox.top/tags/jenkins/' class="post_tag button button_translucent">
          JENKINS
          <span class="button_tally">1</span>
        </a>
        
        <a href='https://ifunbox.top/tags/laravel/' class="post_tag button button_translucent">
          LARAVEL
          <span class="button_tally">1</span>
        </a>
        
        <a href='https://ifunbox.top/tags/osx/' class="post_tag button button_translucent">
          OSX
          <span class="button_tally">1</span>
        </a>
        
        <a href='https://ifunbox.top/tags/vmware/' class="post_tag button button_translucent">
          VMWARE
          <span class="button_tally">1</span>
        </a>
        
        <a href='https://ifunbox.top/tags/wordpress/' class="post_tag button button_translucent">
          WORDPRESS
          <span class="button_tally">1</span>
        </a>
        
        
      </nav>
    </div>
  </section>
</aside>

</div>
    </main><svg width="0" height="0" class="hidden">
  <symbol viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="facebook">
    <path d="M437 0H75C33.648 0 0 33.648 0 75v362c0 41.352 33.648 75 75 75h151V331h-60v-90h60v-61c0-49.629 40.371-90 90-90h91v90h-91v61h91l-15 90h-76v181h121c41.352 0 75-33.648 75-75V75c0-41.352-33.648-75-75-75zm0 0"></path>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.001 18.001" id="twitter">
    <path d="M15.891 4.013c.808-.496 1.343-1.173 1.605-2.034a8.68 8.68 0 0 1-2.351.861c-.703-.756-1.593-1.14-2.66-1.14-1.043 0-1.924.366-2.643 1.078a3.56 3.56 0 0 0-1.076 2.605c0 .309.039.585.117.819-3.076-.105-5.622-1.381-7.628-3.837-.34.601-.51 1.213-.51 1.846 0 1.301.549 2.332 1.645 3.089-.625-.053-1.176-.211-1.645-.47 0 .929.273 1.705.82 2.388a3.623 3.623 0 0 0 2.115 1.291c-.312.08-.641.118-.979.118-.312 0-.533-.026-.664-.083.23.757.664 1.371 1.291 1.841a3.652 3.652 0 0 0 2.152.743C4.148 14.173 2.625 14.69.902 14.69c-.422 0-.721-.006-.902-.038 1.697 1.102 3.586 1.649 5.676 1.649 2.139 0 4.029-.542 5.674-1.626 1.645-1.078 2.859-2.408 3.639-3.974a10.77 10.77 0 0 0 1.172-4.892v-.468a7.788 7.788 0 0 0 1.84-1.921 8.142 8.142 0 0 1-2.11.593z"
      ></path>
  </symbol>
  <symbol aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="mail">
    <path  d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="calendar">
    <path d="M452 40h-24V0h-40v40H124V0H84v40H60C26.916 40 0 66.916 0 100v352c0 33.084 26.916 60 60 60h392c33.084 0 60-26.916 60-60V100c0-33.084-26.916-60-60-60zm20 412c0 11.028-8.972 20-20 20H60c-11.028 0-20-8.972-20-20V188h432v264zm0-304H40v-48c0-11.028 8.972-20 20-20h24v40h40V80h264v40h40V80h24c11.028 0 20 8.972 20 20v48z"></path>
    <path d="M76 230h40v40H76zm80 0h40v40h-40zm80 0h40v40h-40zm80 0h40v40h-40zm80 0h40v40h-40zM76 310h40v40H76zm80 0h40v40h-40zm80 0h40v40h-40zm80 0h40v40h-40zM76 390h40v40H76zm80 0h40v40h-40zm80 0h40v40h-40zm80 0h40v40h-40zm80-80h40v40h-40z"></path>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="github">
    <path d="M255.968 5.329C114.624 5.329 0 120.401 0 262.353c0 113.536 73.344 209.856 175.104 243.872 12.8 2.368 17.472-5.568 17.472-12.384 0-6.112-.224-22.272-.352-43.712-71.2 15.52-86.24-34.464-86.24-34.464-11.616-29.696-28.416-37.6-28.416-37.6-23.264-15.936 1.728-15.616 1.728-15.616 25.696 1.824 39.2 26.496 39.2 26.496 22.848 39.264 59.936 27.936 74.528 21.344 2.304-16.608 8.928-27.936 16.256-34.368-56.832-6.496-116.608-28.544-116.608-127.008 0-28.064 9.984-51.008 26.368-68.992-2.656-6.496-11.424-32.64 2.496-68 0 0 21.504-6.912 70.4 26.336 20.416-5.696 42.304-8.544 64.096-8.64 21.728.128 43.648 2.944 64.096 8.672 48.864-33.248 70.336-26.336 70.336-26.336 13.952 35.392 5.184 61.504 2.56 68 16.416 17.984 26.304 40.928 26.304 68.992 0 98.72-59.84 120.448-116.864 126.816 9.184 7.936 17.376 23.616 17.376 47.584 0 34.368-.32 62.08-.32 70.496 0 6.88 4.608 14.88 17.6 12.352C438.72 472.145 512 375.857 512 262.353 512 120.401 397.376 5.329 255.968 5.329z"></path>
  </symbol>
  <symbol viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="rss">
    <circle cx="3.429" cy="20.571" r="3.429"></circle>
    <path d="M11.429 24h4.57C15.999 15.179 8.821 8.001 0 8v4.572c6.302.001 11.429 5.126 11.429 11.428z"></path>
    <path d="M24 24C24 10.766 13.234 0 0 0v4.571c10.714 0 19.43 8.714 19.43 19.429z"></path>
  </symbol>
  <symbol viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="linkedin">
    <path d="M437 0H75C33.648 0 0 33.648 0 75v362c0 41.352 33.648 75 75 75h362c41.352 0 75-33.648 75-75V75c0-41.352-33.648-75-75-75zM181 406h-60V196h60zm0-240h-60v-60h60zm210 240h-60V286c0-16.54-13.46-30-30-30s-30 13.46-30 30v120h-60V196h60v11.309C286.719 202.422 296.93 196 316 196c40.691.043 75 36.547 75 79.688zm0 0"></path>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 612" id="arrow">
    <path d="M604.501 440.509L325.398 134.956c-5.331-5.357-12.423-7.627-19.386-7.27-6.989-.357-14.056 1.913-19.387 7.27L7.499 440.509c-9.999 10.024-9.999 26.298 0 36.323s26.223 10.024 36.222 0l262.293-287.164L568.28 476.832c9.999 10.024 26.222 10.024 36.221 0 9.999-10.023 9.999-26.298 0-36.323z"></path>
  </symbol>
  <symbol viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="carly">
    <path d="M504.971 239.029L448 182.059V84c0-46.317-37.682-84-84-84h-44c-13.255 0-24 10.745-24 24s10.745 24 24 24h44c19.851 0 36 16.149 36 36v108c0 6.365 2.529 12.47 7.029 16.971L454.059 256l-47.029 47.029A24.002 24.002 0 0 0 400 320v108c0 19.851-16.149 36-36 36h-44c-13.255 0-24 10.745-24 24s10.745 24 24 24h44c46.318 0 84-37.683 84-84v-98.059l56.971-56.971c9.372-9.372 9.372-24.568 0-33.941zM112 192V84c0-19.851 16.149-36 36-36h44c13.255 0 24-10.745 24-24S205.255 0 192 0h-44c-46.318 0-84 37.683-84 84v98.059l-56.971 56.97c-9.373 9.373-9.373 24.568 0 33.941L64 329.941V428c0 46.317 37.682 84 84 84h44c13.255 0 24-10.745 24-24s-10.745-24-24-24h-44c-19.851 0-36-16.149-36-36V320c0-6.365-2.529-12.47-7.029-16.971L57.941 256l47.029-47.029A24.002 24.002 0 0 0 112 192z"></path>
  </symbol>
  <symbol viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="copy">
    <path d="M23 2.75A2.75 2.75 0 0 0 20.25 0H8.75A2.75 2.75 0 0 0 6 2.75v13.5A2.75 2.75 0 0 0 8.75 19h11.5A2.75 2.75 0 0 0 23 16.25zM18.25 14.5h-7.5a.75.75 0 0 1 0-1.5h7.5a.75.75 0 0 1 0 1.5zm0-3h-7.5a.75.75 0 0 1 0-1.5h7.5a.75.75 0 0 1 0 1.5zm0-3h-7.5a.75.75 0 0 1 0-1.5h7.5a.75.75 0 0 1 0 1.5z"></path>
    <path d="M8.75 20.5a4.255 4.255 0 0 1-4.25-4.25V2.75c0-.086.02-.166.025-.25H3.75A2.752 2.752 0 0 0 1 5.25v16A2.752 2.752 0 0 0 3.75 24h12a2.752 2.752 0 0 0 2.75-2.75v-.75z"></path>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001" id="closeme">
    <path d="M284.286 256.002L506.143 34.144c7.811-7.811 7.811-20.475 0-28.285-7.811-7.81-20.475-7.811-28.285 0L256 227.717 34.143 5.859c-7.811-7.811-20.475-7.811-28.285 0-7.81 7.811-7.811 20.475 0 28.285l221.857 221.857L5.858 477.859c-7.811 7.811-7.811 20.475 0 28.285a19.938 19.938 0 0 0 14.143 5.857 19.94 19.94 0 0 0 14.143-5.857L256 284.287l221.857 221.857c3.905 3.905 9.024 5.857 14.143 5.857s10.237-1.952 14.143-5.857c7.811-7.811 7.811-20.475 0-28.285L284.286 256.002z"></path>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="open-menu">
    <path d="M492 236H20c-11.046 0-20 8.954-20 20s8.954 20 20 20h472c11.046 0 20-8.954 20-20s-8.954-20-20-20zm0-160H20C8.954 76 0 84.954 0 96s8.954 20 20 20h472c11.046 0 20-8.954 20-20s-8.954-20-20-20zm0 320H20c-11.046 0-20 8.954-20 20s8.954 20 20 20h472c11.046 0 20-8.954 20-20s-8.954-20-20-20z"></path>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="instagram">
    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id=youtube>
    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
  </symbol>
</svg>

<footer class="footer">
  <div class="footer_inner wrap pale">
    <img src='https://ifunbox.top/icons/apple-touch-icon.png' class="icon icon_2 transparent">
    <p>Copyright &copy;&nbsp;<span class="year">2020</span>&nbsp;FUNBOX的技术记事本. All Rights Reserved</p><a class="to_top" href="#documentTop">
  <svg class="icon">
  <use xlink:href="#arrow"></use>
</svg>
</a>

  </div>
</footer>
    <script type="text/javascript" src="https://ifunbox.top/js/bundle.min.c0652ae16e0c9ea2300f3f4296009baa05854c44fa9bd6d9b4f0fb04675c44d0ae6704ee99f30854d1a5c025fcd518e7b07fe95bf69b5e009284bf57df300b85.js" integrity="sha512-wGUq4W4MnqIwDz9ClgCbqgWFTET6m9bZtPD7BGdcRNCuZwTumfMIVNGlwCX81RjnsH/pW/abXgCShL9X3zALhQ==" crossorigin="anonymous"></script>
    
  </body>
</html>
