
@extends("admin.layout.app")
		
    @section("main_content")

    <!--start page wrapper -->
    <div class="page-wrapper" id="custom_page_wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fa fa-atlassian"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Posts</h4>
                                </div>
                                <div class="card-body">
                                    {{ $total_post }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-secondary">
                                <i class="fa fa-atlassian"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Categories</h4>
                                </div>
                                <div class="card-body">
                                    {{ $total_category }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fa fa-atlassian"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Tags</h4>
                                </div>
                                <div class="card-body">
                                    {{ $total_tag }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fa fa-atlassian"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Photos</h4>
                                </div>
                                <div class="card-body">
                                    {{ $total_image }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="fa fa-atlassian"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Comments</h4>
                                </div>
                                <div class="card-body">
                                    {{ $total_comment }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-dark">
                                <i class="fa fa-atlassian"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Users</h4>
                                </div>
                                <div class="card-body">
                                    {{ $total_user }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fa fa-atlassian"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Roles</h4>
                                </div>
                                <div class="card-body">
                                    {{ $total_role }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

