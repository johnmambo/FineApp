<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Course</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="savecourse">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('Course Name') }}</label>
                    <input wire:model="course_name" type="text" name="course_name" id="course_name" class="form-control"
                        value="{{ old('course_name') }}" autofocus>
                    @error('course_name')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Course Code') }}</label>
                    <input wire:model="course_code" type="text" name="course_code" id="course_code" class="form-control"
                        value="{{ old('course_code') }}" autofocus>
                    @error('course_code')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Course type') }}</label>
                    <input wire:model="course_type" type="text" name="course_type" id="course_type" class="form-control"
                        value="{{ old('course_type') }}" autofocus>
                    @error('course_type')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Course Capacity') }}</label>
                    <input wire:model="course_capacity" type="text" name="course_capacity" id="course_capacity" class="form-control"
                        value="{{ old('course_capacity') }}" autofocus>
                    @error('course_capacity')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Select Department') }}</label>

                    <select wire:model="department_id" class="form-control" name="department_id">
                        <option selected>Open this select menu</option>
                        @foreach ($departments as $dep)
                                        <option value="{{ $dep->id }}"> {{ $dep->id }} - {{ $dep->dep_name }}</option>
                                        @endforeach
                    </select>
                    @error('department_id')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class=" mt-5 btn btn-primary">save</button>
            </form>
        </div>
    </div>
</div>
