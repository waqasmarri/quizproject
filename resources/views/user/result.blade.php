@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Results') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">{{ __('Total questions') }}</div>
                        <div class="col-md-6">{{ $totalQuestions }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Correct answers') }}</div>
                        <div class="col-md-6">{{ $correctAnswers }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Wrong answers') }}</div>
                        <div class="col-md-6">{{ $wrongAnswers }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Skipped questions') }}</div>
                        <div class="col-md-6">{{ $skippedQuestions }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
