<div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic">
        <img src="https://www.daystar.ac.ke/images/crest-blue.png" class="img-responsive" alt="" width="200">
    </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
        <div class="profile-usertitle-name">
            {{ Auth::user()->title .' '. Auth::user()->first_name .' '. Auth::user()->middle_name . ' '. Auth::user()->last_name }}
        </div>
        <div class="profile-usertitle-job">
            {{  Auth::user()->institution }}
        </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->
    <!-- SIDEBAR BUTTONS -->
    <div class="profile-userbuttons">
        <button type="button" class="btn btn-success btn-sm">{{  Auth::user()->designation }}</button>
        {{-- <button type="button" class="btn btn-danger btn-sm">Message</button> --}}
    </div>
    <!-- END SIDEBAR BUTTONS -->
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <ul class="nav">
            <li class="{{ request()->segment(2) == 'profile' ? 'active' : '' }}">
                <a href="{{ route('account.profile') }}">
                <i class="glyphicon glyphicon-home"></i>
                Profile Settings </a>
            </li>
            <li class="{{ request()->segment(2) == 'conferences' ? 'active' : '' }}">
                <a href="{{ route('account.profile.conferences') }}">
                <i class="glyphicon glyphicon-user"></i>
               Conferences </a>
            </li>
            <li class="{{ request()->segment(2) == 'my-registration' ? 'active' : '' }}">
                <a href="{{ route('account.profile.my-registrations') }}">
                <i class="glyphicon glyphicon-ok"></i>
                My Registrations </a>
            </li>
            <li class="{{ request()->segment(2) == 'abstracts' ? 'active' : '' }}">
                <a href="{{ route('account.profile.abstracts') }}">
                <i class="glyphicon glyphicon-book"></i>
                My Abstracts </a>
            </li>
            <li class="{{ request()->segment(2) == 'links' ? 'active' : '' }}">
                <a href="{{ route('account.profile.links') }}">
                <i class="glyphicon glyphicon-link"></i>
                Meeting Links </a>
            </li>
            <li class="{{ request()->segment(2) == 'certificates' ? 'active' : '' }}">
                <a href="{{ route('account.profile.certificates') }}">
                <i class="glyphicon glyphicon-certificate"></i>
                Certificates </a>
            </li>
            <li class="{{ request()->segment(2) == 'feedback' ? 'active' : '' }}">
                <a href="{{ route('account.profile.feedback') }}">
                <i class="glyphicon glyphicon-flag"></i>
                Feedback </a>
            </li>
        </ul>
    </div>
    <!-- END MENU -->
</div>