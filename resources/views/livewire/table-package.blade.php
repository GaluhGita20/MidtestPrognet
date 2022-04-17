<div class="col-lg-12">
  <div class="card">
    <div class="card-search" style="padding-top:1.5rem; padding-right: 1.875rem; padding-bottom: 1.25 rem; padding-left:1.875rem; position: relative; align-items: center;">
      <div class="form-group">
        <input type="text" wire:model="searchProduct" class="form-control"  placeholder="Search data package">
      </div>
    </div>
    <div class="card-header">
        <h4 class="card-title">Table Packages</h4>
        <a href="{{route('admin.add.package')}}"><div class="btn btn-primary">+ Add Data Package</div></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-responsive-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Package</th>
              <th>Gambar</th>
              <th>Normal Price</th>
              <th>End Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @if($packages->count()== 0)
            <tr class="text-center">
              <td colspan="10">Theres no packages found on  database</td>
            </tr>
          @endif
          @foreach($packages as $package)
          <tr>
            <td scope="row">{{$loop->index+1+($packages->currentPage()-1)*5}}</td>
            <td colspan="1">{{$package->name}}</td>
            <td colspan="1"><img src="{{ URL::asset('asset/package/'. $package->gambar) }}"alt="{{ $package->gambar }}" width="200px" height="150px" style="border-radius:0px;"></td>
            <td colspan="1"><?php echo rupiah($package->normal_price) ?></td>
            <td colspan="1"><?php echo rupiah($package->end_price) ?></td>
            <td>
              <div class="d-flex">
                <a href="{{route('admin.detail.package',$package->id)}}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-file"></i></a>
                <a href="{{route('admin.edit.package',$package->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                <div class="sweetalert">
                  <form action="{{ route('admin.delete.package',$package->id) }}" method="POST">
                    @csrf
                    <button type="submit" onclick="return confirm('Yakin Ingin Mengapus Data?')" class="btn btn-danger shadow btn-xs sharp sweet-success-cancel"><i class="fa fa-trash"></i></button>                 
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
        <style>
          nav .flex.justify-between.flex-1{
            display:none;
          }
          .w-5.h-5{
            width:50px;
          }
          </style>
        {{$packages->links()}}
      </div>
    </div>
  </div>
</div>

<?php
  $title="PROGNET - TRANSAKSI SIMPANAN";

  function rupiah ($angka) {
    $hasil = 'Rp ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
?>