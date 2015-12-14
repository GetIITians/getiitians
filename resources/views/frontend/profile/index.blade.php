@extends ('layouts.profile')
@section('main')
    <main class="col-xs-12 col-sm-10">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <div class="alert alert-red alert-dismissible fade in" role="alert">
                    <i class="material-icons">error</i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <p>You have completed 0 of 4 steps in the signup process. <a href="signuppersonal.html">Complete your signup now</a></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consequat ultricies urna, ac accumsan nulla tristique sit amet. Mauris lobortis posuere leo, sit amet efficitur turpis efficitur ac. In at tristique ipsum. Sed lobortis odio eget sapien mollis viverra. Nullam semper purus et sapien rhoncus porta. Nunc ac diam eleifend, iaculis magna id, aliquam nulla. Proin a erat euismod, euismod libero ut, varius dolor. Sed tempor, dui ut consequat elementum, diam dolor ornare ligula, sit amet porta elit mi eu sem. Mauris dictum justo eu orci euismod, eu tincidunt lacus euismod. Sed maximus malesuada vehicula. In eu semper orci, eu blandit ante. Proin auctor suscipit odio id laoreet. Sed a metus leo. </p>
                <hr>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <p><i class="material-icons md-18">school</i><span class="pull-right">B.Tech from IIT Delhi</span></p>
                        <p><i class="material-icons md-18">language</i><span class="pull-right">English, Hindi</span></p>
                        <p><i class="material-icons md-18">attach_money</i><span class="pull-right">? 500 -1200 / per hour</span></p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <p><i class="material-icons md-18">perm_identity</i><span class="pull-right">Male</span></p>
                        <p><i class="material-icons md-18">mode_edit</i><span class="pull-right">9th-12th</span></p>
                        <p><i class="material-icons md-18">star_rate</i><span class="pull-right"><small class="text-muted">(122 ratings) </small>4.8</span></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <form id="messageTeacher">
                    <p>Send Himanshu a message explaining your needs and you will recieve a response by email.</p>
                    <fieldset class="form-group">
                        <textarea class="form-control" id="exampleTextarea" rows="5" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consequat ultricies urna, ac accumsan nulla tristique sit amet."></textarea>
                    </fieldset>
                    <p class="text-muted"><i class="material-icons md-18">reply</i> Replies within 4 hours</p>
                    <button type="submit" class="btn btn-primary-reverse">MESSAGE HIMANSHU</button>
                </form>
            </div>
        </div>
        <div class="gutter-sm"></div>
        <div class="row">
            <div class="col-xs-12">
                <h3>Subjects</h3>
                <hr>
                <p class="text-justify">Lorem, ipsum, dolor, sit amet, consectetur, adipiscing elit, Cras consequat, ultricies, urna ac, accumsan nulla, tristique sit, amet, Mauris lobortis, posuere leo, sit amet, efficitur, turpis, efficitur ac, In at tristique, ipsum.</p>
                <small><a href="subjects.html">View All</a></small>
            </div>
        </div>
        <div class="gutter-sm"></div>
        <div class="row">
            <div class="col-xs-12">
                <h3>Students Feedback</h3>
                <hr>
                <div class="media">
                    <div class="media-left">
                        <i class="material-icons md-60">format_quote</i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Knowledgable &amp; patient tutor -</h4>
                        <i>Gaurav jain, Guwahati on 21/8/2015</i>
                        <div class="clearfix"></div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consequat ultricies urna, ac accumsan nulla tristique sit amet. Mauris lobortis posuere leo, sit amet efficitur turpis efficitur ac. In at tristique ipsum. Sed lobortis odio eget sapien mollis viverra. Nullam semper purus et sapien rhoncus porta.
                    </div>
                </div>
                <small><a href="reviews.html">View All</a></small>
            </div>
        </div>
        <div class="gutter-sm"></div>
    </main>
@endsection