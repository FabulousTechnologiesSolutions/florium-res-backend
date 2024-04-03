<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content radius-style">
            <h3 class="text-dark bg-prpl rd1 py-3 text-center">Rate Us</h3>
            <div class="modal-body">
                @if (auth()->user())
                <form action="{{ route('sendreview') }}" method="POST">
                    @csrf
                    @php
                    $userid = auth()->id();
                    @endphp
                    <input type="number" name="userid" hidden readonly value="{{ $userid }}">
                    <div class="star-rating light-grey-bg rounded-3 px-3 mt-3">
                        <input type="radio" id="star5" name="rating" value="5">
                        <label for="star5"></label>
                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4"></label>
                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3"></label>
                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2"></label>
                        <input type="radio" id="star1" name="rating" value="1">
                        <label for="star1"></label>
                    </div>

                    <input type="number" hidden id="ratingInput" name="ratingInput" min="1" max="5" required>
                    <div class="mt-3">
                        <textarea name="msg" id="" rows="5" class="form-control shadow-none h-100 light-grey-bg"
                            placeholder="Write here"></textarea>
                    </div>
                    <div class="mt-3 text-end">
                        <input type="submit" value="Add" class="rounded-3 main-bg text-dark border-0 px-5 py-2">
                    </div>
                </form>
                @else
                <p class="text-danger">In order to submit a review, Login first</p>
                @endif
            </div>

        </div>
    </div>
</div>
<script>
    var ratingInput = document.getElementById("ratingInput");
    var radioButtons = document.querySelectorAll('input[type="radio"][name="rating"]');
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('click', function() {
            ratingInput.value = this.value;
        });
    });
</script>