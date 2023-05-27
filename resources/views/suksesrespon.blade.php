@extends('home.layouts.main')
@section('content')
    <div class="container text-dark">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="text-center">
                <img src="{{ asset('images/logo_simak_black.svg') }}" width="200">
                <h2 class="fw-bold">Thank you for completing the questionnaire!</h2>
                <p class="mb-5 text-secondary">Your responses have been recorded.</p>
                <p>Redirecting you to the home page in <span id="countdown"><strong>5</strong></span> seconds...</p>
            </div>
        </div>
    </div>
    <script>
        // Timer countdown
        var seconds = 5; // Number of seconds for the countdown
        var countdownElement = document.getElementById('countdown');

        function countdown() {
            countdownElement.textContent = seconds;
            seconds--;

            if (seconds < 0) {
                window.location.href = "{{ route('home.page') }}";
            } else {
                setTimeout(countdown, 1000); // Delay for 1 second (1000 milliseconds)
            }
        }

        countdown();
    </script>
@endsection
