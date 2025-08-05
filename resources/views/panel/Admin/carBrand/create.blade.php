@extends("panel.layout.app")




@section('body')


   <div class="row mt-3">
    <div class="col-lg-6 mx-auto my-auto">
      <div class="card-body mx-auto my-auto">
    
           <div class="card-title ">Marka Ekleme</div>
           
           <hr>
             @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $e)
                        {{$e}}<br>
                    @endforeach
                </div>
            @endif
          
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{route('admin.CarBrandAdd')}}" method="POST">
              @csrf
           <div class="form-group">
            <label for="input-1">Marka Adı</label>
            <input type="text" name="brandName" class="form-control" id="input-1" placeholder="">
           </div>
          <button type="submit" class="btn btn-success px-5"><i class="bi bi-car-front-fill"></i>  Ekle
          </form>
          </div>
         </div>
</div> 
@endsection