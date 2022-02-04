<!-- Form for add new hall -->
<form action="{{url('/add-package')}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <!-- Modal container -->
  <div class="modal fade text-left" id="addPackageModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <!-- Modal border properties -->
      <div class="modal-content rounded">
        <!-- Modal header properties -->
        <div class="modal-header p-5 pb-4 border-bottom-0">
          <!-- Modal title -->
          <h4 class="modal-title fw-bold mb-0">Add Package</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body p-5 pt-0">
          <!-- Package -->
          <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" placeholder="Name" required>
            <label for="floatingInput">Package</label>
          </div>
          <!-- Price -->
          <div class="form-floating mb-3">
            <input type="number" name="price" class="form-control" placeholder="Price" required>
            <label for="floatingInput">Price</label>
          </div>
          <!-- Pax -->
          <div class="form-floating mb-3">
            <input type="number" name="pax" class="form-control" placeholder="Pax" required>
            <label for="floatingInput">Pax</label>
          </div>
          <!-- Service -->
          <div class="form-floating mb-4">
            <input type="text" name="service" class="form-control" placeholder="Service" required>
            <label for="floatingInput">Service</label>
          </div>
          <!-- Submit button -->
          <button type="submit" class="w-100 mb-2 btn rounded-4 btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>