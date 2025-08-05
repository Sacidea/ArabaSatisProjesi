
@extends("panel.layout.app")




@section('body')


   <div class="row mt-3">
    <div class="col-lg-6 mx-auto my-auto">
      <div class="card-body mx-auto my-auto">
    
           <div class="card-title ">Marka Adı</div>
           
           <hr>
           @if($errors->any())
            @foreach($errors->all() as $e)
                      {{$e}}
                      <br>
                      @endforeach
            @endif          
            <form action="{{route('admin.CarBrandUpdate')}}" method="POST">
              @csrf
              
           <div class="form-group">
            <label for="input-1">Marka Adı</label>
            <input type="text" name="brandName"value={{$brand->name}} class="form-control" id="input-1" placeholder="">
           </div>
            <div class="form-group">
            
            <!--id yi kullanıcı görmemesi çin type=hidden olmalı value ve name alanları ile değere erişim -->
            <input type="hidden" name="brandId" value={{$brand->id}} class="form-control" id="" placeholder="">
           </div>





          <button type="submit" class="btn btn-primary px-5"><i class="icon-done
            "></i>GÜNCELLE</button>
          </form>
          </div>
         </div>
</div> 
@endsection