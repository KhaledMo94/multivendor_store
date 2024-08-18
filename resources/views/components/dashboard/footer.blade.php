<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault(); confirmLogout();">
            Logout
        </a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{Carbon::now()->year}} <a href="https://www.linkedin.com/in/khaled--youssef/">Khaled Mohamed</a>.</strong> All rights
    reserved.
</footer>