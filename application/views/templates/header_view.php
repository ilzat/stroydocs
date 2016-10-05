<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="<?=@$meta_description?>"/>
    <meta name="keywords" content="<?=@$meta_keywords?>"/>
    <meta name="author" content="Ilzat Sitdikov"/>
    <meta name='yandex-verification' content='47b5a659ddcbec1b' />
    <title><?=@$window_title?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
    <link rel="stylesheet" href="<?=base_url();?>lte/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
    <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>-->
    <link rel="stylesheet" href="<?=base_url();?>lte/css/AdminLTE.min.css"/>
    <link rel="stylesheet" href="<?=base_url();?>lte/css/skins/skin-blue.min.css"/>
    <link rel="stylesheet" href="<?=base_url();?>web/css/style.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter23647546 = new Ya.Metrika({
                    id:23647546,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/23647546" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="<?=base_url();?>" class="logo">
          <span class="logo-mini"><b>S</b>D</span>
          <span class="logo-lg"><b>STROY</b>DOCS</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu hidden-xs" style="float: left;">
            <ul class="nav navbar-nav">
              <li class="messages-menu">
                <a rel="nofollow" href="/pages/pto">
                  <!--
<span class="badge bg-red" style="font-size: 14px;">Ты менеджер проекта (инженер ПТО)?</span>
-->
                </a>
              </li>
            </ul>
          </div>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Опросы">
                  <i class="fa  fa-question"></i>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <ul class="menu" style="font-weight: bold;">
                      <li>
                        <a href="<?=base_url()?>pages/poll/required_service">Какой новый сервис Вам нужен?</a>
                      </li>
                      <li>
                        <a href="<?=base_url()?>pages/poll/rating_service">Оценка существующих сервисов</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="dropdown messages-menu">
                <a href="<?=base_url();?>downloads" title="Файлы"><i class="fa fa-file-archive-o"></i></a>
              </li>
              <li class="dropdown messages-menu">
                <a href="<?=base_url();?>pages/news" title="Новости"><i class="fa fa-newspaper-o"></i></a>
              </li>
              <li class="dropdown notifications-menu hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  CTRL + D
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <ul class="menu" style="font-weight: bold; text-align: center;">
                      <li>
                        <a href="#"><i class="fa fa-star-o"></i></a>
                      </li>
                      <li>
                        <a href="#">Добавить в закладки браузера</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>