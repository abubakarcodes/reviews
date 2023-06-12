@extends('backend.layouts.master')
@section('content')

    <div class="card">
        <div class="row justify-content-end">
            <a href="{{ route('admin.review.create') }}" class="btn btn-primary mr-3 mt-3">Create Review</a>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                @include('backend.layouts.inc.common.messages')
            </div>
        </div>
        <div class="card-header">
            <h3 class="card-title">Reviews</h3>

        </div>
        <div class="card-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="true">Pending Reviews <span
                            class="text-capitalize badge badge-pill badge-primary">{{ count($pendingReviews) }}</span></a>
                    <a class="nav-item nav-link" id="nav-approved-tab" data-toggle="tab" href="#nav-approved" role="tab" aria-controls="nav-approved" aria-selected="false">Approved <span
                            class="text-capitalize badge badge-pill badge-primary">{{ count($approvedReviews) }}</span></a>

                </div>
            </nav>
            <div class="tab-content w-100" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                    <div class="table-responsive mt-5">
                        <table class="table-breviewed w-100 table" id="myDataTable">
                            <thead>
                                <tr>
                                    <td>manager</td>
                                    <td>Company</td>
                                    <td>group1</td>
                                    <td>group2</td>
                                    <td>group3</td>
                                    <td>city1</td>
                                    <td>city2</td>
                                    <td>city3</td>
                                    <td>review</td>
                                    <td>discussion</td>
                                    <td>response</td>
                                    <td>communication</td>
                                    <td>professionalism</td>
                                    <td>expertise</td>
                                    <td>overall</td>
                                    <td>Created At</td>
                                    <td>Status</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendingReviews as $review)
                                    <tr>
                                        <td>{{ $review->manager }}</td>
                                        <td>{{ $review->company?->name }}</td>
                                        <td>{{ $review->group1 }}</td>
                                        <td>{{ $review->group2 }}</td>
                                        <td>{{ $review->group3 }}</td>
                                        <td>{{ $review->city1 }}</td>
                                        <td>{{ $review->city2 }}</td>
                                        <td>{{ $review->city3 }}</td>
                                        <td>{{ $review->review }}</td>
                                        <td>{{ $review->discussion }}</td>
                                        <td>{{ $review->response }}</td>
                                        <td>{{ $review->communication }}</td>
                                        <td>{{ $review->professionalism }}</td>
                                        <td>{{ $review->expertise }}</td>
                                        <td>{{ $review->overall }}</td>
                                        <td>{{ $review->created_at->toDayDateTimeString() }}</td>
                                        <td>
                                            <span class="text-capitalize badge {{ $review?->isApproved ? 'badge-success' : 'badge-primary' }}">{{ $review?->isApproved ? 'Approved' : 'Pending' }}</span>
                                        </td>
                                        <td class="d-flex">
                                            <form action="{{ route('admin.toggleReviewApprove', $review) }}" method="POST">
                                                @csrf
                                                @if ($review->isApproved)
                                                    <button class="btn btn-sm btn-danger mr-1">Disapprove</button>
                                                @else
                                                    <button class="btn btn-sm btn-success mr-1">Approve</button>
                                                @endif

                                            </form>
                                            <a href="{{ route('admin.review.edit', $review->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{ route('admin.review.destroy', $review?->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are You sure To Delete?')" type="submit" class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-approved" role="tabpanel" aria-labelledby="nav-approved-tab">
                    <div class="table-responsive mt-5">
                        <table class="table-breviewed w-100 table" id="myDataTable2">
                            <thead>
                                <tr>
                                    <td>manager</td>
                                    <td>Company</td>
                                    <td>group1</td>
                                    <td>group2</td>
                                    <td>group3</td>
                                    <td>city1</td>
                                    <td>city2</td>
                                    <td>city3</td>
                                    <td>review</td>
                                    <td>discussion</td>
                                    <td>response</td>
                                    <td>communication</td>
                                    <td>professionalism</td>
                                    <td>expertise</td>
                                    <td>overall</td>
                                    <td>Created At</td>
                                    <td>Status</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approvedReviews as $review)
                                    <tr>
                                        <td>{{ $review->manager }}</td>
                                        <td>{{ $review->company?->name }}</td>
                                        <td>{{ $review->group1 }}</td>
                                        <td>{{ $review->group2 }}</td>
                                        <td>{{ $review->group3 }}</td>
                                        <td>{{ $review->city1 }}</td>
                                        <td>{{ $review->city2 }}</td>
                                        <td>{{ $review->city3 }}</td>
                                        <td>{{ $review->review }}</td>
                                        <td>{{ $review->discussion }}</td>
                                        <td>{{ $review->response }}</td>
                                        <td>{{ $review->communication }}</td>
                                        <td>{{ $review->professionalism }}</td>
                                        <td>{{ $review->expertise }}</td>
                                        <td>{{ $review->overall }}</td>
                                        <td>{{ $review->created_at->toDayDateTimeString() }}</td>
                                        <td>
                                            <span class="text-capitalize badge {{ $review?->isApproved ? 'badge-success' : 'badge-primary' }}">{{ $review?->isApproved ? 'Approved' : 'Pending' }}</span>
                                        </td>
                                        <td class="d-flex">
                                            <form action="{{ route('admin.toggleReviewApprove', $review) }}" method="POST">
                                                @csrf
                                                @if ($review->isApproved)
                                                    <button class="btn btn-sm btn-danger mr-1">Disapprove</button>
                                                @else
                                                    <button class="btn btn-sm btn-success mr-1">Approve</button>
                                                @endif

                                            </form>
                                            <a href="{{ route('admin.review.edit', $review->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{ route('admin.review.destroy', $review?->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are You sure To Delete?')" type="submit" class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
@push('scripts')
    <script>
        $('#myDataTable2,#myDataTable3,#myDataTable4').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'print'
            ]
        });
    </script>
@endpush
