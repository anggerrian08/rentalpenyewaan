<!-- add Category -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('category.store')}}">
            @csrf 
            @method('POST')
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Category</label>
              <input type="text" class="form-control" id="recipient-name" name="name" >
              @error('name')
                  <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary">Add Category</button>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">edit {{$item->name}} </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('category.update', $item->id)}}" method="post">
            @csrf
            @method('PATCH')
            <label for="">nama kategori</label>
            <input type="text" name="name" class="form-control" value="{{$item->name}}" required>
            
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