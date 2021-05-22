@extends('layouts.master');
@section('title','Tes')   
@section('content')  
            <div class="card">
                  <div class="card-body"> 
                    <form action="{{Route('update.tes',$data_barang->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <input type="text" name="nama_depan" value="{{$data_barang->nama_depan}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <input type="text" name="nama_belakang" value="{{$data_barang->nama_belakang}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" href="{{Route('tes')}}">Back</button>
                </div>
            </form>
@endsection