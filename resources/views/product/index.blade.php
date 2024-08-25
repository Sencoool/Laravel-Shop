@extends("layouts.master")
@section('title') BikeShop | รายการสินค้า @stop
@section('content')
<!DOCTYPE html>
<head>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="container">
        <h1>รายการสินค้า</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><strong>รายการ</strong></div>
            </div>
            <div class="panel-body">
                <form action="{{ URL::to('product/search')}}" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="text" name="q" class="form-control" placeholder="พิมพ์รหัสหรือชื่อเพื่อค้นหา">
                    <a href="{{ URL::to('product/edit')}}" class="btn btn-success pull-right">เพิ่มสินค้า</a>
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </form>
            </div>
            <table class="table table-bordered bs_table">
                <thead>
                    <tr>
                        <th>รูปสินค้า</th>
                        <th>รหัส</th>
                        <th>ชื่อสินค้า</th>
                        <th>ประเภท</th>
                        <th>คงเหลือ</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>การทำงาน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr>
                            <td><img src="{{ $p->image_url}}" alt="" width="100px"></td>
                            <td>{{ $p->code}}</td>
                            <td>{{ $p->name}}</td>
                            <td>{{ $p->category->name}}</td>
                            <td>{{ number_format($p->stock_qty,0)}}</td>
                            <td>{{ number_format($p->price,2)}}</td>
                            <td class="bs-center">
                                <a href="{{ URL::to('product/edit/'.$p->id)}}" class="btn btn-info"><i class="fa fa-edit"></i>แก้ไข</a>
                                <a href="#" class="btn btn-danger btn-delete" id-delete={{ $p->id }}><i class="fa fa-trash"></i>ลบ</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">รวม</th>
                        <th class="bs-price">{{ $products->sum('stock_qty')}}</th>
                        <th class="bs-price">{{ number_format($products->sum('price'),2)}}</th>
                    </tr>
                </tfoot>
            </table>
            <div class="panel-footer">
                <span>แสดงข้อมูลจำนวน {{ count($products)}}</span>
            </div>
        </div>
    </div>
<div class="container">
    {{ $products->links()}}
</div>
    
</body>
</html>

<script>
    $('.btn-delete').on('click',function() {if(confirm("คุณต้องการลบข้อมูลสินค้าใช่หรือไม่")) {
        var url = "{{ URL::to('product/remove')}}" + '/' + $(this).attr('id-delete');
        window.location.href = url;
    }})
</script>
@endsection