@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              <h1 class="text-center">Quiz</h1>
            </div>
            <div class="card-body">
              <div class="quiz-question"></div>
              <div class="mt-4">
                <div class="quiz-options form-check mb-3">
                  <input class="form-check-input" type="radio" name="option" id="option1" value="">
                  <label class="form-check-label" for="option1">
                    <span></span>
                  </label>
                </div>
                <div class="quiz-options form-check mb-3">
                  <input class="form-check-input" type="radio" name="option" id="option2" value="">
                  <label class="form-check-label" for="option2">
                    <span></span>
                  </label>
                </div>
                <div class="quiz-options form-check mb-3">
                  <input class="form-check-input" type="radio" name="option" id="option3" value="">
                  <label class="form-check-label" for="option3">
                    <span></span>
                  </label>
                </div>
                <div class="quiz-options form-check mb-3">
                  <input class="form-check-input" type="radio" name="option" id="option4" value="">
                  <label class="form-check-label" for="option4">
                    <span></span>
                  </label>
                </div>
              </div>
              <div class="quiz-controls mt-4">
                <button class="btn btn-primary" id="quiz-submit-btn">Submit</button>
                <button class="btn btn-secondary" id="quiz-skip-btn">Skip</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        loadQuestion();
        
        $("#quiz-submit-btn").click(function() {
            var selectedOption = $("input[name='option']:checked").val();
            if (selectedOption === undefined) {
                alert("Please select an option.");
                return;
            }
            
            var data = {
                'question_id': $(".quiz-question").attr("data-question-id"),
                'answer_id': selectedOption
            };

            $.ajax({
                type: 'POST',
                url: "{{ route('question.answer') }}",
                data: data,
                dataType: 'json',
                success: function(data) {
                    if (data.status === 'success') {
                        loadQuestion();
                    } else {
                        alert(data.message);
                    }
                }
            });
        });
        
        $("#quiz-skip-btn").click(function() {
            var data = {
                'question_id': $(".quiz-question").attr("data-question-id")
            };
            
            $.ajax({
                type: 'POST',
                url: "{{ route('question.skip') }}",
                data: data,
                dataType: 'json',
                success: function(data) {
                    if (data.status === 'success') {
                        loadQuestion();
                    } else {
                        alert(data.message);
                    }
                }
            });
        });
        
        function loadQuestion() {
            $(".quiz-options input[type='radio']").prop("checked", false);

            $.ajax({
                type: 'GET',
                url: "{{ route('loadQuestion') }}",
                dataType: 'json',
                success: function(data) {
                  if (data.status === 'success') {
                    $(".quiz-question").html(data.question.question);
                    $(".quiz-question").attr("data-question-id", data.question.id);
                    var options = data.question.answers;
                      for (var i = 0; i < options.length; i++) {
                          var option = options[i];
                          var optionElem = $(".quiz-options").eq(i);
                          optionElem.find("span").html(option.answer);
                          optionElem.find("input").val(option.id);
                      }
                    } else if(data.status === 'finished'){
                        window.location.href = "{{ route('question.results') }}";
                    } else {
                        alert(data.message);
                    }
                   
                },
                error: function(err, msg) {
                    console.log(err, msg);
                }
            });

            $(".quiz-option input[type='radio']").prop("checked", false);
            $("#quiz-submit-btn").prop("disabled", true);
        }

        $(".quiz-options").on("change", "input[name='option']", function() {
            $("#quiz-submit-btn").prop("disabled", false);
        });


    });
</script>
@endpush
