<form action="{{ route('logout') }}" class="">
    @csrf
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><button type="submit" class="btn border-0" disabled style="color:black; width:10rem; text-align:left;">
        Profile
        </buton></li>
        <li class="list-group-item"><button type="submit" class="btn border-0" disabled style="color:black; width:10rem; text-align:left;">
        Settings
        </buton></li>
        <li class="list-group-item"><button type="submit" class="btn" style="color:#810000; width:10rem; text-align:left; font-weight:bold;">
        Logout
        </buton></li>
    </ul>
    <!-- <button type="submit" class="btn" style="color:black; width:10rem; text-align:left;">
        Logout
    </buton> -->
    <!-- <a href="{{ route('logout') }}" class="link-underline link-underline-opacity-0 m-2" style="color:black;">
        Logout
    </a> -->
</form>
