@extends('admin_layouts.admin_layout')

@section('admin-content')
<div class="container">
    <h2>Edit Member</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Use the HTTP PUT method to update the member --}}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $member->first_name) }}" class="form-control">
                    @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $member->last_name) }}" class="form-control">
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
                    <input type="email" name="email" id="email" value="{{ old('email', $member->user->email) }}" class="form-control">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $member->phone_number) }}" class="form-control">
                    @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="street_address">Street Address:</label>
            <input type="text" name="street_address" id="street_address" value="{{ old('street_address', $member->street_address) }}" class="form-control">
            @error('street_address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" value="{{ old('city', $member->city) }}" class="form-control">
                    @error('city')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="state_province">State/Province:</label>
                    <input type="text" name="state_province" id="state_province" value="{{ old('state_province', $member->state_province) }}" class="form-control">
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
                    <input type="text" name="zip_postal_code" id="zip_postal_code" value="{{ old('zip_postal_code', $member->zip_postal_code) }}" class="form-control">
                    @error('zip_postal_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" name="country" id="country" value="{{ old('country', $member->country) }}" class="form-control">
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
                    <input type="date" name="dob" id="dob" value="{{ old('dob', $member->dob) }}" class="form-control">
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
                        <option value="male" {{ old('gender', $member->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $member->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender', $member->gender) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-6">
                <div class="form-group">
                    <label for="profile_picture">Profile Picture:</label>
                    <div class="custom-file">
                        <input type="file" name="profile_picture" id="profile_picture" class="custom-file-input" onchange="readURL(this);">
                        <label class="custom-file-label" for="profile_picture">Choose file</label>
                    </div>
                    <div class="mt-2">
                        <img id="image-preview" src="{{ $member->profile_picture ? asset('storage/app/public/' . $member->profile_picture) : '' }}" alt="Preview" style="max-width: 100%; max-height: 200px; border-radius: 50%;">
                    </div>
                    @error('profile_picture')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        <button type="submit" class="btn btn-primary">Update Member</button>
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
