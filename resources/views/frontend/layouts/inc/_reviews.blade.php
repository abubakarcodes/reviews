@foreach ($reviews as $review)
    <div class="col-12 col-md-6 pe-md-5">
        <h2>{{ $review->manager }}</h2>
        <p>
            <span class="fw-semibold">Company: </span> {{ $review?->company?->name }}
            <span class="fw-semibold">Group: </span>{{ !empty($review->group1) ? $review->group1 : '' }}{{ !empty($review->group2) ? ', ' . $review->group2 : '' }}{{ !empty($review->group3) ? ', ' . $review->group3 : '' }}
            <span class="fw-semibold">City: </span>{{ !empty($review->city1) ? $review->city1 : '' }}{{ !empty($review->city2) ? ', ' . $review->city2 : '' }}{{ !empty($review->city3) ? ', ' . $review->city3 : '' }}
            <span class="fw-semibold">Date: </span>{{ $review->created_at?->format('n/j/Y') }}
            <br>
            <span class="fw-semibold">Communication: </span>{{ $review->communication }}
            <span class="fw-semibold">Professionalisim: </span>{{ $review->professionalism }}
            <span class="fw-semibold">Expertise: </span>{{ $review->expertise }}
            <span class="fw-semibold">Overall: </span>{{ $review->overall }}
        </p>

        <p class="mt-3">
            "{{ $review->review }}"
        </p>
        <p class="mt-3">
            "{{ $review->discussion }}"
        </p>
        @if (!empty($review->response))
            <p class="fst-italic mt-3">
                <b>Manager Response:</b> "{{ $review->response }}"
            </p>
        @endif
        <hr>
    </div>
@endforeach
