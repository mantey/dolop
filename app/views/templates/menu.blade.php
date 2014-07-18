<nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Navegação</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">CMS</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li class="@if (Route::currentRouteNamed('home')) active @endif"><a href="{{ url('') }}">Home</a></li>
              <li class="dropdown @if (Route::currentRouteNamed('listArticles') OR Route::currentRouteNamed('insertArticle') OR Route::currentRouteNamed('editArticle')) active @endif">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Artigos <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="{{ url('articles') }}">Lista</a></li>
                      <li><a href="{{ url('articles/insert') }}">Adicionar</a></li>
                  </ul>
              </li>
              <li class="dropdown @if (Route::currentRouteNamed('addTask') OR Route::currentRouteNamed('listTasks')) active @endif">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tarefas <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="{{ url('tasks') }}">Lista</a></li>
                      <li><a href="{{ url('tasks/add') }}">Adicionar</a></li>
                  </ul>
              </li>			  
          </ul>
      </div>
    </div>
</nav>