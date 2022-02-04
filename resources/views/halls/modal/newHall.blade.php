<!-- Form for add new hall -->
<form action="{{url('/add-hall')}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <!-- Modal container -->
  <div class="modal fade text-left" id="addHallModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <!-- Modal border properties -->
      <div class="modal-content rounded">
        <!-- Modal header properties -->
        <div class="modal-header p-5 pb-4 border-bottom-0">
          <!-- Modal title -->
          <h4 class="modal-title fw-bold mb-0">Add New Hall</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body p-5 pt-0">
          <!-- Name -->
          <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control rounded-4" placeholder="Name" required>
            <label for="floatingInput">
              Hall's name
            </label>
          </div>
          <!-- Description -->
          <div class="form-floating mb-3">
            <textarea type="text" class="form-control rounded-4" name="description" placeholder="Description" required></textarea>
            <label for="floatingInput">Description</label>
          </div>
          <!-- Address1 -->
          <div class="form-floating mb-3">
            <input type="text" name="address1" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
            <label for="floatingInput">Address</label>
          </div>

          <!-- Address2 -->
          <div class="form-floating mb-3">
            <input type="text" name="address2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" >
            <label for="floatingInput">Address 2</label>
          </div>

          <!-- City -->
          <div class="row g-3 mb-3">
            <div class="col-md-6 ">
              <label for="inputCity" class="form-label">City</label>
              <input type="text" name="city" class="form-control" id="inputCity" required>
            </div>

            <!-- State (Location) -->
            <div class="col-md-4 ">
            <label for="floatingInput" class="form-label">State</label>
              <select name="location" id="location" class="form-select mb-3">
                <option selected>Select State</option>
                <option value="Kuala Lumpur">Kuala Lumpur</option>
                <option value="Johor">Johor</option>
                <option value="Perak">Perak</option>
                <option value="Melaka">Melaka</option>
              </select>
            </div>

            <!-- Zip -->
            <div class="col-md-2">
              <label for="inputZip" class="form-label">Zip</label>
              <input type="text" name="zip" class="form-control" id="inputZip" required>
            </div>
          </div>

          <!-- Package dropdown -->
          <select name="package_id" class="form-select mb-3" id="" required>
            <option value="">Select package</option>            
            @foreach($packages as $package)
            <option value="{{$package->id}}">{{ $package->name }}</option>
            @endforeach
          </select>
          <!-- Price -->
          <div class="form-floating mb-3">
            <input type="number" name="price" class="form-control" placeholder="Price" required>
            <label for="floatingInput">Price (RM)</label>
          </div>
          <!-- Cover image -->
          <div class="form-class mb-4">
            <label>Cover image</label>
            <input type="file" id="input-file-now-custom-3" class="form-control form-control-sm" name="cover" required>  
          </div>
          <!-- Multiple image -->
          <div class="form-class mb-5">
            <!-- <input type="file" name="image" class="course form-control"> -->
            <label>Add extra images</label>
            <input type="file" id="input-file-now-custom-3" class="form-control form-control-sm" name="images[]" multiple>  
          </div>
          <!-- Submit button -->
          <button type="submit" class="w-100 mb-2 btn rounded-4 btn-primary ">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>