@extends('admin.layout')
@section('title', 'A-Loja - Dashboard')
@section('content')
    <nav class="red" style="height: 5em">
        <div class="nav-wrapper container">
            <a class="center brand-logo " href="{{ route('site.index') }}"><img src="{{ asset('img/logo.png') }}"
                    height="60px"></a>
            <ul class="right ">
                <li class="hide-on-med-and-down"><a href="#" onclick="fullScreen()"><i
                            class="material-icons">settings_overscan</i> </a> </li>
                <li><a href="#" class="dropdown-trigger" data-target='dropdown2'>Olá
                        {{ auth()->user()->name }} <i class="material-icons right">expand_more</i> </a></li>
            </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger left  show-on-large"><i
                    class="material-icons">menu</i></a>
        </div>
    </nav>


    <ul id="slide-out" class="sidenav ">
        <li>
            <div class="user-view">
                <div class="background red ">
                    <img src="{{ asset('img/office.jpg') }}" style="opacity: 0.5">
                </div>
                <a href="#user"><img class="circle" src="{{ asset('img/user.jpg') }}"></a>
                <a href="#name"><span class="white-text name">{{ Str::upper(auth()->user()->name) }}</span></a>
                <a href="#email"><span class="white-text email">{{ Str::upper(auth()->user()->email) }}</span></a>
            </div>
        </li>

        <li><a href="#!"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="#"><i class="material-icons">playlist_add_circle</i>Produtos</a></li>
        <li><a href="#!"><i class="material-icons">shopping_cart</i>Pedidos</a></li>
        <li><a href="#!"><i class="material-icons">bookmarks</i>Categorias</a></li>
        <li><a href="#!"><i class="material-icons">peoples</i>Utilizadores</a></li>
    </ul>

    <div class="row container">
        <section class="info">

            <div class="col s12 m4">
                <article class="bg-gradient-green card z-depth-4 ">
                    <i class="material-icons">payments</i>
                    <p>Faturamento</p>
                    <h3>AOA 123,00</h3>
                </article>
            </div>

            <div class="col s12 m4">
                <article class="bg-gradient-blue card z-depth-4 ">
                    <i class="material-icons">face</i>
                    <p>Utilizadores</p>
                    <h3>{{ $users }}</h3>
                </article>
            </div>

            <div class="col s12 m4">
                <article class="bg-gradient-orange card z-depth-4 ">
                    <i class="material-icons">shopping_cart</i>
                    <p>Pedidos este mês</p>
                    <h3>2</h3>
                </article>
            </div>

        </section>
    </div>


    <div class="row container ">
        <section class="graficos col s12 m6">
            <div class="grafico card z-depth-4">
                <h5 class="center"> Aquisição de usuários</h5>
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </section>

        <section class="graficos col s12 m6">
            <div class="grafico card z-depth-4">
                <h5 class="center"> Produtos </h5>
                <canvas id="myChart2" width="400" height="200"></canvas>
            </div>
        </section>
    </div>
@endsection

@push('graficos')
    <script>
        /* Gráfico 01 */
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Janeiro', 'Feveiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
                    'Outubro', 'Novembro', 'Dezembro'
                ],
                datasets: [{
                    label: '2020',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        /* Gráfico 02 */
        var ctx = document.getElementById('myChart2');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Facebook', 'Google', 'Instagram'],
                datasets: [{
                    label: 'Visitas',
                    data: [12, 19, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 159, 64)'
                    ]
                }]
            }
        });
    </script>
@endpush
