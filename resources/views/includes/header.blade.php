<!--NAVBAR-->
<link rel="stylesheet" href="{{ asset('css/css_header.css') }}">
    <!--NAVBAR-->
  <div id="section1">
  <nav class="navbar sticky-top navbar-dark bg-dark">
        <div class="logo-container col-auto">
          <a href="{{url('/home')}}" id="logo">
            <img src="images\Brand__Brand.jpg" width="200" height="40" alt="Brand&Brand logo" class="logo" >
          </a>
        </div>
      <div class="sb-example-1">
         <div class="search">
            <input type="text" class="searchTerm" placeholder="Pesquisar...">
            <button type="submit" class="searchButton">
              <i class="fa fa-search"></i>
           </button>
         </div>
      </div>
        <div class="login-container">
          <form action="">
            <a href="{{url('/login')}}" class="action-popup login-links-holder_link" id="login_link">
            Login |
            </a>
            <a href="{{url('/registo')}}" class="action-popup login-links-holder_link" id="lregister_link">
            Cria Conta
            </a>
          </form>
        </div>
      </div>
    </nav>
  </div>
  
  <!--NAVBAR-->
  <div class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" id="section2">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Suplementação
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{url('/login')}}">Proteína</a>
          <a class="dropdown-item" href="{{url('/login')}}">Desenvolvimento Muscular </a>
          <a class="dropdown-item" href="{{url('/login')}}">Energia e Resistência </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Acessórios</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Vestuário Desportivo
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{url('/login')}}">Equipamento de Treino</a>
          <a class="dropdown-item" href="{{url('/login')}}">Malas</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Dicas nuticionais e mitos</a>
      </li>
    </ul>
  </div>
</div>
  