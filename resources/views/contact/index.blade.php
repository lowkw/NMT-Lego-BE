<x-guest-layout>
    <section class="title-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0 overflow-hidden text-center">
                    <h1 class="page-title" style="color:white;">Contact</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container pt-4">
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">

                <!-- Contact Form -->
                <div class="card">
                    <!-- Form Table Header -->
                    <div class="card-header bg-primary">
                        <h3 class="text-white text-center">Contact Us</h3>
                    </div>
                    <!-- Form Table Body -->
                    <div class="card-body">

                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.store') }}" id="contactForm">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- Name -->
                                        <label for="inputName">Name</label>
                                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter name" required>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- Email -->
                                        <label for="inputEmail">Email</label>
                                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter email" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- Message -->
                                        <label for="inputMessage">Message</label>
                                        <textarea name="message" class="form-control" id="inputMessage" placeholder="Enter message" rows="4" required></textarea>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center pt-4">
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-success btn-submit">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

</x-guest-layout>
