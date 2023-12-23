<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Unit</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="saveUnit">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('Unit Name') }}</label>
                    <input wire:model="unit_name" type="text" name="unit_name" id="unit_name" class="form-control"
                        value="{{ old('unit_name') }}" autofocus>
                    @error('unit_name')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Unit Code') }}</label>
                    <input wire:model="unit_code" type="text" name="unit_code" id="unit_code" class="form-control"
                        value="{{ old('unit_code') }}" autofocus>
                    @error('unit_code')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Select Course') }}</label>

                    <select wire:model="course_id" class="form-control" name="department_id">
                        <option selected>Open this select menu</option>
                        @foreach ($courses as $course)
                         <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
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

