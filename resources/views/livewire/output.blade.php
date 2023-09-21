<div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Indicator Number</label>
        <div class="col-sm-10">
            <select wire:model="select" class="form-select" name="indicator_no" aria-label="Default select example">
                @foreach ($output as $data )
                   <option value="{{ $data->id }}">{{ $data->output }}</option> 
                @endforeach
            </select>
            @error('indicator_no')
                <p class="text-danger">{{ $message }} </p>
            @enderror
        </div>

    </div>
    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Indicator</label>
        <div class="col-sm-10">
          <textarea class="form-control" readonly name="indicator" style="height: 100px">{{ $dataindicator }}</textarea>
            @error('indicator')
                <p class="text-danger">{{ $message }} </p>
            @enderror
        </div>
    </div>
</div>
