<!-- add plat -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add plat</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('plat.store')}}">
            @csrf 
            @method('POST')
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">plat</label>
              <input type="text" class="form-control" id="recipient-name" name="plat" >
              @error('name')
                  <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary">Add plat</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  {{-- modal Update --}}
@foreach ($data as $item) 
  <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">edit {{$item->plat}} </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('plat.update', $item->id)}}" method="post">
            @csrf
            @method('PATCH')
            <label for="">nama kategori</label>
            <input type="text" name="plat" class="form-control" value="{{$item->plat}}" required>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" ">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach