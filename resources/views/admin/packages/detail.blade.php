<?php
  $title="FreshMart - Detail Product";

  function rupiah ($angka) {
    $hasil = 'Rp ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
?>

@extends('layouts.template-admin')
@section('content')
@foreach($packages as $package)
    <div class="content-body">
      <div class="container-fluid">
        <div class="page-titles">
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item"><a href="{{Route('admin.package.index')}}">Package</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Package</a></li>
          </ol>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- row -->
        <div class="row">
          <!-- Baris pertama -->
          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Detail Data Package</h4>
              </div>
              <div class="card-body">
                <div class="basic-form">
                  <form>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Id Product</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$package->id}}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Package</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{$package->name}}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Start Price</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo rupiah($package->normal_price); ?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">End Price</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo rupiah($package->end_price); ?>" disabled>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        <!-- Baris kelima -->
          <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                  <h4 class="card-title">List Product Package</h4>
                  <a data-toggle="modal" data-target="#addCategoryProductModal"><div class="btn btn-primary">+ Add Product Package</div></a>
              </div>
              <div class="card-body">
                <div class="table-responsive recentOrderTable">
                  <table class="table verticle-middle table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama Product</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if($package->detail_packages->count()==0)
                        <tr class="text-center">
                          <td colspan="10">Theres no product package found on  database</td>
                        </tr>    
                      @else
                      @foreach($package->detail_packages as $p)
                      <tr>
                        <td scope="row">{{$loop->index+1}}</td>
                        <td>{{$p->product->product_name}}</td>
                        <td colspan="1">
                            <img src="{{ URL::asset('asset/product/'. $p->product->gambar) }}"alt="{{ $p->product->gambar }}" width="200px" height="150px" style="border-radius:0px;">
                        </td>
                        <td>{{$p->qty}}</td>
                        <td><?php echo rupiah($p->product->price) ?></td>
                        <td><?php echo rupiah($p->sub_total) ?></td>
                        <td>
                          <div class="d-flex">
                            <a href="" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-file"></i></a>
                            <div class="sweetalert" style="line-height:0px;">
                              <form action="#" method="POST">
                                @csrf
                                <button type="submit" onclick="return confirm('Yakin Ingin Mengapus Data?')" class="btn btn-danger shadow btn-xs sharp sweet-success-cancel"><i class="fa fa-trash"></i></button>                 
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="modal fade" id="addCategoryProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Product Package</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="{{Route('admin.save.productPackage', $package->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
            <div class="modal-body">     
              <section>
                <div class="row">
                  <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Package Product*</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                          <select name="product_id" id="product_id" class="form-control" tabindex="-98" required>
                            <option selected value="" disabled>Pilih Id Product</option>
                            @foreach($products as $c)
                              <option value="{{$c->id}}">{{$c->id}} - {{$c->product_name}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Qty Product*</label>
                        <input type="number" class="form-control" min="1" id="qty" name="qty">
                    </div>
                  </div>
                </div>  
              </section>      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endforeach
@endsection


@section('scriptjs')
<script type="text/javascript">
    $(document).ready(function(){
        $("#inputImageProduct").modal('show');
    });
</script>
@endsection


    