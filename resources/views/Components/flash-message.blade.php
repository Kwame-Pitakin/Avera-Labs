@if (session()->has('flush_message'))
<style>
  .bs-toast{
    position:absolute; 
    right:0;
    z-index: 100;

   
  }
</style>

    {{-- flush message  --}}
    {{-- <div class="bs-toast  toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000"> --}}
    <div class="bs-toast  toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000" x-data="{show: true}" x-init="setTimeout(()=>show=false, 2000)" x-show="show" >
      
      <div class="alert alert-solid-success alert-dismissible d-flex align-items-center" role="alert" style="color:rgb(242, 243, 244)">
        <i class="bx bx-xs bx-check me-2"></i>
        {{ session('flush_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  </div>
  {{-- end flush message  --}}
  
@endif



