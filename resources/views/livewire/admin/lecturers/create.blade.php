<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Course</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="saveLecturer">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('Lecturer Name') }}</label>
                    <input wire:model="lec_name" type="text" name="lec_name" id="lec_name" class="form-control"
                        value="{{ old('lec_name') }}" autofocus>
                    @error('lec_name')
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
