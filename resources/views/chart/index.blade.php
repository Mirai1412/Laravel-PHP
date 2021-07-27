<x-app-layout>
<html lang="en">
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>

    </head>
    <style>
               .min-h-screen {
                    width: 1200px;
                    margin: 0 auto;
                }
                .max-w-7xl {
                    width: 1200px;
                    margin: 0 auto;
                }
                .hidden {
                width: 740px;
            }
    </style>
    <body>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"
            style="text-align: center">
                {{ __('게시글 작성 현황') }}
            </h2>
        </x-slot>
        <canvas id="myChart" width="400" height="400"></canvas>
        <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [       @foreach($postusers as $postuser)'{{ $postuser->post->title }}',
                        @endforeach],
                datasets: [{
                    label: '# of Votes',
                    data: [     @foreach($postusers as $postuser){{ $postuser -> cnt }},
                                @endforeach],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>

    </body>
</x-app-layout>
