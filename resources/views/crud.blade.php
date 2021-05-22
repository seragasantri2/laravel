@extends('layouts.master');
@section('title','Tes')   
@section('content')

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                   <a href="{{Route('tambah.tes')}}" class="badge badge-primary btn  btn-icon icon-left"><i class="fa fa-plus "></i> Tambah Data</a> 
                    <table class="table table-striped table-bordered table-sm mt-3">
                            <tr>
                                <th>#</th>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Action</th>
                            </tr>
                            @foreach  ($data_barang as $no => $data)
                            <tr>    
                                    <td>{{$data_barang->firstItem()+$no}}</td>
                                    <td>{{$data->nama_depan}}</td>
                                    <td>{{$data->nama_belakang}}</td>
                                    <td>
                                        <a href="{{Route('edit.tes', $data->id)}}" class="badge badge-warning">Update</a>
                                        <a href="#" data-id="{{$data->id}}" class="badge badge-danger swal-6">
                                        <form action="{{route('delete.tes',$data->id) }}" id="delete{{ $data->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>    
                                        Delete</a>
                                    </td>
                            </tr>
                            @endforeach
                    </table>
                    {{$data_barang->links()}}
               </div>
           </div>          
        </div>
    </div>

@endsection

@push('up_js')
  <script src="{{asset('stisla/assets/sweetalert/dist/sweetalert.min.js')}}"></script>
@endpush

@push('js')
  <script>
      $(".swal-6").click(function(e) {
        id = e.target.dataset.id;
        swal({
            title: 'Yakin Ingin Menghapus?',
            text: 'Data Tidak bisa dipulihkan jika dihapus!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
            // swal('Poof! Your imaginary file has been deleted!', {
            //     icon: 'success',
            // });
                $(`#delete${id}`).submit();
            } else {
            // swal('Your imaginary file is safe!');
            }
            });
        });
  </script>
@endpush