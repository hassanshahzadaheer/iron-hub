@extends('admin_layouts.admin_layout')

@section('admin-content')
    <h3 class="card-title fw-semibold mb-4">Create New Member</h3>

         <div class="card-body">
    <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data" id="member-form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                        class="form-control">
                    @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                        class="form-control">
                    @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                        class="form-control">
                    @error('phone_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="street_address">Street Address:</label>
            <input type="text" name="street_address" id="street_address" value="{{ old('street_address') }}"
                class="form-control">
            @error('street_address')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}" class="form-control">
                    @error('city')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="state_province">State/Province:</label>
                    <input type="text" name="state_province" id="state_province" value="{{ old('state_province') }}"
                        class="form-control">
                    @error('state_province')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="zip_postal_code">ZIP/Postal Code:</label>
                    <input type="text" name="zip_postal_code" id="zip_postal_code" value="{{ old('zip_postal_code') }}"
                        class="form-control">
                    @error('zip_postal_code')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" name="country" id="country" value="{{ old('country') }}" class="form-control">
                    @error('country')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" id="dob" value="{{ old('dob') }}" class="form-control">
                    @error('dob')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="option">Select an Option </option>
                        <option value="male" {{ old('gender')=='male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender')=='female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender')=='other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="webcam-capture">Webcam Capture:</label>
                <div id="webcam-container" class="rounded mx-auto d-block">
                    <video id="webcam-video" width="100%" height="auto" playsinline></video>
                    <button id="capture-btn" class="btn btn-primary mt-3">Capture Image</button>
                    <button id="retake-btn" class="btn btn-secondary mt-3" style="display: none;">Retake</button>
                </div>
                <div class="mt-2">
                    <img id="captured-image" src="#" alt="Captured Image"
                        style="max-width: 100%; max-height: 100px; display: none;">

                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create Member</button>
    </form>
         </div>


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const videoElement = document.getElementById('webcam-video');
        const captureBtn = document.getElementById('capture-btn');
        const retakeBtn = document.getElementById('retake-btn');
        const capturedImage = document.getElementById('captured-image');
        const fileInput = document.getElementById('profile_picture');
        const form = document.getElementById('member-form');

        // Check for webcam support
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({
                video: true
            })
                .then(stream => {
                    videoElement.srcObject = stream;
                    videoElement.play();
                })
                .catch(error => console.error('Error accessing webcam:', error));
        } else {
            console.error('Webcam not supported on this browser');
        }

        // Capture image from webcam
        captureBtn.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default form submission

            const canvas = document.createElement('canvas');
            canvas.width = videoElement.videoWidth;
            canvas.height = videoElement.videoHeight;
            canvas.getContext('2d').drawImage(videoElement, 0, 0, canvas.width, canvas.height);

            // Display the captured image
            capturedImage.src = canvas.toDataURL('image/png');
            capturedImage.style.display = 'block';

            // Hide webcam elements and show retake button
            videoElement.style.display = 'none';
            captureBtn.style.display = 'none';
            retakeBtn.style.display = 'inline-block';
            fileInput.style.display = 'none';
        });

        // Retake image
        retakeBtn.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Reset elements for capturing a new image
            videoElement.style.display = 'block';
            captureBtn.style.display = 'inline-block';
            retakeBtn.style.display = 'none';
            capturedImage.style.display = 'none';
            fileInput.style.display = 'block';
        });

        // AJAX form submission
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission
            console.log('Form submitted'); // Add this line

            // Client-side validation
            if (!validateForm()) {
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            // Create a FormData object to send form data including the captured image
            const formData = new FormData(form);
            formData.append('captured_image', capturedImage.src);

            // Perform an AJAX request to submit the form data
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        showErrorAlert(`HTTP error! Status: ${response.status}`);
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('AJAX request successful:', data);
                    showSuccessAlert('Member created successfully!', function () {
                        // Redirect to member.index after the user clicks "OK" on the success alert
                        window.location.href = "{{ route('members.index') }}";
                    });
                })
                .catch(error => {
                    console.error('Error submitting form:', error);

                    // Check if the error has a response and if it's in JSON format
                    if (error instanceof Error && error.response && error.response.json) {
                        error.response.json()
                            .then(data => {
                                console.log('Server response:', data);

                                // Use the actual error message from the server response
                                showErrorAlert(data.error || 'Error submitting form. Please try again.');
                            })
                            .catch(innerError => {
                                console.error('Error parsing JSON response:', innerError);
                                showErrorAlert('Error submitting form. Please try again.');
                            });
                    } else {
                        showErrorAlert('Error submitting form. Please try again.');
                    }
                });


            // Client-side validation function
        function validateForm() {
            // You can add additional validation logic here
            return true;
        }

        // Function to show a success alert with callback
        function showSuccessAlert(message, callback) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message,
            }).then(callback);
        }

        // Function to show an error alert
        function showErrorAlert(message) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: message,
            });
        }
    });
</script>
