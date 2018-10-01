@extends('la.layouts.app')

@section('htmlheader_title')
    Shop View
@endsection


@section('main-content')
    <div id="page-content" class="profile2">
        <div class="bg-primary clearfix">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-3">
                    <!--<img class="profile-image" src="{{ asset('la-assets/img/avatar5.png') }}" alt="">-->
                        <div class="profile-icon text-primary"><i class="fa fa-clock-o"></i></div>
                    </div>
                    <div class="col-md-9">
                        <h4 class="name">Rota from {{\Carbon\Carbon::parse($rota->week_commence_date)->toFormattedDateString()}}</h4>
                        <div class="row stats">
                            <div class="col-md-4"><i class="fa fa-facebook"></i> 234</div>
                            <div class="col-md-4"><i class="fa fa-twitter"></i> 12</div>
                            <div class="col-md-4"><i class="fa fa-instagram"></i> 89</div>
                        </div>
                        <p class="desc">Test Description in one line</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dats1"><div class="label2">Admin</div></div>
                <div class="dats1"><i class="fa fa-envelope-o"></i> superadmin@gmail.com</div>
                <div class="dats1"><i class="fa fa-map-marker"></i> Pune, India</div>
            </div>
            <div class="col-md-4">
            <!--
            <div class="teamview">
                <a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user1-128x128.jpg') }}" alt=""><i class="status-online"></i></a>
                <a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user2-160x160.jpg') }}" alt=""></a>
                <a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user3-128x128.jpg') }}" alt=""></a>
                <a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user4-128x128.jpg') }}" alt=""><i class="status-online"></i></a>
                <a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user5-128x128.jpg') }}" alt=""></a>
                <a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user6-128x128.jpg') }}" alt=""></a>
                <a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user7-128x128.jpg') }}" alt=""></a>
                <a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user8-128x128.jpg') }}" alt=""></a>
                <a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user5-128x128.jpg') }}" alt=""></a>
                <a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user6-128x128.jpg') }}" alt=""><i class="status-online"></i></a>
                <a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user7-128x128.jpg') }}" alt=""></a>
            </div>
            -->
                <div class="dats1 pb">
                    <div class="clearfix">
                        <span class="pull-left">Task #1</span>
                        <small class="pull-right">20%</small>
                    </div>
                    <div class="progress progress-xs active">
                        <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="dats1 pb">
                    <div class="clearfix">
                        <span class="pull-left">Task #2</span>
                        <small class="pull-right">90%</small>
                    </div>
                    <div class="progress progress-xs active">
                        <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 90%" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">90% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="dats1 pb">
                    <div class="clearfix">
                        <span class="pull-left">Task #3</span>
                        <small class="pull-right">60%</small>
                    </div>
                    <div class="progress progress-xs active">
                        <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 60%" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
            <li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/rota/' . $rota->id) }}" data-toggle="tooltip" data-placement="right" title="Back to Rota"><i class="fa fa-chevron-left"></i></a></li>
            <li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
            <li class=""><a role="tab" data-toggle="tab" href="#tab-timeline" data-target="#tab-timeline"><i class="fa fa-clock-o"></i> Timeline</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active fade in" id="tab-info">
                <div class="tab-content">
                    <div class="panel infolist">
                        <div class="panel-default panel-heading">
                            <h4>General Info</h4>
                        </div>
                        <div class="panel-body">
                            <table id="example1" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Staff</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                    <th>Sunday</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($staff as $member)
                                <tr>
                                    <td>{{$member->first_name}}</td>
                                    <td>{{ isset($singleManning['Monday'][$member->first_name]) ? $singleManning['Monday'][$member->first_name] : '0' }}</td>
                                    <td>{{ isset($singleManning['Tuesday'][$member->first_name]) ? $singleManning['Tuesday'][$member->first_name] : '0' }}</td>
                                    <td>{{ isset($singleManning['Wednesday'][$member->first_name]) ? $singleManning['Wednesday'][$member->first_name] : '0' }}</td>
                                    <td>{{ isset($singleManning['Thursday'][$member->first_name]) ? $singleManning['Thursday'][$member->first_name] : '0' }}</td>
                                    <td>{{ isset($singleManning['Friday'][$member->first_name]) ? $singleManning['Friday'][$member->first_name] : '0' }}</td>
                                    <td>{{ isset($singleManning['Saturday'][$member->first_name]) ? $singleManning['Saturday'][$member->first_name] : '0' }}</td>
                                    <td>{{ isset($singleManning['Sunday'][$member->first_name]) ? $singleManning['Sunday'][$member->first_name] : '0' }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>TOT</th>
                                    <th>{{ isset($singleManning['Monday']['tot']) ? $singleManning['Monday']['tot'] : '0' }}</th>
                                    <th>{{ isset($singleManning['Tuesday']['tot']) ? $singleManning['Tuesday']['tot'] : '0' }}</th>
                                    <th>{{ isset($singleManning['Wednesday']['tot']) ? $singleManning['Wednesday']['tot'] : '0' }}</th>
                                    <th>{{ isset($singleManning['Thursday']['tot']) ? $singleManning['Thursday']['tot'] : '0' }}</th>
                                    <th>{{ isset($singleManning['Friday']['tot']) ? $singleManning['Friday']['tot'] : '0' }}</th>
                                    <th>{{ isset($singleManning['Saturday']['tot']) ? $singleManning['Saturday']['tot'] : '0' }}</th>
                                    <th>{{ isset($singleManning['Sunday']['tot']) ? $singleManning['Sunday']['tot'] : '0' }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade in p20 bg-white" id="tab-timeline">
                <ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <li class="time-label">
                    <span class="bg-red">
                        10 Feb. 2014
                    </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                            <div class="timeline-body">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                quora plaxo ideeli hulu weebly balihoo...
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-primary btn-xs">Read more</a>
                                <a class="btn btn-danger btn-xs">Delete</a>
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-user bg-aqua"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                            </h3>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-comments bg-yellow"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                            <div class="timeline-body">
                                Take me to your leader!
                                Switzerland is small and neutral!
                                We are more like Germany, ambitious and misunderstood!
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <li class="time-label">
                    <span class="bg-green">
                        3 Jan. 2014
                    </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                            <div class="timeline-body">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>
                <!--<div class="text-center p30"><i class="fa fa-list-alt" style="font-size: 100px;"></i> <br> No posts to show</div>-->
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endpush