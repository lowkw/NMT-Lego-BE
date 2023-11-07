<x-guest-layout>
<section class="title-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0 overflow-hidden text-center">
                <h1 class="page-title" style="color:white;">About Us</h1>            </div>
        </div>
    </div>
</section>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" style="margin: 2rem;">
        <div class="bg-white p-4 rounded-lg shadow-md profileCard-aboutUs">
            <img class="img-fluid rounded-circle mx-auto" src="{{ asset('images/profile/cameron-photo.jpg') }}" width="100%" alt="Profile Image">
            <div class="text-left mt-3">
                <b>First Name:</b> Cameron<br>
                <b>Last Name:</b> Morgan<br>
                <b>Portfolio:</b> <a href="https://cmorgan.dev" target="_blank">Portfolio</a><br />
                <b>LinkedIn:</b> <a href="https://www.linkedin.com/in/cameron-morgan-95846659" target="_blank">LinkedIn Profile</a><br />
                <img class="img-fluid mx-auto" src="{{ asset('images/profile/QR-Cameron.png') }}" width="70%" alt="Profile Image">

            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-md profileCard-aboutUs">
            <img class="img-fluid rounded-circle mx-auto" src="{{ asset('images/profile/rowan-neoh.jpg') }}" width="95%" alt="Profile Image">
            <div class="text-left mt-3">
                <b>First Name:</b> Shao Yung<br>
                <b>Last Name:</b> Neoh (Rowan)<br>
                <b>LinkedIn: </b> <a href="https://www.linkedin.com/in/rowanneoh/" target="_blank">LinkedIn Profile</a><br /><br />
                <img class="img-fluid mx-auto" src="{{ asset('images/profile/QR-Rowan.png') }}" width="70%" alt="Profile Image">
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-md profileCard-aboutUs">
            <img class="img-fluid rounded-circle mx-auto" src="{{ asset('images/profile/kokweilow.jpg') }}" width="100%" alt="Profile Image">
            <div class="text-left mt-3">
                <b>First Name:</b> Kok Wei<br>
                <b>Last Name:</b> Low<br>
                <b>LinkedIn:</b> <a href="https://au.linkedin.com/in/kok-wei-low" target="_blank">LinkedIn Profile</a><br /><br />
                <img class="img-fluid mx-auto" src="{{ asset('images/profile/QR-kokWei.png') }}" width="70%" alt="Profile Image">
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-md profileCard-aboutUs">
            <img class="img-fluid rounded-circle mx-auto" src="{{ asset('images/default-profile-image.jpg') }}" width="100%" alt="Profile Image">
            <div class="text-left mt-3">
                <b>First Name:</b> Nicholas<br>
                <b>Last Name:</b> Lumma<br>
                <b>LinkedIn:</b>
            </div>
        </div>
    </div>

    <!---------End Sets list----------->
</x-guest-layout>
