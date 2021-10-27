@extends('admin.admin_template')
@section('admin')

<div class="container-full">
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Users Reviews<span class="badge badge-success badge-pill"> {{ count($reviews) }}</h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Summary</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td class="col-md-2"><b style="color: #fff;">{{ $review->user->name }}</b></td>
                                            <td>{{ $review->product->product_name_en }}</td>
                                            <td>{{ $review->summary }}</td>
                                            <td>{{ $review->comment }}</td>
                                            
                                            {{-- Action --}}
                                            <td class="text-center">
                                                @if($review->status == 0)
                                                    <a href="{{ route('review.aprove', $review->id) }}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                                @else
                                                    <span class="badge badge-info">Aproved</span>
                                                @endif
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
    </section>
</div>

@endsection