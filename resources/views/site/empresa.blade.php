<!-- Usendo BLADE --><span>Meu nome é {{$nome}} e {{$html}}</span>
<br>
<!-- Sem o BLADE --><span>Meu nome é <?=$nome?> e <?= $html?></span>

<!-- para renderizar o html usando o blade -->  {!! $html !!}