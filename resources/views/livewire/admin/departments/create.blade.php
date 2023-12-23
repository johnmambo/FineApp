<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Department</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="savedepartment">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('Department Name') }}</label>
                    <input wire:model="dep_name" type="text"  id="dep_name" class="form-control"
                        value="{{ old('depardep_nametment_name') }}" autofocus>
                    @error('dep_name')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Department Code') }}</label>
                    <input wire:model="dep_code" type="text"  id="dep_code" class="form-control"
                        value="{{ old('dep_code') }}" autofocus>
                    @error('dep_code')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <button type="submit" class=" mt-3 btn btn-primary">save</button>
            </form>
        </div>
    </div>
</div>
