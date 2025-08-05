
@extends("panel.layout.app")




@section('body')


<div class="card-body">
              <h5 class="card-title">Araç Listesi</h5>
			  <div class="table-responsive">
               <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">SıraNo</th>
                      <th scope="col">Araba Markası</th>
                      <th scope="col">Durumu</th>
                     
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                    
                   
                    @foreach($brands as $b)
                     <td>{{$loop->iteration}}</td><!--$loop foreach ın itersyon sayısını tutan özel değişkenidir-->
                       <td> {{$b->name}}</td>
                       @if($b->deleted_at==null) <!--SoftDeletes() direk kullanılamaz hata verir
                                                        deleted_at metodun db de olusturduğu sütun adı-->

                        <td>Aktif</td>
                     
                    
                        @else
                        <td>Silindi</td>
                           
                       @endif
                     
                    <td>
                      <a href="{{route('admin.CarBrandUpdatePage' ,$b->id)}}" class="btn btn-primary">Güncelle</a>
                   
                    
                      <a href="{{route('admin.CarBrandDelete',$b->id)}}" class="btn btn-warning">Sil</a>
                     </td>

                    
                        
 </tr>
  @endforeach  

                  </tbody>
                </table>
            </div>
         <a href="{{route('admin.CarBrandCreate')}}" onclick="return true;" class="btn btn-light px-5 mb-3"><i class="fa fa-car pr-2"></i>Araç Ekle</a>

            </div>
    
@endsection