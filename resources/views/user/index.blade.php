@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Enter Your Name</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                </div>
                <button type="button" class="btn btn-primary btn-block mt-1" id="startBtn">Start Quiz</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#startBtn').on('click', function() {
            var name = $('#name').val();
            if (name !== '') {
                console.log(name)
                $.ajax({
                    url: '{{ route("quiz.start") }}',
                    type: 'POST',
                    data: {name: name},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            window.location.href = '/questions';
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('An error occurred while processing your request. Please try again later.');
                        console.log(xhr);
                    }
                });
            } else {
                alert('Please enter your name.');
            }
        });
    });
</script>
@endpush
