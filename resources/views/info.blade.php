@extends('layouts.app')

@section('title')
Laravel Programming Lab. | Info Page
@endsection

@section('content')
<div id="section1">
<br><br><br>
<h2>Quem Somos?</h2>
<p>
Somos uma instituição de renome no que toca ao mercado de suplementação e vestuário desportivo. No que toca à atividade desportiva e a sua suplementação, temos a melhor equipa de personal trainers e nutricionistas connosco. Toda a nossa gama de produtos nutricionais é testada rigorosamente por um laboratório com reconhecimento científico. Somos empenhados em fazer sobressair o melhor de um atleta para que ele tenha o mais alto rendimento possível para alcançar o impensável. Somos dedicados e focados. Somos persistentes.  Somos Brand & Brand.
</p>
</div>
<br><br><br>
<div id="section2">
<br><br><br>
<h2>Contactos:</h2>
<p>
Email:xxxxxx@gmail.com
Telefone: 91xxxxxxx;
</p>
</div><br><br><br>
<div id="section3">
<br><br><br>
<h2>Ajuda - FAQ's</h2>
<p>
1-Como criar a conta<br>
2-Formas de pagamento<br>
3-Quanto tempo demora a encomenda a chegar ao destino<br>
</p>
</div>
<br>
@endsection

@section('footer')
@include('includes.footer') 
@endsection('footer')