@extends('components.master')
@section('content')
    <div class="px-6 pt-2 2xl:container">
        <header aria-label="Page Header">
            <div class="py-8 sm:pb-12">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div class="text-center sm:text-left">
                        <h1 class="text-2xl font-bold dark:text-white text-gray-900 sm:text-3xl">
                            Welkom Terug, {{ auth()->user()->name }}!
                        </h1>

                        <p class="mt-1.5 text-sm text-gray-500">
                            Bekijk hier alle beschikbare data! 🎉
                        </p>
                    </div>

                    <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
                        <button
                            class="inline-flex items-center justify-center rounded-lg border border-gray-200 bg-gray-300 px-5 py-3 text-gray-900 transition hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:ring"
                            type="button">
                            <span class="text-sm font-medium"> Bekijk Website </span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1.5 h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </button>

                        {{-- <button
                            class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring"
                            type="button">
                            Create Post
                        </button> --}}
                    </div>
                </div>
            </div>
        </header>

        <div class="flex gap-6">
            <div class="flex w-1/3 items-center p-4 bg-gray-50 border-gray-200 border-2 rounded-2xl">
                <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                    <svg class="w-6 h-6 fill-current text-green-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex-grow flex flex-col ml-4">
                    <span class="text-xl font-bold">$8,430</span>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">Revenue last 30 days</span>
                        <span class="text-green-500 text-sm font-semibold ml-2">+12.6%</span>
                    </div>
                </div>
            </div>

            <div class="flex w-1/3 items-center p-4 bg-gray-50 border-gray-200 border-2 rounded-2xl">
                <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                    <svg class="w-6 h-6 fill-current text-green-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex-grow flex flex-col ml-4">
                    <span class="text-xl font-bold">$8,430</span>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">Revenue last 30 days</span>
                        <span class="text-green-500 text-sm font-semibold ml-2">+12.6%</span>
                    </div>
                </div>
            </div>

            <div class="flex w-1/3 items-center p-4 bg-gray-50 border-gray-200 border-2 rounded-2xl">
                <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                    <svg class="w-6 h-6 fill-current text-green-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex-grow flex flex-col ml-4">
                    <span class="text-xl font-bold">$8,430</span>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">Revenue last 30 days</span>
                        <span class="text-green-500 text-sm font-semibold ml-2">+12.6%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
        integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script>
        const chartOptions = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            tooltips: {
                enabled: false,
            },
            elements: {
                point: {
                    radius: 0
                },
            },
            scales: {
                xAxes: [{
                    gridLines: false,
                    scaleLabel: false,
                    ticks: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: false,
                    scaleLabel: false,
                    ticks: {
                        display: false,
                        suggestedMin: 0,
                        suggestedMax: 10
                    }
                }]
            }
        };

        var chart = new Chart("chart2", {
            type: "line",
            data: {
                labels: [1, 2, 1, 3, 5, 4, 7],
                datasets: [{
                        backgroundColor: "rgba(101, 116, 205, 0.0)",
                        borderColor: "rgba(38, 214, 88, 0.8)",
                        borderWidth: 2,
                        data: [2, 8, 6, 4, 3, 6, 9],
                    },
                    {
                        backgroundColor: "rgba(101, 116, 205, 0.0)",
                        borderColor: "rgba(101, 116, 205, 0.8)",
                        borderWidth: 2,
                        data: [4, 2, 1, 3, 5, 4, 7],
                    },

                ],
            },
            options: chartOptions
        });

        var chart = new Chart("chart3", {
            type: "line",
            data: {
                labels: [1, 2, 1, 3, 5, 4, 7],
                datasets: [{
                        backgroundColor: "rgba(101, 116, 205, 0.0)",
                        borderColor: "rgba(101, 116, 205, 0.8)",
                        borderWidth: 2,
                        data: [4, 2, 1, 3, 5, 4, 7],
                    },

                ],
            },
            options: chartOptions
        });

        var chart = new Chart("chart4", {
            type: "line",
            data: {
                labels: [1, 2, 1, 3, 5, 4, 7],
                datasets: [{
                    backgroundColor: "rgba(101, 116, 205, 0.0)",
                    borderColor: "rgba(38, 214, 88, 0.8)",
                    borderWidth: 2,
                    data: [2, 8, 6, 4, 3, 6, 9],
                }, ],
            },
            options: chartOptions
        });

        var xValues = [50, 60, 70, 80, 90, 100, 110];
        var yValues = [1, 2, 1, 3, 5, 4, 7];
        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    backgroundColor: "rgba(212, 33, 254, 0.1)",
                    borderColor: "rgba(212, 33, 254, 0.8)",
                    data: yValues
                }]
            },
            options: chartOptions
        });
    </script>
@endsection
