@extends('admin.admin_template')

@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">							
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">New Customers</p>
                                <h3 class="text-white mb-0 font-weight-500">3400 <small class="text-success"><i class="fa fa-caret-up"></i> +2.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">							
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Sold Cars</p>
                                <h3 class="text-white mb-0 font-weight-500">3400 <small class="text-success"><i class="fa fa-caret-up"></i> +2.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">							
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Sales Lost</p>
                                <h3 class="text-white mb-0 font-weight-500">$1,250 <small class="text-danger"><i class="fa fa-caret-down"></i> -0.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">							
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Inbound Call</p>
                                <h3 class="text-white mb-0 font-weight-500">1,460 <small class="text-danger"><i class="fa fa-caret-up"></i> -1.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title align-items-start flex-column">
                                New Arrivals
                                <small class="subtitle">More than 400+ new members</small>
                            </h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <thead>
                                        <tr class="text-uppercase bg-lightest">
                                            <th style="min-width: 250px"><span class="text-white">products</span></th>
                                            <th style="min-width: 100px"><span class="text-fade">pruce</span></th>
                                            <th style="min-width: 100px"><span class="text-fade">deposit</span></th>
                                            <th style="min-width: 150px"><span class="text-fade">agent</span></th>
                                            <th style="min-width: 130px"><span class="text-fade">status</span></th>
                                            <th style="min-width: 120px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>										
                                            <td class="pl-0 py-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 mr-20">
                                                        <div class="bg-img h-50 w-50" style="background-image: url({{asset('backend/images/gallery/creative/img-1.jpg')}})"></div>
                                                    </div>

                                                    <div>
                                                        <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Vivamus consectetur</a>
                                                        <span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-fade font-weight-600 d-block font-size-16">
                                                    Paid
                                                </span>
                                                <span class="text-white font-weight-600 d-block font-size-16">
                                                    $45,800k
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-fade font-weight-600 d-block font-size-16">
                                                    Paid
                                                </span>
                                                <span class="text-white font-weight-600 d-block font-size-16">
                                                    $45k
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-fade font-weight-600 d-block font-size-16">
                                                    Sophia
                                                </span>
                                                <span class="text-white font-weight-600 d-block font-size-16">
                                                    Pharetra
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary-light badge-lg">Approved</span>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
                                                <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                            </td>
                                        </tr>
                                        <tr>										
                                            <td class="pl-0 py-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 mr-20">
                                                        <div class="bg-img h-50 w-50" style="background-image: url({{asset('backend/images/gallery/creative/img-3.jpg')}}"></div>
                                                    </div>

                                                    <div>
                                                        <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Vivamus consectetur</a>
                                                        <span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-fade font-weight-600 d-block font-size-16">
                                                    Paid
                                                </span>
                                                <span class="text-white font-weight-600 d-block font-size-16">
                                                    $45,800k
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-fade font-weight-600 d-block font-size-16">
                                                    Paid
                                                </span>
                                                <span class="text-white font-weight-600 d-block font-size-16">
                                                    $45k
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-fade font-weight-600 d-block font-size-16">
                                                    Sophia
                                                </span>
                                                <span class="text-white font-weight-600 d-block font-size-16">
                                                    Pharetra
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-success-light badge-lg">Success</span>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
                                                <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="col-12">
                    <div class="box overflow-hidden">
                        <div class="box-body p-0">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <div class="box no-shadow mb-0 rounded-0">
                                        <div class="box-header no-border">
                                            <h4 class="box-title mb-0">
                                                Last Posts
                                            </h4>
                                        </div>
                                        <div class="box-body p-0">
                                            <div class="media-list media-list-hover">
                                            <a class="media media-single hover-white" href="#">
                                            <div class="media-body">
                                                <h5>Meet Craftwork. Thoroghly Handpicked UI Freebies</h5>
                                            </div>
                                            </a>
                                            <a class="media media-single hover-white" href="#">
                                            <div class="media-body">
                                                <h5>Cook Design Right!</h5>
                                            </div>
                                            </a>
                                            <a class="media media-single hover-white" href="#">
                                            <div class="media-body">
                                                <h5>5 Reasons to Start Own Bussines</h5>
                                            </div>
                                            </a>
                                            <a class="media media-single hover-white" href="#">
                                            <div class="media-body">
                                                <h5>How to Make Interface</h5>
                                            </div>
                                            </a>
                                            <a class="media media-single hover-white" href="#">
                                            <div class="media-body">
                                                <h5>Show Me Your Design</h5>
                                            </div>
                                            </a>
                                            <a class="media media-single hover-white" href="#">
                                            <div class="media-body">
                                                <h5>She gave my mother such a turn, that I have always bee...</h5>
                                            </div>
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection