@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="mb-0">Response Trend Analysis</h3>
                                </div>
                                <div class="card-body">
                                    <form id="date-form">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-4">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Start Date</span>
                                                    <input type="date" class="form-control" id="start-date-input">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">End Date</span>
                                                    <input type="date" class="form-control" id="end-date-input">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <button type="button" id="submit-button"
                                                    class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <canvas id="statistic_respon"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($kuesioners as $kuesioner)
                        <div class="col-lg-12">
                            <div class="row">
                                <h3>Stats responden choices</h3>
                                @foreach ($kuesioner->questions as $question)
                                    @if ($question->type == 'multiple')
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong>{{ $loop->iteration }}.</strong> {{ $question->question }}
                                                </div>
                                                <div class="card-body">
                                                    <canvas id="questionStats-{{ $question->id }}"
                                                        data-question-id="{{ $question->id }}"
                                                        data-kuesioner-id="{{ $kuesioner->id }}"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Stats question choice
        $(document).ready(function() {
            $('canvas[id^="questionStats-"]').each(function() {
                var canvas = $(this);
                var kuesionerId = canvas.data('kuesioner-id');
                var questionId = canvas.data('question-id');
                $.ajax({
                    url: `{{ route('question.stats') }}?kuesioner_id=${kuesionerId}&question_id=${questionId}`,
                    type: 'GET',
                    data: {
                        kuesioner_id: kuesionerId,
                        question_id: questionId
                    },
                    dataType: 'json',
                    success: function(data) {
                        var ctx = canvas[0].getContext('2d');

                        // Proses data menjadi format yang diterima oleh Chart.js
                        var chartData = {
                            labels: data.choices,
                            datasets: [{
                                label: 'Responden Choice',
                                data: data.choices_count,
                                backgroundColor: 'rgba(255,99,132, 0.3)',
                                borderColor: 'rgba(255,99,132, 1)',
                                borderWidth: 1
                            }]
                        };

                        // Konfigurasi opsi grafik
                        var chartOptions = {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    stepSize: 1,
                                    max: Math.max(...data.choices_count) + 1,
                                }
                            }
                        };

                        // Membuat grafik menggunakan Chart.js
                        new Chart(ctx, {
                            type: 'bar',
                            data: chartData,
                            options: chartOptions
                        });
                    }
                });
            });
        });



        $(document).ready(function() {
            // Menangani klik tombol Submit
            $('#submit-button').click(function() {
                // Mendapatkan nilai start date dan end date
                var startDate = $('#start-date-input').val();
                var endDate = $('#end-date-input').val();
                $.ajax({
                    url: `{{ route('respon.stats') }}?kuesioner_id={{ $kuesioner->id }}&start_date=${startDate}&end_date=${endDate}`,
                    type: 'GET',
                    success: (data) => {
                        new Chart($("#statistic_respon")[0].getContext('2d'), {
                            type: 'line',
                            data: {
                                labels: data.date_range,
                                datasets: [{
                                    label: 'Responses Trend',
                                    data: data.respon_count,
                                    fill: false,
                                    borderColor: 'rgb(75, 192, 192)',
                                    tension: 0.1
                                }]

                            },
                            options: {}
                        });
                    }
                })
                console.log(startDate);
                console.log(endDate);
            });
        });
    </script>
@endsection
