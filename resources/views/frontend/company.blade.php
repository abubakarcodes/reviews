@extends('frontend.layouts.master')
@section('meta-tags')
    @php
        $meta_title = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit';
        $meta_description = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit';
        $h1 = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit';
        $page_url = route('home');
    @endphp
    @include('frontend.layouts.inc.meta-tags')
@endsection
@section('title', $meta_title)
@section('content')
    <h1 class="fw-semibold mt-5 text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit</h1>

    <div class="bg-theme mt-5 py-2">
        <h2 class="text-center">{{ $company?->name }} Reviews</h2>
    </div>
    <div class="container mt-4">
        <div class="d-flex justify-content-end">
            <select name="" id="sortingField" class="form-select w-25">
                <option value="">Sort</option>
                <option value="name">Name</option>
                <option value="group">Group</option>
                <option value="date">Date</option>
                <option value="overall">Overall</option>
            </select>
        </div>
        <div class="row mt-2" id="sortedResults">
            @php
                $reviews = $company
                    ?->reviews()
                    ->approved()
                    ->get();
            @endphp
            @include('frontend.layouts.inc._reviews', [
                'reviews' => $reviews,
            ])
        </div>
    </div>
@endsection
@push('js')
    <script>
        let reviews = {{ \Illuminate\Support\Js::from($reviews) }};

        function sortRecordsBy(propertyName) {
            return function(a, b) {
                var valueA = a[propertyName];
                var valueB = b[propertyName];

                if (propertyName === 'date') {
                    valueA = new Date(valueA);
                    valueB = new Date(valueB);
                } else if (propertyName === 'overall') {
                    valueA = Number(valueA);
                    valueB = Number(valueB);
                }
                if (valueA < valueB) {
                    return -1;
                }
                if (valueA > valueB) {
                    return 1;
                }

                return 0; // Values are equal
            };
        }

        let sortingField = document.querySelector('#sortingField');
        sortingField?.addEventListener('change', (e) => {
            let sortBy = e.target.value;
            if (sortBy === 'name') {
                reviews.sort(sortRecordsBy('manager'));
            } else if (sortBy === 'overall') {
                reviews.sort(sortRecordsBy('overall'));
            } else if (sortBy === 'date') {
                reviews.sort(sortRecordsBy('date'));
            } else if (sortBy === 'group') {
                reviews.sort(sortRecordsBy('group1'));
            }
            let response = '';
            reviews?.forEach(review => {
                response += `<div class="col-12 col-md-6 pe-md-5">
                    <h2>${ review.manager }</h2>
                    <p>
                        <span class="fw-semibold">Company: </span>${review?.company?.name}
                        <span class="fw-semibold">Group: </span>${review.group1 !== null ? review.group1 : '' }${review.group2 !== null ?  ', ' + review.group2 : '' }${review.group3 !== null ?  ', ' + review.group3 : '' }
                        <span class="fw-semibold">City: </span>${review.city1 !== null ?   review.city1 : '' }${review.city2 !== null ? ', ' +  review.city2 : '' }${review.city3 !== null ? ', ' +  review.city3 : '' }
                        <span class="fw-semibold">Date: </span>${ new Date(review?.created_at).toLocaleDateString('en-US') }
                        <br>
                        <span class="fw-semibold">Communication: </span>${ review?.communication }
                        <span class="fw-semibold">Professionalisim: </span>${ review.professionalism }
                        <span class="fw-semibold">Expertise: </span>${review.expertise}
                        <span class="fw-semibold">Overall: </span>${review.overall}
                    </p>
                    <p class="mt-3">
                        "${review.review}"
                    </p>
                    <p class="mt-3">
                        "${review.discussion}"
                    </p>
                    ${review.response !== null ? `<p class="fst-italic mt-3">
                        <b>Manager Response: </b>"${review.response}"
                    </p>` : ''}

                    <hr>
                </div>`;
            });
            document.querySelector('#sortedResults').innerHTML = response;
        });
    </script>
@endpush
