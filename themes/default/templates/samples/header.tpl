{doc_info DOCTYPE="HTML" LEVEL="5"}
{doc_info html="en" lang="en"}
{doc_info meta="language" content="ru-RU"}     
{doc_info meta="" http_equiv="Content-Type" content="text/html; charset=utf-8"}        
{doc_info title=$site->title|default:''}
{doc_info meta="description" content=$site->description|default:''}
{doc_info meta="keywords" content=$site->keywords|default:''}  
{doc_info meta="robots" content=$site->robots|default:'index,follow'}   
{doc_info meta="revisit-after" content="1 days"}
{doc_info meta="generator" content="Kohana framework"}
{doc_info meta="viewport" content="width=device-width, initial-scale=1.0"}
{doc_info link="$path_web/favicon.ico" rel="shortcut icon" type="image/x-icon"} 
{doc_info code=$js->jquery.link}
{*doc_info code=$js->jquery_ui.link*}  
{*doc_info code=$js->templates.link*}  
{doc_info code='http://html5shim.googlecode.com/svn/trunk/html5.js' comment="lt IE 9"}
{doc_info code='bootstrap.min.js'}
{doc_info code='home.index.js'}
{doc_info link="$path_theme/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"}
{doc_info link="$path_theme/style.css" rel="stylesheet" type="text/css" media="all"}

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse">
            <ul class="nav">
               <li><a href="/">Начало</a></li>
            </ul>
          {if $this->user}
          	<ul class="nav pull-right">
            <li class="divider-vertical"></li>
            <li class="dropdown">
    
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{$this->u_user->photo}" width="20" height="20" alt="" />
              {$this->user->username} <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/account/">Личный кабинет</a></li>
                <li><a href="/admin/">Админка</a></li>  
                <li><a href="/user/logout">Выход</a></li>
              </ul>
            </li>
          </ul>

          {else}
         
           {* <div class="ulogin pull-right" style="padding-top:2px;">          
                {$ulogin}
            </div>    *}
            <div class="nav ulogin pull-right" {*style="padding-top:2px;"*}>          
                {*$ulogin*}<li><a href="#openidModal" role="button" data-toggle="modal">Войти</a></li>
            </div>
          {/if}
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>  

    <div class="container">
        <div class="content">