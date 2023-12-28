@extends('admin.layout')
@section('title', 'A-Loja - Dashboard')
@section('content')
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
                <h5 class="center"> {{ $userLabel }}</h5>
                <canvas id="usersChart" width="400" height="200"></canvas>
            </div>
        </section>

        <section class="graficos col s12 m6">
            <div class="grafico card z-depth-4">
                <h5 class="center"> {{ $productLabel }}</h5>
                <canvas id="productoChart" width="400" height="200"></canvas>
            </div>
        </section>
    </div>

@endsection

@push('graficos')
    <script>
        /* Gráfico 01 */
        var ctx = document.getElementById('usersChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['', {!! $userMes !!}, ''],
                datasets: [{
                    label: {{ date('Y') }},
                    data: [, {{ $userTotals }}, ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 159, 164, 1)',
                        'rgba(255, 159, 166, 1)',
                        'rgba(255, 159, 36, 1)',
                        'rgba(255, 19, 66, 1)',
                        'rgba(255, 159, 166, 1)',
                        'rgba(255, 219, 66, 1)',
                        'rgba(255, 149, 66, 1)',
                        'rgba(255, 139, 66, 1)',
                        'rgba(255, 139, 166, 1)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                }],
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
        var ctx = document.getElementById('productoChart');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [{!! $productCat !!}],
                datasets: [{
                    label: 'Valores',
                    data: [{{ $productTotals }}],
                    /* para ele gerar as cores automaticamente */
                    backgroundColor: myChart.getDatasetMeta(0).controller.getStyle().backgroundColor
                }]
            }
        });
    </script>
@endpush
